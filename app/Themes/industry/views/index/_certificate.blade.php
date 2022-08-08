<?php
$certificates =post_get::query([["post_type","=","certificate"],["status","=","1"],["featured","=","1"]]);
?>


@if(isset($certificates) && count($certificates)>0)
<!-- certificates -->
<section class="team-section" style="background-image:url({{theme_assets("assets/images/background/4.jpg")}})">
    <div class="auto-container">
        <!--Sec Title-->
        <div class="sec-title light centered">
            <h4>{{trans('home.certificates')}}</h4>
            <div class="separater"></div>
        </div>
        <?php
        $col_size = 3;
        $certificates_count = count($certificates);
        if ($certificates_count % 3 == 0) {
            $col_size = 4;
        }
        ?>
        <div class="row clearfix">

            @isset($certificates)
                @foreach($certificates as $item)
                <div class="team-block col-lg-{{$col_size}} col-md-6 col-sm-12">
                        <div class="inner-box">
                            <div class="image">
                                <img src="{{$item->thumb}}" alt="{{$item->title}}"/>
                                <ul class="social-icon-one">
                                    <li><a href="#"><span class="fa fa-facebook"></span></a></li>
                                    <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                                    <li><a href="#"><span class="fa fa-dribbble"></span></a></li>
                                    <li><a href="#"><span class="fa fa-pinterest-p"></span></a></li>
                                </ul>
                            </div>
                            <div class="lower-box">
                                <h3><a href="/{{$locale}}{{$item->link_address}}">{{$item->title}}</a></h3>
                                <div class="designation">{{$item->excerpt}}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif


        </div>

    </div>
</section>
<!-- certificates -->
@endif
