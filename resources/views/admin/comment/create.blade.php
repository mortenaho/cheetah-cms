@extends("admin.shared._AdminLayout",["title"=>"نظرات","AjaxToken"=>true])

@section("pageHeader")

    @include("admin.shared._PageHeader",
    ["pageTitle"=>"نظرات",
    "pageHeaderLinks"=>[
    ],
     "pageHeaderActive"=>"نظرات",
     "InsertLink"=>null
    ])



@endsection

@section("body")

    {!! AdminHelper::TempData("msg") !!}



    <div class="content">


        <!-- Detached content -->
        <form action="/admin/comment/answer" method="post" id="frmMail" name="frmMail">
            {{csrf_field()}}
            <input type="hidden" name="id" value="{{$comment->id}}">
            <input type="hidden" name="post_id" value="{{$comment->post_id}}">
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
                                        <button id="btnSendMail" type="button" class="btn bg-blue legitRipple"><i
                                                class="icon-checkmark3 position-left"></i> پاسخ
                                        </button>

                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- /mail toolbar -->
                        <div class="card">
                            <div class="card-body">
                                <i class="icon-comment"></i>  دیدگاه کاربر :
                                {{$comment->content}}
                            </div>
                        </div>
                        <textarea name="content" rows="6" id="editor"> {{old("content")}} </textarea>
                    </div>
                    <!-- /single line -->
                </div>
            </div>
        </form>
    </div>
@endsection
@push("script")
    <script type="text/javascript" src="/admin_assets/custom/forms/comment_replay.js"></script>

    <script>
        $("body").addClass("sidebar-main-hidden has-detached-left");
    </script>
    {{--<script type="text/javascript" src="/admin_assets/assets/js/pages/mail_list.js"></script>--}}
    <script type="text/javascript" src="/admin_assets/ckeditor/ckeditor.js"></script>
    <script>
        var editor = CKEDITOR.replace('editor', {
            filebrowserImageBrowseUrl: '/filemanager?type=Images',
            filebrowserBrowseUrl: '/filemanager?type=Files',
            language: 'fa'
        });

        editor.on('change', function (evt) {
            $("#editor").val(evt.editor.getData());
        });
    </script>
@endpush

