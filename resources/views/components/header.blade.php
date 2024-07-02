<header id="site-header" class="header">
    <div class="top-bar">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-4">
                    <div class="topbar-link text-{{ $cRight }}">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a href="javascript:;">
                                    <i class="far fa-calendar"></i>
                                    {{ \App\Helpers\Helper::localeIsPersian() ? verta()->format('l d F Y') : now()->format('Y F d l') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 text-center">
{{--
                    <div class="search-box">
                        <form action="/core/contact.php" method="post"
                              class="form-inline my-2 my-lg-0">
                            <input class="form-control" required="" type="search"
                                   placeholder="{{ trans('header.search_place_holder') }}">
                            <button class="btn" type="submit"><i class="fas fa-search"></i>
                            </button>
                        </form>
                    </div>
--}}
                </div>
                <div class="col-md-4 col-sm-6 text-{{ $cLeft }}">
                    <x-language-list/>
                </div>
            </div>
        </div>
    </div>
    <div id="header-wrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Navbar -->
                    <nav class="navbar navbar-expand-lg">
                        <a class="navbar-brand logo" href="/">
                            <img class="img-center logo-a" src="{{ \App\Helpers\Helper::Setting('logo_light')->val }}"
                                 alt="">
                            <img class="img-center logo-b" src="{{ \App\Helpers\Helper::Setting('logo_dark')->val }}"
                                 alt="">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarNavDropdown" aria-expanded="false"
                                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavDropdown">
                            <ul class="nav navbar-nav m{{ $mpRight }}-auto">

                                @foreach ($menu->items as $item)
                                    @php($hasChildA = isset($item['children']) && is_array($item['children']) && count($item['children']) > 0)
                                    @php($isMega = $item['is_mega'] ?? false)
                                    <li class="nav-item {{ $hasChildA ? 'dropdown' : '' }} {{ $isMega ? 'position-static' : '' }}">
                                        <a class="nav-link {{ $hasChildA ? 'dropdown-toggle' : '' }}"
                                           {{ $hasChildA ? 'data-toggle=dropdown' : '' }} href="{{ $hasChildA ? 'javascript:;' : $item['url'] }}">{{ $item['name'] ?? $item['title'] }}</a>
                                        @if($hasChildA)
                                            @if($isMega)
                                                <ul class="dropdown-menu w-100 p-3">
                                                    <li class="container">
                                                        <div class="row w-100">
                                                            @foreach ($item['children'] ?? [] as $itemC)
                                                                <div class="col-lg-4 col-12">
                                                                    @php($hasChildB = isset($itemC['children']) && is_array($itemC['children']) && count($itemC['children']) > 0)
                                                                    @if($hasChildB)
                                                                        <ul class="list-unstyled">
                                                                            @foreach ($itemC['children'] ?? [] as $itemZ)
                                                                                <li>
                                                                                    <a href="{{ $itemZ['url'] ?? 'javascript:;' }}">{{ $itemZ['name'] ?? $itemZ['title'] }}</a>
                                                                                </li>
                                                                            @endforeach
                                                                        </ul>
                                                                    @endif
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </li>
                                                </ul>
                                            @else
                                                <ul class="dropdown-menu">
                                                    @foreach ($item['children'] ?? [] as $itemC)
                                                        @php($hasChildB = isset($itemC['children']) && is_array($itemC['children']) && count($itemC['children']) > 0)
                                                        @if($hasChildB)
                                                            <li class="dropdown dropdown-submenu">
                                                                <a href="javascript:;" class="dropdown-toggle"
                                                                   data-toggle="dropdown">{{ $itemC['name'] ?? $itemC['title'] }}</a>
                                                                <ul class="dropdown-menu">
                                                                    @foreach ($itemC['children'] ?? [] as $itemZ)
                                                                        <li>
                                                                            <a href="{{ $itemZ['url'] ?? 'javascript:;' }}">{{ $itemZ['name'] ?? $itemZ['title'] }}</a>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </li>
                                                        @else
                                                            <li>
                                                                <a href="{{ $itemC['url'] ?? 'javascript:;' }}">{{ $itemC['name'] ?? $itemC['title'] }}</a>
                                                            </li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            @endif
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
