@include('auth.layout.header')

<!-- Main Start -->
<main class="main my-4 p-3">
    <div class="container">
        <div class="row">
            <div class="col-md-6 d-flex justify-content-center">
                <div class="login-img">
                    <img class="img-fluid" src="{{ asset('assets/frontend/images/login.png') }}" alt="Register Image">
                </div>
            </div>
            <div class="col-md-6">
                <div class="login-txt ms-0 ms-md-4">
                    <h3 class="text-center text-md-start">{{ get_phrase('Sign Up') }}</h3>

                    <form action="{{ route('register') }}" method="POST" class="needs-validation" novalidate>
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">{{ get_phrase('Full Name') }}</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control" required>
                            </div>
                            @error('name') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">{{ get_phrase('Email Address') }}</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control" required>
                            </div>
                            @error('email') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">{{ get_phrase('Phone Number') }}</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" class="form-control" required>
                            </div>
                            <small class="form-text text-muted">Format: **628XXXXXXXXX**</small>
                            @error('phone') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">{{ get_phrase('Password') }}</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                <input type="password" id="password" name="password" class="form-control" required>
                                <button type="button" class="btn btn-outline-secondary toggle-password" data-target="password">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            @error('password') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">{{ get_phrase('Confirm Password') }}</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
                                <button type="button" class="btn btn-outline-secondary toggle-password" data-target="password_confirmation">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>

                        <input type="hidden" name="timezone" id="timezone" value="">

                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" name="check1" id="exampleCheck1" required>
                            <label class="form-check-label" for="exampleCheck1">
                                {{ get_phrase('I accept the') }} <a href="{{ route('term.view') }}">{{ get_phrase('Terms and Conditions') }}</a>
                            </label>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 my-3">{{ get_phrase('Sign Up') }}</button>
                    </form>

                    <script>
                        document.querySelectorAll('.toggle-password').forEach(button => {
                            button.addEventListener('click', function() {
                                let targetId = this.getAttribute('data-target');
                                let passwordField = document.getElementById(targetId);
                                let icon = this.querySelector('i');

                                if (passwordField.type === 'password') {
                                    passwordField.type = 'text';
                                    icon.classList.replace('fa-eye', 'fa-eye-slash');
                                } else {
                                    passwordField.type = 'password';
                                    icon.classList.replace('fa-eye-slash', 'fa-eye');
                                }
                            });
                        });

                        document.getElementById('phone').addEventListener('input', function() {
                            let phone = this.value.replace(/\D/g, '');

                            if (phone.startsWith('08')) {
                                phone = '62' + phone.substring(1);
                            } else if (phone.startsWith('+628')) {
                                phone = '62' + phone.substring(3);
                            }

                            this.value = phone;
                        });
                    </script>

                </div>
            </div>
        </div>
    </div>
</main>
<!-- Main End -->

@include('auth.layout.footer')
