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



    <div class="content">


        <!-- Detached content -->
        <form action="/admin/answer" method="post" id="frmMail" name="frmMail">
            {{csrf_field()}}
            <input type="hidden" name="parent" value="@isset($contact)  {{$contact->id}} @endisset">
        <div class="container-detached">
            <div style="margin-right: 0;" class="content-detached">
                <!-- Single line -->
                <div class="panel panel-white">

                    <!-- Mail toolbar -->
                    <div class="panel-toolbar panel-toolbar-inbox">
                        <div class="navbar navbar-default">
                            <ul class="nav navbar-nav visible-xs-block no-border">
                                <li>
                                    <a class="text-center collapsed legitRipple" data-toggle="collapse"
                                       data-target="#inbox-toolbar-toggle-single">
                                        <i class="icon-circle-down2"></i>
                                    </a>
                                </li>
                            </ul>

                            <div class="navbar-collapse collapse" id="inbox-toolbar-toggle-single">
                                <div class="btn-group navbar-btn">
                                    <button id="btnSendMail" type="button" class="btn bg-blue legitRipple"><i
                                            class="icon-checkmark3 position-left"></i> ارسال نامه
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="divider"></div>
                    </div>
                    <!-- /mail toolbar -->
                    <div class="panel-body">
                        <div class="form-group">
                            <label>به :</label>
                            <input minlength="5" id="to" name="to" type="text" class="form-control"
                                   placeholder=" ارسال نامه به  " required="required" value="@if(isset($contact)) {{$contact->email}} @else {{old("to")}} @endif">
                            <label class="validation-error-label error" hidden="hidden" for="to"></label>

                        </div>
                        <div class="form-group">
                            <label>عنوان:</label>
                            <input minlength="5" id="subject" name="subject" type="text" class="form-control"
                                   placeholder=" عنوان " required="required" value="@if(isset($contact)) {{$contact->subject}} @else {{old("subject")}} @endif">
                            <label class="validation-error-label error" hidden="hidden" for="subject"></label>

                        </div>
                    </div>
                    <textarea name="message" id="editor">@if(isset($contact)) {{$contact->message}} @else {{old("message")}} @endif</textarea>


                </div>
                <!-- /single line -->
            </div>
        </div>
        </form>
    </div>
@endsection
@push("script")
    <script type="text/javascript" src="/admin_assets/custom/forms/mail.js"></script>

    <script>
        $("body").addClass("sidebar-main-hidden has-detached-left");
    </script>
    {{--<script type="text/javascript" src="/admin_assets/assets/js/pages/mail_list.js"></script>--}}
    <script type="text/javascript" src="/admin_assets/ckeditor/ckeditor.js"></script>
    <script>
      var  editor = CKEDITOR.replace('editor', {
            filebrowserImageBrowseUrl: '/filemanager?type=Images',
            filebrowserBrowseUrl: '/filemanager?type=Files',
            language: 'fa'
        });

        editor.on('change', function (evt) {
            $("#editor").val(evt.editor.getData());
        });
    </script>
@endpush

