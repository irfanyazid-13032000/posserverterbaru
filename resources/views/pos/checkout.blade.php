<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Grocee - Checkout</title>
  <meta name="description" content="Morden Bootstrap HTML5 Template">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/grocee')}}/img/favicon.ico">
    
   <!-- ======= All CSS Plugins here ======== -->
  <link rel="stylesheet" href="{{asset('assets/grocee')}}/css/plugins/swiper-bundle.min.css">
  <link rel="stylesheet" href="{{asset('assets/grocee')}}/css/plugins/glightbox.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Lora:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Plugin css -->
  <link rel="stylesheet" href="{{asset('assets/grocee')}}/css/vendor/bootstrap.min.css">

  <!-- Custom Style CSS -->
  <link rel="stylesheet" href="{{asset('assets/grocee')}}/css/style.css">

</head>

<body>

    <!-- Start preloader -->
    <div id="preloader">
        <div id="ctn-preloader" class="ctn-preloader">
            <div class="animation-preloader">
                <div class="spinner"></div>
                <div class="txt-loading">
                    <span data-text-preloader="L" class="letters-loading">
                        L
                    </span>
                    
                    <span data-text-preloader="O" class="letters-loading">
                        O
                    </span>
                    
                    <span data-text-preloader="A" class="letters-loading">
                        A
                    </span>
                    
                    <span data-text-preloader="D" class="letters-loading">
                        D
                    </span>
                    
                    <span data-text-preloader="I" class="letters-loading">
                        I
                    </span>
                    
                    <span data-text-preloader="N" class="letters-loading">
                        N
                    </span>
                    
                    <span data-text-preloader="G" class="letters-loading">
                        G
                    </span>
                </div>
            </div>	

            <div class="loader-section section-left"></div>
            <div class="loader-section section-right"></div>
        </div>
    </div>
    <!-- End preloader -->
        
    <!-- Start checkout page area -->
    <div class="checkout__page--area">
        <div class="container">
            <div class="checkout__page--inner d-flex">
                <div class="main checkout__mian">
                    <header class="main__header checkout__mian--header mb-30">
                        <a class="logo logo__left mb-20" href="index.html"><img src="{{asset('assets/grocee')}}/img/logo/nav-log.png" alt="logo"></a>
                        <details class="order__summary--mobile__version">
                            <summary class="order__summary--toggle border-radius-5">
                                <span class="order__summary--toggle__inner">
                                    <span class="order__summary--toggle__icon">
                                        <svg width="20" height="19" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M17.178 13.088H5.453c-.454 0-.91-.364-.91-.818L3.727 1.818H0V0h4.544c.455 0 .91.364.91.818l.09 1.272h13.45c.274 0 .547.09.73.364.18.182.27.454.18.727l-1.817 9.18c-.09.455-.455.728-.91.728zM6.27 11.27h10.09l1.454-7.362H5.634l.637 7.362zm.092 7.715c1.004 0 1.818-.813 1.818-1.817s-.814-1.818-1.818-1.818-1.818.814-1.818 1.818.814 1.817 1.818 1.817zm9.18 0c1.004 0 1.817-.813 1.817-1.817s-.814-1.818-1.818-1.818-1.818.814-1.818 1.818.814 1.817 1.818 1.817z" fill="currentColor"></path>
                                        </svg>
                                    </span>
                                    <span class="order__summary--toggle__text show">
                                        <span>Show order summary</span>
                                        <svg width="11" height="6" xmlns="http://www.w3.org/2000/svg" class="order-summary-toggle__dropdown" fill="currentColor"><path d="M.504 1.813l4.358 3.845.496.438.496-.438 4.642-4.096L9.504.438 4.862 4.534h.992L1.496.69.504 1.812z"></path></svg>
                                    </span>
                                    <span class="order__summary--final__price">Rp. {{number_format($total_cart_price)}}</span>
                                </span>
                            </summary>
                            <div class="order__summary--section">
                                <div class="cart__table checkout__product--table">
                                    <table class="summary__table">
                                        <tbody class="summary__table--body">
                                           
                                            @foreach ($carts as $cart )
                                            <tr class=" summary__table--items">
                                                <td class=" summary__table--list">
                                                    <div class="cart__product d-flex align-items-center">
                                                        <div class="product__thumbnail border-radius-5">
                                                            <a href="product-details.html"><img class="border-radius-5" src="{{asset('assets/grocee')}}/img/product/small-product4.png" alt="cart-product"></a>
                                                            <span class="product__thumbnail--quantity">1</span>
                                                        </div>
                                                        <div class="product__description">
                                                            <h3 class="product__description--name h4"><a href="product-details.html">{{$cart->name_product}}</a></h3>
                                                            <span class="product__description--variant">COLOR: White</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class=" summary__table--list">
                                                    <span class="cart__price">Rp. {{number_format($cart->price)}}</span>
                                                </td>
                                            </tr>
                                                
                                            @endforeach


                                        </tbody>
                                    </table> 
                                </div>
                                <div class="checkout__discount--code">
                                    
                                </div>
                                <div class="checkout__total">
                                    <table class="checkout__total--table">
                                        <tfoot class="checkout__total--footer">
                                            <tr class="checkout__total--footer__items">
                                                <td class="checkout__total--footer__title checkout__total--footer__list text-left">Total </td>
                                                <td class="checkout__total--footer__amount checkout__total--footer__list text-right">Rp. {{number_format($total_cart_price)}}</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </details>
                        
                    </header>
                    <main class="main__content_wrapper">
                        <form action="{{route('create.receipt')}}" method="POST">
                          @csrf
                            
                            <div class="checkout__content--step section__shipping--address">
                                <div class="section__header mb-25">
                                    <h2 class="section__header--title h3">Payment</h2>
                                    <p class="section__header--desc">All transactions are secure and encrypted.</p>
                                </div>
                                <div class="checkout__content--step__inner3 border-radius-5">
                                    <div class="checkout__address--content__header d-flex align-items-center justify-content-between">
                                        <span class="checkout__address--content__title">Payment data</span>
                                        <span class="heckout__address--content__icon"><img src="{{asset('assets/grocee')}}/img/icon/credit-card.svg" alt="card"></span>
                                    </div>
                                    <div class="checkout__content--input__box--wrapper ">
                                        <div class="row">
                                            <div class="col-12 mb-12">
                                                <div class="checkout__input--list position__relative">
                                                    <label>
                                                        <input class="checkout__input--field border-radius-5" placeholder="Name Customer"  type="text" name="customer_name">
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-12 mb-12">
                                                <div class="checkout__input--list position__relative">
                                                    <label>
                                                        <input class="checkout__input--field border-radius-5" placeholder="Email Customer"  type="email" name="email_customer">
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-12 mb-12">
                                                <div class="checkout__input--list position__relative">
                                                    <label>
                                                        <input class="checkout__input--field border-radius-5" placeholder="WhatsApp Number"  type="text" name="no_wa">
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-12 mb-12">
                                                <div class="checkout__input--list position__relative">
                                                    <label>
                                                        <input class="checkout__input--field border-radius-5" placeholder="uang customer" onkeyup="struk(this.value)" type="number" name="customer_money">
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-12 mb-12">
                                            <div class="checkout__input--list checkout__input--select select">
                                                    <label class="checkout__select--label">Payment</label>
                                                    <select class="checkout__input--select__field border-radius-5" id="country" name="payment_method">
                                                        <option value="tunai">Tunai</option>
                                                        <option value="qris">Qris</option>
                                                    </select>
                                                </div>
                                            </div>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                            <div class="checkout__content--step__footer d-flex align-items-center">
                                <button class="continue__shipping--btn btn border-radius-5" type="submit">Pay now</button>
                            </div>
                       
                    </main>
                </div>
                <aside class="checkout__sidebar sidebar">
                    <div class="cart__table checkout__product--table">
                        <table class="cart__table--inner">
                            <tbody class="cart__table--body">
                             
                                @foreach ($carts as $index => $cart)
                                <input type="hidden" name="cart[{{ $index }}][product_id]" value="{{ $cart->product_id }}">
                                <input type="hidden" name="cart[{{ $index }}][price]" value="{{ $cart->price }}">
                                <input type="hidden" name="cart[{{ $index }}][qty]" value="{{ $cart->qty }}">
                                <input type="hidden" name="cart[{{ $index }}][total_price]" value="{{ $cart->total_price }}">
  
                                <tr class="cart__table--body__items">
                                    <td class="cart__table--body__list">
                                        <div class="product__image two  d-flex align-items-center">
                                            <div class="product__thumbnail border-radius-5">
                                                <a href="product-details.html"><img class="border-radius-5" src="{{asset('storage/product_images')}}/{{$cart->image}}" alt="cart-product"></a>
                                                <span class="product__thumbnail--quantity">{{$cart->qty}}</span>
                                            </div>
                                            <div class="product__description">
                                                <h3 class="product__description--name h4"><a href="product-details.html">{{$cart->name_product}}</a></h3>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="cart__table--body__list">
                                        <span class="cart__price">Rp. {{number_format($cart->total_price)}}</span>
                                    </td>
                                </tr>
                                @endforeach
                                <input type="hidden" name="total_cart_price" value="{{$total_cart_price}}" id="total_cart_price">
                                <input type="hidden" value="" name="customer_money" id="customer_money">
                                <input type="hidden" value="" name="change_cashier" id="change_cashier">

                              </form>
                              
                            </tbody>
                        </table> 
                    </div>
                    
                    <div class="checkout__total">
                        <div id="struk"></div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
    <!-- End checkout page area -->

    <!-- Scroll top bar -->
    <button id="scroll__top"><svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M112 244l144-144 144 144M256 120v292"/></svg></button>

  <!-- All Script JS Plugins here  -->
   <script src="{{asset('assets/grocee')}}/js/vendor/popper.js" defer="defer"></script>
   <script src="{{asset('assets/grocee')}}/js/vendor/bootstrap.min.js" defer="defer"></script>
   <script src="{{asset('assets/grocee')}}/js/plugins/swiper-bundle.min.js"></script>
   <script src="{{asset('assets/grocee')}}/js/plugins/glightbox.min.js"></script>
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

   <!-- Customscript js -->
   <script src="{{asset('assets/grocee')}}/js/script.js"></script>

   <script>

    function struk(params = 0) {
        var csrfToken = $('meta[name="csrf-token"]').attr('content'); // Ambil token CSRF dari meta tag
        $.ajax({
                type: 'POST',
                url: '{{ route("pos.struk") }}', // Ganti dengan URL yang sesuai
                data: { 
                    _token: csrfToken,
                    uang_customer: params, 
                },
                success: function(response) {
                    // console.log(response)
                    // Berhasil menerima tanggapan dari server
                    $('#struk').html(response); // Anda bisa menampilkan respons di dalam elemen dengan ID 'response'
                    $('#customer_money').val(params); // Anda bisa menampilkan respons di dalam elemen dengan ID 'response'
                    $('#change_cashier').val(params - $('#total_cart_price').val()); // Anda bisa menampilkan respons di dalam elemen dengan ID 'response'


                },
                error: function(xhr, status, error) {
                    console.error(error); // Menampilkan error jika ada masalah dengan permintaan AJAX
                }
            });
    }

    struk()

   </script>

   

   

  
</body>
</html>