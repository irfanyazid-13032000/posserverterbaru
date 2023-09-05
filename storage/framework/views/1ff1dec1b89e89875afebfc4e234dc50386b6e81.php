<?php $__env->startSection('title', __('Server Error')); ?>

<?php $__env->startSection('content'); ?>
    <div class="min-vh-100 h-100vh py-5 d-flex align-items-center bg-gradient-danger">
        <div class="bg-absolute-cover vh-100 overflow-hidden d-none d-md-block">
            <figure class="w-100">
                <img alt="Image placeholder" src="<?php echo e(asset('custom/img/bg-4.svg')); ?>" class="svg-inject">
            </figure>
        </div>
        <div class="container position-relative zindex-100">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-6">
                    <h6 class="display-1 mb-3 font-weight-600 "><?php echo e(__('500')); ?></h6>
                    <p class="lead text-lg  mb-5">
                        <?php echo e(__("Sorry, something has gone wrong on the website's server.")); ?>

                    </p>
                    
                    <a class="btn btn-white btn-icon rounded-pill hover-translate-y-n3" onclick="Previous()">
                        <span class="btn-inner--icon"><i class="fas fa-home"></i></span>
                        <span class="btn-inner--text"><?php echo e(__('Return home')); ?></span>
                    </a>
                </div>
                <div class="col-lg-6 d-none d-lg-block">
                    <figure class="w-100">
                        <img alt="Image placeholder" src="<?php echo e(asset('custom/img/server-down.svg')); ?>" class="svg-inject opacity-8 img-fluid" style="height: 500px;">
                    </figure>
                </div>
            </div>
        </div>
    </div>
    <script>
        function Previous() {
            window.history.back()
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('errors::minimal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\posserverterbaru\resources\views/errors/500.blade.php ENDPATH**/ ?>