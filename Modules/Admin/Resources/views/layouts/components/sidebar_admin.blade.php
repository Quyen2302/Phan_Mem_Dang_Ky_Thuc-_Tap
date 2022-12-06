

<li class="treeview {{ Route::is('nguoi-dung.index') || Route::is('nguoi-dung.create') || Route::is('chuc-nang.index') ? 'active menu-open' : '' }} }} ">


    <a href="#">
        <i class="fa fa-cogs"></i> <span>Cấu hình hệ thống</span>
        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Route::is('nguoi-dung.index') ? 'active' : '' }}"><a href="{{ route('nguoi-dung.index') }}"><i class="fa fa-circle-o"></i> Người dùng</a></li>
        <li class="{{ Route::is('vai-tro.index') ? 'active' : '' }}"><a href="{{ route('vai-tro.index') }}"><i class="fa fa-circle-o"></i>Quyền hạn</a></li>
    </ul>
</li>
<li class="{{  Route::is('doanh-nghiep.index') ? 'active' : '' }} ">
    <a href="{{route('doanh-nghiep.index')}}">
        <i class="fa fa-user-plus" ></i> <span>Doanh nghiệp</span>
        <span class="pull-right-container">
            </span>
    </a>
</li>
