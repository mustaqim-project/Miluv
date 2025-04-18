<div class="all-notify-control header-controls radius-8 bg-white shadow-sm">
    <div class="notify-control">
        <div class="notify-inner shadow-sm">
            <h3 class="h4 py-4 border-bottom ">{{ get_phrase('Notifications') }}</h3>
            <div class="new-notif mt-4 pb-1">
                <h4 class="notify-title">{{ get_phrase('New') }} <span>{{ count($new_notification) }}</span></h4>
                <ul>
                    @foreach ($new_notification as $newNotification)
                        @if ($newNotification->type == 'event')
                            <li class="notify-item eventn-item">
                                <div class="avatar-details">
                                    <div class="d-flex">
                                        <div class="noti-avata me-3"><img width="48" class="rounded-circle h-39"
                                                src="{{ get_user_image($newNotification->getUserData->id, 'optimized') }}"alt="">
                                            <span class="notify-type"><i class="fa fa-calendar"></i></span>
                                        </div>
                                        <div class="noti-details">
                                            <h4><a
                                                    href="{{ route('user.profile.view', $newNotification->getUserData->id) }}">{{ ucfirst($newNotification->getUserData->name) }}</a><span>
                                                    {{ get_phrase('invited you to like') }} </span> <a
                                                    href="{{ route('single.event', $newNotification->getEventData->id) }}">
                                                    {{ ucfirst($newNotification->getEventData->title) }} </a> </h4>
                                            @if ($newNotification->status == '0')
                                                <div class="btn-inline">
                                                    <a href="javascript:void(0)"
                                                        onclick="ajaxAction('<?php echo route('accept.event.request.from.notification', ['id' => $newNotification->sender_user_id, 'event_id' => $newNotification->getEventData->id]); ?>')"
                                                        class="btn common_btn">{{ get_phrase('Accept') }}</a>
                                                    <a href="javascript:void(0)"
                                                        onclick="ajaxAction('<?php echo route('decline.event.request.from.notification', ['id' => $newNotification->sender_user_id, 'event_id' => $newNotification->getEventData->id]); ?>')"
                                                        class="btn btn-danger">{{ get_phrase('Decline') }}</a>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <span
                                    class="noti-time">{{ $newNotification->created_at->timezone(Auth::user()->timezone)->diffForHumans() }}</span>
                            </li>

                           
                        @elseif ($newNotification->type == 'profile')
                            <li class="notify-item friendr-item">
                                <div class="avatar-details">
                                    <div class="d-flex">
                                        <div class="noti-avata me-3"><img width="48" class="rounded-circle h-39"
                                                src="{{ get_user_image($newNotification->getUserData->id, 'optimized') }}"
                                                alt="">
                                            <span class="notify-type"><i class="fa fa-user"></i></span>
                                        </div>
                                        <div class="noti-details">
                                            <h4> <a
                                                    href="{{ route('user.profile.view', $newNotification->getUserData->id) }}">{{ ucfirst($newNotification->getUserData->name) }}</a>
                                                <span>{{ get_phrase('sent you Friend Request') }}
                                            </h4>
                                            @if ($newNotification->status == '0')
                                                <div class="btn-inline">
                                                    <a href="javascript:void(0)"
                                                        onclick="ajaxAction('<?php echo route('accept.friend.request.from.notification', $newNotification->sender_user_id); ?>')"
                                                        class="btn common_btn">{{ get_phrase('Accept') }}</a>
                                                    <a href="javascript:void(0)"
                                                        onclick="ajaxAction('<?php echo route('decline.friend.request.from.notification', $newNotification->sender_user_id); ?>')"
                                                        class="btn btn-danger">{{ get_phrase('Decline') }}</a>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <span
                                    class="noti-time">{{ $newNotification->created_at->timezone(Auth::user()->timezone)->diffForHumans() }}</span>
                            </li>
                        @elseif ($newNotification->type == 'friend_request_accept')
                            <li class="notify-item friendr-item">
                                <div class="avatar-details">
                                    <div class="d-flex">
                                        <div class="noti-avata me-3"><img width="48" class="rounded-circle h-39"
                                                src="{{ get_user_image($newNotification->getUserData->id, 'optimized') }}"
                                                alt="">
                                            <span class="notify-type"><i class="fa fa-user"></i></span>
                                        </div>
                                        <div class="noti-details">
                                            <h4><a
                                                    href="{{ route('user.profile.view', $newNotification->getUserData->id) }}">{{ ucfirst($newNotification->getUserData->name) }}</a><span>
                                                    {{ get_phrase('accepted Your Friend Request') }}
                                            </h4>

                                            @if ($newNotification->status == '0')
                                                <div class="btn-inline">
                                                    <a href="javascript:void(0)"
                                                        onclick="ajaxAction('<?php echo route('mark.as.read.notification', $newNotification->id); ?>')"
                                                        class="btn common_btn">{{ get_phrase('Mark As Read') }}</a>
                                                </div>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                                <span
                                    class="noti-time">{{ $newNotification->created_at->timezone(Auth::user()->timezone)->diffForHumans() }}</span>
                            </li>
                        @elseif ($newNotification->type == 'fundraiser_request_accept')
                            <li class="notify-item friendr-item">
                                <div class="avatar-details">
                                    <div class="d-flex">
                                        <div class="noti-avata me-3"><img width="48" class="rounded-circle h-39"
                                                src="{{ get_user_image($newNotification->getUserData->id, 'optimized') }}"
                                                alt="">
                                            <span class="notify-type"><i class="fa fa-user"></i></span>
                                        </div>
                                        <div class="noti-details">
                                            <h4><a
                                                    href="{{ route('user.profile.view', $newNotification->getUserData->id) }}">{{ ucfirst($newNotification->getUserData->name) }}</a><span>
                                                    {{ get_phrase('accepted Your campaign Request') }}
                                            </h4>

                                            @if ($newNotification->status == '0')
                                                <div class="btn-inline">
                                                    <a href="javascript:void(0)"
                                                        onclick="ajaxAction('<?php echo route('mark.as.read.notification', $newNotification->id); ?>')"
                                                        class="btn common_btn">{{ get_phrase('Mark As Read') }}</a>
                                                </div>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                                <span
                                    class="noti-time">{{ $newNotification->created_at->timezone(Auth::user()->timezone)->diffForHumans() }}</span>
                            </li>
                      
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
