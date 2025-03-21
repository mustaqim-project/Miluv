<div class="custom-swiper-container swiper">
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
                <div class="custom-swiper-slide swiper-slide" style="background-image: url('{{ get_user_image($friend->photo, 'optimized') }}');">
                    <div class="custom-profile-info">
                        <h4>{{ $friend->name }}, {{ $friend->age }}</h4>
                        <div class="custom-tags">
                            <span class="custom-tag">Climbing</span>
                            <span class="custom-tag">Skincare</span>
                            <span class="custom-tag">Dancing</span>
                            <span class="custom-tag">Gymnastics</span>
                        </div>
                        <button class="custom-btn-connect" onclick="sendFriendRequest('{{ route('user.friend', $friend->id) }}')">
                            {{ get_phrase('Connect') }}
                        </button>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
    <div class="custom-swiper-pagination swiper-pagination"></div>
</div>

<script>
    var swiper = new Swiper('.custom-swiper-container', {
        effect: 'cards',
        grabCursor: true,
        loop: true,
        pagination: {
            el: ".custom-swiper-pagination",
            clickable: true,
        },
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
