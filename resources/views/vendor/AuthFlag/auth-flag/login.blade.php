<h1>Форма для входа</h1>
<form method="POST" action="{{ route('flag.auth.login') }}">
    <input type="text" name="email">
    <input type="password" name="password">
    <button>Login</button>
</form>
