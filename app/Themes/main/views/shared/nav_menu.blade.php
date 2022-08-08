<?php
$GLOBALS["menu"] = $menus;
function menu($parent)
{
    $menu = $GLOBALS["menu"]->where("parent", "=", $parent)->all();
    foreach ($menu as $item)
        if ($item->has_child === 1) {
            if ($item->parent > 0) $class = "has-child";
            else  $class = "tm-navigation-dropdown";
            echo '<li  class="' . $class . '" ><a href="' . $item->link_address . '">' . $item->title . '</a>' . "\n" .
                '<ul>' . "\n";
            menu($item->id);
            echo '</ul>' . "\n" .
                ' </li>' . "\n";
        } else {
            echo '<li><a href="' . $item->link_address . '">' . $item->title . '</a></li>' . "\n";
        }
}

?>
<nav class="tm-navigation">
    <ul>
        <?php menu(0); ?>
    </ul>
</nav>


