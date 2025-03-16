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

                    @if ($message = Session::get('error_message'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>{{ get_phrase('Public sign up are not allowed') }}!</strong>
                            {{ get_phrase('You should contact the site administrator') }}.
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif

                    <h3>{{ get_phrase('Login') }}</h3>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                    
                        <!-- Email Field with Icon -->
                        <div class="form-group form-email">
                            <label for="email">{{ get_phrase('Email') }}</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                <input 
                                    type="email" 
                                    id="email"
                                    name="email" 
                                    value="{{ old('email') }}" 
                                    placeholder="{{ get_phrase('Enter your email address') }}" 
                                    class="form-control"
                                    required
                                >
                            </div>
                            <p class="text-danger">{{ $errors->first('email') }}</p>
                        </div>
                    
                        <!-- Password Field with Icon & Toggle Button -->
                        <div class="form-group form-pass">
                            <label for="password">{{ get_phrase('Password') }}</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                <input 
                                    type="password" 
                                    id="password"
                                    name="password" 
                                    placeholder="{{ get_phrase('Your password') }}" 
                                    class="form-control"
                                    required
                                >
                                <button 
                                    type="button" 
                                    class="btn btn-outline-secondary toggle-password1" 
                                    data-target="password"
                                    aria-label="Toggle password visibility"
                                >
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            <p class="text-danger">{{ $errors->first('password') }}</p>
                        </div>
                    
                        <!-- Remember Me Checkbox -->
                        <div class="mb-3 form-check">
                            <input 
                                type="checkbox" 
                                id="remember_me" 
                                class="form-check-input" 
                                name="remember"
                            >
                            <label class="form-check-label" for="remember_me">
                                {{ get_phrase('Remember me') }}
                            </label>
                        </div>
                    
                        <!-- Login Button -->
                        <button type="submit" class="btn btn-primary my-3">
                            {{ get_phrase('Log In') }}
                        </button>
                    
                        <!-- Forgot Password Link -->
                        <div class="mt-2 text-end">
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}">
                                    {{ get_phrase('Forgot your password?') }}
                                </a>
                            @endif
                        </div>
                    </form>
                    
                    
                    <script>
                        document.getElementById('toggle-password1').addEventListener('click', function () {
                            let passwordField = document.getElementById('password');
                            let icon = this.querySelector('i');
                            passwordField.type = passwordField.type === 'password' ? 'text' : 'password';
                            icon.classList.toggle('fa-eye');
                            icon.classList.toggle('fa-eye-slash');
                        });
                    </script>
                    
                </div>
            </div>
        </div>

    </div> <!-- container end -->
</main>
<!-- Main End -->

@include('auth.layout.footer')
