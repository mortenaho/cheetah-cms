<div class="card card-sidebar-mobile">
    <ul class="nav nav-sidebar" data-nav-type="accordion">

        <!-- Main -->
        <li class="nav-item-header">
            <div class="text-uppercase font-size-xs line-height-xs">{{trans('admin.dashboard')}}</div>
            <i class="icon-menu" title="Main"></i>
        </li>
        <li class="nav-item">
            <a href="/admin" class="nav-link {{$CurrentPage==="dashboard"?"active":null}}">
                <i class="icon-home4"></i>
                <span>
					{{trans('admin.mainPage')}}
				</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="/admin/category" class="nav-link {{$CurrentPage==="category"?"active":null}}">
                <i class="icon-folder" style="color: #ecef1b"></i>
                <span>
					{{trans('admin.categories')}}
				</span>
            </a>
        </li>

        <li class="nav-item ">
            <a href="/admin/menu" class="nav-link {{$CurrentPage==="menu"?"active":null}}">
                <i class="icon-menu2 " style="color: #e83e8c"></i>
                <span>

                {{trans('admin.menus')}}
                </span>
            </a>
        </li>

        <?php $plugins = \Illuminate\Support\Facades\Cache::get("site_plugin"); ?>
        @php
          $li_open_style="";
          $ul_open_style=" style=display:none; ";
          if($CurrentPage==="post"){
              $li_open_style=" nav-item-open ";
              $ul_open_style=" style=display:block; ";
          }
          if($CurrentPage==="page"){
              $li_open_style=" nav-item-open ";
              $ul_open_style=" style=display:block; ";
          }
          foreach($plugins as $plugin)  {
            if($CurrentPage==="$plugin->name"){
                $li_open_style=" nav-item-open ";
                $ul_open_style=" style=display:block; ";
            }
          }
        @endphp

        <li class="nav-item nav-item-submenu {{$li_open_style}}">
            <a href="#" class="nav-link" >
                <i class="icon-book" style="color: #5d9c0a"></i>
                محتوا
            </a>
            <ul class="nav nav-group-sub" {{$ul_open_style}} >
                <li class="nav-item" >
                    <a href="/admin/post" class="nav-link {{$CurrentPage==="post"?"active":null}}">
                        <i class="icon-book2" style="color: #5d9c0a"></i>
                        <span>
					{{trans('admin.posts')}}
				</span>
                    </a>
                </li>
                <li class="nav-item" >
                    <a href="/admin/pages" class="nav-link {{$CurrentPage==="page"?"active":null}}">
                        <i class="icon-book3" style="color: #5d9c0a"></i>
                        <span>
					{{trans('admin.pages')}}
				</span>
                    </a>
                </li>

                @foreach($plugins as $item)
                 @if($item->name !="product")
                    <li class="nav-item">
                        <a href="/admin/{{$item->name}}"
                           class="nav-link {{$CurrentPage==="$item->name"?"active":null}}">
                            <i class="{{$item->icon}}" style="color: #5d9c0a"></i>
                            <span>
					            {{$item->title}}
				            </span>
                        </a>
                    </li>
                    @else
                        @if (env('SHOP_ACTIVATE') != '1')
                            <li class="nav-item">
                                <a href="/admin/{{$item->name}}"
                                   class="nav-link {{$CurrentPage==="$item->name"?"active":null}}">
                                    <i class="{{$item->icon}}" style="color: #5d9c0a"></i>
                                    <span>
					                    {{$item->title}}
				                    </span>
                                </a>
                            </li>
                        @endif
                     @endif
                @endforeach
            </ul>
        </li>
        @php
            $li_shop_open_style="";
            $ul_shop_open_style=" style=display:none; ";
            if($CurrentPage==="product"){
                $li_shop_open_style=" nav-item-open ";
                $ul_shop_open_style=" style=display:block; ";
            }
            if($CurrentPage==="customers"){
                $li_shop_open_style=" nav-item-open ";
                $ul_shop_open_style=" style=display:block; ";
            }
          if($CurrentPage==="orders"){
                $li_shop_open_style=" nav-item-open ";
                $ul_shop_open_style=" style=display:block; ";
            }
        @endphp
        @if (env('SHOP_ACTIVATE') == '1')
        <li class="nav-item nav-item-submenu {{$li_shop_open_style}}">
            <a href="#" class="nav-link" >
                <i class="icon-cart" style="color: #8959a8"></i>
                فروشگاه
            </a>
            <ul class="nav nav-group-sub" {{$ul_shop_open_style}} >
                <li class="nav-item" >
                    <a href="/admin/category/product" class="nav-link {{$CurrentPage==="category"?"active":null}}">
                        <i class="icon-folder-open2" style="color: #8959a8"></i>
                        <span>
					   دسته بندی محصولات
				</span>
                    </a>
                </li>
                <li class="nav-item" >
                    <a href="/admin/product" class="nav-link {{$CurrentPage==="product"?"active":null}}">
                        <i class="icon-box" style="color: #8959a8"></i>
                        <span>
					     محصولات
				</span>
                    </a>
                </li>
                <li class="nav-item" >
                    <a href="/admin/customers" class="nav-link {{$CurrentPage==="customers"?"active":null}}">
                        <i class="icon-people" style="color: #8959a8"></i>
                        <span>
					     مشتریان
				</span>
                    </a>
                </li>
                <li class="nav-item" >
                    <a href="/admin/orders" class="nav-link {{$CurrentPage==="orders"?"active":null}}">
                        <i class="icon-cart2" style="color: #8959a8"></i>
                        <span>
					     سفارشات
				</span>
                    </a>
                </li>
            </ul>
        </li>
        @endif

        <li class="nav-item-header">{{trans('admin.siteInfo')}} <i class="icon-menu" title=""
                                                                   data-original-title="Forms"></i>
        </li>

        <li class="nav-item ">
            <a href="/admin/about_us" class="nav-link {{$CurrentPage==="about_us"?"active":null}}">
                <i class="icon-info22"></i>
                <span>
                {{trans('admin.about_us')}}
                </span>
            </a>
        </li>
        <li class="nav-item ">
            <a href="/admin/contact_info" class="nav-link {{$CurrentPage==="contact_info"?"active":null}}">
                <i class="icon-info3"></i>
                <span>
                {{trans('admin.contact_info')}}
                </span>
            </a>
        </li>
        <li class="nav-item ">
            <a href="/admin/slider" class="nav-link {{$CurrentPage==="slider"?"active":null}}">
                <i class="icon-gallery"></i>
                <span>
                {{trans('admin.slider')}}
                </span>
            </a>
        </li>
        <li class="nav-item ">
            <a href="/admin/gallery" class="nav-link {{$CurrentPage==="gallery"?"active":null}}">
                <i class="icon-picassa"></i>
                <span>
                گالری تصاویر
                </span>
            </a>
        </li>
        <li class="nav-item ">
            <a href="/admin/Social" class="nav-link {{$CurrentPage==="social"?"active":null}}">
                <i class="icon-make-group"></i>
                <span>
                {{trans('admin.social')}}
                </span>
            </a>
        </li>
        <li class="nav-item ">
            <a href="/admin/ContactUs" class="nav-link {{$CurrentPage==="contact_us"?"active":null}}">
                <i class="icon-mail-read"></i>
                <span> {{trans('admin.contact_us')}}
                                <span class="badge badge-info">{{get_count("contact_us",["status"=>0])}}</span>
                            </span>
            </a>
        </li>
        <li class="nav-item ">
            <a href="/admin/comment" class="nav-link {{$CurrentPage==="comment"?"active":null}}">
                <i class="icon-bubble"></i>
                <span>
                                نظرات
                             <span class="badge badge-info">{{get_count("comments",["status"=>0])}}</span>
                            </span>
            </a>
        </li>
        <li class="nav-item ">
            <a href="/admin/errorLog" class="nav-link {{$CurrentPage==="errorLog"?"active":null}}">
                <i class="icon-alert"></i>
                <span>
                {{trans('admin.errorManagement')}}
                </span>
            </a>
        </li>


        <li class="nav-item-header">سئو و بازدید <i class="icon-menu" title=""
                                                    data-original-title="Forms"></i></li>
        <li class="nav-item ">
            <a href="/admin/seo" class="nav-link {{$CurrentPage==="seo"?"active":null}}">
                <i class="icon-google" style="color: #eea236"></i>
                <span>
                تنظیمات سئو
                </span>
            </a>
        </li>
        <li class="nav-item ">
            <a href="/admin/visits" class="nav-link {{$CurrentPage==="visits"?"active":null}}">
                <i class="icon-eye" style="color: #eea236"></i>
                <span>
               لیست بازدید
                </span>
            </a>
        </li>
        <li class="nav-item ">
            <a href="/admin/statistics" class="nav-link {{$CurrentPage==="statistics"?"active":null}}">
                <i class="icon-chart" style="color: #eea236"></i>
                <span>
               آمار بازدید
                </span>
            </a>
        </li>
{{--        <li class="nav-item ">--}}
{{--            <a href="/admin/sitemap" id="layout1" class="nav-link {{$CurrentPage==="sitemap"?"active":null}}">--}}
{{--                <i class="icon-file-xml"  style="color: #eea236"></i>--}}
{{--                <span>--}}
{{--                تنظیمات SiteMap--}}
{{--                </span>--}}
{{--            </a>--}}
{{--        </li>--}}


        <li class="nav-item-header">تنظیمات <i class="icon-menu" title=""
                                               data-original-title="Forms"></i></li>
        <li class="nav-item ">
            <a href="/admin/plugin" class="nav-link {{$CurrentPage==="plugin"?"active":null}}">
                <i class="icon-power-cord" style="color: #0f74a8"></i>
                <span>
                افزونه ها
                </span>
            </a>
        </li>
        <li class="nav-item ">
            <a href="/admin/themes" class="nav-link {{$CurrentPage==="themes"?"active":null}}">
                <i class="icon-puzzle2" style="color: #0f74a8"></i>
                <span>
                {{trans('admin.changeTheme')}}
                </span>
            </a>
        </li>
        <li class="nav-item ">
            <a href="/admin/setting" id="layout1" class="nav-link {{$CurrentPage==="setting"?"active":null}}">
                <i class="icon-cog" style="color: #0f74a8"></i>
                <span>
                {{trans('admin.settings')}}
                </span>
            </a>
        </li>



        <!-- /main -->

    </ul>
</div>


