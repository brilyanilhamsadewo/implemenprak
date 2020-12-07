@extends('frontend.templates.default')

@section('content')
    <div class="container">
        <h3>Login</h3>
        <form action="{{ route('login') }}" class="col s12" method="POST">
            @csrf
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">email</i>
                    <input type="email" class="validate @error('email') invalid @enderror" name="email" value="{{ old('email') }}">
                    <label for="">Email <Address></Address></label>
                    @error('email')
                        <span class="helper-text" data-error="{{ $message }}"></span>
                    @enderror
                </div>

                <div class="input-field col s12">
                    <i class="material-icons prefix">lock</i>
                    <input type="password" class="@error('password') invalid @enderror" name="password">
                    <label for="">Password</label>
                    @error('password')
                        <span class="helper-text" data-error="{{ $message }}"></span>
                    @enderror
                </div>

                <div class="input field right">
                    <input type="submit" value="Login" class="waves-effect waves-light btn red accent-1">
                </div>
                <div class="g-signin2" data-onsuccess="onSignIn"></div>

                <script>
                    function onSignIn(googleUser) {
                    var profile = googleUser.getBasicProfile();
                    console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
                    console.log('Name: ' + profile.getName());
                    console.log('Image URL: ' + profile.getImageUrl());
                    console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
                    }
                </script>
            </div>
        </form>
    </div>
@endsection