@extends("home::shared.layout",
["title"=>"$post->title ",
"AjaxToken"=>"true",
"captcha"=>true,

])

<?php
$post_meta = collect($post->post_meta);
$template = $post_meta->firstWhere("meta_key", "template")->meta_value;
$page_content = $post_meta->firstWhere("meta_key", "page_content")->meta_value;
?>
@isset($template)
    @include("home::page.$template",["post"=>$post])
@else
    @include("home::page._default",["post"=>$post])
@endif

