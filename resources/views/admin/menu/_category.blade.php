<?php
$categories = \Illuminate\Support\Facades\DB::table("category")->where("type", "$post_type")->where("language", "$language")->get();

foreach ($categories as $menu) :?>
<div class="form-group pt-2">
{{--    <lable class="checkbox-inline"> {{$menu->title}}--}}
{{--        <input data-id="{{$menu->id}}" data-type="{{$post_type}}" data-title="{{$menu->title}}" data-link="/category/{{$menu->id}}/{{$menu->url_slug}}" type='checkbox' class='styled chk-category-menu' name="" title='{{$menu->title}}'/>--}}
{{--    </lable>--}}

    <div class="form-check">
        <label class="form-check-label">
            <input data-id="{{$menu->id}}" data-type="{{$post_type}}" data-title="{{$menu->title}}" data-link="/category/{{$menu->id}}/{{$menu->url_slug}}" type="checkbox" class="styled chk-category-menu" name="" title='{{$menu->title}}'>
            {{$menu->title}}
        </label>
    </div>
</div>
<?php endforeach; ?>

