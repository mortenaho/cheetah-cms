@isset($order)

    <div class="col-lg-12">

        <!-- Invoice template -->
        <div class="card">
            <div class="card-header bg-transparent border-bottom header-elements-inline">
                <h6 class="card-title">مشخصات فاکتور</h6>
                <div class="header-elements">
                    <button type="button" class="btn btn-light btn-sm"><i class="icon-file-check mr-2"></i> ذخیره</button>
                    <button type="button" class="btn btn-light btn-sm ml-3"><i class="icon-printer mr-2"></i> چاپ</button>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-4">
                            <img src="global_assets/images/logo_light.png" class="mb-3 mt-2" alt="" style="width: 120px;">
                            <ul class="list list-unstyled mb-0">
                                <li>{{$order->customer_name}}</li>
                                <li>{{$order->customer_mobile}}</li>
                                <li>{{$order->customer_address}}</li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="mb-4">
                            <div class="text-sm-right">
                                <h4 class="text-orange-300 mb-2 mt-md-2"> شماره فاکتور : {{$order->id}} </h4>
                                <ul class="list list-unstyled mb-0">
                                    <li>تاریخ فاکتور: <span class="font-weight-semibold">{{$order->register_date}}</span></li>
{{--                                    <li>Due date: <span class="font-weight-semibold">May 12, 2015</span></li>--}}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

            <div class="table-responsive">
                <table class="table table-lg">
                    <thead>
                    <tr>
                        <th>شرح</th>
                        <th>قیمت واحد</th>
                        <th>تعداد</th>
                        <th>قیمت با تعداد</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($orderDetails) && count($orderDetails)>0)
                        @foreach($orderDetails as $orderDetail)
                            <tr>
                                <td>
                                    <h6 class="mb-0">{{$orderDetail->item_id}}</h6>
                                    <span class="text-muted">{{$orderDetail->item_type}}</span>
                                </td>
                                <td>${{number_format($orderDetail->unit_price)}}</td>
                                <td>{{$orderDetail->item_count}}</td>
                                <td><span class="font-weight-semibold">${{number_format($orderDetail->unit_price * $orderDetail->item_count)}}</span></td>
                            </tr>
                        @endforeach
                    @endif

                    </tbody>
                </table>
            </div>

            <div class="card-body">
                <div class="d-md-flex flex-md-wrap">
                    <div class="pt-2 mb-3">
                        <h6 class="mb-3">مشخصات مشتری</h6>
                        <div class="mb-3">
                            <img src="/admin_assets/images/signature_light.png" width="150" alt="">
                        </div>

                        <ul class="list-unstyled text-muted">
                            <li>{{$order->customer_name}}</li>
                            <li>{{$order->customer_mobile}}</li>
                            <li>{{$order->customer_address}}</li>
                        </ul>
                    </div>

                    <div class="pt-2 mb-3 wmin-md-400 ml-auto">
                        <h6 class="mb-3">جمع بندی</h6>
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <th>مبلغ کل:</th>
                                    <td class="text-right">${{ number_format($order->total_price) }}</td>
                                </tr>
                                <tr>
                                    <th>مالیات: <span class="font-weight-normal">(9%)</span></th>
                                    <td class="text-right">${{ number_format($order->total_price * 0.09) }}</td>
                                </tr>
                                <tr>
                                    <th> مبلق کل به همراه مالیات:</th>
                                    <td class="text-right text-orange-300"><h5 class="font-weight-semibold">${{ number_format($order->total_price + ($order->total_price * 0.09) ) }}</h5></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="text-right mt-3">
                            @if($order->status==0)
                            <button type="button" class="btn btn-primary btn-labeled btn-labeled-left"><b><i class="icon-paperplane"></i></b> پرداخت </button>
                            @else
                                <button type="button" disabled class="btn btn-secondary btn-labeled btn-labeled-left"><b><i class="icon-book3"></i></b> پرداخت شده</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <!-- /invoice template -->
    </div>
@endisset

