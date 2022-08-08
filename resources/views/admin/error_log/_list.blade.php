<?php
$row = 0;
?>

<div class="row">
    @foreach($logs as $item)
        <?php

        $name = substr($item, strlen($item) - 22);
        $row++;

        ?>

        <div id="item_{{$row}}" class="col-lg-4">
            <div class="card card-body bg-pink-400"
                 style="background-image: url(http://demo.interface.club/limitless/assets/images/bg.png);">
                <div class="media no-margin">
                    <div class="media-left media-middle">
                        <i class="icon-alert icon-2x"></i>
                    </div>

                    <div class="media-body text-left">
                        <h6 class="media-heading text-left text-semibold">@lang("admin.allError")</h6>
                        <span class="text-muted">{{$name}}</span>
                    </div>
                    <div class="media-bottom">
                        <button data-path="{{$item}}" data-row="{{$row}}" type="button"
                                class="btn btn-default btn-sm legitRipple pull-right btn-get-error">@lang("admin.visit")
                            <i class="icon-play3 position-right"></i></button>

                    </div>
                </div>
            </div>
        </div>

    @endforeach
</div>
