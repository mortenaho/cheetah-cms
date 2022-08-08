<?php
$post_meta = collect($post->post_meta);
$template = $post_meta->firstWhere("meta_key", "template")->meta_value;
$page_content = $post_meta->firstWhere("meta_key", "page_content")->meta_value;
?>

@section("breadcrumb")
<!--Page Title-->
<section class="page-title" style="background-image:url({{$site->header_banner}})">
    <div class="auto-container">
        <h1>{{$post->title}}</h1>
        <ul class="page-breadcrumb">
            <li><a href="/{{$locale}}/">خانه</a></li>
            <li>{{$post->title}}</li>
        </ul>
    </div>
</section>
<!--End Page Title-->
@endsection

@section("body")
 <!--Sidebar Page Container-->
<div class="sidebar-page-container">
    <div class="auto-container">
        <div class="row clearfix">

            <!--Sidebar Side-->
            <div class="sidebar-side col-lg-4 col-md-4 col-sm-12">
                <aside class="sidebar">

                    <!--Blog Category Widget-->
                    <div class="sidebar-widget sidebar-blog-category">
                        @isset($page_content)
                            <span > {{$page_content }} </span>
                        @endisset
                    </div>

                    <!--Brochure-->
                    <div class="sidebar-widget brochure-widget">
                        @if(isset($post->attachments) && $post->attachments->count()>0)
                            @foreach($post->attachments as $item)
                                <div class="brochure-box">
                                    <div class="inner">
                                        <span class="icon fa fa-file-pdf-o"></span>
                                        <div class="text">{{$item->title}}</div>
                                    </div>
                                    <a href="{{$item->file}}" class="overlay-link"></a>
                                </div>
                            @endforeach
                        @endif
                        <div class="brochure-box">
                            <div class="inner">
                                <span class="icon fa fa-file-pdf-o"></span>
                                <div class="text">Download Brochures</div>
                            </div>
                            <a href="#" class="overlay-link"></a>
                        </div>

                        <div class="brochure-box">
                            <div class="inner">
                                <span class="icon fa fa-file-powerpoint-o"></span>
                                <div class="text">Company Presentation</div>
                            </div>
                            <a href="#" class="overlay-link"></a>
                        </div>

                    </div>


                </aside>
            </div>

            <!--Content Side-->
            <div class="content-side col-lg-8 col-md-8 col-sm-12">
                <div class="services-single">
                    <div class="inner-box">
                        <div class="image">
                            <img src="{{$post->thumb}}" alt="{{$post->title}}" />
                            <div class="icon-box">
                                <span class="icon flaticon-settings-gears"></span>
                            </div>
                        </div>
                        <div class="lower-content">
                            <h2>{{$post->title}}</h2>
                            <div class="text">
                                <p>{{$post->excerpt}}</p>
                                <p>{!! $post->content !!}</p>

                            </div>
                        </div>

                        <!--Accordian Box-->
                        <ul class="accordion-box style-two">

                            <!--Block-->
                            <li class="accordion block active-block">
                                <div class="acc-btn active"><div class="icon-outer"><span class="icon icon-plus fa fa-plus-circle"></span> <span class="icon icon-minus fa fa-minus-circle"></span></div>Micro electro-mechanical systems</div>
                                <div class="acc-content current">
                                    <div class="content">
                                        <div class="text">Micron-scale mechanical components such as springs, gears, fluidic and heat transfer devices are fabricated from variety of substrate materials such as silicon, glass and polymers like SU8. Examples of MEMS components are the accelerometers that are used as car airbag sensors, modern cell phones, gyroscopes for precise positioning and microfluidic devices used in biomedical applications.</div>
                                    </div>
                                </div>
                            </li>

                            <!--Block-->
                            <li class="accordion block">
                                <div class="acc-btn"><div class="icon-outer"><span class="icon icon-plus fa fa-plus-circle"></span> <span class="icon icon-minus fa fa-minus-circle"></span></div>Friction stir welding</div>
                                <div class="acc-content">
                                    <div class="content">
                                        <div class="text">Micron-scale mechanical components such as springs, gears, fluidic and heat transfer devices are fabricated from variety of substrate materials such as silicon, glass and polymers like SU8. Examples of MEMS components are the accelerometers that are used as car airbag sensors, modern cell phones, gyroscopes for precise positioning and microfluidic devices used in biomedical applications.</div>
                                    </div>
                                </div>
                            </li>

                            <!--Block-->
                            <li class="accordion block">
                                <div class="acc-btn"><div class="icon-outer"><span class="icon icon-plus fa fa-plus-circle"></span> <span class="icon icon-minus fa fa-minus-circle"></span></div>Composites</div>
                                <div class="acc-content">
                                    <div class="content">
                                        <div class="text">Micron-scale mechanical components such as springs, gears, fluidic and heat transfer devices are fabricated from variety of substrate materials such as silicon, glass and polymers like SU8. Examples of MEMS components are the accelerometers that are used as car airbag sensors, modern cell phones, gyroscopes for precise positioning and microfluidic devices used in biomedical applications.</div>
                                    </div>
                                </div>
                            </li>


                        </ul>
                        <!--End Accordian Box-->

                        <!--Services Info Tabs-->
                        <div class="services-info-tabs">
                            <!--Services Tabs-->
                            <div class="services-tabs tabs-box">

                                <!--Tab Btns-->
                                <ul class="tab-btns tab-buttons clearfix">
                                    <li data-tab="#prod-details" class="tab-btn active-btn">Precautions</li>
                                    <li data-tab="#prod-spec" class="tab-btn">Intelligence</li>
                                    <li data-tab="#prod-reviews" class="tab-btn">Specializations</li>
                                </ul>

                                <!--Tabs Container-->
                                <div class="tabs-content">

                                    <!--Tab / Active Tab-->
                                    <div class="tab active-tab" id="prod-details">
                                        <div class="content">
                                            <p>Processing and refining operatons turn crude oil and gas into marktable products. In the case of crude oil, these products include heating oil, gasoline for use in vehicles, jet fuel, and diesel oil. Oil refining processes include dis-catalytic cracking, alkylation, isomerization and hydrotreating.</p>
                                            <p>Again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but seds because occasionally circumstances occur in which toil and pain can procure him some great pleasure.</p>
                                        </div>
                                    </div>

                                    <!--Tab-->
                                    <div class="tab" id="prod-spec">
                                        <div class="content">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                        </div>
                                    </div>

                                    <!--Tab-->
                                    <div class="tab" id="prod-reviews">
                                        <div class="content">
                                            <p>Processing and refining operatons turn crude oil and gas into marktable products. In the case of crude oil, these products include heating oil, gasoline for use in vehicles, jet fuel, and diesel oil. Oil refining processes include dis-catalytic cracking, alkylation, isomerization and hydrotreating.</p>
                                            <p>Again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but seds because occasionally circumstances occur in which toil and pain can procure him some great pleasure.</p>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                        <!--End Product Info Tabs-->

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!--End Sidebar Page Container-->

<!--Fluid Section One-->
<section class="fluid-section-one">
    <div class="outer-container clearfix">
        <!--Title Column-->
        <div class="title-column" style="background-color:#0c85d0;">
            <div class="inner-column">
                <div class="icon-box">
                    <span class="icon flaticon-envelope-2"></span>
                </div>
                <div class="text">Newsletter For Recieve</div>
                <h2>Our Latest Company Update</h2>
            </div>
        </div>
        <!--Form Column-->
        <div class="form-column" style="background-color:#0a68b4;">
            <div class="inner-column">
                <div class="subscribe-form-three">
                    <form method="post" action="https://expert-themes.com/html/global-industry/contact.html">
                        <div class="form-group">
                            <input type="email" name="email" value="" placeholder="Your E-mail Address" required>
                            <button type="submit" class="theme-btn"><span class="fa fa-send"></span></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End Fluid Section One-->
@endsection

@push("script")
{{--    <script type="text/javascript" src="{{theme_assets("assets/js/jquery.elevateZoom-3.0.8.min.js")}}"></script>--}}
{{--    <!-- Custom Js Code -->--}}
{{--    <script src="{{theme_assets("assets/plugin/validation/validate.min.js")}}"></script>--}}
{{--    <script src="{{theme_assets("assets/script/comment.js")}}"></script>--}}
    <script src="/js/visits.js"></script>
@endpush
