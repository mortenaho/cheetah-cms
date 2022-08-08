<?php

?>

@if(isset($messages) && count($messages)>0)
    <section class="section section-sm bg-default bg_second_cl">
        <div class="container">
            <div class="headingTitle">
                <h1> <span>نظر مشتریان</span> </h1>
                <p>نظرات مشتریان</p>
            </div>
            <div class="owl-carousel owl-modern" style="direction:rtl;" data-items="1" data-stage-padding="15" data-margin="30" data-dots="true" data-animation-in="fadeIn" data-animation-out="fadeOut" data-autoplay="true">

                @foreach($messages as $item)
                <article class="quote-lisa">
                    <div class="quote-lisa-body"><a class="quote-lisa-figure" href="#"><img class="img-circles" src="{{theme_assets("assets/images/resource/3.jpg")}}" alt="" width="100" height="100"/></a>
                        <div class="quote-lisa-text">
                            <p class="q">{{$item->message}}</p>
                        </div>
                        <h5 class="quote-lisa-cite"><a href="#">{{$item->full_name}}</a></h5>
                        <p class="quote-lisa-status">مشتری</p>
                    </div>
                </article>
               @endforeach


            </div>
        </div>
    </section>
@endif
