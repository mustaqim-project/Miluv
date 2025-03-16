@include('auth.layout.header')

<!-- Main Start -->
<main class="main my-4 p-3 p-md-5">
    <div class="container">
        <div class="row align-items-center">
            <!-- Image - Hidden on small screens -->
            <div class="col-lg-6">
                <div class="login-img">
                    <img class="img-fluid" src="{{ asset('assets/frontend/images/login.png') }} " alt="">
                </div>
            </div>
            <!-- Form -->
            <div class="col-md-6 col-12">
                <div class="login-txt px-3 px-md-5">

                    @if ($message = Session::get('error_message'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>{{ get_phrase('Public sign up are not allowed') }}!</strong>
                            {{ get_phrase('You should contact the site administrator') }}.
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif

                    <h3 class="text-center">{{ get_phrase('Login') }}</h3>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                    
                        <!-- Email Field -->
                        <div class="form-group">
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
                    
                        <!-- Password Field -->
                        <div class="form-group">
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
                                    class="btn btn-outline-secondary toggle-password" 
                                    aria-label="Toggle password visibility"
                                >
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            <p class="text-danger">{{ $errors->first('password') }}</p>
                        </div>
                    
                        <!-- Remember Me Checkbox -->
                        <div class="mb-3 form-check">
                            <input type="checkbox" id="remember_me" class="form-check-input" name="remember">
                            <label class="form-check-label" for="remember_me">
                                {{ get_phrase('Remember me') }}
                            </label>
                        </div>
                    
                        <!-- Login Button -->
                        <button type="submit" class="btn btn-primary w-100 my-3">
                            {{ get_phrase('Log In') }}
                        </button>
                    
                        <!-- Forgot Password Link -->
                        <div class="mt-2 text-center">
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}">
                                    {{ get_phrase('Forgot your password?') }}
                                </a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- Main End -->

<script>
    document.querySelector('.toggle-password').addEventListener('click', function () {
        let passwordField = document.getElementById('password');
        let icon = this.querySelector('i');

        // Toggle password visibility
        passwordField.type = passwordField.type === 'password' ? 'text' : 'password';

        // Toggle eye icon
        icon.classList.toggle('fa-eye');
        icon.classList.toggle('fa-eye-slash');
    });
</script>

@include('auth.layout.footer')
