
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasRight"
        aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header res_logo d-lg-none py-4">
            <div class="logo">
                <img class="max-width-200" width="80%"
                    src="{{ asset('storage/logo/dark/' . get_settings('system_dark_logo')) }}"
                    alt="">
            </div>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                aria-label="Close">x</button>
        </div>
        <div class="offcanvas-body s_offcanvas">
            <div class="timeline-navigation">
                <nav class="menu-wrap">
                    <ul>
                        @foreach ($categories as $category)
                            <li class="{{ request()->segment(2) == $category->slug ? 'active' : '' }}">
                                <a href="{{ route('category.blog', $category->slug) }}">
                                    <i class="fas fa-folder" style="opacity: 0.6; margin-right:1em;"></i> {{ $category->name }}
                                </a>
                            </li>
                        @endforeach
                        <li class="{{ Route::currentRouteName() == 'about.view' ? 'active' : '' }}">
                            <a href="{{ route('about.view') }}">
                                <i class="fas fa-info-circle" style="opacity: 0.6; margin-right:1em;"></i> {{ get_phrase('About') }}
                            </a>
                        </li>
                        <li class="{{ Route::currentRouteName() == 'policy.view' ? 'active' : '' }}">
                            <a href="{{ route('policy.view') }}">
                                <i class="fas fa-user-shield" style="opacity: 0.6; margin-right:1em;"></i> {{ get_phrase('Privacy Policy') }}
                            </a>
                        </li>
                        <li class="{{ Route::currentRouteName() == 'term.view' ? 'active' : '' }}">
                            <a href="{{ route('term.view') }}">
                                <i class="fas fa-file-contract" style="opacity: 0.6; margin-right:1em;"></i> {{ get_phrase('Terms and Conditions') }}
                            </a>
                        </li>
                        <li class="{{ Route::currentRouteName() == 'contact.view' ? 'active' : '' }}">
                            <a href="{{ route('contact.view') }}">
                                <i class="fas fa-envelope" style="opacity: 0.6; margin-right:1em;"></i> {{ get_phrase('Contact') }}
                            </a>
                        </li>
                    </ul>
                </nav>
                

                <div class="footer-nav">
                    <div class="copy-rights text-muted">
                        @php
                            $sitename = \App\Models\Setting::where('type', 'system_name')->value(
                                'description',
                            );
                        @endphp
                        <p>© {{ date('Y') }} Miluv</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
