<?php
$GLOBALS["menu"] = $menus;

function menu($parent)
{
    $menu = $GLOBALS["menu"]->where("parent", "=", $parent)->all();
    foreach ($menu as $item)
        if ($item->has_child === 1) {

            $class = "dropdown-menu left";

            echo '<li><a href="/' . $item->language . $item->link_address . '">' . $item->title . '</a>' . "\n" .
                '<ul class="' . $class . '" >' . "\n";
            menu($item->id);
            echo '</ul>' . "\n" .
                ' </li>' . "\n";
        } else {
            echo '<li><a href="/'. $item->language . $item->link_address . '">' . $item->title . '</a></li>' . "\n";
        }

}

?>

<ul class="nav navbar-nav">
    <?php menu(0); ?>
</ul>

