<!DOCTYPE html>
<html lang="vi-VN">
<head>
    <title>{{ !empty($metaTitle) ? $metaTitle : '' }}</title>

    <meta property="og:title" content="{{ !empty($metaTitle) ? $metaTitle : '' }}" />
    <meta property="og:description" content="{{ !empty($metaDescription) ? $metaDescription : '' }}" />
    <meta name="description" content="{{ !empty($metaDescription) ? $metaDescription : '' }}"/>
    <meta property="og:image" content="{{ !empty($metaImage) ? $metaImage : '$systemProperty->imageUrl' }}" />
    <meta property="og:type" content="{{ ( !empty($type) ? $type : 'article' ) }}" />
    <meta property="og:site_name" content="{{ !empty($metaSiteName) ? $metaSiteName : url('/') }}" />
    <meta property="og:url" content="{{ !empty($metaUrl) ? $metaUrl : url('/') }}" />

    <meta property="og:image:width" content="480" />
    <meta property="og:image:height" content="432" />
    <meta property="fb:app_id" content="149347175641963" />

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta property="ctoke" content="{{csrf_token()}}" />
    <link rel='shortcut icon' type='image/x-icon' href="" />
    <link type="text/css" rel="stylesheet" href="https://cdn.firebase.com/libs/firebaseui/3.5.2/firebaseui.css" />
</head>
<body>
<div class="app-content">
    @yield('content')
</div>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.11.0/firebase.js"></script>
<script src="https://cdn.firebase.com/libs/firebaseui/3.5.2/firebaseui.js"></script>
<script>
    // Your web app's Firebase configuration
    var firebaseConfig = {
        apiKey: "AIzaSyCpB8LOKLU-ctQVxg_7meKwW2ONEHSNeEw",
        authDomain: "covid-klara.firebaseapp.com",
        databaseURL: "https://covid-klara.firebaseio.com",
        projectId: "covid-klara",
        storageBucket: "covid-klara.appspot.com",
        messagingSenderId: "916647762454",
        appId: "1:916647762454:web:0164330ed830cf9d58b337",
        measurementId: "G-GNTS9BYTBT"
    };
    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);
    firebase.analytics();
</script>
<script src="{{url('/app.js')}}"></script>
@yield('jscript')
</body>
</html>
