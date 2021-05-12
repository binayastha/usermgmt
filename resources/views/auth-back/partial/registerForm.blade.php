<form action="{{ route('register') }}" class="sign-up-form" method="POST">
    @csrf
    <h2 class="title">Sign up</h2>
    <div class="input-field">
        <i class="fas fa-user"></i>
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Name">

    </div>
    <div class="input-field">
        <i class="fas fa-envelope"></i>
        <input type="email" placeholder="Email"  name="email" value="{{ old('email') }}" />
    </div>
    <div class="input-field">
        <i class="fas fa-lock"></i>
        <input type="password" placeholder="Password"  name="password"/>
    </div>

    <div class="input-field">
        <i class="fas fa-lock"></i>
        <input type="password" placeholder="Confirm Password" name="password_confirmation"/>
    </div>

    <input type="submit" class="btn" value="Sign up" />
    <p class="social-text">Or Sign up with social platforms</p>
    <div class="social-media">
        <a href="#" class="social-icon">
            <i class="fab fa-facebook-f"></i>
        </a>
        <a href="#" class="social-icon">
            <i class="fab fa-twitter"></i>
        </a>
        <a href="#" class="social-icon">
            <i class="fab fa-google"></i>
        </a>
        <a href="#" class="social-icon">
            <i class="fab fa-linkedin-in"></i>
        </a>
    </div>
</form>
