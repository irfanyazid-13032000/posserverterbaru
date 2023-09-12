<form action="{{route('cart.checkout')}}" method="post">
                @foreach ($carts as $index=> $cart)
                @csrf

                    <input type="hidden" name="cart[{{ $index }}][product_id]" value="{{ $cart->product_id }}">
                    <input type="hidden" name="cart[{{ $index }}][price]" value="{{ $cart->price }}">
                    <input type="hidden" name="cart[{{ $index }}][qty]" value="{{ $cart->qty }}">
                    <input type="hidden" name="cart[{{ $index }}][total_price]" value="{{ $cart->total_price }}">

<div class="minicart__product--items d-flex">
                    <div class="minicart__thumb">
                        <a href="product-details.html"><img src="{{asset('storage/product_images')}}/{{$cart->image}}" alt="product-img"></a>
                    </div>
                    <div class="minicart__text">
                        <h4 class="minicart__subtitle"><a href="product-details.html">{{$cart->name_product}}</a></h4>
                        <div class="minicart__price">
                            <span class="current__price">Rp. {{number_format($cart->price)}}</span>
                        </div>
                        <div class="minicart__text--footer d-flex align-items-center">
                            <div class="quantity__box minicart__quantity">
                                <span onclick="decrease({{$cart->id}})" type="button" class="quantity__value decrease" aria-label="quantity value" value="Decrease Value">-</span>
                                <label>
                                    <input type="number" class="quantity__number" value="{{$cart->qty}}" />
                                </label>
                                <span onclick="increase({{$cart->id}})" type="button" class="quantity__value increase" aria-label="quantity value" value="Increase Value">+</span>
                            </div>
                            <!-- <a class="minicart__product--remove" href="{/{route('cart.remove',['id'=>$cart->id])}}" type="button">Remove</a> -->
                            <span class="minicart__product--remove" onclick="remove({{$cart->id}})">remove</span>

                            
                        </div>
                        <h4 class="minicart__subtitle">total price</h4>
                        <span class="current__price">Rp. {{number_format($cart->total_price)}}</span>
                    </div>
                </div>

                @if ($cart->qty <= 0)
                <script>
                  remove({{$cart->id}})
                </script>
                @endif
    


@endforeach
                
           
                


</div>
    
<div id="total_amount"></div>
    
               
                
    <div class="minicart__button d-flex justify-content-center">
      <button class="btn minicart__button--link" type="submit">Submit</button>
  </form>