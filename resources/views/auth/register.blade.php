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
                    <div class="login-txt ms-0 ms-lg-5">
                        <h3>{{get_phrase('Sign Up')}}</h3>
                        

                        <form action="{{ route('register') }}" method="POST">
                            @csrf
                        
                            <div class="form-group form-name">
                                <label for="name">{{ get_phrase('Full Name') }}</label>
                                <input 
                                    type="text" 
                                    id="name"
                                    name="name" 
                                    value="{{ old('name') }}" 
                                    placeholder="{{ get_phrase('Your full name') }}" 
                                    class="form-control" 
                                    required
                                >
                                <p class="text-danger">{{ $errors->first('name') }}</p>
                            </div>
                        
                            <div class="form-group form-email">
                                <label for="email">{{ get_phrase('Email') }}</label>
                                <input 
                                    type="email" 
                                    id="email"
                                    name="email" 
                                    value="{{ old('email') }}" 
                                    placeholder="{{ get_phrase('Enter your email address') }}" 
                                    class="form-control" 
                                    required
                                >
                                <p class="text-danger">{{ $errors->first('email') }}</p>
                            </div>
                        
                            <div class="form-group form-phone">
                                <label for="phone">{{ get_phrase('Nomor Telepon') }}</label>
                                <input 
                                    type="tel" 
                                    id="phone"
                                    name="phone" 
                                    value="{{ old('phone') }}" 
                                    placeholder="Contoh: 6281234567890" 
                                    class="form-control" 
                                    required
                                >
                                <small class="form-text text-muted">
                                    Masukkan nomor telepon tanpa **0** atau **+62**. Hanya gunakan format **628xxxxxxxxx**.
                                </small>
                                <p class="text-danger" id="phoneError">{{ $errors->first('phone') }}</p>
                            </div>
                        
                            <div class="form-group form-pass">
                                <label for="password">{{ get_phrase('Password') }}</label>
                                <div class="input-group">
                                    <input 
                                        type="password" 
                                        id="password"
                                        name="password" 
                                        placeholder="{{ get_phrase('Your password') }}" 
                                        class="form-control" 
                                        required
                                    >
                                    <button type="button" class="btn btn-outline-secondary toggle-password" data-target="password">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                        
                            <div class="form-group form-pass">
                                <label for="password_confirmation">{{ get_phrase('Confirm Password') }}</label>
                                <div class="input-group">
                                    <input 
                                        type="password" 
                                        id="password_confirmation"
                                        name="password_confirmation" 
                                        placeholder="{{ get_phrase('Confirm password') }}" 
                                        class="form-control" 
                                        required
                                    >
                                    <button type="button" class="btn btn-outline-secondary toggle-password" data-target="password_confirmation">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                                <p class="text-danger">{{ $errors->first('password') }}</p>
                            </div>
                        
                            <input type="hidden" name="timezone" id="timezone" value="">
                        
                            <div class="mb-3 form-check">
                                <input 
                                    type="checkbox" 
                                    class="form-check-input" 
                                    name="check1" 
                                    id="exampleCheck1"
                                    required
                                >
                                <label class="form-check-label" for="exampleCheck1">
                                    {{ get_phrase('I accept the') }} 
                                    <a href="{{ route('term.view') }}">{{ get_phrase('Terms and Conditions') }}</a>
                                </label>
                            </div>
                        
                            <button type="submit" class="btn btn-primary my-3">
                                {{ get_phrase('Sign Up') }}
                            </button>
                        
                        </form>
                        
                        <script>
                            document.querySelectorAll('.toggle-password').forEach(button => {
                                button.addEventListener('click', function () {
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
                        </script>
                        
                        <script>
                            document.getElementById('phone').addEventListener('input', function () {
                                let phone = this.value;
                        
                                // Hapus karakter selain angka
                                phone = phone.replace(/\D/g, '');
                        
                                // Jika dimulai dengan 08, ubah menjadi 62
                                if (phone.startsWith('08')) {
                                    phone = '62' + phone.substring(1);
                                }
                        
                                // Jika dimulai dengan +628, ubah menjadi 62
                                if (phone.startsWith('628')) {
                                    phone = '62' + phone.substring(3);
                                }
                        
                                // Update nilai input
                                this.value = phone;
                            });
                        </script>
                    </div>
                </div>
            </div>

        </div> <!-- container end -->
    </main>
    <!-- Main End -->



@include('auth.layout.footer')