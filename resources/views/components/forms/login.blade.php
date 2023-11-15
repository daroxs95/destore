<form class="vstack" method="POST" action="{{ route('login') }}">
    @csrf

    <h3>Login</h3>
    <div class="vstack">
        <label for="email" class="">Email</label>
        <input type="email" id="email" name="email" class="" required autofocus>
    </div>

    <div class="vstack">
        <label for="password" class="">Password</label>
        <input type="password" id="password" name="password" class="" required>
    </div>

    <div class="hstack f-ai-center">
        <input type="checkbox" id="remember" name="remember" class="center">
        <label for="remember" class="">Remember me</label>
    </div>

    <button type="submit" class="">
        Log in
    </button>
</form>
