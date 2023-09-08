<?php
    $logo = \App\Models\Utility::get_file('uploads/logo/');
    $logo_img = \App\Models\Utility::getValByName('company_logo');
    $logo_light = \App\Models\Utility::getValByName('company_light_logo');
    $logo_dark = \App\Models\Utility::getValByName('company_dark_logo');
    $invoice_store = \App\Models\Utility::getValByName('invoice_logo');
    $s_logo = \App\Models\Utility::get_file('uploads/store_logo/');
    $lang = \App\Models\Utility::getValByName('default_language');
    if (\Auth::user()->type == 'Super Admin') {
        $company_logo = Utility::get_superadmin_logo();
    } else {
        $company_logo = Utility::get_company_logo();
    }
    $company_favicon = \App\Models\Utility::getValByName('company_favicon');
    $store_logo = \App\Models\Utility::getValByName('logo');
    if (Auth::user()->type != 'super admin') {
        $store_lang = $store_settings->lang;
        $store_id = $store_settings->id;
    }

    $file_type = config('files_types');
    $setting = App\Models\Utility::settings();

    $SITE_RTL = $setting['SITE_RTL'];

    $plan = Utility::user_plan();

    $local_storage_validation = $setting['local_storage_validation'];
    $local_storage_validations = explode(',', $local_storage_validation);

    $s3_storage_validation = $setting['s3_storage_validation'];
    $s3_storage_validations = explode(',', $s3_storage_validation);

    $wasabi_storage_validation = $setting['wasabi_storage_validation'];
    $wasabi_storage_validations = explode(',', $wasabi_storage_validation);

    $pixals_platforms = \App\Models\Utility::pixel_plateforms();

?>
<?php
    $setting = App\Models\Utility::colorset();
    $color = 'theme-3';
    if (!empty($setting['color'])) {
        $color = $setting['color'];
    }
?>

<?php if($color == 'theme-1'): ?>
    <style>
        .btn-check:checked+.btn-outline-primary,
        .btn-check:active+.btn-outline-primary,
        .btn-outline-primary:active,
        .btn-outline-primary.active,
        .btn-outline-primary.dropdown-toggle.show {
            color: #ffffff;
            background: #0CAF60 !important;
            border-color: #0CAF60 !important;

        }

        .btn-outline-primary:hover {
            color: #ffffff !important;
            background: #0CAF60 !important;
            border-color: #0CAF60 !important;
        }

        .btn.btn-outline-primary {
            color: #0CAF60;
            border-color: #0CAF60 !important;
        }
    </style>
<?php endif; ?>

<?php if($color == 'theme-2'): ?>
    <style>
        .btn-check:checked+.btn-outline-primary,
        .btn-check:active+.btn-outline-primary,
        .btn-outline-primary:active,
        .btn-outline-primary.active,
        .btn-outline-primary.dropdown-toggle.show {
            color: #ffffff !important;
            background: #584ED2 !important;
            border-color: #584ED2 !important;

        }

        .btn-outline-primary:hover {
            color: #ffffff !important;
            background: #584ED2 !important;
            border-color: #584ED2 !important;
        }

        .btn.btn-outline-primary {
            color: #584ED2;
            border-color: #584ED2 !important;
        }
    </style>
<?php endif; ?>

<?php if($color == 'theme-3'): ?>
    <style>
        .btn-check:checked+.btn-outline-primary,
        .btn-check:active+.btn-outline-primary,
        .btn-outline-primary:active,
        .btn-outline-primary.active,
        .btn-outline-primary.dropdown-toggle.show {
            color: #ffffff;
            background-color: #6fd943 !important;
            border-color: #6fd943 !important;

        }

        .btn-outline-primary:hover {
            color: #ffffff !important;
            background-color: #6fd943 !important;
            border-color: #6fd943 !important;
        }

        .btn.btn-outline-primary {
            color: #6fd943;
            border-color: #6fd943 !important;
        }
    </style>
<?php endif; ?>

<?php if($color == 'theme-4'): ?>
    <style>
        .btn-check:checked+.btn-outline-primary,
        .btn-check:active+.btn-outline-primary,
        .btn-outline-primary:active,
        .btn-outline-primary.active,
        .btn-outline-primary.dropdown-toggle.show {
            color: #ffffff;
            background-color: #145388 !important;
            border-color: #145388 !important;

        }

        .btn-outline-primary:hover {
            color: #ffffff !important;
            background-color: #145388 !important;
            border-color: #145388 !important;
        }

        .btn.btn-outline-primary {
            color: #145388;
            border-color: #145388 !important;
        }
    </style>
<?php endif; ?>

<?php if($color == 'theme-5'): ?>
    <style>
        .btn-check:checked+.btn-outline-primary,
        .btn-check:active+.btn-outline-primary,
        .btn-outline-primary:active,
        .btn-outline-primary.active,
        .btn-outline-primary.dropdown-toggle.show {
            color: #ffffff;
            background-color: #B9406B !important;
            border-color: #B9406B !important;

        }

        .btn-outline-primary:hover {
            color: #ffffff !important;
            background-color: #B9406B !important;
            border-color: #B9406B !important;
        }

        .btn.btn-outline-primary {
            color: #B9406B;
            border-color: #B9406B !important;
        }
    </style>
<?php endif; ?>

<?php if($color == 'theme-6'): ?>
    <style>
        .btn-check:checked+.btn-outline-primary,
        .btn-check:active+.btn-outline-primary,
        .btn-outline-primary:active,
        .btn-outline-primary.active,
        .btn-outline-primary.dropdown-toggle.show {
            color: #ffffff;
            background-color: #008ECC !important;
            border-color: #008ECC !important;

        }

        .btn-outline-primary:hover {
            color: #ffffff !important;
            background-color: #008ECC !important;
            border-color: #008ECC !important;
        }

        .btn.btn-outline-primary {
            color: #008ECC;
            border-color: #008ECC !important;
        }
    </style>
<?php endif; ?>

<?php if($color == 'theme-7'): ?>
    <style>
        .btn-check:checked+.btn-outline-primary,
        .btn-check:active+.btn-outline-primary,
        .btn-outline-primary:active,
        .btn-outline-primary.active,
        .btn-outline-primary.dropdown-toggle.show {
            color: #ffffff;
            background-color: #922C88 !important;
            border-color: #922C88 !important;

        }

        .btn-outline-primary:hover {
            color: #ffffff !important;
            background-color: #922C88 !important;
            border-color: #922C88 !important;
        }

        .btn.btn-outline-primary {
            color: #922C88;
            border-color: #922C88 !important;
        }
    </style>
<?php endif; ?>

<?php if($color == 'theme-8'): ?>
    <style>
        .btn-check:checked+.btn-outline-primary,
        .btn-check:active+.btn-outline-primary,
        .btn-outline-primary:active,
        .btn-outline-primary.active,
        .btn-outline-primary.dropdown-toggle.show {
            color: #ffffff;
            background-color: #C0A145 !important;
            border-color: #C0A145 !important;

        }

        .btn-outline-primary:hover {
            color: #ffffff !important;
            background-color: #C0A145 !important;
            border-color: #C0A145 !important;
        }

        .btn.btn-outline-primary {
            color: #C0A145;
            border-color: #C0A145 !important;
        }
    </style>
<?php endif; ?>

<?php if($color == 'theme-9'): ?>
    <style>
        .btn-check:checked+.btn-outline-primary,
        .btn-check:active+.btn-outline-primary,
        .btn-outline-primary:active,
        .btn-outline-primary.active,
        .btn-outline-primary.dropdown-toggle.show {
            color: #ffffff;
            background-color: #48494B !important;
            border-color: #48494B !important;

        }

        .btn-outline-primary:hover {
            color: #ffffff !important;
            background-color: #48494B !important;
            border-color: #48494B !important;
        }

        .btn.btn-outline-primary {
            color: #48494B;
            border-color: #48494B !important;
        }
    </style>
<?php endif; ?>

<?php if($color == 'theme-10'): ?>
    <style>
        .btn-check:checked+.btn-outline-primary,
        .btn-check:active+.btn-outline-primary,
        .btn-outline-primary:active,
        .btn-outline-primary.active,
        .btn-outline-primary.dropdown-toggle.show {
            color: #ffffff;
            background-color: #0C7785 !important;
            border-color: #0C7785 !important;

        }

        .btn-outline-primary:hover {
            color: #ffffff !important;
            background-color: #0C7785 !important;
            border-color: #0C7785 !important;
        }

        .btn.btn-outline-primary {
            color: #0C7785;
            border-color: #0C7785 !important;
        }
    </style>
<?php endif; ?>

<?php $__env->startSection('page-title'); ?>
    <?php if(Auth::user()->type == 'super admin'): ?>
        <?php echo e(__('Settings')); ?>

    <?php else: ?>
        <?php echo e(__('Store Settings')); ?>

    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <?php if(Auth::user()->type == 'super admin'): ?>
        <?php echo e(__('Settings')); ?>

    <?php else: ?>
        <?php echo e(__('Store Settings')); ?>

    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <?php if(Auth::user()->type == 'super admin'): ?>
        <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
        <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Settings')); ?></li>
    <?php else: ?>
        <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
        <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Store Settings')); ?></li>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('filter'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>
    <ul class="nav nav-pills cust-nav   rounded  mb-3 " id="pills-tab" role="tablist">
        <?php if(Auth::user()->type == 'super admin'): ?>
            <li class="nav-item">
                <a class="nav-link" id="brand_settings-tab" data-bs-toggle="pill" href="#brand_settings" role="tab"
                    aria-controls="brand_settings" aria-selected="false"><?php echo e(__('Brand Settings')); ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="payment_settings-tab" data-bs-toggle="pill" href="#payment_settings" role="tab"
                    aria-controls="payment_settings" aria-selected="false"><?php echo e(__('Payment Settings')); ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="email_settings-tab" data-bs-toggle="pill" href="#email_settings" role="tab"
                    aria-controls="email_settings" aria-selected="false"><?php echo e(__('Email Settings')); ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="recaptcha_settings-tab" data-bs-toggle="pill" href="#recaptcha_settings"
                    role="tab" aria-controls="recaptcha_settings"
                    aria-selected="false"><?php echo e(__('ReCaptcha Settings')); ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="storage_settings-tab" data-bs-toggle="pill" href="#storage_settings" role="tab"
                    aria-controls="storage_settings" aria-selected="false"><?php echo e(__('Storage Settings')); ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="clear_cache-tab" data-bs-toggle="pill" href="#clear_cache" role="tab"
                    aria-controls="clear_cache" aria-selected="false"><?php echo e(__('Clear Cache')); ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="cookie_consent-tab" data-bs-toggle="pill" href="#cookie_consent" role="tab"
                    aria-controls="cookie_consent" aria-selected="false"><?php echo e(__('Cookie Consent')); ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="chatgpt_settings-tab" data-bs-toggle="pill" href="#chatgpt_settings" role="tab"
                    aria-controls="chatgpt_settings" aria-selected="false"><?php echo e(__('Chat GPT Settings')); ?></a>
            </li>
        <?php else: ?>
            <li class="nav-item">
                <a class="nav-link fade active show" id="brand_settings-tab" data-bs-toggle="pill" href="#brand_settings"
                    role="tab" aria-controls="brand_settings" aria-selected="false"><?php echo e(__('Brand Settings')); ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="store_settings-tab" data-bs-toggle="pill" href="#store_settings" role="tab"
                    aria-controls="store_settings" aria-selected="false"><?php echo e(__('Store Settings')); ?> </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" id="store_payment_settings-tab" data-bs-toggle="pill" href="#store_payment_settings"
                    role="tab" aria-controls="store_payment_settings"
                    aria-selected="false"><?php echo e(__('Payment Settings')); ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="store_email_settings-tab" data-bs-toggle="pill" href="#store_email_settings"
                    role="tab" aria-controls="store_email_settings"
                    aria-selected="false"><?php echo e(__('Email Notification Settings')); ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="whatsapp_custom_massage-tab" data-bs-toggle="pill"
                    href="#whatsapp_custom_massage" role="tab" aria-controls="whatsapp_custom_massage"
                    aria-selected="false"><?php echo e(__('WhatsApp Mail Settings')); ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="twilio_settings-tab" data-bs-toggle="pill" href="#twilio_settings"
                    role="tab" aria-controls="twilio_settings" aria-selected="false"><?php echo e(__('Twilio Settings')); ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pixel_settings-tab" data-bs-toggle="pill" href="#pixel_settings" role="tab"
                    aria-controls="pixel_settings" aria-selected="false"><?php echo e(__('Pixel Settings')); ?></a>
            </li>
            <?php if($plan['pwa_store'] == 'on'): ?>
                <li class="nav-item">
                    <a class="nav-link" id="pills-pwa_setting-tab" data-bs-toggle="pill" href="#pwa_settings"
                        role="tab" aria-controls="pwa_settings" aria-selected="false"><?php echo e(__('PWA Settings')); ?></a>
                </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Webhook')): ?>
                <li class="nav-item">
                    <a class="nav-link" id="pills-webhook_setting-tab" data-bs-toggle="pill" href="#webhook_settings"
                        role="tab" aria-controls="webhook_settings"
                        aria-selected="false"><?php echo e(__('Webhook Settings')); ?></a>
                </li>
            <?php endif; ?>
            <li class="nav-item">
                <a class="nav-link" id="pills-whatsapp_setting-tab" data-bs-toggle="pill" href="#whatsapp_settings"
                    role="tab" aria-controls="whatsapp_settings"
                    aria-selected="false"><?php echo e(__('Whatsapp Settings')); ?></a>
            </li>
        <?php endif; ?>
    </ul>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css-page'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('custom/libs/summernote/summernote-bs4.css')); ?>">
    <style>
        hr {
            margin: 8px;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('script-page'); ?>
    <script src="<?php echo e(asset('custom/libs/summernote/summernote-bs4.js')); ?>"></script>
    <script type="text/javascript">
        $(document).on("click", '.send_email', function(e) {
            e.preventDefault();
            var title = $(this).attr('data-title');
            var size = 'md';
            var url = $(this).attr('data-url');
            console.log(url);
            if (typeof url != 'undefined') {
                $("#commonModal .modal-title").html(title);
                $("#commonModal .modal-dialog").addClass('modal-' + size);
                $("#commonModal").modal('show');

                $.post(url, {
                    _token: '<?php echo e(csrf_token()); ?>',
                    mail_driver: $("#mail_driver").val(),
                    mail_host: $("#mail_host").val(),
                    mail_port: $("#mail_port").val(),
                    mail_username: $("#mail_username").val(),
                    mail_password: $("#mail_password").val(),
                    mail_encryption: $("#mail_encryption").val(),
                    mail_from_address: $("#mail_from_address").val(),
                    mail_from_name: $("#mail_from_name").val(),

                }, function(data) {
                    $('#commonModal .body').html(data);
                });
            }
        });
        $(document).on('submit', '#test_email', function(e) {
            e.preventDefault();
            $("#email_sending").show();
            var post = $(this).serialize();
            var url = $(this).attr('action');
            $.ajax({
                type: "post",
                url: url,
                data: post,
                cache: false,
                beforeSend: function() {
                    $('#test_email .btn-create').attr('disabled', 'disabled');
                },
                success: function(data) {

                    if (data.is_success) {
                        show_toastr('Success', data.message, 'success');
                    } else {
                        show_toastr('Error', data.message, 'error');
                    }
                    $("#email_sending").hide();
                    $('#commonModal').modal('hide');

                },
                complete: function() {
                    $('#test_email .btn-create').removeAttr('disabled');
                },
            });
        });
    </script>

    <script type="text/javascript">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('On-Off Email Template')): ?>
            $(document).on("click", ".email-template-checkbox", function() {
                var chbox = $(this);
                $.ajax({
                    url: chbox.attr('data-url'),
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        status: chbox.val()
                    },
                    type: 'PUT',
                    success: function(response) {
                        if (response.is_success) {
                            show_toastr('Success', response.success, 'success');
                            if (chbox.val() == 1) {
                                $('#' + chbox.attr('id')).val(0);
                            } else {
                                $('#' + chbox.attr('id')).val(1);
                            }
                        } else {
                            show_toastr('Error', response.error, 'error');
                        }
                    },
                    error: function(response) {
                        response = response.responseJSON;
                        if (response.is_success) {
                            show_toastr('Error', response.error, 'error');
                        } else {
                            show_toastr('Error', response, 'error');
                        }
                    }
                })
            });
        <?php endif; ?>
    </script>
    <script>
        var scrollSpy = new bootstrap.ScrollSpy(document.body, {
            target: '#useradd-sidenav',
            offset: 300,

        })
        $(".list-group-item").click(function() {
            $('.list-group-item').filter(function() {
                return this.href == id;
            }).parent().removeClass('text-primary');
        });

        function check_theme(color_val) {
            $('#theme_color').prop('checked', false);
            $('input[value="' + color_val + '"]').prop('checked', true);
        }
    </script>

    <script>
        var scrollSpy = new bootstrap.ScrollSpy(document.body, {
            target: '#useradd-sidenav',
            offset: 300,
        })
        $(".list-group-item").click(function() {
            $('.list-group-item').filter(function() {
                return this.href == id;
            }).parent().removeClass('text-primary');
        });

        function check_theme(color_val) {
            $('#theme_color').prop('checked', false);
            $('input[value="' + color_val + '"]').prop('checked', true);
        }

        $(document).on('change', '[name=storage_setting]', function() {
            console.log($(this).val());
            if ($(this).val() == 's3') {
                $('.s3-setting').removeClass('d-none');
                $('.wasabi-setting').addClass('d-none');
                $('.local-setting').addClass('d-none');
            } else if ($(this).val() == 'wasabi') {
                $('.s3-setting').addClass('d-none');
                $('.wasabi-setting').removeClass('d-none');
                $('.local-setting').addClass('d-none');
            } else {
                $('.s3-setting').addClass('d-none');
                $('.wasabi-setting').addClass('d-none');
                $('.local-setting').removeClass('d-none');
            }
        });
    </script>
    <script>
        var multipleCancelButton = new Choices(
            '#choices-multiple-remove-button', {
                removeItemButton: true,
            }
        );
        var multipleCancelButton = new Choices(
            '#choices-multiple-remove-button1', {
                removeItemButton: true,
            }
        );
        var multipleCancelButton = new Choices(
            '#choices-multiple-remove-button2', {
                removeItemButton: true,
            }
        );
    </script>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <!-- [ Main Content ] start -->
    <div class="row">
        <!-- [ sample-page ] start -->
        <div class="col-sm-12">
            <div class="tab-content" id="pills-tabContent">
                <?php if(Auth::user()->type == 'super admin'): ?>
                    <div class="tab-pane fade active show" id="brand_settings" role="tabpanel"
                        aria-labelledby="brand_settings-tab">
                        <div class="active card" id="brand_settings">
                            <div class="card-header">
                                <h5><?php echo e(__('Brand Settings')); ?></h5>
                            </div>
                            <?php echo e(Form::model($settings, ['route' => 'business.setting', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-6 col-md-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5><?php echo e(__('Logo dark')); ?></h5>
                                            </div>
                                            <div class="card-body mt-3">
                                                <div class=" setting-card">
                                                    <div class="logo-content mt-4">

                                                        <a href="<?php echo e($logo . 'logo-dark.png' . '?timestamp=' . time()); ?>"
                                                            target="_blank">
                                                            <img id="adminlogoDark" alt="your image"
                                                                src="<?php echo e($logo . 'logo-dark.png' . '?timestamp=' . time()); ?>"
                                                                width="150px" class="big-logo">
                                                        </a>
                                                    </div>
                                                    <div class="choose-files mt-5 ">
                                                        <label for="dark_logo">
                                                            <div class=" bg-primary  m-auto"> <i
                                                                    class="ti ti-upload px-1"></i><?php echo e(__('Select image')); ?>

                                                            </div>
                                                            <input type="file" class="form-control file"
                                                                name="dark_logo" id="dark_logo"
                                                                data-filename="darklogo_update"
                                                                onchange="document.getElementById('adminlogoDark').src = window.URL.createObjectURL(this.files[0])">
                                                        </label>
                                                    </div>
                                                    <?php $__errorArgs = ['logo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <div class="row">
                                                            <span class="invalid-logo" role="alert">
                                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                                            </span>
                                                        </div>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-6 col-md-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5><?php echo e(__('Logo Light')); ?></h5>
                                            </div>
                                            <div class="card-body mt-3">
                                                <div class=" setting-card">
                                                    <div class="logo-content mt-4">
                                                        <a href="<?php echo e($logo . 'logo-light.png' . '?timestamp=' . time()); ?>"
                                                            target="_blank">
                                                            <img id="adminLogoLight" alt="your image"
                                                                src="<?php echo e($logo . 'logo-light.png' . '?timestamp=' . time()); ?>"
                                                                width="150px" class="big-logo img_setting">
                                                        </a>
                                                    </div>
                                                    <div class="choose-files mt-5 ">
                                                        <label for="light_logo">
                                                            <div class=" bg-primary  m-auto"> <i
                                                                    class="ti ti-upload px-1"></i><?php echo e(__('Select image')); ?>

                                                            </div>
                                                            <input type="file" class="form-control file"
                                                                name="light_logo" id="light_logo"
                                                                data-filename="light_logo_update"
                                                                onchange="document.getElementById('adminLogoLight').src = window.URL.createObjectURL(this.files[0])">
                                                        </label>
                                                    </div>
                                                    <?php $__errorArgs = ['logo_light'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <div class="row">
                                                            <span class="invalid-logo" role="alert">
                                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                                            </span>
                                                        </div>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-6 col-md-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5><?php echo e(__('Favicon')); ?></h5>
                                            </div>
                                            <div class="card-body admin_favicon pt-6">
                                                <div class=" setting-card">
                                                    <div class="logo-content mt-4">
                                                        
                                                        <a href="<?php echo e($logo . (isset($logo) && !empty($logo) ? $logo : 'favicon.png') . '?timestamp=' . time()); ?>"
                                                            target="_blank">
                                                            <img id="faviConLoGo" alt="your image"
                                                                src="<?php echo e($logo . 'favicon.png' . '?timestamp=' . time()); ?>"
                                                                width="50px" class="img_setting">
                                                        </a>
                                                    </div>
                                                    <div class="choose-files mt-5">
                                                        <label for="favicon">
                                                            <div class=" bg-primary  m-auto"> <i
                                                                    class="ti ti-upload px-1"></i><?php echo e(__('Choose file here')); ?>

                                                            </div>
                                                            <input type="file" class="form-control file"
                                                                id="favicon" name="favicon"
                                                                data-filename="favicon_update"
                                                                onchange="document.getElementById('faviConLoGo').src = window.URL.createObjectURL(this.files[0])">
                                                        </label>
                                                    </div>
                                                    <?php $__errorArgs = ['favicon'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <div class="row">
                                                            <span class="invalid-logo" role="alert">
                                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                                            </span>
                                                        </div>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <?php echo e(Form::label('title_text', __('Title Text'), ['class' => 'col-form-label'])); ?>

                                        <?php echo e(Form::text('title_text', null, ['class' => 'form-control', 'placeholder' => __('Title Text')])); ?>

                                        <?php $__errorArgs = ['title_text'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-title_text" role="alert">
                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <?php echo e(Form::label('footer_text', __('Footer Text'), ['class' => 'col-form-label'])); ?>

                                        <?php echo e(Form::text('footer_text', null, ['class' => 'form-control', 'placeholder' => __('Footer Text')])); ?>

                                        <?php $__errorArgs = ['footer_text'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-footer_text" role="alert">
                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <?php echo e(Form::label('default_language', __('Default Language'), ['class' => 'col-form-label'])); ?>

                                        <div class="changeLanguage">
                                            <select name="default_language" id="default_language"
                                                class="form-control custom-select" data-toggle="select">
                                                <?php $__currentLoopData = \App\Models\Utility::languages(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option <?php if($lang == $code): ?> selected <?php endif; ?>
                                                        value="<?php echo e($code); ?>"><?php echo e(Str::ucfirst($language)); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <div class="form-group">
                                            <?php echo e(Form::label('currency_symbol', __('Currency Symbol *'), ['class' => 'col-form-label'])); ?>

                                            <?php echo e(Form::text('currency_symbol', null, ['class' => 'form-control'])); ?>

                                            <small><?php echo e(__('Note: This value will be automatically assigned whenever a new store is created.')); ?></small>
                                            <?php $__errorArgs = ['currency_symbol'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="invalid-currency_symbol" role="alert">
                                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                                </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <div class="form-group">
                                            <?php echo e(Form::label('currency', __('Currency *'), ['class' => 'col-form-label'])); ?>

                                            <?php echo e(Form::text('currency', null, ['class' => 'form-control font-style'])); ?>

                                            <?php echo e(__('Note: Add currency code as per three-letter ISO code.')); ?>

                                            <small>
                                                <a href="https://stripe.com/docs/currencies"
                                                    target="_blank"><?php echo e(__('You can find out how to do that here..')); ?></a>
                                            </small>
                                            <br>
                                            <small>
                                                <?php echo e(__('This value will be automatically assigned whenever a new store is created.')); ?>

                                            </small>
                                            <?php $__errorArgs = ['currency'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="invalid-currency" role="alert">
                                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                                </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group col-md-3">
                                        <?php echo e(Form::label('display_landing_page_', __('Enable Landing Page'), ['class' => 'col-form-label'])); ?>

                                        <div class="col-12 mt-2">
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input"
                                                    name="display_landing_page" data-toggle="switchbutton"
                                                    id="display_landing_page"
                                                    <?php echo e($settings['display_landing_page'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                <label class="form-check-labe" for="display_landing_page"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <?php echo e(Form::label('SITE_RTL', __('Enable RTL'), ['class' => 'col-form-label'])); ?>

                                        <div class="col-12 mt-2">
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" data-toggle="switchbutton"
                                                    class="custom-control-input" name="SITE_RTL" id="SITE_RTL"
                                                    value="on" <?php echo e($SITE_RTL == 'on' ? 'checked="checked"' : ''); ?>>
                                                <label class="form-check-labe" for="SITE_RTL"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <?php echo e(Form::label('signup_button', __('Enable Sign-Up Page'), ['class' => 'col-form-label'])); ?>

                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" data-toggle="switchbutton"
                                                class="custom-control-input" name="signup_button" id="signup_button"
                                                <?php echo e(isset($settings['signup_button']) && $settings['signup_button'] == 'on' ? 'checked="checked"' : ''); ?>>
                                            <label class="form-check-labe" for="signup_button"></label>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <?php echo e(Form::label('verification_btn', __('Enable Email Verification'), ['class' => 'col-form-label'])); ?>

                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" data-toggle="switchbutton"
                                                class="custom-control-input" name="verification_btn"
                                                id="verification_btn"
                                                <?php echo e(isset($settings['verification_btn']) && $settings['verification_btn'] == 'on' ? 'checked="checked"' : ''); ?>>
                                            <label class="form-check-labe" for="verification_btn"></label>
                                        </div>
                                    </div>
                                </div>
                                
                                <h4 class="small-title"><?php echo e(__('Theme Customizer')); ?></h4>
                                <div class="setting-card setting-logo-box p-3">
                                    <div class="row">
                                        <div class="col-4 my-auto">
                                            <h6 class="mt-3">
                                                <i data-feather="credit-card"
                                                    class="me-2"></i><?php echo e(__('Primary color settings')); ?>

                                            </h6>
                                            <hr class="my-2" />
                                            <div class="theme-color themes-color">
                                                <a href="#!"
                                                    class="<?php echo e($settings['color'] == 'theme-1' ? 'active_color' : ''); ?>"
                                                    data-value="theme-1" onclick="check_theme('theme-1')"></a>
                                                <input type="radio" class="theme_color" name="color" value="theme-1"
                                                    style="display: none;">
                                                <a href="#!"
                                                    class="<?php echo e($settings['color'] == 'theme-2' ? 'active_color' : ''); ?> "
                                                    data-value="theme-2" onclick="check_theme('theme-2')"></a>
                                                <input type="radio" class="theme_color" name="color" value="theme-2"
                                                    style="display: none;">
                                                <a href="#!"
                                                    class="<?php echo e($settings['color'] == 'theme-3' ? 'active_color' : ''); ?>"
                                                    data-value="theme-3" onclick="check_theme('theme-3')"></a>
                                                <input type="radio" class="theme_color" name="color" value="theme-3"
                                                    style="display: none;">
                                                <a href="#!"
                                                    class="<?php echo e($settings['color'] == 'theme-4' ? 'active_color' : ''); ?>"
                                                    data-value="theme-4" onclick="check_theme('theme-4')"></a>
                                                <input type="radio" class="theme_color" name="color" value="theme-4"
                                                    style="display: none;">
                                                <a href="#!"
                                                    class="<?php echo e($settings['color'] == 'theme-5' ? 'active_color' : ''); ?>"
                                                    data-value="theme-5" onclick="check_theme('theme-5')"></a>
                                                <input type="radio" class="theme_color" name="color" value="theme-5"
                                                    style="display: none;">
                                                <br>
                                                <a href="#!"
                                                    class="<?php echo e($settings['color'] == 'theme-6' ? 'active_color' : ''); ?>"
                                                    data-value="theme-6" onclick="check_theme('theme-6')"></a>
                                                <input type="radio" class="theme_color" name="color" value="theme-6"
                                                    style="display: none;">
                                                <a href="#!"
                                                    class="<?php echo e($settings['color'] == 'theme-7' ? 'active_color' : ''); ?>"
                                                    data-value="theme-7" onclick="check_theme('theme-7')"></a>
                                                <input type="radio" class="theme_color" name="color" value="theme-7"
                                                    style="display: none;">
                                                <a href="#!"
                                                    class="<?php echo e($settings['color'] == 'theme-8' ? 'active_color' : ''); ?>"
                                                    data-value="theme-8" onclick="check_theme('theme-8')"></a>
                                                <input type="radio" class="theme_color" name="color" value="theme-8"
                                                    style="display: none;">
                                                <a href="#!"
                                                    class="<?php echo e($settings['color'] == 'theme-9' ? 'active_color' : ''); ?>"
                                                    data-value="theme-9" onclick="check_theme('theme-9')"></a>
                                                <input type="radio" class="theme_color" name="color" value="theme-9"
                                                    style="display: none;">
                                                <a href="#!"
                                                    class="<?php echo e($settings['color'] == 'theme-10' ? 'active_color' : ''); ?>"
                                                    data-value="theme-10" onclick="check_theme('theme-10')"></a>
                                                <input type="radio" class="theme_color" name="color"
                                                    value="theme-10" style="display: none;">
                                            </div>
                                        </div>
                                        <div class="col-4 my-auto">
                                            <h6>
                                                <i data-feather="layout" class="me-2"></i><?php echo e(__('Sidebar settings')); ?>

                                            </h6>
                                            <hr class="my-2" />
                                            <div class="form-check form-switch">
                                                <input type="checkbox" class="form-check-input" id="cust-theme-bg"
                                                    name="cust_theme_bg"
                                                    <?php echo e(Utility::getValByName('cust_theme_bg') == 'on' ? 'checked' : ''); ?> />
                                                <label class="form-check-label f-w-600 pl-1"
                                                    for="cust-theme-bg"><?php echo e(__('Transparent layout')); ?></label>
                                            </div>
                                        </div>
                                        <div class="col-4 my-auto">
                                            <h6>
                                                <i data-feather="sun" class="me-2"></i><?php echo e(__('Layout settings')); ?>

                                            </h6>
                                            <hr class="my-2" />
                                            <div class="form-check form-switch mt-2">
                                                <input type="checkbox" class="form-check-input" id="cust-darklayout"
                                                    name="cust_darklayout"<?php echo e(Utility::getValByName('cust_darklayout') == 'on' ? 'checked' : ''); ?> />
                                                <label class="form-check-label f-w-600 pl-1"
                                                    for="cust-darklayout"><?php echo e(__('Dark Layout')); ?></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-end">
                                    <?php echo e(Form::submit(__('Save Changes'), ['class' => 'btn btn-print-invoice  btn-primary m-r-10'])); ?>

                                </div>
                            </div>
                            <?php echo e(Form::close()); ?>

                        </div>
                    </div>
                    <div class="tab-pane fade" id="payment_settings" role="tabpanel"
                        aria-labelledby="payment_settings-tab">
                        
                        <div class="card">
                            <div class="card-header">
                                <h5><?php echo e('Payment Setting'); ?></h5>
                                <small><?php echo e(__('These details will be used to collect subscription plan payments. Each subscription plan will have a payment button based on the below configuration.')); ?></small>
                            </div>
                            <div class="card-body">
                                <form id="setting-form" method="post" action="<?php echo e(route('payment.setting')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <div class="row">
                                        <div class="col-12">
                                            
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-6 form-group">
                                                        <label class="col-form-label"><?php echo e(__('Currency')); ?></label>
                                                        <input type="text" name="currency" class="form-control"
                                                            id="currency" value="<?php echo e(env('CURRENCY')); ?>" required>
                                                        <small class="text-xs">
                                                            <?php echo e(__('Note: Add currency code as per three-letter ISO code')); ?>.
                                                            <a href="https://stripe.com/docs/currencies"
                                                                target="_blank"><?php echo e(__('you can find out how to do that here..')); ?></a>
                                                            <?php echo e(__('and This value will be automatically assigned whenever a new store is created.')); ?>

                                                        </small>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 form-group">
                                                        <label for="currency_symbol"
                                                            class="col-form-label"><?php echo e(__('Currency Symbol')); ?></label>
                                                        <input type="text" name="currency_symbol" class="form-control"
                                                            id="currency_symbol" value="<?php echo e(env('CURRENCY_SYMBOL')); ?>"
                                                            required>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="faq justify-content-center">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="accordion accordion-flush setting-accordion"
                                                    id="accordionExample">

                                                    
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="headingSeventeen">
                                                            <button class="accordion-button collapsed" type="button"
                                                                data-bs-toggle="collapse"
                                                                data-bs-target="#collapseSeventeen" aria-expanded="false"
                                                                aria-controls="collapseSeventeen">
                                                                <span
                                                                    class="d-flex align-items-center"><?php echo e(__('Manually')); ?></span>
                                                                <div class="d-flex align-items-center">
                                                                    <span class="me-2"><?php echo e(__('Enable:')); ?>:</span>
                                                                    <div class="form-check form-switch custom-switch-v1">
                                                                        <input type="hidden"
                                                                            name="is_manuallypay_enabled" value="off">
                                                                        <input type="checkbox"
                                                                            name="is_manuallypay_enabled"
                                                                            class="form-check-input input-primary"
                                                                            id="is_manuallypay_enabled"
                                                                            <?php echo e(isset($admin_payment_setting['is_manuallypay_enabled']) && $admin_payment_setting['is_manuallypay_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                        <label class="form-check-label"
                                                                            for="is_manuallypay_enabled"></label>
                                                                    </div>
                                                                </div>
                                                            </button>
                                                        </h2>
                                                        <div id="collapseSeventeen" class="accordion-collapse collapse"
                                                            aria-labelledby="headingSeventeen"
                                                            data-bs-parent="#accordionExample">
                                                            <div class="accordion-body">
                                                                <div class="row gy-4">
                                                                    <p><?php echo e(__('Requesting manual payment for the planned amount for the subscriptions plan')); ?>

                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="headingEightteen">
                                                            <button class="accordion-button collapsed" type="button"
                                                                data-bs-toggle="collapse"
                                                                data-bs-target="#collapseEightteen" aria-expanded="false"
                                                                aria-controls="collapseEightteen">
                                                                <span class="d-flex align-items-center">
                                                                    <?php echo e(__('Bank Transfer')); ?>

                                                                </span>
                                                                <div class="d-flex align-items-center">
                                                                    <span class="me-2"><?php echo e(__('Enable:')); ?></span>
                                                                    <div class="form-check form-switch custom-switch-v1">
                                                                        <input type="hidden" name="is_bank_enabled"
                                                                            value="off">
                                                                        <input type="checkbox"
                                                                            class="form-check-input input-primary"
                                                                            id="customswitchv1-1 is_bank_enabled"
                                                                            name="is_bank_enabled"
                                                                            <?php echo e(isset($admin_payment_setting['is_bank_enabled']) && $admin_payment_setting['is_bank_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                    </div>
                                                                </div>
                                                            </button>
                                                        </h2>

                                                        <div id="collapseEightteen" class="accordion-collapse collapse"
                                                            aria-labelledby="headingEightteen"
                                                            data-bs-parent="#accordionExample">
                                                            <div class="accordion-body">
                                                                <div class="row gy-4">
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <?php echo Form::label('inputname', 'Bank Details', ['class' => 'col-form-label']); ?>

                                                                            <?php
                                                                                $bank_detail = !empty($admin_payment_setting['bank_detail']) ? $admin_payment_setting['bank_detail'] : '';
                                                                            ?>
                                                                            <?php echo Form::textarea('bank_detail', $bank_detail, [
                                                                                'class' => 'form-control',
                                                                                'rows' => '6',
                                                                                // 'required' => 'required',
                                                                            ]); ?>

                                                                            <small class="text-xs">
                                                                                <?php echo e(__('Example : Bank : Bank Name <br> Account Number : 0000 0000 <br>')); ?>.
                                                                            </small>
                                                                        </div>
                                                                        <?php $__errorArgs = ['bank_detail'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                            <div class="row">
                                                                                <span class="invalid-bank_detail"
                                                                                    role="alert">
                                                                                    <strong
                                                                                        class="text-danger"><?php echo e($message); ?></strong>
                                                                                </span>
                                                                            </div>
                                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Stripe -->
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="headingFour">
                                                            <button class="accordion-button collapsed" type="button"
                                                                data-bs-toggle="collapse" data-bs-target="#collapseFour"
                                                                aria-expanded="false" aria-controls="collapseFour">
                                                                <span
                                                                    class="d-flex align-items-center"><?php echo e(__('Stripe')); ?></span>
                                                                <div class="d-flex align-items-center">
                                                                    <span class="me-2"><?php echo e(__('Enable:')); ?></span>
                                                                    <div class="form-check form-switch custom-switch-v1">
                                                                        <input type="hidden" name="is_stripe_enabled"
                                                                            value="off">
                                                                        <input type="checkbox"
                                                                            class="form-check-input input-primary"
                                                                            id="customswitchv1-1 is_stripe_enabled"
                                                                            name="is_stripe_enabled"
                                                                            <?php echo e(isset($admin_payment_setting['is_stripe_enabled']) && $admin_payment_setting['is_stripe_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                    </div>
                                                                </div>
                                                            </button>
                                                        </h2>
                                                        <div id="collapseFour" class="accordion-collapse collapse"
                                                            aria-labelledby="headingFour"
                                                            data-bs-parent="#accordionExample">
                                                            <div class="accordion-body">
                                                                <div class="row gy-4">
                                                                    <div class="col-lg-6">
                                                                        <div class="input-edits">
                                                                            <div class="form-group">
                                                                                <?php echo e(Form::label('stripe_key', __('Stripe Key'), ['class' => 'col-form-label'])); ?>

                                                                                <?php echo e(Form::text('stripe_key', isset($admin_payment_setting['stripe_key']) ? $admin_payment_setting['stripe_key'] : '', ['class' => 'form-control', 'placeholder' => __('Enter Stripe Key')])); ?>

                                                                                <?php $__errorArgs = ['stripe_key'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                                    <span class="invalid-stripe_key"
                                                                                        role="alert">
                                                                                        <strong
                                                                                            class="text-danger"><?php echo e($message); ?></strong>
                                                                                    </span>
                                                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="input-edits">
                                                                            <div class="form-group">
                                                                                <?php echo e(Form::label('stripe_secret', __('Stripe Secret'), ['class' => 'col-form-label'])); ?>

                                                                                <?php echo e(Form::text('stripe_secret', isset($admin_payment_setting['stripe_secret']) ? $admin_payment_setting['stripe_secret'] : '', ['class' => 'form-control ', 'placeholder' => __('Enter Stripe Secret')])); ?>

                                                                                <?php $__errorArgs = ['stripe_secret'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                                    <span class="invalid-stripe_secret"
                                                                                        role="alert">
                                                                                        <strong
                                                                                            class="text-danger"><?php echo e($message); ?></strong>
                                                                                    </span>
                                                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Paypal -->
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="headingFive">
                                                            <button class="accordion-button collapsed" type="button"
                                                                data-bs-toggle="collapse" data-bs-target="#collapseFive"
                                                                aria-expanded="false" aria-controls="collapseFive">
                                                                <span class="d-flex align-items-center">
                                                                    <?php echo e(__('PayPal')); ?></span>
                                                                <div class="d-flex align-items-center">
                                                                    <span class="me-2"><?php echo e(__('Enable:')); ?></span>
                                                                    <div class="form-check form-switch custom-switch-v1">
                                                                        <input type="hidden" name="is_paypal_enabled"
                                                                            value="off">
                                                                        <input type="checkbox"
                                                                            class="form-check-input input-primary"
                                                                            id="customswitchv1-1 is_paypal_enabled"
                                                                            name="is_paypal_enabled"
                                                                            <?php echo e(isset($admin_payment_setting['is_paypal_enabled']) && $admin_payment_setting['is_paypal_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                    </div>
                                                                </div>
                                                            </button>
                                                        </h2>
                                                        <div id="collapseFive" class="accordion-collapse collapse"
                                                            aria-labelledby="headingFive"
                                                            data-bs-parent="#accordionExample">
                                                            <div class="accordion-body">
                                                                <div class="col-md-12 pb-4">
                                                                    <label class="col-form-label"
                                                                        for="paypal_mode"><?php echo e(__('Paypal Environment')); ?></label>
                                                                    <br>
                                                                    <div class="d-flex">
                                                                        <div class="mr-2" style="margin-right: 15px;">
                                                                            <div class="border card p-3">
                                                                                <div class="form-check">
                                                                                    <input type="radio"
                                                                                        name="paypal_mode" value="sandbox"
                                                                                        class="form-check-input"
                                                                                        <?php echo e(!isset($admin_payment_setting['paypal_mode']) || $admin_payment_setting['paypal_mode'] == '' || $admin_payment_setting['paypal_mode'] == 'sandbox' ? 'checked="checked"' : ''); ?>>
                                                                                    <?php echo e(__('Sandbox')); ?>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mr-2">
                                                                            <div class="border card p-3">
                                                                                <div class="form-check">
                                                                                    <input type="radio"
                                                                                        name="paypal_mode" value="live"
                                                                                        class="form-check-input"
                                                                                        <?php echo e(isset($admin_payment_setting['paypal_mode']) && $admin_payment_setting['paypal_mode'] == 'live' ? 'checked="checked"' : ''); ?>>
                                                                                    <?php echo e(__('Live')); ?>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row gy-4">
                                                                    <div class="col-lg-6">
                                                                        <div class="input-edits">
                                                                            <div class="form-group">
                                                                                <label for="paypal_client_id"
                                                                                    class="col-form-label"><?php echo e(__('Client ID')); ?></label>
                                                                                <input type="text"
                                                                                    name="paypal_client_id"
                                                                                    id="paypal_client_id"
                                                                                    class="form-control"
                                                                                    value="<?php echo e(isset($admin_payment_setting['paypal_client_id']) ? $admin_payment_setting['paypal_client_id'] : ''); ?>"
                                                                                    placeholder="<?php echo e(__('Client ID')); ?>" />
                                                                                <?php if($errors->has('paypal_client_id')): ?>
                                                                                    <span class="invalid-feedback d-block">
                                                                                        <?php echo e($errors->first('paypal_client_id')); ?>

                                                                                    </span>
                                                                                <?php endif; ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="input-edits">
                                                                            <div class="form-group">
                                                                                <label
                                                                                    for="paypal_secret_key"class="col-form-label"><?php echo e(__('Secret Key')); ?></label>
                                                                                <input type="text"
                                                                                    name="paypal_secret_key"
                                                                                    id="paypal_secret_key"
                                                                                    class="form-control"
                                                                                    value="<?php echo e(isset($admin_payment_setting['paypal_secret_key']) ? $admin_payment_setting['paypal_secret_key'] : ''); ?>"
                                                                                    placeholder="<?php echo e(__('Secret Key')); ?>" />
                                                                                <?php if($errors->has('paypal_secret_key')): ?>
                                                                                    <span class="invalid-feedback d-block">
                                                                                        <?php echo e($errors->first('paypal_secret_key')); ?>

                                                                                    </span>
                                                                                <?php endif; ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Paystack -->
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="headingSix">
                                                            <button class="accordion-button collapsed" type="button"
                                                                data-bs-toggle="collapse" data-bs-target="#collapseSix"
                                                                aria-expanded="false" aria-controls="collapseSix">
                                                                <span
                                                                    class="d-flex align-items-center"><?php echo e(__('Paystack')); ?></span>
                                                                <div class="d-flex align-items-center">
                                                                    <span class="me-2"><?php echo e(__('Enable:')); ?></span>
                                                                    <div class="form-check form-switch custom-switch-v1">
                                                                        <input type="hidden" name="is_paystack_enabled"
                                                                            value="off">
                                                                        <input type="checkbox"
                                                                            class="form-check-input input-primary"
                                                                            id="customswitchv1-1 is_paystack_enabled"
                                                                            name="is_paystack_enabled"
                                                                            <?php echo e(isset($admin_payment_setting['is_paystack_enabled']) && $admin_payment_setting['is_paystack_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                    </div>
                                                                </div>
                                                            </button>
                                                        </h2>
                                                        <div id="collapseSix" class="accordion-collapse collapse"
                                                            aria-labelledby="headingSix"
                                                            data-bs-parent="#accordionExample">
                                                            <div class="accordion-body">
                                                                <div class="row gy-4">
                                                                    <div class="col-lg-6">
                                                                        <div class="input-edits">
                                                                            <div class="form-group">
                                                                                <label for="paystack_public_key"
                                                                                    class="col-form-label"><?php echo e(__('Public Key')); ?></label>
                                                                                <input type="text"
                                                                                    name="paystack_public_key"
                                                                                    id="paystack_public_key"
                                                                                    class="form-control"
                                                                                    value="<?php echo e(isset($admin_payment_setting['paystack_public_key']) ? $admin_payment_setting['paystack_public_key'] : ''); ?>"
                                                                                    placeholder="<?php echo e(__('Public Key')); ?>" />
                                                                                <?php if($errors->has('paystack_public_key')): ?>
                                                                                    <span class="invalid-feedback d-block">
                                                                                        <?php echo e($errors->first('paystack_public_key')); ?>

                                                                                    </span>
                                                                                <?php endif; ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="input-edits">
                                                                            <div class="form-group">
                                                                                <label for="paystack_secret_key"
                                                                                    class="col-form-label"><?php echo e(__('Secret Key')); ?></label>
                                                                                <input type="text"
                                                                                    name="paystack_secret_key"
                                                                                    id="paystack_secret_key"
                                                                                    class="form-control"
                                                                                    value="<?php echo e(isset($admin_payment_setting['paystack_secret_key']) ? $admin_payment_setting['paystack_secret_key'] : ''); ?>"
                                                                                    placeholder="<?php echo e(__('Secret Key')); ?>" />
                                                                                <?php if($errors->has('paystack_secret_key')): ?>
                                                                                    <span class="invalid-feedback d-block">
                                                                                        <?php echo e($errors->first('paystack_secret_key')); ?>

                                                                                    </span>
                                                                                <?php endif; ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Flutterwave -->
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="headingseven">
                                                            <button class="accordion-button collapsed" type="button"
                                                                data-bs-toggle="collapse" data-bs-target="#collapseseven"
                                                                aria-expanded="false" aria-controls="collapseseven">
                                                                <span
                                                                    class="d-flex align-items-center"><?php echo e(__('Flutterwave')); ?></span>
                                                                <div class="d-flex align-items-center">
                                                                    <span class="me-2"><?php echo e(__('Enable:')); ?></span>
                                                                    <div class="form-check form-switch custom-switch-v1">
                                                                        <input type="hidden"
                                                                            name="is_flutterwave_enabled" value="off">
                                                                        <input type="checkbox"
                                                                            class="form-check-input input-primary"
                                                                            id="customswitchv1-1 is_flutterwave_enabled"
                                                                            name="is_flutterwave_enabled"
                                                                            <?php echo e(isset($admin_payment_setting['is_flutterwave_enabled']) && $admin_payment_setting['is_flutterwave_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                    </div>
                                                                </div>
                                                            </button>
                                                        </h2>
                                                        <div id="collapseseven" class="accordion-collapse collapse"
                                                            aria-labelledby="headingseven"
                                                            data-bs-parent="#accordionExample">
                                                            <div class="accordion-body">
                                                                <div class="row gy-4">
                                                                    <div class="col-lg-6">
                                                                        <div class="input-edits">
                                                                            <div class="form-group">
                                                                                <label for="flutterwave_public_key"
                                                                                    class="col-form-label"><?php echo e(__('Public Key')); ?></label>
                                                                                <input type="text"
                                                                                    name="flutterwave_public_key"
                                                                                    id="flutterwave_public_key"
                                                                                    class="form-control"
                                                                                    value="<?php echo e(isset($admin_payment_setting['flutterwave_public_key']) ? $admin_payment_setting['flutterwave_public_key'] : ''); ?>"
                                                                                    placeholder="<?php echo e(__('Public Key')); ?>" />
                                                                                <?php if($errors->has('flutterwave_public_key')): ?>
                                                                                    <span class="invalid-feedback d-block">
                                                                                        <?php echo e($errors->first('flutterwave_public_key')); ?>

                                                                                    </span>
                                                                                <?php endif; ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="input-edits">
                                                                            <div class="form-group">
                                                                                <label for="paystack_secret_key"
                                                                                    class="col-form-label"><?php echo e(__('Secret Key')); ?></label>
                                                                                <input type="text"
                                                                                    name="flutterwave_secret_key"
                                                                                    id="flutterwave_secret_key"
                                                                                    class="form-control"
                                                                                    value="<?php echo e(isset($admin_payment_setting['flutterwave_secret_key']) ? $admin_payment_setting['flutterwave_secret_key'] : ''); ?>"
                                                                                    placeholder="<?php echo e(__('Secret Key')); ?>" />
                                                                                <?php if($errors->has('flutterwave_secret_key')): ?>
                                                                                    <span class="invalid-feedback d-block">
                                                                                        <?php echo e($errors->first('flutterwave_secret_key')); ?>

                                                                                    </span>
                                                                                <?php endif; ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Razorpay -->
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="headingeight">
                                                            <button class="accordion-button collapsed" type="button"
                                                                data-bs-toggle="collapse" data-bs-target="#collapseeight"
                                                                aria-expanded="false" aria-controls="collapseeight">
                                                                <span class="d-flex align-items-center">
                                                                    <?php echo e(__('Razorpay')); ?>

                                                                </span>
                                                                <div class="d-flex align-items-center">
                                                                    <span class="me-2"><?php echo e(__('Enable:')); ?></span>
                                                                    <div class="form-check form-switch custom-switch-v1">
                                                                        <input type="hidden" name="is_razorpay_enabled"
                                                                            value="off">
                                                                        <input type="checkbox"
                                                                            class="form-check-input input-primary"
                                                                            id="customswitchv1-1 is_razorpay_enabled"
                                                                            name="is_razorpay_enabled"
                                                                            <?php echo e(isset($admin_payment_setting['is_razorpay_enabled']) && $admin_payment_setting['is_razorpay_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                    </div>
                                                                </div>
                                                            </button>
                                                        </h2>
                                                        <div id="collapseeight" class="accordion-collapse collapse"
                                                            aria-labelledby="headingeight"
                                                            data-bs-parent="#accordionExample">
                                                            <div class="accordion-body">
                                                                <div class="row gy-4">
                                                                    <div class="col-lg-6">
                                                                        <div class="input-edits">
                                                                            <div class="form-group">
                                                                                <label for="razorpay_public_key"
                                                                                    class="col-form-label"><?php echo e(__('Public Key')); ?></label>
                                                                                <input type="text"
                                                                                    name="razorpay_public_key"
                                                                                    id="razorpay_public_key"
                                                                                    class="form-control"
                                                                                    value="<?php echo e(isset($admin_payment_setting['razorpay_public_key']) ? $admin_payment_setting['razorpay_public_key'] : ''); ?>"
                                                                                    placeholder="<?php echo e(__('Public Key')); ?>" />
                                                                                <?php if($errors->has('razorpay_public_key')): ?>
                                                                                    <span class="invalid-feedback d-block">
                                                                                        <?php echo e($errors->first('razorpay_public_key')); ?>

                                                                                    </span>
                                                                                <?php endif; ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="input-edits">
                                                                            <div class="form-group">
                                                                                <label for="paystack_secret_key"
                                                                                    class="col-form-label"><?php echo e(__('Secret Key')); ?></label>
                                                                                <input type="text"
                                                                                    name="razorpay_secret_key"
                                                                                    id="razorpay_secret_key"
                                                                                    class="form-control"
                                                                                    value="<?php echo e(isset($admin_payment_setting['razorpay_secret_key']) ? $admin_payment_setting['razorpay_secret_key'] : ''); ?>"
                                                                                    placeholder="<?php echo e(__('Secret Key')); ?>" />
                                                                                <?php if($errors->has('razorpay_secret_key')): ?>
                                                                                    <span class="invalid-feedback d-block">
                                                                                        <?php echo e($errors->first('razorpay_secret_key')); ?>

                                                                                    </span>
                                                                                <?php endif; ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Mercado Pago -->
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="headingnine">
                                                            <button class="accordion-button collapsed" type="button"
                                                                data-bs-toggle="collapse" data-bs-target="#collapsenine"
                                                                aria-expanded="false" aria-controls="collapsenine">
                                                                <span
                                                                    class="d-flex align-items-center"><?php echo e(__('Mercado Pago')); ?></span>
                                                                <div class="d-flex align-items-center">
                                                                    <span class="me-2"><?php echo e(__('Enable:')); ?></span>
                                                                    <div class="form-check form-switch custom-switch-v1">
                                                                        <input type="hidden" name="is_mercado_enabled"
                                                                            value="off">
                                                                        <input type="checkbox"
                                                                            class="form-check-input input-primary"
                                                                            id="customswitchv1-1 is_mercado_enabled"
                                                                            name="is_mercado_enabled"
                                                                            <?php echo e(isset($admin_payment_setting['is_mercado_enabled']) && $admin_payment_setting['is_mercado_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                    </div>
                                                                </div>
                                                            </button>
                                                        </h2>
                                                        <div id="collapsenine" class="accordion-collapse collapse"
                                                            aria-labelledby="headingnine"
                                                            data-bs-parent="#accordionExample">
                                                            <div class="accordion-body">
                                                                <div class="col-md-12 pb-4">
                                                                    <label class="col-form-label"
                                                                        for="mercado_mode"><?php echo e(__('Mercado Environment')); ?></label>
                                                                    <br>
                                                                    <div class="d-flex">
                                                                        <div class="mr-2" style="margin-right: 15px;">
                                                                            <div class="border card p-3">
                                                                                <div class="form-check">
                                                                                    <input type="radio"
                                                                                        name="mercado_mode"
                                                                                        value="sandbox"
                                                                                        class="form-check-input"
                                                                                        <?php echo e(!isset($admin_payment_setting['mercado_mode']) || $admin_payment_setting['mercado_mode'] == '' || $admin_payment_setting['mercado_mode'] == 'sandbox' ? 'checked="checked"' : ''); ?>>
                                                                                    <?php echo e(__('Sandbox')); ?>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mr-2">
                                                                            <div class="border card p-3">
                                                                                <div class="form-check">
                                                                                    <input type="radio"
                                                                                        name="mercado_mode" value="live"
                                                                                        class="form-check-input"
                                                                                        <?php echo e(isset($admin_payment_setting['mercado_mode']) && $admin_payment_setting['mercado_mode'] == 'live' ? 'checked="checked"' : ''); ?>>
                                                                                    <?php echo e(__('Live')); ?>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row gy-4">
                                                                    <div class="col-lg-6">
                                                                        <div class="input-edits">
                                                                            <div class="form-group">
                                                                                <label for="mercado_access_token"
                                                                                    class="col-form-label"><?php echo e(__('Access Token')); ?></label>
                                                                                <input type="text"
                                                                                    name="mercado_access_token"
                                                                                    id="mercado_access_token"
                                                                                    class="form-control"
                                                                                    value="<?php echo e(isset($admin_payment_setting['mercado_access_token']) ? $admin_payment_setting['mercado_access_token'] : ''); ?>"
                                                                                    placeholder="<?php echo e(__('Access Token')); ?>" />
                                                                                <?php if($errors->has('mercado_secret_key')): ?>
                                                                                    <span class="invalid-feedback d-block">
                                                                                        <?php echo e($errors->first('mercado_access_token')); ?>

                                                                                    </span>
                                                                                <?php endif; ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Paytm -->
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="headingten">
                                                            <button class="accordion-button collapsed" type="button"
                                                                data-bs-toggle="collapse" data-bs-target="#collapseten"
                                                                aria-expanded="false" aria-controls="collapseten">
                                                                <span class="d-flex align-items-center">
                                                                    <?php echo e(__('Paytm')); ?>

                                                                </span>
                                                                <div class="d-flex align-items-center">
                                                                    <span class="me-2"><?php echo e(__('Enable:')); ?></span>
                                                                    <div class="form-check form-switch custom-switch-v1">
                                                                        <input type="hidden" name="is_paytm_enabled"
                                                                            value="off">
                                                                        <input type="checkbox"
                                                                            class="form-check-input input-primary"
                                                                            id="customswitchv1-1 is_paytm_enabled"
                                                                            name="is_paytm_enabled"
                                                                            <?php echo e(isset($admin_payment_setting['is_paytm_enabled']) && $admin_payment_setting['is_paytm_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                    </div>
                                                                </div>
                                                            </button>
                                                        </h2>
                                                        <div id="collapseten" class="accordion-collapse collapse"
                                                            aria-labelledby="headingten"
                                                            data-bs-parent="#accordionExample">
                                                            <div class="accordion-body">
                                                                <div class="col-md-12 pb-4">
                                                                    <label class="paypal-label col-form-label"
                                                                        for="paypal_mode"><?php echo e(__('Paytm Environment')); ?></label>
                                                                    <br>

                                                                    <div class="d-flex">
                                                                        <div class="mr-2" style="margin-right: 15px;">
                                                                            <div class="border card p-3">
                                                                                <div class="form-check">
                                                                                    <label
                                                                                        class="form-check-labe text-dark">
                                                                                        <input type="radio"
                                                                                            name="paytm_mode"
                                                                                            value="local"
                                                                                            class="form-check-input"
                                                                                            <?php echo e(!isset($admin_payment_setting['paytm_mode']) || $admin_payment_setting['paytm_mode'] == '' || $admin_payment_setting['paytm_mode'] == 'local' ? 'checked="checked"' : ''); ?>>
                                                                                        <?php echo e(__('Local')); ?>

                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mr-2">
                                                                            <div class="border card p-3">
                                                                                <div class="form-check">
                                                                                    <label
                                                                                        class="form-check-labe text-dark">
                                                                                        <input type="radio"
                                                                                            name="paytm_mode"
                                                                                            value="production"
                                                                                            class="form-check-input"
                                                                                            <?php echo e(isset($admin_payment_setting['paytm_mode']) && $admin_payment_setting['paytm_mode'] == 'production' ? 'checked="checked"' : ''); ?>>
                                                                                        <?php echo e(__('Production')); ?>

                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row gy-4">
                                                                    <div class="col-lg-4">
                                                                        <div class="input-edits">
                                                                            <div class="form-group">
                                                                                <label for="paytm_merchant_id"
                                                                                    class="col-form-label"><?php echo e(__('Merchant ID')); ?></label>
                                                                                <input type="text"
                                                                                    name="paytm_merchant_id"
                                                                                    id="paytm_merchant_id"
                                                                                    class="form-control"
                                                                                    value="<?php echo e(isset($admin_payment_setting['paytm_merchant_id']) ? $admin_payment_setting['paytm_merchant_id'] : ''); ?>"
                                                                                    placeholder="<?php echo e(__('Merchant ID')); ?>" />
                                                                                <?php if($errors->has('paytm_merchant_id')): ?>
                                                                                    <span class="invalid-feedback d-block">
                                                                                        <?php echo e($errors->first('paytm_merchant_id')); ?>

                                                                                    </span>
                                                                                <?php endif; ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-4">
                                                                        <div class="input-edits">
                                                                            <div class="form-group">
                                                                                <label for="paytm_merchant_key"
                                                                                    class="col-form-label"><?php echo e(__('Merchant Key')); ?></label>
                                                                                <input type="text"
                                                                                    name="paytm_merchant_key"
                                                                                    id="paytm_merchant_key"
                                                                                    class="form-control"
                                                                                    value="<?php echo e(isset($admin_payment_setting['paytm_merchant_key']) ? $admin_payment_setting['paytm_merchant_key'] : ''); ?>"
                                                                                    placeholder="<?php echo e(__('Merchant Key')); ?>" />
                                                                                <?php if($errors->has('paytm_merchant_key')): ?>
                                                                                    <span class="invalid-feedback d-block">
                                                                                        <?php echo e($errors->first('paytm_merchant_key')); ?>

                                                                                    </span>
                                                                                <?php endif; ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-4">
                                                                        <div class="input-edits">
                                                                            <div class="form-group">
                                                                                <label for="paytm_industry_type"
                                                                                    class="col-form-label"><?php echo e(__('Industry Type')); ?></label>
                                                                                <input type="text"
                                                                                    name="paytm_industry_type"
                                                                                    id="paytm_industry_type"
                                                                                    class="form-control"
                                                                                    value="<?php echo e(isset($admin_payment_setting['paytm_industry_type']) ? $admin_payment_setting['paytm_industry_type'] : ''); ?>"
                                                                                    placeholder="<?php echo e(__('Industry Type')); ?>" />
                                                                                <?php if($errors->has('paytm_industry_type')): ?>
                                                                                    <span class="invalid-feedback d-block">
                                                                                        <?php echo e($errors->first('paytm_industry_type')); ?>

                                                                                    </span>
                                                                                <?php endif; ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Mollie -->
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="headingeleven">
                                                            <button class="accordion-button collapsed" type="button"
                                                                data-bs-toggle="collapse" data-bs-target="#collapseeleven"
                                                                aria-expanded="false" aria-controls="collapseeleven">
                                                                <span
                                                                    class="d-flex align-items-center"><?php echo e(__('Mollie')); ?></span>
                                                                <div class="d-flex align-items-center">
                                                                    <span class="me-2"><?php echo e(__('Enable:')); ?></span>
                                                                    <div class="form-check form-switch custom-switch-v1">
                                                                        <input type="hidden" name="is_mollie_enabled"
                                                                            value="off">
                                                                        <input type="checkbox"
                                                                            class="form-check-input input-primary"
                                                                            id="customswitchv1-1 is_mollie_enabled"
                                                                            name="is_mollie_enabled"
                                                                            <?php echo e(isset($admin_payment_setting['is_mollie_enabled']) && $admin_payment_setting['is_mollie_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                    </div>
                                                                </div>
                                                            </button>
                                                        </h2>
                                                        <div id="collapseeleven" class="accordion-collapse collapse"
                                                            aria-labelledby="headingeleven"
                                                            data-bs-parent="#accordionExample">
                                                            <div class="accordion-body">
                                                                <div class="row gy-4">
                                                                    <div class="col-lg-4">
                                                                        <div class="input-edits">
                                                                            <div class="form-group">
                                                                                <label for="mollie_api_key"
                                                                                    class="col-form-label"><?php echo e(__('Mollie Api Key')); ?></label>
                                                                                <input type="text"
                                                                                    name="mollie_api_key"
                                                                                    id="mollie_api_key"
                                                                                    class="form-control"
                                                                                    value="<?php echo e(isset($admin_payment_setting['mollie_api_key']) ? $admin_payment_setting['mollie_api_key'] : ''); ?>"
                                                                                    placeholder="<?php echo e(__('Mollie Api Key')); ?>" />
                                                                                <?php if($errors->has('mollie_api_key')): ?>
                                                                                    <span class="invalid-feedback d-block">
                                                                                        <?php echo e($errors->first('mollie_api_key')); ?>

                                                                                    </span>
                                                                                <?php endif; ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-4">
                                                                        <div class="input-edits">
                                                                            <div class="form-group">
                                                                                <label for="mollie_profile_id"
                                                                                    class="col-form-label"><?php echo e(__('Mollie Profile Id')); ?></label>
                                                                                <input type="text"
                                                                                    name="mollie_profile_id"
                                                                                    id="mollie_profile_id"
                                                                                    class="form-control"
                                                                                    value="<?php echo e(isset($admin_payment_setting['mollie_profile_id']) ? $admin_payment_setting['mollie_profile_id'] : ''); ?>"
                                                                                    placeholder="<?php echo e(__('Mollie Profile Id')); ?>" />
                                                                                <?php if($errors->has('mollie_profile_id')): ?>
                                                                                    <span class="invalid-feedback d-block">
                                                                                        <?php echo e($errors->first('mollie_profile_id')); ?>

                                                                                    </span>
                                                                                <?php endif; ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-4">
                                                                        <div class="input-edits">
                                                                            <div class="form-group">
                                                                                <label for="mollie_partner_id"
                                                                                    class="col-form-label"><?php echo e(__('Mollie Partner Id')); ?></label>
                                                                                <input type="text"
                                                                                    name="mollie_partner_id"
                                                                                    id="mollie_partner_id"
                                                                                    class="form-control"
                                                                                    value="<?php echo e(isset($admin_payment_setting['mollie_partner_id']) ? $admin_payment_setting['mollie_partner_id'] : ''); ?>"
                                                                                    placeholder="<?php echo e(__('Mollie Partner Id')); ?>" />
                                                                                <?php if($errors->has('mollie_partner_id')): ?>
                                                                                    <span class="invalid-feedback d-block">
                                                                                        <?php echo e($errors->first('mollie_partner_id')); ?>

                                                                                    </span>
                                                                                <?php endif; ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="headingtwelve">
                                                            <button class="accordion-button collapsed" type="button"
                                                                data-bs-toggle="collapse"
                                                                data-bs-target="#collapsetwelve" aria-expanded="false"
                                                                aria-controls="collapsetwelve">
                                                                <span
                                                                    class="d-flex align-items-center"><?php echo e(__('Skrill')); ?></span>
                                                                <div class="d-flex align-items-center">
                                                                    <span class="me-2"><?php echo e(__('Enable:')); ?></span>
                                                                    <div class="form-check form-switch custom-switch-v1">
                                                                        <input type="hidden" name="is_skrill_enabled"
                                                                            value="off">
                                                                        <input type="checkbox"
                                                                            class="form-check-input input-primary"
                                                                            id="customswitchv1-1 is_skrill_enabled"
                                                                            name="is_skrill_enabled"
                                                                            <?php echo e(isset($admin_payment_setting['is_skrill_enabled']) && $admin_payment_setting['is_skrill_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                    </div>
                                                                </div>
                                                            </button>
                                                        </h2>
                                                        <div id="collapsetwelve" class="accordion-collapse collapse"
                                                            aria-labelledby="headingtwelve"
                                                            data-bs-parent="#accordionExample">
                                                            <div class="accordion-body">
                                                                <div class="row gy-4">
                                                                    <div class="col-lg-6">
                                                                        <div class="input-edits">
                                                                            <div class="form-group">
                                                                                <label for="skrill_email"
                                                                                    class="col-form-label"><?php echo e(__('Skrill Email')); ?></label>
                                                                                <input type="email"
                                                                                    name="skrill_email"
                                                                                    id="skrill_email"
                                                                                    class="form-control"
                                                                                    value="<?php echo e(isset($admin_payment_setting['skrill_email']) ? $admin_payment_setting['skrill_email'] : ''); ?>"
                                                                                    placeholder="<?php echo e(__('Skrill Email')); ?>" />
                                                                                <?php if($errors->has('skrill_email')): ?>
                                                                                    <span
                                                                                        class="invalid-feedback d-block">
                                                                                        <?php echo e($errors->first('skrill_email')); ?>

                                                                                    </span>
                                                                                <?php endif; ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="headingthirteen">
                                                            <button class="accordion-button collapsed" type="button"
                                                                data-bs-toggle="collapse"
                                                                data-bs-target="#collapsethirteen" aria-expanded="false"
                                                                aria-controls="collapsethirteen">
                                                                <span
                                                                    class="d-flex align-items-center"><?php echo e(__('CoinGate')); ?></span>
                                                                <div class="d-flex align-items-center">
                                                                    <span class="me-2"><?php echo e(__('Enable:')); ?></span>
                                                                    <div class="form-check form-switch custom-switch-v1">
                                                                        <input type="hidden" name="is_coingate_enabled"
                                                                            value="off">
                                                                        <input type="checkbox"
                                                                            class="form-check-input input-primary"
                                                                            id="customswitchv1-1 is_coingate_enabled"
                                                                            name="is_coingate_enabled"
                                                                            <?php echo e(isset($admin_payment_setting['is_coingate_enabled']) && $admin_payment_setting['is_coingate_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                    </div>
                                                                </div>
                                                            </button>
                                                        </h2>
                                                        <div id="collapsethirteen" class="accordion-collapse collapse"
                                                            aria-labelledby="headingthirteen"
                                                            data-bs-parent="#accordionExample">
                                                            <div class="accordion-body">
                                                                <div class="col-md-12 pb-4">
                                                                    <label class="paypal-label form-control-label"
                                                                        for="coingate_mode"><?php echo e(__('CoinGate Mode')); ?></label>
                                                                    <br>
                                                                    <div class="d-flex">
                                                                        <div class="mr-2" style="margin-right: 15px;">
                                                                            <div class="border card p-3">
                                                                                <div class="form-check">
                                                                                    <label
                                                                                        class="form-check-labe text-dark">
                                                                                        <input type="radio"
                                                                                            name="coingate_mode"
                                                                                            value="sandbox"
                                                                                            class="form-check-input"
                                                                                            <?php echo e(!isset($admin_payment_setting['coingate_mode']) || $admin_payment_setting['coingate_mode'] == '' || $admin_payment_setting['coingate_mode'] == 'sandbox' ? 'checked="checked"' : ''); ?>>
                                                                                        <?php echo e(__('Sandbox')); ?>

                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mr-2">
                                                                            <div class="border card p-3">
                                                                                <div class="form-check">
                                                                                    <label
                                                                                        class="form-check-labe text-dark">
                                                                                        <input type="radio"
                                                                                            name="coingate_mode"
                                                                                            value="live"
                                                                                            class="form-check-input"
                                                                                            <?php echo e(isset($admin_payment_setting['coingate_mode']) && $admin_payment_setting['coingate_mode'] == 'live' ? 'checked="checked"' : ''); ?>>
                                                                                        <?php echo e(__('Live')); ?>

                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row gy-4">
                                                                    <div class="col-lg-6">
                                                                        <div class="input-edits">
                                                                            <div class="form-group">
                                                                                <label for="coingate_auth_token"
                                                                                    class="col-form-label"><?php echo e(__('CoinGate Auth Token')); ?></label>
                                                                                <input type="text"
                                                                                    name="coingate_auth_token"
                                                                                    id="coingate_auth_token"
                                                                                    class="form-control"
                                                                                    value="<?php echo e(isset($admin_payment_setting['coingate_auth_token']) ? $admin_payment_setting['coingate_auth_token'] : ''); ?>"
                                                                                    placeholder="<?php echo e(__('CoinGate Auth Token')); ?>" />
                                                                                <?php if($errors->has('coingate_auth_token')): ?>
                                                                                    <span
                                                                                        class="invalid-feedback d-block">
                                                                                        <?php echo e($errors->first('coingate_auth_token')); ?>

                                                                                    </span>
                                                                                <?php endif; ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="headingfourteen">
                                                            <button class="accordion-button collapsed" type="button"
                                                                data-bs-toggle="collapse"
                                                                data-bs-target="#collapsefourteen" aria-expanded="false"
                                                                aria-controls="collapsefourteen">
                                                                <span
                                                                    class="d-flex align-items-center"><?php echo e(__('Paymentwall')); ?></span>
                                                                <div class="d-flex align-items-center">
                                                                    <span class="me-2"><?php echo e('Enable:'); ?></span>
                                                                    <div class="form-check form-switch custom-switch-v1">
                                                                        <input type="hidden"
                                                                            name="is_paymentwall_enabled"
                                                                            value="off">
                                                                        <input type="checkbox"
                                                                            class="form-check-input input-primary"
                                                                            id="customswitchv1-1 is_paymentwall_enabled"
                                                                            name="is_paymentwall_enabled"
                                                                            <?php echo e(isset($admin_payment_setting['is_paymentwall_enabled']) && $admin_payment_setting['is_paymentwall_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                    </div>
                                                                </div>
                                                            </button>
                                                        </h2>
                                                        <div id="collapsefourteen" class="accordion-collapse collapse"
                                                            aria-labelledby="headingfourteen"
                                                            data-bs-parent="#accordionExample">
                                                            <div class="accordion-body">
                                                                <div class="row gy-4">
                                                                    <div class="col-lg-6">
                                                                        <div class="input-edits">
                                                                            <div class="form-group">
                                                                                <label for="paymentwall_public_key"
                                                                                    class="col-form-label"><?php echo e(__('Public Key')); ?></label>
                                                                                <input type="text"
                                                                                    name="paymentwall_public_key"
                                                                                    id="paymentwall_public_key"
                                                                                    class="form-control"
                                                                                    value="<?php echo e(isset($admin_payment_setting['paymentwall_public_key']) ? $admin_payment_setting['paymentwall_public_key'] : ''); ?>"
                                                                                    placeholder="<?php echo e(__('Public Key')); ?>" />
                                                                                <?php if($errors->has('paymentwall_public_key')): ?>
                                                                                    <span
                                                                                        class="invalid-feedback d-block">
                                                                                        <?php echo e($errors->first('paymentwall_public_key')); ?>

                                                                                    </span>
                                                                                <?php endif; ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="input-edits">
                                                                            <div class="form-group">
                                                                                <label for="paymentwall_private_key"
                                                                                    class="col-form-label"><?php echo e(__('Private Key')); ?></label>
                                                                                <input type="text"
                                                                                    name="paymentwall_private_key"
                                                                                    id="paymentwall_private_key"
                                                                                    class="form-control col-form-label"
                                                                                    value="<?php echo e(isset($admin_payment_setting['paymentwall_private_key']) ? $admin_payment_setting['paymentwall_private_key'] : ''); ?>"
                                                                                    placeholder="<?php echo e(__('Private Key')); ?>" />
                                                                                <?php if($errors->has('paymentwall_private_key')): ?>
                                                                                    <span
                                                                                        class="invalid-feedback d-block">
                                                                                        <?php echo e($errors->first('paymentwall_private_key')); ?>

                                                                                    </span>
                                                                                <?php endif; ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="headingfifteen">
                                                            <button class="accordion-button collapsed" type="button"
                                                                data-bs-toggle="collapse"
                                                                data-bs-target="#collapsefifteen" aria-expanded="false"
                                                                aria-controls="collapsefifteen">
                                                                <span
                                                                    class="d-flex align-items-center"><?php echo e(__('Payfast')); ?></span>
                                                                <div class="d-flex align-items-center">
                                                                    <span class="me-2"><?php echo e(__('Enable:')); ?></span>
                                                                    <div class="form-check form-switch custom-switch-v1">
                                                                        <input type="hidden" name="is_payfast_enabled"
                                                                            value="off">
                                                                        <input type="checkbox"
                                                                            class="form-check-input input-primary"
                                                                            id="customswitchv1-1 is_payfast_enabled"
                                                                            name="is_payfast_enabled"
                                                                            <?php echo e(isset($admin_payment_setting['is_payfast_enabled']) && $admin_payment_setting['is_payfast_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                    </div>
                                                                </div>
                                                            </button>
                                                        </h2>
                                                        <div id="collapsefifteen" class="accordion-collapse collapse"
                                                            aria-labelledby="headingfifteen"
                                                            data-bs-parent="#accordionExample">
                                                            <div class="accordion-body">
                                                                <div class="col-md-12 pb-4">
                                                                    <label class="coingate-label col-form-label"
                                                                        for="payfast_mode"><?php echo e(__('Payfast Mode')); ?></label>
                                                                    <br>
                                                                    <div class="d-flex">
                                                                        <div class="mr-2" style="margin-right: 15px;">
                                                                            <div class="border card p-3">
                                                                                <div class="form-check">
                                                                                    <label
                                                                                        class="form-check-labe text-dark">
                                                                                        <input type="radio"
                                                                                            name="payfast_mode"
                                                                                            value="sandbox"
                                                                                            class="form-check-input"
                                                                                            <?php echo e(!isset($admin_payment_setting['payfast_mode']) || $admin_payment_setting['payfast_mode'] == '' || $admin_payment_setting['payfast_mode'] == 'sandbox' ? 'checked="checked"' : ''); ?>>
                                                                                        <?php echo e(__('Sandbox')); ?>

                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mr-2">
                                                                            <div class="border card p-3">
                                                                                <div class="form-check">
                                                                                    <label
                                                                                        class="form-check-labe text-dark">
                                                                                        <input type="radio"
                                                                                            name="payfast_mode"
                                                                                            value="live"
                                                                                            class="form-check-input"
                                                                                            <?php echo e(isset($admin_payment_setting['payfast_mode']) && $admin_payment_setting['payfast_mode'] == 'live' ? 'checked="checked"' : ''); ?>>
                                                                                        <?php echo e(__('Live')); ?>

                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row gy-4">
                                                                    <div class="col-lg-4">
                                                                        <div class="input-edits">
                                                                            <div class="form-group">
                                                                                <label for="payfast_merchant_id"
                                                                                    class="col-form-label"><?php echo e(__('Merchant Id')); ?></label>
                                                                                <input type="text"
                                                                                    name="payfast_merchant_id"
                                                                                    id="payfast_merchant_id"
                                                                                    class="form-control"
                                                                                    value="<?php echo e(isset($admin_payment_setting['payfast_merchant_id']) ? $admin_payment_setting['payfast_merchant_id'] : ''); ?>"
                                                                                    placeholder="<?php echo e(__('Public Key')); ?>" />
                                                                                <?php if($errors->has('payfast_merchant_id')): ?>
                                                                                    <span
                                                                                        class="invalid-feedback d-block">
                                                                                        <?php echo e($errors->first('payfast_merchant_id')); ?>

                                                                                    </span>
                                                                                <?php endif; ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-4">
                                                                        <div class="input-edits">
                                                                            <div class="form-group">
                                                                                <label for="paymentwall_secret_key"
                                                                                    class="col-form-label"><?php echo e(__('Merchant Key')); ?></label>
                                                                                <input type="text"
                                                                                    name="payfast_merchant_key"
                                                                                    id="payfast_merchant_key"
                                                                                    class="form-control"
                                                                                    value="<?php echo e(isset($admin_payment_setting['payfast_merchant_key']) ? $admin_payment_setting['payfast_merchant_key'] : ''); ?>"
                                                                                    placeholder="<?php echo e(__('Public Key')); ?>" />
                                                                                <?php if($errors->has('payfast_merchant_key')): ?>
                                                                                    <span
                                                                                        class="invalid-feedback d-block">
                                                                                        <?php echo e($errors->first('payfast_merchant_key')); ?>

                                                                                    </span>
                                                                                <?php endif; ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-4">
                                                                        <div class="input-edits">
                                                                            <div class="form-group">
                                                                                <label for="payfast_signature"
                                                                                    class="col-form-label"><?php echo e(__('Payfast Signature')); ?></label>
                                                                                <input type="text"
                                                                                    name="payfast_signature"
                                                                                    id="payfast_signature"
                                                                                    class="form-control"
                                                                                    value="<?php echo e(isset($admin_payment_setting['payfast_signature']) ? $admin_payment_setting['payfast_signature'] : ''); ?>"
                                                                                    placeholder="<?php echo e(__('Public Key')); ?>" />
                                                                                <?php if($errors->has('payfast_signature')): ?>
                                                                                    <span
                                                                                        class="invalid-feedback d-block">
                                                                                        <?php echo e($errors->first('payfast_signature')); ?>

                                                                                    </span>
                                                                                <?php endif; ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="headingSixteen">
                                                            <button class="accordion-button collapsed" type="button"
                                                                data-bs-toggle="collapse"
                                                                data-bs-target="#collapseSixteen" aria-expanded="false"
                                                                aria-controls="collapseSixteen">
                                                                <span
                                                                    class="d-flex align-items-center"><?php echo e(__('Toyyibpay')); ?></span>
                                                                <div class="d-flex align-items-center">
                                                                    <span class="me-2"><?php echo e(__('Enable:')); ?>:</span>
                                                                    <div class="form-check form-switch custom-switch-v1">
                                                                        <input type="hidden"
                                                                            name="is_toyyibpay_enabled" value="off">
                                                                        <input type="checkbox"
                                                                            name="is_toyyibpay_enabled"
                                                                            class="form-check-input input-primary"
                                                                            id="is_toyyibpay_enabled"
                                                                            <?php echo e(isset($admin_payment_setting['is_toyyibpay_enabled']) && $admin_payment_setting['is_toyyibpay_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                        <label class="form-check-label"
                                                                            for="is_toyyibpay_enabled"></label>
                                                                    </div>
                                                                </div>
                                                            </button>
                                                        </h2>
                                                        <div id="collapseSixteen" class="accordion-collapse collapse"
                                                            aria-labelledby="headingSixteen"
                                                            data-bs-parent="#accordionExample">
                                                            <div class="accordion-body">
                                                                <div class="row gy-4">
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label for="toyyibpay_category_code"
                                                                                class="col-form-label"><?php echo e(__('Category Code')); ?></label>
                                                                            <input type="text"
                                                                                name="toyyibpay_category_code"
                                                                                id="toyyibpay_category_code"
                                                                                class="form-control"
                                                                                value="<?php echo e(!isset($admin_payment_setting['toyyibpay_category_code']) || is_null($admin_payment_setting['toyyibpay_category_code']) ? '' : $admin_payment_setting['toyyibpay_category_code']); ?>"
                                                                                placeholder="<?php echo e(__('category code')); ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label for="toyyibpay_secret_key"
                                                                                class="col-form-label"><?php echo e(__('Secret Key')); ?></label>
                                                                            <input type="text"
                                                                                name="toyyibpay_secret_key"
                                                                                id="toyyibpay_secret_key"
                                                                                class="form-control"
                                                                                value="<?php echo e(!isset($admin_payment_setting['toyyibpay_secret_key']) || is_null($admin_payment_setting['toyyibpay_secret_key']) ? '' : $admin_payment_setting['toyyibpay_secret_key']); ?>"
                                                                                placeholder="<?php echo e(__('toyyibpay secret key')); ?>">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="headingNineteen">
                                                            <button class="accordion-button collapsed" type="button"
                                                                data-bs-toggle="collapse"
                                                                data-bs-target="#collapseNineteen" aria-expanded="false"
                                                                aria-controls="collapseNineteen">
                                                                <span
                                                                    class="d-flex align-items-center"><?php echo e(__('IyziPay')); ?></span>
                                                                <div class="d-flex align-items-center">
                                                                    <span class="me-2"><?php echo e(__('Enable:')); ?>:</span>
                                                                    <div class="form-check form-switch custom-switch-v1">
                                                                        <input type="hidden" name="is_iyzipay_enabled"
                                                                            value="off">
                                                                        <input type="checkbox" name="is_iyzipay_enabled"
                                                                            class="form-check-input input-primary"
                                                                            id="is_iyzipay_enabled"
                                                                            <?php echo e(isset($admin_payment_setting['is_iyzipay_enabled']) && $admin_payment_setting['is_iyzipay_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                        <label class="form-check-label"
                                                                            for="is_iyzipay_enabled"></label>
                                                                    </div>
                                                                </div>
                                                            </button>
                                                        </h2>
                                                        <div id="collapseNineteen" class="accordion-collapse collapse"
                                                            aria-labelledby="headingNineteen"
                                                            data-bs-parent="#accordionExample">
                                                            <div class="accordion-body">
                                                                <div class="col-md-12 pb-4">
                                                                    <label class="iyzipay-label col-form-label"
                                                                        for="iyzipay_mode"><?php echo e(__('Iyzipay Environment')); ?></label>
                                                                    <br>

                                                                    <div class="d-flex">
                                                                        <div class="mr-2" style="margin-right: 15px;">
                                                                            <div class="border card p-3">
                                                                                <div class="form-check">
                                                                                    <label
                                                                                        class="form-check-labe text-dark">
                                                                                        <input type="radio"
                                                                                            name="iyzipay_mode"
                                                                                            value="sandbox"
                                                                                            class="form-check-input"
                                                                                            <?php echo e(!isset($admin_payment_setting['iyzipay_mode']) || $admin_payment_setting['iyzipay_mode'] == '' || $admin_payment_setting['iyzipay_mode'] == 'sandbox' ? 'checked="checked"' : ''); ?>>
                                                                                        <?php echo e(__('Sandbox')); ?>

                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mr-2">
                                                                            <div class="border card p-3">
                                                                                <div class="form-check">
                                                                                    <label
                                                                                        class="form-check-labe text-dark">
                                                                                        <input type="radio"
                                                                                            name="iyzipay_mode"
                                                                                            value="live"
                                                                                            class="form-check-input"
                                                                                            <?php echo e(isset($admin_payment_setting['iyzipay_mode']) && $admin_payment_setting['iyzipay_mode'] == 'live' ? 'checked="checked"' : ''); ?>>
                                                                                        <?php echo e(__('Live')); ?>

                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row gy-4">
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label for="iyzipay_api_key"
                                                                                class="col-form-label"><?php echo e(__('Iyzipay API Key')); ?></label>
                                                                            <input type="text" name="iyzipay_api_key"
                                                                                id="iyzipay_api_key"
                                                                                class="form-control"
                                                                                value="<?php echo e(!isset($admin_payment_setting['iyzipay_api_key']) || is_null($admin_payment_setting['iyzipay_api_key']) ? '' : $admin_payment_setting['iyzipay_api_key']); ?>"
                                                                                placeholder="<?php echo e(__('Iyzipay category code')); ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label for="iyzipay_secret_key"
                                                                                class="col-form-label"><?php echo e(__('Secret Key')); ?></label>
                                                                            <input type="text"
                                                                                name="iyzipay_secret_key"
                                                                                id="iyzipay_secret_key"
                                                                                class="form-control"
                                                                                value="<?php echo e(!isset($admin_payment_setting['iyzipay_secret_key']) || is_null($admin_payment_setting['iyzipay_secret_key']) ? '' : $admin_payment_setting['iyzipay_secret_key']); ?>"
                                                                                placeholder="<?php echo e(__('Iyzipay secret key')); ?>">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="headingTwenty">
                                                            <button class="accordion-button collapsed" type="button"
                                                                data-bs-toggle="collapse"
                                                                data-bs-target="#collapseTwenty" aria-expanded="false"
                                                                aria-controls="collapseTwenty">
                                                                <span
                                                                    class="d-flex align-items-center"><?php echo e(__('SS Pay')); ?></span>
                                                                <div class="d-flex align-items-center">
                                                                    <span class="me-2"><?php echo e(__('Enable:')); ?>:</span>
                                                                    <div class="form-check form-switch custom-switch-v1">
                                                                        <input type="hidden" name="is_sspay_enabled"
                                                                            value="off">
                                                                        <input type="checkbox" name="is_sspay_enabled"
                                                                            class="form-check-input input-primary"
                                                                            id="is_sspay_enabled"
                                                                            <?php echo e(isset($admin_payment_setting['is_sspay_enabled']) && $admin_payment_setting['is_sspay_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                        <label class="form-check-label"
                                                                            for="is_sspay_enabled"></label>
                                                                    </div>
                                                                </div>
                                                            </button>
                                                        </h2>
                                                        <div id="collapseTwenty" class="accordion-collapse collapse"
                                                            aria-labelledby="headingTwenty"
                                                            data-bs-parent="#accordionExample">
                                                            <div class="accordion-body">
                                                                <div class="row gy-4">
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label for="sspay_category_code"
                                                                                class="col-form-label"><?php echo e(__('SS Pay Category Code')); ?></label>
                                                                            <input type="text"
                                                                                name="sspay_category_code"
                                                                                id="sspay_category_code"
                                                                                class="form-control"
                                                                                value="<?php echo e(!isset($admin_payment_setting['sspay_category_code']) || is_null($admin_payment_setting['sspay_category_code']) ? '' : $admin_payment_setting['sspay_category_code']); ?>"
                                                                                placeholder="<?php echo e(__('SS Pay category code')); ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label for="sspay_secret_key"
                                                                                class="col-form-label"><?php echo e(__('SS Pay Secret Key')); ?></label>
                                                                            <input type="text"
                                                                                name="sspay_secret_key"
                                                                                id="sspay_secret_key"
                                                                                class="form-control"
                                                                                value="<?php echo e(!isset($admin_payment_setting['sspay_secret_key']) || is_null($admin_payment_setting['sspay_secret_key']) ? '' : $admin_payment_setting['sspay_secret_key']); ?>"
                                                                                placeholder="<?php echo e(__('SS Pay secret key')); ?>">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="headingTwentyone">
                                                            <button class="accordion-button collapsed" type="button"
                                                                data-bs-toggle="collapse"
                                                                data-bs-target="#collapseTwentyone"
                                                                aria-expanded="false" aria-controls="collapseTwentyone">
                                                                <span
                                                                    class="d-flex align-items-center"><?php echo e(__('Paytab')); ?></span>
                                                                <div class="d-flex align-items-center">
                                                                    <span class="me-2"><?php echo e(__('Enable:')); ?>:</span>
                                                                    <div class="form-check form-switch custom-switch-v1">
                                                                        <input type="hidden" name="is_paytab_enabled"
                                                                            value="off">
                                                                        <input type="checkbox" name="is_paytab_enabled"
                                                                            class="form-check-input input-primary"
                                                                            id="is_paytab_enabled"
                                                                            <?php echo e(isset($admin_payment_setting['is_paytab_enabled']) && $admin_payment_setting['is_paytab_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                        <label class="form-check-label"
                                                                            for="is_paytab_enabled"></label>
                                                                    </div>
                                                                </div>
                                                            </button>
                                                        </h2>
                                                        <div id="collapseTwentyone" class="accordion-collapse collapse"
                                                            aria-labelledby="headingTwentyone"
                                                            data-bs-parent="#accordionExample">
                                                            <div class="accordion-body">
                                                                <div class="row gy-4">
                                                                    <div class="col-lg-4">
                                                                        <div class="form-group">
                                                                            <label for="paytab_profile_id"
                                                                                class="col-form-label"><?php echo e(__('Paytab Profile Id')); ?></label>
                                                                            <input type="text"
                                                                                name="paytab_profile_id"
                                                                                id="paytab_profile_id"
                                                                                class="form-control"
                                                                                value="<?php echo e(!isset($admin_payment_setting['paytab_profile_id']) || is_null($admin_payment_setting['paytab_profile_id']) ? '' : $admin_payment_setting['paytab_profile_id']); ?>"
                                                                                placeholder="<?php echo e(__('Paytab Profile Id')); ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-4">
                                                                        <div class="form-group">
                                                                            <label for="paytab_server_key"
                                                                                class="col-form-label"><?php echo e(__('Paytab Server Key')); ?></label>
                                                                            <input type="text"
                                                                                name="paytab_server_key"
                                                                                id="paytab_server_key"
                                                                                class="form-control"
                                                                                value="<?php echo e(!isset($admin_payment_setting['paytab_server_key']) || is_null($admin_payment_setting['paytab_server_key']) ? '' : $admin_payment_setting['paytab_server_key']); ?>"
                                                                                placeholder="<?php echo e(__('Paytab Server Key')); ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-4">
                                                                        <div class="form-group">
                                                                            <label for="paytab_region"
                                                                                class="col-form-label"><?php echo e(__('Paytab Region')); ?></label>
                                                                            <input type="text" name="paytab_region"
                                                                                id="paytab_region" class="form-control"
                                                                                value="<?php echo e(!isset($admin_payment_setting['paytab_region']) || is_null($admin_payment_setting['paytab_region']) ? '' : $admin_payment_setting['paytab_region']); ?>"
                                                                                placeholder="<?php echo e(__('Paytab Region')); ?>">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="headingTwentytwo">
                                                            <button class="accordion-button collapsed" type="button"
                                                                data-bs-toggle="collapse"
                                                                data-bs-target="#collapseTwentytwo"
                                                                aria-expanded="false" aria-controls="collapseTwentytwo">
                                                                <span
                                                                    class="d-flex align-items-center"><?php echo e(__('Benefit')); ?></span>
                                                                <div class="d-flex align-items-center">
                                                                    <span class="me-2"><?php echo e(__('Enable:')); ?>:</span>
                                                                    <div class="form-check form-switch custom-switch-v1">
                                                                        <input type="hidden" name="is_benefit_enabled"
                                                                            value="off">
                                                                        <input type="checkbox" name="is_benefit_enabled"
                                                                            class="form-check-input input-primary"
                                                                            id="is_benefit_enabled"
                                                                            <?php echo e(isset($admin_payment_setting['is_benefit_enabled']) && $admin_payment_setting['is_benefit_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                        <label class="form-check-label"
                                                                            for="is_benefit_enabled"></label>
                                                                    </div>
                                                                </div>
                                                            </button>
                                                        </h2>
                                                        <div id="collapseTwentytwo" class="accordion-collapse collapse"
                                                            aria-labelledby="headingTwentytwo"
                                                            data-bs-parent="#accordionExample">
                                                            <div class="accordion-body">
                                                                <div class="row gy-4">
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label for="benefit_secret_key"
                                                                                class="col-form-label"><?php echo e(__('Benefit Key')); ?></label>
                                                                            <input type="text"
                                                                                name="benefit_secret_key"
                                                                                id="benefit_secret_key"
                                                                                class="form-control"
                                                                                value="<?php echo e(!isset($admin_payment_setting['benefit_secret_key']) || is_null($admin_payment_setting['benefit_secret_key']) ? '' : $admin_payment_setting['benefit_secret_key']); ?>"
                                                                                placeholder="<?php echo e(__('Benefit Key')); ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label for="publishable_api_key"
                                                                                class="col-form-label"><?php echo e(__('Benefit Secret Key')); ?></label>
                                                                            <input type="text"
                                                                                name="publishable_api_key"
                                                                                id="publishable_api_key"
                                                                                class="form-control"
                                                                                value="<?php echo e(!isset($admin_payment_setting['publishable_api_key']) || is_null($admin_payment_setting['publishable_api_key']) ? '' : $admin_payment_setting['publishable_api_key']); ?>"
                                                                                placeholder="<?php echo e(__('Benefit Secret Key')); ?>">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="headingTwentyTwo">
                                                            <button class="accordion-button collapsed" type="button"
                                                                data-bs-toggle="collapse"
                                                                data-bs-target="#collapseTwentyThree"
                                                                aria-expanded="false"
                                                                aria-controls="collapseTwentyThree">
                                                                <span class="d-flex align-items-center">
                                                                    <?php echo e(__('Cashfree')); ?>

                                                                </span>
                                                                <div class="d-flex align-items-center">
                                                                    <span class="me-2"><?php echo e(__('Enable')); ?>::</span>
                                                                    <div class="form-check form-switch custom-switch-v1">
                                                                        <input type="hidden" name="is_cashfree_enabled"
                                                                            value="off">
                                                                        <input type="checkbox"
                                                                            class="form-check-input input-primary"
                                                                            name="is_cashfree_enabled"
                                                                            id="is_cashfree_enabled"
                                                                            <?php echo e(isset($admin_payment_setting['is_cashfree_enabled']) && $admin_payment_setting['is_cashfree_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                        <label class="form-check-label"
                                                                            for="is_cashfree_enabled"></label>
                                                                    </div>
                                                                </div>
                                                            </button>
                                                        </h2>
                                                        <div id="collapseTwentyThree"
                                                            class="accordion-collapse collapse"
                                                            aria-labelledby="headingTwentyTwo"
                                                            data-bs-parent="#accordionExample">
                                                            <div class="accordion-body">
                                                                <div class="row gy-4">

                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <?php echo e(Form::label('cashfree_api_key', __('Cashfree Key'), ['class' => 'col-form-label'])); ?>

                                                                            <?php echo e(Form::text('cashfree_api_key', isset($admin_payment_setting['cashfree_api_key']) ? $admin_payment_setting['cashfree_api_key'] : '', ['class' => 'form-control', 'placeholder' => __('Enter Cashfree Key')])); ?>

                                                                            <?php $__errorArgs = ['cashfree_api_key'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                                <span class="invalid-cashfree_api_key"
                                                                                    role="alert">
                                                                                    <strong
                                                                                        class="text-danger"><?php echo e($message); ?></strong>
                                                                                </span>
                                                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <?php echo e(Form::label('cashfree_secret_key', __('Cashfree Secret Key'), ['class' => 'col-form-label'])); ?>

                                                                            <?php echo e(Form::text('cashfree_secret_key', isset($admin_payment_setting['cashfree_secret_key']) ? $admin_payment_setting['cashfree_secret_key'] : '', ['class' => 'form-control ', 'placeholder' => __('Enter Cashfree Secret key')])); ?>

                                                                            <?php $__errorArgs = ['cashfree_secret_key'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                                <span class="invalid-cashfree_secret_key"
                                                                                    role="alert">
                                                                                    <strong
                                                                                        class="text-danger"><?php echo e($message); ?></strong>
                                                                                </span>
                                                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="headingTwentythree">
                                                            <button class="accordion-button" type="button"
                                                                data-bs-toggle="collapse"
                                                                data-bs-target="#collapseTwentyfour"
                                                                aria-expanded="true" aria-controls="collapseTwentyfour">
                                                                <span class="d-flex align-items-center">
                                                                    <?php echo e(__('Aamarpay')); ?>

                                                                </span>
                                                                <div class="d-flex align-items-center">
                                                                    <label class="form-check-label m-1"
                                                                        for="is_aamarpay_enabled"><?php echo e(__('Enable')); ?></label>
                                                                    <div class="form-check form-switch custom-switch-v1">
                                                                        <input type="hidden" name="is_aamarpay_enabled"
                                                                            value="off">
                                                                        <input type="checkbox"
                                                                            class="form-check-input input-primary"
                                                                            name="is_aamarpay_enabled"
                                                                            id="is_aamarpay_enabled"
                                                                            <?php echo e(isset($admin_payment_setting['is_aamarpay_enabled']) && $admin_payment_setting['is_aamarpay_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                    </div>
                                                                </div>
                                                            </button>
                                                        </h2>
                                                        <div id="collapseTwentyfour" class="accordion-collapse collapse"
                                                            aria-labelledby="headingTwentythree"
                                                            data-bs-parent="#accordionExample">
                                                            <div class="accordion-body">
                                                                <div class="row pt-2">
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <?php echo e(Form::label('aamarpay_store_id', __('Store Id'), ['class' => 'form-label'])); ?>

                                                                            <?php echo e(Form::text('aamarpay_store_id', isset($admin_payment_setting['aamarpay_store_id']) ? $admin_payment_setting['aamarpay_store_id'] : '', ['class' => 'form-control', 'placeholder' => __('Store Id')])); ?><br>
                                                                            <?php if($errors->has('aamarpay_store_id')): ?>
                                                                                <span class="invalid-feedback d-block">
                                                                                    <?php echo e($errors->first('aamarpay_store_id')); ?>

                                                                                </span>
                                                                            <?php endif; ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <?php echo e(Form::label('aamarpay_signature_key', __('Signature Key'), ['class' => 'form-label'])); ?>

                                                                            <?php echo e(Form::text('aamarpay_signature_key', isset($admin_payment_setting['aamarpay_signature_key']) ? $admin_payment_setting['aamarpay_signature_key'] : '', ['class' => 'form-control', 'placeholder' => __('Signature Key')])); ?><br>
                                                                            <?php if($errors->has('aamarpay_signature_key')): ?>
                                                                                <span class="invalid-feedback d-block">
                                                                                    <?php echo e($errors->first('aamarpay_signature_key')); ?>

                                                                                </span>
                                                                            <?php endif; ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <?php echo e(Form::label('aamarpay_description', __('Description'), ['class' => 'form-label'])); ?>

                                                                            <?php echo e(Form::text('aamarpay_description', isset($admin_payment_setting['aamarpay_description']) ? $admin_payment_setting['aamarpay_description'] : '', ['class' => 'form-control', 'placeholder' => __('Description')])); ?><br>
                                                                            <?php if($errors->has('aamarpay_description')): ?>
                                                                                <span class="invalid-feedback d-block">
                                                                                    <?php echo e($errors->first('aamarpay_description')); ?>

                                                                                </span>
                                                                            <?php endif; ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                      
                                                      <div class="accordion-item">
                                                        <h2 class="accordion-header" id="headingTwentyfour">
                                                            <button class="accordion-button" type="button"
                                                                data-bs-toggle="collapse"
                                                                data-bs-target="#collapseTwentyfive"
                                                                aria-expanded="true" aria-controls="collapseTwentyfive">
                                                                <span class="d-flex align-items-center">
                                                                    <?php echo e(__('Pay TR')); ?>

                                                                </span>
                                                                <div class="d-flex align-items-center">
                                                                    <label class="form-check-label m-1"
                                                                        for="is_paytr_enabled"><?php echo e(__('Enable')); ?></label>
                                                                    <div class="form-check form-switch custom-switch-v1">
                                                                        <input type="hidden" name="is_paytr_enabled"
                                                                            value="off">
                                                                        <input type="checkbox"
                                                                            class="form-check-input input-primary"
                                                                            name="is_paytr_enabled"
                                                                            id="is_paytr_enabled"
                                                                            <?php echo e(isset($admin_payment_setting['is_paytr_enabled']) && $admin_payment_setting['is_paytr_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                    </div>
                                                                </div>
                                                            </button>
                                                        </h2>
                                                        <div id="collapseTwentyfive" class="accordion-collapse collapse"
                                                            aria-labelledby="headingTwentyfour"
                                                            data-bs-parent="#accordionExample">
                                                            <div class="accordion-body">
                                                                <div class="row pt-2">
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <?php echo e(Form::label('paytr_merchant_id', __('Merchant Id'), ['class' => 'form-label'])); ?>

                                                                            <?php echo e(Form::text('paytr_merchant_id', isset($admin_payment_setting['paytr_merchant_id']) ? $admin_payment_setting['paytr_merchant_id'] : '', ['class' => 'form-control', 'placeholder' => __('Merchant Id')])); ?><br>
                                                                            <?php if($errors->has('paytr_merchant_id')): ?>
                                                                                <span class="invalid-feedback d-block">
                                                                                    <?php echo e($errors->first('paytr_merchant_id')); ?>

                                                                                </span>
                                                                            <?php endif; ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <?php echo e(Form::label('paytr_merchant_key', __('Merchant Key'), ['class' => 'form-label'])); ?>

                                                                            <?php echo e(Form::text('paytr_merchant_key', isset($admin_payment_setting['paytr_merchant_key']) ? $admin_payment_setting['paytr_merchant_key'] : '', ['class' => 'form-control', 'placeholder' => __('Merchant Key')])); ?><br>
                                                                            <?php if($errors->has('paytr_merchant_key')): ?>
                                                                                <span class="invalid-feedback d-block">
                                                                                    <?php echo e($errors->first('paytr_merchant_key')); ?>

                                                                                </span>
                                                                            <?php endif; ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <?php echo e(Form::label('paytr_merchant_salt', __('Merchant Salt'), ['class' => 'form-label'])); ?>

                                                                            <?php echo e(Form::text('paytr_merchant_salt', isset($admin_payment_setting['paytr_merchant_salt']) ? $admin_payment_setting['paytr_merchant_salt'] : '', ['class' => 'form-control', 'placeholder' => __('Merchant Salt')])); ?><br>
                                                                            <?php if($errors->has('paytr_merchant_salt')): ?>
                                                                                <span class="invalid-feedback d-block">
                                                                                    <?php echo e($errors->first('paytr_merchant_salt')); ?>

                                                                                </span>
                                                                            <?php endif; ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer p-0">
                                        <div class="col-sm-12 mt-3 px-2">
                                            <div class="text-end">
                                                <?php echo e(Form::submit(__('Save Changes'), ['class' => 'btn btn-xs btn-primary'])); ?>

                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="email_settings" role="tabpanel"
                        aria-labelledby="email_settings-tab">
                        <div class="card" id="email_settings">
                            <?php echo e(Form::open(['route' => 'email.setting', 'method' => 'post'])); ?>

                            <div class="card-header">
                                <h5><?php echo e(__('Email Settings')); ?></h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <?php echo e(Form::label('mail_driver', __('Mail Driver'), ['class' => 'col-form-label'])); ?>

                                        <?php echo e(Form::text('mail_driver', env('MAIL_DRIVER'), ['class' => 'form-control', 'placeholder' => __('Enter Mail Driver')])); ?>

                                        <?php $__errorArgs = ['mail_driver'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-mail_driver" role="alert">
                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <?php echo e(Form::label('mail_host', __('Mail Host'), ['class' => 'col-form-label'])); ?>

                                        <?php echo e(Form::text('mail_host', env('MAIL_HOST'), ['class' => 'form-control ', 'placeholder' => __('Enter Mail Host')])); ?>

                                        <?php $__errorArgs = ['mail_host'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-mail_driver" role="alert">
                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <?php echo e(Form::label('mail_port', __('Mail Port'), ['class' => 'col-form-label'])); ?>

                                        <?php echo e(Form::text('mail_port', env('MAIL_PORT'), ['class' => 'form-control', 'placeholder' => __('Enter Mail Port')])); ?>

                                        <?php $__errorArgs = ['mail_port'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-mail_port" role="alert">
                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <?php echo e(Form::label('mail_username', __('Mail Username'), ['class' => 'col-form-label'])); ?>

                                        <?php echo e(Form::text('mail_username', env('MAIL_USERNAME'), ['class' => 'form-control', 'placeholder' => __('Enter Mail Username')])); ?>

                                        <?php $__errorArgs = ['mail_username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-mail_username" role="alert">
                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <?php echo e(Form::label('mail_password', __('Mail Password'), ['class' => 'col-form-label'])); ?>

                                        <?php echo e(Form::text('mail_password', env('MAIL_PASSWORD'), ['class' => 'form-control', 'placeholder' => __('Enter Mail Password')])); ?>

                                        <?php $__errorArgs = ['mail_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-mail_password" role="alert">
                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <?php echo e(Form::label('mail_encryption', __('Mail Encryption'), ['class' => 'col-form-label'])); ?>

                                        <?php echo e(Form::text('mail_encryption', env('MAIL_ENCRYPTION'), ['class' => 'form-control', 'placeholder' => __('Enter Mail Encryption')])); ?>

                                        <?php $__errorArgs = ['mail_encryption'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-mail_encryption" role="alert">
                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <?php echo e(Form::label('mail_from_address', __('Mail From Address'), ['class' => 'col-form-label'])); ?>

                                        <?php echo e(Form::text('mail_from_address', env('MAIL_FROM_ADDRESS'), ['class' => 'form-control', 'placeholder' => __('Enter Mail From Address')])); ?>

                                        <?php $__errorArgs = ['mail_from_address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-mail_from_address" role="alert">
                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <?php echo e(Form::label('mail_from_name', __('Mail From Name'), ['class' => 'col-form-label'])); ?>

                                        <?php echo e(Form::text('mail_from_name', env('MAIL_FROM_NAME'), ['class' => 'form-control', 'placeholder' => __('Enter Mail From Name')])); ?>

                                        <?php $__errorArgs = ['mail_from_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-mail_from_name" role="alert">
                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <a href="#" data-url="<?php echo e(route('test.mail')); ?>" data-ajax-popup="true"
                                            data-title="<?php echo e(__('Send Test Mail')); ?>"
                                            class="send_email btn btn-print-invoice  btn-primary m-r-10">
                                            <?php echo e(__('Send Test Mail')); ?>

                                        </a>
                                    </div>
                                    <div class="form-group col-md-6 d-flex justify-content-end">
                                        <?php echo e(Form::submit(__('Save Changes'), ['class' => 'btn btn-print-invoice  btn-primary m-r-10'])); ?>

                                    </div>
                                </div>
                            </div>
                            <?php echo e(Form::close()); ?>

                        </div>
                    </div>
                    <div class="tab-pane fade" id="recaptcha_settings" role="tabpanel"
                        aria-labelledby="recaptcha_settings-tab">
                        <div class="card" id="recaptcha_settings">
                            <form method="POST" action="<?php echo e(route('recaptcha.settings.store')); ?>"
                                accept-charset="UTF-8">
                                <?php echo csrf_field(); ?>
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-6">
                                            <h5><?php echo e(__('ReCaptcha Settings')); ?></h5>
                                            <label class="custom-control-label form-control-label"
                                                for="recaptcha_module">
                                                <?php echo e(__('Google Recaptcha')); ?>

                                                <a href="https://phppot.com/php/how-to-get-google-recaptcha-site-and-secret-key/"
                                                    target="_blank" class="text-blue">
                                                    <small>(<?php echo e(__('How to Get Google reCaptcha Site and Secret key')); ?>)</small>
                                                </a>
                                            </label>
                                        </div>

                                        <div class="col-6 d-flex justify-content-end">
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" data-toggle="switchbutton"
                                                    style="width: 86.125px;height: 41.375px;"
                                                    class="custom-control-input recaptcha_module"
                                                    name="recaptcha_module" id="recaptcha_module" value="yes"
                                                    <?php echo e(env('RECAPTCHA_MODULE') == 'yes' ? 'checked="checked"' : ''); ?>>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row recaptcha">
                                        <div class="col-lg-6 col-md-6 col-sm-6 form-group">
                                            <label for="google_recaptcha_key"
                                                class="col-form-label"><?php echo e(__('Google Recaptcha Key')); ?></label>
                                            <input class="form-control"
                                                placeholder="<?php echo e(__('Enter Google Recaptcha Key')); ?>"
                                                name="google_recaptcha_key" type="text"
                                                value="<?php echo e(env('NOCAPTCHA_SITEKEY')); ?>" id="google_recaptcha_key">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 form-group">
                                            <label for="google_recaptcha_secret"
                                                class="col-form-label"><?php echo e(__('Google Recaptcha Secret')); ?></label>
                                            <input class="form-control "
                                                placeholder="<?php echo e(__('Enter Google Recaptcha Secret')); ?>"
                                                name="google_recaptcha_secret" type="text"
                                                value="<?php echo e(env('NOCAPTCHA_SECRET')); ?>" id="google_recaptcha_secret">
                                        </div>
                                    </div>
                                    <div class="col-lg-12  d-flex justify-content-end mb-5">
                                        <?php echo e(Form::submit(__('Save Changes'), ['class' => 'btn btn-print-invoice  btn-primary m-r-10'])); ?>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="storage_settings" role="tabpanel"
                        aria-labelledby="storage_settings-tab">
                        <div id="storage_settings" class="card mb-3">
                            <?php echo e(Form::open(['route' => 'storage.setting.store', 'enctype' => 'multipart/form-data'])); ?>

                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-10 col-md-10 col-sm-10">
                                        <h5 class=""><?php echo e(__('Storage Settings')); ?></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="pe-2">
                                        <input type="radio" class="btn-check" name="storage_setting"
                                            id="local-outlined" autocomplete="off"
                                            <?php echo e($settings['storage_setting'] == 'local' ? 'checked' : ''); ?>

                                            value="local" checked>
                                        <label class="btn btn-outline-primary"
                                            for="local-outlined"><?php echo e(__('Local')); ?></label>
                                    </div>
                                    <div class="pe-2">
                                        <input type="radio" class="btn-check" name="storage_setting"
                                            id="s3-outlined" autocomplete="off"
                                            <?php echo e($settings['storage_setting'] == 's3' ? 'checked' : ''); ?> value="s3">
                                        <label class="btn btn-outline-primary" for="s3-outlined">
                                            <?php echo e(__('AWS S3')); ?></label>
                                    </div>
                                    <div class="pe-2">
                                        <input type="radio" class="btn-check" name="storage_setting"
                                            id="wasabi-outlined" autocomplete="off"
                                            <?php echo e($settings['storage_setting'] == 'wasabi' ? 'checked' : ''); ?>

                                            value="wasabi">
                                        <label class="btn btn-outline-primary"
                                            for="wasabi-outlined"><?php echo e(__('Wasabi')); ?></label>
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <div
                                        class="local-setting row <?php echo e($settings['storage_setting'] == 'local' ? ' ' : 'd-none'); ?>">
                                        
                                        <div class="col-lg-6 col-md-11 col-sm-12">
                                            <?php echo e(Form::label('local_storage_validation', __('Only Upload Files'), ['class' => ' form-label'])); ?>

                                            <select name="local_storage_validation[]" class="form-control"
                                                name="choices-multiple-remove-button"
                                                id="choices-multiple-remove-button" placeholder="This is a placeholder"
                                                multiple>
                                                <?php $__currentLoopData = $file_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option <?php if(in_array($f, $local_storage_validations)): ?> selected <?php endif; ?>>
                                                        <?php echo e($f); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-label"
                                                    for="local_storage_max_upload_size"><?php echo e(__('Max upload size ( In KB)')); ?></label>
                                                <input type="number" name="local_storage_max_upload_size"
                                                    class="form-control"
                                                    value="<?php echo e(!isset($settings['local_storage_max_upload_size']) || is_null($settings['local_storage_max_upload_size']) ? '' : $settings['local_storage_max_upload_size']); ?>"
                                                    placeholder="<?php echo e(__('Max upload size')); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="s3-setting row <?php echo e($settings['storage_setting'] == 's3' ? ' ' : 'd-none'); ?>">
                                        <div class=" row ">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label"
                                                        for="s3_key"><?php echo e(__('S3 Key')); ?></label>
                                                    <input type="text" name="s3_key" class="form-control"
                                                        value="<?php echo e(!isset($settings['s3_key']) || is_null($settings['s3_key']) ? '' : $settings['s3_key']); ?>"
                                                        placeholder="<?php echo e(__('S3 Key')); ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label"
                                                        for="s3_secret"><?php echo e(__('S3 Secret')); ?></label>
                                                    <input type="text" name="s3_secret" class="form-control"
                                                        value="<?php echo e(!isset($settings['s3_secret']) || is_null($settings['s3_secret']) ? '' : $settings['s3_secret']); ?>"
                                                        placeholder="<?php echo e(__('S3 Secret')); ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label"
                                                        for="s3_region"><?php echo e(__('S3 Region')); ?></label>
                                                    <input type="text" name="s3_region" class="form-control"
                                                        value="<?php echo e(!isset($settings['s3_region']) || is_null($settings['s3_region']) ? '' : $settings['s3_region']); ?>"
                                                        placeholder="<?php echo e(__('S3 Region')); ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label"
                                                        for="s3_bucket"><?php echo e(__('S3 Bucket')); ?></label>
                                                    <input type="text" name="s3_bucket" class="form-control"
                                                        value="<?php echo e(!isset($settings['s3_bucket']) || is_null($settings['s3_bucket']) ? '' : $settings['s3_bucket']); ?>"
                                                        placeholder="<?php echo e(__('S3 Bucket')); ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label"
                                                        for="s3_url"><?php echo e(__('S3 URL')); ?></label>
                                                    <input type="text" name="s3_url" class="form-control"
                                                        value="<?php echo e(!isset($settings['s3_url']) || is_null($settings['s3_url']) ? '' : $settings['s3_url']); ?>"
                                                        placeholder="<?php echo e(__('S3 URL')); ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label"
                                                        for="s3_endpoint"><?php echo e(__('S3 Endpoint')); ?></label>
                                                    <input type="text" name="s3_endpoint" class="form-control"
                                                        value="<?php echo e(!isset($settings['s3_endpoint']) || is_null($settings['s3_endpoint']) ? '' : $settings['s3_endpoint']); ?>"
                                                        placeholder="<?php echo e(__('S3 Bucket')); ?>">
                                                </div>
                                            </div>
                                            <div class="form-group col-8 switch-width">
                                                <?php echo e(Form::label('s3_storage_validation', __('Only Upload Files'), ['class' => ' form-label'])); ?>

                                                <select name="s3_storage_validation[]" class="form-control"
                                                    name="choices-multiple-remove-button"
                                                    id="choices-multiple-remove-button1"
                                                    placeholder="This is a placeholder" multiple>
                                                    <?php $__currentLoopData = $file_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option <?php if(in_array($f, $s3_storage_validations)): ?> selected <?php endif; ?>>
                                                            <?php echo e($f); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="form-label"
                                                        for="s3_max_upload_size"><?php echo e(__('Max upload size (In KB)')); ?></label>
                                                    <input type="number" name="s3_max_upload_size"
                                                        class="form-control"
                                                        value="<?php echo e(!isset($settings['s3_max_upload_size']) || is_null($settings['s3_max_upload_size']) ? '' : $settings['s3_max_upload_size']); ?>"
                                                        placeholder="<?php echo e(__('Max upload size')); ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="wasabi-setting row <?php echo e($settings['storage_setting'] == 'wasabi' ? ' ' : 'd-none'); ?>">
                                        <div class=" row ">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label"
                                                        for="s3_key"><?php echo e(__('Wasabi Key')); ?></label>
                                                    <input type="text" name="wasabi_key" class="form-control"
                                                        value="<?php echo e(!isset($settings['wasabi_key']) || is_null($settings['wasabi_key']) ? '' : $settings['wasabi_key']); ?>"
                                                        placeholder="<?php echo e(__('Wasabi Key')); ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label"
                                                        for="s3_secret"><?php echo e(__('Wasabi Secret')); ?></label>
                                                    <input type="text" name="wasabi_secret" class="form-control"
                                                        value="<?php echo e(!isset($settings['wasabi_secret']) || is_null($settings['wasabi_secret']) ? '' : $settings['wasabi_secret']); ?>"
                                                        placeholder="<?php echo e(__('Wasabi Secret')); ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label"
                                                        for="s3_region"><?php echo e(__('Wasabi Region')); ?></label>
                                                    <input type="text" name="wasabi_region" class="form-control"
                                                        value="<?php echo e(!isset($settings['wasabi_region']) || is_null($settings['wasabi_region']) ? '' : $settings['wasabi_region']); ?>"
                                                        placeholder="<?php echo e(__('Wasabi Region')); ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label"
                                                        for="wasabi_bucket"><?php echo e(__('Wasabi Bucket')); ?></label>
                                                    <input type="text" name="wasabi_bucket" class="form-control"
                                                        value="<?php echo e(!isset($settings['wasabi_bucket']) || is_null($settings['wasabi_bucket']) ? '' : $settings['wasabi_bucket']); ?>"
                                                        placeholder="<?php echo e(__('Wasabi Bucket')); ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label"
                                                        for="wasabi_url"><?php echo e(__('Wasabi URL')); ?></label>
                                                    <input type="text" name="wasabi_url" class="form-control"
                                                        value="<?php echo e(!isset($settings['wasabi_url']) || is_null($settings['wasabi_url']) ? '' : $settings['wasabi_url']); ?>"
                                                        placeholder="<?php echo e(__('Wasabi URL')); ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label"
                                                        for="wasabi_root"><?php echo e(__('Wasabi Root')); ?></label>
                                                    <input type="text" name="wasabi_root" class="form-control"
                                                        value="<?php echo e(!isset($settings['wasabi_root']) || is_null($settings['wasabi_root']) ? '' : $settings['wasabi_root']); ?>"
                                                        placeholder="<?php echo e(__('Wasabi Bucket')); ?>">
                                                </div>
                                            </div>
                                            <div class="form-group col-8 switch-width">
                                                <?php echo e(Form::label('wasabi_storage_validation', __('Only Upload Files'), ['class' => 'form-label'])); ?>

                                                <select name="wasabi_storage_validation[]" class="form-control"
                                                    name="choices-multiple-remove-button"
                                                    id="choices-multiple-remove-button2"
                                                    placeholder="This is a placeholder" multiple>
                                                    <?php $__currentLoopData = $file_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option <?php if(in_array($f, $wasabi_storage_validations)): ?> selected <?php endif; ?>>
                                                            <?php echo e($f); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="form-label"
                                                        for="wasabi_root"><?php echo e(__('Max upload size ( In KB)')); ?></label>
                                                    <input type="number" name="wasabi_max_upload_size"
                                                        class="form-control"
                                                        value="<?php echo e(!isset($settings['wasabi_max_upload_size']) || is_null($settings['wasabi_max_upload_size']) ? '' : $settings['wasabi_max_upload_size']); ?>"
                                                        placeholder="<?php echo e(__('Max upload size')); ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-end">
                                    <input class="btn btn-print-invoice  btn-primary m-r-10" type="submit"
                                        value="<?php echo e(__('Save Changes')); ?>">
                                </div>
                                <?php echo e(Form::close()); ?>

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="clear_cache" role="tabpanel" aria-labelledby="clear_cache-tab">
                        <div class="card" id="clear_cache">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-6">
                                        <h5 class="h6 md-0"><?php echo e(__('Clear Cache')); ?></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <p><?php echo e(__("This is a page meant for more advanced users, simply ignore it if you don't understand what cache is.")); ?>

                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="input-group search-form">
                                        <input type="text" value="<?php echo e(Utility::GetCacheSize()); ?>"
                                            class="form-control">
                                        <span class="input-group-text bg-transparent">MB</span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-end">
                                <a href="<?php echo e(url('config-cache')); ?>"
                                    class="btn btn-print-invoice  btn-primary m-r-10"><?php echo e(__('Clear Cache')); ?></a>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="cookie_consent" role="tabpanel"
                        aria-labelledby="cookie_consent-tab">
                        <div class="card" id="cookie-settings">
                            <?php echo e(Form::model($settings, ['route' => 'cookie.setting', 'method' => 'post'])); ?>

                            <div
                                class="card-header flex-column flex-lg-row  d-flex align-items-lg-center gap-2 justify-content-between">
                                <h5><?php echo e(__('Cookie Settings')); ?></h5>
                                <div class="d-flex align-items-center">
                                    <?php echo e(Form::label('enable_cookie', __('Enable cookie'), ['class' => 'col-form-label p-0 fw-bold me-3'])); ?>

                                    <div class="custom-control custom-switch" onclick="enablecookie()">
                                        <input type="checkbox" data-toggle="switchbutton" data-onstyle="primary"
                                            name="enable_cookie" class="form-check-input input-primary "
                                            id="enable_cookie"
                                            <?php echo e($settings['enable_cookie'] == 'on' ? ' checked ' : ''); ?>>
                                        <label class="custom-control-label mb-1" for="enable_cookie"></label>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="card-body cookieDiv <?php echo e($settings['enable_cookie'] == 'off' ? 'disabledCookie ' : ''); ?>">
                                <div class="col-12 text-end">
                                    <a class="btn btn-sm btn-primary mb-4" href="#" data-size="lg"
                                        data-ajax-popup-over="true" data-url="<?php echo e(route('generate', ['cookie'])); ?>"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="<?php echo e(__('Generate')); ?>" data-title="<?php echo e(__('Generate Cookie Title')); ?>">
                                        <i class="fas fa-robot"></i> <?php echo e(__(' Generate With AI')); ?>

                                    </a>
                                </div>
                                <div class="row ">
                                    <div class="col-md-6">
                                        <div class="form-check form-switch custom-switch-v1" id="cookie_log">
                                            <input type="checkbox" name="cookie_logging"
                                                class="form-check-input input-primary cookie_setting"
                                                id="cookie_logging"<?php echo e($settings['cookie_logging'] == 'on' ? ' checked ' : ''); ?>>
                                            <label class="form-check-label"
                                                for="cookie_logging"><?php echo e(__('Enable logging')); ?></label>
                                        </div>
                                        <div class="form-group">
                                            <?php echo e(Form::label('cookie_title', __('Cookie Title'), ['class' => 'col-form-label'])); ?>

                                            <?php echo e(Form::text('cookie_title', null, ['class' => 'form-control cookie_setting'])); ?>

                                        </div>
                                        <div class="form-group ">
                                            <?php echo e(Form::label('cookie_description', __('Cookie Description'), ['class' => ' form-label'])); ?>

                                            <?php echo Form::textarea('cookie_description', null, ['class' => 'form-control cookie_setting', 'rows' => '3']); ?>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-check form-switch custom-switch-v1 ">
                                            <input type="checkbox" name="necessary_cookies"
                                                class="form-check-input input-primary" id="necessary_cookies" checked
                                                onclick="return false">
                                            <label class="form-check-label"
                                                for="necessary_cookies"><?php echo e(__('Strictly necessary cookies')); ?></label>
                                        </div>
                                        <div class="form-group ">
                                            <?php echo e(Form::label('strictly_cookie_title', __(' Strictly Cookie Title'), ['class' => 'col-form-label'])); ?>

                                            <?php echo e(Form::text('strictly_cookie_title', null, ['class' => 'form-control cookie_setting'])); ?>

                                        </div>
                                        <div class="form-group ">
                                            <?php echo e(Form::label('strictly_cookie_description', __('Strictly Cookie Description'), ['class' => ' form-label'])); ?>

                                            <?php echo Form::textarea('strictly_cookie_description', null, [
                                                'class' => 'form-control cookie_setting ',
                                                'rows' => '3',
                                            ]); ?>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <h5><?php echo e(__('More Information')); ?></h5>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <?php echo e(Form::label('more_information_description', __('Contact Us Description'), ['class' => 'col-form-label'])); ?>

                                                <?php echo e(Form::text('more_information_description', null, ['class' => 'form-control cookie_setting'])); ?>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <?php echo e(Form::label('contactus_url', __('Contact Us URL'), ['class' => 'col-form-label'])); ?>

                                                <?php echo e(Form::text('contactus_url', null, ['class' => 'form-control cookie_setting'])); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="card-footer d-flex align-items-center gap-2 flex-sm-column flex-lg-row justify-content-between">
                                <div>
                                    <?php if(isset($settings['cookie_logging']) && $settings['cookie_logging'] == 'on'): ?>
                                        <label for="file"
                                            class="form-label"><?php echo e(__('Download cookie accepted data')); ?></label>
                                        <a href="<?php echo e(asset(Storage::url('uploads/sample')) . '/data.csv'); ?>"
                                            class="btn btn-primary mr-2 ">
                                            <i class="ti ti-download"></i>
                                        </a>
                                    <?php endif; ?>
                                </div>
                                <input type="submit" value="<?php echo e(__('Save Changes')); ?>" class="btn btn-primary">
                            </div>
                            <?php echo e(Form::close()); ?>

                        </div>
                    </div>
                    <div class="tab-pane fade" id="chatgpt_settings" role="tabpanel"
                        aria-labelledby="chatgpt_settings-tab">
                        <div class="col-xl-12 col-lg-12 col-md-12">
                            <div class="card">
                                <?php echo e(Form::model($settings, ['route' => 'settings.chatgptkey', 'method' => 'post'])); ?>

                                <div class="card-header">
                                    <h5><?php echo e(__('Chat GPT Key Settings')); ?></h5>
                                    <small><?php echo e(__('Edit your key details')); ?></small>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group">
                                            <?php echo e(Form::text('chatgpt_key', isset($settings['chatgpt_key']) ? $settings['chatgpt_key'] : '', ['class' => 'form-control', 'placeholder' => __('Enter Chat GPT Key Here')])); ?>

                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-end">
                                    <button class="btn btn-primary" type="submit"><?php echo e(__('Save Changes')); ?></button>
                                </div>
                                <?php echo e(Form::close()); ?>

                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if(Auth::user()->type != 'super admin'): ?>
                    <div class="tab-pane fade active show" id="brand_settings" role="tabpanel"
                        aria-labelledby="brand_settings-tab">
                        <div id="brand_settings" class="card">
                            <?php echo e(Form::model($settings, ['route' => 'business.setting', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                            <div class="card-header">
                                <h5><?php echo e(__('Brand Settings')); ?></h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-6 col-md-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5><?php echo e(__('Logo Dark')); ?></h5>
                                            </div>
                                            <div class="card-body ">
                                                <div class=" setting-card">
                                                    <div class="logo-content mt-4">


                                                        
                                                        <a href="<?php echo e($logo . (isset($logo_img) && !empty($logo_img) ? $logo_img : 'logo-dark.png') . '?timestamp=' . time()); ?>"
                                                            target="_blank">
                                                            <img id="blah" alt="your image"
                                                                src="<?php echo e($logo . (isset($logo_img) && !empty($logo_img) ? $logo_img : 'logo-dark.png') . '?timestamp=' . time()); ?>"
                                                                width="150px" class="big-logo">
                                                        </a>
                                                    </div>

                                                    <div class="choose-files mt-5">
                                                        <label for="company_logo">
                                                            <div class=" bg-primary m-auto company_logo_update"> <i
                                                                    class="ti ti-upload px-1"></i><?php echo e(__('Choose file here')); ?>

                                                            </div>
                                                            <input type="file" class="form-control file"
                                                                name="company_logo" id="company_logo"
                                                                data-filename="edit-logo"
                                                                onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                                        </label>
                                                    </div>
                                                    <?php $__errorArgs = ['logo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="invalid-company_logo text-xs text-danger"
                                                            role="alert"><?php echo e($message); ?></span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-6 col-md-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5><?php echo e(__('Logo Light')); ?></h5>
                                            </div>
                                            <div class="card-body">
                                                <div class=" setting-card">
                                                    <div class="logo-content mt-4">
                                                        

                                                        <a href="<?php echo e($logo . (isset($logo_light) && !empty($logo_light) ? $logo_light : 'logo-light.png') . '?timestamp=' . time()); ?>"
                                                            target="_blank">
                                                            <img id="storeLighlogo" alt="your image"
                                                                src="<?php echo e($logo . (isset($logo_light) && !empty($logo_light) ? $logo_light : 'logo-light.png') . '?timestamp=' . time()); ?>"
                                                                width="150px" class="big-logo img_setting">
                                                        </a>
                                                    </div>
                                                    <div class="choose-files mt-5">
                                                        <label for="company_light_logo">
                                                            <div class=" bg-primary  m-auto"> <i
                                                                    class="ti ti-upload px-1"></i><?php echo e(__('Choose file here')); ?>

                                                            </div>
                                                            <input type="file" class="form-control file"
                                                                name="company_light_logo" id="company_light_logo"
                                                                data-filename="company_light_logo_update"
                                                                onchange="document.getElementById('storeLighlogo').src = window.URL.createObjectURL(this.files[0])">
                                                        </label>
                                                    </div>
                                                    <?php $__errorArgs = ['light_logo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <div class="row">
                                                            <span class="invalid-logo" role="alert">
                                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                                            </span>
                                                        </div>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-6 col-md-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5><?php echo e(__('Favicon')); ?></h5>
                                            </div>
                                            <div class="card-body company_favicon pt-2">
                                                <div class=" setting-card">
                                                    <div class="logo-content mt-4">
                                                        <img src="<?php echo e($logo . '/' . (isset($company_favicon) && !empty($company_favicon) ? $company_favicon : 'favicon.png') . '?timestamp=' . time()); ?>"
                                                            width="50px" class="img_setting" id="logofaviCon">
                                                    </div>
                                                    <div class="choose-files mt-5">
                                                        <label for="company_favicon">
                                                            <div class=" bg-primary  m-auto"> <i
                                                                    class="ti ti-upload px-1"></i><?php echo e(__('Choose file here')); ?>

                                                            </div>
                                                            <input type="file" class="form-control file"
                                                                id="company_favicon" name="company_favicon"
                                                                data-filename="company_favicon_update"
                                                                onchange="document.getElementById('logofaviCon').src = window.URL.createObjectURL(this.files[0])">
                                                        </label>
                                                    </div>
                                                    <?php $__errorArgs = ['logo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <div class="row">
                                                            <span class="invalid-logo" role="alert">
                                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                                            </span>
                                                        </div>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <?php echo e(Form::label('title_text', __('Title Text'), ['class' => 'col-form-label'])); ?>

                                        <?php echo e(Form::text('title_text', null, ['class' => 'form-control', 'placeholder' => __('Title Text')])); ?>

                                        <?php $__errorArgs = ['title_text'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-title_text" role="alert">
                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <?php echo e(Form::label('footer_text', __('Footer Text'), ['class' => 'col-form-label'])); ?>

                                        <?php echo e(Form::text('footer_text', null, ['class' => 'form-control', 'placeholder' => __('Footer Text')])); ?>

                                        <?php $__errorArgs = ['footer_text'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-footer_text" role="alert">
                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <?php echo e(Form::label('owner_default_language', __('Owner Default Language'), ['class' => 'form-label text-dark'])); ?>

                                        <div class="changeLanguage">
                                            <select name="owner_default_language" id="owner_default_language"
                                                class="form-control custom-select" data-toggle="select">
                                                <?php $__currentLoopData = \App\Models\Utility::languages(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option <?php if($setting['owner_default_language'] == $code): ?> selected <?php endif; ?>
                                                        value="<?php echo e($code); ?>"><?php echo e(Str::ucfirst($language)); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <?php echo e(Form::label('site_date_format', __('Date Format'), ['class' => 'form-label text-dark'])); ?>

                                        <?php echo e(Form::select('site_date_format', ['M j, Y' => date('M j, Y'), 'd-m-Y' => date('d-m-Y'), 'm-d-Y' => date('m-d-Y'), 'Y-m-d' => date('Y-m-d')], null, ['class' => 'form-control', 'data-toggle' => 'select'])); ?>

                                    </div>
                                    <div class="form-group col-md-4">
                                        <?php echo e(Form::label('site_date_format', __('Time Format'), ['class' => 'form-label text-dark'])); ?>

                                        
                                        <select type="text" name="site_time_format" class="form-control"
                                            data-toggle="select" id="site_time_format">
                                            <option value="g:i A"
                                                <?php if(@$settings['site_time_format'] == 'g:i A'): ?> selected="selected" <?php endif; ?>>
                                                <?php echo e(__('10:30 PM')); ?>

                                            </option>
                                            <option value="g:i a"
                                                <?php if(@$settings['site_time_format'] == 'g:i a'): ?> selected="selected" <?php endif; ?>>
                                                <?php echo e(__('10:30 pm')); ?>

                                            </option>
                                            <option value="H:i"
                                                <?php if(@$settings['site_time_format'] == 'H:i'): ?> selected="selected" <?php endif; ?>>
                                                <?php echo e(__('22:30')); ?></option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <?php echo e(Form::label('SITE_RTL', __('Enable RTL'), ['class' => 'col-form-label'])); ?>

                                        <div class="col-12 mt-2">
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" data-toggle="switchbutton"
                                                    class="custom-control-input" name="SITE_RTL" id="SITE_RTL"
                                                    value="on" <?php echo e($SITE_RTL == 'on' ? 'checked="checked"' : ''); ?>>
                                                <label class="form-check-labe" for="SITE_RTL"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <h4 class="small-title"><?php echo e(__('Theme Customizer')); ?></h4>
                                    <div class="setting-card setting-logo-box p-3">
                                        <div class="row">
                                            <div class="col-4 my-auto">
                                                <h6 class="mt-3">
                                                    <i data-feather="credit-card"
                                                        class="me-2"></i><?php echo e(__('Primary color settings')); ?>

                                                </h6>
                                                <hr class="my-2" />
                                                <div class="theme-color themes-color">
                                                    <a href="#!"
                                                        class="<?php echo e($settings['color'] == 'theme-1' ? 'active_color' : ''); ?>"
                                                        data-value="theme-1" onclick="check_theme('theme-1')"></a>
                                                    <input type="radio" class="theme_color" name="color"
                                                        value="theme-1" style="display: none;">
                                                    <a href="#!"
                                                        class="<?php echo e($settings['color'] == 'theme-2' ? 'active_color' : ''); ?> "
                                                        data-value="theme-2" onclick="check_theme('theme-2')"></a>
                                                    <input type="radio" class="theme_color" name="color"
                                                        value="theme-2" style="display: none;">
                                                    <a href="#!"
                                                        class="<?php echo e($settings['color'] == 'theme-3' ? 'active_color' : ''); ?>"
                                                        data-value="theme-3" onclick="check_theme('theme-3')"></a>
                                                    <input type="radio" class="theme_color" name="color"
                                                        value="theme-3" style="display: none;">
                                                    <a href="#!"
                                                        class="<?php echo e($settings['color'] == 'theme-4' ? 'active_color' : ''); ?>"
                                                        data-value="theme-4" onclick="check_theme('theme-4')"></a>
                                                    <input type="radio" class="theme_color" name="color"
                                                        value="theme-4" style="display: none;">
                                                    <a href="#!"
                                                        class="<?php echo e($settings['color'] == 'theme-5' ? 'active_color' : ''); ?>"
                                                        data-value="theme-5" onclick="check_theme('theme-5')"></a>
                                                    <input type="radio" class="theme_color" name="color"
                                                        value="theme-5" style="display: none;">
                                                    <br>
                                                    <a href="#!"
                                                        class="<?php echo e($settings['color'] == 'theme-6' ? 'active_color' : ''); ?>"
                                                        data-value="theme-6" onclick="check_theme('theme-6')"></a>
                                                    <input type="radio" class="theme_color" name="color"
                                                        value="theme-6" style="display: none;">
                                                    <a href="#!"
                                                        class="<?php echo e($settings['color'] == 'theme-7' ? 'active_color' : ''); ?>"
                                                        data-value="theme-7" onclick="check_theme('theme-7')"></a>
                                                    <input type="radio" class="theme_color" name="color"
                                                        value="theme-7" style="display: none;">
                                                    <a href="#!"
                                                        class="<?php echo e($settings['color'] == 'theme-8' ? 'active_color' : ''); ?>"
                                                        data-value="theme-8" onclick="check_theme('theme-8')"></a>
                                                    <input type="radio" class="theme_color" name="color"
                                                        value="theme-8" style="display: none;">
                                                    <a href="#!"
                                                        class="<?php echo e($settings['color'] == 'theme-9' ? 'active_color' : ''); ?>"
                                                        data-value="theme-9" onclick="check_theme('theme-9')"></a>
                                                    <input type="radio" class="theme_color" name="color"
                                                        value="theme-9" style="display: none;">
                                                    <a href="#!"
                                                        class="<?php echo e($settings['color'] == 'theme-10' ? 'active_color' : ''); ?>"
                                                        data-value="theme-10" onclick="check_theme('theme-10')"></a>
                                                    <input type="radio" class="theme_color" name="color"
                                                        value="theme-10" style="display: none;">
                                                </div>
                                            </div>
                                            <div class="col-4 my-auto">
                                                <h6>
                                                    <i data-feather="layout"
                                                        class="me-2"></i><?php echo e(__('Sidebar settings')); ?>

                                                </h6>
                                                <hr class="my-2" />
                                                <div class="form-check form-switch">
                                                    <input type="checkbox" class="form-check-input" id="cust-theme-bg"
                                                        name="cust_theme_bg"
                                                        <?php echo e(Utility::getValByName('cust_theme_bg') == 'on' ? 'checked' : ''); ?> />
                                                    <label class="form-check-label f-w-600 pl-1"
                                                        for="cust-theme-bg"><?php echo e(__('Transparent layout')); ?></label>
                                                </div>
                                            </div>
                                            <div class="col-4 my-auto">
                                                <h6>
                                                    <i data-feather="sun"
                                                        class="me-2"></i><?php echo e(__('Layout settings')); ?>

                                                </h6>
                                                <hr class="my-2" />

                                                <div class="form-check form-switch">
                                                    <input type="checkbox" class="form-check-input"
                                                        id="cust-darklayout" name="cust_darklayout"
                                                        <?php echo e($setting['cust_darklayout'] == 'on' ? 'checked="checked"' : ''); ?> />
                                                    <label class="form-check-label f-w-600 pl-1"
                                                        for="cust-darklayout"><?php echo e(__('Dark Layout')); ?></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ">
                                <div class="col-sm-12 px-2">
                                    <div class="d-flex justify-content-end">
                                        <?php echo e(Form::submit(__('Save Changes'), ['class' => 'btn btn-xs btn-primary'])); ?>

                                    </div>
                                </div>
                            </div>
                            <?php echo Form::close(); ?>

                        </div>
                    </div>
                    <div class="tab-pane fade" id="store_settings" role="tabpanel"
                        aria-labelledby="store_settings-tab">
                        <div class="active" id="store_settings">
                            
                            <?php echo e(Form::model($store_settings, ['route' => ['settings.store', $store_settings['id']], 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                            <div class="row">
                                <div class="col-lg-12 col-sm-12 col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="row">
                                                <div class="col-lg-6 col-sm-6 col-md-6">
                                                    <h5><?php echo e(__('Store Settings')); ?></h5>
                                                </div>
                                                <?php if($plan['enable_chatgpt'] == 'on'): ?>
                                                    <div class="col-lg-6 col-sm-6 col-md-6 text-end">
                                                        <a class="btn btn-sm btn-primary" href="#"
                                                            data-size="lg" data-ajax-popup-over="true"
                                                            data-url="<?php echo e(route('generate', ['seo_setting'])); ?>"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="<?php echo e(__('Generate')); ?>"
                                                            data-title="<?php echo e(__('Generate SEO Setting')); ?>"> <i
                                                                class="fas fa-robot"></i><?php echo e(__(' Generate With AI')); ?>

                                                        </a>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="card-body pt-0">
                                            <div class=" setting-card">
                                                <div class="row mt-2">
                                                    <div class="col-lg-4 col-sm-6 col-md-6">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h5><?php echo e(__('Store Logo')); ?></h5>
                                                            </div>
                                                            <div class="card-body pt-0">
                                                                <div class=" setting-card">
                                                                    <div class="logo-content mt-4">
                                                                        <a href="<?php echo e($s_logo . (isset($store_settings['logo']) && !empty($store_settings['logo']) ? $store_settings['logo'] : 'logo.png') . '?timestamp=' . time()); ?>"
                                                                            target="_blank">
                                                                            <img id="StorelogoOwner" alt="your image"
                                                                                src="<?php echo e($s_logo . (isset($store_settings['logo']) && !empty($store_settings['logo']) ? $store_settings['logo'] : 'logo.png') . '?timestamp=' . time()); ?>"
                                                                                width="150px" class="big-logo">
                                                                        </a>
                                                                    </div>
                                                                    <div class="choose-files mt-5">
                                                                        <label for="logo">
                                                                            <div class=" bg-primary m-auto"> <i
                                                                                    class="ti ti-upload px-1"></i><?php echo e(__('Choose file here')); ?>

                                                                            </div>
                                                                            <input type="file"
                                                                                class="form-control file" name="logo"
                                                                                id="logo"
                                                                                data-filename="logo_update"
                                                                                onchange="document.getElementById('StorelogoOwner').src = window.URL.createObjectURL(this.files[0])">
                                                                        </label>
                                                                    </div>
                                                                    <?php $__errorArgs = ['logo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                        <div class="row">
                                                                            <span class="invalid-logo" role="alert">
                                                                                <strong
                                                                                    class="text-danger"><?php echo e($message); ?></strong>
                                                                            </span>
                                                                        </div>
                                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-sm-6 col-md-6">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h5><?php echo e(__('Invoice Logo')); ?></h5>
                                                            </div>
                                                            <div class="card-body pt-0">
                                                                <div class=" setting-card">
                                                                    <div class="logo-content mt-4">
                                                                        
                                                                        <a href="<?php echo e($s_logo . (isset($store_settings['invoice_logo']) && !empty($store_settings['invoice_logo']) ? $store_settings['invoice_logo'] : 'invoice_logo.png') . '?timestamp=' . time()); ?>"
                                                                            target="_blank">
                                                                            <img id="invoiceOwner" alt="your image"
                                                                                src="<?php echo e($s_logo . (isset($store_settings['invoice_logo']) && !empty($store_settings['invoice_logo']) ? $store_settings['invoice_logo'] : 'invoice_logo.png') . '?timestamp=' . time()); ?>"
                                                                                width="150px" class="big-logo">
                                                                        </a>
                                                                    </div>
                                                                    <div class="choose-files mt-5">
                                                                        <label for="invoice_logo">
                                                                            <div class=" bg-primary  m-auto"> <i
                                                                                    class="ti ti-upload px-1"></i><?php echo e(__('Choose file here')); ?>

                                                                            </div>
                                                                            <input type="file" name="invoice_logo"
                                                                                id="invoice_logo"
                                                                                class="form-control file"
                                                                                data-filename="invoice_logo_update"
                                                                                onchange="document.getElementById('invoiceOwner').src = window.URL.createObjectURL(this.files[0])">
                                                                        </label>
                                                                    </div>
                                                                    <?php $__errorArgs = ['invoice_logo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                        <div class="row">
                                                                            <span class="invalid-invoice_logo"
                                                                                role="alert">
                                                                                <strong
                                                                                    class="text-danger"><?php echo e($message); ?></strong>
                                                                            </span>
                                                                        </div>
                                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <?php echo e(Form::label('store_name', __('Store Name'), ['class' => 'col-col-form-label'])); ?>

                                                        <?php echo Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('Store Name')]); ?>

                                                        <?php $__errorArgs = ['store_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <span class="invalid-store_name" role="alert">
                                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                                            </span>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <?php echo e(Form::label('email', __('Email'), ['class' => 'col-col-form-label'])); ?>

                                                        <?php echo e(Form::text('email', null, ['class' => 'form-control', 'placeholder' => __('Email')])); ?>

                                                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <span class="invalid-email" role="alert">
                                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                                            </span>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                    <?php if(isset($plan['enable_custdomain']) && $plan['enable_custdomain'] == 'on'): ?>
                                                        <div class="col-md-6 py-4">
                                                            <div class="radio-button-group row  gy-2 mts">
                                                                <div class="col-sm-4">
                                                                    <label
                                                                        class="btn btn-outline-primary w-100 <?php echo e($store_settings['enable_storelink'] == 'on' ? 'active' : ''); ?>">
                                                                        <input type="radio"
                                                                            class="domain_click  radio-button"
                                                                            name="enable_domain"
                                                                            value="enable_storelink"
                                                                            id="enable_storelink"
                                                                            <?php echo e($store_settings['enable_storelink'] == 'on' ? 'checked' : ''); ?>>
                                                                        <?php echo e(__('Store Link')); ?>

                                                                    </label>
                                                                </div>
                                                                <?php if($plan['enable_custdomain'] == 'on'): ?>
                                                                    <div class="col-sm-4">
                                                                        <label
                                                                            class="btn btn-outline-primary w-100 <?php echo e($store_settings['enable_domain'] == 'on' ? 'active' : ''); ?>">
                                                                            <input type="radio"
                                                                                class="domain_click radio-button"
                                                                                name="enable_domain"
                                                                                value="enable_domain" id="enable_domain"
                                                                                <?php echo e($store_settings['enable_domain'] == 'on' ? 'checked' : ''); ?>>
                                                                            <?php echo e(__('Domain')); ?>

                                                                        </label>
                                                                    </div>
                                                                <?php endif; ?>
                                                                <?php if($plan['enable_custsubdomain'] == 'on'): ?>
                                                                    <div class="col-sm-4">
                                                                        <label
                                                                            class="btn btn-outline-primary w-100 <?php echo e($store_settings['enable_subdomain'] == 'on' ? 'active' : ''); ?>">
                                                                            <input type="radio"
                                                                                class="domain_click radio-button"
                                                                                name="enable_domain"
                                                                                value="enable_subdomain"
                                                                                id="enable_subdomain"
                                                                                <?php echo e($store_settings['enable_subdomain'] == 'on' ? 'checked' : ''); ?>>
                                                                            <?php echo e(__('Sub Domain')); ?>

                                                                        </label>
                                                                    </div>
                                                                <?php endif; ?>
                                                                
                                                            </div>
                                                            <?php if($domainPointing == 1): ?>
                                                                
                                                                <div class="text-sm mt-2" id="domainnote"
                                                                    style="display: none">
                                                                    <span><b class="text-success"><?php echo e(__('Note : Before add Custom Domain, your domain A record is pointing to our server IP :')); ?><?php echo e($serverIp); ?>|
                                                                            <?php echo e(__('Your Custom Domain IP Is This: ')); ?><?php echo e($domainip); ?></b></span>
                                                                </div>
                                                            <?php else: ?>
                                                                <div class="text-sm mt-2" id="domainnote"
                                                                    style="display: none">
                                                                    <span><b><?php echo e(__('Note : Before add Custom Domain, your domain A record is pointing to our server IP :')); ?><?php echo e($serverIp); ?>|</b>
                                                                        <b
                                                                            class="text-danger"><?php echo e(__('Your Custom Domain IP Is This: ')); ?><?php echo e($domainip); ?></b></span>
                                                                </div>
                                                            <?php endif; ?>

                                                            <?php if($subdomainPointing == 1): ?>
                                                                <div class="text-sm mt-2" id="subdomainnote"
                                                                    style="display: none">
                                                                    <span><b class="text-success"><?php echo e(__('Note : Before add Sub Domain, your domain A record is pointing to our server IP :')); ?><?php echo e($serverIp); ?>|
                                                                            <?php echo e(__('Your Sub Domain IP Is This: ')); ?><?php echo e($domainip); ?></b></span>
                                                                </div>
                                                            <?php else: ?>
                                                                <div class="text-sm mt-2" id="subdomainnote"
                                                                    style="display: none">
                                                                    <span><b><?php echo e(__('Note : Before add Sub Domain, your domain A record is pointing to our server IP :')); ?><?php echo e($serverIp); ?>|</b>
                                                                        <b
                                                                            class="text-danger"><?php echo e(__('Your Sub Domain IP Is This: ')); ?><?php echo e($domainip); ?></b></span>
                                                                </div>
                                                            <?php endif; ?>
                                                        </div>
                                                        <div class="form-group col-md-6" id="StoreLink"
                                                            style="<?php echo e($store_settings['enable_storelink'] == 'on' ? 'display: block' : 'display: none'); ?>">
                                                            <?php echo e(Form::label('store_link', __('Store Link'), ['class' => 'form-label'])); ?>

                                                            <div class="input-group">
                                                                <input type="text"
                                                                    value="<?php echo e($store_settings['store_url']); ?>"
                                                                    id="myInput" class="form-control d-inline-block"
                                                                    aria-label="Recipient's username"
                                                                    aria-describedby="button-addon2" readonly>
                                                                <div class="input-group-append">
                                                                    <button class="btn btn-outline-primary"
                                                                        type="button" onclick="myFunction()"
                                                                        id="button-addon2"><i class="far fa-copy"></i>
                                                                        <?php echo e(__('Copy Link')); ?></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6 domain"
                                                            style="<?php echo e($store_settings['enable_domain'] == 'on' ? 'display:block' : 'display:none'); ?>">
                                                            <?php echo e(Form::label('store_domain', __('Custom Domain'), ['class' => 'form-label'])); ?>

                                                            <?php echo e(Form::text('domains', $store_settings['domains'], ['class' => 'form-control', 'placeholder' => __('xyz.com')])); ?>

                                                        </div>
                                                        <?php if($plan['enable_custsubdomain'] == 'on'): ?>
                                                            <div class="form-group col-md-6 subdomain"
                                                                style="<?php echo e($store_settings['enable_subdomain'] == 'on' ? 'display:block' : 'display:none'); ?>">
                                                                <?php echo e(Form::label('store_subdomain', __('Sub Domain'), ['class' => 'form-label'])); ?>

                                                                <div class="input-group">
                                                                    <?php echo e(Form::text('subdomain', $store_settings['slug'], ['class' => 'form-control', 'placeholder' => __('Enter Domain'), 'readonly'])); ?>

                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text"
                                                                            id="basic-addon2">.<?php echo e($subdomain_name); ?></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php endif; ?>
                                                    <?php else: ?>
                                                        <div class="form-group col-md-6" id="StoreLink">
                                                            <?php echo e(Form::label('store_link', __('Store Link'), ['class' => 'form-label'])); ?>

                                                            <div class="input-group">
                                                                <input type="text"
                                                                    value="<?php echo e($store_settings['store_url']); ?>"
                                                                    id="myInput" class="form-control d-inline-block"
                                                                    aria-label="Recipient's username"
                                                                    aria-describedby="button-addon2" readonly>
                                                                <div class="input-group-append">
                                                                    <button class="btn btn-outline-primary"
                                                                        type="button" onclick="myFunction()"
                                                                        id="button-addon2"><i class="far fa-copy"></i>
                                                                        <?php echo e(__('Copy Link')); ?></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>

                                                    <div class="form-group col-md-4">
                                                        <?php echo e(Form::label('tagline', __('Tagline'), ['class' => 'col-form-label'])); ?>

                                                        <?php echo e(Form::text('tagline', null, ['class' => 'form-control', 'placeholder' => __('Tagline')])); ?>

                                                        <?php $__errorArgs = ['tagline'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <span class="invalid-tagline" role="alert">
                                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                                            </span>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <?php echo e(Form::label('address', __('Address'), ['class' => 'col-form-label'])); ?>

                                                        <?php echo e(Form::text('address', null, ['class' => 'form-control', 'placeholder' => __('Address')])); ?>

                                                        <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <span class="invalid-address" role="alert">
                                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                                            </span>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <?php echo e(Form::label('city', __('City'), ['class' => 'col-form-label'])); ?>

                                                        <?php echo e(Form::text('city', null, ['class' => 'form-control', 'placeholder' => __('City')])); ?>

                                                        <?php $__errorArgs = ['city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <span class="invalid-city" role="alert">
                                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                                            </span>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <?php echo e(Form::label('state', __('State'), ['class' => 'col-form-label'])); ?>

                                                        <?php echo e(Form::text('state', null, ['class' => 'form-control', 'placeholder' => __('State')])); ?>

                                                        <?php $__errorArgs = ['state'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <span class="invalid-state" role="alert">
                                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                                            </span>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <?php echo e(Form::label('zipcode', __('Zipcode'), ['class' => 'col-form-label'])); ?>

                                                        <?php echo e(Form::text('zipcode', null, ['class' => 'form-control', 'placeholder' => __('Zipcode')])); ?>

                                                        <?php $__errorArgs = ['zipcode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <span class="invalid-zipcode" role="alert">
                                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                                            </span>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <?php echo e(Form::label('country', __('Country'), ['class' => 'col-form-label'])); ?>

                                                        <?php echo e(Form::text('country', null, ['class' => 'form-control', 'placeholder' => __('Country')])); ?>

                                                        <?php $__errorArgs = ['country'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <span class="invalid-country" role="alert">
                                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                                            </span>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>

                                                    <?php if(\Auth::user()->type == 'Owner'): ?>
                                                        <div class="form-group col-md-3">
                                                            <?php echo e(Form::label('store_default_language', __('Store Default Language'), ['class' => 'col-form-label'])); ?>

                                                            <div class="changeLanguage">
                                                                <select name="store_default_language"
                                                                    id="store_default_language" class="form-control"
                                                                    data-toggle="select">
                                                                    <?php $__currentLoopData = \App\Models\Utility::languages(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <option
                                                                            <?php if($store_lang == $code): ?> selected <?php endif; ?>
                                                                            value="<?php echo e($code); ?>">
                                                                            <?php echo e(Str::ucfirst($language)); ?></option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>

                                                    <div class="form-group col-md-3">
                                                        <?php echo e(Form::label('decimal_number_format', __('Decimal Number Format'), ['class' => 'col-form-label'])); ?>

                                                        <?php echo e(Form::number('decimal_number', isset($store_settings['decimal_number']) ? $store_settings['decimal_number'] : 2, ['class' => 'form-control', 'placeholder' => __('decimal_number')])); ?>

                                                        <?php $__errorArgs = ['decimal_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <span class="invalid-decimal_number" role="alert">
                                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                                            </span>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                    <?php if($plan['shipping_method'] == 'on'): ?>
                                                        <div class="form-group col-md-3 mt-3">
                                                            <label class="form-check-label"
                                                                for="enable_shipping"></label>
                                                            <div class="custom-control form-switch">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="enable_shipping" id="enable_shipping"
                                                                    <?php echo e($store_settings['enable_shipping'] == 'on' ? 'checked=checked' : ''); ?>>
                                                                <?php echo e(Form::label('enable_shipping', __('Shipping Method Enable'), ['class' => 'form-check-label mb-3'])); ?>

                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                    <div class="form-group col-md-3 mt-3">
                                                        <label class="form-check-label"
                                                            for="is_checkout_login_required"></label>
                                                        <div class="custom-control form-switch">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="is_checkout_login_required"
                                                                id="is_checkout_login_required"
                                                                <?php if($store_settings['is_checkout_login_required'] == null): ?> <?php if($settings['is_checkout_login_required'] == 'on'): ?>
                                                                            <?php echo e('checked=checked'); ?> <?php endif; ?>
                                                            <?php elseif($store_settings['is_checkout_login_required'] == 'on'): ?>
                                                            <?php echo e('checked=checked'); ?> <?php else: ?> <?php echo e(''); ?>

                                                                <?php endif; ?>
                                                            
                                                            >
                                                            <?php echo e(Form::label('is_checkout_login_required', __('Is Checkout Login Required'), ['class' => 'form-check-label mb-3'])); ?>

                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group col-md-12">
                                                        <?php echo e(Form::label('storejs', __('Store Custom JS'), ['class' => 'col-form-label'])); ?>

                                                        <?php echo e(Form::textarea('storejs', null, ['class' => 'form-control', 'rows' => 3, 'placehold   er' => __('About')])); ?>

                                                        <?php $__errorArgs = ['storejs'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <span class="invalid-about" role="alert">
                                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                                            </span>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-6">
                                                            <?php echo e(Form::label('meta_keyword', __('Meta Keywords'), ['class' => 'col-form-label'])); ?>

                                                            <?php echo Form::text('meta_keyword', $store_settings->meta_keyword, [
                                                                'class' => 'form-control',
                                                                'rows' => 3,
                                                                'placeholder' => __('Meta Keyword'),
                                                            ]); ?>

                                                            <?php $__errorArgs = ['meta_keyword'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                <span class="invalid-about" role="alert">
                                                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                                                </span>
                                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                                            <?php echo e(Form::label('meta_description', __('Meta Description'), ['class' => 'col-form-label'])); ?>

                                                            <?php echo Form::textarea('meta_description', $store_settings->meta_description, [
                                                                'class' => 'form-control',
                                                                'rows' => 3,
                                                                'placeholder' => __('Meta Description'),
                                                            ]); ?>


                                                            <?php $__errorArgs = ['meta_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                <span class="invalid-about" role="alert">
                                                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                                                </span>
                                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        </div>
                                                        <?php
                                                            $meta_image = $store_settings->meta_image;
                                                            $meta = \App\Models\Utility::get_file('uploads/meta_image/');
                                                        ?>
                                                        <div class="form-group col-md-6">
                                                            <label for="meta-image" class="col-form-label">
                                                                <h5><?php echo e(__('Meta Image')); ?></h5>
                                                            </label>
                                                            <div class="logo-content mt-2 mr-2">
                                                                <img class="meta-image" name="meta-image"
                                                                    src="<?php echo e(!empty($meta_image) ? $meta . '/' . $meta_image : $meta . '/meta_image.png'); ?>"
                                                                    id="blah" class="rounded-circle-avatar">
                                                            </div>
                                                            <div class="choose-files mt-4">
                                                                <label for="file-1">
                                                                    <div class=" bg-primary meta_image"
                                                                        style="max-width: 100% !important;"> <i
                                                                            class="ti ti-upload px-1"></i><?php echo e(__('Choose file here')); ?>

                                                                    </div>
                                                                    <input type="file" class="form-control file"
                                                                        name="meta_image" id="file-1"
                                                                        data-filename="meta_image">
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12 pt-4">
                                                        <h5 class="h6 mb-0"><?php echo e(__('Footer')); ?></h5>
                                                        <small><?php echo e(__('Enter your social media links.')); ?></small>
                                                        <hr class="my-4">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <i class="fas fa-envelope"></i>
                                                            <?php echo e(Form::label('email', __('Email'), ['class' => 'col-form-label'])); ?>

                                                            <?php echo e(Form::text('email', null, ['class' => 'form-control', 'rows' => 3, 'placeholder' => __('Email')])); ?>

                                                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                <span class="invalid-email" role="alert">
                                                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                                                </span>
                                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <i class="fab fa-whatsapp" aria-hidden="true"></i>
                                                            <?php echo e(Form::label('whatsapp', __('WhatsApp'), ['class' => 'col-form-label'])); ?>

                                                            <?php echo e(Form::text('whatsapp', null, ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'https://wa.me/1XXXXXXXXXX'])); ?>

                                                            <?php $__errorArgs = ['whatsapp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                <span class="invalid-whatsapp" role="alert">
                                                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                                                </span>
                                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <i class="fab fa-facebook-square" aria-hidden="true"></i>
                                                            <?php echo e(Form::label('facebook', __('Facebook'), ['class' => 'col-form-label'])); ?>

                                                            <?php echo e(Form::text('facebook', null, ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'https://www.facebook.com/'])); ?>

                                                            <?php $__errorArgs = ['facebook'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                <span class="invalid-facebook" role="alert">
                                                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                                                </span>
                                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <i class="fab fa-instagram" aria-hidden="true"></i>
                                                            <?php echo e(Form::label('instagram', __('Instagram'), ['class' => 'col-form-label'])); ?>

                                                            <?php echo e(Form::text('instagram', null, ['class' => 'form-control', 'placeholder' => 'https://www.instagram.com/'])); ?>

                                                            <?php $__errorArgs = ['instagram'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                <span class="invalid-instagram" role="alert">
                                                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                                                </span>
                                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <i class="fab fa-twitter" aria-hidden="true"></i>
                                                            <?php echo e(Form::label('twitter', __('Twitter'), ['class' => 'col-form-label'])); ?>

                                                            <?php echo e(Form::text('twitter', null, ['class' => 'form-control', 'placeholder' => 'https://twitter.com/'])); ?>

                                                            <?php $__errorArgs = ['twitter'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                <span class="invalid-twitter" role="alert">
                                                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                                                </span>
                                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <i class="fab fa-youtube" aria-hidden="true"></i>
                                                            <?php echo e(Form::label('youtube', __('Youtube'), ['class' => 'col-form-label'])); ?>

                                                            <?php echo e(Form::text('youtube', null, ['class' => 'form-control', 'placeholder' => 'https://www.youtube.com/'])); ?>

                                                            <?php $__errorArgs = ['youtube'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                <span class="invalid-youtube" role="alert">
                                                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                                                </span>
                                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <i class="fas    fa-copyright" aria-hidden="true"></i>
                                                            <?php echo e(Form::label('footer_note', __('Footer'), ['class' => 'col-form-label'])); ?>

                                                            <?php echo e(Form::text('footer_note', null, ['class' => 'form-control', 'placeholder' => __('Footer')])); ?>

                                                            <?php $__errorArgs = ['footer_note'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                <span class="invalid-footer_note" role="alert">
                                                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                                                </span>
                                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        </div>
                                                    </div>


                                                </div>


                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="col-lg-12 ">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <?php echo e(Form::close()); ?>

                                                        <?php echo Form::open([
                                                            'method' => 'DELETE',
                                                            'route' => ['ownerstore.destroy', $store_settings->id],
                                                            'id' => 'delete-form-' . $store_settings->id,
                                                        ]); ?>

                                                        <button type="button"
                                                            class="btn bs-pass-para btn-secondary btn-light show_confirm">
                                                            <span class="text-black"><?php echo e(__('Delete Store')); ?></span>
                                                        </button>
                                                        <?php echo Form::close(); ?>

                                                    </div>
                                                    <div class="col-6 d-flex justify-content-end">
                                                        <input type="submit" value="<?php echo e(__('Save Changes')); ?>"
                                                            class="btn btn-xs btn-primary">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="store_payment_settings" role="tabpanel"
                        aria-labelledby="store_payment_settings-tab">
                        <div class="card">
                            <div class="card-header">
                                <h5>Payment Settings</h5>
                                <small class="text-muted">These details will be used to collect subscription plan
                                    payments.Each subscription plan will have a payment button based on the below
                                    configuration.</small>

                            </div>
                            <div class="card-body">
                                <?php echo e(Form::open(['route' => ['owner.payment.setting', $store_settings->slug], 'method' => 'post'])); ?>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <?php echo e(Form::label('currency', __('Currency *'), ['class' => '  col-form-label'])); ?>

                                                <?php echo e(Form::text('currency', $store_settings['currency_code'], ['class' => 'form-control font-style', 'required'])); ?>

                                                <?php echo e(__('Note: Add currency code as per three-letter ISO code.')); ?>

                                                <small>
                                                    <a href="https://stripe.com/docs/currencies"
                                                        target="_blank"><?php echo e(__('You can find out how to do that here..')); ?></a>
                                                </small>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <?php echo e(Form::label('currency_symbol', __('Currency Symbol *'), ['class' => 'col-form-label'])); ?>

                                                <?php echo e(Form::text('currency_symbol', $store_settings['currency'], ['class' => 'form-control', 'required'])); ?>

                                                <?php $__errorArgs = ['currency_symbol'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="invalid-currency_symbol" role="alert">
                                                        <strong class="text-danger"><?php echo e($message); ?></strong>
                                                    </span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>

                                            <div class="col-md-6 form-group">
                                                <label class="col-form-label"
                                                    for="example3cols3Input"><?php echo e(__('Currency Symbol Position')); ?></label>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-check form-check-inline mb-3   ">
                                                            <input type="radio" id="customRadio5"
                                                                name="currency_symbol_position" value="pre"
                                                                class="form-check-input"
                                                                <?php if(@$store_settings['currency_symbol_position'] == 'pre'): ?> checked <?php endif; ?>>
                                                            <label class="form-check-label"
                                                                for="customRadio5"><?php echo e(__('Pre')); ?></label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-check form-check-inline mb-3">
                                                            <input type="radio" id="customRadio6"
                                                                name="currency_symbol_position" value="post"
                                                                class="form-check-input"
                                                                <?php if(@$store_settings['currency_symbol_position'] == 'post'): ?> checked <?php endif; ?>>
                                                            <label class="form-check-label"
                                                                for="customRadio6"><?php echo e(__('Post')); ?></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label class="col-form-label"
                                                    for="example3cols3Input"><?php echo e(__('Currency Symbol Space')); ?></label>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-check form-check-inline mb-3">
                                                            <input type="radio" id="customRadio7"
                                                                name="currency_symbol_space" value="with"
                                                                class="form-check-input"
                                                                <?php if(@$store_settings['currency_symbol_space'] == 'with'): ?> checked <?php endif; ?>>
                                                            <label class="form-check-label"
                                                                for="customRadio7"><?php echo e(__('With Space')); ?></label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-check form-check-inline mb-3">
                                                            <input type="radio" id="customRadio8"
                                                                name="currency_symbol_space" value="without"
                                                                class="form-check-input"
                                                                <?php if(@$store_settings['currency_symbol_space'] == 'without'): ?> checked <?php endif; ?>>
                                                            <label class="form-check-label"
                                                                for="customRadio8"><?php echo e(__('Without Space')); ?></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h6><?php echo e(__('Custom Field For Checkout')); ?></h6>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <?php echo e(Form::label('custom_field_title_1', __('Custom Field Title'), ['class' => 'col-form-label'])); ?>

                                                    <?php echo e(Form::text('custom_field_title_1', !empty($store_settings['custom_field_title_1']) ? $store_settings['custom_field_title_1'] : '', ['class' => 'form-control', 'placeholder' => __('Enter Custom Field Title')])); ?>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <?php echo e(Form::label('custom_field_title_2', __('Custom Field Title'), ['class' => 'col-form-label'])); ?>

                                                    <?php echo e(Form::text('custom_field_title_2', !empty($store_settings['custom_field_title_2']) ? $store_settings['custom_field_title_2'] : '', ['class' => 'form-control', 'placeholder' => __('Enter Custom Field Title')])); ?>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <?php echo e(Form::label('custom_field_title_3', __('Custom Field Title'), ['class' => 'col-form-label'])); ?>

                                                    <?php echo e(Form::text('custom_field_title_3', !empty($store_settings['custom_field_title_3']) ? $store_settings['custom_field_title_3'] : '', ['class' => 'form-control', 'placeholder' => __('Enter Custom Field Title')])); ?>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <?php echo e(Form::label('custom_field_title_4', __('Custom Field Title'), ['class' => 'col-form-label'])); ?>

                                                    <?php echo e(Form::text('custom_field_title_4', !empty($store_settings['custom_field_title_4']) ? $store_settings['custom_field_title_4'] : '', ['class' => 'form-control', 'placeholder' => __('Enter Custom Field Title')])); ?>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="faq justify-content-center">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="accordion accordion-flush setting-accordion"
                                                        id="accordionExample">

                                                        <!-- Cash On Delivery -->

                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="headingOne">
                                                                <button class="accordion-button collapsed"
                                                                    type="button" data-bs-toggle="collapse"
                                                                    data-bs-target="#collapseOne" aria-expanded="false"
                                                                    aria-controls="collapseOne">
                                                                    <span class="d-flex align-items-center">
                                                                        <?php echo e(__('COD')); ?>

                                                                    </span>
                                                                    <div class="d-flex align-items-center">
                                                                        <span class="me-2"><?php echo e(__('Enable:')); ?></span>
                                                                        <div
                                                                            class="form-check form-switch custom-switch-v1">
                                                                            <input type="hidden" name="enable_cod"
                                                                                value="off">
                                                                            <input type="checkbox"
                                                                                class="form-check-input input-primary"
                                                                                id="customswitchv1-1 enable_cod"
                                                                                name="enable_cod"
                                                                                <?php echo e($store_settings['enable_cod'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                        </div>
                                                                    </div>
                                                                </button>
                                                            </h2>
                                                            <div id="collapseOne" class="accordion-collapse collapse"
                                                                aria-labelledby="headingOne"
                                                                data-bs-parent="#accordionExample">
                                                                <div class="accordion-body">
                                                                    <div class="row gy-4">
                                                                        <div class="col-lg-6">
                                                                            <div class="input-edits">
                                                                                <div class="form-group">
                                                                                    <h5 class="h5">
                                                                                        <?php echo e(__('Cash On Delivery')); ?></h5>
                                                                                    <br>
                                                                                    <small>
                                                                                        <?php echo e(__('Note : Enable or disable cash on delivery.')); ?></small><br>
                                                                                    <small>
                                                                                        <?php echo e(__('This detail will use for make checkout of shopping cart.')); ?></small>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Telegram -->
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="headingTwo">
                                                                <button class="accordion-button collapsed"
                                                                    type="button" data-bs-toggle="collapse"
                                                                    data-bs-target="#collapseTwo" aria-expanded="false"
                                                                    aria-controls="collapseTwo">
                                                                    <span
                                                                        class="d-flex align-items-center"><?php echo e(__('Telegram')); ?></span>
                                                                    <div class="d-flex align-items-center">
                                                                        <span class="me-2"><?php echo e(__('Enable:')); ?></span>
                                                                        <div
                                                                            class="form-check form-switch custom-switch-v1">
                                                                            <input type="hidden" name="enable_telegram"
                                                                                value="off">
                                                                            <input type="checkbox"
                                                                                class="form-check-input input-primary"
                                                                                id="customswitchv1-1 enable_telegram"
                                                                                name="enable_telegram"
                                                                                <?php echo e($store_settings['enable_telegram'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                        </div>
                                                                    </div>
                                                                </button>
                                                            </h2>
                                                            <div id="collapseTwo" class="accordion-collapse collapse"
                                                                aria-labelledby="headingTwo"
                                                                data-bs-parent="#accordionExample">
                                                                <div class="accordion-body">
                                                                    <div class="row gy-4">
                                                                        <div class="col-lg-6">
                                                                            <div class="input-edits">
                                                                                <div class="form-group">
                                                                                    <?php echo e(Form::label('telegrambot', __('Telegram Access Token'), ['class' => 'col-col-form-label'])); ?>

                                                                                    <?php echo e(Form::text('telegrambot', $store_settings['telegrambot'], ['class' => 'form-control active telegrambot', 'placeholder' => '1234567890:AAbbbbccccddddxvGENZCi8Hd4B15M8xHV0'])); ?>

                                                                                    <p><?php echo e(__('Get Chat ID')); ?> :
                                                                                        https://api.telegram.org/bot-TOKEN-/getUpdates
                                                                                    </p>
                                                                                    <?php $__errorArgs = ['telegrambot'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                                        <span class="invalid-telegrambot"
                                                                                            role="alert">
                                                                                            <strong
                                                                                                class="text-danger"><?php echo e($message); ?></strong>
                                                                                        </span>
                                                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <div class="input-edits">
                                                                                <div class="form-group">
                                                                                    <?php echo e(Form::label('telegramchatid', __('Telegram Chat Id'), ['class' => 'col-col-form-label'])); ?>

                                                                                    <?php echo e(Form::text('telegramchatid', $store_settings['telegramchatid'], ['class' => 'form-control active telegramchatid', 'placeholder' => '123456789'])); ?>

                                                                                    <?php $__errorArgs = ['telegramchatid'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                                        <span class="invalid-telegramchatid"
                                                                                            role="alert">
                                                                                            <strong
                                                                                                class="text-danger"><?php echo e($message); ?></strong>
                                                                                        </span>
                                                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- WhatsApp -->
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="headingThree">
                                                                <button class="accordion-button collapsed"
                                                                    type="button" data-bs-toggle="collapse"
                                                                    data-bs-target="#collapseThree"
                                                                    aria-expanded="false" aria-controls="collapseThree">
                                                                    <span class="d-flex align-items-center">
                                                                        <?php echo e(__('WhatsApp')); ?>

                                                                    </span>
                                                                    <div class="d-flex align-items-center">
                                                                        <span class="me-2"><?php echo e(__('Enable:')); ?></span>
                                                                        <div
                                                                            class="form-check form-switch custom-switch-v1">
                                                                            <input type="hidden" name="enable_whatsapp"
                                                                                value="off">
                                                                            <input type="checkbox"
                                                                                class="form-check-input input-primary"
                                                                                id="customswitchv1-1 enable_whatsapp"
                                                                                name="enable_whatsapp"
                                                                                <?php echo e($store_settings['enable_whatsapp'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                        </div>
                                                                    </div>
                                                                </button>
                                                            </h2>
                                                            <div id="collapseThree" class="accordion-collapse collapse"
                                                                aria-labelledby="headingThree"
                                                                data-bs-parent="#accordionExample">
                                                                <div class="accordion-body">
                                                                    <div class="row gy-4">
                                                                        <div class="col-lg-6">
                                                                            <div class="input-edits">
                                                                                <div class="form-group">
                                                                                    <label for="whatsapp_number"
                                                                                        class="col-form-label"><?php echo e(__('Whatsapp')); ?></label>
                                                                                    <input type="text"
                                                                                        name="whatsapp_number"
                                                                                        id="whatsapp_number"
                                                                                        class="form-control input-mask"
                                                                                        data-mask="+00 00000000000"
                                                                                        value="<?php echo e($store_settings['whatsapp_number']); ?>"
                                                                                        placeholder="+00 00000000000" />
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="headingSeventeen">
                                                                <button class="accordion-button collapsed"
                                                                    type="button" data-bs-toggle="collapse"
                                                                    data-bs-target="#collapseSeventeen"
                                                                    aria-expanded="false"
                                                                    aria-controls="collapseSeventeen">
                                                                    <span class="d-flex align-items-center">
                                                                        <?php echo e(__('Bank Transfer')); ?>

                                                                    </span>
                                                                    <div class="d-flex align-items-center">
                                                                        <span class="me-2"><?php echo e(__('Enable:')); ?></span>
                                                                        <div
                                                                            class="form-check form-switch custom-switch-v1">
                                                                            <input type="hidden" name="enable_bank"
                                                                                value="off">
                                                                            <input type="checkbox"
                                                                                class="form-check-input input-primary"
                                                                                id="customswitchv1-1 enable_bank"
                                                                                name="enable_bank"
                                                                                <?php echo e($store_settings['enable_bank'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                        </div>
                                                                    </div>
                                                                </button>
                                                            </h2>
                                                            <div id="collapseSeventeen"
                                                                class="accordion-collapse collapse"
                                                                aria-labelledby="headingThree"
                                                                data-bs-parent="#accordionExample">
                                                                <div class="accordion-body">
                                                                    <div class="row gy-4">
                                                                        <small>
                                                                            <?php echo e(__('Note: Input your bank details including bank name.')); ?></small>
                                                                        <div class="col-lg-12">
                                                                            <textarea type="text" name="bank_number" id="bank_number" class="form-control" value=""
                                                                                placeholder="<?php echo e(__('Bank Transfer Number')); ?>"><?php echo e($store_settings['bank_number']); ?>   </textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Stripe -->
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="headingFour">
                                                                <button class="accordion-button collapsed"
                                                                    type="button" data-bs-toggle="collapse"
                                                                    data-bs-target="#collapseFour" aria-expanded="false"
                                                                    aria-controls="collapseFour">
                                                                    <span
                                                                        class="d-flex align-items-center"><?php echo e(__('Stripe')); ?></span>
                                                                    <div class="d-flex align-items-center">
                                                                        <span class="me-2"><?php echo e(__('Enable:')); ?></span>
                                                                        <div
                                                                            class="form-check form-switch custom-switch-v1">
                                                                            <input type="hidden"
                                                                                name="is_stripe_enabled" value="off">
                                                                            <input type="checkbox"
                                                                                class="form-check-input input-primary"
                                                                                id="customswitchv1-1 is_stripe_enabled"
                                                                                name="is_stripe_enabled"
                                                                                <?php echo e(isset($store_payment_setting['is_stripe_enabled']) && $store_payment_setting['is_stripe_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                        </div>
                                                                    </div>
                                                                </button>
                                                            </h2>
                                                            <div id="collapseFour" class="accordion-collapse collapse"
                                                                aria-labelledby="headingFour"
                                                                data-bs-parent="#accordionExample">
                                                                <div class="accordion-body">
                                                                    <div class="row gy-4">
                                                                        <div class="col-lg-6">
                                                                            <div class="input-edits">
                                                                                <div class="form-group">
                                                                                    <?php echo e(Form::label('stripe_key', __('Stripe Key'), ['class' => 'col-form-label'])); ?>

                                                                                    <?php echo e(Form::text('stripe_key', isset($store_payment_setting['stripe_key']) ? $store_payment_setting['stripe_key'] : '', ['class' => 'form-control', 'placeholder' => __('Enter Stripe Key')])); ?>

                                                                                    <?php $__errorArgs = ['stripe_key'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                                        <span class="invalid-stripe_key"
                                                                                            role="alert">
                                                                                            <strong
                                                                                                class="text-danger"><?php echo e($message); ?></strong>
                                                                                        </span>
                                                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <div class="input-edits">
                                                                                <div class="form-group">
                                                                                    <?php echo e(Form::label('stripe_secret', __('Stripe Secret'), ['class' => 'col-form-label'])); ?>

                                                                                    <?php echo e(Form::text('stripe_secret', isset($store_payment_setting['stripe_secret']) ? $store_payment_setting['stripe_secret'] : '', ['class' => 'form-control ', 'placeholder' => __('Enter Stripe Secret')])); ?>

                                                                                    <?php $__errorArgs = ['stripe_secret'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                                        <span class="invalid-stripe_secret"
                                                                                            role="alert">
                                                                                            <strong
                                                                                                class="text-danger"><?php echo e($message); ?></strong>
                                                                                        </span>
                                                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Paypal -->
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="headingFive">
                                                                <button class="accordion-button collapsed"
                                                                    type="button" data-bs-toggle="collapse"
                                                                    data-bs-target="#collapseFive" aria-expanded="false"
                                                                    aria-controls="collapseFive">
                                                                    <span class="d-flex align-items-center">
                                                                        <?php echo e(__('PayPal')); ?></span>
                                                                    <div class="d-flex align-items-center">
                                                                        <span class="me-2"><?php echo e(__('Enable:')); ?></span>
                                                                        <div
                                                                            class="form-check form-switch custom-switch-v1">
                                                                            <input type="hidden"
                                                                                name="is_paypal_enabled" value="off">
                                                                            <input type="checkbox"
                                                                                class="form-check-input input-primary"
                                                                                id="customswitchv1-1 is_paypal_enabled"
                                                                                name="is_paypal_enabled"
                                                                                <?php echo e(isset($store_payment_setting['is_paypal_enabled']) && $store_payment_setting['is_paypal_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                        </div>
                                                                    </div>
                                                                </button>
                                                            </h2>
                                                            <div id="collapseFive" class="accordion-collapse collapse"
                                                                aria-labelledby="headingFive"
                                                                data-bs-parent="#accordionExample">
                                                                <div class="accordion-body">
                                                                    <div class="col-md-12 pb-4">
                                                                        <label class="col-form-label"
                                                                            for="paypal_mode"><?php echo e(__('Paypal Environment')); ?></label>
                                                                        <br>
                                                                        <div class="d-flex">
                                                                            <div class="mr-2"
                                                                                style="margin-right: 15px;">
                                                                                <div class="border card p-3">
                                                                                    <div class="form-check">
                                                                                        <input type="radio"
                                                                                            name="paypal_mode"
                                                                                            value="sandbox"
                                                                                            class="form-check-input"
                                                                                            <?php echo e(!isset($store_payment_setting['paypal_mode']) || $store_payment_setting['paypal_mode'] == '' || $store_payment_setting['paypal_mode'] == 'sandbox' ? 'checked="checked"' : ''); ?>>
                                                                                        <?php echo e(__('Sandbox')); ?>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="mr-2">
                                                                                <div class="border card p-3">
                                                                                    <div class="form-check">
                                                                                        <input type="radio"
                                                                                            name="paypal_mode"
                                                                                            value="live"
                                                                                            class="form-check-input"
                                                                                            <?php echo e(isset($store_payment_setting['paypal_mode']) && $store_payment_setting['paypal_mode'] == 'live' ? 'checked="checked"' : ''); ?>>
                                                                                        <?php echo e(__('Live')); ?>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row gy-4">
                                                                        <div class="col-lg-6">
                                                                            <div class="input-edits">
                                                                                <div class="form-group">
                                                                                    <label for="paypal_client_id"
                                                                                        class="col-form-label"><?php echo e(__('Client ID')); ?></label>
                                                                                    <input type="text"
                                                                                        name="paypal_client_id"
                                                                                        id="paypal_client_id"
                                                                                        class="form-control"
                                                                                        value="<?php echo e(isset($store_payment_setting['paypal_client_id']) ? $store_payment_setting['paypal_client_id'] : ''); ?>"
                                                                                        placeholder="<?php echo e(__('Client ID')); ?>" />
                                                                                    <?php if($errors->has('paypal_client_id')): ?>
                                                                                        <span
                                                                                            class="invalid-feedback d-block">
                                                                                            <?php echo e($errors->first('paypal_client_id')); ?>

                                                                                        </span>
                                                                                    <?php endif; ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <div class="input-edits">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        for="paypal_secret_key"class="col-form-label"><?php echo e(__('Secret Key')); ?></label>
                                                                                    <input type="text"
                                                                                        name="paypal_secret_key"
                                                                                        id="paypal_secret_key"
                                                                                        class="form-control"
                                                                                        value="<?php echo e(isset($store_payment_setting['paypal_secret_key']) ? $store_payment_setting['paypal_secret_key'] : ''); ?>"
                                                                                        placeholder="<?php echo e(__('Secret Key')); ?>" />
                                                                                    <?php if($errors->has('paypal_secret_key')): ?>
                                                                                        <span
                                                                                            class="invalid-feedback d-block">
                                                                                            <?php echo e($errors->first('paypal_secret_key')); ?>

                                                                                        </span>
                                                                                    <?php endif; ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Paystack -->
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="headingSix">
                                                                <button class="accordion-button collapsed"
                                                                    type="button" data-bs-toggle="collapse"
                                                                    data-bs-target="#collapseSix" aria-expanded="false"
                                                                    aria-controls="collapseSix">
                                                                    <span
                                                                        class="d-flex align-items-center"><?php echo e(__('Paystack')); ?></span>
                                                                    <div class="d-flex align-items-center">
                                                                        <span class="me-2"><?php echo e(__('Enable:')); ?></span>
                                                                        <div
                                                                            class="form-check form-switch custom-switch-v1">
                                                                            <input type="hidden"
                                                                                name="is_paystack_enabled"
                                                                                value="off">
                                                                            <input type="checkbox"
                                                                                class="form-check-input input-primary"
                                                                                id="customswitchv1-1 is_paystack_enabled"
                                                                                name="is_paystack_enabled"
                                                                                <?php echo e(isset($store_payment_setting['is_paystack_enabled']) && $store_payment_setting['is_paystack_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                        </div>
                                                                    </div>
                                                                </button>
                                                            </h2>
                                                            <div id="collapseSix" class="accordion-collapse collapse"
                                                                aria-labelledby="headingSix"
                                                                data-bs-parent="#accordionExample">
                                                                <div class="accordion-body">
                                                                    <div class="row gy-4">
                                                                        <div class="col-lg-6">
                                                                            <div class="input-edits">
                                                                                <div class="form-group">
                                                                                    <label for="paystack_public_key"
                                                                                        class="col-form-label"><?php echo e(__('Public Key')); ?></label>
                                                                                    <input type="text"
                                                                                        name="paystack_public_key"
                                                                                        id="paystack_public_key"
                                                                                        class="form-control"
                                                                                        value="<?php echo e(isset($store_payment_setting['paystack_public_key']) ? $store_payment_setting['paystack_public_key'] : ''); ?>"
                                                                                        placeholder="<?php echo e(__('Public Key')); ?>" />
                                                                                    <?php if($errors->has('paystack_public_key')): ?>
                                                                                        <span
                                                                                            class="invalid-feedback d-block">
                                                                                            <?php echo e($errors->first('paystack_public_key')); ?>

                                                                                        </span>
                                                                                    <?php endif; ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <div class="input-edits">
                                                                                <div class="form-group">
                                                                                    <label for="paystack_secret_key"
                                                                                        class="col-form-label"><?php echo e(__('Secret Key')); ?></label>
                                                                                    <input type="text"
                                                                                        name="paystack_secret_key"
                                                                                        id="paystack_secret_key"
                                                                                        class="form-control"
                                                                                        value="<?php echo e(isset($store_payment_setting['paystack_secret_key']) ? $store_payment_setting['paystack_secret_key'] : ''); ?>"
                                                                                        placeholder="<?php echo e(__('Secret Key')); ?>" />
                                                                                    <?php if($errors->has('paystack_secret_key')): ?>
                                                                                        <span
                                                                                            class="invalid-feedback d-block">
                                                                                            <?php echo e($errors->first('paystack_secret_key')); ?>

                                                                                        </span>
                                                                                    <?php endif; ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Flutterwave -->
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="headingseven">
                                                                <button class="accordion-button collapsed"
                                                                    type="button" data-bs-toggle="collapse"
                                                                    data-bs-target="#collapseseven"
                                                                    aria-expanded="false" aria-controls="collapseseven">
                                                                    <span
                                                                        class="d-flex align-items-center"><?php echo e(__('Flutterwave')); ?></span>
                                                                    <div class="d-flex align-items-center">
                                                                        <span class="me-2"><?php echo e(__('Enable:')); ?></span>
                                                                        <div
                                                                            class="form-check form-switch custom-switch-v1">
                                                                            <input type="hidden"
                                                                                name="is_flutterwave_enabled"
                                                                                value="off">
                                                                            <input type="checkbox"
                                                                                class="form-check-input input-primary"
                                                                                id="customswitchv1-1 is_flutterwave_enabled"
                                                                                name="is_flutterwave_enabled"
                                                                                <?php echo e(isset($store_payment_setting['is_flutterwave_enabled']) && $store_payment_setting['is_flutterwave_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                        </div>
                                                                    </div>
                                                                </button>
                                                            </h2>
                                                            <div id="collapseseven" class="accordion-collapse collapse"
                                                                aria-labelledby="headingseven"
                                                                data-bs-parent="#accordionExample">
                                                                <div class="accordion-body">
                                                                    <div class="row gy-4">
                                                                        <div class="col-lg-6">
                                                                            <div class="input-edits">
                                                                                <div class="form-group">
                                                                                    <label for="flutterwave_public_key"
                                                                                        class="col-form-label"><?php echo e(__('Public Key')); ?></label>
                                                                                    <input type="text"
                                                                                        name="flutterwave_public_key"
                                                                                        id="flutterwave_public_key"
                                                                                        class="form-control"
                                                                                        value="<?php echo e(isset($store_payment_setting['flutterwave_public_key']) ? $store_payment_setting['flutterwave_public_key'] : ''); ?>"
                                                                                        placeholder="<?php echo e(__('Public Key')); ?>" />
                                                                                    <?php if($errors->has('flutterwave_public_key')): ?>
                                                                                        <span
                                                                                            class="invalid-feedback d-block">
                                                                                            <?php echo e($errors->first('flutterwave_public_key')); ?>

                                                                                        </span>
                                                                                    <?php endif; ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <div class="input-edits">
                                                                                <div class="form-group">
                                                                                    <label for="paystack_secret_key"
                                                                                        class="col-form-label"><?php echo e(__('Secret Key')); ?></label>
                                                                                    <input type="text"
                                                                                        name="flutterwave_secret_key"
                                                                                        id="flutterwave_secret_key"
                                                                                        class="form-control"
                                                                                        value="<?php echo e(isset($store_payment_setting['flutterwave_secret_key']) ? $store_payment_setting['flutterwave_secret_key'] : ''); ?>"
                                                                                        placeholder="<?php echo e(__('Secret Key')); ?>" />
                                                                                    <?php if($errors->has('flutterwave_secret_key')): ?>
                                                                                        <span
                                                                                            class="invalid-feedback d-block">
                                                                                            <?php echo e($errors->first('flutterwave_secret_key')); ?>

                                                                                        </span>
                                                                                    <?php endif; ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Razorpay -->
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="headingeight">
                                                                <button class="accordion-button collapsed"
                                                                    type="button" data-bs-toggle="collapse"
                                                                    data-bs-target="#collapseeight"
                                                                    aria-expanded="false" aria-controls="collapseeight">
                                                                    <span class="d-flex align-items-center">
                                                                        <?php echo e(__('Razorpay')); ?>

                                                                    </span>
                                                                    <div class="d-flex align-items-center">
                                                                        <span class="me-2"><?php echo e(__('Enable:')); ?></span>
                                                                        <div
                                                                            class="form-check form-switch custom-switch-v1">
                                                                            <input type="hidden"
                                                                                name="is_razorpay_enabled"
                                                                                value="off">
                                                                            <input type="checkbox"
                                                                                class="form-check-input input-primary"
                                                                                id="customswitchv1-1 is_razorpay_enabled"
                                                                                name="is_razorpay_enabled"
                                                                                <?php echo e(isset($store_payment_setting['is_razorpay_enabled']) && $store_payment_setting['is_razorpay_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                        </div>
                                                                    </div>
                                                                </button>
                                                            </h2>
                                                            <div id="collapseeight" class="accordion-collapse collapse"
                                                                aria-labelledby="headingeight"
                                                                data-bs-parent="#accordionExample">
                                                                <div class="accordion-body">
                                                                    <div class="row gy-4">
                                                                        <div class="col-lg-6">
                                                                            <div class="input-edits">
                                                                                <div class="form-group">
                                                                                    <label for="razorpay_public_key"
                                                                                        class="col-form-label"><?php echo e(__('Public Key')); ?></label>
                                                                                    <input type="text"
                                                                                        name="razorpay_public_key"
                                                                                        id="razorpay_public_key"
                                                                                        class="form-control"
                                                                                        value="<?php echo e(isset($store_payment_setting['razorpay_public_key']) ? $store_payment_setting['razorpay_public_key'] : ''); ?>"
                                                                                        placeholder="<?php echo e(__('Public Key')); ?>" />
                                                                                    <?php if($errors->has('razorpay_public_key')): ?>
                                                                                        <span
                                                                                            class="invalid-feedback d-block">
                                                                                            <?php echo e($errors->first('razorpay_public_key')); ?>

                                                                                        </span>
                                                                                    <?php endif; ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <div class="input-edits">
                                                                                <div class="form-group">
                                                                                    <label for="paystack_secret_key"
                                                                                        class="col-form-label"><?php echo e(__('Secret Key')); ?></label>
                                                                                    <input type="text"
                                                                                        name="razorpay_secret_key"
                                                                                        id="razorpay_secret_key"
                                                                                        class="form-control"
                                                                                        value="<?php echo e(isset($store_payment_setting['razorpay_secret_key']) ? $store_payment_setting['razorpay_secret_key'] : ''); ?>"
                                                                                        placeholder="<?php echo e(__('Secret Key')); ?>" />
                                                                                    <?php if($errors->has('razorpay_secret_key')): ?>
                                                                                        <span
                                                                                            class="invalid-feedback d-block">
                                                                                            <?php echo e($errors->first('razorpay_secret_key')); ?>

                                                                                        </span>
                                                                                    <?php endif; ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Mercado Pago -->
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="headingnine">
                                                                <button class="accordion-button collapsed"
                                                                    type="button" data-bs-toggle="collapse"
                                                                    data-bs-target="#collapsenine" aria-expanded="false"
                                                                    aria-controls="collapsenine">
                                                                    <span
                                                                        class="d-flex align-items-center"><?php echo e(__('Mercado Pago')); ?></span>
                                                                    <div class="d-flex align-items-center">
                                                                        <span class="me-2"><?php echo e(__('Enable:')); ?></span>
                                                                        <div
                                                                            class="form-check form-switch custom-switch-v1">
                                                                            <input type="hidden"
                                                                                name="is_mercado_enabled"
                                                                                value="off">
                                                                            <input type="checkbox"
                                                                                class="form-check-input input-primary"
                                                                                id="customswitchv1-1 is_mercado_enabled"
                                                                                name="is_mercado_enabled"
                                                                                <?php echo e(isset($store_payment_setting['is_mercado_enabled']) && $store_payment_setting['is_mercado_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                        </div>
                                                                    </div>
                                                                </button>
                                                            </h2>
                                                            <div id="collapsenine" class="accordion-collapse collapse"
                                                                aria-labelledby="headingnine"
                                                                data-bs-parent="#accordionExample">
                                                                <div class="accordion-body">
                                                                    <div class="col-md-12 pb-4">
                                                                        <label class="col-form-label"
                                                                            for="mercado_mode"><?php echo e(__('Mercado Environment')); ?></label>
                                                                        <br>
                                                                        <div class="d-flex">
                                                                            <div class="mr-2"
                                                                                style="margin-right: 15px;">
                                                                                <div class="border card p-3">
                                                                                    <div class="form-check">
                                                                                        <input type="radio"
                                                                                            name="mercado_mode"
                                                                                            value="sandbox"
                                                                                            class="form-check-input"
                                                                                            <?php echo e(!isset($store_payment_setting['mercado_mode']) || $store_payment_setting['mercado_mode'] == '' || $store_payment_setting['mercado_mode'] == 'sandbox' ? 'checked="checked"' : ''); ?>>
                                                                                        <?php echo e(__('Sandbox')); ?>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="mr-2">
                                                                                <div class="border card p-3">
                                                                                    <div class="form-check">
                                                                                        <input type="radio"
                                                                                            name="mercado_mode"
                                                                                            value="live"
                                                                                            class="form-check-input"
                                                                                            <?php echo e(isset($store_payment_setting['mercado_mode']) && $store_payment_setting['mercado_mode'] == 'live' ? 'checked="checked"' : ''); ?>>
                                                                                        <?php echo e(__('Live')); ?>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row gy-4">
                                                                        <div class="col-lg-6">
                                                                            <div class="input-edits">
                                                                                <div class="form-group">
                                                                                    <label for="mercado_access_token"
                                                                                        class="col-form-label"><?php echo e(__('Access Token')); ?></label>
                                                                                    <input type="text"
                                                                                        name="mercado_access_token"
                                                                                        id="mercado_access_token"
                                                                                        class="form-control"
                                                                                        value="<?php echo e(isset($store_payment_setting['mercado_access_token']) ? $store_payment_setting['mercado_access_token'] : ''); ?>"
                                                                                        placeholder="<?php echo e(__('Access Token')); ?>" />
                                                                                    <?php if($errors->has('mercado_secret_key')): ?>
                                                                                        <span
                                                                                            class="invalid-feedback d-block">
                                                                                            <?php echo e($errors->first('mercado_access_token')); ?>

                                                                                        </span>
                                                                                    <?php endif; ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Paytm -->
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="headingten">
                                                                <button class="accordion-button collapsed"
                                                                    type="button" data-bs-toggle="collapse"
                                                                    data-bs-target="#collapseten" aria-expanded="false"
                                                                    aria-controls="collapseten">
                                                                    <span class="d-flex align-items-center">
                                                                        <?php echo e(__('Paytm')); ?>

                                                                    </span>
                                                                    <div class="d-flex align-items-center">
                                                                        <span class="me-2"><?php echo e(__('Enable:')); ?></span>
                                                                        <div
                                                                            class="form-check form-switch custom-switch-v1">
                                                                            <input type="hidden"
                                                                                name="is_paytm_enabled" value="off">
                                                                            <input type="checkbox"
                                                                                class="form-check-input input-primary"
                                                                                id="customswitchv1-1 is_paytm_enabled"
                                                                                name="is_paytm_enabled"
                                                                                <?php echo e(isset($store_payment_setting['is_paytm_enabled']) && $store_payment_setting['is_paytm_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                        </div>
                                                                    </div>
                                                                </button>
                                                            </h2>
                                                            <div id="collapseten" class="accordion-collapse collapse"
                                                                aria-labelledby="headingten"
                                                                data-bs-parent="#accordionExample">
                                                                <div class="accordion-body">
                                                                    <div class="col-md-12 pb-4">
                                                                        <label class="paypal-label col-form-label"
                                                                            for="paypal_mode"><?php echo e(__('Paytm Environment')); ?></label>
                                                                        <br>
                                                                        <div class="d-flex">
                                                                            <div class="mr-2"
                                                                                style="margin-right: 15px;">
                                                                                <div class="border card p-3">
                                                                                    <div class="form-check">
                                                                                        <label
                                                                                            class="form-check-labe text-dark">
                                                                                            <input type="radio"
                                                                                                name="paytm_mode"
                                                                                                value="local"
                                                                                                class="form-check-input"
                                                                                                <?php echo e(!isset($store_payment_setting['paytm_mode']) || $store_payment_setting['paytm_mode'] == '' || $store_payment_setting['paytm_mode'] == 'local' ? 'checked="checked"' : ''); ?>>
                                                                                            <?php echo e(__('Local')); ?>

                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="mr-2">
                                                                                <div class="border card p-3">
                                                                                    <div class="form-check">
                                                                                        <label
                                                                                            class="form-check-labe text-dark">
                                                                                            <input type="radio"
                                                                                                name="paytm_mode"
                                                                                                value="production"
                                                                                                class="form-check-input"
                                                                                                <?php echo e(isset($store_payment_setting['paytm_mode']) && $store_payment_setting['paytm_mode'] == 'production' ? 'checked="checked"' : ''); ?>>
                                                                                            <?php echo e(__('Production')); ?>

                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row gy-4">
                                                                        <div class="col-lg-4">
                                                                            <div class="input-edits">
                                                                                <div class="form-group">
                                                                                    <label for="paytm_merchant_id"
                                                                                        class="col-form-label"><?php echo e(__('Merchant ID')); ?></label>
                                                                                    <input type="text"
                                                                                        name="paytm_merchant_id"
                                                                                        id="paytm_merchant_id"
                                                                                        class="form-control"
                                                                                        value="<?php echo e(isset($store_payment_setting['paytm_merchant_id']) ? $store_payment_setting['paytm_merchant_id'] : ''); ?>"
                                                                                        placeholder="<?php echo e(__('Merchant ID')); ?>" />
                                                                                    <?php if($errors->has('paytm_merchant_id')): ?>
                                                                                        <span
                                                                                            class="invalid-feedback d-block">
                                                                                            <?php echo e($errors->first('paytm_merchant_id')); ?>

                                                                                        </span>
                                                                                    <?php endif; ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <div class="input-edits">
                                                                                <div class="form-group">
                                                                                    <label for="paytm_merchant_key"
                                                                                        class="col-form-label"><?php echo e(__('Merchant Key')); ?></label>
                                                                                    <input type="text"
                                                                                        name="paytm_merchant_key"
                                                                                        id="paytm_merchant_key"
                                                                                        class="form-control"
                                                                                        value="<?php echo e(isset($store_payment_setting['paytm_merchant_key']) ? $store_payment_setting['paytm_merchant_key'] : ''); ?>"
                                                                                        placeholder="<?php echo e(__('Merchant Key')); ?>" />
                                                                                    <?php if($errors->has('paytm_merchant_key')): ?>
                                                                                        <span
                                                                                            class="invalid-feedback d-block">
                                                                                            <?php echo e($errors->first('paytm_merchant_key')); ?>

                                                                                        </span>
                                                                                    <?php endif; ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <div class="input-edits">
                                                                                <div class="form-group">
                                                                                    <label for="paytm_industry_type"
                                                                                        class="col-form-label"><?php echo e(__('Industry Type')); ?></label>
                                                                                    <input type="text"
                                                                                        name="paytm_industry_type"
                                                                                        id="paytm_industry_type"
                                                                                        class="form-control"
                                                                                        value="<?php echo e(isset($store_payment_setting['paytm_industry_type']) ? $store_payment_setting['paytm_industry_type'] : ''); ?>"
                                                                                        placeholder="<?php echo e(__('Industry Type')); ?>" />
                                                                                    <?php if($errors->has('paytm_industry_type')): ?>
                                                                                        <span
                                                                                            class="invalid-feedback d-block">
                                                                                            <?php echo e($errors->first('paytm_industry_type')); ?>

                                                                                        </span>
                                                                                    <?php endif; ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Mollie -->
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="headingeleven">
                                                                <button class="accordion-button collapsed"
                                                                    type="button" data-bs-toggle="collapse"
                                                                    data-bs-target="#collapseeleven"
                                                                    aria-expanded="false"
                                                                    aria-controls="collapseeleven">
                                                                    <span
                                                                        class="d-flex align-items-center"><?php echo e(__('Mollie')); ?></span>
                                                                    <div class="d-flex align-items-center">
                                                                        <span class="me-2"><?php echo e(__('Enable:')); ?></span>
                                                                        <div
                                                                            class="form-check form-switch custom-switch-v1">
                                                                            <input type="hidden"
                                                                                name="is_mollie_enabled" value="off">
                                                                            <input type="checkbox"
                                                                                class="form-check-input input-primary"
                                                                                id="customswitchv1-1 is_mollie_enabled"
                                                                                name="is_mollie_enabled"
                                                                                <?php echo e(isset($store_payment_setting['is_mollie_enabled']) && $store_payment_setting['is_mollie_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                        </div>
                                                                    </div>
                                                                </button>
                                                            </h2>
                                                            <div id="collapseeleven" class="accordion-collapse collapse"
                                                                aria-labelledby="headingeleven"
                                                                data-bs-parent="#accordionExample">
                                                                <div class="accordion-body">
                                                                    <div class="row gy-4">
                                                                        <div class="col-lg-4">
                                                                            <div class="input-edits">
                                                                                <div class="form-group">
                                                                                    <label for="mollie_api_key"
                                                                                        class="col-form-label"><?php echo e(__('Mollie Api Key')); ?></label>
                                                                                    <input type="text"
                                                                                        name="mollie_api_key"
                                                                                        id="mollie_api_key"
                                                                                        class="form-control"
                                                                                        value="<?php echo e(isset($store_payment_setting['mollie_api_key']) ? $store_payment_setting['mollie_api_key'] : ''); ?>"
                                                                                        placeholder="<?php echo e(__('Mollie Api Key')); ?>" />
                                                                                    <?php if($errors->has('mollie_api_key')): ?>
                                                                                        <span
                                                                                            class="invalid-feedback d-block">
                                                                                            <?php echo e($errors->first('mollie_api_key')); ?>

                                                                                        </span>
                                                                                    <?php endif; ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <div class="input-edits">
                                                                                <div class="form-group">
                                                                                    <label for="mollie_profile_id"
                                                                                        class="col-form-label"><?php echo e(__('Mollie Profile Id')); ?></label>
                                                                                    <input type="text"
                                                                                        name="mollie_profile_id"
                                                                                        id="mollie_profile_id"
                                                                                        class="form-control"
                                                                                        value="<?php echo e(isset($store_payment_setting['mollie_profile_id']) ? $store_payment_setting['mollie_profile_id'] : ''); ?>"
                                                                                        placeholder="<?php echo e(__('Mollie Profile Id')); ?>" />
                                                                                    <?php if($errors->has('mollie_profile_id')): ?>
                                                                                        <span
                                                                                            class="invalid-feedback d-block">
                                                                                            <?php echo e($errors->first('mollie_profile_id')); ?>

                                                                                        </span>
                                                                                    <?php endif; ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <div class="input-edits">
                                                                                <div class="form-group">
                                                                                    <label for="mollie_partner_id"
                                                                                        class="col-form-label"><?php echo e(__('Mollie Partner Id')); ?></label>
                                                                                    <input type="text"
                                                                                        name="mollie_partner_id"
                                                                                        id="mollie_partner_id"
                                                                                        class="form-control"
                                                                                        value="<?php echo e(isset($store_payment_setting['mollie_partner_id']) ? $store_payment_setting['mollie_partner_id'] : ''); ?>"
                                                                                        placeholder="<?php echo e(__('Mollie Partner Id')); ?>" />
                                                                                    <?php if($errors->has('mollie_partner_id')): ?>
                                                                                        <span
                                                                                            class="invalid-feedback d-block">
                                                                                            <?php echo e($errors->first('mollie_partner_id')); ?>

                                                                                        </span>
                                                                                    <?php endif; ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="headingtwelve">
                                                                <button class="accordion-button collapsed"
                                                                    type="button" data-bs-toggle="collapse"
                                                                    data-bs-target="#collapsetwelve"
                                                                    aria-expanded="false"
                                                                    aria-controls="collapsetwelve">
                                                                    <span
                                                                        class="d-flex align-items-center"><?php echo e(__('Skrill')); ?></span>
                                                                    <div class="d-flex align-items-center">
                                                                        <span class="me-2"><?php echo e(__('Enable:')); ?></span>
                                                                        <div
                                                                            class="form-check form-switch custom-switch-v1">
                                                                            <input type="hidden"
                                                                                name="is_skrill_enabled" value="off">
                                                                            <input type="checkbox"
                                                                                class="form-check-input input-primary"
                                                                                id="customswitchv1-1 is_skrill_enabled"
                                                                                name="is_skrill_enabled"
                                                                                <?php echo e(isset($store_payment_setting['is_skrill_enabled']) && $store_payment_setting['is_skrill_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                        </div>
                                                                    </div>
                                                                </button>
                                                            </h2>
                                                            <div id="collapsetwelve" class="accordion-collapse collapse"
                                                                aria-labelledby="headingtwelve"
                                                                data-bs-parent="#accordionExample">
                                                                <div class="accordion-body">
                                                                    <div class="row gy-4">
                                                                        <div class="col-lg-6">
                                                                            <div class="input-edits">
                                                                                <div class="form-group">
                                                                                    <label for="skrill_email"
                                                                                        class="col-form-label"><?php echo e(__('Skrill Email')); ?></label>
                                                                                    <input type="email"
                                                                                        name="skrill_email"
                                                                                        id="skrill_email"
                                                                                        class="form-control"
                                                                                        value="<?php echo e(isset($store_payment_setting['skrill_email']) ? $store_payment_setting['skrill_email'] : ''); ?>"
                                                                                        placeholder="<?php echo e(__('Skrill Email')); ?>" />
                                                                                    <?php if($errors->has('skrill_email')): ?>
                                                                                        <span
                                                                                            class="invalid-feedback d-block">
                                                                                            <?php echo e($errors->first('skrill_email')); ?>

                                                                                        </span>
                                                                                    <?php endif; ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="headingthirteen">
                                                                <button class="accordion-button collapsed"
                                                                    type="button" data-bs-toggle="collapse"
                                                                    data-bs-target="#collapsethirteen"
                                                                    aria-expanded="false"
                                                                    aria-controls="collapsethirteen">
                                                                    <span
                                                                        class="d-flex align-items-center"><?php echo e(__('CoinGate')); ?></span>
                                                                    <div class="d-flex align-items-center">
                                                                        <span class="me-2"><?php echo e(__('Enable:')); ?></span>
                                                                        <div
                                                                            class="form-check form-switch custom-switch-v1">
                                                                            <input type="hidden"
                                                                                name="is_coingate_enabled"
                                                                                value="off">
                                                                            <input type="checkbox"
                                                                                class="form-check-input input-primary"
                                                                                id="customswitchv1-1 is_coingate_enabled"
                                                                                name="is_coingate_enabled"
                                                                                <?php echo e(isset($store_payment_setting['is_coingate_enabled']) && $store_payment_setting['is_coingate_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                        </div>
                                                                    </div>
                                                                </button>
                                                            </h2>
                                                            <div id="collapsethirteen"
                                                                class="accordion-collapse collapse"
                                                                aria-labelledby="headingthirteen"
                                                                data-bs-parent="#accordionExample">
                                                                <div class="accordion-body">
                                                                    <div class="col-md-12 pb-4">
                                                                        <label class="paypal-label form-control-label"
                                                                            for="coingate_mode"><?php echo e(__('CoinGate Mode')); ?></label>
                                                                        <br>
                                                                        <div class="d-flex">
                                                                            <div class="mr-2"
                                                                                style="margin-right: 15px;">
                                                                                <div class="border card p-3">
                                                                                    <div class="form-check">
                                                                                        <label
                                                                                            class="form-check-labe text-dark">
                                                                                            <input type="radio"
                                                                                                name="coingate_mode"
                                                                                                value="sandbox"
                                                                                                class="form-check-input"
                                                                                                <?php echo e(!isset($store_payment_setting['coingate_mode']) || $store_payment_setting['coingate_mode'] == '' || $store_payment_setting['coingate_mode'] == 'sandbox' ? 'checked="checked"' : ''); ?>>
                                                                                            <?php echo e(__('Sandbox')); ?>

                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="mr-2">
                                                                                <div class="border card p-3">
                                                                                    <div class="form-check">
                                                                                        <label
                                                                                            class="form-check-labe text-dark">
                                                                                            <input type="radio"
                                                                                                name="coingate_mode"
                                                                                                value="live"
                                                                                                class="form-check-input"
                                                                                                <?php echo e(isset($store_payment_setting['coingate_mode']) && $store_payment_setting['coingate_mode'] == 'live' ? 'checked="checked"' : ''); ?>>
                                                                                            <?php echo e(__('Live')); ?>

                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row gy-4">
                                                                        <div class="col-lg-6">
                                                                            <div class="input-edits">
                                                                                <div class="form-group">
                                                                                    <label for="coingate_auth_token"
                                                                                        class="col-form-label"><?php echo e(__('CoinGate Auth Token')); ?></label>
                                                                                    <input type="text"
                                                                                        name="coingate_auth_token"
                                                                                        id="coingate_auth_token"
                                                                                        class="form-control"
                                                                                        value="<?php echo e(isset($store_payment_setting['coingate_auth_token']) ? $store_payment_setting['coingate_auth_token'] : ''); ?>"
                                                                                        placeholder="<?php echo e(__('CoinGate Auth Token')); ?>" />
                                                                                    <?php if($errors->has('coingate_auth_token')): ?>
                                                                                        <span
                                                                                            class="invalid-feedback d-block">
                                                                                            <?php echo e($errors->first('coingate_auth_token')); ?>

                                                                                        </span>
                                                                                    <?php endif; ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="headingfourteen">
                                                                <button class="accordion-button collapsed"
                                                                    type="button" data-bs-toggle="collapse"
                                                                    data-bs-target="#collapsefourteen"
                                                                    aria-expanded="false"
                                                                    aria-controls="collapsefourteen">
                                                                    <span
                                                                        class="d-flex align-items-center"><?php echo e(__('Paymentwall')); ?></span>
                                                                    <div class="d-flex align-items-center">
                                                                        <span class="me-2"><?php echo e('Enable:'); ?></span>
                                                                        <div
                                                                            class="form-check form-switch custom-switch-v1">
                                                                            <input type="hidden"
                                                                                name="is_paymentwall_enabled"
                                                                                value="off">
                                                                            <input type="checkbox"
                                                                                class="form-check-input input-primary"
                                                                                id="customswitchv1-1 is_paymentwall_enabled"
                                                                                name="is_paymentwall_enabled"
                                                                                <?php echo e(isset($store_payment_setting['is_paymentwall_enabled']) && $store_payment_setting['is_paymentwall_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                        </div>
                                                                    </div>
                                                                </button>
                                                            </h2>
                                                            <div id="collapsefourteen"
                                                                class="accordion-collapse collapse"
                                                                aria-labelledby="headingfourteen"
                                                                data-bs-parent="#accordionExample">
                                                                <div class="accordion-body">
                                                                    <div class="row gy-4">
                                                                        <div class="col-lg-6">
                                                                            <div class="input-edits">
                                                                                <div class="form-group">
                                                                                    <label for="paymentwall_public_key"
                                                                                        class="col-form-label"><?php echo e(__('Public Key')); ?></label>
                                                                                    <input type="text"
                                                                                        name="paymentwall_public_key"
                                                                                        id="paymentwall_public_key"
                                                                                        class="form-control"
                                                                                        value="<?php echo e(isset($store_payment_setting['paymentwall_public_key']) ? $store_payment_setting['paymentwall_public_key'] : ''); ?>"
                                                                                        placeholder="<?php echo e(__('Public Key')); ?>" />
                                                                                    <?php if($errors->has('paymentwall_public_key')): ?>
                                                                                        <span
                                                                                            class="invalid-feedback d-block">
                                                                                            <?php echo e($errors->first('paymentwall_public_key')); ?>

                                                                                        </span>
                                                                                    <?php endif; ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <div class="input-edits">
                                                                                <div class="form-group">
                                                                                    <label for="paymentwall_private_key"
                                                                                        class="col-form-label"><?php echo e(__('Private Key')); ?></label>
                                                                                    <input type="text"
                                                                                        name="paymentwall_private_key"
                                                                                        id="paymentwall_private_key"
                                                                                        class="form-control col-form-label"
                                                                                        value="<?php echo e(isset($store_payment_setting['paymentwall_private_key']) ? $store_payment_setting['paymentwall_private_key'] : ''); ?>"
                                                                                        placeholder="<?php echo e(__('Private Key')); ?>" />
                                                                                    <?php if($errors->has('paymentwall_private_key')): ?>
                                                                                        <span
                                                                                            class="invalid-feedback d-block">
                                                                                            <?php echo e($errors->first('paymentwall_private_key')); ?>

                                                                                        </span>
                                                                                    <?php endif; ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="headingfifteen">
                                                                <button class="accordion-button collapsed"
                                                                    type="button" data-bs-toggle="collapse"
                                                                    data-bs-target="#collapsefifteen"
                                                                    aria-expanded="false"
                                                                    aria-controls="collapsefifteen">
                                                                    <span
                                                                        class="d-flex align-items-center"><?php echo e(__('Payfast')); ?></span>
                                                                    <div class="d-flex align-items-center">
                                                                        <span class="me-2"><?php echo e(__('Enable:')); ?></span>
                                                                        <div
                                                                            class="form-check form-switch custom-switch-v1">
                                                                            <input type="hidden"
                                                                                name="is_payfast_enabled"
                                                                                value="off">
                                                                            <input type="checkbox"
                                                                                class="form-check-input input-primary"
                                                                                id="customswitchv1-1 is_payfast_enabled"
                                                                                name="is_payfast_enabled"
                                                                                <?php echo e(isset($store_payment_setting['is_payfast_enabled']) && $store_payment_setting['is_payfast_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                        </div>
                                                                    </div>
                                                                </button>
                                                            </h2>
                                                            <div id="collapsefifteen"
                                                                class="accordion-collapse collapse"
                                                                aria-labelledby="headingfifteen"
                                                                data-bs-parent="#accordionExample">
                                                                <div class="accordion-body">
                                                                    <div class="col-md-12 pb-4">
                                                                        <label class="coingate-label col-form-label"
                                                                            for="payfast_mode"><?php echo e(__('Payfast Mode')); ?></label>
                                                                        <br>
                                                                        <div class="d-flex">
                                                                            <div class="mr-2"
                                                                                style="margin-right: 15px;">
                                                                                <div class="border card p-3">
                                                                                    <div class="form-check">
                                                                                        <label
                                                                                            class="form-check-labe text-dark">
                                                                                            <input type="radio"
                                                                                                name="payfast_mode"
                                                                                                value="sandbox"
                                                                                                class="form-check-input"
                                                                                                <?php echo e(!isset($store_payment_setting['payfast_mode']) || $store_payment_setting['payfast_mode'] == '' || $store_payment_setting['payfast_mode'] == 'sandbox' ? 'checked="checked"' : ''); ?>>
                                                                                            <?php echo e(__('Sandbox')); ?>

                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="mr-2">
                                                                                <div class="border card p-3">
                                                                                    <div class="form-check">
                                                                                        <label
                                                                                            class="form-check-labe text-dark">
                                                                                            <input type="radio"
                                                                                                name="payfast_mode"
                                                                                                value="live"
                                                                                                class="form-check-input"
                                                                                                <?php echo e(isset($store_payment_setting['payfast_mode']) && $store_payment_setting['payfast_mode'] == 'live' ? 'checked="checked"' : ''); ?>>
                                                                                            <?php echo e(__('Live')); ?>

                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row gy-4">
                                                                        <div class="col-lg-4">
                                                                            <div class="input-edits">
                                                                                <div class="form-group">
                                                                                    <label for="payfast_merchant_id"
                                                                                        class="col-form-label"><?php echo e(__('Merchant Id')); ?></label>
                                                                                    <input type="text"
                                                                                        name="payfast_merchant_id"
                                                                                        id="payfast_merchant_id"
                                                                                        class="form-control"
                                                                                        value="<?php echo e(isset($store_payment_setting['payfast_merchant_id']) ? $store_payment_setting['payfast_merchant_id'] : ''); ?>"
                                                                                        placeholder="<?php echo e(__('Public Key')); ?>" />
                                                                                    <?php if($errors->has('payfast_merchant_id')): ?>
                                                                                        <span
                                                                                            class="invalid-feedback d-block">
                                                                                            <?php echo e($errors->first('payfast_merchant_id')); ?>

                                                                                        </span>
                                                                                    <?php endif; ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <div class="input-edits">
                                                                                <div class="form-group">
                                                                                    <label for="paymentwall_secret_key"
                                                                                        class="col-form-label"><?php echo e(__('Merchant Key')); ?></label>
                                                                                    <input type="text"
                                                                                        name="payfast_merchant_key"
                                                                                        id="payfast_merchant_key"
                                                                                        class="form-control"
                                                                                        value="<?php echo e(isset($store_payment_setting['payfast_merchant_key']) ? $store_payment_setting['payfast_merchant_key'] : ''); ?>"
                                                                                        placeholder="<?php echo e(__('Public Key')); ?>" />
                                                                                    <?php if($errors->has('payfast_merchant_key')): ?>
                                                                                        <span
                                                                                            class="invalid-feedback d-block">
                                                                                            <?php echo e($errors->first('payfast_merchant_key')); ?>

                                                                                        </span>
                                                                                    <?php endif; ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <div class="input-edits">
                                                                                <div class="form-group">
                                                                                    <label for="payfast_signature"
                                                                                        class="col-form-label"><?php echo e(__('Payfast Signature')); ?></label>
                                                                                    <input type="text"
                                                                                        name="payfast_signature"
                                                                                        id="payfast_signature"
                                                                                        class="form-control"
                                                                                        value="<?php echo e(isset($store_payment_setting['payfast_signature']) ? $store_payment_setting['payfast_signature'] : ''); ?>"
                                                                                        placeholder="<?php echo e(__('Public Key')); ?>" />
                                                                                    <?php if($errors->has('payfast_signature')): ?>
                                                                                        <span
                                                                                            class="invalid-feedback d-block">
                                                                                            <?php echo e($errors->first('payfast_signature')); ?>

                                                                                        </span>
                                                                                    <?php endif; ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="headingSixteen">
                                                                <button class="accordion-button collapsed"
                                                                    type="button" data-bs-toggle="collapse"
                                                                    data-bs-target="#collapseSixteen"
                                                                    aria-expanded="false"
                                                                    aria-controls="collapseSixteen">
                                                                    <span
                                                                        class="d-flex align-items-center"><?php echo e(__('Toyyibpay')); ?></span>
                                                                    <div class="d-flex align-items-center">
                                                                        <span class="me-2"><?php echo e(__('Enable:')); ?>:</span>
                                                                        <div
                                                                            class="form-check form-switch custom-switch-v1">
                                                                            <input type="hidden"
                                                                                name="is_toyyibpay_enabled"
                                                                                value="off">
                                                                            <input type="checkbox"
                                                                                name="is_toyyibpay_enabled"
                                                                                class="form-check-input input-primary"
                                                                                id="is_toyyibpay_enabled"
                                                                                <?php echo e(isset($store_payment_setting['is_toyyibpay_enabled']) && $store_payment_setting['is_toyyibpay_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                            <label class="form-check-label"
                                                                                for="is_toyyibpay_enabled"></label>
                                                                        </div>
                                                                    </div>
                                                                </button>
                                                            </h2>
                                                            <div id="collapseSixteen"
                                                                class="accordion-collapse collapse"
                                                                aria-labelledby="headingSixteen"
                                                                data-bs-parent="#accordionExample">
                                                                <div class="accordion-body">
                                                                    <div class="row gy-4">
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label for="toyyibpay_category_code"
                                                                                    class="col-form-label"><?php echo e(__('Category Code')); ?></label>
                                                                                <input type="text"
                                                                                    name="toyyibpay_category_code"
                                                                                    id="toyyibpay_category_code"
                                                                                    class="form-control"
                                                                                    value="<?php echo e(!isset($store_payment_setting['toyyibpay_category_code']) || is_null($store_payment_setting['toyyibpay_category_code']) ? '' : $store_payment_setting['toyyibpay_category_code']); ?>"
                                                                                    placeholder="<?php echo e(__('category code')); ?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label for="toyyibpay_secret_key"
                                                                                    class="col-form-label"><?php echo e(__('Secret Key')); ?></label>
                                                                                <input type="text"
                                                                                    name="toyyibpay_secret_key"
                                                                                    id="toyyibpay_secret_key"
                                                                                    class="form-control"
                                                                                    value="<?php echo e(!isset($store_payment_setting['toyyibpay_secret_key']) || is_null($store_payment_setting['toyyibpay_secret_key']) ? '' : $store_payment_setting['toyyibpay_secret_key']); ?>"
                                                                                    placeholder="<?php echo e(__('toyyibpay secret key')); ?>">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="headingNineteen">
                                                                <button class="accordion-button collapsed"
                                                                    type="button" data-bs-toggle="collapse"
                                                                    data-bs-target="#collapseNineteen"
                                                                    aria-expanded="false"
                                                                    aria-controls="collapseNineteen">
                                                                    <span
                                                                        class="d-flex align-items-center"><?php echo e(__('IyziPay')); ?></span>
                                                                    <div class="d-flex align-items-center">
                                                                        <span class="me-2"><?php echo e(__('Enable:')); ?>:</span>
                                                                        <div
                                                                            class="form-check form-switch custom-switch-v1">
                                                                            <input type="hidden"
                                                                                name="is_iyzipay_enabled"
                                                                                value="off">
                                                                            <input type="checkbox"
                                                                                name="is_iyzipay_enabled"
                                                                                class="form-check-input input-primary"
                                                                                id="is_iyzipay_enabled"
                                                                                <?php echo e(isset($store_payment_setting['is_iyzipay_enabled']) && $store_payment_setting['is_iyzipay_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                            <label class="form-check-label"
                                                                                for="is_iyzipay_enabled"></label>
                                                                        </div>
                                                                    </div>
                                                                </button>
                                                            </h2>
                                                            <div id="collapseNineteen"
                                                                class="accordion-collapse collapse"
                                                                aria-labelledby="headingNineteen"
                                                                data-bs-parent="#accordionExample">
                                                                <div class="accordion-body">
                                                                    <div class="col-md-12 pb-4">
                                                                        <label class="iyzipay-label col-form-label"
                                                                            for="iyzipay_mode"><?php echo e(__('Iyzipay Environment')); ?></label>
                                                                        <br>

                                                                        <div class="d-flex">
                                                                            <div class="mr-2"
                                                                                style="margin-right: 15px;">
                                                                                <div class="border card p-3">
                                                                                    <div class="form-check">
                                                                                        <label
                                                                                            class="form-check-labe text-dark">
                                                                                            <input type="radio"
                                                                                                name="iyzipay_mode"
                                                                                                value="sandbox"
                                                                                                class="form-check-input"
                                                                                                <?php echo e(!isset($store_payment_setting['iyzipay_mode']) || $store_payment_setting['iyzipay_mode'] == '' || $store_payment_setting['iyzipay_mode'] == 'sandbox' ? 'checked="checked"' : ''); ?>>
                                                                                            <?php echo e(__('Sandbox')); ?>

                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="mr-2">
                                                                                <div class="border card p-3">
                                                                                    <div class="form-check">
                                                                                        <label
                                                                                            class="form-check-labe text-dark">
                                                                                            <input type="radio"
                                                                                                name="iyzipay_mode"
                                                                                                value="live"
                                                                                                class="form-check-input"
                                                                                                <?php echo e(isset($store_payment_setting['iyzipay_mode']) && $store_payment_setting['iyzipay_mode'] == 'live' ? 'checked="checked"' : ''); ?>>
                                                                                            <?php echo e(__('Live')); ?>

                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row gy-4">
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label for="iyzipay_api_key"
                                                                                    class="col-form-label"><?php echo e(__('Iyzipay API Key')); ?></label>
                                                                                <input type="text"
                                                                                    name="iyzipay_api_key"
                                                                                    id="iyzipay_api_key"
                                                                                    class="form-control"
                                                                                    value="<?php echo e(!isset($store_payment_setting['iyzipay_api_key']) || is_null($store_payment_setting['iyzipay_api_key']) ? '' : $store_payment_setting['iyzipay_api_key']); ?>"
                                                                                    placeholder="<?php echo e(__('Iyzipay category code')); ?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label for="iyzipay_secret_key"
                                                                                    class="col-form-label"><?php echo e(__('Secret Key')); ?></label>
                                                                                <input type="text"
                                                                                    name="iyzipay_secret_key"
                                                                                    id="iyzipay_secret_key"
                                                                                    class="form-control"
                                                                                    value="<?php echo e(!isset($store_payment_setting['iyzipay_secret_key']) || is_null($store_payment_setting['iyzipay_secret_key']) ? '' : $store_payment_setting['iyzipay_secret_key']); ?>"
                                                                                    placeholder="<?php echo e(__('Iyzipay secret key')); ?>">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="headingTwenty">
                                                                <button class="accordion-button collapsed"
                                                                    type="button" data-bs-toggle="collapse"
                                                                    data-bs-target="#collapseTwenty"
                                                                    aria-expanded="false"
                                                                    aria-controls="collapseTwenty">
                                                                    <span
                                                                        class="d-flex align-items-center"><?php echo e(__('SS Pay')); ?></span>
                                                                    <div class="d-flex align-items-center">
                                                                        <span class="me-2"><?php echo e(__('Enable:')); ?>:</span>
                                                                        <div
                                                                            class="form-check form-switch custom-switch-v1">
                                                                            <input type="hidden"
                                                                                name="is_sspay_enabled" value="off">
                                                                            <input type="checkbox"
                                                                                name="is_sspay_enabled"
                                                                                class="form-check-input input-primary"
                                                                                id="is_sspay_enabled"
                                                                                <?php echo e(isset($store_payment_setting['is_sspay_enabled']) && $store_payment_setting['is_sspay_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                            <label class="form-check-label"
                                                                                for="is_sspay_enabled"></label>
                                                                        </div>
                                                                    </div>
                                                                </button>
                                                            </h2>
                                                            <div id="collapseTwenty" class="accordion-collapse collapse"
                                                                aria-labelledby="headingTwenty"
                                                                data-bs-parent="#accordionExample">
                                                                <div class="accordion-body">
                                                                    <div class="row gy-4">
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label for="sspay_category_code"
                                                                                    class="col-form-label"><?php echo e(__('SS Pay Category Code')); ?></label>
                                                                                <input type="text"
                                                                                    name="sspay_category_code"
                                                                                    id="sspay_category_code"
                                                                                    class="form-control"
                                                                                    value="<?php echo e(!isset($store_payment_setting['sspay_category_code']) || is_null($store_payment_setting['sspay_category_code']) ? '' : $store_payment_setting['sspay_category_code']); ?>"
                                                                                    placeholder="<?php echo e(__('SS Pay category code')); ?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label for="sspay_secret_key"
                                                                                    class="col-form-label"><?php echo e(__('SS Pay Secret Key')); ?></label>
                                                                                <input type="text"
                                                                                    name="sspay_secret_key"
                                                                                    id="sspay_secret_key"
                                                                                    class="form-control"
                                                                                    value="<?php echo e(!isset($store_payment_setting['sspay_secret_key']) || is_null($store_payment_setting['sspay_secret_key']) ? '' : $store_payment_setting['sspay_secret_key']); ?>"
                                                                                    placeholder="<?php echo e(__('SS Pay secret key')); ?>">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="headingTwentyone">
                                                                <button class="accordion-button collapsed"
                                                                    type="button" data-bs-toggle="collapse"
                                                                    data-bs-target="#collapseTwentyone"
                                                                    aria-expanded="false"
                                                                    aria-controls="collapseTwentyone">
                                                                    <span
                                                                        class="d-flex align-items-center"><?php echo e(__('Paytab')); ?></span>
                                                                    <div class="d-flex align-items-center">
                                                                        <span class="me-2"><?php echo e(__('Enable:')); ?>:</span>
                                                                        <div
                                                                            class="form-check form-switch custom-switch-v1">
                                                                            <input type="hidden"
                                                                                name="is_paytab_enabled" value="off">
                                                                            <input type="checkbox"
                                                                                name="is_paytab_enabled"
                                                                                class="form-check-input input-primary"
                                                                                id="is_paytab_enabled"
                                                                                <?php echo e(isset($store_payment_setting['is_paytab_enabled']) && $store_payment_setting['is_paytab_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                            <label class="form-check-label"
                                                                                for="is_paytab_enabled"></label>
                                                                        </div>
                                                                    </div>
                                                                </button>
                                                            </h2>
                                                            <div id="collapseTwentyone"
                                                                class="accordion-collapse collapse"
                                                                aria-labelledby="headingTwentyone"
                                                                data-bs-parent="#accordionExample">
                                                                <div class="accordion-body">
                                                                    <div class="row gy-4">
                                                                        <div class="col-lg-4">
                                                                            <div class="form-group">
                                                                                <label for="paytab_profile_id"
                                                                                    class="col-form-label"><?php echo e(__('Paytab Profile Id')); ?></label>
                                                                                <input type="text"
                                                                                    name="paytab_profile_id"
                                                                                    id="paytab_profile_id"
                                                                                    class="form-control"
                                                                                    value="<?php echo e(!isset($store_payment_setting['paytab_profile_id']) || is_null($store_payment_setting['paytab_profile_id']) ? '' : $store_payment_setting['paytab_profile_id']); ?>"
                                                                                    placeholder="<?php echo e(__('Paytab Profile Id')); ?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <div class="form-group">
                                                                                <label for="paytab_server_key"
                                                                                    class="col-form-label"><?php echo e(__('Paytab Server Key')); ?></label>
                                                                                <input type="text"
                                                                                    name="paytab_server_key"
                                                                                    id="paytab_server_key"
                                                                                    class="form-control"
                                                                                    value="<?php echo e(!isset($store_payment_setting['paytab_server_key']) || is_null($store_payment_setting['paytab_server_key']) ? '' : $store_payment_setting['paytab_server_key']); ?>"
                                                                                    placeholder="<?php echo e(__('Paytab Server Key')); ?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <div class="form-group">
                                                                                <label for="paytab_region"
                                                                                    class="col-form-label"><?php echo e(__('Paytab Region')); ?></label>
                                                                                <input type="text"
                                                                                    name="paytab_region"
                                                                                    id="paytab_region"
                                                                                    class="form-control"
                                                                                    value="<?php echo e(!isset($store_payment_setting['paytab_region']) || is_null($store_payment_setting['paytab_region']) ? '' : $store_payment_setting['paytab_region']); ?>"
                                                                                    placeholder="<?php echo e(__('Paytab Region')); ?>">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="headingTwentytwo">
                                                                <button class="accordion-button collapsed"
                                                                    type="button" data-bs-toggle="collapse"
                                                                    data-bs-target="#collapseTwentytwo"
                                                                    aria-expanded="false"
                                                                    aria-controls="collapseTwentytwo">
                                                                    <span
                                                                        class="d-flex align-items-center"><?php echo e(__('Benefit')); ?></span>
                                                                    <div class="d-flex align-items-center">
                                                                        <span class="me-2"><?php echo e(__('Enable:')); ?>:</span>
                                                                        <div
                                                                            class="form-check form-switch custom-switch-v1">
                                                                            <input type="hidden"
                                                                                name="is_benefit_enabled"
                                                                                value="off">
                                                                            <input type="checkbox"
                                                                                name="is_benefit_enabled"
                                                                                class="form-check-input input-primary"
                                                                                id="is_benefit_enabled"
                                                                                <?php echo e(isset($store_payment_setting['is_benefit_enabled']) && $store_payment_setting['is_benefit_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                            <label class="form-check-label"
                                                                                for="is_benefit_enabled"></label>
                                                                        </div>
                                                                    </div>
                                                                </button>
                                                            </h2>
                                                            <div id="collapseTwentytwo"
                                                                class="accordion-collapse collapse"
                                                                aria-labelledby="headingTwentytwo"
                                                                data-bs-parent="#accordionExample">
                                                                <div class="accordion-body">
                                                                    <div class="row gy-4">
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label for="benefit_secret_key"
                                                                                    class="col-form-label"><?php echo e(__('Benefit Key')); ?></label>
                                                                                <input type="text"
                                                                                    name="benefit_secret_key"
                                                                                    id="benefit_secret_key"
                                                                                    class="form-control"
                                                                                    value="<?php echo e(!isset($store_payment_setting['benefit_secret_key']) || is_null($store_payment_setting['benefit_secret_key']) ? '' : $store_payment_setting['benefit_secret_key']); ?>"
                                                                                    placeholder="<?php echo e(__('Benefit Key')); ?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label for="publishable_api_key"
                                                                                    class="col-form-label"><?php echo e(__('Benefit Secret Key')); ?></label>
                                                                                <input type="text"
                                                                                    name="publishable_api_key"
                                                                                    id="publishable_api_key"
                                                                                    class="form-control"
                                                                                    value="<?php echo e(!isset($store_payment_setting['publishable_api_key']) || is_null($store_payment_setting['publishable_api_key']) ? '' : $store_payment_setting['publishable_api_key']); ?>"
                                                                                    placeholder="<?php echo e(__('Benefit Secret Key')); ?>">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="headingTwentyTwo">
                                                                <button class="accordion-button collapsed"
                                                                    type="button" data-bs-toggle="collapse"
                                                                    data-bs-target="#collapseTwentyThree"
                                                                    aria-expanded="false"
                                                                    aria-controls="collapseTwentyThree">
                                                                    <span class="d-flex align-items-center">
                                                                        <?php echo e(__('Cashfree')); ?>

                                                                    </span>
                                                                    <div class="d-flex align-items-center">
                                                                        <span
                                                                            class="me-2"><?php echo e(__('Enable')); ?>::</span>
                                                                        <div
                                                                            class="form-check form-switch custom-switch-v1">
                                                                            <input type="hidden"
                                                                                name="is_cashfree_enabled"
                                                                                value="off">
                                                                            <input type="checkbox"
                                                                                class="form-check-input input-primary"
                                                                                name="is_cashfree_enabled"
                                                                                id="is_cashfree_enabled"
                                                                                <?php echo e(isset($store_payment_setting['is_cashfree_enabled']) && $store_payment_setting['is_cashfree_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                            <label class="form-check-label"
                                                                                for="is_cashfree_enabled"></label>
                                                                        </div>
                                                                    </div>
                                                                </button>
                                                            </h2>
                                                            <div id="collapseTwentyThree"
                                                                class="accordion-collapse collapse"
                                                                aria-labelledby="headingTwentyTwo"
                                                                data-bs-parent="#accordionExample">
                                                                <div class="accordion-body">
                                                                    <div class="row gy-4">

                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <?php echo e(Form::label('cashfree_api_key', __('Cashfree Key'), ['class' => 'col-form-label'])); ?>

                                                                                <?php echo e(Form::text('cashfree_api_key', isset($store_payment_setting['cashfree_api_key']) ? $store_payment_setting['cashfree_api_key'] : '', ['class' => 'form-control', 'placeholder' => __('Enter Cashfree Key')])); ?>

                                                                                <?php $__errorArgs = ['cashfree_api_key'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                                    <span class="invalid-cashfree_api_key"
                                                                                        role="alert">
                                                                                        <strong
                                                                                            class="text-danger"><?php echo e($message); ?></strong>
                                                                                    </span>
                                                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <?php echo e(Form::label('cashfree_secret_key', __('Cashfree Secret Key'), ['class' => 'col-form-label'])); ?>

                                                                                <?php echo e(Form::text('cashfree_secret_key', isset($store_payment_setting['cashfree_secret_key']) ? $store_payment_setting['cashfree_secret_key'] : '', ['class' => 'form-control ', 'placeholder' => __('Enter Cashfree Secret key')])); ?>

                                                                                <?php $__errorArgs = ['cashfree_secret_key'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                                    <span class="invalid-cashfree_secret_key"
                                                                                        role="alert">
                                                                                        <strong
                                                                                            class="text-danger"><?php echo e($message); ?></strong>
                                                                                    </span>
                                                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="headingTwentythree">
                                                                <button class="accordion-button" type="button"
                                                                    data-bs-toggle="collapse"
                                                                    data-bs-target="#collapseTwentyfour"
                                                                    aria-expanded="true"
                                                                    aria-controls="collapseTwentyfour">
                                                                    <span class="d-flex align-items-center">
                                                                        <?php echo e(__('Aamarpay')); ?>

                                                                    </span>
                                                                    <div class="d-flex align-items-center">
                                                                        <label class="form-check-label m-1"
                                                                            for="is_aamarpay_enabled"><?php echo e(__('Enable')); ?></label>
                                                                        <div
                                                                            class="form-check form-switch custom-switch-v1">
                                                                            <input type="hidden"
                                                                                name="is_aamarpay_enabled"
                                                                                value="off">
                                                                            <input type="checkbox"
                                                                                class="form-check-input input-primary"
                                                                                name="is_aamarpay_enabled"
                                                                                id="is_aamarpay_enabled"
                                                                                <?php echo e(isset($store_payment_setting['is_aamarpay_enabled']) && $store_payment_setting['is_aamarpay_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                        </div>
                                                                    </div>
                                                                </button>
                                                            </h2>
                                                            <div id="collapseTwentyfour"
                                                                class="accordion-collapse collapse"
                                                                aria-labelledby="headingTwentythree"
                                                                data-bs-parent="#accordionExample">
                                                                <div class="accordion-body">
                                                                    <div class="row pt-2">
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <?php echo e(Form::label('aamarpay_store_id', __('Store Id'), ['class' => 'form-label'])); ?>

                                                                                <?php echo e(Form::text('aamarpay_store_id', isset($store_payment_setting['aamarpay_store_id']) ? $store_payment_setting['aamarpay_store_id'] : '', ['class' => 'form-control', 'placeholder' => __('Store Id')])); ?><br>
                                                                                <?php if($errors->has('aamarpay_store_id')): ?>
                                                                                    <span
                                                                                        class="invalid-feedback d-block">
                                                                                        <?php echo e($errors->first('aamarpay_store_id')); ?>

                                                                                    </span>
                                                                                <?php endif; ?>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <?php echo e(Form::label('aamarpay_signature_key', __('Signature Key'), ['class' => 'form-label'])); ?>

                                                                                <?php echo e(Form::text('aamarpay_signature_key', isset($store_payment_setting['aamarpay_signature_key']) ? $store_payment_setting['aamarpay_signature_key'] : '', ['class' => 'form-control', 'placeholder' => __('Signature Key')])); ?><br>
                                                                                <?php if($errors->has('aamarpay_signature_key')): ?>
                                                                                    <span
                                                                                        class="invalid-feedback d-block">
                                                                                        <?php echo e($errors->first('aamarpay_signature_key')); ?>

                                                                                    </span>
                                                                                <?php endif; ?>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <?php echo e(Form::label('aamarpay_description', __('Description'), ['class' => 'form-label'])); ?>

                                                                                <?php echo e(Form::text('aamarpay_description', isset($store_payment_setting['aamarpay_description']) ? $store_payment_setting['aamarpay_description'] : '', ['class' => 'form-control', 'placeholder' => __('Description')])); ?><br>
                                                                                <?php if($errors->has('aamarpay_description')): ?>
                                                                                    <span
                                                                                        class="invalid-feedback d-block">
                                                                                        <?php echo e($errors->first('aamarpay_description')); ?>

                                                                                    </span>
                                                                                <?php endif; ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                          
                                                      <div class="accordion-item">
                                                        <h2 class="accordion-header" id="headingTwentyfour">
                                                            <button class="accordion-button" type="button"
                                                                data-bs-toggle="collapse"
                                                                data-bs-target="#collapseTwentyfive"
                                                                aria-expanded="true" aria-controls="collapseTwentyfive">
                                                                <span class="d-flex align-items-center">
                                                                    <?php echo e(__('Pay TR')); ?>

                                                                </span>
                                                                <div class="d-flex align-items-center">
                                                                    <label class="form-check-label m-1"
                                                                        for="is_paytr_enabled"><?php echo e(__('Enable')); ?></label>
                                                                    <div class="form-check form-switch custom-switch-v1">
                                                                        <input type="hidden" name="is_paytr_enabled"
                                                                            value="off">
                                                                        <input type="checkbox"
                                                                            class="form-check-input input-primary"
                                                                            name="is_paytr_enabled"
                                                                            id="is_paytr_enabled"
                                                                            <?php echo e(isset($store_payment_setting['is_paytr_enabled']) && $store_payment_setting['is_paytr_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                    </div>
                                                                </div>
                                                            </button>
                                                        </h2>
                                                        <div id="collapseTwentyfive" class="accordion-collapse collapse"
                                                            aria-labelledby="headingTwentyfour"
                                                            data-bs-parent="#accordionExample">
                                                            <div class="accordion-body">
                                                                <div class="row pt-2">
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <?php echo e(Form::label('paytr_merchant_id', __('Merchant Id'), ['class' => 'form-label'])); ?>

                                                                            <?php echo e(Form::text('paytr_merchant_id', isset($store_payment_setting['paytr_merchant_id']) ? $store_payment_setting['paytr_merchant_id'] : '', ['class' => 'form-control', 'placeholder' => __('Merchant Id')])); ?><br>
                                                                            <?php if($errors->has('paytr_merchant_id')): ?>
                                                                                <span class="invalid-feedback d-block">
                                                                                    <?php echo e($errors->first('paytr_merchant_id')); ?>

                                                                                </span>
                                                                            <?php endif; ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <?php echo e(Form::label('paytr_merchant_key', __('Merchant Key'), ['class' => 'form-label'])); ?>

                                                                            <?php echo e(Form::text('paytr_merchant_key', isset($store_payment_setting['paytr_merchant_key']) ? $store_payment_setting['paytr_merchant_key'] : '', ['class' => 'form-control', 'placeholder' => __('Merchant Key')])); ?><br>
                                                                            <?php if($errors->has('paytr_merchant_key')): ?>
                                                                                <span class="invalid-feedback d-block">
                                                                                    <?php echo e($errors->first('paytr_merchant_key')); ?>

                                                                                </span>
                                                                            <?php endif; ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <?php echo e(Form::label('paytr_merchant_salt', __('Merchant Salt'), ['class' => 'form-label'])); ?>

                                                                            <?php echo e(Form::text('paytr_merchant_salt', isset($store_payment_setting['paytr_merchant_salt']) ? $store_payment_setting['paytr_merchant_salt'] : '', ['class' => 'form-control', 'placeholder' => __('Merchant Salt')])); ?><br>
                                                                            <?php if($errors->has('paytr_merchant_salt')): ?>
                                                                                <span class="invalid-feedback d-block">
                                                                                    <?php echo e($errors->first('paytr_merchant_salt')); ?>

                                                                                </span>
                                                                            <?php endif; ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer ">
                                    <div class="col-sm-12">
                                        <div class="d-flex justify-content-end">
                                            <?php echo e(Form::submit(__('Save Changes'), ['class' => 'btn btn-xs btn-primary'])); ?>

                                        </div>
                                    </div>
                                </div>
                                <?php echo e(Form::close()); ?>

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="store_email_settings" role="tabpanel"
                        aria-labelledby="store_email_settings-tab">
                        <div id="store_email_settings" class="card">

                            <div class="card-header">
                                <h5><?php echo e(__('Email Notification Settings')); ?></h5>
                            </div>
                            <?php echo e(Form::open(['route' => ['owner.email.setting', $store_settings->slug], 'method' => 'post'])); ?>

                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <?php echo e(Form::label('mail_driver', __('Mail Driver'))); ?>

                                        <?php echo e(Form::text('mail_driver', $store_settings->mail_driver, ['class' => 'form-control', 'placeholder' => __('Enter Mail Driver')])); ?>

                                        <?php $__errorArgs = ['mail_driver'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-mail_driver" role="alert">
                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <?php echo e(Form::label('mail_host', __('Mail Host'))); ?>

                                        <?php echo e(Form::text('mail_host', $store_settings->mail_host, ['class' => 'form-control ', 'placeholder' => __('Enter Mail Host')])); ?>

                                        <?php $__errorArgs = ['mail_host'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-mail_driver" role="alert">
                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <?php echo e(Form::label('mail_port', __('Mail Port'))); ?>

                                        <?php echo e(Form::text('mail_port', $store_settings->mail_port, ['class' => 'form-control', 'placeholder' => __('Enter Mail Port')])); ?>

                                        <?php $__errorArgs = ['mail_port'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-mail_port" role="alert">
                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <?php echo e(Form::label('mail_username', __('Mail Username'))); ?>

                                        <?php echo e(Form::text('mail_username', $store_settings->mail_username, ['class' => 'form-control', 'placeholder' => __('Enter Mail Username')])); ?>

                                        <?php $__errorArgs = ['mail_username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-mail_username" role="alert">
                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <?php echo e(Form::label('mail_password', __('Mail Password'))); ?>

                                        <?php echo e(Form::text('mail_password', $store_settings->mail_password, ['class' => 'form-control', 'placeholder' => __('Enter Mail Password')])); ?>

                                        <?php $__errorArgs = ['mail_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-mail_password" role="alert">
                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <?php echo e(Form::label('mail_encryption', __('Mail Encryption'))); ?>

                                        <?php echo e(Form::text('mail_encryption', $store_settings->mail_encryption, ['class' => 'form-control', 'placeholder' => __('Enter Mail Encryption')])); ?>

                                        <?php $__errorArgs = ['mail_encryption'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-mail_encryption" role="alert">
                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <?php echo e(Form::label('mail_from_address', __('Mail From Address'))); ?>

                                        <?php echo e(Form::text('mail_from_address', $store_settings->mail_from_address, ['class' => 'form-control', 'placeholder' => __('Enter Mail From Address')])); ?>

                                        <?php $__errorArgs = ['mail_from_address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-mail_from_address" role="alert">
                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <?php echo e(Form::label('mail_from_name', __('Mail From Name'))); ?>

                                        <?php echo e(Form::text('mail_from_name', $store_settings->mail_from_name, ['class' => 'form-control', 'placeholder' => __('Enter Mail From Name')])); ?>

                                        <?php $__errorArgs = ['mail_from_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-mail_from_name" role="alert">
                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <a href="#" data-url="<?php echo e(route('test.mail')); ?>" data-ajax-popup="true"
                                            data-title="<?php echo e(__('Send Test Mail')); ?>"
                                            class="send_email btn btn-xs btn-primary">
                                            <?php echo e(__('Send Test Mail')); ?>

                                        </a>
                                    </div>
                                    <div class="form-group col-md-6 d-flex justify-content-end">
                                        <?php echo e(Form::submit(__('Save Changes'), ['class' => 'btn btn-xs btn-primary'])); ?>

                                    </div>
                                </div>
                            </div>
                            <?php echo e(Form::close()); ?>

                        </div>
                    </div>
                    <div class="tab-pane fade" id="whatsapp_custom_massage" role="tabpanel"
                        aria-labelledby="whatsapp_custom_massage-tab">
                        <div id="whatsapp_custom_massage" class="card">
                            <div class="card-header">
                                <h5><?php echo e(__('WhatsApp Mail Settings')); ?></h5>
                            </div>
                            <?php echo e(Form::model($store_settings, ['route' => ['customMassage', $store_settings->slug], 'method' => 'POST'])); ?>

                            <div class="card-body">
                                <div class="row text-xs">
                                    <div class="col-6">
                                        <h6 class="font-weight-bold"><?php echo e(__('Order Variable')); ?></h6>
                                        <div class="col-6 float-left">
                                            <p class="mb-1"><?php echo e(__('Store Name')); ?> : <span
                                                    class="pull-right text-primary">{store_name}</span></p>
                                            <p class="mb-1"><?php echo e(__('Order No')); ?> : <span
                                                    class="pull-right text-primary">{order_no}</span></p>
                                            <p class="mb-1"><?php echo e(__('Customer Name')); ?> : <span
                                                    class="pull-right text-primary">{customer_name}</span></p>
                                            <p class="mb-1"><?php echo e(__('Phone')); ?> : <span
                                                    class="pull-right text-primary">{phone}</span>
                                            </p>
                                            <p class="mb-1"><?php echo e(__('Billing Address')); ?> : <span
                                                    class="pull-right text-primary">{billing_address}</span></p>
                                            <p class="mb-1"><?php echo e(__('Shipping Address')); ?> : <span
                                                    class="pull-right text-primary">{shipping_address}</span></p>
                                            <p class="mb-1"><?php echo e(__('Special Instruct')); ?> : <span
                                                    class="pull-right text-primary">{special_instruct}</span></p>
                                        </div>
                                        <p class="mb-1"><?php echo e(__('Item Variable')); ?> : <span
                                                class="pull-right text-primary">{item_variable}</span></p>
                                        <p class="mb-1"><?php echo e(__('Qty Total')); ?> : <span
                                                class="pull-right text-primary">{qty_total}</span>
                                        </p>
                                        <p class="mb-1"><?php echo e(__('Sub Total')); ?> : <span
                                                class="pull-right text-primary">{sub_total}</span>
                                        </p>
                                        <p class="mb-1"><?php echo e(__('Discount Amount')); ?> : <span
                                                class="pull-right text-primary">{discount_amount}</span></p>
                                        <p class="mb-1"><?php echo e(__('Shipping Amount')); ?> : <span
                                                class="pull-right text-primary">{shipping_amount}</span></p>
                                        <p class="mb-1"><?php echo e(__('Total Tax')); ?> : <span
                                                class="pull-right text-primary">{total_tax}</span>
                                        </p>
                                        <p class="mb-1"><?php echo e(__('Final Total')); ?> : <span
                                                class="pull-right text-primary">{final_total}</span></p>
                                    </div>
                                    <div class="col-6">
                                        <h6 class="font-weight-bold"><?php echo e(__('Item Variable')); ?></h6>
                                        <p class="mb-1"><?php echo e(__('Sku')); ?> : <span
                                                class="pull-right text-primary">{sku}</span></p>
                                        <p class="mb-1"><?php echo e(__('Quantity')); ?> : <span
                                                class="pull-right text-primary">{quantity}</span>
                                        </p>
                                        <p class="mb-1"><?php echo e(__('Product Name')); ?> : <span
                                                class="pull-right text-primary">{product_name}</span></p>
                                        <p class="mb-1"><?php echo e(__('Variant Name')); ?> : <span
                                                class="pull-right text-primary">{variant_name}</span></p>
                                        <p class="mb-1"><?php echo e(__('Item Tax')); ?> : <span
                                                class="pull-right text-primary">{item_tax}</span>
                                        </p>
                                        <p class="mb-1"><?php echo e(__('Item total')); ?> : <span
                                                class="pull-right text-primary">{item_total}</span></p>
                                        <div class="form-group">
                                            <label for="storejs" class="col-form-label">{item_variable}</label>
                                            <?php echo e(Form::text('item_variable', null, ['class' => 'form-control', 'placeholder' => '{quantity} x {product_name} - {variant_name} + {item_tax} = {item_total}'])); ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 px-4 language-form-wrap">
                                <div class="row">
                                    <div class="form-group col-12">
                                        <?php echo e(Form::label('content', __('Whatsapp Message'), ['class' => 'col-form-label text-dark'])); ?>

                                        <?php echo e(Form::textarea('content', null, ['class' => 'form-control', 'required' => 'required'])); ?>

                                    </div>
                                    <div class="col-md-12 text-right">
                                        <div class="form-group col-md-12 d-flex justify-content-end">
                                            <?php echo e(Form::submit(__('Save Changes'), ['class' => 'btn btn-xs btn-primary'])); ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php echo e(Form::close()); ?>

                        </div>
                    </div>
                    <div class="tab-pane fade" id="twilio_settings" role="tabpanel"
                        aria-labelledby="twilio_settings-tab">
                        <div id="twilio_settings" class="card">
                            <form method="POST" action="<?php echo e(route('owner.twilio.setting', $store_settings->slug)); ?>"
                                accept-charset="UTF-8">
                                <?php echo csrf_field(); ?>
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-6">
                                            <h5><?php echo e(__('Twilio Settings')); ?></h5>
                                            <small><?php echo e(__('Enter your Twilio details')); ?></small>
                                        </div>
                                        <div class="col-6 d-flex justify-content-end">
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" name="is_twilio_enabled" id="twilio_module"
                                                    class="twilio_enabled" data-toggle="switchbutton"
                                                    <?php echo e($store_settings['is_twilio_enabled'] == 'on' ? 'checked=checked' : ''); ?>

                                                    data-onstyle="primary">
                                                <label class="form-check-labe" for="twilio_module"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="row twilio">
                                        <div class="col-lg-6 col-md-6 col-sm-6 form-group">
                                            <label for="twilio_token"
                                                class="col-form-label"><?php echo e(__('Twilio SID')); ?></label>
                                            <input class="form-control" name="twilio_sid" type="text"
                                                value="<?php echo e($store_settings->twilio_sid); ?>" id="twilio_sid">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 form-group">
                                            <label for="twilio_token"
                                                class="col-form-label"><?php echo e(__('Twilio Token')); ?></label>
                                            <input class="form-control " name="twilio_token" type="text"
                                                value="<?php echo e($store_settings->twilio_token); ?>" id="twilio_token">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 form-group">
                                            <label for="twilio_from"
                                                class="col-form-label"><?php echo e(__('Twilio From')); ?></label>
                                            <input class="form-control " name="twilio_from" type="text"
                                                value="<?php echo e($store_settings->twilio_from); ?>" id="twilio_from">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 form-group">
                                            <label for="notification_number"
                                                class="col-form-label"><?php echo e(__('Notification Number')); ?></label>
                                            <input class="form-control " name="notification_number" type="text"
                                                value="<?php echo e($store_settings->notification_number); ?>"
                                                id="notification_number">
                                            <small><?php echo e(__('* Please add a country code to your number. *')); ?></small>
                                        </div>
                                    </div>
                                    <div class="col-lg-12  d-flex justify-content-end">
                                        <input type="submit" value="<?php echo e(__('Save Changes')); ?>"
                                            class="btn btn-xs btn-primary">
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pixel_settings" role="tabpanel"
                        aria-labelledby="pixel_settings-tab">
                        <div id="pixel_settings" class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-6">
                                        <h5><?php echo e(__('Pixel Settings')); ?></h5>
                                        <small><?php echo e(__('Enter your Pixel details')); ?></small>
                                    </div>
                                    <div class="col-6 d-flex justify-content-end">
                                        <a href="#" class="btn btn-sm btn-icon  btn-primary me-2"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="<?php echo e(__('Create')); ?>" data-size="md" data-ajax-popup="true"
                                            data-title="<?php echo e(__('Create New Pixel')); ?>"
                                            data-url="<?php echo e(route('pixel.create')); ?>">
                                            <i data-feather="plus"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table mb-0 pc-dt-simple" id="pc-dt-simple">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="sort" data-sort="name">
                                                    <?php echo e(__('Plateform')); ?></th>
                                                <th scope="col" class="sort" data-sort="name">
                                                    <?php echo e(__('Pixel ID')); ?></th>
                                                <th width="200px"><?php echo e(__('Action')); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $PixelFields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Pixel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td class="text-capitalize"><?php echo e($Pixel->platform); ?></td>
                                                    <td><?php echo e($Pixel->pixel_id); ?></td>
                                                    <td class="Action">
                                                        <?php echo Form::open([
                                                            'method' => 'DELETE',
                                                            'route' => ['pixel.destroy', $Pixel->id],
                                                            'id' => 'delete-form-' . $Pixel->id,
                                                        ]); ?>

                                                        <a class="btn btn-sm btn-icon  bg-light-secondary show_confirm"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="<?php echo e(__('Delete')); ?>">
                                                            <i class="ti ti-trash f-20"></i>
                                                        </a>
                                                        <?php echo Form::close(); ?>

                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pwa_settings" role="tabpanel"
                        aria-labelledby="pills-pwa_setting-tab">
                        <?php if($plan['pwa_store'] == 'on'): ?>
                            <?php echo e(Form::model($store_settings, ['route' => ['setting.pwa', $store_settings['id']], 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                            <div class="card">
                                <div class="card-header">
                                    <div class="row ">
                                        <div class="col-6">
                                            <h5><?php echo e(__('PWA Settings')); ?></h5>
                                        </div>
                                        <div class="col-6 d-flex justify-content-end">
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" name="pwa_store" id="pwa_store"
                                                    class="enable_pwa_store" data-toggle="switchbutton"
                                                    <?php echo e($store_settings['enable_pwa_store'] == 'on' ? 'checked=checked' : ''); ?>

                                                    data-onstyle="primary">
                                                <label class="form-check-labe" for="twilio_module"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group col-md-4 ">
                                        <label class="form-check-label" for="is_checkout_login_required"></label>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6 pwa_is_enable">
                                            <?php echo e(Form::label('pwa_app_title', __('App Title'), ['class' => 'form-label'])); ?>

                                            <?php echo e(Form::text('pwa_app_title', !empty($pwa_data->name) ? $pwa_data->name : '', ['class' => 'form-control', 'placeholder' => __('App Title')])); ?>

                                        </div>

                                        <div class="form-group col-md-6 pwa_is_enable">
                                            <?php echo e(Form::label('pwa_app_name', __('App Name'), ['class' => 'form-label'])); ?>

                                            <?php echo e(Form::text('pwa_app_name', !empty($pwa_data->short_name) ? $pwa_data->short_name : '', ['class' => 'form-control', 'placeholder' => __('App Name')])); ?>

                                        </div>

                                        <div class="form-group col-md-6 pwa_is_enable">
                                            <?php echo e(Form::label('pwa_app_background_color', __('App Background Color'), ['class' => 'form-label'])); ?>

                                            
                                            <?php echo e(Form::color('pwa_app_background_color', !empty($pwa_data->background_color) ? $pwa_data->background_color : '', ['class' => 'form-control color-picker', 'placeholder' => __('18761234567')])); ?>

                                        </div>

                                        <div class="form-group col-md-6 pwa_is_enable">
                                            <?php echo e(Form::label('pwa_app_theme_color', __('App Theme Color'), ['class' => 'form-label'])); ?>

                                            
                                            <?php echo e(Form::color('pwa_app_theme_color', !empty($pwa_data->theme_color) ? $pwa_data->theme_color : '', ['class' => 'form-control color-picker', 'placeholder' => __('18761234567')])); ?>

                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <button type="submit"
                                            class="btn btn-primary"><?php echo e(__('Save Changes')); ?></button>
                                    </div>
                                </div>
                            </div>
                            <?php echo e(Form::close()); ?>

                        <?php endif; ?>
                    </div>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Webhook')): ?>
                        <div class="tab-pane fade" id="webhook_settings" role="tabpanel"
                            aria-labelledby="webhook_settings-tab">
                            <div id="webhook_settings" class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-6">
                                            <h5><?php echo e(__('Webhook Settings')); ?></h5>
                                            <small><?php echo e(__('Edit your Webhook Settings')); ?></small>
                                        </div>
                                        <div class="col-6 d-flex justify-content-end">
                                            <a href="#" class="btn btn-sm btn-icon  btn-primary me-2"
                                                ddata-bs-toggle="tooltip" data-bs-placement="top"
                                                title="<?php echo e(__('Create')); ?>" data-size="md" data-ajax-popup="true"
                                                data-title="<?php echo e(__('Create New Webhook')); ?>"
                                                data-url="<?php echo e(route('webhook.create')); ?>">
                                                <i data-feather="plus"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table mb-0 pc-dt-simple" id="pc-dt-simple">
                                            <thead>
                                                <tr>
                                                    <th><?php echo e(__('Module')); ?></th>
                                                    <th><?php echo e(__('Method')); ?></th>
                                                    <th><?php echo e(__('Url')); ?></th>
                                                    <th width="200px"> <?php echo e(__('Action')); ?></th>
                                                </tr>
                                            </thead>
                                            <?php
                                                $store = \Auth::user()->current_store;
                                                $webhooks = App\Models\Webhook::where('store_id', $store)->get();
                                            ?>
                                            <tbody>
                                                <?php $__currentLoopData = $webhooks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $webhook): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><?php echo e($webhook->module); ?></td>
                                                        <td><?php echo e($webhook->method); ?></td>
                                                        <td><?php echo e($webhook->url); ?></td>
                                                        <td>
                                                            <div class="d-flex">
                                                                <a href="#"
                                                                    class="btn btn-sm btn-icon bg-light-secondary me-2"
                                                                    data-url="<?php echo e(route('webhook.edit', $webhook)); ?>"
                                                                    data-ajax-popup="true" data-size="md"
                                                                    data-title="<?php echo e(__('Edit')); ?>"
                                                                    data-toggle="tooltip"
                                                                    data-original-title="<?php echo e(__('Edit')); ?>">
                                                                    <i class="ti ti-edit f-20"></i>
                                                                </a>
                                                                <?php echo Form::open([
                                                                    'method' => 'DELETE',
                                                                    'route' => ['webhook.destroy', $webhook->id],
                                                                    'id' => 'delete-form-' . $webhook->id,
                                                                ]); ?>

                                                                <a class=" show_confirm btn btn-sm btn-icon bg-light-secondary me-2"
                                                                    href="#" data-bs-toggle="tooltip"
                                                                    data-bs-placement="top" title="<?php echo e(__('Delete')); ?>">
                                                                    <i class="ti ti-trash f-20"></i>
                                                                </a>
                                                                <?php echo Form::close(); ?>

                                                        </td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <div class="tab-pane fade" id="whatsapp_settings" role="tabpanel"
                        aria-labelledby="whatsapp_settings-tab">
                        <div id="whatsapp_settings" class="card">
                            <form method="POST"
                                action="<?php echo e(route('owner.whatsapp.setting', $store_settings->slug)); ?>"
                                accept-charset="UTF-8">
                                <?php echo csrf_field(); ?>
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-6">
                                            <h5><?php echo e(__('Whatsapp Settings')); ?></h5>
                                            <small><?php echo e(__('Note : WhatsApp live support settings for customers')); ?></small>
                                        </div>
                                        <div class="col-6 d-flex justify-content-end">
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" name="is_whatsapp_enabled" id="whatsapp_module"
                                                    class="whatsapp_enabled" data-toggle="switchbutton"
                                                    <?php echo e($store_settings['is_whatsapp_enabled'] == 'on' ? 'checked=checked' : ''); ?>

                                                    data-onstyle="primary">
                                                <label class="form-check-labe" for="whatsapp_module"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="row whatsapp">
                                        <div class="col-12 form-group">
                                            <label for="whatsapp_contact_number"
                                                class="col-form-label"><?php echo e(__('Contact Number')); ?></label>
                                            <input class="form-control" name="whatsapp_contact_number" type="text"
                                                value="<?php echo e($store_settings->whatsapp_contact_number); ?>"
                                                id="whatsapp_contact_number">
                                        </div>
                                    </div>
                                    <div class="col-lg-12  d-flex justify-content-end">
                                        <input type="submit" value="<?php echo e(__('Save Changes')); ?>"
                                            class="btn btn-xs btn-primary">
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>

                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- [ Main Content ] end -->
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
    <script src="<?php echo e(asset('custom/libs/jquery-mask-plugin/dist/jquery.mask.min.js')); ?>"></script>
    <script>
        function myFunction() {
            var copyText = document.getElementById("myInput");
            copyText.select();
            copyText.setSelectionRange(0, 99999)
            document.execCommand("copy");
            show_toastr('Success', "<?php echo e(__('Link copied')); ?>", 'success');
        }

        $(document).on('click', 'input[name="theme_color"]', function() {
            var eleParent = $(this).attr('data-theme');
            $('#themefile').val(eleParent);
            var imgpath = $(this).attr('data-imgpath');
            $('.' + eleParent + '_img').attr('src', imgpath);
        });

        $(document).ready(function() {
            setTimeout(function(e) {
                var checked = $("input[type=radio][name='theme_color']:checked");
                $('#themefile').val(checked.attr('data-theme'));
                $('.' + checked.attr('data-theme') + '_img').attr('src', checked.attr('data-imgpath'));
            }, 300);

            // pwa Enable/Disable js

            if ($('.enable_pwa_store').is(':checked')) {

                $('.pwa_is_enable').removeClass('disabledCookie');
            } else {

                $('.pwa_is_enable').addClass('disabledCookie');
            }

            $('#pwa_store').on('change', function() {
                if ($('.enable_pwa_store').is(':checked')) {

                    $('.pwa_is_enable').removeClass('disabledCookie');
                } else {

                    $('.pwa_is_enable').addClass('disabledCookie');
                }
            });

            // Twilio Enable/Disable js

            if ($('.twilio_enabled').is(':checked')) {

                $('.twilio').removeClass('disabledCookie');
            } else {

                $('.twilio').addClass('disabledCookie');
            }

            $('.twilio_enabled').on('change', function() {
                if ($('.twilio_enabled').is(':checked')) {

                    $('.twilio').removeClass('disabledCookie');
                } else {

                    $('.twilio').addClass('disabledCookie');
                }
            });

            // Whatsapp Enable/Disable js

            if ($('.whatsapp_enabled').is(':checked')) {

                $('.whatsapp').removeClass('disabledCookie');
            } else {

                $('.whatsapp').addClass('disabledCookie');
            }

            $('.whatsapp_enabled').on('change', function() {
                if ($('.whatsapp_enabled').is(':checked')) {

                    $('.whatsapp').removeClass('disabledCookie');
                } else {

                    $('.whatsapp').addClass('disabledCookie');
                }
            });

            // Recaptcha Enable/Disable js

            if ($('.recaptcha_module').is(':checked')) {

                $('.recaptcha').removeClass('disabledCookie');
            } else {

                $('.recaptcha').addClass('disabledCookie');
            }

            $('.recaptcha_module').on('change', function() {
                if ($('.recaptcha_module').is(':checked')) {

                    $('.recaptcha').removeClass('disabledCookie');
                } else {

                    $('.recaptcha').addClass('disabledCookie');
                }
            });

        });

        $(".color1").click(function() {
            var dataId = $(this).attr("data-id");
            $('#' + dataId).trigger('click');
            var first_check = $('#' + dataId).find('.color-0').trigger("click");
        });
    </script>

    <script>
        var custdarklayout = document.querySelector("#cust-darklayout");
        custdarklayout.addEventListener("click", function() {
            if (custdarklayout.checked) {
                document.querySelector(".m-header > .b-brand > img").setAttribute("src",
                    "<?php echo e($logo . '/' . $logo_light); ?>");
                document.querySelector("#main-style-link").setAttribute("href",
                    "<?php echo e(asset('assets/css/style-dark.css')); ?>");
                $('.navbar-footer').removeClass("bg-white");
                $('.navbar-footer').addClass("bg-dark");
            } else {
                document.querySelector(".m-header > .b-brand > img").setAttribute("src",
                    "<?php echo e($logo . '/' . $logo_dark); ?>");
                document.querySelector("#main-style-link").setAttribute("href",
                    "<?php echo e(asset('assets/css/style.css')); ?>");
                $('.navbar-footer').removeClass("bg-dark");
                $('.navbar-footer').addClass("bg-white");

            }
        });

        function removeClassByPrefix(node, prefix) {
            for (let i = 0; i < node.classList.length; i++) {
                let value = node.classList[i];
                if (value.startsWith(prefix)) {
                    node.classList.remove(value);
                }
            }
        }
    </script>

    <script>
        $(document).ready(function() {
            var $dragAndDrop = $("body .custom-fields tbody").sortable({
                handle: '.sort-handler'
            });

            var $repeater = $('.custom-fields').repeater({
                initEmpty: true,
                defaultValues: {},
                show: function() {
                    $(this).slideDown();
                    var eleId = $(this).find('input[type=hidden]').val();

                    if (eleId > 6 || eleId == '') {
                        $(this).find(".field_type option[value='file']").remove();
                        $(this).find(".field_type option[value='select']").remove();
                    }
                },
                hide: function(deleteElement) {
                    if (confirm('<?php echo e(__('Are you sure ?')); ?>')) {
                        $(this).slideUp(deleteElement);
                    }
                },
                ready: function(setIndexes) {
                    $dragAndDrop.on('drop', setIndexes);
                },
                isFirstItemUndeletable: true
            });

            var value = $(".custom-fields").attr('data-value');
            if (typeof value != 'undefined' && value.length != 0) {
                value = JSON.parse(value);
                $repeater.setList(value);
            }

            $.each($('[data-repeater-item]'), function(index, val) {
                var elementId = $(this).find('.custom_id').val();
                if (elementId <= 6) {
                    $.each($(this).find('.field_type'), function(index, val) {
                        $(this).prop('disabled', 'disabled');
                    });
                    $(this).find('.delete-icon').remove();
                }
            });
        });
        $(document).ready(function() {
            $('.item :selected').each(function() {
                var id = $(this).val();
                if (id != '') {
                    $(".item option[value=" + id + "]").addClass("d-none");
                }
            });
        });
        $(document).on('click', '[data-repeater-create]', function() {
            $('.item :selected').each(function() {
                var id = $(this).val();
                if (id != '') {
                    $(".item option[value=" + id + "]").addClass("d-none");
                }
            });
        })
    </script>
    <script type="text/javascript">
        function enablecookie() {
            const element = $('#enable_cookie').is(':checked');
            $('.cookieDiv').addClass('disabledCookie');
            if (element == true) {
                $('.cookieDiv').removeClass('disabledCookie');
                $("#cookie_logging").attr('checked', true);
            } else {
                $('.cookieDiv').addClass('disabledCookie');
                $("#cookie_logging").attr('checked', false);
            }
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\posserverterbaru\resources\views/settings/index.blade.php ENDPATH**/ ?>