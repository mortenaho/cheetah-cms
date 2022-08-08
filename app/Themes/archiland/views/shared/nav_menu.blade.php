<?php
$GLOBALS["menu"] = $menus;

function menu($parent)
{
    $menu = $GLOBALS["menu"]->where("parent", "=", $parent)->all();
    foreach ($menu as $item)
        if ($item->has_child === 1) {

            $class = "";

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


<nav>
    <ul id="mainmenu">
        <?php menu(0); ?>
    </ul>
</nav>

{{--<li><a href="project-wide-4-cols.html">Projects</a>--}}
{{--    <ul>--}}
{{--        <li><a href="project-wide-4-cols.html">Wide Style</a>--}}
{{--            <ul>--}}
{{--                <li><a href="project-wide-2-cols.html">2 Cols Wide</a></li>--}}
{{--                <li><a href="project-wide-3-cols.html">3 Cols Wide</a></li>--}}
{{--                <li><a href="project-wide-4-cols.html">4 Cols Wide</a></li>--}}
{{--            </ul>--}}
{{--        </li>--}}
{{--        <li><a href="project-contained-3-cols.html">Contained Style</a>--}}
{{--            <ul>--}}
{{--                <li><a href="project-contained-2-cols.html">2 Cols Contained</a></li>--}}
{{--                <li><a href="project-contained-3-cols.html">3 Cols Contained</a></li>--}}
{{--                <li><a href="project-contained-4-cols.html">4 Cols Contained</a></li>--}}
{{--            </ul>--}}
{{--        </li>--}}
{{--        <li><a href="project-carousel-3-cols.html">Carousel Style</a>--}}
{{--            <ul>--}}
{{--                <li><a href="project-carousel-2-cols.html">2 Cols Carousel</a></li>--}}
{{--                <li><a href="project-carousel-3-cols.html">3 Cols Carousel</a></li>--}}
{{--                <li><a href="project-carousel-4-cols.html">4 Cols Carousel</a></li>--}}
{{--            </ul>--}}
{{--        </li>--}}
{{--        <li><a href="project-inverted-3-cols.html">Inverted Style</a>--}}
{{--            <ul>--}}
{{--                <li><a href="project-inverted-2-cols.html">2 Cols Inverted</a></li>--}}
{{--                <li><a href="project-inverted-3-cols.html">3 Cols Inverted</a></li>--}}
{{--                <li><a href="project-inverted-4-cols.html">4 Cols Inverted</a></li>--}}
{{--            </ul>--}}
{{--        </li>--}}
{{--        <li><a href="project-contained-3-cols.html">Masonry Gallery</a>--}}
{{--            <ul>--}}
{{--                <li><a href="project-masonry-4-cols.html">3 Cols Masonry</a></li>--}}
{{--                <li><a href="project-masonry-3-cols.html">4 Cols Masonry</a></li>--}}
{{--            </ul>--}}
{{--        </li>--}}
{{--        <li><a href="project-contained-3-cols.html">Simple Gallery</a>--}}
{{--            <ul>--}}
{{--                <li><a href="gallery-2-cols.html">2 Cols</a></li>--}}
{{--                <li><a href="gallery-3-cols.html">3 Cols</a></li>--}}
{{--                <li><a href="gallery-4-cols.html">4 Cols</a></li>--}}
{{--            </ul>--}}
{{--        </li>--}}
{{--        <li><a href="#">Misc</a>--}}
{{--            <ul>--}}
{{--                <li><a href="project-before-after.html">Before After</a></li>--}}
{{--            </ul>--}}
{{--        </li>--}}
{{--    </ul>--}}
{{--</li>--}}
