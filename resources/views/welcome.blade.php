<x-layout>
    <x-header></x-header>
<div class="slider-area">
    <div class="slider-active owl-carousel nav-style-1 owl-dot-none">
        <div class="single-slider slider-height-1 bg-purple">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-12 col-sm-6">
                        <div class="slider-content slider-animated-1">
                            <h3 class="animated">BANNER TITLE HERE</h3>
                            <h1 class="animated">QUOTES HERE</h1>
                            <div class="slider-btn btn-hover">
                                <a class="animated" href="#shop">SHOP NOW</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-12 col-sm-6">
                        <div class="slider-single-img slider-animated-1">
                            <img class="animated" src="assets/img/slider/single-slide-1.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="product-area pb-60 mt-4" id="shop">
    <div class="container">
        <div class="section-title text-center">
            <h2>Shop Now!</h2>
        </div>
        <div class="product-tab-list nav pt-30 pb-55 text-center">
            <a href="#product-1" data-bs-toggle="tab" >
                <h4>Non-Foods</h4>
            </a>
            <a href="#product-2" data-bs-toggle="tab">
                <h4>Foods</h4>
            </a>
        </div>
        <div class="tab-content jump">
            <div class="tab-pane active" id="product-1">
                <div class="row">
                    @foreach (\App\Models\Product::whereUserId(1)->whereCategory('NON-FOOD')->get() as $item)
                    <div class="col-xl-3 col-md-6 col-lg-4 col-sm-6">
                        <div class="product-wrap mb-25">
                            <div class="product-img">
                                <a href="{{route('products.show', ['product' => $item->id])}}">
                                    <img src="/storage/{{$item->image}}" alt="" class="default-img">
                                </a>
                                <div class="product-action">
                                    <div class="pro-same-action pro-wishlist">
                                        <a title="Wishlist" href="wishlist.html"><i class="pe-7s-like"></i></a>
                                    </div>
                                    <div class="pro-same-action pro-cart">
                                        <form id="form{{$item->id}}" method="POST" action="{{route('products.store', ['product' => $item->id])}}">
                                            @csrf
                                            <input type="hidden" name="quantity" value="1">
                                            <a title="Add To Cart" href="#" onclick="document.getElementById('form{{$item->id}}').submit()"><i class="pe-7s-cart"></i> Add to cart</a>
                                        </form>
                                    </div>
                                    <div class="pro-same-action pro-quickview">
                                        <a title="Quick View" href="{{route('products.show', ['product' => $item->id])}}"  ><i class="pe-7s-look"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content text-center">
                                <h3><a href="{{route('products.show', ['product' => $item->id])}}">{{$item->name}}</a></h3>
                                {{-- <div class="product-rating">
                                    <i class="fa fa-star-o yellow"></i>
                                    <i class="fa fa-star-o yellow"></i>
                                    <i class="fa fa-star-o yellow"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                </div> --}}
                                <div class="product-price">
                                    <span>PHP {{number_format($item->selling_price, 2)}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="tab-pane" id="product-2">
                <div class="row">
                    @foreach (\App\Models\Product::whereUserId(1)->whereCategory('FOOD')->get() as $item)
                    <div class="col-xl-3 col-md-6 col-lg-4 col-sm-6">
                        <div class="product-wrap mb-25">
                            <div class="product-img">
                                <a href="{{route('products.show', ['product' => $item->id])}}">
                                    <img src="/storage/{{$item->image}}" alt="" class="default-img">
                                </a>
                                <div class="product-action">
                                    <div class="pro-same-action pro-wishlist">
                                        <a title="Wishlist" href="/add-to-wishlist/{{$item->id}}"><i class="pe-7s-like"></i></a>
                                    </div>
                                    <div class="pro-same-action pro-cart">
                                        <form id="form{{$item->id}}" method="POST" action="{{route('products.store', ['product' => $item->id])}}">
                                            @csrf
                                            <input type="hidden" name="quantity" value="1">
                                            <a title="Add To Cart" href="#" onclick="document.getElementById('form{{$item->id}}').submit()"><i class="pe-7s-cart"></i> Add to cart</a>
                                        </form>
                                    </div>
                                    <div class="pro-same-action pro-quickview">
                                        <a title="Quick View" href="{{route('products.show', ['product' => $item->id])}}"  ><i class="pe-7s-look"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content text-center">
                                <h3><a href="{{route('products.show', ['product' => $item->id])}}">{{$item->name}}</a></h3>
                                {{-- <div class="product-rating">
                                    <i class="fa fa-star-o yellow"></i>
                                    <i class="fa fa-star-o yellow"></i>
                                    <i class="fa fa-star-o yellow"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                </div> --}}
                                <div class="product-price">
                                    <span>PHP {{number_format($item->selling_price, 2)}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
</div>
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3802.4591578646027!2d121.7335478!3d17.6283992!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33858596fccfe901%3A0xa0edd8b477a58a5!2sCriselda&#39;s%20Restaurant!5e0!3m2!1sen!2sph!4v1674225144769!5m2!1sen!2sph" style="width:100vw;" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
<x-footer></x-footer>

</x-layout>
