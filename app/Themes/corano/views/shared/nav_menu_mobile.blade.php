<?php
$GLOBALS["mobile_menu"] = $mobile_menus;
function mobile_menu($parent)
{
    $mobile_menus = $GLOBALS["mobile_menu"]->where("parent", "=", $parent)->all();
    foreach ($mobile_menus as $item)
        if ($item->has_child === 1) {
            if ($item->parent > 0){ $class = "menu-item-has-children";}
            else { $class = "menu-item-has-children";}
            echo '<li  class="' . $class . '" ><a href="' . $item->link_address . '">' . $item->title . '</a>' . "\n" .
                '<ul class="dropdown">' . "\n";
            mobile_menu($item->id);
            echo '</ul>' . "\n" .
                ' </li>' . "\n";
        } else {
            echo '<li><a href="' . $item->link_address . '">' . $item->title . '</a></li>' . "\n";
        }
}
?>

<nav>
    <ul class="mobile-menu">
        <?php mobile_menu(0); ?>
    </ul>
</nav>

{{--<nav>--}}
{{--    <ul class="mobile-menu">--}}
{{--        <li class="menu-item-has-children"><a href="index.html">Home</a>--}}
{{--            <ul class="dropdown">--}}
{{--                <li><a href="index.html">Home version 01</a></li>--}}
{{--                <li><a href="index-2.html">Home version 02</a></li>--}}
{{--                <li><a href="index-3.html">Home version 03</a></li>--}}
{{--                <li><a href="index-4.html">Home version 04</a></li>--}}
{{--                <li><a href="index-5.html">Home version 05</a></li>--}}
{{--                <li><a href="index-6.html">Home version 06</a></li>--}}
{{--            </ul>--}}
{{--        </li>--}}
{{--        <li class="menu-item-has-children "><a href="#">shop</a>--}}
{{--            <ul class="dropdown">--}}
{{--                <li class="menu-item-has-children"><a href="#">shop grid layout</a>--}}
{{--                    <ul class="dropdown">--}}
{{--                        <li><a href="shop.html">shop grid left sidebar</a></li>--}}
{{--                        <li><a href="shop-grid-right-sidebar.html">shop grid right sidebar</a></li>--}}
{{--                        <li><a href="shop-grid-full-3-col.html">shop grid full 3 col</a></li>--}}
{{--                        <li><a href="shop-grid-full-4-col.html">shop grid full 4 col</a></li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
{{--                <li class="menu-item-has-children"><a href="#">shop list layout</a>--}}
{{--                    <ul class="dropdown">--}}
{{--                        <li><a href="shop-list-left-sidebar.html">shop list left sidebar</a></li>--}}
{{--                        <li><a href="shop-list-right-sidebar.html">shop list right sidebar</a></li>--}}
{{--                        <li><a href="shop-list-full-width.html">shop list full width</a></li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
{{--                <li class="menu-item-has-children"><a href="#">products details</a>--}}
{{--                    <ul class="dropdown">--}}
{{--                        <li><a href="product-details.html">product details</a></li>--}}
{{--                        <li><a href="product-details-affiliate.html">product details affiliate</a></li>--}}
{{--                        <li><a href="product-details-variable.html">product details variable</a></li>--}}
{{--                        <li><a href="product-details-group.html">product details group</a></li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </li>--}}
{{--        <li class="menu-item-has-children "><a href="#">Blog</a>--}}
{{--            <ul class="dropdown">--}}
{{--                <li><a href="blog-left-sidebar.html">blog left sidebar</a></li>--}}
{{--                <li><a href="blog-list-left-sidebar.html">blog list left sidebar</a></li>--}}
{{--                <li><a href="blog-right-sidebar.html">blog right sidebar</a></li>--}}
{{--                <li><a href="blog-list-right-sidebar.html">blog list right sidebar</a></li>--}}
{{--                <li><a href="blog-grid-full-width.html">blog grid full width</a></li>--}}
{{--                <li><a href="blog-details.html">blog details</a></li>--}}
{{--                <li><a href="blog-details-left-sidebar.html">blog details left sidebar</a></li>--}}
{{--                <li><a href="blog-details-audio.html">blog details audio</a></li>--}}
{{--                <li><a href="blog-details-video.html">blog details video</a></li>--}}
{{--                <li><a href="blog-details-image.html">blog details image</a></li>--}}
{{--            </ul>--}}
{{--        </li>--}}
{{--        <li><a href="contact-us.html">Contact us</a></li>--}}
{{--    </ul>--}}
{{--</nav>--}}
