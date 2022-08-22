<h1>Форма для входа</h1>
<form method="POST" action="{{ route('flag.auth.login') }}">
    @csrf
    <input type="text" name="login">
    <input type="password" name="password">
    <submit>Login</submit>
</form>
