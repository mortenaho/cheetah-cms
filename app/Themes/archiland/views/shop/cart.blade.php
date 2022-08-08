@extends("home::shared.layout",
["title"=>"فروشگاه"
])

@section("breadcrumb")
    {{--{{$site->header_banner}}--}}
    <section id="subheader" data-speed="8" data-type="background">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>سبد خرید</h1>
                    <ul class="crumb">
                        <li><a href="/">صفحه اصلی</a></li>
                        <li class="sep">/</li>
                        <li><a href="/{{$locale}}/shop/">فروشگاه</a></li>
                        <li class="sep">/</li>
                        <li>سبد خرید</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- INNER PAGE BANNER END -->
@endsection
@section("body")

    <!-- content begin -->
    <div id="content">
        <div class="container">
            <div class="row">
                {{csrf_field()}}
                <div class="col-md-9">
                    <table id="shop_form" class="table table-dark table-cart">
                        <thead>
                        <tr>
                            <th scope="col">محصول</th>
                            <th scope="col">تعداد</th>
                            <th scope="col">قیمت نهایی</th>
                            <th scope="col">حذف</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $total_price = 0;
                        @endphp

                        @if(isset($cart) && count($cart)>0)
                            @foreach($cart as $item)
                                <tr id="row_{{$item["id"]}}">
                                    <td>
                                        <div class="d-cart-item">
                                            <img src="{{$item["product_photo"]}}" alt="">
                                            <div class="text">
                                                {{$item["product_name"]}}
                                                <div class="price">${{number_format($item["product_price"])}}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="f-input-number-increment"
                                              onclick="updateCart({{$item["id"]}},1)">+</span>
                                        <input id="qty_{{$item["id"]}}" class="f-input-number" type="text"
                                               value="{{$item["qty"]}}" min="0" max="10"/>
                                        <span class="f-input-number-decrement" onclick="updateCart({{$item["id"]}},-1)">–</span>
                                    </td>
                                    <td>$ <span id="item_total_price_{{$item["id"]}}"
                                                class="price">{{number_format($item["product_price"] * $item["qty"])}}</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-danger" title="Remove Item"
                                                onclick="removeFromCart({{$item["id"]}})"><i class="fa fa-remove"></i>
                                        </button>
                                    </td>
                                </tr>
                                @php
                                    $total_price += ($item["product_price"] * $item["qty"])
                                @endphp

                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>

                <div id="sidebar" class="col-md-3">
                    <div id="checkout_box" class="d-summary">
                        <h3>جمع کل</h3>
                        {{--                        <div class="de-flex">--}}
                        {{--                            <div>Subtotal</div>--}}
                        {{--                            <div class="strong">$950</div>--}}
                        {{--                        </div>--}}
                        {{--                        <div class="de-flex">--}}
                        {{--                            <div>Shipping est</div>--}}
                        {{--                            <div class="strong">$150</div>--}}
                        {{--                        </div>--}}
                        @if (Auth::check())

                            <a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle"
                               data-toggle="dropdown">
                                <img src="{{auth()->user()->avatar}}" class="rounded-circle mr-2" height="34"
                                     alt="">
                                <span>{{auth()->user()->full_name}} </span>
                            </a>
                            <a href="/home/logout" class="dropdown-item"><i class="icon-switch2"></i> خروج
                            </a>

                        @else
                        <a href="/fa/login" class="dropdown-item"><i class="icon-switch2"></i> ورود به سیستم
                            </a>
                        @endif
                        <div class="spacer-line"></div>

                        <form class="row"
                              id="form_coupon" method="post" name="form_coupon">
                            <div class="col text-center">
                                <input class="form-control" id="discount" name="discount" placeholder="کد تخفیف"
                                       type="text"/> <a style="cursor: pointer;" id="btn-submit"><i
                                        class="fa fa-long-arrow-right"></i></a>
                                <div class="clearfix"></div>
                            </div>
                        </form>

                        <div class="spacer-line"></div>

                        <div class="de-flex">
                            <div>قیمت کل</div>
                            <div class="strong">$ <span id="total_price">{{number_format($total_price)}}</span></div>
                        </div>

                        <div class="spacer-line"></div>

                        <a class="btn-custom rounded btn-fullwidth text-center" style="cursor: pointer;"
                           onclick="checkOut();">پرداخت</a>
                    </div>
                </div>

            </div>
        </div>
    </div>


@endsection

@push("script")
    <script src="{{theme_assets("assets/script/products.js")}}"></script>
    <script src="{{theme_assets("assets/script/shop.js")}}"></script>
@endpush
