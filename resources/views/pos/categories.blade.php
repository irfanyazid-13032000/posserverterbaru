<ul class="product__tab--one product__tab--btn d-flex justify-content-center mb-35">
                        <li class="product__tab--btn__list" data-toggle="tab" onclick="changeCategory(0)">All</li>
                        @foreach ($categories as $category)
                        <li class="product__tab--btn__list" data-toggle="tab" onclick="changeCategory({{$category->id}})">{{$category->name_category}}</li>
                        @endforeach
                    </ul>