<?php

$GLOBALS["m_menu"] = $menu;
$GLOBALS["html_menu"] = "";
function showMenu($parent = 0)
{
    $menu = $GLOBALS["m_menu"];
    $menu = $menu->where("parent", $parent)->all();

    foreach ($menu as $item) {

        if ($item->has_child === 1) {
            echo " <li data-menu-id='" . $item->id . "' data-menu-ordering='" . $item->ordering . "' data-id='" . $item->parent . "' data-menu-link='" . $item->link_address . "' data-menu-title='" . $item->title . "'>\n" .
                "<div data-menu-id='" . $item->id . "' class=\" panel panel-heading\">
                <i data-menu-id='" . $item->id . "' class=\"icon-trash pull-right text-danger  btn-delete-menu-item\"></i>
                <i data-menu-id='" . $item->id . "' class=\"icon-pencil7 pull-right text-primary  btn-edit-menu-item\"></i>
                <span class='editable-render-response'  data-type='text' data-input-class='form-control' data-pk='" . $item->id . "' data-title='ویرایش عنوان منو'>" . $item->title . "</span>" .
                "</div>\n"
                . "<ol>";
            showMenu($item->id);
            echo "</ol>" .
                "</li>";

        } else {
            echo " <li data-menu-id='" . $item->id . "' data-menu-ordering='" . $item->ordering . "' data-id='" . $item->parent . "' data-menu-link='" . $item->link_address . "' data-menu-title='" . $item->title . "'>\n" .
                "<div data-menu-id='" . $item->id . "' class=\" panel panel-heading\">
                    <i data-menu-id='" . $item->id . "' class=\"icon-trash pull-right text-danger  btn-delete-menu-item\"></i>
                    <i data-menu-id='" . $item->id . "' class=\"icon-pencil7 pull-right text-primary  btn-edit-menu-item\"></i>
                    <span class='editable-render-response'  data-type='text' data-input-class='form-control'  data-pk='" . $item->id . "' data-title='ویرایش عنوان منو'>" . $item->title . "</span>" .
                "</div>\n" .
                "</li>";
        }

    }
}

?>

    <?php
showMenu();
echo $GLOBALS["html_menu"];
?>


