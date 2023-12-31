<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\Order;
use App\Models\Plan;
use App\Models\ProductCoupon;
use App\Imports\ProductCouponsImport;
use App\Exports\ProductCouponExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Store;
use App\Models\UserCoupon;
use App\Models\Utility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use MongoDB\Driver\Session;

class ProductCouponController extends Controller
{

    public function index()
    {
        if (\Auth::user()->can('Manage Product Coupan')) {
            $user = \Auth::user()->current_store;
            $productcoupons = ProductCoupon::where('store_id', $user)->where('created_by', \Auth::user()->creatorId())->get();

            return view('product-coupon.index', compact('productcoupons'));
        } else {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }


    public function importFile()
    {
        if (\Auth::user()->can('Create Product Coupan')) {
            return view('product-coupon.import');
        } else {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }

    public function export()
    {
        $name = 'products_coupon_' . date('Y-m-d i:h:s');
        $data = Excel::download(new ProductCouponExport(), $name . '.xlsx');

        return $data;
    }

    public function import(Request $request)
    {
        if (\Auth::user()->can('Create Product Coupan')) {
            $rules = [
                'file' => 'required|mimes:csv,txt,xlsx',
            ];
            $validator = \Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();
                return redirect()->back()->with('error', $messages->first());
            }
            $productcoupons = (new ProductCouponsImport())->toArray(request()->file('file'))[0];
            $totalproductcoupon = count($productcoupons) - 1;
            $errorArray    = [];
            for ($i = 1; $i <= count($productcoupons) - 1; $i++) {
                $productcoupon = $productcoupons[$i];
                $productcouponByname = ProductCoupon::where('name', $productcoupon[0])->first();
                if (!empty($productcouponByname)) {
                    $productcouponData = $productcouponByname;
                } else {
                    $productcouponData = new ProductCoupon();
                }
                $productcouponData->name             = $productcoupon[1];
                $productcouponData->code             = $productcoupon[2];
                $productcouponData->enable_flat      = $productcoupon[3];
                $productcouponData->discount         = $productcoupon[4];
                $productcouponData->flat_discount    = $productcoupon[5];
                $productcouponData->limit            = $productcoupon[6];
                $productcouponData->store_id         = \Auth::user()->current_store;
                $productcouponData->created_by       = \Auth::user()->creatorId();
                if (empty($productcouponData)) {
                    $errorArray[] = $productcouponData;
                } else {
                    $productcouponData->save();
                }
            }
            $errorRecord = [];
            if (empty($errorArray)) {
                $data['status'] = 'success';
                $data['msg']    = __('Record successfully imported');
            } else {
                $data['status'] = 'error';
                $data['msg']    = count($errorArray) . ' ' . __('Record imported fail out of' . ' ' . $totalproductcoupon . ' ' . 'record');
                foreach ($errorArray as $errorData) {
                    $errorRecord[] = implode(',', $errorData);
                }
                \Session::put('errorArray', $errorRecord);
            }
            return redirect()->back()->with($data['status'], $data['msg']);
        } else {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }



    public function create()
    {
        if (\Auth::user()->can('Create Product Coupan')) {
            return view('product-coupon.create');
        } else {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }


    public function store(Request $request)
    {
        if (\Auth::user()->can('Create Product Coupan')) {
            $arrValidate = [
                'name' => 'required',
                'limit' => 'required|numeric',
                'code' => 'required',
            ];

            if ($request->enable_flat == 'on') {
                $arrValidate['pro_flat_discount'] = 'required';
            } else {
                $arrValidate['discount'] = 'required';
            }
            $validator = \Validator::make(
                $request->all(),
                $arrValidate
            );
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }

            $productcoupon              = new ProductCoupon();
            $productcoupon->name        = $request->name;
            $productcoupon->enable_flat = !empty($request->enable_flat) ? $request->enable_flat : 'off';
            if ($request->enable_flat == 'on') {
                $productcoupon->flat_discount = $request->pro_flat_discount;
            }
            if (empty($request->enable_flat)) {
                $productcoupon->discount = $request->discount;
            }
            $productcoupon->limit      = $request->limit;
            $productcoupon->code       = strtoupper($request->code);
            $productcoupon->store_id   = \Auth::user()->current_store;
            $productcoupon->created_by = \Auth::user()->creatorId();

            $productcoupon->save();

            return redirect()->route('product-coupon.index')->with('success', __('Coupon successfully created!'));
        } else {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\ProductCoupon $productCoupon
     *
     * @return \Illuminate\Http\Response
     */
    public function show(ProductCoupon $productCoupon)
    {
        if (\Auth::user()->can('Show Product Coupan')) {
            $productCoupons = Order::where('coupon', $productCoupon->id)->get();

            return view('product-coupon.view', compact('productCoupons', 'productCoupon'));
        } else {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\ProductCoupon $productCoupon
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductCoupon $productCoupon)
    {
        if (\Auth::user()->can('Edit Product Coupan')) {
            return view('product-coupon.edit', compact('productCoupon'));
        } else {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\ProductCoupon $productCoupon
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductCoupon $productCoupon)
    {
        if (\Auth::user()->can('Edit Product Coupan')) {
            $arrValidate = [
                'name' => 'required',
                'limit' => 'required|numeric',
                'code' => 'required',
            ];

            if ($request->enable_flat == 'on') {
                $arrValidate['pro_flat_discount'] = 'required';
            } else {
                $arrValidate['discount'] = 'required';
            }
            $validator = \Validator::make(
                $request->all(),
                $arrValidate
            );
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }

            $productCoupon->name        = $request->name;
            $productCoupon->enable_flat = !empty($request->enable_flat) ? $request->enable_flat : 'off';
            if ($request->enable_flat == 'on') {
                $productCoupon->flat_discount = $request->pro_flat_discount;
            }
            if (empty($request->enable_flat)) {
                $productCoupon->discount = $request->discount;
            }
            $productCoupon->limit      = $request->limit;
            $productCoupon->code       = strtoupper($request->code);
            $productCoupon->store_id   = \Auth::user()->current_store;
            $productCoupon->created_by = \Auth::user()->creatorId();
            $productCoupon->update();

            return redirect()->route('product-coupon.index')->with('success', __('Coupon successfully updated!'));
        } else {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\ProductCoupon $productCoupon
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductCoupon $productCoupon)
    {
        if (\Auth::user()->can('Edit Product Coupan')) {
            $productCoupon->delete();

            return redirect()->route('product-coupon.index')->with('success', __('Coupon successfully deleted!'));
        } else {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }

    public function applyProductCoupon(Request $request)
    {
        if ($request->price != '' && $request->coupon != '') {
            $original_price = $request->price;
            $store          = Store::where('id', $request->store_id)->first();
            $cart           = session()->get($store->slug);

            $coupons = ProductCoupon::where('code', strtoupper($request->coupon))->first();

            if (!empty($coupons)) {
                $usedCoupun = $coupons->product_coupon();

                if ($coupons->limit == $usedCoupun) {
                    return response()->json(
                        [
                            'is_success' => false,
                            'final_price' => $original_price,
                            'price' => number_format($request->price, Utility::getValByName('decimal_number')),
                            'message' => __('This coupon code has expired!'),
                        ]
                    );
                } else {
                    $requestprice = preg_replace('/[^0-9,"."]/', '', $request->price);
                    if ($coupons->enable_flat == 'on') {
                        $discount_value = $coupons->flat_discount;
                    } else {
                        $discount_value = ($requestprice / 100) * $coupons->discount;
                    }

                    $plan_price = $requestprice - $discount_value;

                    if ($plan_price < 0) {
                        return response()->json(
                            [
                                'is_success' => false,
                                'final_price' => $original_price,
                                'price' => number_format($request->price),
                                'message' => __('This coupon is in valid!'),
                            ]
                        );
                    }
                    if (!empty($request->shipping_price) && $request->shipping_price != '0.00') {
                        $price = self::formatPrice($requestprice - $discount_value + preg_replace('/[^0-9,"."]/', '', $request->shipping_price), $request->store_id);
                    } else {
                        $price = self::formatPrice($requestprice - $discount_value, $request->store_id);
                    }
                    $discount_value = '-' . self::formatPrice($discount_value, $request->store_id);

                    $cart['coupon'] = [
                        'coupon' => $coupons,
                        'discount_price' => $discount_value,
                        'final_price' => $price,
                        'data_id' => $coupons->id,
                    ];
                    session()->put($store->slug, $cart);

                    return response()->json(
                        [
                            'is_success' => true,
                            'discount_price' => $discount_value,
                            'final_price' => $price,
                            'data_id' => $coupons->id,
                            'price' => number_format($plan_price, Utility::getValByName('decimal_number')),
                            'message' => __('Coupon code has applied successfully!'),
                        ]
                    );
                }
            } else {
                return response()->json(
                    [
                        'is_success' => false,
                        'final_price' => $original_price,
                        'price' => $request->price,
                        Utility::getValByName('decimal_number'),
                        'message' => __('This coupon code is invalid or has expired!'),
                    ]
                );
            }
        } else {
            return response()->json(
                [
                    'is_success' => false,
                    'message' => __('Your cart is empty!'),
                ]
            );
        }
    }

    public function formatPrice($price, $store_id)
    {
        $store = Store::where('id', $store_id)->first();

        return $store->currency . number_format((float)$price, 2, '.', '');
    }
}
