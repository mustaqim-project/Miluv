<!-- Header -->
<style>
.notification_panel{
	position: absolute;
	display: none;
	z-index: 999;
	min-width: 400px;
    right: -72px;
    top: 52px;
}

</style>

<?php
use App\Models\Notification;
use App\Models\User;
use Carbon\Carbon;

$date = Carbon::today();

$new_notification = Notification::where('reciver_user_id', auth()->user()->id)
    ->where('status', '0')
    ->orderBy('id', 'DESC')
    ->get();

$older_notification = Notification::where('reciver_user_id', auth()->user()->id)
    ->where('created_at', '<', $date)
    ->orderBy('id', 'DESC')
    ->get();
?>

<header class="header header-fixed border-0">
    <div class="container">
        <div class="header-content">
            <div class="left-content">
                <a href="javascript:void(0);" class="menu-toggler">
                    <i class="icon feather icon-grid"></i>
                </a>
            </div>
            <div class="mid-content header-logo">
                <a href="#">
                    <img src="assets/images/logo.png" alt="">
                </a>
            </div>

            @php
                $unread_notification = Notification::where('reciver_user_id', auth()->user()->id)
                    ->where('status', '0')
                    ->count();
            @endphp

            <div class="right-content dz-meta" style="margin-right: 2em;">
                <a class="notification-button position-relative" id="notification-button" href="javascript:;">
                    <i class="flaticon flaticon-notifications"></i>
                    @if ($unread_notification > 0)
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill notificatio_counter_bg">
                            {{ get_phrase($unread_notification) }}
                        </span>
                    @endif
                </a>
                <div class="notification_panel" id="notification_panel">
                    @include('frontend.notification.notification')
                </div>
            </div>

            <div class="right-content dz-meta">
                <a href="#" class="filter-icon">
                    <i class="flaticon flaticon-settings-sliders"></i>
                </a>
            </div>
        </div>
    </div>
</header>

<!-- Header -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Lalu script yang pakai jQuery -->
<script>
    $(document).ready(function () {
        $("#notification-button").click(function (e) {
            e.stopPropagation();
            $("#notification_panel").slideToggle(200);
        });

        $(document).click(function (e) {
            if (!$(e.target).closest("#notification_panel").length) {
                $("#notification_panel").slideUp(200);
            }
        });
    });
</script>
