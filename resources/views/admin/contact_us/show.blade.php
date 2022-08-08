@extends("admin.shared._AdminLayout",["title"=>trans("admin.contact_us"),"AjaxToken"=>true])

@section("pageHeader")

    @include("admin.shared._PageHeader",
    ["pageTitle"=>trans("admin.contact_us"),
    "pageHeaderLinks"=>[
    ],
     "pageHeaderActive"=>trans("admin.contact_us"),
     "InsertLink"=>null
    ])



@endsection

@section("body")

    {!! AdminHelper::TempData("msg") !!}

    <?php $date = explode('-', $contacts->created_at);

    if (str_start($date[1], "0"))
        $date[1] = substr($date[1], 1, 1);
    if (str_start($date[2], "0"))
        $date[2] = substr($date[2], 1, 1);
    $date = gregorian_to_jalali(trim($date[0]), $date[1], $date[2], '/')
    ?>


    <div class="content">

        <div class="card">

            <!-- Action toolbar -->
            <div class="navbar navbar-light bg-light navbar-expand-lg py-lg-2 rounded-top">
                <div class="text-center d-lg-none w-100">
                    <button type="button" class="navbar-toggler w-100 h-100" data-toggle="collapse" data-target="#inbox-toolbar-toggle-read">
                        <i class="icon-circle-down2"></i>
                    </button>
                </div>

                <div class="navbar-collapse text-center text-lg-left flex-wrap collapse" id="inbox-toolbar-toggle-read">
                    <div class="mt-3 mt-lg-0 mr-lg-3">
                        <div class="btn-group">
                            <a href="/admin/replay/{{$contacts->id}}" class="btn btn-light">
                                <i class="icon-reply"></i>
                                <span class="d-none d-lg-inline-block ml-2">پاسخ</span>
                            </a>

                            <a href="/admin/contact_us/is_show/{{$contacts->id}}" class="btn @if($contacts->is_show===1) bg-blue-400 @else bg-slate-400 @endif legitRipple"><i class="icon-eye"></i> <span
                                    class="hidden-xs  position-right">@if($contacts->is_show===1) وضعیت عمومی @else وضعیت خصوصی @endif</span></a>
                            <a href="/admin/contact_us/delete/{{$contacts->id}}" class="btn btn-light">
                                <i class="icon-bin"></i>
                                <span class="d-none d-lg-inline-block ml-2">حذف</span>
                            </a>
{{--                            <div class="btn-group">--}}
{{--                                <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></button>--}}
{{--                                <div class="dropdown-menu dropdown-menu-right">--}}
{{--                                    <a href="#" class="dropdown-item">Select all</a>--}}
{{--                                    <a href="#" class="dropdown-item">Select read</a>--}}
{{--                                    <a href="#" class="dropdown-item">Select unread</a>--}}
{{--                                    <div class="dropdown-divider"></div>--}}
{{--                                    <a href="#" class="dropdown-item">Clear selection</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>
                    </div>

                    <div class="navbar-text ml-lg-auto">{{$date}}</div>

                    <div class="ml-lg-3 mb-3 mb-lg-0">
                        <div class="btn-group">
                            <button type="button" class="btn btn-light">
                                <i class="icon-printer"></i>
                                <span class="d-none d-lg-inline-block ml-2">چاپ</span>
                            </button>
                            <button type="button" class="btn btn-light">
                                <i class="icon-new-tab2"></i>
                                <span class="d-none d-lg-inline-block ml-2">اشتراک گذاری</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /action toolbar -->


            <!-- Mail details -->
            <div class="card-body">
                <div class="media flex-column flex-md-row">
                    <a href="#" class="d-none d-md-block mr-md-3 mb-3 mb-md-0">
											<span class="btn bg-teal-400 btn-icon btn-lg rounded-round">
												<span class="letter-icon">A</span>
											</span>
                    </a>

                    <div class="media-body">
                        <h6 class="mb-0">{{$contacts->subject}}</h6>
                        <div class="letter-icon-title font-weight-semibold">{{$contacts->full_name}} <a href="#">&lt;{{$contacts->email}}&gt;</a></div>
                    </div>


                </div>
            </div>
            <!-- /mail details -->


            <!-- Mail container -->
            <div class="card-body">
                <div class="overflow-auto mw-100">

                    <!-- Email sample (demo) -->
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                        <tbody><tr>
                            <td>

                                <!-- Hero -->
                                <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                                    <tbody><tr>
                                        <td align="center" bgcolor="#f67b7c" style="background-image: url('global_assets/images/backgrounds/panel_bg.png'); background-repeat: repeat;">
                                            <table width="640" border="0" cellpadding="0" cellspacing="0" align="center">
                                                <tbody><tr>
                                                    <td width="100%" height="15"></td>
                                                </tr>
                                                <tr>
                                                    <td align="center">




                                                        <!-- Title -->
                                                        <table width="600" border="0" cellpadding="0" cellspacing="0" align="center">
                                                            <tbody><tr>
                                                                <td valign="middle" align="center" style="font-size: 20px; color: #ffffff; line-height: 30px; font-weight: 100;">
                                                                   <span style="font-weight: 50;">{{$contacts->subject}}</span>
                                                                </td>
                                                            </tr>
                                                            </tbody></table>
                                                        <!-- /title -->


                                                        <!-- Subtitle -->
                                                        <table width="600" border="0" cellpadding="0" cellspacing="0" align="center">
                                                            <tbody><tr>
                                                                <td width="100%" height="30"></td>
                                                            </tr>
                                                            <tr>
                                                                <td valign="middle" width="100%">
                                                                    <table width="600" border="0" cellpadding="0" cellspacing="0" align="center">
                                                                        <tbody><tr>
                                                                            <td width="30"></td>
                                                                            <td width="540" align="center" style="font-size: 14px; color: #ffffff; line-height: 24px;">
                                                                                {!! $contacts->message !!}
                                                                            </td>
                                                                            <td width="30"></td>
                                                                        </tr>
                                                                        </tbody></table>
                                                                </td>
                                                            </tr>
                                                            </tbody></table>
                                                        <!-- /subtitle -->


                                                        <!-- Button -->
                                                        <table width="600" border="0" cellpadding="0" cellspacing="0" align="center">
                                                            <tbody><tr>
                                                                <td height="40"></td>
                                                            </tr>
                                                            <tr>
                                                                <td width="auto" align="center">
                                                                    <table border="0" cellpadding="0" cellspacing="0" align="center">
                                                                        <tbody><tr>
                                                                            <td width="auto" align="center" height="40" bgcolor="#344b61" style="border-radius: 20px; padding-left: 40px; padding-right: 40px; font-weight: 500;">
                                                                                <a href="#" style="color: #ffffff; font-size: 12px; text-decoration: none; text-transform: uppercase; line-height: 34px;">آی پی : {{$contacts->ip}}</a>
                                                                            </td>
                                                                        </tr>
                                                                        </tbody></table>
                                                                </td>
                                                            </tr>
                                                            </tbody></table>
                                                        <!-- /button -->

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="100%" height="50"></td>
                                                </tr>
                                                </tbody></table>
                                        </td>
                                    </tr>
                                    </tbody></table>
                                <!-- /hero -->




                            </td>
                        </tr>
                        </tbody></table>
                    <!-- /email sample (demo) -->

                </div>
            </div>
            <!-- /mail container -->


            <!-- Attachments -->
            <div class="card-body border-top">
                <h6 class="mb-0">2 ضمیمه</h6>

                <ul class="list-inline mb-0">
                    <li class="list-inline-item">
                        <div class="card bg-light py-2 px-3 mt-3 mb-0">
                            <div class="media my-1">
                                <div class="mr-3 align-self-center"><i class="icon-file-pdf icon-2x text-danger-400 top-0"></i></div>
                                <div class="media-body">
                                    <div class="font-weight-semibold">new_december_offers.pdf</div>

                                    <ul class="list-inline list-inline-condensed mb-0">
                                        <li class="list-inline-item text-muted">174 KB</li>
                                        <li class="list-inline-item"><a href="#">View</a></li>
                                        <li class="list-inline-item"><a href="#">Download</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-inline-item">
                        <div class="card bg-light py-2 px-3 mt-3 mb-0">
                            <div class="media my-1">
                                <div class="mr-3 align-self-center"><i class="icon-file-pdf icon-2x text-danger-400 top-0"></i></div>
                                <div class="media-body">
                                    <div class="font-weight-semibold">assignment_letter.pdf</div>

                                    <ul class="list-inline list-inline-condensed mb-0">
                                        <li class="list-inline-item text-muted">736 KB</li>
                                        <li class="list-inline-item"><a href="#">View</a></li>
                                        <li class="list-inline-item"><a href="#">Download</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- /attachments -->

        </div>

    </div>
@endsection
@push("script")
    <script src="/admin_assets/custom/datatables/slider.js"></script>
    <script>
        $("body").addClass("sidebar-main-hidden has-detached-left");
    </script>
    <script type="text/javascript" src="/admin_assets/assets/js/pages/mail_list.js"></script>
@endpush

