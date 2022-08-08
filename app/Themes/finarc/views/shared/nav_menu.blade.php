<?php
$GLOBALS["menu"] = $menus;

function menu($parent)
{
    $menu = $GLOBALS["menu"]->where("parent", "=", $parent)->all();
    foreach ($menu as $item)
        if ($item->has_child === 1) {

            $class = "finarc-menu finarc-navbar-dropdown";
            if (strpos($item->link_address, 'http:') !== false) {
                echo '<li class="finarc-nav-item" ><a class="finarc-nav-link" href="' . $item->link_address . '">' . $item->title . '</a>' . "\n" .
                    '<ul class="' . $class . '" >' . "\n";
            } else {
                echo '<li class="finarc-nav-item" ><a class="finarc-nav-link" href="/' . $item->language . $item->link_address . '">' . $item->title . '</a>' . "\n" .
                    '<ul class="' . $class . '" >' . "\n";
            }
            menu($item->id);
            echo '</ul>' . "\n" .
                ' </li>' . "\n";
        } else {
            if (strpos($item->link_address, 'http:') !== false) {
                echo '<li class="finarc-nav-item"><a class="finarc-nav-link" href="'  . $item->link_address . '">' . $item->title . '</a></li>' . "\n";
            } else {
                echo '<li class="finarc-nav-item"><a class="finarc-nav-link" href="/' . $item->language . $item->link_address . '">' . $item->title . '</a></li>' . "\n";
            }
        }

}

?>


<ul class="finarc-navbar-nav">
    <?php menu(0); ?>
</ul>


{{--<ul class="finarc-navbar-nav">--}}


{{--    <li class="finarc-nav-item active"><a class="finarc-nav-link" href="#">Home</a>--}}
{{--        <!-- RD Navbar Dropdown-->--}}
{{--        <ul class="finarc-menu finarc-navbar-dropdown">--}}
{{--            <li class="finarc-dropdown-item"><a class="finarc-dropdown-link" href="index.html">Home</a></li>--}}
{{--            <li class="finarc-dropdown-item"><a class="finarc-dropdown-link" href="index-1.html">Classical Home</a></li>--}}
{{--            <li class="finarc-dropdown-item"><a class="finarc-dropdown-link" href="index-2.html">Video Home</a></li>--}}
{{--            <li class="finarc-dropdown-item"><a class="finarc-dropdown-link" href="index-3.html">Partical Home</a></li>--}}
{{--            <li class="finarc-dropdown-item"><a class="finarc-dropdown-link" href="index-4.html">TypeWriter Home</a></li>--}}
{{--            <li class="finarc-dropdown-item"><a class="finarc-dropdown-link" href="index-5.html">Typer+Partical Home</a></li>--}}
{{--            <li class="finarc-dropdown-item"><a class="finarc-dropdown-link" href="index-6.html">Bubbles Home</a></li>--}}

{{--        </ul>--}}
{{--    </li>--}}

{{--    <li class="finarc-nav-item"><a class="finarc-nav-link" href="about-us.html">About Us</a> </li>--}}
{{--    <li class="finarc-nav-item"><a class="finarc-nav-link" href="grid-gallery.html">Portfolio</a>--}}
{{--        <!-- RD Navbar Dropdown-->--}}
{{--        <ul class="finarc-menu finarc-navbar-dropdown">--}}
{{--            <li class="finarc-dropdown-item"><a class="finarc-dropdown-link" href="grid-gallery.html">Grid Gallery</a></li>--}}
{{--            <li class="finarc-dropdown-item"><a class="finarc-dropdown-link" href="full-width-gallery.html">Full width Gallery</a></li>--}}
{{--            <li class="finarc-dropdown-item"><a class="finarc-dropdown-link" href="masonry-gallery.html">Masonry Gallery</a></li>--}}
{{--            <li class="finarc-dropdown-item"><a class="finarc-dropdown-link" href="full-width-masonry-gallery.html">Full Width Masonry Gallery</a></li>--}}
{{--            <li class="finarc-dropdown-item"><a class="finarc-dropdown-link" href="single-project.html">Single Project</a></li>--}}
{{--        </ul>--}}
{{--    </li>--}}
{{--    <li class="finarc-nav-item"><a class="finarc-nav-link" href="classic-blog.html">Blog</a>--}}
{{--        <!-- RD Navbar Dropdown-->--}}
{{--        <ul class="finarc-menu finarc-navbar-dropdown">--}}
{{--            <li class="finarc-dropdown-item"><a class="finarc-dropdown-link" href="classic-blog.html">Classic Blog</a></li>--}}
{{--            <li class="finarc-dropdown-item"><a class="finarc-dropdown-link" href="grid-blog.html">Grid Blog</a></li>--}}
{{--            <li class="finarc-dropdown-item"><a class="finarc-dropdown-link" href="grid-blog-2.html">Grid Blog 2</a></li>--}}
{{--            <li class="finarc-dropdown-item"><a class="finarc-dropdown-link" href="grid-blog-3.html">Grid Blog 3</a></li>--}}
{{--            <li class="finarc-dropdown-item"><a class="finarc-dropdown-link" href="blog-post.html">Blog Post</a></li>--}}
{{--        </ul>--}}
{{--    </li>--}}
{{--    <li class="finarc-nav-item"><a class="finarc-nav-link" href="shop.html">Shop</a>--}}
{{--        <!-- RD Navbar Dropdown-->--}}
{{--        <ul class="finarc-menu finarc-navbar-dropdown">--}}
{{--            <li class="finarc-dropdown-item"><a class="finarc-dropdown-link" href="shop.html">Shop</a></li>--}}
{{--            <li class="finarc-dropdown-item"><a class="finarc-dropdown-link" href="single-product.html">Single Product</a></li>--}}
{{--            <li class="finarc-dropdown-item"><a class="finarc-dropdown-link" href="cart-page.html">Cart Page</a></li>--}}
{{--            <li class="finarc-dropdown-item"><a class="finarc-dropdown-link" href="checkout.html">Checkout</a></li>--}}
{{--        </ul>--}}
{{--    </li>--}}
{{--    <li class="finarc-nav-item"><a class="finarc-nav-link" href="contact-us.html">Contact Us</a> </li>--}}
{{--    <li class="finarc-nav-item"><a class="finarc-nav-link" href="#">Pages</a>--}}
{{--        <!-- RD Navbar Megamenu-->--}}
{{--        <ul class="finarc-menu finarc-navbar-megamenu">--}}
{{--            <li class="finarc-megamenu-item">--}}
{{--                <div>--}}
{{--                    <h5 class="finarc-megamenu-title">Elements</h5>--}}
{{--                    <ul class="finarc-megamenu-list">--}}
{{--                        <li class="finarc-megamenu-list-item"><a class="finarc-megamenu-list-link" href="typography.html">Typography</a></li>--}}
{{--                        <li class="finarc-megamenu-list-item"><a class="finarc-megamenu-list-link" href="buttons.html">Buttons</a></li>--}}
{{--                        <li class="finarc-megamenu-list-item"><a class="finarc-megamenu-list-link" href="forms.html">Forms</a></li>--}}
{{--                        <li class="finarc-megamenu-list-item"><a class="finarc-megamenu-list-link" href="tabs-and-accordions.html">Tabs and Accordions</a></li>--}}
{{--                        <li class="finarc-megamenu-list-item"><a class="finarc-megamenu-list-link" href="counters.html">Counters</a></li>--}}
{{--                        <li class="finarc-megamenu-list-item"><a class="finarc-megamenu-list-link" href="icons-with-text.html">Icons with Text</a></li>--}}
{{--                        <li class="finarc-megamenu-list-item"><a class="finarc-megamenu-list-link" href="progress-bars.html">Progress Bars</a></li>--}}
{{--                        <li class="finarc-megamenu-list-item"><a class="finarc-megamenu-list-link" href="calls-to-action.html">Calls to Action</a></li>--}}
{{--                        <li class="finarc-megamenu-list-item"><a class="finarc-megamenu-list-link" href="grid-system.html">Grid System</a></li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </li>--}}
{{--            <li class="finarc-megamenu-item">--}}
{{--                <div>--}}
{{--                    <h5 class="finarc-megamenu-title">Additional pages</h5>--}}
{{--                    <ul class="finarc-megamenu-list">--}}
{{--                        <li class="finarc-megamenu-list-item"><a class="finarc-megamenu-list-link" href="services.html">Services</a></li>--}}
{{--                        <li class="finarc-megamenu-list-item"><a class="finarc-megamenu-list-link" href="single-service.html">Single Service</a></li>--}}
{{--                        <li class="finarc-megamenu-list-item"><a class="finarc-megamenu-list-link" href="our-team.html">Our Team</a></li>--}}
{{--                        <li class="finarc-megamenu-list-item"><a class="finarc-megamenu-list-link" href="testimonials.html">Testimonials</a></li>--}}
{{--                        <li class="finarc-megamenu-list-item"><a class="finarc-megamenu-list-link" href="404-page.html">404 Page</a></li>--}}
{{--                        <li class="finarc-megamenu-list-item"><a class="finarc-megamenu-list-link" href="503-page.html">503 Page</a></li>--}}
{{--                        <li class="finarc-megamenu-list-item"><a class="finarc-megamenu-list-link" href="pricing.html">Pricing</a></li>--}}
{{--                        <li class="finarc-megamenu-list-item"><a class="finarc-megamenu-list-link" href="coming-soon.html">Coming Soon</a></li>--}}
{{--                        <li class="finarc-megamenu-list-item"><a class="finarc-megamenu-list-link" href="contact-us-2.html">Contact Us 2</a></li>--}}
{{--                        <li class="finarc-megamenu-list-item"><a class="finarc-megamenu-list-link" href="faq.html">FAQ</a></li>--}}
{{--                        <li class="finarc-megamenu-list-item"><a class="finarc-megamenu-list-link" href="search-results.html">Search results</a></li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </li>--}}
{{--            <li class="finarc-megamenu-item finarc-megamenu-carousel">--}}
{{--                <div>--}}
{{--                    <h5 class="finarc-megamenu-title">Recent projects</h5>--}}
{{--                    <!-- Owl Carousel-->--}}
{{--                    <div class="owl-carousel owl-navbar" data-loop="false" data-items="1" data-xl-items="2" data-xxl-items="2" data-margin="16" data-dots="true">--}}
{{--                        <!-- Thumbnail Classic-->--}}
{{--                        <article class="thumbnail thumbnail-mary thumbnail-xxs">--}}
{{--                            <div class="thumbnail-mary-figure"><img src="assets/images/products/products-img-1.jpg" alt="" width="272" height="288"/> </div>--}}
{{--                            <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60" href="assets/images/products/products-img-1.jpg" data-lightgallery="item"><img src="assets/images/products/products-img-1.jpg" alt="" width="272" height="288"/></a>--}}
{{--                                <h6 class="thumbnail-mary-title"><a href="single-project.html">Project #1</a></h6>--}}
{{--                            </div>--}}
{{--                        </article>--}}
{{--                        <!-- Thumbnail Classic-->--}}
{{--                        <article class="thumbnail thumbnail-mary thumbnail-xxs">--}}
{{--                            <div class="thumbnail-mary-figure"><img src="assets/images/products/products-img-2.jpg" alt="" width="272" height="288"/> </div>--}}
{{--                            <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60" href="assets/images/products/products-img-2.jpg" data-lightgallery="item"><img src="assets/images/products/products-img-2.jpg" alt="" width="272" height="288"/></a>--}}
{{--                                <h6 class="thumbnail-mary-title"><a href="single-project.html">Project #2</a></h6>--}}
{{--                            </div>--}}
{{--                        </article>--}}
{{--                        <!-- Thumbnail Classic-->--}}
{{--                        <article class="thumbnail thumbnail-mary thumbnail-xxs">--}}
{{--                            <div class="thumbnail-mary-figure"><img src="assets/images/products/products-img-3.jpg" alt="" width="272" height="288"/> </div>--}}
{{--                            <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60" href="assets/images/products/products-img-3.jpg" data-lightgallery="item"><img src="assets/images/products/products-img-3.jpg" alt="" width="272" height="288"/></a>--}}
{{--                                <h6 class="thumbnail-mary-title"><a href="single-project.html">Project #3</a></h6>--}}
{{--                            </div>--}}
{{--                        </article>--}}
{{--                        <!-- Thumbnail Classic-->--}}
{{--                        <article class="thumbnail thumbnail-mary thumbnail-xxs">--}}
{{--                            <div class="thumbnail-mary-figure"><img src="assets/images/products/products-img-4.jpg" alt="" width="272" height="288"/> </div>--}}
{{--                            <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60" href="assets/images/products/products-img-4.jpg" data-lightgallery="item"><img src="assets/images/products/products-img-4.jpg" alt="" width="272" height="288"/></a>--}}
{{--                                <h6 class="thumbnail-mary-title"><a href="single-project.html">Project #4</a></h6>--}}
{{--                            </div>--}}
{{--                        </article>--}}
{{--                        <!-- Thumbnail Classic-->--}}
{{--                        <article class="thumbnail thumbnail-mary thumbnail-xxs">--}}
{{--                            <div class="thumbnail-mary-figure"><img src="assets/images/products/products-img-5.jpg" alt="" width="272" height="288"/> </div>--}}
{{--                            <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60" href="assets/images/products/products-img-5.jpg" data-lightgallery="item"><img src="assets/images/products/products-img-5.jpg" alt="" width="272" height="288"/></a>--}}
{{--                                <h6 class="thumbnail-mary-title"><a href="single-project.html">Project #5</a></h6>--}}
{{--                            </div>--}}
{{--                        </article>--}}
{{--                        <!-- Thumbnail Classic-->--}}
{{--                        <article class="thumbnail thumbnail-mary thumbnail-xxs">--}}
{{--                            <div class="thumbnail-mary-figure"><img src="assets/images/products/products-img-6.jpg" alt="" width="272" height="288"/> </div>--}}
{{--                            <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60" href="assets/images/products/products-img-6.jpg" data-lightgallery="item"><img src="assets/images/products/products-img-6.jpg" alt="" width="272" height="288"/></a>--}}
{{--                                <h6 class="thumbnail-mary-title"><a href="single-project.html">Project #6</a></h6>--}}
{{--                            </div>--}}
{{--                        </article>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </li>--}}
{{--        </ul>--}}
{{--    </li>--}}
{{--</ul>--}}
