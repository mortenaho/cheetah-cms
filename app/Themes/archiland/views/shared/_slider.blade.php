@php
    $slider_row = 1;
@endphp

<!-- SLIDER END -->
<section id="section-slider" class="fullwidthbanner-container" aria-label="section-slider">
    <div id="revolution-slider">
        <ul>

            @foreach($sliders as $item)
            <li data-transition="fade" data-slotamount="10" data-masterspeed="200" data-thumb="">
                <!--  BACKGROUND IMAGE -->
                <img src="{{$item->photo}}" alt="{{$item->title}}" />
                <div class="tp-caption big-white sft" data-x="0" data-y="150" data-speed="800" data-start="400" data-easing="easeInOutExpo"
                     data-endspeed="450">
                    {{$item->title}}
                </div>

                <div class="tp-caption ultra-big-white customin customout start" data-x="0" data-y="center" data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:2;scaleY:2;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                     data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.85;scaleY:0.85;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                     data-speed="800" data-start="400" data-easing="easeInOutExpo" data-endspeed="400">
                    {{$item->sub_title}}
                </div>

                <div class="tp-caption sfb" data-x="0" data-y="335" data-speed="400" data-start="800" data-easing="easeInOutExpo">
                    @if($item->link !=null)
                        <a href="{{$item->link}}" class="btn-slider"> بیشتر . . .
                        </a>
                    @endif
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</section>
