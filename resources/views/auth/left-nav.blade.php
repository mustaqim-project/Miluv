<div class="offcanvas offcanvas-start" tabindex="-1" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header res_logo d-lg-none py-4">
        <div class="logo">
            <img class="max-width-200" width="80%"
                src="{{ asset('storage/logo/dark/' . get_settings('system_dark_logo')) }}" alt="">
        </div>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close">x</button>
    </div>
    <div class="offcanvas-body s_offcanvas" id="offcanvasRight
         style="padding: 16px; overflow-y: auto;">
        <div class="timeline-navigation">
            <nav class="menu-wrap">
                <ul style="list-style: none; padding: 0; margin: 0;">
                    <li style="padding: 10px 0; border-bottom: 1px solid #ddd;">
                        <a href="{{ route('about.view') }}"
                            style="text-decoration: none; color: #333; display: flex; align-items: center;">
                            <i class="fas fa-info-circle" style="opacity: 0.6; margin-right: 1em;"></i>
                            {{ get_phrase('About') }}
                        </a>
                    </li>
                    <li style="padding: 10px 0; border-bottom: 1px solid #ddd;">
                        <a href="{{ route('policy.view') }}"
                            style="text-decoration: none; color: #333; display: flex; align-items: center;">
                            <i class="fas fa-user-shield" style="opacity: 0.6; margin-right: 1em;"></i>
                            {{ get_phrase('Privacy Policy') }}
                        </a>
                    </li>
                    <li style="padding: 10px 0; border-bottom: 1px solid #ddd;">
                        <a href="{{ route('term.view') }}"
                            style="text-decoration: none; color: #333; display: flex; align-items: center;">
                            <i class="fas fa-file-contract" style="opacity: 0.6; margin-right: 1em;"></i>
                            {{ get_phrase('Terms and Conditions') }}
                        </a>
                    </li>
                    <li style="padding: 10px 0;">
                        <a href="{{ route('contact.view') }}"
                            style="text-decoration: none; color: #333; display: flex; align-items: center;">
                            <i class="fas fa-envelope" style="opacity: 0.6; margin-right: 1em;"></i>
                            {{ get_phrase('Contact') }}
                        </a>
                    </li>
                </ul>
            </nav>

            <div class="footer-nav" style="margin-top: 20px; text-align: center;">
                <div class="copy-rights text-muted">
                    @php
                        $sitename = \App\Models\Setting::where('type', 'system_name')->value('description');
                    @endphp
                    <p style="font-size: 14px; color: #666;">© {{ date('Y') }} Miluv</p>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // Menampilkan offcanvas hanya di mobile
    function checkScreenSize() {
        var offcanvas = document.getElementById("offcanvasRight");
        if (window.innerWidth <= 991) {
            offcanvas.style.display = "block";
        } else {
            offcanvas.style.display = "none";
        }
    }

    // Cek ukuran layar saat pertama kali dimuat
    checkScreenSize();

    // Cek ulang saat layar diubah ukurannya
    window.addEventListener("resize", checkScreenSize);
</script>