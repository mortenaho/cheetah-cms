<?php
$post_meta = ResToModel($post->post_meta);

$project = isset($post_meta) && count($post_meta) > 0 ? $post_meta["project"] : "";
$customer = isset($post_meta) && count($post_meta) > 0 ? $post_meta["customer"] : "";
$start_date = isset($post_meta) && count($post_meta) > 0 ? $post_meta["start_date"] : "";
$end_date = isset($post_meta) && count($post_meta) > 0 ? $post_meta["end_date"] : "";
$project_status = isset($post_meta) && count($post_meta) > 0 ? $post_meta["project_status"] : "";
?>


<form role="form" name="frm_visit" id="frm_visit" method="post">
    {{csrf_field()}}
    <input type="hidden" name="post_id" id="post_id" value="{{$post->id}}">
    <input type="hidden" name="post_type" id="post_type" value="{{$post->post_type}}">
    <input type="hidden" name="category_id"  id="category_id" value="{{$post->category_id}}">
</form>

<div class="container project-view">

    <div class="row">
        <div class="col-md-8 project-images">
            <img src="{{$post->thumb}}" alt="{{$post->title}}" class="img-responsive"/>
            @foreach($post->attachments as $item)
                <img src="{{$item->file}}" alt="{{$item->title}}" class="img-responsive"/>
            @endforeach
        </div>
        <div class="col-md-4">
            <div class="project-info">
                <a href="/{{$locale}}{{$post->link_address}}">
                    <h2>{{$post->title}}</h2>
                </a>

                <div class="details">
                    <div class="info-text">
                        <span class="title">تاریخ شروع</span>
                        <span class="val">{{$start_date}}</span>
                    </div>

                    <div class="info-text">
                        <span class="title">تاریخ پایان</span>
                        <span class="val">{{$end_date}}</span>
                    </div>

                    <div class="info-text">
                        <span class="title">وضعیت پروژه</span>
                        <span class="val">{{$project_status}}</span>
                    </div>

                    <div class="info-text">
                        <span class="title">مشتری</span>
                        <span class="val">{{$customer}}</span>
                    </div>

                    <div class="info-text">
                        <span class="title">عنوان پروژه</span>
                        <span class="val">{{$project}}</span>
                    </div>
                </div>

                <p>{{$post->excerpt}}</p>
                <hr/>
                <p>
                    {!! $post->content !!}
                </p>


            </div>
        </div>
    </div>
</div>

<script src="/js/visits.js"></script>
