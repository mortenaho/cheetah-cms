<?php
$GLOBALS["m_categories"] = $categories;
$GLOBALS["category_id"] = isset($category_id) ? $GLOBALS["category_id"] = $category_id : 0;

function showCategories($parent = 0, $space = "")
{
    $cats = $GLOBALS["m_categories"];
    $cats = $cats->where("parent", $parent)->all();
    foreach ($cats as $category) {
        $selected = "";
        if ($GLOBALS["category_id"] === $category->id)
            $selected = "selected='selected'";
        if ($category->has_child === 1) {
            echo "<option $selected  value='$category->id'  data-name='$category->title'>$space + $category->title </option>";
            showCategories($category->id, "$space&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;");
        } else {
            echo "<option $selected value='$category->id' data-name='$category->title'>$space $category->title</option>";
        }
    }
}



?>
<select name="category_id" id="category_id" size="8" class="form-control form-control-uniform">
    <?php showCategories()?>
    <?php echo $categories   ?>
</select>
