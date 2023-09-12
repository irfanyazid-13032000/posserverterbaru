<div class="row row-cols-lg-4 row-cols-md-3 row-cols-2 mb--n28">
                            @foreach ($products as $product)
                                    
                                    <div class="col mb-28">
                                        <div class="product__items product__items2">
                                            <div class="product__items--thumbnail">
                                                <span class="product__items--link" onclick="insertCart({{$product->id}})">
                                                    <img class="product__items--img product__primary--img" src="{{asset('public/product_images')}}/{{$product->image}}" alt="product-img">
                                                </span>
                                            </div>
                                            <div class="product__items--content product__items2--content text-center">
                                                <a class="add__to--cart__btn" href="cart.html">+ Add to cart</a>
                                                <h3 class="product__items--content__title h4"><a href="product-details.html">{{$product->name_product}}</a></h3>
                                                <div class="product__items--price">
                                                    <span class="current__price">Rp. {{number_format($product->price)}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
    
                              @endforeach
</div>