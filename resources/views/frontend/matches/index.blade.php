<style>
    .swipe-container {
            width: 90%;
            max-width: 400px;
            position: relative;
            margin: auto;
            margin-top: 50px;
        }
        .sugg-card {
            width: 100%;
            height: 500px;
            position: absolute;
            background-size: cover;
            background-position: center;
            border-radius: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease, opacity 0.3s ease;
        }
        .sugg-card h4 {
            position: absolute;
            bottom: 20px;
            left: 20px;
            color: white;
            background-color: rgba(0, 0, 0, 0.5);
            padding: 10px;
            border-radius: 10px;
        }
        .btn-connect {
            position: absolute;
            bottom: 60px;
            left: 50%;
            transform: translateX(-50%);
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
        }
</style>

<div class="swipe-container">
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
            <div class="sugg-card" style="background-image: url('{{ get_user_image($friend->photo, 'optimized') }}');">
                <h4>{{ $friend->name }}</h4>
                <button class="btn-connect" onclick="ajaxAction('{{ route('user.friend', $friend->id) }}')">
                    {{ get_phrase('Connect') }}
                </button>
            </div>
        @endif
    @endforeach
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        let touchStartX = 0;
        let touchEndX = 0;
        const cards = document.querySelectorAll(".sugg-card");

        cards.forEach(card => {
            card.classList.add("transition-all", "duration-300", "ease-in-out");
            
            card.addEventListener("touchstart", function (event) {
                touchStartX = event.changedTouches[0].screenX;
            });

            card.addEventListener("touchend", function (event) {
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