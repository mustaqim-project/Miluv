<?php echo $__env->make('auth.layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    

    <!-- Main Start -->
    <main class="main my-4 p-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="login-img">
                        <img class="img-fluid" src="<?php echo e(asset('assets/frontend/images/login.png')); ?> " alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="login-txt ms-5">
                        <h3><?php echo e(get_phrase('Terms And Condition')); ?> </h3>
                        <div>
                            <?php echo script_checker($term, false); ?>
                        </div>
                    </div>
                </div>
            </div>

        </div> <!-- container end -->
    </main>
    <!-- Main End -->



<?php echo $__env->make('auth.layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\AGUNG MUSTAQIM\drive-download-20250218T071143Z-001\PROJECT-BY-LARAGON\PROJECT-BY-LARAGON\Sociopro\resources\views/frontend/settings/term.blade.php ENDPATH**/ ?>