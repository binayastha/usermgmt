<form method="POST" action="{{ route('auth.login') }}" class="sign-in-form" autocomplete="off">
    @csrf
    <h2 class="title">Sign in</h2>
    <div class="input-field  @error('email')formerror @enderror">
        <i class="fas fa-user"></i>

        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
               value="{{ old('email') }}" placeholder="Email" >

        @error('email')
        <span class="invalid-feedback" role="alert">
            <span>{{ $message }}</span>
        </span>
        @enderror
    </div>
    <div class="input-field @error('email')formerror @enderror">
        <i class="fas fa-lock"></i>

        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
               name="password" placeholder="Password">

        @error('password')
        <span class="invalid-feedback" role="alert">
            <span>{{ $message }}</span>
        </span>
        @enderror
    </div>
    <input type="submit" value="Login" class="btn solid"/>



    <p class="social-text">Or Sign in with social platforms</p>


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
