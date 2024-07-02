@if($configData["mainLayoutType"] === 'horizontal' && isset($configData["mainLayoutType"]))
    <nav class="header-navbar navbar-expand-lg navbar navbar-fixed align-items-center navbar-shadow navbar-brand-center {{ $configData['navbarColor'] }}"
         data-nav="brand-center">
        <div class="navbar-header d-xl-block d-none">
            <ul class="nav navbar-nav">
                <li class="nav-item">
                    <a class="navbar-brand" href="{{url('/')}}">
          <span class="brand-logo">
                        <img src="{{ \App\Helpers\Helper::Setting('logo')->val }}" alt="logo"
                             width="300">
          </span>
                        <h2 class="brand-text mb-0">CMS</h2>
                    </a>
                </li>
            </ul>
            {{--<ul class="nav navbar-nav">
                <li class="nav-item">
                    <a class="navbar-brand" href="{{url('/')}}">
                        <img class="brand-logo" src="{{ \App\Helpers\Helper::Setting('logo')->val }}"
                             alt="logo" width="300">
                    </a>
                </li>
            </ul>--}}
        </div>
        @else
            <nav class="header-navbar navbar navbar-expand-lg align-items-center {{ $configData['navbarClass'] }} navbar-light navbar-shadow {{ $configData['navbarColor'] }}">
                @endif
                <div class="navbar-container d-flex content">
                    <div class="bookmark-wrapper d-flex align-items-center">
                        <ul class="nav navbar-nav d-xl-none">
                            <li class="nav-item">
                                <a class="nav-link menu-toggle" href="javascript:void(0);">
                                    <i class="ficon" data-feather="menu"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <ul class="nav navbar-nav align-items-center ml-auto">
                        <li class="nav-item dropdown dropdown-user">
                            <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user"
                               href="javascript:void(0);" data-toggle="dropdown">
                                <div class="user-nav d-sm-flex d-none">
                                    <span class="user-name font-weight-bolder">{{ Auth::user()->name }}</span>
                                    <span class="user-status">مدیر</span>
                                </div>
                                <div class="avatar">
                                    <img class="round"
                                         src="{{  asset('https://www.gravatar.com/avatar/b2437b6f7f7a17a9e02f3b87673235c1?s=100&d=mp&r=pg') }}"
                                         alt="avatar" height="40"
                                         width="40">
                                    <span class="avatar-status-online"></span>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{{ route('cms.account.edit_profile') }}">
                                    <i class="mr-50" data-feather="user"></i>
                                    ویرایش اطلاعات
                                </a>
                                <a class="dropdown-item" href="{{ route('cms.account.edit_password') }}">
                                    <i class="mr-50" data-feather="settings"></i> ویرایش کلمه عبور
                                </a>
                                <div class="dropdown-divider"></div>
                                <a onclick="$('#frm-logout').submit()" class="dropdown-item" href="javascript:;">
                                    <i class="mr-50" data-feather="power"></i> خروج
                                </a>
                                <form id="frm-logout" method="post" action="{{ route('logout') }}" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

