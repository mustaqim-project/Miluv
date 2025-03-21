<div class="page-wrap">
    <div class="blog-header nblog_header p-20 radius-8 mb-3">
        <h1 class="h3">{{ get_phrase('Matches') }}</h1>
    </div>
    <div class="g-3 blog-cards mt-3">
        @foreach ($add_friend as $friend)
            @php
                $userId = auth()->id();

                // Cek apakah user sudah mengirim atau menerima permintaan pertemanan
                $hasRequestSent = App\Models\Friendships::where('requester', $userId)
                    ->where('accepter', $friend->id)
                    ->exists();
                $hasRequestReceived = App\Models\Friendships::where('requester', $friend->id)
                    ->where('accepter', $userId)
                    ->exists();
            @endphp

            @if (!$hasRequestSent && !$hasRequestReceived)
                <div class="col-lg-4 col-md-4 col-6">
                    <div class="card sugg-card p-0 box_shadow border-none suggest_p radius-8">
                        <a href="{{ route('user.profile.view', $friend->id) }}" class="thumbnail-110-106"
                            style="background-image: url('{{ get_user_image($friend->photo, 'optimized') }}')"></a>
                        <div class="p-8 d-flex flex-column">
                            <h4><a href="{{ route('user.profile.view', $friend->id) }}">{{ $friend->name }}</a></h4>
                            <a href="javascript:;" onclick="ajaxAction('{{ route('user.friend', $friend->id) }}')"
                                class="btn common_btn">{{ get_phrase('Connect') }}</a>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div> <!-- Page Wrap End -->
