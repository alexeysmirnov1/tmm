<html>
<head>
    <link href="{!! asset('/vendor/auth-flag/css/main.css') !!}" rel="stylesheet" type="text/css">
</head>
<body>
<div class="wrapper">
    <div class="login-page">
        <img src="{{ asset('/vendor/auth-flag/logo.svg') }}" width="100px">
        <h1>Форма для входа</h1>
        <form method="POST" action="{{ route('flag.auth.login') }}">
            @csrf
            <input type="text" name="email">
            <br>
            <input type="password" name="password">
            <br>
            <button>Login</button>
        </form>
    </div>
</div>
</body>
</html>
