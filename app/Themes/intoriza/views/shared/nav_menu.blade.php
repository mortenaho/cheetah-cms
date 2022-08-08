<?php
$GLOBALS["menu"] = $menus;

function menu($parent)
{
    $menu = $GLOBALS["menu"]->where("parent", "=", $parent)->all();
    foreach ($menu as $item)
        if ($item->has_child === 1) {

            $class = "sub-menu";

            echo '<li><a href="/' . $item->language . $item->link_address . '">' . $item->title . '</a>' . "\n" .
                '<ul class="' . $class . '" >' . "\n";
            menu($item->id);
            echo '</ul>' . "\n" .
                ' </li>' . "\n";
        } else {
            echo '<li><a href="/' . $item->language . $item->link_address . '">' . $item->title . '</a></li>' . "\n";
        }

}

?>

<div class="header-nav navbar-collapse collapse nav-dark">
    <ul class="nav navbar-nav nav-line-animation">
        <?php menu(0); ?>
    </ul>
</div>


{{--<li class="active">--}}
{{--    <a href="javascript:;">صفحه اصلی</a>--}}
{{--    <ul class="sub-menu">--}}
{{--        <li><a href="index.html">قالب 1</a></li>--}}
{{--        <li><a href="index-2.html">قالب 2</a></li>--}}
{{--        <li><a href="index-3.html">قالب 3</a></li>--}}
{{--        <li><a href="index-4.html">قالب 4</a></li>--}}
{{--        <li class="active">--}}
{{--            <a href="javascript:;">قالب</a>--}}
{{--            <ul class="sub-menu">--}}
{{--                <li><a href="index.html">قالب 1</a></li>--}}
{{--                <li><a href="index-2.html">قالب 2</a></li>--}}
{{--                <li><a href="index-3.html">قالب 3</a></li>--}}
{{--                <li><a href="index-4.html">قالب 4</a></li>--}}
{{--                <li class="active">--}}
{{--                    <a href="javascript:;">قالب</a>--}}
{{--                    <ul class="sub-menu">--}}
{{--                        <li><a href="index.html">قالب 1</a></li>--}}
{{--                        <li><a href="index-2.html">قالب 2</a></li>--}}
{{--                        <li><a href="index-3.html">قالب 3</a></li>--}}
{{--                        <li><a href="index-4.html">قالب 4</a></li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </li>--}}
{{--    </ul>--}}
{{--</li>--}}
{{--<li>--}}
{{--    <a href="about-1.html">About us</a>--}}
{{--</li>--}}
{{--<li>--}}
{{--    <a href="javascript:;">Blog</a>--}}
{{--    <ul class="sub-menu">--}}
{{--        <li><a href="news-grid.html">Grid</a></li>--}}
{{--        <li><a href="news-listing.html">Listing</a></li>--}}
{{--        <li><a href="news-masonry.html">Masonry</a></li>--}}
{{--    </ul>--}}
{{--</li>--}}
{{--<li>--}}
{{--    <a href="javascript:;">Works</a>--}}
{{--    <ul class="sub-menu">--}}
{{--        <li><a href="work-grid.html">Grid</a></li>--}}
{{--        <li><a href="work-masonry.html">Masonry</a></li>--}}
{{--        <li>--}}
{{--            <a href="project-detail.html">Project Detail</a>--}}
{{--        </li>--}}
{{--    </ul>--}}
{{--</li>--}}
{{--<li>--}}
{{--    <a href="javascript:;">Blog detail</a>--}}
{{--    <ul class="sub-menu">--}}
{{--        <li><a href="post-gallery.html">Gallery</a></li>--}}
{{--        <li>--}}
{{--            <a href="post-right-sidebar.html">Right Sidebar</a>--}}
{{--        </li>--}}
{{--    </ul>--}}
{{--</li>--}}
{{--<li>--}}
{{--    <a href="contact-1.html">Contact us</a>--}}
{{--</li>--}}
{{--</ul>--}}
{{--</div>--}}


