<li class="{{  Route::is('quanly') ? 'active' : '' }} ">
    <a href="{{route('quanly')}}">
        <i class="fa fa-user-plus" ></i> <span>Sinh viên chờ cấp user</span>
        <span class="pull-right-container">
            </span>
    </a>
</li>
<li class="treeview  {{  Route::is('cong-viec.create') || Route::is('cong-viec.create')|| Route::is('congViecDaGiao')|| Route::is('congViecDaHoanThanh')  ? 'active menu-open' : '' }}  ">


    <a href="#">
        <i class="fa fa-briefcase"></i> <span>Quản lý công việc</span>
        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Route::is('cong-viec.create') ? 'active' : '' }}"><a href="{{route('cong-viec.create')}}"><i class="fa fa-circle-o"></i> Giao việc</a></li>
        <li class="{{ Route::is('congViecDaGiao') ? 'active' : '' }}"><a href="{{route('congViecDaGiao')}}"><i class="fa fa-circle-o"></i>Công việc đang xử lý </a></li>
        <li class="{{ Route::is('congViecDaHoanThanh') ? 'active' : '' }}"><a href="{{route('congViecDaHoanThanh')}}"><i class="fa fa-circle-o"></i>Công việc đã hoàn thành</a></li>
    </ul>
</li>
