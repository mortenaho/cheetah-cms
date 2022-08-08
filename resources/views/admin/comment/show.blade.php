@extends("admin.shared._AdminLayout",["title"=>"نظرات","AjaxToken"=>true])

@section("pageHeader")

    @include("admin.shared._PageHeader",
    ["pageTitle"=>"نظرات",
    "pageHeaderLinks"=>[
    ],
     "pageHeaderActive"=>trans("admin.comment"),
     "InsertLink"=>null
    ])



@endsection

@section("body")

    {!! AdminHelper::TempData("msg") !!}

    <?php $date = explode('-', $comment->created_at);

    if (str_start($date[1], "0"))
        $date[1] = substr($date[1], 1, 1);
    if (str_start($date[2], "0"))
        $date[2] = substr($date[2], 1, 1);
    $date = gregorian_to_jalali(trim($date[0]), $date[1], $date[2], '/')
    ?>


    <div class="content">


        <!-- Detached content -->
        <div class="container-detached">
            <div style="margin-right: 0;" class="content-detached">
                <!-- Single line -->
                <div class="card">

                    <div class="navbar navbar-light bg-light navbar-expand-lg py-lg-2 rounded-top">
                        <div class="text-center d-lg-none w-100">
                            <button type="button" class="navbar-toggler w-100 h-100" data-toggle="collapse"
                                    data-target="#inbox-toolbar-toggle-read">
                                <i class="icon-circle-down2"></i>
                            </button>
                        </div>

                        <div class="navbar-collapse text-center text-lg-left flex-wrap collapse"
                             id="inbox-toolbar-toggle-read">
                            <div class="mt-3 mt-lg-0 mr-lg-3">
                                <div class="btn-group">
                                    <a href="/admin/comment/replay/{{$comment->id}}" class="btn btn-light">
                                        <i class="icon-reply"></i>
                                        <span class="d-none d-lg-inline-block ml-2">پاسخ</span>
                                    </a>
                                    <a href="/admin/comment/close/{{$comment->id}}" class="btn btn-light">
                                        <i class="icon-close2"></i>
                                        <span class="d-none d-lg-inline-block ml-2">بستن دیدگاه</span>
                                    </a>
                                    <a href="/admin/comment/delete/{{$comment->id}}" class="btn btn-light">
                                        <i class="icon-bin"></i>
                                        <span class="d-none d-lg-inline-block ml-2">حذف</span>
                                    </a>

                                </div>
                            </div>

                            <div class="navbar-text ml-lg-auto"> ارسال شده در تاریخ : {{$date}}</div>

                            <div class="ml-lg-3 mb-3 mb-lg-0">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-light">
                                        <i class="icon-printer"></i>
                                        <span class="d-none d-lg-inline-block ml-2">چاپ</span>
                                    </button>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /mail toolbar -->


                    <!-- Mail details -->


                    <div class="card-body">
                        <div class="media flex-column flex-md-row">
                            <a href="#" class="d-none d-md-block mr-md-3 mb-3 mb-md-0">
											<span class="btn bg-teal-400 btn-icon btn-lg rounded-round">
												<span class="letter-icon">A</span>
											</span>
                            </a>

                            <div class="media-body">
                                <h6 class="mb-0">تاریخ  :{{$date}}</h6>
                                <div class="letter-icon-title font-weight-semibold">{{$comment->full_name}} <a href="#">&lt;{{$comment->email}}
                                        &gt;</a></div>
                            </div>


                        </div>
                    </div>
                    <!-- /mail details -->
                    <!-- Mail container -->
                    <div class="card-body">

                        <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                            <tbody>
                            <tr>
                                <td align="center" bgcolor="#f67b7c"
                                >
                                    <table width="640" border="0" cellpadding="0" cellspacing="0" align="center">
                                        <tbody>
                                        <tr>
                                            <td width="100%" height="15"></td>
                                        </tr>
                                        <tr>
                                            <td align="center">

                                                <!-- Subtitle -->
                                                <table width="600" border="0" cellpadding="0" cellspacing="0"
                                                       align="center">
                                                    <tbody>
                                                    <tr>
                                                        <td width="100%" height="30"></td>
                                                    </tr>
                                                    <tr>
                                                        <td valign="middle" width="100%">
                                                            <table width="600" border="0" cellpadding="0"
                                                                   cellspacing="0" align="center">
                                                                <tbody>
                                                                <tr>
                                                                    <td width="30"></td>
                                                                    <td width="540" align="center"
                                                                        style="font-size: 14px; color: #ffffff; line-height: 24px;">
                                                                        نام و نام خانوادگی : {{$comment->full_name}}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="30"></td>
                                                                    <td width="540" align="center"
                                                                        style="font-size: 14px; color: #ffffff; line-height: 24px;">
                                                                        ایمیل : {{$comment->email}}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="30"></td>
                                                                    <td width="540" align="center"
                                                                        style="font-size: 14px; color: #ffffff; line-height: 24px;">
                                                                        آی پی : {{$comment->author_ip}}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="30"></td>
                                                                    <td width="540" align="center"
                                                                        style="font-size: 14px; color: #ffffff; line-height: 24px;">
                                                                        تاریخ و زمان ارسال : {{$date}}
                                                                    </td>
                                                                </tr>

                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                <!-- /subtitle -->
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="100%" height="50"></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            </tbody>
                        </table>

                        <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center"
                               style="min-height: 120px">
                            <tbody>
                            <tr>
                                <td width="100%" valign="middle" bgcolor="#888" align="center">


                                    <!-- Email sample (demo) -->
                                {!! $comment->content !!}
                                <!-- /email sample (demo) -->

                                </td>
                            </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
                <!-- /single line -->
            </div>
        </div>
    </div>
@endsection
@push("script")
    <script src="/admin_assets/custom/datatables/comment.js"></script>
    <script>
        $("body").addClass("sidebar-main-hidden has-detached-left");
    </script>
    <script type="text/javascript" src="/admin_assets/assets/js/pages/mail_list.js"></script>
@endpush

