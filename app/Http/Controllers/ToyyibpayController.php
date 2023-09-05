<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\Order;
use App\Models\Plan;
use App\Models\PlanOrder;
use App\Models\UserCoupon;
use App\Models\Product;
use App\Models\ProductVariantOption;
use App\Models\PurchasedProducts;
use App\Models\ProductCoupon;
use App\Models\Store;
use App\Models\Shipping;
use Exception;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use App\Models\Utility;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class ToyyibpayController extends Controller
{
    public $secretKey, $callBackUrl, $returnUrl, $categoryCode, $is_enabled, $invoiceData;

    public function __construct()
    {
        // if (\Auth::user()->type == 'company') {
        //     $payment_setting = Utility::getAdminPaymentSetting();
        // } else {
        //     $payment_setting = Utility::getCompanyPaymentSetting($this->invoiceData);
        // }


        $payment_setting = Utility::getAdminPaymentSetting();


        $this->secretKey = isset($payment_setting['toyyibpay_secret_key']) ? $payment_setting['toyyibpay_secret_key'] : '';
        $this->categoryCode = isset($payment_setting['toyyibpay_category_code']) ? $payment_setting['toyyibpay_category_code'] : '';
        $this->is_enabled = isset($payment_setting['is_toyyibpay_enabled']) ? $payment_setting['is_toyyibpay_enabled'] : 'off';
    }

    public function index()
    {
        return view('payment');
    }

    public function toyyibpayPaymentPrepare(Request $request)
    {
        try {
            $planID = \Illuminate\Support\Facades\Crypt::decrypt($request->plan_id);
            $plan   = Plan::find($planID);
            $authuser = Auth::user();
            if ($plan) {
                $get_amount = $plan->price;

                if (!empty($request->coupon)) {
                    $coupons = Coupon::where('code', strtoupper($request->coupon))->where('is_active', '1')->first();
                    if (!empty($coupons)) {
                        $usedCoupun     = $coupons->used_coupon();
                        $discount_value = ($plan->price / 100) * $coupons->discount;
                        $get_amount          = $plan->price - $discount_value;

                        if ($coupons->limit == $usedCoupun) {
                            return redirect()->back()->with('error', __('This coupon code has expired.'));
                        }
                    } else {
                        return redirect()->back()->with('error', __('This coupon code is invalid or has expired.'));
                    }
                }
                $price = $get_amount;
                if ($price <= 0) {

                    $authuser->plan = $plan->id;

                    $authuser->save();

                    $assignPlan = $authuser->assignPlan($plan->id, $request->paytm_payment_frequency);
                    $orderID = strtoupper(str_replace('.', '', uniqid('', true)));

                    if (!empty($coupons)) {
                        $userCoupon            = new UserCoupon();
                        $userCoupon->user   = $authuser->id;
                        $userCoupon->coupon = $coupons->id;
                        $userCoupon->order  = $orderID;
                        $userCoupon->save();


                        $usedCoupun = $coupons->used_coupon();
                        if ($coupons->limit <= $usedCoupun) {
                            $coupons->is_active = 0;
                            $coupons->save();
                        }
                    }


                    if ($assignPlan['is_success'] == true && !empty($plan)) {
                        if (!empty($authuser->payment_subscription_id) && $authuser->payment_subscription_id != '') {
                            try {
                                $authuser->cancel_subscription($authuser->id);
                            } catch (\Exception $exception) {
                                \Log::debug($exception->getMessage());
                            }
                        }

                        $planorder                 = new PlanOrder();
                        $planorder->order_id       = $orderID;
                        $planorder->name           = $authuser->name;
                        $planorder->email           = $authuser->email;
                        $planorder->card_number    = '';
                        $planorder->card_exp_month = '';
                        $planorder->card_exp_year  = '';
                        $planorder->plan_name      = $plan->name;
                        $planorder->plan_id        = $plan->id;
                        $planorder->price          = $price == null ? 0 : $price;
                        $planorder->price_currency = env('CURRENCY');
                        $planorder->txn_id         = '';
                        $planorder->payment_type   = __('Toyyibpay');
                        $planorder->payment_status = 'succeeded';
                        $planorder->receipt        = '';
                        $planorder->user_id        = $authuser->id;
                        $planorder->store_id       = $authuser->current_store;
                        $planorder->save();

                        return redirect()->route('plans.index')->with('success', __('Plan Successfully Activated'));
                    } else {
                        return Utility::error_res(__('Plan fail to upgrade.'));
                    }
                } else {
                    $coupon = (empty($request->coupon)) ? "0" : $request->coupon;
                    $this->callBackUrl = route('plan.toyyibpay.callback', [$plan->id, $get_amount, $coupon]);
                    $this->returnUrl = route('plan.toyyibpay.callback', [$plan->id, $get_amount, $coupon]);
                    $Date = date('d-m-Y');
                    $ammount = $get_amount;
                    $billName = $plan->name;
                    $description = $plan->name;
                    $billExpiryDays = 3;
                    $billExpiryDate = date('d-m-Y', strtotime($Date . ' + 3 days'));
                    $billContentEmail = "Thank you for purchasing our product!";

                    $some_data = array(
                        'userSecretKey' => $this->secretKey,
                        'categoryCode' => $this->categoryCode,
                        'billName' => $billName,
                        'billDescription' => $description,
                        'billPriceSetting' => 1,
                        'billPayorInfo' => 1,
                        'billAmount' => 100 * $ammount,
                        'billReturnUrl' => $this->returnUrl,
                        'billCallbackUrl' => $this->callBackUrl,
                        'billExternalReferenceNo' => 'AFR341DFI',
                        'billTo' => \Auth::user()->name,
                        'billEmail' => \Auth::user()->email,
                        'billPhone' => '000000000',
                        'billSplitPayment' => 0,
                        'billSplitPaymentArgs' => '',
                        'billPaymentChannel' => '0',
                        'billContentEmail' => $billContentEmail,
                        'billChargeToCustomer' => 1,
                        'billExpiryDate' => $billExpiryDate,
                        'billExpiryDays' => $billExpiryDays
                    );
                    $curl = curl_init();
                    curl_setopt($curl, CURLOPT_POST, 1);
                    curl_setopt($curl, CURLOPT_URL, 'https://toyyibpay.com/index.php/api/createBill');
                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $some_data);
                    $result = curl_exec($curl);
                    $info = curl_getinfo($curl);
                    curl_close($curl);
                    $obj = json_decode($result);
                    return redirect('https://toyyibpay.com/' . $obj[0]->BillCode);
                }
            } else {
                return redirect()->route('plans.index')->with('error', __('Plan is deleted.'));
            }
        } catch (Exception $e) {
            return redirect()->route('plans.index')->with('error', __($e->getMessage()));
        }
    }

    public function toyyibpayPlanGetPayment(Request $request, $planId, $getAmount, $couponCode)
    {
        if ($couponCode != 0) {
            $coupons = Coupon::where('code', strtoupper($couponCode))->where('is_active', '1')->first();
            $request['coupon_id'] = $coupons->id;
        } else {
            $coupons = null;
        }

        $plan = Plan::find($planId);
        $user = auth()->user();
        // $request['status_id'] = 1;

        // 1=success, 2=pending, 3=fail
        try {
            $orderID = strtoupper(str_replace('.', '', uniqid('', true)));
            if ($request->status_id == 3) {
                $statuses = 'Fail';
                $order                 = new PlanOrder();
                $order->order_id       = $orderID;
                $order->name           = $user->name;
                $order->card_number    = '';
                $order->card_exp_month = '';
                $order->card_exp_year  = '';
                $order->plan_name      = $plan->name;
                $order->plan_id        = $plan->id;
                $order->price          = $getAmount;
                $order->price_currency = env('CURRENCY');
                $order->payment_type   = __('Toyyibpay');
                $order->payment_status = $statuses;
                $order->receipt        = '';
                $order->user_id        = $user->id;
                $order->save();
                return redirect()->route('plans.index')->with('success', __('Your Transaction is fail please try again'));
            } else if ($request->status_id == 2) {
                $statuses = 'pandding';
                $order                 = new PlanOrder();
                $order->order_id       = $orderID;
                $order->name           = $user->name;
                $order->card_number    = '';
                $order->card_exp_month = '';
                $order->card_exp_year  = '';
                $order->plan_name      = $plan->name;
                $order->plan_id        = $plan->id;
                $order->price          = $getAmount;
                $order->price_currency = env('CURRENCY');
                $order->payment_type   = __('Toyyibpay');
                $order->payment_status = $statuses;
                $order->receipt        = '';
                $order->user_id        = $user->id;
                $order->save();
                return redirect()->route('plans.index')->with('success', __('Your transaction on pandding'));
            } else if ($request->status_id == 1) {
                $statuses = 'success';
                $order                 = new PlanOrder();
                $order->order_id       = $orderID;
                $order->name           = $user->name;
                $order->card_number    = '';
                $order->card_exp_month = '';
                $order->card_exp_year  = '';
                $order->plan_name      = $plan->name;
                $order->plan_id        = $plan->id;
                $order->price          = $getAmount;
                $order->price_currency = env('CURRENCY');
                $order->payment_type   = __('Toyyibpay');
                $order->payment_status = $statuses;
                $order->receipt        = '';
                $order->user_id        = $user->id;
                $order->save();
                $assignPlan = $user->assignPlan($plan->id);
                $coupons = Coupon::find($request->coupon_id);
                if (!empty($request->coupon_id)) {
                    if (!empty($coupons)) {
                        $userCoupon         = new UserCoupon();
                        $userCoupon->user   = $user->id;
                        $userCoupon->coupon = $coupons->id;
                        $userCoupon->order  = $orderID;
                        $userCoupon->save();
                        $usedCoupun = $coupons->used_coupon();
                        if ($coupons->limit <= $usedCoupun) {
                            $coupons->is_active = 0;
                            $coupons->save();
                        }
                    }
                }
                if ($assignPlan['is_success']) {
                    return redirect()->route('plans.index')->with('success', __('Plan activated Successfully.'));
                } else {
                    return redirect()->route('plans.index')->with('error', __($assignPlan['error']));
                }
            } else {
                return redirect()->route('plans.index')->with('error', __('Plan is deleted.'));
            }
        } catch (Exception $e) {
            return redirect()->route('plans.index')->with('error', __($e->getMessage()));
        }
    }
    public function toyyibpaypayment(Request $request, $slug)
    {

        $validator = \Validator::make(

            $request->all(),
            [
                'name' => 'required|max:120',
                'phone' => 'required',
                'billing_address' => 'required',
            ]
        );
        if ($validator->fails()) {
            return redirect()->route('store.slug', $slug)->with('error', __('All field is required.'));
        }

        try {
            $cart = session()->get($slug);
            $products = $cart['products'];

            $userdetail = new UserDetail();

            $store = Store::where('slug', $slug)->first();

            $userdetail['store_id'] = $store->id;
            $userdetail['name']     = $request->name;
            $userdetail['email']    = $request->email;
            $userdetail['phone']    = $request->phone;

            $userdetail['custom_field_title_1'] = $request->custom_field_title_1;
            $userdetail['custom_field_title_2'] = $request->custom_field_title_2;
            $userdetail['custom_field_title_3'] = $request->custom_field_title_3;
            $userdetail['custom_field_title_4'] = $request->custom_field_title_4;


            $userdetail['billing_address']  = $request->billing_address;
            $userdetail['shipping_address'] = !empty($request->shipping_address) ? $request->shipping_address : '-';
            $userdetail['special_instruct'] = $request->special_instruct;
            $userdetail->save();
            $userdetail->id;

            $store = Store::where('slug', $slug)->first();
            $companyPaymentSetting = Utility::getPaymentSetting($store->id);
            $total_tax = $sub_total = $total = $sub_tax = 0;
            $product_name = [];
            $product_id = [];

            if (empty($cart)) {
                return redirect()->route('store.slug', $slug)->with('error', __('Please add to product into cart.'));
            }

            $cust_details = [
                "id" => $userdetail->id,
                "name" => $request->name,
                "email" => $request->email,
                "phone" => $request->phone,
                "custom_field_title_1" => $request->custom_field_title_1,
                "custom_field_title_2" => $request->custom_field_title_2,
                "custom_field_title_3" => $request->custom_field_title_3,
                "custom_field_title_4" => $request->custom_field_title_4,
                "billing_address" => $request->billing_address,
                "shipping_address" => $request->shipping_address,
                "special_instruct" => $request->special_instruct,
            ];

            foreach ($products as $key => $product) {
                if ($product['variant_id'] != 0) {

                    $product_name[] = $product['product_name'];
                    $product_id[] = $key;

                    foreach ($product['tax'] as $tax) {
                        $sub_tax = ($product['variant_price'] * $product['quantity'] * $tax['tax']) / 100;
                        $total_tax += $sub_tax;
                    }
                    $totalprice = $product['variant_price'] * $product['quantity'];
                    $total += $totalprice;
                } else {
                    $product_name[] = $product['product_name'];
                    $product_id[] = $key;

                    foreach ($product['tax'] as $tax) {
                        $sub_tax = ($product['price'] * $product['quantity'] * $tax['tax']) / 100;
                        $total_tax += $sub_tax;
                    }
                    $totalprice = $product['price'] * $product['quantity'];
                    $total += $totalprice;
                }
            }
            if ($products) {
                $get_amount = $total + $total_tax;

                if (isset($cart['coupon'])) {
                    if ($cart['coupon']['coupon']['enable_flat'] == 'off') {

                        $discount_value = ($get_amount / 100) * $cart['coupon']['coupon']['discount'];
                        $get_amount = $get_amount - $discount_value;
                    } else {

                        $discount_value = $cart['coupon']['coupon']['flat_discount'];
                        $get_amount = $get_amount - $discount_value;
                    }
                }
                if (isset($cart['shipping']) && isset($cart['shipping']['shipping_id']) && !empty($cart['shipping'])) {
                    $shipping = Shipping::find($cart['shipping']['shipping_id']);
                    if (!empty($shipping)) {
                        $get_amount = $get_amount + $shipping->price;
                    }
                }

                // $coupon = (isset($cart['coupon'])) ? "0" : $request->coupon;
                $this->callBackUrl = route('toyyibpay.callback', [$store->slug, $get_amount]);
                $this->returnUrl = route('toyyibpay.callback', [$store->slug, $get_amount]);


                $Date = date('d-m-Y');
                $ammount = $get_amount;
                $billName = $product['product_name'];
                $description = $product['product_name'];
                $billExpiryDays = 3;
                $billExpiryDate = date('d-m-Y', strtotime($Date . ' + 3 days'));
                $billContentEmail = "Thank you for purchasing our product!";

                $some_data = array(
                    'userSecretKey' => $companyPaymentSetting['toyyibpay_secret_key'],
                    'categoryCode' => $companyPaymentSetting['toyyibpay_category_code'],
                    'billName' => $billName,
                    'billDescription' => $description,
                    'billPriceSetting' => 1,
                    'billPayorInfo' => 1,
                    'billAmount' => 100 * $ammount,
                    'billReturnUrl' => $this->returnUrl,
                    'billCallbackUrl' => $this->callBackUrl,
                    'billExternalReferenceNo' => 'AFR341DFI',
                    'billTo' => $cust_details['name'],
                    'billEmail' => $cust_details['email'],
                    'billPhone' => str_replace(array("+", "(", ")", "-"), "", $cust_details['phone']),
                    'billSplitPayment' => 0,
                    'billSplitPaymentArgs' => '',
                    'billPaymentChannel' => '0',
                    'billContentEmail' => $billContentEmail,
                    'billChargeToCustomer' => 1,
                    'billExpiryDate' => $billExpiryDate,
                    'billExpiryDays' => $billExpiryDays
                );
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_POST, 1);
                curl_setopt($curl, CURLOPT_URL, 'https://toyyibpay.com/index.php/api/createBill');
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($curl, CURLOPT_POSTFIELDS, $some_data);
                $result = curl_exec($curl);
                $info = curl_getinfo($curl);
                curl_close($curl);
                $obj = json_decode($result);
                return redirect('https://toyyibpay.com/' . $obj[0]->BillCode);
            } else {
                return redirect()->back()->with('error', __('product is not found.'));
            }
        } catch (\Throwable $e) {
            return redirect()->back()->with('error', __($e->getMessage()));
        }
    }
    public function toyyibpaycallback(Request $request, $slug, $get_amount)
    {
        $pay_id = $request->transaction_id;
        $cart     = session()->get($slug);
        $store        = Store::where('slug', $slug)->first();
        // $request['status_id'] = 1;
        $cust_details = $cart['cust_details'];
        if (!empty($cart)) {
            $products = $cart['products'];
        } else {
            return redirect()->back()->with('error', __('Please add to product into cart'));
        }
        if (isset($cart['coupon']['data_id'])) {
            $coupon = ProductCoupon::where('id', $cart['coupon']['data_id'])->first();
        } else {
            $coupon = '';
        }
        $product_name    = [];
        $product_id      = [];
        // $tax_name        = [];
        // $totalprice      = 0;
        $preference_data = [];
        foreach ($products as $key => $product) {
            if ($product['variant_id'] == 0) {
                $new_qty                = $product['originalquantity'] - $product['quantity'];
                $product_edit           = Product::find($product['product_id']);
                $product_edit->quantity = $new_qty;
                $product_edit->save();
                // $tax_price = 0;
                // if(!empty($product['tax']))
                // {
                //     foreach($product['tax'] as $key => $taxs)
                //     {
                //         $tax_price += $product['price'] * $product['quantity'] * $taxs['tax'] / 100;
                //     }
                // }
                // $totalprice     += $product['price'] * $product['quantity'] ;
                $product_name[] = $product['product_name'];
                $product_id[]   = $product['id'];
            } elseif ($product['variant_id'] != 0) {
                $new_qty                   = $product['originalvariantquantity'] - $product['quantity'];
                $product_variant           = ProductVariantOption::find($product['variant_id']);
                $product_variant->quantity = $new_qty;
                $product_variant->save();
                // $tax_price = 0;
                // if(!empty($product['tax']))
                // {
                //     foreach($product['tax'] as $key => $taxs)
                //     {
                //         $tax_price += $product['variant_price'] * $product['quantity'] * $taxs['tax'] / 100;
                //     }
                // }
                // $totalprice     += $product['variant_price'] * $product['quantity'] ;
                $product_name[] = $product['product_name'];
                $product_id[]   = $product['id'];
            }
        }
        // $price=$totalprice+$tax_price;
        // if(isset($cart['coupon']))
        // {
        //     if($cart['coupon']['coupon']['enable_flat'] == 'off')
        //     {
        //         $discount_value = ($price / 100) * $cart['coupon']['coupon']['discount'];
        //         $price          = $price - $discount_value;
        //     }
        //     else
        //     {
        //         $discount_value = $cart['coupon']['coupon']['flat_discount'];
        //         $price          = $price - $discount_value;
        //     }
        // }
        if (isset($cart['shipping']) && isset($cart['shipping']['shipping_id']) && !empty($cart['shipping'])) {
            $shipping       = Shipping::find($cart['shipping']['shipping_id']);
            // $totalprice     = $price + $shipping->price;
            $shipping_name  = $shipping->name;
            $shipping_price = $shipping->price;
            $shipping_data  = json_encode(
                [
                    'shipping_name' => $shipping_name,
                    'shipping_price' => $shipping_price,
                    'location_id' => $cart['shipping']['location_id'],
                ]
            );
        } else {
            $shipping_data = '';
        }

        if ($products) {
            try {
                if (Utility::CustomerAuthCheck($store->slug)) {
                    $customer = Auth::guard('customers')->user()->id;
                } else {
                    $customer = 0;
                }
                if ($request->status_id == 3) {
                    return redirect()->route('payment.cancelled', [$slug])->with('error', 'Your Transaction is fail please try again');
                } elseif ($request->status_id == 2) {
                    return redirect()->route('payment.cancelled', [$slug])->with('error', 'Your Transaction is pending');
                } elseif ($request->status_id == 1) {
                    $customer               = Auth::guard('customers')->user();
                    $order                  = new Order();
                    $order->order_id        = time();
                    $order->name            = isset($cust_details['name']) ? $cust_details['name'] : '';
                    $order->email           = isset($cust_details['email']) ? $cust_details['email'] : '';
                    $order->card_number     = '';
                    $order->card_exp_month  = '';
                    $order->card_exp_year   = '';
                    $order->status          = 'pending';
                    $order->user_address_id = isset($cust_details['id']) ? $cust_details['id'] : '';
                    $order->shipping_data   = $shipping_data;
                    $order->product_id      = implode(',', $product_id);
                    $order->price           = $get_amount;
                    $order->coupon          = isset($cart['coupon']['data_id']) ? $cart['coupon']['data_id'] : '';
                    $order->coupon_json     = json_encode($coupon);
                    $order->discount_price  = isset($cart['coupon']['discount_price']) ? $cart['coupon']['discount_price'] : '';
                    $order->product         = json_encode($products);
                    $order->price_currency  = $store->currency_code;
                    $order->txn_id          = isset($pay_id) ? $pay_id : '';
                    $order->payment_type    = 'Toyyibpay';
                    $order->payment_status  = 'approved';
                    $order->receipt         = '';
                    $order->user_id         = $store['id'];
                    $order->customer_id     = isset($customer->id) ? $customer->id : '';
                    $order->save();

                    //webhook
                    $module = 'New Order';
                    $webhook =  Utility::webhook($module, $store->id);
                    if ($webhook) {
                        $parameter = json_encode($products);
                        //
                        // 1 parameter is  URL , 2 parameter is data , 3 parameter is method
                        $status = Utility::WebhookCall($webhook['url'], $parameter, $webhook['method']);
                        // dd($status);
                        if ($status != true) {
                            $msg  = 'Webhook call failed.';
                        }
                    }

                    if ((!empty(Auth::guard('customers')->user()) && $store->is_checkout_login_required == 'on')) {

                        foreach ($products as $product_id) {
                            $purchased_products = new PurchasedProducts();
                            $purchased_products->product_id  = $product_id['product_id'];
                            $purchased_products->customer_id = $customer->id;
                            $purchased_products->order_id   = $order->id;
                            $purchased_products->save();
                        }
                    }
                    $order_email = $order->email;
                    $owner = User::find($store->created_by);
                    $owner_email = $owner->email;
                    $order_id = Crypt::encrypt($order->id);
                    if (isset($store->mail_driver) && !empty($store->mail_driver)) {
                        $dArr = [
                            'order_name' => $order->name,
                        ];
                        $resp = Utility::sendEmailTemplate('Order Created', $order_email, $dArr, $store, $order_id);
                        $resp1 = Utility::sendEmailTemplate('Order Created For Owner', $owner_email, $dArr, $store, $order_id);
                    }
                    if (isset($store->is_twilio_enabled) && $store->is_twilio_enabled == "on") {
                        Utility::order_create_owner($order, $owner, $store);
                        Utility::order_create_customer($order, $customer, $store);
                    }
                    $msg = redirect()->route(
                        'store-complete.complete',
                        [
                            $store->slug,
                            Crypt::encrypt($order->id),
                        ]
                    )->with('success', __('Transaction has been success') . ((isset($msg)) ? '<br> <span class="text-danger">' . $msg . '</span>' : ''));

                    session()->forget($slug);

                    return $msg;
                } else {
                    return redirect()->route('store-payment.payment', [$slug])->with('error', __('Transaction Unsuccesfull'));
                }
            } catch (\Exception $e) {
                return redirect()->back()->with('error', $e->getMessage());
            }
        } else {
            return redirect()->back()->with('error', __('Transaction Unsuccesfull'));
        }
    }
    // public function invoicepaywithtoyyibpay(Request $request, $invoice_id)
    // {
    //     // dd($request->all());
    //     $invoice = Invoice::find($invoice_id);
    //     if (\Auth::check()) {
    //         $settings = \DB::table('settings')->where('created_by', '=', \Auth::user()->creatorId())->get()->pluck('value', 'name');
    //         $user     = \Auth::user();
    //     } else {
    //         $user = User::where('id', $invoice->created_by)->first();
    //         $settings = Utility::settingById($invoice->created_by);
    //     }

    //     $get_amount = $request->amount;
    //     // dd($get_amount);

    //     if ($invoice) {
    //         if ($get_amount > $invoice->getDue()) {
    //             return redirect()->back()->with('error', __('Invalid amount.'));
    //         } else {
    //             $orderID = strtoupper(str_replace('.', '', uniqid('', true)));

    //             $name = Utility::invoiceNumberFormat($settings, $invoice->invoice_id);

    //             $this->callBackUrl = route('invoice.toyyibpay.status', [$invoice->id,$get_amount]);
    //             $this->returnUrl = route('invoice.toyyibpay.status', [$invoice->id,$get_amount]);
    //         }

    //             $Date = date('d-m-Y');
    //             $ammount = $get_amount;
    //             $billExpiryDays = 3;
    //             $billExpiryDate = date('d-m-Y', strtotime($Date . ' + 3 days'));
    //             $billContentEmail = "Thank you for purchasing our product!";

    //             $some_data = array(
    //                 'userSecretKey' => $this->secretKey,
    //                 'categoryCode' => $this->categoryCode,
    //                 'billPriceSetting' => 1,
    //                 'billPayorInfo' => 1,
    //                 'billAmount' => 100 * $ammount,
    //                 'billReturnUrl' => $this->returnUrl,
    //                 'billCallbackUrl' => $this->callBackUrl,
    //                 'billExternalReferenceNo' => 'AFR341DFI',
    //                 'billTo' => 'John Doe',
    //                 'billEmail' => 'jd@gmail.com',
    //                 'billPhone' => '0194342411',
    //                 'billSplitPayment' => 0,
    //                 'billSplitPaymentArgs' => '',
    //                 'billPaymentChannel' => '0',
    //                 'billContentEmail' => $billContentEmail,
    //                 'billChargeToCustomer' => 1,
    //                 'billExpiryDate' => $billExpiryDate,
    //                 'billExpiryDays' => $billExpiryDays
    //             );
    //             $curl = curl_init();
    //             curl_setopt($curl, CURLOPT_POST, 1);
    //             curl_setopt($curl, CURLOPT_URL, 'https://toyyibpay.com/index.php/api/createBill');
    //             curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    //             curl_setopt($curl, CURLOPT_POSTFIELDS, $some_data);
    //             $result = curl_exec($curl);
    //             $info = curl_getinfo($curl);
    //             curl_close($curl);
    //             $obj = json_decode($result);
    //             return redirect('https://toyyibpay.com/' . $obj[0]->BillCode);

    //             return redirect()->route('customer.invoice.show',\Crypt::encrypt($invoice_id))->back()->with('error', __('Unknown error occurred'));
    //         } else {
    //             return redirect()->back()->with('error', __('Permission denied.'));
    //         }

    // }

    // public function invoicetoyyibpaystatus(Request $request, $invoice_id,$amount)
    // {
    //     dd($request->all());
    // }

}
