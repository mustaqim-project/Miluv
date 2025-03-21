@php $user_info = Auth()->user() @endphp

@include('frontend.story.index')

@include('frontend.main_content.create_post')

<div id="timeline-posts">
    @include('frontend.main_content.posts',['type'=>'user_post'])
</div>

@include('frontend.main_content.scripts')




<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    <div class="friends-request my-3 g-2">
        <div id="my-friend-request-list" class="row">

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
    </div>
</div>
