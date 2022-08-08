@foreach($logs as $item)

    <div class="col-lg-12">
        <div class="card card-body bg-slate-400"
             style="background-image: url(http://demo.interface.club/limitless/assets/images/bg.png);">
            <div class="media no-margin">
                <div class="media-right media-middle">
                    <i class="icon-alert icon-2x"></i>
                </div>

                <div class="media-body text-right">
                    <span class="text-muted">{{$item}}</span>
                </div>

            </div>
        </div>
    </div>
@endforeach
