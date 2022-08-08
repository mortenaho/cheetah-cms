<?php

if ($is_active === true) {
    $style = "success";
    $title = "فعال";
    $icon = "checkmark";
} else {
    $style = "danger";
    $title = "غیر فعال";
    $icon = "cross2";
}
?>
<button data-id="{{$id}}" type="button" class="btn btn-{{$style}} btn_is_active btn-rounded legitRipple"><i
        class="icon-{{$icon}} position-left"></i> {{$title}}
</button>
