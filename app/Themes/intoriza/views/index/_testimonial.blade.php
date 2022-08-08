<?php
//$contacts =post_get::query([["post_type","=","customer"],["status","=","1"]]);
?>

@if(isset($messages) && count($messages)>0)
    <!-- TESTIMONIAL SECTION START -->
    <div
        class="section-full small-device p-t80 p-b80 bg-white bg-repeat"
        style="background-image: url({{theme_assets("assets/images/background/ptn-1.png")}})"
    >
        <div class="container">
            <div class="section-content">
                <div class="row">
                    <div class="col-md-7 m-b30">
                        <div class="owl-carousel testimonial-home owl-btn-top-right">
                            @foreach($messages as $item)
                            <div class="item">
                                <div class="testimonial-5">
                                    <div class="testimonial-text">
                                        <div class="testimonial-paragraph">
                                            <span class="fa fa-quote-left text-primary"></span>
                                            <p>
                                                {{$item->message}}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="clearfix">
                                        <div class="testimonial-detail clearfix">
                                            <strong class="testimonial-name text-black">
                                                {{$item->full_name}}
                                            </strong>
                                            <span class="testimonial-position p-t5">
                                                {{$item->subject}}
                                            </span>
                                        </div>
                                        <div class="testimonial-pic-block">
                                            <div class="testimonial-pic">
                                                <img
                                                    src="{{theme_assets("assets/images/testimonials/pic1.jpg")}}"
                                                    width="132"
                                                    height="132"
                                                    alt=""
                                                />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <div class="item">
                                <div class="testimonial-5">
                                    <div class="testimonial-text">
                                        <div class="testimonial-paragraph">
                                            <span class="fa fa-quote-left text-primary"></span>
                                            <p>
                                                There are many variations of passages of Lorem
                                                Ipsum available, but the majority have suffered
                                                alteration in some form, by injected humour, or
                                                rand omised words which don't look even slightly
                                                believable.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="clearfix">
                                        <div class="testimonial-detail clearfix">
                                            <strong class="testimonial-name text-black"
                                            >Justine Fiber</strong
                                            >
                                            <span class="testimonial-position p-t5"
                                            >Founder</span
                                            >
                                        </div>
                                        <div class="testimonial-pic-block">
                                            <div class="testimonial-pic">
                                                <img
                                                    src="{{theme_assets("assets/images/testimonials/pic2.jpg")}}"
                                                    width="132"
                                                    height="132"
                                                    alt=""
                                                />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="testimonial-5">
                                    <div class="testimonial-text">
                                        <div class="testimonial-paragraph">
                                            <span class="fa fa-quote-left text-primary"></span>
                                            <p>
                                                There are many variations of passages of Lorem
                                                Ipsum available, but the majority have suffered
                                                alteration in some form, by injected humour, or
                                                rand omised words which don't look even slightly
                                                believable.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="clearfix">
                                        <div class="testimonial-detail clearfix">
                                            <strong class="testimonial-name text-black"
                                            >Justine Fiber</strong
                                            >
                                            <span class="testimonial-position p-t5"
                                            >Founder</span
                                            >
                                        </div>
                                        <div class="testimonial-pic-block">
                                            <div class="testimonial-pic">
                                                <img
                                                    src="{{theme_assets("assets/images/testimonials/pic3.jpg")}}"
                                                    width="132"
                                                    height="132"
                                                    alt=""
                                                />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="counter-section-one">
                            <div class="counter-sec-top">
                                <div class="p-a20 text-black wt-icon-box-wraper center">
                                    <div class="counter font-40 m-b5">250</div>
                                    <h4>پروژه ها</h4>
                                </div>
                            </div>
                            <div class="counter-sec-bottom">
                                <div class="p-a20 text-black wt-icon-box-wraper center">
                                    <div class="counter font-40 m-b5">5000</div>
                                    <h4>تعدا مشتریان</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- TESTIMONIAL SECTION END -->
@endif
