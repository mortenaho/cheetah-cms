<div class="content">
    <!-- Detached content -->
    <div class="container-detached">
        <div style="margin-right: 0" class="content-detached">
            <!-- Single line -->
            <div class="panel panel-white">
                <div class="panel-heading">
                    <h6 class="panel-title">پیام های من</h6>

                    <div class="heading-elements not-collapsible">
                        <span class="label bg-blue heading-text">{{$contacts->count()}} پیام جدید</span>
                    </div>
                </div>

                <div class="panel-toolbar panel-toolbar-inbox">
                    <div class="navbar navbar-default">
                        <ul class="nav navbar-nav visible-xs-block no-border">
                            <li>
                                <a class="text-center collapsed" data-toggle="collapse"
                                   data-target="#inbox-toolbar-toggle-single">
                                    <i class="icon-circle-down2"></i>
                                </a>
                            </li>
                        </ul>

                        <div class="navbar-collapse collapse" id="inbox-toolbar-toggle-single">

                            <div class="btn-group navbar-btn">
                                <button id="checked_all" type="button"
                                        class="btn btn-default btn-icon btn-checkbox-all">
                                    <input type="checkbox" class="styled">
                                </button>

                            </div>
                            <div class="btn-group navbar-btn">

                                <button id="btn_delete_mail" type="button" class="btn btn-default hidden "><i class="icon-bin"></i> <span
                                        class="hidden-xs position-right">حذف</span></button>

                            </div>

                            <div class="navbar-right">
                                <p class="navbar-text"><span class="text-semibold">۱-۲۰</span> از <span
                                        class="text-semibold">{{$contacts->total()}}</span></p>

                                <div class="btn-group navbar-left navbar-btn">
                                    <a href="{{$contacts->previousPageUrl()}}"  class="btn btn-default btn-icon @if($contacts->currentPage()===1) disabled @endif"><i
                                            class="icon-arrow-right13"></i></a>
                                    <a href="{{$contacts->nextPageUrl()}}"  class="btn btn-default btn-icon @if($contacts->currentPage()===$contacts->lastPage()) disabled @endif"><i
                                            class="icon-arrow-left12"></i></a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-inbox">
                        <tbody data-link="row" class="rowlink">
                        @foreach($contacts as $item)
                            <tr  data-row="{{$item->id}}" id="tr_{{$item->id}}" class="@if($item->status==0) info unread @endif">
                                <td class="table-inbox-checkbox rowlink-skip">
                                    <input type="checkbox" class="styled chk_mail" data-row="{{$item->id}}">
                                </td>

                                <td class="table-inbox-image">
											<span class="btn bg-indigo-400 btn-rounded btn-icon btn-xs legitRipple">
												<span class="letter-icon">M</span>
											</span>
                                </td>
                                <td class="table-inbox-name">
                                    <a href="/admin/ContactUs/{{$item->id}}">
                                        <div class="letter-icon-title text-default">{{$item->full_name}}</div>
                                    </a>
                                </td>
                                <td class="table-inbox-message">
                                    <span class="table-inbox-preview">{{$item->message}}</span>
                                </td>
                                <td class="table-inbox-message">
                                    <span class="table-inbox-subject">Email :{{$item->email}}</span>
                                    <span class="table-inbox-preview">Phone : {{$item->mobile}}</span>
                                </td>
                                <td class="table-inbox-time">
                                    <div class="letter-icon-title text-default">IP : {{$item->ip}}</div>
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
