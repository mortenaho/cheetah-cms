
@if(isset($has_slider))
<div id="rev_slider_24_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-alias="slider4"
     data-source="gallery"
     style="margin:0px auto;background:transparent;padding:0px;margin-top:0px;margin-bottom:0px;">
    <!-- START REVOLUTION SLIDER 5.4.8.1 fullwidth mode -->
    <div id="rev_slider_24_1" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.4.8.1">
        <ul>
            @foreach($sliders as $item)
            <!-- SLIDE  -->
            <li data-index="rs-{{$item->id}}" data-transition="boxslide" data-slotamount="default" data-hideafterloop="0"
                data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="default"
                data-thumb="{{$item->photo}}" data-rotate="0" data-saveperformance="off"
                data-title="Slide"
                data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6=""
                data-param7=""
                data-param8="" data-param9="" data-param10="" data-description="">
                <!-- MAIN IMAGE -->
                <img src="{{$item->photo}}" alt="" data-bgposition="center center" data-bgfit="cover"
                     data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                <!-- LAYERS -->
                <div id="rrzm_{{$item->id}}" class="rev_row_zone rev_row_zone_middle" style="z-index: 5;">

                    <!-- LAYER NR. 1 -->
                    <div class="tp-caption  "
                         id="slide-{{$item->id}}-layer-1"
                         data-x="100"
                         data-y="center" data-voffset=""
                         data-width="['auto']"
                         data-height="['auto']"

                         data-type="row"
                         data-columnbreak="3"
                         data-responsive_offset="on"
                         data-responsive="off"
                         data-frames='[{"delay":10,"speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"+8490","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                         data-margintop="[0,0,0,0]"
                         data-marginright="[0,0,0,0]"
                         data-marginbottom="[0,0,0,0]"
                         data-marginleft="[0,0,0,0]"
                         data-textAlign="['inherit','inherit','inherit','inherit']"
                         data-paddingtop="[0,0,0,0]"
                         data-paddingright="[0,0,0,0]"
                         data-paddingbottom="[0,0,0,0]"
                         data-paddingleft="[0,0,0,0]"

                         style="z-index: 5; white-space: nowrap; font-size: 20px; line-height: 22px; font-weight: 400; color: #ffffff; letter-spacing: 0px;">
                        <!-- LAYER NR. 2 -->
                        <div class="tp-caption  "
                             id="slide-{{$item->id}}-layer-2"
                             data-x="100"
                             data-y="100"
                             data-width="['auto']"
                             data-height="['auto']"

                             data-type="column"
                             data-responsive_offset="on"

                             data-frames='[{"delay":"+0","speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                             data-columnwidth="16.67%"
                             data-verticalalign="top"
                             data-margintop="[0,0,0,0]"
                             data-marginright="[0,0,0,0]"
                             data-marginbottom="[0,0,0,0]"
                             data-marginleft="[0,0,0,0]"
                             data-textAlign="['inherit','inherit','inherit','inherit']"
                             data-paddingtop="[0,0,0,0]"
                             data-paddingright="[0,0,0,0]"
                             data-paddingbottom="[0,0,0,0]"
                             data-paddingleft="[0,0,0,0]"

                             style="z-index: 6; width: 100%;"></div>

                        <!-- LAYER NR. 3 -->
                        <div class="tp-caption  "
                             id="slide-{{$item->id}}-layer-3"
                             data-x="100"
                             data-y="100"
                             data-width="['auto']"
                             data-height="['auto']"

                             data-type="column"
                             data-responsive_offset="on"
                             data-responsive="off"
                             data-frames='[{"delay":"+0","speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                             data-columnwidth="66.67%"
                             data-verticalalign="top"
                             data-margintop="[0,0,0,0]"
                             data-marginright="[0,0,0,0]"
                             data-marginbottom="[0,0,0,0]"
                             data-marginleft="[0,0,0,0]"
                             data-textAlign="['center','center','center','center']"
                             data-paddingtop="[0,0,0,0]"
                             data-paddingright="[0,0,0,0]"
                             data-paddingbottom="[0,0,0,0]"
                             data-paddingleft="[0,0,0,0]"

                             style="z-index: 7; width: 100%;">
                            <!-- LAYER NR. 4 -->
                            <div class="tp-caption   tp-resizeme"
                                 id="slide-{{$item->id}}-layer-5"
                                 data-x=""
                                 data-y=""
                                 data-width="['auto']"
                                 data-height="['auto']"

                                 data-type="text"
                                 data-responsive_offset="on"

                                 data-fontsize="['50', '50', '40', '32']"
                                 data-lineheight="['64', '60', '43', '38']"

                                 data-frames='[{"delay":"+0","speed":1500,"frame":"0","from":"z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                                 data-margintop="[0,0,0,0]"
                                 data-marginright="[0,0,0,0]"
                                 data-marginbottom="[0,0,0,0]"
                                 data-marginleft="[0,0,0,0]"
                                 data-textAlign="['inherit','inherit','inherit','inherit']"
                                 data-paddingtop="[0,0,0,0]"
                                 data-paddingright="[0,0,0,0]"
                                 data-paddingbottom="[0,0,0,0]"
                                 data-paddingleft="[0,0,0,0]"

                                 style="z-index: 8; white-space: normal; font-size: 60px; line-height: 72px; font-weight: 600; color: #ffffff; letter-spacing: 0px; display: block;">
                                {{$item->title}} <br>
                                {{$item->sub_title}}
                            </div>

                            <!-- LAYER NR. 5 -->
                            <div class="tp-caption   tp-resizeme"
                                 id="slide-{{$item->id}}-layer-6"
                                 data-x=""
                                 data-y=""
                                 data-width="['auto']"
                                 data-height="['auto']"

                                 data-type="text"
                                 data-responsive_offset="on"

                                 data-fontsize="['20', '20', '18', '16']"
                                 data-lineheight="['36', '36', '24', '22']"

                                 data-frames='[{"delay":"+1070","speed":2000,"frame":"0","from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                                 data-margintop="[30,30,30,30]"
                                 data-marginright="[0,0,0,0]"
                                 data-marginbottom="[35,35,35,35]"
                                 data-marginleft="[0,0,0,0]"
                                 data-textAlign="['inherit','inherit','inherit','inherit']"
                                 data-paddingtop="[0,0,0,0]"
                                 data-paddingright="[0,0,0,0]"
                                 data-paddingbottom="[0,0,0,0]"
                                 data-paddingleft="[0,0,0,0]"

                                 style="z-index: 9; white-space: normal; font-size: 20px; line-height: 36px; font-weight: 400; color: #ffffff; letter-spacing: 0px; display: block;">
                                {{$item->description}}
                            </div>

                            <!-- LAYER NR. 6 -->
                            <div class="tp-caption"
                                 id="slide-{{$item->id}}-layer-9"
                                 data-x=""
                                 data-y=""

                                 data-type="text"
                                 data-responsive_offset="on"

                                 data-frames='[{"delay":"+2290","speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                                 data-margintop="[0,0,0,0]"
                                 data-marginright="[0,0,0,0]"
                                 data-marginbottom="[0,0,0,0]"
                                 data-marginleft="[0,0,0,0]"
                                 data-textAlign="['inherit','inherit','inherit','inherit']"
                                 data-paddingtop="[0,0,0,0]"
                                 data-paddingright="[0,0,0,0]"
                                 data-paddingbottom="[0,0,0,0]"
                                 data-paddingleft="[0,0,0,0]"

                                 style="z-index: 11; display: inline-block;">
                                <a href="{{$item->link}}" class="btn btn--rounded btn-secondary">مطالب بیشتر</a></div>
                    </div>
                </div>
            </li>
            @endforeach

        </ul>
        <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
    </div>
</div><!-- END REVOLUTION SLIDER -->
@endif
