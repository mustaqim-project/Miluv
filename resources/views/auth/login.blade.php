@include('auth.layout.header')

<!-- Main Start -->
<main class="main my-4 p-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="login-img">
                    <img class="img-fluid" src="{{ asset('assets/frontend/images/login.png') }} " alt="">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="login-txt ms-s ms-lg-5">

                    @if($message = Session::get('error_message'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>{{get_phrase('Public sign up are not allowed')}}!</strong> {{get_phrase('You should contact the site administrator')}}.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <h3>{{get_phrase('Login')}}</h3>
                       

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                    
                        <div class="form-group form-email">
                            <label for="email">{{ get_phrase('Email') }}</label>
                            <input type="email" name="email" id="email" 
                                   class="form-control @error('email') is-invalid @enderror" 
                                   value="{{ old('email') }}" 
                                   placeholder="{{ get_phrase('Enter your email address') }}" 
                                   required>
                            @error('email')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    
                        <div class="form-group form-pass" style="position: relative;">
                            <label for="password">{{ get_phrase('Password') }}</label>
                            <div class="input-group">
                                <input type="password" name="password" id="password" 
                                       class="form-control @error('password') is-invalid @enderror"
                                       placeholder="{{ get_phrase('Your password') }}" required>
                                <button type="button" id="togglePassword" 
                                        class="btn btn-outline-secondary" 
                                        aria-label="Toggle password visibility">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            @error('password')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    
                        <!-- Remember Me -->
                        <div class="form-check mb-3">
                            <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                            <label class="form-check-label" for="remember_me">{{ get_phrase('Remember me') }}</label>
                        </div>
                    
                        <button type="submit" class="btn btn-primary my-3">{{ get_phrase('Log In') }}</button>
                    
                        <div class="mt-2">
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-decoration-none">
                                    {{ get_phrase('Forgot your password?') }}
                                </a>
                            @endif
                        </div>
                    </form>
                    
                    <script>
                        document.getElementById('togglePassword').addEventListener('click', function () {
                            let passwordField = document.getElementById('password');
                            let icon = this.querySelector('i');
                            if (passwordField.type === 'password') {
                                passwordField.type = 'text';
                                icon.classList.replace('fa-eye', 'fa-eye-slash');
                            } else {
                                passwordField.type = 'password';
                                icon.classList.replace('fa-eye-slash', 'fa-eye');
                            }
                        });
                    </script>
                    

                </div>
            </div>
        </div>

    </div> <!-- container end -->
</main>
<!-- Main End -->

@include('auth.layout.footer')

