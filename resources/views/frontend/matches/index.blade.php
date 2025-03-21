<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

<div class="page-wrap">
    <div class="blog-header nblog_header p-20 radius-8 mb-3">
        <h1 class="h3">{{ get_phrase('Matches') }}</h1>
    </div>
    <div class="swiper-container">
        <div class="swiper-wrapper">
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
                    <div class="swiper-slide sugg-card" style="background-image: url('{{ get_user_image($friend->photo, 'optimized') }}');">
                        <h4>{{ $friend->name }}</h4>
                        <button class="btn-connect" onclick="sendFriendRequest('{{ route('user.friend', $friend->id) }}')">
                            {{ get_phrase('Connect') }}
                        </button>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>

<script>
    var swiper = new Swiper('.swiper-container', {
        effect: 'coverflow',
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: 'auto',
        coverflowEffect: {
            rotate: 50,
            stretch: 0,
            depth: 100,
            modifier: 1,
            slideShadows: true,
        },
        navigation: false,
        on: {
            slideChangeTransitionEnd: function () {
                let currentSlide = document.querySelector('.swiper-slide-active');
                currentSlide.addEventListener('swiped-right', function () {
                    let connectButton = currentSlide.querySelector('.btn-connect');
                    if (connectButton) connectButton.click();
                });
            }
        }
    });

    function sendFriendRequest(url) {
        fetch(url, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json'
            }
        }).then(response => response.json())
          .then(data => console.log(data));
    }
</script>
