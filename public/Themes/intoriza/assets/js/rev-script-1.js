	
			var tpj=jQuery;
			var revapi26;
			tpj(document).ready(function() {
				if(tpj("#rev_slider_26_1").revolution == undefined){
					revslider_showDoubleJqueryError("#rev_slider_26_1");
				}else{
					revapi26 = tpj("#rev_slider_26_1").show().revolution({
						sliderType:"standard",
						jsFileLocation:"revolution/js/",
						sliderLayout:"auto",
						dottedOverlay:"none",
						delay:9000,
						navigation: {
							keyboardNavigation:"off",
							keyboard_direction: "horizontal",
							mouseScrollNavigation:"off",
 							mouseScrollReverse:"default",
							onHoverStop:"off",
							touch:{
								touchenabled:"on",
								touchOnDesktop:"off",
								swipe_threshold: 75,
								swipe_min_touches: 50,
								swipe_direction: "horizontal",
								drag_block_vertical: false
							}
							,
                            tabs: {
                                style:"custom",
                                enable:true,
                                width:250,
                                height:40,
                                min_width:249,
                                wrapper_padding:0,
                                wrapper_color:"",
                                wrapper_opacity:"0",
                                tmp:'<div class="tp-tab-wrapper slider-number-wraper"><div class="tp-tab-number">{{param1}}</div></div>',
                                visibleAmount: 5,
                                hide_onmobile: true,
                                hide_under:800,
                                hide_onleave:false,
                                hide_delay:200,
                                direction:"vertical",
                                span:true,
                                position:"inner",
                                space:0,
                                h_align:"left",
                                v_align:"center",
                                h_offset:0,
                                v_offset:0
                            },
							thumbnails: {
								style:"zeus",
								enable:true,
								width:80,
								height:80,
								min_width:80,
								wrapper_padding:10,
								wrapper_color:"#fff",
								wrapper_opacity:"0.5",
								tmp: '<span class="tp-thumb-img-wrap"><span class="tp-thumb-image"></span></span>',
								visibleAmount:10,
								hide_onmobile:false,
								hide_onleave:false,
								direction:"horizontal",
								span:false,
								position:"inner",
								space:10,
								h_align:"right",
								v_align:"bottom",
								h_offset:0,
								v_offset:0
							}							
							,
							bullets: {
								enable:true,
								hide_onmobile:false,
								style:"bullet-bar",
								hide_onleave:false,
								direction:"horizontal",
								h_align:"right",
								v_align:"bottom",
								h_offset:30,
								v_offset:30,
								space:5,
								tmp:''
							}
						},
						responsiveLevels:[1240,1024,778,480],
						visibilityLevels:[1240,1024,778,480],
						gridwidth:[1240,1024,778,480],
						gridheight:[729,768,768,720],
						lazyType:"none",
						parallax: {
							type:"scroll",
							origo:"slidercenter",
							speed:2000,
							levels:[5,10,15,20,25,30,35,40,45,46,47,48,49,50,51,55],
						},
						shadow:0,
						spinner:"off",
						stopLoop:"off",
						stopAfterLoops:-1,
						stopAtSlide:-1,
						shuffle:"off",
						autoHeight:"off",
						fullScreenAutoWidth:"off",
						fullScreenAlignForce:"off",
						fullScreenOffsetContainer: "",
						fullScreenOffset: "60px",
						hideThumbsOnMobile:"off",
						hideSliderAtLimit:0,
						hideCaptionAtLimit:0,
						hideAllCaptionAtLilmit:0,
						debugMode:false,
						fallbacks: {
							simplifyAll:"off",
							nextSlideOnWindowFocus:"off",
							disableFocusListener:false,
						}
					});
				}
			});	/*ready*/
