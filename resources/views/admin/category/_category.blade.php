<?php
$GLOBALS["m_categories"] = $categories;
function showCategories($parent = 0, $space = "")
{
    $cats = $GLOBALS["m_categories"];
    $cats = $cats->where("parent", $parent)->all();
    foreach ($cats as $category) {
        if ($category->has_child === 1) {
            echo "<option value='$category->id'  data-name='$category->title'>$space + $category->title </option>";
            showCategories($category->id, "$space&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;");
        } else {
            echo "<option value='$category->id' data-name='$category->title'>$space $category->title</option>";
        }
    }
}



?>
<select name="parent" id="parent" class="form-control " required>
    <option value="0">اصلی</option>
    <?php showCategories()?>

</select>
