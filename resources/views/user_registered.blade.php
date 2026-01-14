<h2>Welcome, {{ $user->first_name }}!</h2>

<p>Your account has been successfully created.</p>

<p>Email: {{ $user->email }}</p>

<p>Click on <a href="{{ route('index') }}">this link</a> to login.</p>

<p>Thank you for registering.</p>
