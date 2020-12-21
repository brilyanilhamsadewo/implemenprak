@extends('frontend.templates.default')

@section('content')
<div class="content">
    <div class="animated fadeIn">
            <div class="g-signin2" data-onsuccess="onSignIn"></div>
            <div><a href="../signin" onclick="signOut();">Sign out</a></div>

            <br>
            <div id="info"></div>
            <div id="hasil"></div>
            <div id="img"></div>
            <div id="email"></div>

            <script>
              function onSignIn(googleUser) {
                var profile = googleUser.getBasicProfile();

                document.getElementById('info').innerHTML ='<h2> My Google Info </h2>';

                document.getElementById('hasil').innerHTML =profile.getId()+'<br>'+profile.getName();

                var myImage = new Image(200, 200);
                  myImage.src = profile.getImageUrl();
                  x = document.getElementById("img");
                  x.appendChild(myImage);

                  document.getElementById('email').innerHTML =profile.getEmail();

                console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
                console.log('Name: ' + profile.getName());
                console.log('Image URL: ' + profile.getImageUrl());
                console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.

              }
              

              function signOut() {
                var auth2 = gapi.auth2.getAuthInstance();
                auth2.signOut().then(function () {
                console.log('User signed out.');
                });
              }
</script>
</div>
@endsection