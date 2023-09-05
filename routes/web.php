<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\StoreAnalytic;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaytrController;
use App\Http\Controllers\SspayController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\PaytabController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\IyziPayController;
use App\Http\Controllers\PayfastController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\WebhookController;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Http\Controllers\AamarpayController;
use App\Http\Controllers\CashfreeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\ShippingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ToyyibpayController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\AiTemplateController;
use App\Http\Controllers\BahanDasarController;
use App\Http\Controllers\PageOptionController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProductTaxController;
use App\Http\Controllers\IngredientsController;
use App\Http\Controllers\PlanRequestController;
use App\Http\Controllers\RecordBahanController;
use App\Http\Controllers\BanktransferController;
use App\Http\Controllers\EmailTemplateController;
use App\Http\Controllers\KategoriBahanController;
use App\Http\Controllers\ProductCouponController;
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\BenefitPaymentController;
use App\Http\Controllers\ProsesProduksiController;
use App\Http\Controllers\WarehouseStockController;
use App\Http\Controllers\ExpresscheckoutController;
use App\Http\Controllers\WarehouseRecordController;
use App\Http\Controllers\ProductCategorieController;
use App\Http\Controllers\PaymentWallPaymentController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\LandingPageSectionsController;
use App\Http\Controllers\BahanTambahanProduksiController;
use App\Http\Controllers\KategoriProsesProduksiController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Customer\Auth\CustomerLoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

require __DIR__ . '/auth.php';


Route::get('/login/{lang?}', [AuthenticatedSessionController::class, 'showLoginForm'])->name('login');
Route::get('/register/{lang?}', [RegisteredUserController::class, 'showRegistrationForm'])->name('register');
Route::get('/password/resets/{lang?}', [AuthenticatedSessionController::class, 'showLinkRequestForm'])->name('change.langPass');

Route::get('/', [DashboardController::class, 'index'])->middleware('XSS')->name('dashboard');
Route::post('store-product', [StoreController::class, 'filterproductview'])->name('filter.product.view');
Route::get('get-products-variant-quantity', [ProductController::class, 'getProductsVariantQuantity'])->name('get.products.variant.quantity');

Route::group(['middleware' => ['verified']], function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'XSS'])->name('dashboard');

    Route::middleware(['auth'])->group(function () {

        Route::resource('stores', StoreController::class);
        Route::post('store-setting/{id}', [StoreController::class, 'savestoresetting'])->name('settings.store');
    });

    Route::middleware(['auth', 'XSS'])->group(function () {
        Route::get('change-language/{lang}', [LanguageController::class, 'changeLanquage'])->name('change.language')->middleware(['auth', 'XSS']);
        Route::get('manage-language/{languages}', [LanguageController::class, 'manageLanguage'])->name('manage.language')->middleware(['auth', 'XSS']);
        Route::post('store-language-data/{lang}', [LanguageController::class, 'storeLanguageData'])->name('store.language.data')->middleware(['auth', 'XSS']);
        Route::post('disable-language', [LanguageController::class, 'disableLang'])->name('disablelanguage')->middleware(['auth', 'XSS']);
        Route::get('create-language', [LanguageController::class, 'createLanguage'])->name('create.language')->middleware(['auth', 'XSS']);
        Route::post('store-language', [LanguageController::class, 'storeLanguage'])->name('store.language')->middleware(['auth', 'XSS']);
        Route::delete('/lang/{lang}', [LanguageController::class, 'destroyLang'])->name('lang.destroy')->middleware(['auth', 'XSS']);
    });

    Route::middleware(['auth', 'XSS'])->group(function () {
        Route::get('store-grid/grid', [StoreController::class, 'grid'])->name('store.grid');
        Route::get('store-customDomain/customDomain', [StoreController::class, 'customDomain'])->name('store.customDomain');
        Route::get('store-subDomain/subDomain', [StoreController::class, 'subDomain'])->name('store.subDomain');
        Route::get('store-plan/{id}/plan', [StoreController::class, 'upgradePlan'])->name('plan.upgrade');
        Route::get('store-plan-active/{id}/plan/{pid}', [StoreController::class, 'activePlan'])->name('plan.active');
        Route::DELETE('store-delete/{id}', [StoreController::class, 'storedestroy'])->name('user.destroy');
        Route::DELETE('ownerstore-delete/{id}', [StoreController::class, 'ownerstoredestroy'])->name('ownerstore.destroy');
        Route::get('store-edit/{id}', [StoreController::class, 'storedit'])->name('user.edit');
        Route::Put('store-update/{id}', [StoreController::class, 'storeupdate'])->name('user.update');
    });

    Route::get('plan_request', [PlanRequestController::class, 'index'])->name('plan_request.index')->middleware(['auth', 'XSS']);
    Route::get('request_frequency/{id}', [PlanRequestController::class, 'requestView'])->name('request.view')->middleware(['auth', 'XSS']);
    Route::get('request_send/{id}', [PlanRequestController::class, 'userRequest'])->name('send.request')->middleware(['auth', 'XSS']);
    Route::get('request_response/{id}/{response}', [PlanRequestController::class, 'acceptRequest'])->name('response.request')->middleware(['auth', 'XSS']);
    Route::get('request_cancel/{id}', [PlanRequestController::class, 'cancelRequest'])->name('request.cancel')->middleware(['auth', 'XSS']);

    Route::post('/plan-pay-with-banktransfer', [BanktransferController::class, 'planPayWithBanktransfer'])->name('plan.pay.with.banktransfer')->middleware(['auth', 'XSS']);
    Route::get('bank_transfer_show/{id}', [BanktransferController::class, 'bank_transfer_show'])->name('bank_transfer.show');
    Route::post('status_edit/{id}', [BanktransferController::class, 'StatusEdit'])->name('status.edit');


    Route::get('/store-change/{id}', [StoreController::class, 'changeCurrantStore'])->name('change_store')->middleware(['auth', 'XSS']);

    Route::get('/change/mode', [DashboardController::class, 'changeMode'])->name('change.mode');
    Route::get('profile', [DashboardController::class, 'profile'])->name('profile')->middleware(['auth', 'XSS']);


    Route::put('change-password', [DashboardController::class, 'updatePassword'])->name('update.password');
    Route::put('edit-profile', [DashboardController::class, 'editprofile'])->name('update.account')->middleware(['auth', 'XSS']);
    Route::get('storeanalytic', [StoreAnalytic::class, 'index'])->name('storeanalytic')->middleware(['auth', 'XSS']);


    Route::middleware(['auth', 'XSS'])->group(function () {
        Route::post('business-setting', [SettingController::class, 'saveBusinessSettings'])->name('business.setting');
        Route::post('company-setting', [SettingController::class, 'saveCompanySettings'])->name('company.setting');
        Route::post('email-setting', [SettingController::class, 'saveEmailSettings'])->name('email.setting');
        Route::post('system-setting', [SettingController::class, 'saveSystemSettings'])->name('system.setting');
        Route::post('pusher-setting', [SettingController::class, 'savePusherSettings'])->name('pusher.setting');


        Route::post('test-mail', [SettingController::class, 'testMail'])->name('test.mail')->middleware(['auth', 'XSS']);
        Route::get('test-mail', [SettingController::class, 'testMail'])->name('test.mail')->middleware(['auth', 'XSS']);
        Route::post('test-mail/send', [SettingController::class, 'testSendMail'])->name('test.send.mail')->middleware(['auth', 'XSS']);

        Route::get('settings', [SettingController::class, 'index'])->name('settings');
    });
    Route::post('payment-setting', [SettingController::class, 'savePaymentSettings'])->name('payment.setting')->middleware(['auth']);


    Route::middleware(['auth', 'XSS'])->group(function () {

        Route::resource('product_categorie', ProductCategorieController::class);
    });


    Route::get('/config-cache', function () {
        Artisan::call('cache:clear');
        Artisan::call('route:clear');
        Artisan::call('view:clear');
        Artisan::call('optimize:clear');
        return redirect()->back()->with('success', 'Clear Cache successfully.');
    });

    Route::post('cookie-setting', [SettingController::class, 'saveCookieSettings'])->name('cookie.setting');
    Route::any('/cookie-consent', [SettingController::class, 'CookieConsent'])->name('cookie-consent');

    Route::middleware(['auth', 'XSS'])->group(function () {

        Route::resource('product_tax', ProductTaxController::class);
    });

    Route::middleware(['auth', 'XSS'])->group(function () {

        Route::resource('shipping', ShippingController::class);
    });

    Route::resource('location', LocationController::class)->middleware('auth', 'XSS');
    // Route::resource('page_options', PageOptionController::class)->middleware('auth', 'XSS');
    // Route::resource('blog', BlogController::class)->middleware('auth', 'XSS');

    // Route::get('blog-social', [BlogController::class, 'socialBlog'])->middleware('XSS', 'auth')->name('blog.social');
    // Route::post('store-social-blog', [BlogController::class, 'storeSocialblog'])->middleware('XSS', 'auth')->name('store.socialblog');

    Route::resource('webhook', WebhookController::class)->middleware(['auth', 'XSS',]);

    Route::get('/plans', [PlanController::class, 'index'])->middleware('XSS', 'auth')->name('plans.index');

    Route::get('/plans/create', [PlanController::class, 'create'])->middleware('XSS', 'auth')->name('plans.create');

    Route::post('/plans', [PlanController::class, 'store'])->middleware('XSS', 'auth')->name('plans.store');


    Route::get('/plans/edit/{id}', [PlanController::class, 'edit'])->middleware('XSS', 'auth')->name('plans.edit');

    Route::put('/plans/{id}', [PlanController::class, 'update'])->middleware('XSS', 'auth')->name('plans.update');

    Route::post('/user-plans/', [PlanController::class, 'userPlan'])->middleware('XSS', 'auth')->name('update.user.plan');

    Route::get('themes', [themeController::class, 'index'])->name('themes.theme')->middleware(['auth', 'XSS']);

    Route::post('pwa-settings/{id}', [StoreController::class, 'pwasetting'])->name('setting.pwa')->middleware(['auth', 'XSS']);

    Route::resource('orders', OrderController::class)->middleware(['auth', 'XSS']);

    Route::get('order-receipt/{id}', [OrderController::class, 'receipt'])->middleware('XSS', 'auth')->name('order.receipt');
    Route::delete('oreder/product/{id}/{variant_id?}/{order_id}/{key}', [OrderController::class, 'delete_order_item'])->name('delete.order_item');
    Route::delete('oreder/{order_id}', [OrderController::class, 'delete_plan_order'])->name('delete.plan_order');

    Route::middleware(['auth', 'XSS'])->group(function () {

        Route::get('/product-variants/create', [ProductController::class, 'productVariantsCreate'])->name('product.variants.create');
        Route::get('/product-variants/edit/{product_id}', [ProductController::class, 'productVariantsEdit'])->name('product.variants.edit');
        Route::post('/product-variants-possibilities/{product_id}', [ProductController::class, 'getProductVariantsPossibilities'])->name('product.variants.possibilities');
        Route::get('/get-product-variants-possibilities', [ProductController::class, 'getProductVariantsPossibilities'])->name('get.product.variants.possibilities');
        Route::get('product/grid', [ProductController::class, 'grid'])->name('product.grid');
        Route::delete('product/{id}/delete', [ProductController::class, 'fileDelete'])->name('products.file.delete');
        Route::delete('product/variant/{id}/{product_id}', [ProductController::class, 'VariantDelete'])->name('products.variant.delete');
    });



    Route::resource('product', ProductController::class)->middleware(['auth', 'XSS']);
    Route::post('product/{id}/update', [ProductController::class, 'productUpdate'])->middleware('auth')->name('products.update');
    Route::get('/store-resource/edit/display/{id}', [StoreController::class, 'storeenable'])->middleware('XSS', 'auth')->name('store-resource.edit.display');
    Route::put('/store-resource/display/{id}', [StoreController::class, 'storeenableupdate'])->middleware('XSS', 'auth')->name('store-resource.display');

    Route::middleware(['auth', 'XSS'])->group(function () {

        Route::resource('store-resource', StoreController::class);
    });


    Route::middleware(['XSS'])->group(function () {

        Route::get('order', [StripePaymentController::class, 'index'])->name('order.index');
        Route::get('/stripe/{code}', [StripePaymentController::class, 'stripe'])->name('stripe');
        Route::post('stripe-payment', [StripePaymentController::class, 'addpayment'])->name('stripe.payment');
    });

    Route::get('/apply-coupon', [CouponController::class, 'applyCoupon'])->middleware('XSS', 'auth')->name('apply.coupon');

    Route::resource('coupons', CouponController::class)->middleware(['auth', 'XSS']);

    Route::post('prepare-payment', [PlanController::class, 'preparePayment'])->middleware('XSS', 'auth')->name('prepare.payment');


    Route::post('/payment/{code}', [PlanController::class, 'payment'])->middleware('XSS', 'auth')->name('payment');

    Route::post('plan-pay-with-paypal', [PaypalController::class, 'planPayWithPaypal'])->middleware('XSS', 'auth')->name('plan.pay.with.paypal');



    Route::get('{id}/{amount}/get-store-payment-status', [PaypalController::class, 'storeGetPaymentStatus'])->middleware('XSS', 'auth')->name('get.store.payment.status');
    Route::post('toyyibpay-prepare-plan', [ToyyibpayController::class, 'toyyibpayPaymentPrepare'])->middleware(['auth'])->name('toyyibpay.prepare.plan');
    Route::get('toyyibpay-payment-plan/{plan_id}/{amount}/{couponCode}', [ToyyibpayController::class, 'toyyibpayPlanGetPayment'])->middleware(['auth'])->name('plan.toyyibpay.callback');

    Route::get(
        'qr-code',
        function () {
            return QrCode::generate();
        }
    );

    Route::resource('product-coupon', ProductCouponController::class)->middleware(['auth', 'XSS']);



    // Plan Purchase Payments methods

    Route::get('plan/prepare-amount', [PlanController::class, 'planPrepareAmount'])->name('plan.prepare.amount');

    // paystack
    Route::get('paystack-plan/{code}/{plan_id}', [PaymentController::class, 'paystackPlanGetPayment'])->middleware('auth')->name('paystack.plan.callback');

    // flutterwave
    Route::get('flutterwave-plan/{code}/{plan_id}', [PaymentController::class, 'flutterwavePlanGetPayment'])->middleware('auth')->name('flutterwave.plan.callback');

    // razorepay
    Route::get('razorpay-plan/{code}/{plan_id}', [PaymentController::class, 'razorpayPlanGetPayment'])->middleware('auth')->name('razorpay.plan.callback');

    //mercado-pago
    Route::post('mercadopago-prepare-plan', [PaymentController::class, 'mercadopagoPaymentPrepare'])->middleware('auth')->name('mercadopago.prepare.plan');
    Route::any('plan-mercado-callback/{plan_id}', [PaymentController::class, 'mercadopagoPaymentCallback'])->middleware('auth')->name('plan.mercado.callback');

    //paytm
    Route::post('paytm-prepare-plan', [PaymentController::class, 'paytmPaymentPrepare'])->middleware('auth')->name('paytm.prepare.plan');
    Route::post('paytm-payment-plan', [PaymentController::class, 'paytmPlanGetPayment'])->middleware('auth')->name('plan.paytm.callback');

    //mollie
    Route::post('mollie-prepare-plan', [PaymentController::class, 'molliePaymentPrepare'])->middleware('auth')->name('mollie.prepare.plan');

    //coingate
    Route::post('coingate-prepare-plan', [PaymentController::class, 'coingatePaymentPrepare'])->middleware('auth')->name('coingate.prepare.plan');
    Route::get('coingate-payment-plan', [PaymentController::class, 'coingatePlanGetPayment'])->middleware('auth')->name('coingate.mollie.callback');

    //skrill
    Route::post('skrill-prepare-plan', [PaymentController::class, 'skrillPaymentPrepare'])->middleware('auth')->name('skrill.prepare.plan');
    Route::get('skrill-payment-plan', [PaymentController::class, 'skrillPlanGetPayment'])->middleware('auth')->name('plan.skrill.callback');

    //payfast
    Route::post('payfast-plan', [PayfastController::class, 'index'])->name('payfast.payment')->middleware(['auth']);
    Route::post('payfast-plan-zero', [PayfastController::class, 'payment'])->name('payfast_zero.payment')->middleware(['auth', 'XSS']);
    Route::get('payfast-plan/{success}', [PayfastController::class, 'success'])->name('payfast.payment.success')->middleware(['auth']);

    // Route::get('/landingpage', [LandingPageSectionsController::class, 'index'])->middleware('auth', 'XSS')->name('custom_landing_page.index');
    // Route::get('/LandingPage/show/{id}', [LandingPageSectionsController::class, 'show']);
    // Route::post('/LandingPage/setConetent', [LandingPageSectionsController::class, 'setConetent'])->middleware('auth', 'XSS');

    //Iyzipay Route
    Route::post('iyzipay/prepare', [IyziPayController::class, 'initiatePayment'])->name('iyzipay.payment.init');
    Route::post('iyzipay/callback/plan/{id}/{amount}/{coupan_code?}', [IyzipayController::class, 'iyzipayCallback'])->name('iyzipay.payment.callback');

    //sspay route
    Route::post('sspay-prepare-plan', [SspayController::class, 'SspayPaymentPrepare'])->middleware(['auth'])->name('sspay.prepare.plan');
    Route::get('sspay-payment-plan/{plan_id}/{amount}/{couponCode}', [SspayController::class, 'SspayPlanGetPayment'])->middleware(['auth'])->name('plan.sspay.callback');


    //paytab
    Route::post('plan-pay-with-paytab', [PaytabController::class, 'planPayWithpaytab'])->middleware(['auth'])->name('plan.pay.with.paytab');
    Route::any('plan-paytab-success/', [PaytabController::class, 'PaytabGetPayment'])->middleware(['auth'])->name('plan.paytab.success');

    // Benefit
    Route::any('/payment/initiate/{plan_id}', [BenefitPaymentController::class, 'initiatePayment'])->name('benefit.initiate');
    Route::any('call_back', [BenefitPaymentController::class, 'call_back'])->name('benefit.call_back');

    // Cashfree
    Route::post('cashfree/payments/store', [CashfreeController::class, 'cashfreePaymentStore'])->name('cashfree.payment');
    Route::any('cashfree/payments/success', [CashfreeController::class, 'cashfreePaymentSuccess'])->name('cashfreePayment.success');

    // Aamar Pay
    Route::post('/aamarpay/payment', [AamarpayController::class, 'pay'])->name('pay.aamarpay.payment');
    Route::any('/aamarpay/success/{data}', [AamarpayController::class, 'aamarpaysuccess'])->name('pay.aamarpay.success');

    // PayTR
    Route::post('/paytr/payment/{plan_id}', [PaytrController::class, 'PlanpayWithPaytr'])->name('pay.paytr.payment');
    Route::get('/paytr/sussess/', [PaytrController::class, 'paytrsuccess'])->name('pay.paytr.success');

    Route::get(
        '/get_landing_page_section/{name}',
        function ($name) {
            $plans = DB::table('plans')->get();
            return view('custom_landing_page.' . $name, compact('plans'));
        }
    );

    // Route::post('/LandingPage/removeSection/{id}', [LandingPageSectionsController::class, 'removeSection'])->middleware('auth', 'XSS');

    // Route::post('/LandingPage/setOrder', [LandingPageSectionsController::class, 'setOrder'])->middleware('auth', 'XSS');

    // Route::post('/LandingPage/copySection', [LandingPageSectionsController::class, 'copySection'])->middleware('auth', 'XSS');


    Route::get('email_template_lang/{lang?}', [EmailTemplateController::class, 'emailTemplate'])->name('email_template')->middleware('auth', 'XSS');
    Route::get('email_template_lang/{id}/{lang?}', [EmailTemplateController::class, 'manageEmailLang'])->name('manage.email.language')->middleware('auth', 'XSS');
    Route::put('email_template_lang/{id}/', [EmailTemplateController::class, 'updateEmailSettings'])->name('updateEmail.settings')->middleware('auth');
    Route::put('email_template_store/{pid}', [EmailTemplateController::class, 'storeEmailLang'])->name('store.email.language')->middleware('auth', 'XSS');
    Route::put('email_template_status/{id}', [EmailTemplateController::class, 'updateStatus'])->name('status.email.language')->middleware('auth', 'XSS');
    Route::put('email_template_status/{id}', [EmailTemplateController::class, 'updateStatus'])->name('email_template.update')->middleware('auth', 'XSS');

    Route::get('{id}/export/product', [ProductController::class, 'export'])->name('product.export');
    Route::get('{id}/export/order', [OrderController::class, 'export'])->name('order.export');
    Route::get('export/shipping', [ShippingController::class, 'export'])->name('shipping.export');
    Route::get('export/category', [ProductCategorieController::class, 'export'])->name('category.export');
    Route::get('export/tax', [ProductTaxController::class, 'export'])->name('tax.export');
    Route::get('export/customer', [StoreController::class, 'exports'])->name('customer.exports');
    Route::get('export/store', [StoreController::class, 'export'])->name('store.export');
    Route::get('export/coupons', [CouponController::class, 'export'])->name('coupons.export');
    Route::get('export/plan_requests', [PlanRequestController::class, 'export'])->name('planrequests.export');

    Route::get('import/coupon/file', [ProductCouponController::class, 'importFile'])->name('coupon.file.import');
    Route::post('import/coupon', [ProductCouponController::class, 'import'])->name('coupon.import');
    Route::get('export/coupon', [ProductCouponController::class, 'export'])->name('coupon.export');

    ////////////////////

    Route::get('product/import/export', [ProductController::class, 'fileImportExport'])->name('product.file.import');
    Route::post('product/import', [ProductController::class, 'fileImport'])->name('product.import');

    /*==================================Recaptcha====================================================*/
    Route::post('/recaptcha-settings', [SettingController::class, 'recaptchaSettingStore'])->name('recaptcha.settings.store')->middleware('auth', 'XSS');

    /*==============================================================================================================================*/

    Route::any('user-reset-password/{id}', [StoreController::class, 'userPassword'])->name('user.reset');
    Route::post('user-reset-password/{id}', [StoreController::class, 'userPasswordReset'])->name('user.password.update');

    /*================================================================================================================================*/

    Route::post('paymentwall', [PaymentWallPaymentController::class, 'index'])->name('paymentwall');
    Route::post('plan-pay-with-paymentwall/{plan}', [PaymentWallPaymentController::class, 'planPayWithPaymentwall'])->name('plan.pay.with.paymentwall');
    Route::any('/plan/error/{flag}', [PaymentWallPaymentController::class, 'paymenterror'])->name('callback.error');

    /*========================================================================================================================*/

    Route::get('/customer', [StoreController::class, 'customerindex'])->name('customer.index')->middleware('XSS');
    Route::get('/customer/view/{id}', [StoreController::class, 'customershow'])->name('customer.show')->middleware('XSS');

    Route::post('storage-settings', [SettingController::class, 'storageSettingStore'])->name('storage.setting.store')->middleware('auth', 'XSS');
});

// Benefit
Route::any('{slug}/payment/initiate', [BenefitPaymentController::class, 'storeInitiatePayment'])->name('store.benefit.initiate');
Route::any('/store/call_back', [BenefitPaymentController::class, 'storeCall_back'])->name('store.benefit.call_back');

Route::get('/apply-productcoupon', [ProductCouponController::class, 'applyProductCoupon'])->name('apply.productcoupon');

Route::post('owner-payment-setting/{slug?}', [SettingController::class, 'saveOwnerPaymentSettings'])->name('owner.payment.setting')->middleware('auth', 'XSS');
Route::post('owner-email-setting/{slug?}', [SettingController::class, 'saveOwneremailSettings'])->name('owner.email.setting')->middleware('auth', 'XSS');
Route::post('owner-twilio-setting/{slug?}', [SettingController::class, 'saveOwnertwilioSettings'])->name('owner.twilio.setting')->middleware('auth', 'XSS');
Route::post('owner-whatsapp-setting/{slug?}', [SettingController::class, 'saveOwnerWhatsappSettings'])->name('owner.whatsapp.setting')->middleware('auth', 'XSS');

Route::middleware(['auth', 'XSS'])->group(function () {
    Route::get('pixels', [SettingController::class, 'index'])->name('pixel.index');
    Route::get('pixel/create', [SettingController::class, 'pixel_create'])->name('pixel.create');
    Route::post('pixel', [SettingController::class, 'pixel_store'])->name('pixel.store');
    Route::delete('pixel-delete/{id}', [SettingController::class, 'pixeldestroy'])->name('pixel.destroy');
});

Route::get('store/remove-session/{slug}', [StoreController::class, 'removeSession'])->name('remove.session');

Route::get('store/{slug?}/{view?}', [StoreController::class, 'storeSlug'])->name('store.slug');
Route::get('store-variant/{slug?}/product/{id}', [StoreController::class, 'storeVariant'])->name('store-variant.variant');
Route::post('user-product_qty/{slug?}/product/{id}/{variant_id?}', [StoreController::class, 'productqty'])->name('user-product_qty.product_qty');
Route::post('user-location/{slug}/location/{id}', [StoreController::class, 'UserLocation'])->name('user.location');
Route::post('user-shipping/{slug}/shipping/{id}', [StoreController::class, 'UserShipping'])->name('user.shipping');
Route::delete('delete_cart_item/{slug?}/product/{id}/{variant_id?}', [StoreController::class, 'delete_cart_item'])->name('delete.cart_item');

Route::get('store/{slug?}/product/{id}', [StoreController::class, 'productView'])->name('store.product.product_view');
Route::get('store-complete/{slug?}/{id}', [StoreController::class, 'complete'])->name('store-complete.complete');

Route::post('/stripe/{slug?}', [StripePaymentController::class, 'stripePost'])->name('stripe.post')->middleware('XSS');

Route::post('pay-with-paypal/{slug?}', [PaypalController::class, 'PayWithPaypal'])->middleware('XSS')->name('pay.with.paypal');

Route::get('{id}/get-payment-status{slug?}', [PaypalController::class, 'GetPaymentStatus'])->middleware('XSS')->name('get.payment.status');

Route::get('/{slug?}/order/{id}', [StoreController::class, 'userorder'])->name('user.order');

Route::post('{slug?}/whatsapp', [StoreController::class, 'whatsapp'])->name('user.whatsapp');
Route::post('{slug?}/telegram', [StoreController::class, 'telegram'])->name('user.telegram');

Route::get('change-language-store/{slug?}/{lang}', [LanguageController::class, 'changeLanquageStore'])->middleware('XSS')->name('change.languagestore');

Route::post('store/{slug?}', [StoreController::class, 'changeTheme'])->name('store.changetheme');

Route::get('mollie-payment-plan/{slug}/{plan_id}', [PaymentController::class, 'molliePlanGetPayment'])->middleware('auth')->name('plan.mollie.callback');

Route::post('/store/custom-msg/{slug}', [StoreController::class, 'customMassage'])->name('customMassage');
Route::post('store/get-massage/{slug}', [StoreController::class, 'getWhatsappUrl'])->name('get.whatsappurl');

Route::post('store/{slug}/downloadable_prodcut', [StoreController::class, 'downloadable_prodcut'])->name('user.downloadable_prodcut');

Route::get('{slug}/customer-login', [CustomerLoginController::class, 'showLoginForm'])->name('customer.loginform');
Route::post('{slug}/customer-login/{cart?}', [CustomerLoginController::class, 'login'])->name('customer.login')->middleware('XSS');

Route::get('{slug}/user-create', [StoreController::class, 'userCreate'])->name('store.usercreate');
Route::post('{slug}/user-create', [StoreController::class, 'userStore'])->name('store.userstore');

Route::get('{slug}/customer-home', [StoreController::class, 'customerHome'])->name('customer.home')->middleware('customerauth');

Route::get('{slug}/customer-profile/{id}', [CustomerLoginController::class, 'profile'])->name('customer.profile')->middleware('customerauth');
Route::put('{slug}/customer-profile/update/{id}', [CustomerLoginController::class, 'profileUpdate'])->name('customer.profile.update')->middleware('customerauth');
Route::put('{slug}/customer-profile-password/{id}', [CustomerLoginController::class, 'updatePassword'])->name('customer.profile.password')->middleware('customerauth');
Route::post('{slug}/customer-logout', [CustomerLoginController::class, 'logout'])->name('customer.logout');

// Route::get('store-payment/{slug?}/userpayment', [StoreController::class, 'userPayment'])->name('store-payment.payment');

Route::get('{id}/get-payment-status{slug?}', [PaypalController::class, 'GetPaymentStatus'])->name('get.payment.status')->middleware('XSS');

Route::post('{slug?}/cod', [StoreController::class, 'cod'])->name('user.cod');
Route::post('{slug?}/bank_transfer', [StoreController::class, 'bank_transfer'])->name('user.bank_transfer');

Route::get('paystack/{slug}/{code}/{order_id}', [PaymentController::class, 'paystackPayment'])->name('paystack');
Route::get('flutterwave/{slug}/{tran_id}/{order_id}', [PaymentController::class, 'flutterwavePayment'])->name('flutterwave');
Route::get('razorpay/{slug}/{pay_id}/{order_id}', [PaymentController::class, 'razerpayPayment'])->name('razorpay');
Route::post('{slug}/paytm/prepare-payments/', [PaymentController::class, 'paytmOrder'])->name('paytm.prepare.payments');
Route::post('paytm/callback/', [PaymentController::class, 'paytmCallback'])->name('paytm.callback');
Route::post('{slug}/mollie/prepare-payments/', [PaymentController::class, 'mollieOrder'])->name('mollie.prepare.payments');
Route::get('{slug}/{order_id}/mollie/callback/', [PaymentController::class, 'mollieCallback'])->name('mollie.callback');
Route::post('{slug}/mercadopago/prepare-payments/', [PaymentController::class, 'mercadopagoPayment'])->name('mercadopago.prepare');
Route::any('{slug}/mercadopago/callback/', [PaymentController::class, 'mercadopagoCallback'])->name('mercado.callback');
Route::get('{slug}/mercadopago/cancelled', [PaymentController::class, 'paymentCancelled'])->name('mercadopago.cancelled');

Route::post('{slug}/coingate/prepare-payments/', [PaymentController::class, 'coingatePayment'])->name('coingate.prepare');
Route::get('{slug}/coingate/cancelled', [PaymentController::class, 'paymentCancelled'])->name('coingate.cancelled');

Route::post('{slug}/skrill/prepare-payments/', [PaymentController::class, 'skrillPayment'])->name('skrill.prepare.payments');

Route::post('{slug}/paystack/store-slug/', [StoreController::class, 'storesession'])->name('paystack.session.store');

Route::post('{slug}/paymentwall/store-slug/', [StoreController::class, 'paymentwallstoresession'])->name('paymentwall.session.store');
Route::any('{slug}/paymentwall/order/', [PaymentWallPaymentController::class, 'orderindex'])->name('paymentwall.index');
Route::post('/{slug}/order-pay-with-paymentwall/', [PaymentWallPaymentController::class, 'orderPayWithPaymentwall'])->name('order.pay.with.paymentwall');
Route::any('{slug}/order/error/{flag}', [PaymentWallPaymentController::class, 'orderpaymenterror'])->name('order.callback.error');

Route::get('store/product/{order_id}/{customer_id}/{slug}', [StoreController::class, 'orderview'])->name('store.product.product_order_view');

Route::resource('product', ProductController::class)->middleware(['auth', 'XSS']);
Route::get('product/{id}/update', [ProductController::class, 'productUpdate'])->middleware('auth')->name('products.update');
Route::get('/store-resource/edit/display/{id}', [StoreController::class, 'storeenable'])->middleware('XSS', 'auth')->name('store-resource.edit.display');
Route::put('/store-resource/display/{id}', [StoreController::class, 'storeenableupdate'])->middleware('XSS', 'auth')->name('store-resource.display');

Route::get('store/{slug}/{product_id?}/{quantity?}/{variant_id?}', [StoreController::class, 'StoreCart'])->name('store.cart');
Route::any('add-to-cart/store/{slug?}/{product_id?}/{quantity?}/{variant_id?}', [StoreController::class, 'addToCart'])->name('user.addToCart');
// Route::any('add-to-cart/{slug?}/cart/{product_id?}/{quantity?}/{variant_id?}', [StoreController::class, 'addToCart'])->name('user.addToCart');
// Route::get('user-cart-item/{slug?}/cart/{product_id?}/{quantity?}/{variant_id?}', [StoreController::class, 'StoreCart'])->name('store.cart');
Route::get('/create-expresscheckout/{product_id?}', [ExpresscheckoutController::class, 'create'])->name('expresscheckout.create');
Route::post('/store-expresscheckout/{product_id?}', [ExpresscheckoutController::class, 'store'])->name('expresscheckout.store');
Route::get('/edit-expresscheckout/{product_id?}', [ExpresscheckoutController::class, 'edit'])->name('expresscheckout.edit');
Route::post('/update-expresscheckout/{product_id?}', [ExpresscheckoutController::class, 'update'])->name('expresscheckout.update');
Route::delete('/delete-expresscheckout/{product_id?}', [ExpresscheckoutController::class, 'destroy'])->name('expresscheckout.destroy');


Route::get('store-payment/userpayment/stripe', [StripePaymentController::class, 'getProductStatus'])->name('store.payment.stripe');

//    Payments Callbacks
Route::get('coingate/callback', [PaymentController::class, 'coingateCallback'])->name('coingate.callback');

Route::get('skrill/callback', [PaymentController::class, 'skrillCallback'])->name('skrill.callback');
// Route::get('{slug}/skrill/cancelled', [PaymentController::class, 'paymentCancelled'])->name('skrill.cancelled');
Route::get('{slug}/skrill/cancelled', [PaymentController::class, 'paymentCancelled'])->name('payment.cancelled');

// payfast
Route::post('{slug}/payfast', [PayfastController::class, 'Paywithpayfast'])->name('payfast');
// Route::get('payfast/{slug}/{success}', [PayfastController::class, 'payfastsuccess'])->name('payfast.success');
Route::get('payfast/{success}/{slug}', [PayfastController::class, 'payfastsuccess'])->name('payfast.success');

// toyyibpay
Route::post('{slug}/toyyibpay/prepare-payments/', [ToyyibpayController::class, 'toyyibpaypayment'])->name('toyyibpay.prepare.payments');
Route::get('toyyibpay/callback/{get_amount}/{slug?}', [ToyyibpayController::class, 'toyyibpaycallback'])->name('toyyibpay.callback');

// iyzipay
Route::post('iyzipay/prepare-payments/{slug}', [IyziPayController::class, 'iyzipaypayment'])->name('iyzipay.prepare.payment');
Route::post('iyzipay/callback/{slug}/{price}', [IyzipayController::class, 'iyzipaypaymentCallback'])->name('iyzipay.callback');

// sspay
Route::post('{slug}/sspay/prepare-payments/', [SspayController::class, 'Sspaypayment'])->name('sspay.prepare.payments');
Route::get('sspay/callback/{get_amount}/{slug?}', [SspayController::class, 'Sspaycallpack'])->name('sspay.callback');

// Paytab
Route::post('pay-with-paytab/{slug}', [PaytabController::class, 'PayWithpaytab'])->name('pay.with.paytab');
Route::any('paytab-success/store', [PaytabController::class, 'PaytabGetPaymentCallback'])->name('paytab.success');

// CashFree
Route::post('{slug}/cashfree/payments/store', [CashfreeController::class, 'payWithCashfree'])->name('store.cashfree.initiate');
Route::any('store/cashfree/payments/success/payment/success', [CashfreeController::class, 'storeCashfreePaymentSuccess'])->name('store.cashfreePayment.success');

// AamarPay
Route::post('{slug}/aamarpay/payment', [AamarpayController::class, 'payWithAamarpay'])->name('store.pay.aamarpay.payment');
Route::any('aamarpay/success/store/{data}', [AamarpayController::class, 'storeAamarpaysuccess'])->name('store.pay.aamarpay.success');

// PayTR
Route::post('{slug}/paytr/payment/', [PaytrController::class, 'PayWithPaytr'])->name('store.pay.paytr.payment');
Route::get('/paytr/sussess/store/', [PaytrController::class, 'paytrsuccessCallback'])->name('store.pay.paytr.success');

Route::resource('roles', RoleController::class)->middleware(['auth', 'XSS']);
Route::resource('users', UserController::class)->middleware(['auth', 'XSS']);
Route::get('users/reset/{id}', [UserController::class, 'reset'])->name('users.reset')->middleware(['auth', 'XSS']);
Route::post('users/reset/{id}', [UserController::class, 'updatePassword'])->name('users.resetpassword')->middleware(['auth', 'XSS']);
Route::resource('permissions', PermissionController::class)->middleware(['auth', 'XSS',]);

Route::post('chatgptkey', [SettingController::class, 'chatgptkey'])->name('settings.chatgptkey');
Route::get('generate/{template_name}', [AiTemplateController::class, 'create'])->name('generate');
Route::post('generate/keywords/{id}', [AiTemplateController::class, 'getKeywords'])->name('generate.keywords');
Route::post('generate/response', [AiTemplateController::class, 'AiGenerate'])->name('generate.response');


// ====================================== wilayah irfan ===============================================================================



// vendor
Route::get('/fendor',[VendorController::class,'index'])->name('vendor.index');
Route::get('/fendor/create',[VendorController::class,'create'])->name('vendor.create');
Route::post('/fendor/store',[VendorController::class,'store'])->name('vendor.store');
Route::get('/fendor/edit/{id}',[VendorController::class,'edit'])->name('vendor.edit');
Route::post('/fendor/update/{id}',[VendorController::class,'update'])->name('vendor.update');
Route::get('/fendor/delete/{id}',[VendorController::class,'destroy'])->name('vendor.destroy');


// warehouse
Route::get('/warehouse',[WarehouseController::class,'index'])->name('warehouse.index');
Route::get('/warehouse/create',[WarehouseController::class,'create'])->name('warehouse.create');
Route::post('/warehouse/store',[WarehouseController::class,'store'])->name('warehouse.store');
Route::get('/warehouse/{id}/edit',[WarehouseController::class,'edit'])->name('warehouse.edit');
Route::post('/warehouse/{id}/update',[WarehouseController::class,'update'])->name('warehouse.update');
Route::get('/warehouse/{id}/delete',[WarehouseController::class,'destroy'])->name('warehouse.delete');


// warehouse stock
Route::get('/warehouse-stock/{id_warehouse}',[WarehouseStockController::class,'index'])->name('warehouse.stock.index');
Route::get('/warehouse-stock/{id_warehouse}/create',[WarehouseStockController::class,'create'])->name('warehouse.stock.create');
Route::post('/warehouse-stock/{id_warehouse}/store',[WarehouseStockController::class,'store'])->name('warehouse.stock.store');
Route::get('/warehouse-stock/{id_warehouse}/delete/{stock_id}',[WarehouseStockController::class,'destroy'])->name('warehouse.stock.delete');
Route::get('/warehouse-stock/{id_warehouse}/edit/{stock_id}',[WarehouseStockController::class,'edit'])->name('warehouse.stock.edit');


Route::get('/warehouse-record/{id_warehouse}',[WarehouseRecordController::class,'index'])->name('warehouse.record.index');


// outlet
Route::get('/outlet',[OutletController::class,'index'])->name('outlet.index');
Route::get('/outlet/create',[OutletController::class,'create'])->name('outlet.create');
Route::post('/outlet/store',[OutletController::class,'store'])->name('outlet.store');
Route::get('/outlet/edit/{id}',[OutletController::class,'edit'])->name('outlet.edit');
Route::post('/outlet/update/{id}',[OutletController::class,'update'])->name('outlet.update');
Route::get('/outlet/delete/{id}',[OutletController::class,'destroy'])->name('outlet.delete');


// satuan
Route::get('/satuan',[SatuanController::class,'index'])->name('satuan.index');
Route::get('/satuan/create',[SatuanController::class,'create'])->name('satuan.create');
Route::post('/satuan/store',[SatuanController::class,'store'])->name('satuan.store');
Route::get('/satuan/edit/{id}',[SatuanController::class,'edit'])->name('satuan.edit');
Route::post('/satuan/update/{id}',[SatuanController::class,'update'])->name('satuan.update');
Route::get('/satuan/delete/{id}',[SatuanController::class,'destroy'])->name('satuan.delete');



// kategori bahan
Route::get('/kategori_bahan',[KategoriBahanController::class,'index'])->name('kategori.bahan.index');
Route::get('/kategori_bahan/create',[KategoriBahanController::class,'create'])->name('kategori.bahan.create');
Route::post('/kategori_bahan/store',[KategoriBahanController::class,'store'])->name('kategori.bahan.store');
Route::get('/kategori_bahan/edit/{id}',[KategoriBahanController::class,'edit'])->name('kategori.bahan.edit');
Route::post('/kategori_bahan/update/{id}',[KategoriBahanController::class,'update'])->name('kategori.bahan.update');
Route::get('/kategori_bahan/delete/{id}',[KategoriBahanController::class,'destroy'])->name('kategori.bahan.delete');



// bahan di kategori
Route::get('/bahan_kategori_bahan/{id}',[KategoriBahanController::class,'indexBahan'])->name('bahan.baku.kategori.bahan.index');
Route::get('/bahan_kategori_bahan/{id}/create',[KategoriBahanController::class,'createBahan'])->name('bahan.baku.kategori.bahan.create');
Route::post('/bahan_kategori_bahan/{id}/store',[KategoriBahanController::class,'storeBahan'])->name('bahan.baku.kategori.bahan.store');
Route::get('/bahan_kategori_bahan/edit/{id_bahan}',[KategoriBahanController::class,'editBahan'])->name('bahan.baku.kategori.bahan.edit');
Route::post('/bahan_kategori_bahan/update/{id_bahan}',[KategoriBahanController::class,'updateBahan'])->name('bahan.baku.kategori.bahan.update');
Route::get('/bahan_kategori_bahan/{id}/delete/{id_bahan}',[KategoriBahanController::class,'deleteBahan'])->name('bahan.baku.kategori.bahan.delete');


// bahan produksi & bahan dasar
Route::get('/bahan_dasar',[BahanDasarController::class,'index'])->name('bahan.dasar.index');
Route::get('/bahan_dasar/create',[BahanDasarController::class,'create'])->name('bahan.dasar.create');
Route::get('/bahan_dasar/option/{id_kategori}',[BahanDasarController::class,'option'])->name('bahan.dasar.option');
Route::post('/bahan_dasar/store',[BahanDasarController::class,'store'])->name('bahan.dasar.store');
Route::get('/bahan_dasar/edit/{id}',[BahanDasarController::class,'edit'])->name('bahan.dasar.edit');
Route::post('/bahan_dasar/update/{id}',[BahanDasarController::class,'update'])->name('bahan.dasar.update');
Route::get('/bahan_dasar/delete/{id}',[BahanDasarController::class,'destroy'])->name('bahan.dasar.delete');


// pemakaian bahan tambahan produksi
Route::get('/bahan_tambahan_produksi',[BahanTambahanProduksiController::class,'index'])->name('bahan.tambahan.produksi.index');
Route::get('/bahan_tambahan_produksi/create',[BahanTambahanProduksiController::class,'create'])->name('bahan.tambahan.produksi.create');
Route::post('/bahan_tambahan_produksi/store',[BahanTambahanProduksiController::class,'store'])->name('bahan.tambahan.produksi.store');
Route::get('/bahan_tambahan_produksi/edit/{id}',[BahanTambahanProduksiController::class,'edit'])->name('bahan.tambahan.produksi.edit');
Route::post('/bahan_tambahan_produksi/update/{id}',[BahanTambahanProduksiController::class,'update'])->name('bahan.tambahan.produksi.update');
Route::get('/bahan_tambahan_produksi/delete/{id}',[BahanTambahanProduksiController::class,'destroy'])->name('bahan.tambahan.produksi.delete');
Route::get('/bahan_data/{id}',[BahanDasarController::class,'dataBahanDasar'])->name('data.bahan.dasar');
Route::get('/bahan_tambahan_data_by_warehouse/{id_warehouse}',[BahanDasarController::class,'dataBahanTambahan'])->name('data.bahan.tambahan');
Route::get('/harga_bahan_tambahan_data_by_warehouse/{id_warehouse}/{id_bahan_dasar}',[BahanDasarController::class,'hargaBahanTambahan'])->name('harga.bahan.tambahan');



// purchase
Route::get('/vurchase',[PurchaseController::class,'index'])->name('purchase.index');
Route::get('/vurchase/create',[PurchaseController::class,'create'])->name('purchase.create');
Route::post('/vurchase/store',[PurchaseController::class,'store'])->name('purchase.store');
Route::get('/vurchase/edit/{id}',[PurchaseController::class,'edit'])->name('purchase.edit');
Route::post('/vurchase/update/{id}',[PurchaseController::class,'update'])->name('purchase.update');
Route::get('/vurchase/delete/{id}',[PurchaseController::class,'destroy'])->name('purchase.delete');


// food
Route::get('/food',[FoodController::class,'index'])->name('food.index');
Route::get('/food/create',[FoodController::class,'create'])->name('food.create');
Route::post('/food/store',[FoodController::class,'store'])->name('food.store');
Route::get('/food/edit/{id}',[FoodController::class,'edit'])->name('food.edit');
Route::post('/food/update/{id}',[FoodController::class,'update'])->name('food.update');
Route::get('/food/delete/{id}',[FoodController::class,'destroy'])->name('food.delete');
Route::get('/food/data/{id}',[FoodController::class,'foodData'])->name('food.data');




// food-process
Route::get('/food-process/{id}',[FoodController::class,'foodProcess'])->name('food.process');
Route::get('/food-process/create/{id}',[FoodController::class,'foodProcessCreate'])->name('food.process.create');
Route::post('/food-process/store/{id}',[FoodController::class,'foodProcessStore'])->name('food.process.store');
Route::get('/food-process/edit/{id_food_process}',[FoodController::class,'foodProcessEdit'])->name('food.process.edit');
Route::post('/food-process/update/{id_food_process}',[FoodController::class,'foodProcessUpdate'])->name('food.process.update');
Route::get('/food-process/delete/{id_food_process}',[FoodController::class,'foodProcessDelete'])->name('food.process.delete');



// record bahan
Route::get('/record_bahan',[RecordBahanController::class,'index'])->name('record.bahan.index');
Route::get('/record_bahan/delete/{id}',[RecordBahanController::class,'destroy'])->name('record.bahan.delete');
Route::post('/record_bahan/data',[RecordBahanController::class,'data'])->name('record.bahan.data');
Route::get('/record_bahan/table',[RecordBahanController::class,'table'])->name('record.bahan.table');



Route::get('/kategori_proses_produksi',[KategoriProsesProduksiController::class,'index'])->name('kategori.proses.produksi.index');
Route::get('/kategori_proses_produksi/create',[KategoriProsesProduksiController::class,'create'])->name('kategori.proses.produksi.create');
Route::post('/kategori_proses_produksi/store',[KategoriProsesProduksiController::class,'store'])->name('kategori.proses.produksi.store');
Route::get('/kategori_proses_produksi/edit/{id}',[KategoriProsesProduksiController::class,'edit'])->name('kategori.proses.produksi.edit');
Route::post('/kategori_proses_produksi/update/{id}',[KategoriProsesProduksiController::class,'update'])->name('kategori.proses.produksi.update');
Route::get('/kategori_proses_produksi/delete/{id}',[KategoriProsesProduksiController::class,'destroy'])->name('kategori.proses.produksi.delete');



Route::get('/proses_produksi',[ProsesProduksiController::class,'index'])->name('proses.produksi.index');
Route::get('/proses_produksi/create',[ProsesProduksiController::class,'create'])->name('proses.produksi.create');
Route::post('/proses_produksi/store',[ProsesProduksiController::class,'store'])->name('proses.produksi.store');
Route::get('/proses_produksi/delete/{id}',[ProsesProduksiController::class,'destroy'])->name('proses.produksi.delete');
Route::get('/proses_produksi/edit/{id}',[ProsesProduksiController::class,'edit'])->name('proses.produksi.edit');
Route::post('/proses_produksi/update/{id}',[ProsesProduksiController::class,'update'])->name('proses.produksi.update');
Route::get('/proses_produksi/rincian_resep/{id}/{qty}',[ProsesProduksiController::class,'rincianResep'])->name('proses.produksi.rincian.resep');
Route::get('/proses_produksi/stock_purchase/{id}/{qty}/{warehouse_id}',[ProsesProduksiController::class,'stockPurchase'])->name('proses.produksi.stock.purchase.warehouse');
Route::get('/proses_produksi/output_masakan/{i}',[ProsesProduksiController::class,'outputMasakan'])->name('proses.produksi.output.masakan');



// item
Route::get('/item',[ItemController::class,'index'])->name('item.index');
Route::get('/item/create',[ItemController::class,'create'])->name('item.create');
Route::post('/item/store',[ItemController::class,'store'])->name('item.store');
Route::get('/item/{id}/edit',[ItemController::class,'edit'])->name('item.edit');
Route::post('/item/{id}/update',[ItemController::class,'update'])->name('item.update');
Route::get('/item/{id}/delete',[ItemController::class,'destroy'])->name('item.delete');



// product
Route::get('/produk',[ProductController::class,'index'])->name('product.index');
Route::get('/produk/create',[ProductController::class,'create'])->name('product.create');
Route::post('/product/store',[ProductController::class,'store'])->name('product.store');
Route::get('/produk/{id}/edit',[ProductController::class,'edit'])->name('product.edit');
Route::post('/produk/{id}/update',[ProductController::class,'update'])->name('product.update');
Route::get('/produk/{id}/delete',[ProductController::class,'destroy'])->name('product.delete');
Route::get('/produk/{id}/add-stock',[ProductController::class,'addStock'])->name('product.add.stock');
Route::get('produk/bahan-penyusun/{i}',[ProductController::class,'bahanPenyusun'])->name('product.bahan.penyusun');
Route::get('produk/table-awal-bahan-penyusun/{i}/{warehouse_id}',[ProductController::class,'awalBahanPenyusun'])->name('product.awal.bahan.penyusun');
Route::get('produk/price-bahan-penyusun/{bahan_dasar_id}/{warehouse_id}',[ProductController::class,'priceBahanPenyusun'])->name('product.price.bahan.penyusun');
Route::post('/produk/add-stock-product-reducing-warehouse-stock',[ProductController::class,'addStockProduct'])->name('add.stock.product.reducing.warehouse.stock');


// ingredient
Route::get('/ingredient/{code}',[IngredientsController::class,'index'])->name('ingredient.index');
Route::get('/ingredient/{code}/data',[IngredientsController::class,'ingredientsData'])->name('ingredient.data');
Route::get('/ingredient/{code}/create',[IngredientsController::class,'create'])->name('ingredient.create');
Route::post('/ingredient/{code}/store',[IngredientsController::class,'store'])->name('ingredient.store');
Route::get('/ingredient/{code}/edit/{id}',[IngredientsController::class,'edit'])->name('ingredient.edit');
Route::post('/ingredient/{id}/update',[IngredientsController::class,'update'])->name('ingredient.update');
Route::get('/ingredient/{code}/{id}/delete',[IngredientsController::class,'destroy'])->name('ingredient.delete');




// category
Route::get('/category',[CategoryController::class,'index'])->name('category.index');
Route::get('/category/create',[CategoryController::class,'create'])->name('category.create');
Route::post('/category/store',[CategoryController::class,'store'])->name('category.store');
Route::get('/category/{id}/edit',[CategoryController::class,'edit'])->name('category.edit');
Route::post('/category/{id}/update',[CategoryController::class,'update'])->name('category.update');
Route::get('/category/{id}/delete',[CategoryController::class,'destroy'])->name('category.delete');