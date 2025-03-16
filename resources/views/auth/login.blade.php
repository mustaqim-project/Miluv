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
                            <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="{{ get_phrase('Enter your email address') }}">
                        </div>
                        <p class="text-danger">{{ $errors->first('email') }}</p>
                    
                        <div class="form-group form-pass" style="position: relative;">
                            <label for="password">{{ get_phrase('Password') }}</label>
                            <input type="password" name="password" id="password" placeholder="{{ get_phrase('Your password') }}">
                                <i id="togglePassword" class="fas fa-eye"></i>
                        </div>
                    
                        <!-- Remember Me -->
                        <div class="mb-3 form-check">
                            <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                            <label class="form-check-label" for="remember_me">{{ get_phrase('Remember me') }}</label>
                        </div>
                    
                        <input class="btn btn-primary my-3" type="submit" name="submit" id="submit" value="Log In">
                    
                        <div class="flex items-center justify-end mt-2">
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

    </div> <!-- container end -->
</main>
<!-- Main End -->

@include('auth.layout.footer')

