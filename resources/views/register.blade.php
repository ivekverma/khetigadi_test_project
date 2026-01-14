<!DOCTYPE html>
<html lang="en">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#country_id').on('change', function() {
            console.log("inside country change log");
            
            let countryId = $(this).val();
            
            $.ajax({
                url: '/get-states',
                type: 'get',
                data: { country_id: countryId },
                success: function(data) {
                    console.log(data);
                    
                    let stateSelect = $('#state_id');
                    stateSelect.empty();
                    stateSelect.append('<option value="">Select State</option>');
                    
                    $.each(data, function(key, state) {
                        stateSelect.append('<option value="' + state.id + '">' + state.name + '</option>');
                    });
                },
                error: function() {
                    console.log('Error fetching states');
                }
            });
        });
        $('#state_id').on('change', function() {
            console.log("inside state change log");
            
            let stateId = $(this).val();
            
            $.ajax({
                url: '/get-cities',
                type: 'get',
                data: { state_id: stateId },
                success: function(data) {
                    console.log(data);
                    
                    let citySelect = $('#city_id');
                    citySelect.empty();
                    citySelect.append('<option value="">Select City</option>');

                    $.each(data, function(key, city) {
                        citySelect.append('<option value="' + city.id + '">' + city.name + '</option>');
                    });
                },
                error: function() {
                    console.log('Error fetching states');
                }
            });
        });
    });
</script>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Title</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-4 card p-4">
        <form id="registerForm" method="POST" action="{{ route('register') }}">
            @csrf
            <h3 for="login">Register Page</h3>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="first_name" class="">First Name</label>
                    <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name" value="{{ old('first_name') }}">
                    @error('first_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 ">
                    <label for="last_name" class="">Last Name</label>
                    <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" value="{{ old('last_name') }}">
                    @error('last_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="email" class="">Email</label>
                    <!-- <input type="email" class="form-control" id="email" name="email" required> -->
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="phone" class="">Phone</label>
                    <!-- <input type="text" class="form-control" id="phone" name="phone" required> -->
                    <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}">
                    @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="country_id" class="">Country</label>
                    <select name="country_id" id="country_id" class="form-control select2" required>
                        <option value="">Select Country</option>
                        @foreach($countries as $country)
                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="state_id" class="">State</label>
                    <select name="state_id" id="state_id" class="form-control select2" required>
                        <option value="">Select State</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="city_id" class="">City</label>
                    <select name="city_id" id="city_id" class="form-control select2" required>
                        <option value="">Select City</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="password" class="">Password</label>
                    <!-- <input type="text" class="form-control" id="password" name="password" required> -->
                    <input type="text" class="form-control @error('password') is-invalid @enderror"
                        id="password" name="password" value="{{ old('password') }}">

                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>
