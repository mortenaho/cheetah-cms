<div class="content">


    <!-- Detached content -->
    <div class="container-detached">
        <div style="margin-right: 0" class="content-detached">
            <!-- Single line -->

            <div class="card">
                <div class="card-header bg-transparent border-bottom header-elements-inline">
                    <h6 class="panel-title">نظرات</h6>
                    <div class="header-elements">
                        <span class="badge bg-blue">{{$comment->count()}} پیام جدید</span>
                    </div>
                </div>

                <!-- Action toolbar -->
                <div class="navbar navbar-light bg-light navbar-expand-lg border-bottom-0 py-lg-2">
                    <div class="text-center d-lg-none w-100">
                        <button type="button" class="navbar-toggler w-100" data-toggle="collapse"
                                data-target="#inbox-toolbar-toggle-single">
                            <i class="icon-circle-down2"></i>
                        </button>
                    </div>

                    <div class="navbar-collapse text-center text-lg-left flex-wrap collapse"
                         id="inbox-toolbar-toggle-single">
                        <div class="mt-3 mt-lg-0">
                            <div class="btn-group">
                                <div class="btn-group navbar-btn">
                                    <button id="checked_all" type="button"
                                            class="btn btn-default btn-icon btn-checkbox-all">
                                        <input type="checkbox" class="styled">
                                    </button>
                                </div>
                            </div>

                            <div class="btn-group ml-3 mr-lg-3">

                                <button type="button" id="btn_delete_mail" class="btn btn-light"><i class="icon-bin"></i> <span
                                        class="d-none d-lg-inline-block ml-2">حذف</span></button>

                            </div>
                        </div>

                        <div class="navbar-text ml-lg-auto"><span class="font-weight-semibold">1-20</span> از <span
                                class="font-weight-semibold">{{$comment->total()}}</span></div>

                        <div class="ml-lg-3 mb-3 mb-lg-0">
                            <div class="btn-group">


                                <a href="{{$comment->previousPageUrl()}}"
                                   class="btn btn-light btn-icon @if($comment->currentPage()===1) disabled @endif"><i
                                        class="icon-arrow-right13"></i></a>
                                <a href="{{$comment->nextPageUrl()}}"
                                   class="btn btn-light btn-icon @if($comment->currentPage()===$comment->lastPage()) disabled @endif"><i
                                        class="icon-arrow-left12"></i></a>

                            </div>

                        </div>
                    </div>
                </div>
                <!-- /action toolbar -->

                <div class="table-responsive">
                    <table class="table table-inbox">
                        <tbody data-link="row" class="rowlink">
                        @foreach($comment as $item)
                            <tr data-row="{{$item->id}}" id="tr_{{$item->id}}"
                                class="@if($item->status==0) info unread @endif">
                                <td class="table-inbox-checkbox rowlink-skip">
                                    <input type="checkbox" class="styled chk_mail" data-row="{{$item->id}}">
                                </td>

                                <td class="table-inbox-image">
											<span class="btn bg-indigo-400 btn-rounded btn-icon btn-xs legitRipple">
												<span class="letter-icon">M</span>
											</span>
                                </td>
                                <td class="table-inbox-name">
                                    <a href="/admin/comment/{{$item->id}}">
                                        <div class="letter-icon-title text-primary">{{$item->full_name}}</div>
                                    </a>
                                </td>
                                <td class="table-inbox-message">
                                    <span class="table-inbox-preview">{{$item->content}}</span>
                                </td>
                                <td class="table-inbox-message">
                                    <span class="table-inbox-subject">Email :{{$item->email}}</span>
                                </td>
                                <td class="table-inbox-time">
                                    <div class="letter-icon-title text-default">IP : {{$item->author_ip}}</div>
                                </td>
                                <td class="table-inbox-time">
                                    {{$item->created_at}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /single line -->
        </div>
    </div>
</div>
