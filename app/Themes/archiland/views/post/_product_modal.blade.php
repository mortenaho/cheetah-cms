<?php
$post_meta = collect($product->post_meta);
$price = $post_meta->firstWhere("meta_key", "price")->meta_value;
$discount = $post_meta->firstWhere("meta_key", "discount")->meta_value;
?>

<!-- Quick View Popup -->
<div class="tm-quickview-popup modal fade" id="tm-product-quickview" role="dialog" aria-hidden="true">
    <form role="form" name="frm_visit" id="frm_visit" method="post">
        {{csrf_field()}}
        <input type="hidden" name="post_id" id="post_id" value="{{$post->id}}">
        <input type="hidden" name="post_type" id="post_type" value="{{$post->post_type}}">
        <input type="hidden" name="category_id"  id="category_id" value="{{$post->category_id}}">
    </form>
    <div class="container">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="row justify-content-center">
                    <div class="col-xl-10 col-lg-12">
                        <div class="tm-prodetails">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <i class="fa fa-times"></i>
                            </button>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">

                                    <!-- Product Details Images -->
                                    <div class="tm-prodetails-images">
                                        <div class="tm-prodetails-largeimages">
                                            <div class="tm-prodetails-largeimage">
                                                <img src="{{$product->thumb}}"
                                                     alt="{{$product->title}}">
                                            </div>

                                        </div>
                                    </div>
                                    <!--// Product Details Images -->

                                </div>

                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="tm-prodetails-content">
                                        <h3 class="tm-prodetails-title"><a class="modal-link"
                                                                           href="/{{$locale}}{{$product->link_address}}">{{$product->title}}</a>
                                        </h3>

                                        <div class="tm-prodetails-price">
                                            <span>
                                              @isset($discount)
                                                    <del id="modal-discount">{{$discount}} تومان </del>
                                                @endisset
                                                @isset($price)
                                                    <span id="modal-price">{{$price}} تومان</span>
                                                @endisset
                                            </span>
                                        </div>
                                        <p id="modal-description">{{$product->excerpt}}</p>

                                        @isset($product->category)
                                            <div class="tm-prodetails-categories">
                                                <h6>دسته بندی :</h6>
                                                <ul id="modal-category">
                                                    <li>
                                                        <a href="/category/{{$product->category->id}}/{{$product->category->url_slug}}">{{$product->category->title}}</a>
                                                    </li>

                                                </ul>
                                            </div>
                                        @endisset

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
<!--// Quick View Popup -->
@push("script")
    <!-- Js Files -->
    <script src="{{theme_assets("assets/js/modernizr-3.6.0.min.js")}}"></script>
    <script src="{{theme_assets("assets/plugin/loaders/pace.min.js")}}"></script>
    <script src="{{theme_assets("assets/js/jquery.min.js")}}"></script>
    <script src="{{theme_assets("assets/js/popper.min.js")}}"></script>
    <script src="{{theme_assets("assets/js/bootstrap.min.js")}}"></script>
    <script src="{{theme_assets("assets/js/plugins.js")}}"></script>
    <script src="{{theme_assets("assets/js/chart.min.js")}}"></script>
    <script src="{{theme_assets("assets/js/chart-active.js")}}"></script>
    <script src="{{theme_assets("assets/js/main.js")}}"></script>
    <script src="{{theme_assets("assets/plugin/loaders/blockui.min.js")}}"></script>
    <script src="/js/visits.js"></script>
@endpush
