<div class="row">
    @foreach($siteThemes as $item)
        <div class="col-md-4">
            <div class="card">
                <div id="theme_{{$item->name}}" class="thumbnail">
{{--                    <div class="panel-heading">--}}
{{--                        <h6 class="panel-title">{{$item->title}}</h6>--}}
{{--                        <div class="heading-elements">--}}
{{--                            <form class="heading-form" action="#">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label id="lbl_{{$item->name}}"--}}
{{--                                           class="checkbox-inline checkbox-right  {{config("themes.current")==$item->name? 'disabled':null}}">--}}
{{--                                        <input data-name="{{$item->name}}" type="checkbox"--}}
{{--                                               class="styled chk_theme" {{config("themes.current")==$item->name? 'checked="checked"  disabled="disabled"':null}} >--}}
{{--                                        فعال--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div class="card-header header-elements-inline">
                                            <h5 class="card-title"> {{$item->title}}</h5>
                                            <div class="header-elements">
                                                <form class="heading-form" action="#">
                                                    <div class="form-group">
                                                        <label id="lbl_{{$item->name}}"
                                                               class="checkbox-inline checkbox-right  {{config("themes.current")==$item->name? 'disabled':null}}">
{{--                                                            فعال--}}
                                                            <input data-name="{{$item->name}}" type="checkbox"
                                                                   class="styled chk_theme" {{config("themes.current")==$item->name? 'checked="checked"  disabled="disabled"':null}} >

                                                        </label>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                    <div class="thumb">
                        <img style="object-fit: cover;height: 250px;"
                             src="{{theme_thumb_address("screenshot.png",$item->name)}}" alt="">
                        <div class="caption-overflow">
										<span>
											<a href="{{theme_thumb_address("screenshot.png",$item->name)}}"
                                               class="btn bg-teal-300 btn-rounded btn-icon" data-popup="lightbox"><i
                                                    class="icon-zoomin3"></i></a>
                                            @isset($item->site)
                                                <a href="  {{$item->site}}"
                                                   class="btn bg-teal-300 btn-rounded btn-icon"><i
                                                        class="icon-link"></i></a>
                                            @endisset
										</span>
                        </div>
                    </div>

                    <div class="caption p-2">
                        <h6 class="media-heading"><a href="#">@lang("admin.designBy"): {{$item->author}}</a></h6>
                        {{$item->description}}
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
