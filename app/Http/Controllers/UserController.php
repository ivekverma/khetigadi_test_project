<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Mail\UserRegisteredMail;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function index(){
        return view("login");
    }
    public function login(Request $request){
        
        $user = User::with('country', 'state', 'city')->where("email", $request->email)->first();
        
        if(!$user) {
            return redirect('/')->with('error', 'invalid credentials');
        }
        
        if(!Hash::check($request->password, $user->password)) {
            return redirect('/')->with('error', 'invalid credentials');
        }

        return view('dashboard', ['user' => $user]);
    }
    public function register(Request $request){ 
        $data['countries'] = Country::select('id', 'name')->get();
        return view("register", $data);
    }

    public function store(Request $request){
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|email|unique:users,email',
            'phone' => [
                'required','numeric','max_digits:11',
                Rule::unique('users')->where(function ($query) use ($request) {
                    return $query->where('country_id', $request->country_id);
                }),
            ],
            'country_id' => 'required|exists:countries,id',
            'state_id'   => 'required|exists:states,id',
            'city_id'    => 'required|exists:cities,id',
            'password'   => 'required|min:6',
        ]);        

        $user = User::create($request->all());

        Mail::to($user->email)->send(new UserRegisteredMail($user));
        
        return redirect('/');
    }
}
