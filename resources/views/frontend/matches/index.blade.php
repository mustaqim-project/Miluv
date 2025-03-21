<div class="page-wrap">
    <div class="blog-header nblog_header p-20 radius-8 mb-3">
        <h1 class="h3">{{ get_phrase('Matches') }}</h1>
    </div>
    <div class="row g-3 blog-cards mt-3"> <!-- Tambahkan row di sini -->
        <div class="swipe-container"
            @foreach ($add_friend as $friend)
            @php
                $userId = auth()->id();
                $hasRequestSent = App\Models\Friendships::where('requester', $userId)
                    ->where('accepter', $friend->id)
                    ->exists();
                $hasRequestReceived = App\Models\Friendships::where('requester', $friend->id)
                    ->where('accepter', $userId)
                    ->exists();
            @endphp
            @if (!$hasRequestSent && !$hasRequestReceived)
                <div class="sugg-card"
                    style="background-image: url('{{ get_user_image($friend->photo, 'optimized') }}');">
                    <h4>{{ $friend->name }}</h4>
                    <button class="btn-connect" onclick="ajaxAction('{{ route('user.friend', $friend->id) }}')">
                        {{ get_phrase('Connect') }}
                    </button>
                </div>
            @endif @endforeach
            </div>
        </div>
    </div> <!-- Page Wrap End -->


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let touchStartX = 0;
            let touchEndX = 0;
            const cards = document.querySelectorAll(".sugg-card");

            cards.forEach(card => {
                card.classList.add("transition-all", "duration-300", "ease-in-out");

                card.addEventListener("touchstart", function(event) {
                    touchStartX = event.changedTouches[0].screenX;
                });

                card.addEventListener("touchend", function(event) {
                    touchEndX = event.changedTouches[0].screenX;
                    handleSwipe(card);
                });
            });

            function handleSwipe(card) {
                if (touchEndX < touchStartX - 50) {
                    card.style.transform = "translateX(-100%) rotate(-10deg)";
                    card.style.opacity = "0";
                    setTimeout(() => card.remove(), 500);
                } else if (touchEndX > touchStartX + 50) {
                    card.style.transform = "translateX(100%) rotate(10deg)";
                    card.style.opacity = "0";
                    setTimeout(() => {
                        card.remove();
                        let connectButton = card.querySelector(".btn-connect");
                        if (connectButton) {
                            connectButton.click();
                        }
                    }, 500);
                }
            }
        });
    </script>
