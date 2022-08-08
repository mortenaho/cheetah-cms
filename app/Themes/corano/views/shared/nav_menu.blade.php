<?php
$GLOBALS["menu"] = $menus;
function menu($parent)
{
    $menu = $GLOBALS["menu"]->where("parent", "=", $parent)->all();
    foreach ($menu as $item)
        if ($item->has_child === 1) {
            if ($item->parent > 0){ $class = "";$icon="<i class='fa fa-angle-left'></i>";}
            else { $class = "tm-navigation-dropdown";$icon="<i class='fa fa-angle-down'></i>";}
            echo '<li  class="' . $class . '" ><a href="/' . $item->language . $item->link_address . '">' . $item->title .$icon. '</a>' . "\n" .
                '<ul class="dropdown">' . "\n";
            menu($item->id);
            echo '</ul>' . "\n" .
                ' </li>' . "\n";
        } else {
            echo '<li><a href="/'. $item->language .  $item->link_address . '">' . $item->title . '</a></li>' . "\n";
        }
}

?>
<nav class="desktop-menu">
    <ul>
        <?php menu(0); ?>
    </ul>
</nav>
{{--<nav class="desktop-menu">--}}
{{--    <ul>--}}
{{--        <li class="active"><a href="index.html">Home <i--}}
{{--                    class="fa fa-angle-down"></i></a>--}}
{{--            <ul class="dropdown">--}}
{{--                <li><a href="index.html">Home version 01</a></li>--}}
{{--                <li><a href="index-2.html">Home version 02</a></li>--}}
{{--                <li><a href="index-3.html">Home version 03</a></li>--}}
{{--                <li><a href="index-4.html">Home version 04</a></li>--}}
{{--                <li><a href="index-5.html">Home version 05</a></li>--}}
{{--                <li><a href="index-6.html">Home version 06</a></li>--}}
{{--            </ul>--}}
{{--        </li>--}}
{{--        <li class="position-static"><a href="#">pages <i--}}
{{--                    class="fa fa-angle-down"></i></a>--}}
{{--            <ul class="megamenu dropdown">--}}
{{--                <li class="mega-title"><span>column 01</span>--}}
{{--                    <ul>--}}
{{--                        <li><a href="shop.html">shop grid right--}}
{{--                                sidebar</a></li>--}}
{{--                        <li><a href="shop-grid-left-sidebar.html">shop grid left--}}
{{--                                sidebar</a></li>--}}
{{--                        <li><a href="shop-list-right-sidebar.html">shop list right--}}
{{--                                sidebar</a></li>--}}
{{--                        <li><a href="shop-list-left-sidebar.html">shop list left--}}
{{--                                sidebar</a></li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
{{--                <li class="mega-title"><span>column 02</span>--}}
{{--                    <ul>--}}
{{--                        <li><a href="product-details.html">product details</a></li>--}}
{{--                        <li><a href="product-details-affiliate.html">product--}}
{{--                                details--}}
{{--                                affiliate</a></li>--}}
{{--                        <li><a href="product-details-variable.html">product details--}}
{{--                                variable</a></li>--}}
{{--                        <li><a href="product-details-group.html">product details--}}
{{--                                group</a></li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
{{--                <li class="mega-title"><span>column 03</span>--}}
{{--                    <ul>--}}
{{--                        <li><a href="cart.html">cart</a></li>--}}
{{--                        <li><a href="checkout.html">checkout</a></li>--}}
{{--                        <li><a href="compare.html">compare</a></li>--}}
{{--                        <li><a href="wishlist.html">wishlist</a></li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
{{--                <li class="mega-title"><span>column 04</span>--}}
{{--                    <ul>--}}
{{--                        <li><a href="my-account.html">my-account</a></li>--}}
{{--                        <li><a href="login-register.html">login-register</a></li>--}}
{{--                        <li><a href="about-us.html">about us</a></li>--}}
{{--                        <li><a href="contact-us.html">contact us</a></li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
{{--                <li class="megamenu-banners d-none d-lg-block">--}}
{{--                    <a href="product-details.html">--}}
{{--                        <img src="Themes/corano/assets/img/banner/img1-static-menu.jpg" alt="">--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="megamenu-banners d-none d-lg-block">--}}
{{--                    <a href="product-details.html">--}}
{{--                        <img src="Themes/corano/assets/img/banner/img2-static-menu.jpg" alt="">--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </li>--}}
{{--        <li><a href="shop.html">shop <i class="fa fa-angle-down"></i></a>--}}
{{--            <ul class="dropdown">--}}
{{--                <li><a href="#">shop grid layout <i class="fa fa-angle-left"></i></a>--}}
{{--                    <ul class="dropdown">--}}
{{--                        <li><a href="shop.html">shop grid right sidebar</a></li>--}}
{{--                        <li><a href="shop-grid-left-sidebar.html">shop grid left--}}
{{--                                sidebar</a></li>--}}
{{--                        <li><a href="shop-grid-full-3-col.html">shop grid full 3 col</a>--}}
{{--                        </li>--}}
{{--                        <li><a href="shop-grid-full-4-col.html">shop grid full 4 col</a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
{{--                <li><a href="#">shop list layout <i class="fa fa-angle-left"></i></a>--}}
{{--                    <ul class="dropdown">--}}
{{--                        <li><a href="shop-list-right-sidebar.html">shop list right--}}
{{--                                sidebar</a></li>--}}
{{--                        <li><a href="shop-list-left-sidebar.html">shop list left--}}
{{--                                sidebar</a></li>--}}
{{--                        <li><a href="shop-list-full-width.html">shop list full width</a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
{{--                <li><a href="#">products details <i class="fa fa-angle-left"></i></a>--}}
{{--                    <ul class="dropdown">--}}
{{--                        <li><a href="product-details.html">product details</a></li>--}}
{{--                        <li><a href="product-details-affiliate.html">product details--}}
{{--                                affiliate</a></li>--}}
{{--                        <li><a href="product-details-variable.html">product details--}}
{{--                                variable</a></li>--}}
{{--                        <li><a href="product-details-group.html">product details--}}
{{--                                group</a></li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </li>--}}
{{--        <li><a href="blog-right-sidebar.html">Blog <i class="fa fa-angle-down"></i></a>--}}
{{--            <ul class="dropdown">--}}
{{--                <li><a href="blog-right-sidebar.html">blog right sidebar</a></li>--}}
{{--                <li><a href="blog-list-right-sidebar.html">blog list right sidebar</a>--}}
{{--                </li>--}}
{{--                <li><a href="blog-left-sidebar.html">blog left sidebar</a></li>--}}
{{--                <li><a href="blog-list-left-sidebar.html">blog list left sidebar</a>--}}
{{--                </li>--}}
{{--                <li><a href="blog-grid-full-width.html">blog grid full width</a></li>--}}
{{--                <li><a href="blog-details.html">blog details</a></li>--}}
{{--                <li><a href="blog-details-right-sidebar.html">blog details right--}}
{{--                        sidebar</a></li>--}}
{{--                <li><a href="blog-details-audio.html">blog details audio</a></li>--}}
{{--                <li><a href="blog-details-video.html">blog details video</a></li>--}}
{{--                <li><a href="blog-details-image.html">blog details image</a></li>--}}
{{--            </ul>--}}
{{--        </li>--}}
{{--        <li><a href="contact-us.html">Contact us</a></li>--}}
{{--    </ul>--}}
{{--</nav>--}}

