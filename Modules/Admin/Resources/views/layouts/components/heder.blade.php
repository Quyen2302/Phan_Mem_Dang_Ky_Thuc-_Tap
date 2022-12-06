<header class="main-header">
    <a href="#" class="sidebar-toggle sidebar-customize" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
    </a>

    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle sidebar-mobile" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <a href="/" class="logo-customize">
            <img src="{{ asset('logo.webp') }}" alt="" class="brand-logo">
            <div class="logo-text">
                <span class="above-text lg-text text-uppercase">{{ TITLE_APP }}</span>
                <span class="text-uppercase">HỆ THỐNG QUẢN LÝ SINH VIÊN THỰC TẬP</span>
            </div>
        </a>

        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img
                            src="{{ !empty(auth::user()->anh_dai_dien) ? getUrlFile(auth::user()->anh_dai_dien) : asset('images/default-user.png') }}"
                            class="user-image" alt="User Image">
                        <span class="hidden-xs">{{ auth::user()->fullname  }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img
                                src="{{ !empty(auth::user()->anh_dai_dien) ? getUrlFile(auth::user()->anh_dai_dien) : asset('images/default-user.png') }}"
                                class="img-circle" alt="User Image">

                            <p>
                                {{ auth::user()->fullname }}
                                <small>{{ date('d/m/Y') }} </small>
                            </p>
                            <p>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">

                                    <a href="{{ route('nguoi-dung.edit', auth::user()->id) }}"
                                       class="btn btn-default btn-flat">Thông tin</a>
                            </div>
                            <div class="pull-right">
                                <a href="{{ route('logout') }}" class="btn btn-default btn-flat" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Đăng xuất</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>

