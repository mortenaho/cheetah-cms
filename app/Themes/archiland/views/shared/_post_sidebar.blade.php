<?php
$posts = post_get::get_last_post(10);
?>

<div id="sidebar" class="col-md-4">
    <div class="widget widget-post">
        <h4>پستهای اخیر</h4>
        <div class="small-border"></div>
        <ul>
            @foreach($posts as $item)
                <li>
                    <a href="/{{$locale}}{{$item->link_address}}">{{$item->title}}</a>
                </li>
            @endforeach


        </ul>
    </div>

{{--    <div class="widget widget-text">--}}
{{--        <h4>About Us</h4>--}}
{{--        <div class="small-border"></div>--}}
{{--        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque--}}
{{--        ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.--}}
{{--        Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur--}}
{{--        magni--}}
{{--    </div>--}}
    <div class="widget widget_tags">
        <h4>گروهها</h4>
        <div class="small-border"></div>
        <ul>
            @foreach($categories as $item)
                <li><a href="/{{$locale}}/category/{{$item->id}}/{{$item->url_slug}}">{{$item->title}}</a></li>
            @endforeach

        </ul>
    </div>

</div>
