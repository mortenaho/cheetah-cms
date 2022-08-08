@isset($visit)

    <div class="col-lg-12">

        <!-- Invoice template -->
        <div class="card">

            <div class="card-header bg-transparent border-bottom header-elements-inline">
                <h6 class="card-title"></h6>
                <div class="header-elements">
{{--                    <button type="button" class="btn btn-light btn-sm"><i class="icon-file-check mr-2"></i> Save</button>--}}
{{--                    <button type="button" class="btn btn-light btn-sm ml-3"><i class="icon-printer mr-2"></i> Print</button>--}}
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-4">

                            @switch(strtolower($visit->browser_name))
                                @case('opera')
                                <img src="/admin_assets/global_assets/images/browsers/opera.png" class="mb-3 mt-2" alt="" style="width: 100px;">
                                @break

                                @case('edge')
                                <img src="/admin_assets/global_assets/images/browsers/edge.png" class="mb-3 mt-2" alt="" style="width: 100px;">
                                @break

                                @case('chrome')
                                <img src="/admin_assets/global_assets/images/browsers/chrome.png" class="mb-3 mt-2" alt="" style="width: 100px;">
                                @break

                                @case('safari')
                                <img src="/admin_assets/global_assets/images/browsers/safari.png" class="mb-3 mt-2" alt="" style="width: 100px;">
                                @break

                                @case('firefox')
                                <img src="/admin_assets/global_assets/images/browsers/firefox.png" class="mb-3 mt-2" alt="" style="width: 100px;">
                                @break

                                @case('internet explorer')
                                <img src="/admin_assets/global_assets/images/browsers/ie.png" class="mb-3 mt-2" alt="" style="width: 100px;">
                                @break

                                @default
                                <img src="/admin_assets/global_assets/images/browsers/chrome.png" class="mb-3 mt-2" alt="" style="width: 100px;">
                            @endswitch

                            <ul class="list list-unstyled mb-0">
                                <li>Visit Year-Month : <span style="color: #eea236"> {{  substr($visit->year_month,0,4) . '-' .substr($visit->year_month,4,2) }}</span></li>
                                <li>Register Date :<span style="color: #eea236"> {{$visit->created_at}}</span></li>
                                <li>User IP :<span style="color: #eea236"> {{$visit->user_ip}}</span></li>
                            </ul>
                            <span class="text-muted"> </span>

                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="mb-4">
                            <div class="text-sm-right">
                                @switch(strtolower($visit->device_type))

                                    @case('computer')
                                    <img src="/admin_assets/global_assets/images/devices/pc.png" class="mb-3 mt-2" alt="" style="width: 100px;">
                                    @break

                                    @case('tablet')
                                    <img src="/admin_assets/global_assets/images/devices/tablet.png" class="mb-3 mt-2" alt="" style="width: 100px;">
                                    @break

                                    @case('mobile')
                                    <img src="/admin_assets/global_assets/images/devices/mobile.png" class="mb-3 mt-2" alt="" style="width: 100px;">
                                    @break

                                    @case('bot')
                                    <img src="/admin_assets/global_assets/images/devices/bot.png" class="mb-3 mt-2" alt="" style="width: 100px;">
                                    @break

                                    @default
                                    <img src="/admin_assets/global_assets/images/devices/laptop.png" class="mb-3 mt-2" alt="" style="width: 100px;">
                                @endswitch
                                <h4 class="text-orange-300 mb-2 mt-md-2">IP : {{$visit->user_ip}}</h4>
                                <ul class="list list-unstyled mb-0">
                                    <li>Visit Date: <span class="font-weight-semibold" style="color: #eea236"> {{$visit->created_at}}</span></li>
                                    <li>Post Type: <span class="font-weight-semibold" style="color: #eea236">{{$visit->post_type}}</span></li>
                                    <li>Category Id: <span class="font-weight-semibold" style="color: #eea236">{{$visit->category_id}}</span></li>
                                    <li>Post Id: <span class="font-weight-semibold" style="color: #eea236">{{$visit->post_id}}</span></li>
                                    <li>Browser Name: <span class="font-weight-semibold" style="color: #eea236">{{$visit->browser_name}}</span></li>
                                    <li>Browser Version: <span class="font-weight-semibold" style="color: #eea236">{{$visit->browser_version}}</span></li>
                                    <li>Device Type: <span class="font-weight-semibold" style="color: #eea236">{{$visit->device_type}}</span></li>
                                    <li>Device Name: <span class="font-weight-semibold" style="color: #eea236">{{$visit->device_name}}</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

{{--                <div class="d-md-flex flex-md-wrap">--}}

{{--                    <div class="mb-2 ml-auto">--}}
{{--                        <span class="text-muted">جزییات بازدید:</span>--}}
{{--                        <div class="d-flex flex-wrap wmin-md-400">--}}
{{--                            <ul class="list list-unstyled mb-0">--}}
{{--                                <li><h5 class="my-2">Total Due:</h5></li>--}}
{{--                                <li>آی پی :</li>--}}
{{--                                <li>کشور:</li>--}}
{{--                                <li>تاریخ شمسی:</li>--}}
{{--                                <li>تاریخ میلادی:</li>--}}
{{--                                <li>IBAN:</li>--}}
{{--                                <li>SWIFT code:</li>--}}
{{--                            </ul>--}}

{{--                            <ul class="list list-unstyled text-right mb-0 ml-auto">--}}
{{--                                <li><h5 class="font-weight-semibold my-2">$8,750</h5></li>--}}
{{--                                <li><span class="font-weight-semibold">Profit Bank Europe</span></li>--}}
{{--                                <li>United Kingdom</li>--}}
{{--                                <li>London E1 8BF</li>--}}
{{--                                <li>3 Goodman Street</li>--}}
{{--                                <li><span class="font-weight-semibold">KFH37784028476740</span></li>--}}
{{--                                <li><span class="font-weight-semibold">BPT4E</span></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>

            <div class="card-footer border-light">
                <?php print_r($ipInfo); ?>
            </div>

        </div>
        <!-- /invoice template -->
    </div>
@endisset

