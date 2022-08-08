<?php
//$services =post_get::query([["post_type","=","service"],["status","=","1"],["featured","=","1"]]);
$services = get_post("service", [["featured", 1],["status", 1]], 3, ["post_meta"]);
?>

@if(isset($services) && count($services)>0)

<!-- WHAT WE DO SECTION START -->
<div class="section-full p-t80 p-b50 bg-white">
    <div class="container">
        <!-- TITLE START -->
        <div class="section-head text-center">
            <div class="wt-separator-outer separator-center">
                <div class="wt-separator">
                  <span class="text-primary text-uppercase sep-line-one"
                  >خدمات ما</span
                  >
                </div>
            </div>
{{--            <h3>ما چه می کنیم </h3>--}}
        </div>
        <!-- TITLE END -->
        <?php
        $col_size = 3;
        $service_count = count($services);
        if ($service_count % 3 == 0) {
            $col_size = 4;
        }
        ?>
        <div class="section-content">
            <div class="row">

                @foreach($services as $item)
                <div class="col-md-{{$col_size}} col-sm-6 col-xs-6 col-xs-100pc m-b30">
                    <div class="hover-box-effect v-icon-effect">
                        <div
                            class="wt-icon-box-wraper center p-lr30 p-b50 p-t50 bg-gray"
                        >
{{--                            <div class="icon-lg text-primary m-b25">--}}
{{--                        <span class="icon-cell text-primary"--}}
{{--                        ><i class="v-icon flaticon-sketch"></i--}}
{{--                            ></span>--}}
{{--         --}}
{{--                            </div>--}}
                            <img src="{{$item->thumb}}" alt="{{$item->title}}" width="400" height="273" />
                            <div class="icon-content text-black p-t15">
                                <h4 class="wt-tilte m-b25">{{$item->title}}</h4>
                                <p>
                                    {{$item->excerpt}}
                                </p>
                                <a  href="/{{$locale}}{{$item->link_address}}"
                                    class="site-button-link"
                                    data-hover="بیشتر">بیشتر</a
                                >
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</div>
<!-- WHAT WE DO  SECTION END -->
@endif
