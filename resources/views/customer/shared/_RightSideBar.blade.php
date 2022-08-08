<div class="card card-sidebar-mobile">
    <ul class="nav nav-sidebar" data-nav-type="accordion">

        <!-- Main -->
        <li class="nav-item-header">
            <div class="text-uppercase font-size-xs line-height-xs">{{trans('admin.dashboard')}}</div>
            <i class="icon-menu" title="Main"></i>
        </li>
        <li class="nav-item">
            <a href="/customer" class="nav-link {{$CurrentPage==="dashboard"?"active":null}}">
                <i class="icon-home4"></i>
                <span>
					صفحه اصلی
				</span>
            </a>
        </li>



        <li class="nav-item-header"> اطلاعات مشتری<i class="icon-menu" title=""
                                                    data-original-title="Forms"></i></li>

        <li class="nav-item" >
            <a href="/customer/orders" class="nav-link {{$CurrentPage==="orders"?"active":null}}">
                <i class="icon-cart2" style="color: #8959a8"></i>
                <span>
					     سفارشات
				</span>
            </a>
        </li>
        <li class="nav-item" >
            <a href="/customer/tikets" class="nav-link {{$CurrentPage==="tikets"?"active":null}}">
                <i class="icon-ticket" style="color: #8959a8"></i>
                <span>
					     تیکتها
				</span>
            </a>
        </li>

        <li class="nav-item-header">تنظیمات <i class="icon-menu" title=""
                                               data-original-title="Forms"></i></li>


        <li class="nav-item" >
            <a href="/customer/profile" class="nav-link {{$CurrentPage==="profile"?"active":null}}">
                <i class="icon-profile" style="color: #eea236"></i>
                <span>
					     پروفایل
				</span>
            </a>
        </li>

        <li class="nav-item" >
            <a href="/customer/logout" class="nav-link ">
                <i class="icon-exit" style="color: #eea236"></i>
                <span>
                    خروج
				</span>
            </a>
        </li>
        <!-- /main -->

    </ul>
</div>


