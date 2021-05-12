<form method="POST" action="{{ route('auth.afterverifychangepassword') }}" class="sign-in-form" autocomplete="off">
    @csrf
    <h2 class="title">Change Password</h2>

    <div class="input-field @error('password')formerror @enderror">
        <i class="fas fa-lock"></i>

        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
               name="password" placeholder="Password">

        @error('password')
        <span class="invalid-feedback" role="alert">
            <span>{{ $message }}</span>
        </span>
        @enderror
    </div>

    <div class="input-field @error('password_confirmation')formerror @enderror">
        <i class="fas fa-lock"></i>

        <input id="password" type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
               name="password_confirmation" placeholder="Password Confirmation">

    </div>
    <input type="submit" value="Login" class="btn solid"/>

</form>
