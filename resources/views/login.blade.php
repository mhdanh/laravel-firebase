@extends('layout')
@section('content')
    <div id="firebaseui-auth-container"></div>
@stop
@section('jscript')
    <script>
        firebase.auth().onAuthStateChanged(function(user) {
            if (user) {
                window.location.href = "{{url('/')}}";
                return;
            }
            // Initialize the FirebaseUI Widget using Firebase.
            var ui = new firebaseui.auth.AuthUI(firebase.auth());
            var uiConfig = {
                'signInSuccessUrl': false,
                'signInOptions': [{
                    provider: firebase.auth.GoogleAuthProvider.PROVIDER_ID,
                    scopes: [
                    ],
                    customParameters: {
                        // Forces account selection even when one account
                        // is available.
                        prompt: 'select_account'
                    }
                },
                    {
                        provider: firebase.auth.FacebookAuthProvider.PROVIDER_ID,
                        scopes: [
                            'public_profile',
                            'email'
                        ],
                        customParameters: {
                            // Forces password re-entry.
                            auth_type: 'reauthenticate'
                        }
                    }
                ],
                // Terms of service url.
                'tosUrl': false,
            };
            ui.start('#firebaseui-auth-container', uiConfig);
        });
    </script>
@stop

