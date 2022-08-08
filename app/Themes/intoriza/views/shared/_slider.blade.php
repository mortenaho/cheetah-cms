@php
    $slider_row = 1;
@endphp
<div
    id="rev_slider_26_1_wrapper"
    class="rev_slider_wrapper fullscreen-container bg-primary"
    data-alias="mask-showcase"
    data-source="gallery"
    style="padding: 0px"
>
    <!-- START REVOLUTION SLIDER 5.4.1 fullscreen mode -->
    <div
        id="rev_slider_26_1"
        class="rev_slider fullscreenbanner"
        style="display: none"
        data-version="5.4.1"
    >
        <ul>
        @foreach($sliders as $item)
            <!-- SLIDE  -->
                <li
                    data-index="rs-73"
                    data-transition="fade"
                    data-slotamount="default"
                    data-hideafterloop="0"
                    data-hideslideonmobile="off"
                    data-easein="default"
                    data-easeout="default"
                    data-masterspeed="300"
                    data-thumb="{{$item->photo}}"
                    data-rotate="0"
                    data-saveperformance="off"
                    data-title=" {{$item->title}}"
                    data-param1="{{$slider_row++}}"
                    data-param2=""
                    data-param3=""
                    data-param4=""
                    data-param5=""
                    data-param6=""
                    data-param7=""
                    data-param8=""
                    data-param9=""
                    data-param10=""
                    data-description=""
                >
                    <img
                        src="{{$item->photo}}"
                        data-bgposition="center center"
                        data-bgfit="cover"
                        data-bgrepeat="no-repeat"
                        data-bgparallax="10"
                        class="rev-slidebg"
                        data-no-retina
                        alt=""
                    />

                    <!-- LAYER NR. 1 [ for overlay ] -->
                    <div
                        class="tp-caption tp-shape tp-shapewrapper"
                        id="slide-73-layer-0"
                        data-x="['center','center','center','center']"
                        data-hoffset="['0','0','0','0']"
                        data-y="['middle','middle','middle','middle']"
                        data-voffset="['0','0','0','0']"
                        data-width="full"
                        data-height="full"
                        data-whitespace="nowrap"
                        data-type="shape"
                        data-basealign="slide"
                        data-responsive_offset="off"
                        data-responsive="off"
                        data-frames='[
                            {"from":"opacity:0;","speed":1000,"to":"o:1;","delay":0,"ease":"Power4.easeOut"},
                            {"delay":"wait","speed":1000,"to":"opacity:0;","ease":"Power4.easeOut"}
                            ]'
                        data-textAlign="['left','left','left','left']"
                        data-paddingtop="[0,0,0,0]"
                        data-paddingright="[0,0,0,0]"
                        data-paddingbottom="[0,0,0,0]"
                        data-paddingleft="[0,0,0,0]"
                        style="
                    z-index: 5;
                    background-color: rgba(0, 0, 0, 0.1);
                    border-color: rgba(0, 0, 0, 0);
                    border-width: 0px;
                  "
                    ></div>

                    <!-- LAYERS 1 border block-->
                    <div
                        class="tp-caption rev-btn tp-resizeme slider-block"
                        id="slide-73-layer-1"
                        data-x="['left','left','left','center']"
                        data-hoffset="['0','100','60','0']"
                        data-y="['middle','middle','middle','middle']"
                        data-voffset="['0','0','0','0']"
                        data-width="none"
                        data-height="none"
                        data-whitespace="nowrap"
                        data-type="button"
                        data-responsive_offset="on"
                        data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},
                                {"delay":"wait","speed":500,"to":"y:[-100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power1.easeIn"}]'
                        data-textAlign="['left','left','left','left']"
                        data-paddingtop="[250,250,250,200]"
                        data-paddingright="[250,150,150,150]"
                        data-paddingbottom="[250,250,250,200]"
                        data-paddingleft="[250,150,150,150]"
                        style="z-index: 8"
                    >
                        <div
                            class="rs-wave"
                            data-speed="1"
                            data-angle="0"
                            data-radius="2px"
                        ></div>
                    </div>

                    <!-- LAYER 2 button -->
                    <div
                        class="tp-caption rev-btn tp-resizeme"
                        id="slide-73-layer-2"
                        data-x="['left','left','left','center']"
                        data-hoffset="['100','140','140','0']"
                        data-y="['middle','middle','middle','middle']"
                        data-voffset="['150','150','150','150']"
                        data-width="none"
                        data-height="none"
                        data-whitespace="nowrap"
                        data-type="button"
                        data-responsive_offset="on"
                        data-frames='[{"from":"opacity:0;","speed":500,"to":"o:1;","delay":500,"splitdelay":0.00,"ease":"Power2.easeInOut"},{"delay":"wait","speed":1000,"to":"opacity:0;","ease":"Power2.easeIn"}]'
                        data-textAlign="['left','left','left','left']"
                        data-paddingtop="[0,0,0,0]"
                        data-paddingright="[0,0,0,0]"
                        data-paddingbottom="[0,0,0,0]"
                        data-paddingleft="[0,0,0,0]"
                        style="z-index: 9; line-height: 30px"
                    >
                        @if($item->link !=null)
                            <a href="{{$item->link}}" class="site-button-secondry" style="direction: rtl !important;letter-spacing: 0px !important;text-transform: lowercase !important;" >
                                بیشتر . . .
                            </a>
                        @endif

                    </div>

                    <div
                        class="tp-caption rev-btn tp-resizeme bg-primary"
                        id="slide-73-layer-3"
                        data-x="['right','right','right','right']"
                        data-hoffset="['870','570','370','870']"
                        data-y="['middle','middle','middle','middle']"
                        data-voffset="['0','0','0','0']"
                        data-width="full"
                        data-height="full"
                        data-whitespace="nowrap"
                        data-type="button"
                        data-responsive_offset="on"
                        data-frames='[{"from":"y:[-0%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":0,"to":"o:1;","delay":0,"ease":"Power3.easeInOut"},
                                {"delay":"wait","speed":0,"to":"y:[-0%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power1.easeIn"}]'
                        data-textAlign="['left','left','left','left']"
                        data-paddingtop="[250,250,250,200]"
                        data-paddingright="[250,150,150,150]"
                        data-paddingbottom="[250,250,250,200]"
                        data-paddingleft="[250,150,150,150]"
                        style="z-index: 6; width: 6000px"
                    ></div>

                    <!-- LAYER 5 title-->
                    <div
                        class="tp-caption tp-resizeme slider-tag-line"
                        id="slide-73-layer-5"
                        data-x="['left','left','left','center']"
                        data-hoffset="['100','140','140','20']"
                        data-y="['middle','middle','middle','middle']"
                        data-voffset="['-177','-177','-177','-157']"
                        data-width="none"
                        data-height="none"
                        data-whitespace="nowrap"
                        data-type="text"
                        data-responsive_offset="on"
                        data-frames='[{"delay":300,"speed":750,"sfxcolor":"#fff","sfx_effect":"blockfromleft","frame":"0","from":"z:0;","to":"o:1;","ease":"Power3.easeInOut"},
                                {"delay":"wait","speed":500,"sfxcolor":"#ffffff","sfx_effect":"blocktoleft","frame":"999","to":"z:0;","ease":"Power4.easeOut"}]'
                        data-textAlign="['left','left','left','left']"
                        data-paddingtop="[10,10,10,10]"
                        data-paddingright="[20,20,20,20]"
                        data-paddingbottom="[10,10,10,10]"
                        data-paddingleft="[0,0,0,0]"
                        style="
                    z-index: 10;
                    white-space: nowrap;
                    font-size: 18px;
                    line-height: 20px;
                    font-weight: 400;
                    font-family: 'iransans', sans-serif;
                    text-transform: uppercase;
                  "
                    >
                        {{$item->title}}
                    </div>

                    <!-- LAYER 6  tag line-->
                    <div
                        class="tp-caption tp-resizeme"
                        id="slide-73-layer-6"
                        data-x="['left','left','left','center']"
                        data-hoffset="['100','140','140','20']"
                        data-y="['middle','middle','middle','middle']"
                        data-voffset="['-20','-20','-20','-20']"
                        data-fontsize="['60','45','60','40']"
                        data-lineheight="['70','60','70','50']"
                        data-width="['700','650','620','380']"
                        data-height="none"
                        data-whitespace="normal"
                        data-type="text"
                        data-responsive_offset="on"
                        data-frames='[{"delay":200,"speed":750,"sfxcolor":"#fff","sfx_effect":"blockfromleft","frame":"0","from":"z:0;","to":"o:1;","ease":"Power3.easeInOut"},
                                {"delay":"wait","speed":500,"sfxcolor":"#ffffff","sfx_effect":"blocktoleft","frame":"999","to":"z:0;","ease":"Power4.easeOut"}]'
                        data-textAlign="['left','left','left','center']"
                        data-paddingtop="[20,20,20,20]"
                        data-paddingright="[20,20,20,20]"
                        data-paddingbottom="[30,30,30,30]"
                        data-paddingleft="[0,0,0,0]"
                        style="
                    z-index: 10;
                    white-space: normal;
                    font-weight: 700;
                    color: #ffffff;
                    font-family: 'iransans', serif;
                  "
                    >
                        {{$item->sub_title}}
                    </div>
                </li>
            @endforeach
        </ul>

        <div
            class="tp-bannertimer"
            style="height: 10px; background: rgba(0, 0, 0, 0.15)"
        ></div>
    </div>
</div>
<!-- SLIDER END -->
