<div class="main_content">
    <!-- Mani section header and breadcrumb -->
    <div class="mainSection-title">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center flex-wrap gr-15">
                    <div class="d-flex flex-column">
                        <h4><?php echo e(get_phrase('All Sponsors')); ?></h4>

                    </div>

                    <div class="export-btn-area">
                        <a href="<?php echo e(route('admin.create.sponsor')); ?>" class="export_btn" data-bs-toggle="tooltip"
                            data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                            data-bs-title="Create Ads"><?php echo e(get_phrase('Create')); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Start Admin area -->
    <div class="row">
        <div class="col-12">
            <div class="eSection-wrap-2">
                <!-- Filter area -->

                <div class="table-responsive">
                    <table class="table eTable " id="">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col"><?php echo e(get_phrase('Image')); ?></th>
                                <th scope="col"><?php echo e(get_phrase('Title')); ?></th>
                                <th scope="col"><?php echo e(get_phrase('Start Date')); ?></th>
                                <th scope="col"><?php echo e(get_phrase('Status')); ?></th>
                                <th scope="col" class="text-center"><?php echo e(get_phrase('Action')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $sponsors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $sponsor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e(++$key); ?></td>
                                    <td>
                                        <a href="<?php echo e($sponsor->ext_url); ?>" target="_blank"><img class="image-fluid"
                                                width="80px"
                                                src="<?php echo e(get_image('storage/sponsor/thumbnail/' . $sponsor->image)); ?>"></a>
                                    </td>
                                    <td><?php echo e($sponsor->name); ?></td>
                                    <td><?php echo e(date_formatter($sponsor->start_date)); ?></td>
                                    <td>

                                        <?php if($sponsor->status != 1 && $sponsor->start_date == $sponsor->end_date): ?>
                                            
                                            <span class="badge bg-success"><?php echo e(get_phrase('Active')); ?></span>
                                        <?php else: ?>
                                            
                                            <?php if($sponsor->status != 1): ?>
                                                <span
                                                    class="badge bg-secondary text-capitalize"><?php echo e(get_phrase('Disabled')); ?></span>
                                            <?php elseif(strtotime($sponsor->start_date) == strtotime($sponsor->end_date)): ?>
                                                <span
                                                    class="badge bg-primary"><?php echo e(get_phrase('Not yet published')); ?></span>
                                            <?php elseif(strtotime($sponsor->end_date) < time()): ?>
                                                <span class="badge bg-danger"><?php echo e(get_phrase('Expired')); ?></span>
                                            <?php else: ?>
                                                <span class="badge bg-success"><?php echo e(get_phrase('Active')); ?></span>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </td>

                                    <td class="text-center">
                                        <div class="adminTable-action me-auto">
                                            <button type="button"
                                                class="eBtn eBtn-black dropdown-toggle table-action-btn-2"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <?php echo e(get_phrase('Actions')); ?>

                                            </button>
                                            <ul
                                                class="dropdown-menu dropdown-menu-end eDropdown-menu-2 eDropdown-table-action">

                                                <?php if($sponsor->status != 1 && $sponsor->start_date == $sponsor->end_date): ?>
                                                    
                                                <?php else: ?>
                                                    
                                                    <?php if($sponsor->status == 1): ?>
                                                        <?php if(strtotime($sponsor->end_date) > time()): ?>
                                                            
                                                        <?php endif; ?>
                                                    <?php else: ?>
                                                        
                                                    <?php endif; ?>
                                                <?php endif; ?>


                                                <li>
                                                    <a class="dropdown-item"
                                                        href="<?php echo e(route('admin.edit.sponsor', $sponsor->id)); ?>">
                                                        <?php echo e(get_phrase('Edit')); ?>

                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item"
                                                        onclick="return confirm('<?php echo e(get_phrase('Are You Sure Want To Delete?')); ?>')"
                                                        href="<?php echo e(route('admin.delete.sponsor', $sponsor->id)); ?>">
                                                        <?php echo e(get_phrase('Delete')); ?>

                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-end">
                        <?php echo $sponsors->links(); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Admin area -->


    <!-- Start Footer -->
    <?php echo $__env->make('backend.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- End Footer -->
</div>
<?php /**PATH D:\AGUNG MUSTAQIM\drive-download-20250218T071143Z-001\PROJECT-BY-LARAGON\PROJECT-BY-LARAGON\Sociopro\resources\views/backend/admin/sponsor/index.blade.php ENDPATH**/ ?>