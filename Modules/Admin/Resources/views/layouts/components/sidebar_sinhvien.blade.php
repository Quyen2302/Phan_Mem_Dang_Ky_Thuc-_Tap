<li class="treeview active menu-open ">


    <a href="#">
        <i class="fa fa-briefcase"></i> <span>Quản lý công việc</span>
        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Route::is('cong-viec.index') ? 'active' : '' }}"><a href="{{route('cong-viec.index')}}"><i class="fa fa-circle-o"></i> Công việc mới</a></li>
        <li class="{{ Route::is('vai-tro.index') ? 'active' : '' }}"><a href=""><i class="fa fa-circle-o"></i>Công việc đang xử lý </a></li>
        <li class="{{ Route::is('vai-tro.index') ? 'active' : '' }}"><a href=""><i class="fa fa-circle-o"></i>Công việc đã hoàn thành</a></li>
    </ul>
</li>
