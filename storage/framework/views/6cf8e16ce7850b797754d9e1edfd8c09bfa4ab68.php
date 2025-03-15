<div class="main_content">
    <!-- Start User Profile area -->
<div class="user-profile-area d-flex flex-wrap">
<!-- Left side -->
<div class="user-info d-flex flex-column">
<div class="user-info-basic d-flex flex-column justify-content-center">
<div class="user-graphic-element-1">
    <img src="<?php echo e(get_user_image(auth()->user()->photo),'optimized'); ?>" class="img-fluid rounded" alt="">
</div>

<div class="userImg">
    <img width="100%" src="<?php echo e(get_user_image(auth()->user()->photo),'optimized'); ?>" alt="">
</div>
<div class="userContent text-center">
    <h4 class="title mt-4"><?php echo e(auth()->user()->name); ?></h4>
    <p class="info"><?php echo e(auth()->user()->user_role); ?></p>
    <p class="user-status-verify"><?php echo e(get_phrase('Verified')); ?></p>
</div>
</div>
<div class="user-info-edit">
<div class="user-edit-title d-flex justify-content-between align-items-center">
    <h3 class="title"><?php echo e(get_phrase('Details info')); ?></h3>
</div>
<div class="user-info-edit-items">
    <div class="item">
    <p class="title"><?php echo e(get_phrase('Email')); ?></p>
    <p class="info"><?php echo e(auth()->user()->email); ?></p>
    </div>
    <div class="item">
    <p class="title"><?php echo e(get_phrase('Phone Number')); ?></p>
    <p class="info"><?php echo e(auth()->user()->phone); ?></p>
    </div>
    <div class="item">
    <p class="title"><?php echo e(get_phrase('Address')); ?></p>
    <p class="info">
    <?php echo e(auth()->user()->address); ?>

    </p>
    </div>
</div>
</div>
</div>
<!-- Right side -->
<div class="user-details-info">

<!-- Tab content -->
<div class="tab-content eNav-Tabs-content" id="myTabContent">
<div class="tab-pane fade show active" id="basicInfo" role="tabpanel" aria-labelledby="basicInfo-tab">
    <div class="eForm-layouts">
    <form action="<?php echo e(route('admin.profile.update')); ?>" method="post" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>                 
        <div class="fpb-7">
        <label for="eInputName" class="eForm-label"><?php echo e(get_phrase('Name')); ?></label>
        <input type="text" class="form-control eForm-control" id="eInputName" name="name" value="<?php echo e(auth()->user()->name); ?>" placeholder="<?php echo e(get_phrase('Your name')); ?>" aria-label="Abu ishaqk">
        </div>
        <div class="fpb-7">
        <label for="eInputEmail" class="eForm-label"><?php echo e(get_phrase('Email')); ?></label>
        <input type="email" class="form-control eForm-control" id="eInputEmail" name="email" value="<?php echo e(auth()->user()->email); ?>" placeholder="example@email.com" aria-label="example@email.com">
        </div>

        <div class="fpb-7">
        <label for="designation" class="eForm-label"><?php echo e(get_phrase('Profession')); ?></label>
        <input type="text" class="form-control eForm-control" id="profession" name="profession" value="<?php echo e(auth()->user()->profession); ?>" placeholder="<?php echo e(get_phrase('Enter your Profession')); ?>">
        </div>
        
        
        <div class="fpb-7">
        <label for="eBrithDay" class="eForm-label"><?php echo e(get_phrase('Birthday')); ?></label>
                            <input type="date" class="form-control eForm-control" id="eInputDate" name="dateofbirth" value="<?php echo e(auth()->user()->id); ?>">
        </div>
        <div class="fpb-7">
        <label for="eGenderList" class="eForm-label"><?php echo e(get_phrase('Gender')); ?></label>
        <select name="gender" class="form-control eForm-select">
            <option value="Male"><?php echo e(get_phrase('Male')); ?></option>
            <option value="Female"><?php echo e(get_phrase('Female')); ?></option>
        </select> </div>
        <div class="fpb-7">
        <label for="eInputPhone" class="eForm-label"><?php echo e(get_phrase('Phone Number')); ?></label>
        <input type="number" class="form-control eForm-control" id="eInputPhone" name="phone" value="<?php echo e(auth()->user()->phone); ?>" placeholder="00 (00) 12345 6789" aria-label="00 (00) 12345 6789">
        </div>
        <div class="fpb-7">
        <label for="eInputAddress" class="eForm-label"><?php echo e(get_phrase('Address')); ?></label>
        <input type="text" class="form-control eForm-control" id="eInputAddress" name="address" value="<?php echo e(auth()->user()->address); ?>" placeholder="<?php echo e(get_phrase('Your address')); ?>" aria-label="Melbourne, S/A 120, Australia">
        </div>

        <div class="fpb-7">
        <label for="eInputAddress" class="eForm-label"><?php echo e(get_phrase('Photo')); ?></label>
        <input type="file" class="form-control" name="profile_photo" accept="image/*">
        </div>

    <button type="submit" class="userFormEdit-btn btn"><?php echo e(get_phrase('Save Changes')); ?></button>

    </form>
    </div>
</div>

</div>
</div>
</div>
<!-- End User Profile area -->
<!-- Start Footer -->
<?php echo $__env->make('backend.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- End Footer -->
</div><?php /**PATH D:\AGUNG MUSTAQIM\drive-download-20250218T071143Z-001\PROJECT-BY-LARAGON\PROJECT-BY-LARAGON\Sociopro\resources\views/backend/admin/profile_view/profile.blade.php ENDPATH**/ ?>