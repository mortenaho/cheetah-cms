<?php
$GLOBALS["menu"] = $menus;
function menu($parent)
{
    $menu = $GLOBALS["menu"]->where("parent", "=", $parent)->all();
    foreach ($menu as $item)
        if ($item->has_child === 1) {

            $class = "dropdown";

            echo '<li class="' . $class . '" ><a href="/' . $item->language . $item->link_address . '">' . $item->title . '</a>' . "\n" .
                '<ul >' . "\n";
            menu($item->id);
            echo '</ul>' . "\n" .
                ' </li>' . "\n";
        } else {
            echo '<li><a href="/'. $item->language . $item->link_address . '">' . $item->title . '</a></li>' . "\n";
        }

}
?>

<ul class="navigation clearfix">
    <?php menu(0); ?>
</ul>



{{--<ul class="navigation clearfix">--}}
{{--    <li class="current dropdown"><a href="#">Home</a>--}}
{{--        <ul>--}}
{{--            <li><a href="index-2.html">Home Page 01</a></li>--}}
{{--            <li><a href="index-3.html">Home Page 02</a></li>--}}
{{--            <li><a href="index-4.html">Home Page 03</a></li>--}}
{{--            <li class="dropdown"><a href="#">Header Styles</a>--}}
{{--                <ul>--}}
{{--                    <li><a href="index-2.html">Header Style One</a></li>--}}
{{--                    <li><a href="index-3.html">Header Style Two</a></li>--}}
{{--                    <li><a href="index-4.html">Header Style Three</a></li>--}}
{{--                    <li class="dropdown"><a href="#">Home</a>--}}
{{--                        <ul>--}}
{{--                            <li><a href="index-2.html">Home Page 01</a></li>--}}
{{--                            <li><a href="index-3.html">Home Page 02</a></li>--}}
{{--                            <li><a href="index-4.html">Home Page 03</a></li>--}}
{{--                            <li class="dropdown"><a href="#">Header StylesX</a>--}}
{{--                                <ul>--}}
{{--                                    <li><a href="index-2.html">Header Style One</a></li>--}}
{{--                                    <li><a href="index-3.html">Header Style Two</a></li>--}}
{{--                                    <li><a href="index-4.html">Header Style Three</a></li>--}}

{{--                                </ul>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--        </ul>--}}
{{--    </li>--}}
{{--    <li class="dropdown"><a href="#">About</a>--}}
{{--        <ul>--}}
{{--            <li><a href="about.html">About Us</a></li>--}}
{{--            <li><a href="team.html">Team</a></li>--}}
{{--            <li><a href="team-single.html">Team Single</a></li>--}}
{{--            <li><a href="testimonials.html">Testimonial</a></li>--}}
{{--            <li><a href="faq.html">FAQ's</a></li>--}}
{{--            <li><a href="comming-soon.html">Coming Soon</a></li>--}}
{{--        </ul>--}}

{{--    </li>--}}
{{--    <li class="dropdown"><a href="#">Solutions</a>--}}
{{--        <ul>--}}
{{--            <li><a href="solutions.html">Solutions</a></li>--}}
{{--            <li><a href="chemical-enginering.html">Chemical Engineering</a></li>--}}
{{--            <li><a href="energy-power.html">Energy & Power Engineering</a></li>--}}
{{--            <li><a href="oil-gas.html">Oil & Gas Engineering</a></li>--}}
{{--            <li><a href="civil.html">Civil Engineering</a></li>--}}
{{--            <li><a href="agriculture.html">Agriculture Engineering</a></li>--}}
{{--            <li><a href="mechanical.html">Mechanical Engineering</a></li>--}}
{{--        </ul>--}}
{{--    </li>--}}
{{--    <li class="dropdown"><a href="#">Projects</a>--}}
{{--        <ul>--}}
{{--            <li><a href="projects.html">Our projects</a></li>--}}
{{--            <li><a href="projects-detail.html">Projects Details</a></li>--}}
{{--        </ul>--}}
{{--    </li>--}}
{{--    <li class="dropdown has-mega-menu"><a href="#">Pages</a>--}}
{{--        <div class="mega-menu">--}}
{{--            <div class="mega-menu-bar row clearfix">--}}
{{--                <div class="column col-md-3 col-sm-3 col-xs-12">--}}
{{--                    <h3>About Us</h3>--}}
{{--                    <ul>--}}
{{--                        <li><a href="team.html">Team</a></li>--}}
{{--                        <li><a href="team-single.html">Team Single</a></li>--}}
{{--                        <li><a href="testimonials.html">Testimonial</a></li>--}}
{{--                        <li><a href="faq.html">FAQ's</a></li>--}}
{{--                        <li><a href="comming-soon.html">Coming Soon</a></li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--                <div class="column col-md-3 col-sm-3 col-xs-12">--}}
{{--                    <h3>Solutions</h3>--}}
{{--                    <ul>--}}
{{--                        <li><a href="solutions.html">Solutions</a></li>--}}
{{--                        <li><a href="chemical-enginering.html">Chemical Engineering</a></li>--}}
{{--                        <li><a href="energy-power.html">Energy & Power Engineering</a></li>--}}
{{--                        <li><a href="oil-gas.html">Oil & Gas Engineering</a></li>--}}
{{--                        <li><a href="civil.html">Civil Engineering</a></li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--                <div class="column col-md-3 col-sm-3 col-xs-12">--}}
{{--                    <h3>Blog</h3>--}}
{{--                    <ul>--}}
{{--                        <li><a href="blog.html">Blog Three Column</a></li>--}}
{{--                        <li><a href="blog-list-view.html">Blog List View</a></li>--}}
{{--                        <li><a href="blog-modern.html">Blog Modern View</a></li>--}}
{{--                        <li><a href="blog-classic.html">Blog with Sidebar</a></li>--}}
{{--                        <li><a href="blog-detail.html">Blog Post Details</a></li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--                <div class="column col-md-3 col-sm-3 col-xs-12">--}}
{{--                    <h3>Shop</h3>--}}
{{--                    <ul>--}}
{{--                        <li><a href="shop.html">Shop</a></li>--}}
{{--                        <li><a href="shop-single.html">Product Details</a></li>--}}
{{--                        <li><a href="shoping-cart.html">Cart Page</a></li>--}}
{{--                        <li><a href="checkout.html">Checkout Page</a></li>--}}
{{--                        <li><a href="login.html">Registration Page</a></li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </li>--}}
{{--    <li class="dropdown"><a href="#">Blog</a>--}}
{{--        <ul>--}}
{{--            <li><a href="blog.html">Blog Three Column</a></li>--}}
{{--            <li><a href="blog-list-view.html">Blog List View</a></li>--}}
{{--            <li><a href="blog-modern.html">Blog Modern View</a></li>--}}
{{--            <li><a href="blog-classic.html">Blog with Sidebar</a></li>--}}
{{--            <li><a href="blog-detail.html">Blog Post Details</a></li>--}}
{{--            <li><a href="error-page.html">404 Page</a></li>--}}
{{--        </ul>--}}
{{--    </li>--}}
{{--    <li class="dropdown"><a href="#">Shop</a>--}}
{{--        <ul>--}}
{{--            <li><a href="shop.html">Shop</a></li>--}}
{{--            <li><a href="shop-single.html">Product Details</a></li>--}}
{{--            <li><a href="shoping-cart.html">Cart Page</a></li>--}}
{{--            <li><a href="checkout.html">Checkout Page</a></li>--}}
{{--            <li><a href="login.html">Registration Page</a></li>--}}
{{--        </ul>--}}
{{--    </li>--}}
{{--    <li><a href="contact.html">Contact us</a></li>--}}
{{--</ul>--}}

{{--<ul class="navigation clearfix">--}}
{{--    <li class="current dropdown"><a href="#">Home</a>--}}
{{--        <ul>--}}
{{--            <li><a href="index-2.html">Home Page 01</a></li>--}}
{{--            <li><a href="index-3.html">Home Page 02</a></li>--}}
{{--            <li><a href="index-4.html">Home Page 03</a></li>--}}
{{--            <li class="dropdown"><a href="#">Header Styles</a>--}}
{{--                <ul>--}}
{{--                    <li><a href="index-2.html">Header Style One</a></li>--}}
{{--                    <li><a href="index-3.html">Header Style Two</a></li>--}}
{{--                    <li><a href="index-4.html">Header Style Three</a></li>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--        </ul>--}}
{{--    </li>--}}
{{--    <li class="dropdown"><a href="#">About</a>--}}
{{--        <ul>--}}
{{--            <li><a href="about.html">About Us</a></li>--}}
{{--            <li><a href="team.html">Team</a></li>--}}
{{--            <li><a href="team-single.html">Team Single</a></li>--}}
{{--            <li><a href="testimonials.html">Testimonial</a></li>--}}
{{--            <li><a href="faq.html">FAQ's</a></li>--}}
{{--            <li><a href="comming-soon.html">Coming Soon</a></li>--}}
{{--        </ul>--}}

{{--    </li>--}}
{{--    <li class="dropdown"><a href="#">Solutions</a>--}}
{{--        <ul>--}}
{{--            <li><a href="solutions.html">Solutions</a></li>--}}
{{--            <li><a href="chemical-enginering.html">Chemical Engineering</a></li>--}}
{{--            <li><a href="energy-power.html">Energy & Power Engineering</a></li>--}}
{{--            <li><a href="oil-gas.html">Oil & Gas Engineering</a></li>--}}
{{--            <li><a href="civil.html">Civil Engineering</a></li>--}}
{{--            <li><a href="agriculture.html">Agriculture Engineering</a></li>--}}
{{--            <li><a href="mechanical.html">Mechanical Engineering</a></li>--}}
{{--        </ul>--}}
{{--    </li>--}}
{{--    <li class="dropdown"><a href="#">Projects</a>--}}
{{--        <ul>--}}
{{--            <li><a href="projects.html">Our projects</a></li>--}}
{{--            <li><a href="projects-detail.html">Projects Details</a></li>--}}
{{--        </ul>--}}
{{--    </li>--}}

{{--    <li class="dropdown has-mega-menu"><a href="#">Pages</a>--}}
{{--        <div class="mega-menu">--}}
{{--            <div class="mega-menu-bar row clearfix">--}}
{{--                <div class="column col-md-3 col-sm-3 col-xs-12">--}}
{{--                    <h3>About Us</h3>--}}
{{--                    <ul>--}}
{{--                        <li><a href="team.html">Team</a></li>--}}
{{--                        <li><a href="team-single.html">Team Single</a></li>--}}
{{--                        <li><a href="testimonials.html">Testimonial</a></li>--}}
{{--                        <li><a href="faq.html">FAQ's</a></li>--}}
{{--                        <li><a href="comming-soon.html">Coming Soon</a></li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--                <div class="column col-md-3 col-sm-3 col-xs-12">--}}
{{--                    <h3>Solutions</h3>--}}
{{--                    <ul>--}}
{{--                        <li><a href="solutions.html">Solutions</a></li>--}}
{{--                        <li><a href="chemical-enginering.html">Chemical Engineering</a></li>--}}
{{--                        <li><a href="energy-power.html">Energy & Power Engineering</a></li>--}}
{{--                        <li><a href="oil-gas.html">Oil & Gas Engineering</a></li>--}}
{{--                        <li><a href="civil.html">Civil Engineering</a></li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--                <div class="column col-md-3 col-sm-3 col-xs-12">--}}
{{--                    <h3>Blog</h3>--}}
{{--                    <ul>--}}
{{--                        <li><a href="blog.html">Blog Three Column</a></li>--}}
{{--                        <li><a href="blog-list-view.html">Blog List View</a></li>--}}
{{--                        <li><a href="blog-modern.html">Blog Modern View</a></li>--}}
{{--                        <li><a href="blog-classic.html">Blog with Sidebar</a></li>--}}
{{--                        <li><a href="blog-detail.html">Blog Post Details</a></li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--                <div class="column col-md-3 col-sm-3 col-xs-12">--}}
{{--                    <h3>Shop</h3>--}}
{{--                    <ul>--}}
{{--                        <li><a href="shop.html">Shop</a></li>--}}
{{--                        <li><a href="shop-single.html">Product Details</a></li>--}}
{{--                        <li><a href="shoping-cart.html">Cart Page</a></li>--}}
{{--                        <li><a href="checkout.html">Checkout Page</a></li>--}}
{{--                        <li><a href="login.html">Registration Page</a></li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </li>--}}
{{--    <li class="dropdown"><a href="#">Blog</a>--}}
{{--        <ul>--}}
{{--            <li><a href="blog.html">Blog Three Column</a></li>--}}
{{--            <li><a href="blog-list-view.html">Blog List View</a></li>--}}
{{--            <li><a href="blog-modern.html">Blog Modern View</a></li>--}}
{{--            <li><a href="blog-classic.html">Blog with Sidebar</a></li>--}}
{{--            <li><a href="blog-detail.html">Blog Post Details</a></li>--}}
{{--            <li><a href="error-page.html">404 Page</a></li>--}}
{{--        </ul>--}}
{{--    </li>--}}
{{--    <li class="dropdown"><a href="#">Shop</a>--}}
{{--        <ul>--}}
{{--            <li><a href="shop.html">Shop</a></li>--}}
{{--            <li><a href="shop-single.html">Product Details</a></li>--}}
{{--            <li><a href="shoping-cart.html">Cart Page</a></li>--}}
{{--            <li><a href="checkout.html">Checkout Page</a></li>--}}
{{--            <li><a href="login.html">Registration Page</a></li>--}}
{{--        </ul>--}}
{{--    </li>--}}
{{--    <li><a href="contact.html">Contact us</a></li>--}}
{{--</ul>--}}
