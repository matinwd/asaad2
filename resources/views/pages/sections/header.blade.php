<header class="header-area style-1">
    <div class="header-logo">
        <a href="{{ url('/') }}"><img alt="{{ trans('actions.logo')  . ' ' . env('APP_NAME') }}" title="{{ trans('actions.logo')  . ' ' . env('APP_NAME') }}" src="{{ \App\Helpers\Helper::Setting('logo_light')->value }}"></a>
    </div>
    <div class="main-menu">
        <div class="mobile-logo-area d-lg-none d-flex justify-content-between align-items-center">
            <div class="mobile-logo-wrap ">
                <a href="{{ url('/') }}"><img alt="image" src="{{ \App\Helpers\Helper::Setting('logo_light')->value }}"></a>
            </div>
            <div class="menu-close-btn">
                <i class="bi bi-x-lg"></i>
            </div>
        </div>


        <ul class="menu-list">
           @php($menu = App\Models\Menu::where('name','header')->firstOrFail())
        @foreach ($menu->items as $item)
            @php($hasChildA = isset($item['children']) && is_array($item['children']) && count($item['children']) > 0)
            <li class="{{ $hasChildA ? 'menu-item-has-children' : '' }}">
                <a href="{{ $hasChildA ? 'javascript:;' : (app()->getLocale() != 'en' ? url(app()->getLocale() .$item['url']) : url($item['url'])) }}">{{ $item['name'] ?? $item['title'] }}</a>
                @if($hasChildA)
                    <ul class="submenu">
                        @foreach ($item['children'] ?? [] as $itemC)
                            @php($hasChildB = isset($itemC['children']) && is_array($itemC['children']) && count($itemC['children']) > 0)
                            @if($hasChildB)
                            <li>
                                <a href="javascript:void(0)">{{ $itemC['name'] ?? $itemC['title'] }}</a>
                                <ul class="submenu">
                                    @foreach ($itemC['children'] ?? [] as $itemZ)
                                    <li><a href="{{ $itemZ['url'] ? (app()->getLocale() != 'en' ? url( app()->getLocale()  . $itemZ['url']) : url($itemZ['url']))  : 'javascript:;' }}">{{ $itemZ['name'] ?? $itemZ['title'] }}</a></li>
                                    @endforeach

                                </ul>
                            </li>
                            @else
                                <li>
                                    <a href="{{ $itemC['url'] ?  (app()->getLocale() != 'en' ? url( app()->getLocale()  . $itemC['url']) : url($itemC['url'])) : 'javascript:;' }}">{{ $itemC['name'] ?? $itemC['title'] }}</a>
                                </li>
                            @endif
                        @endforeach
                    </ul>

                @endif
            </li>
        @endforeach
        </ul>

        <div class="d-lg-none d-block">
            <form class="mobile-menu-form mb-5">
                <div class="input-with-btn d-flex flex-column">
                    <input type="text" placeholder="{{ trans('search_modal.placeholder') }}">
                    <button type="submit" class="eg-btn btn--primary3 btn--sm">{{ trans('search_modal.search_btn') }}</button>
                </div>
            </form>
            <div class="hotline two">
                <div class="hotline-info">
                    <span>{{ trans('actions.click_to_call') }}</span>
                    <h6><a href="tel:{{ \App\Helpers\Helper::Setting('footer_phone')->translate('en')->value }}">{{ \App\Helpers\Helper::Setting('footer_phone')->translate('en')->value }}</a></h6>
                </div>
            </div>
        </div>
    </div>
    <div class="nav-right d-flex align-items-center">
        <div class="hotline d-xxl-flex d-none">
            <div class="hotline-icon">
                <img alt="image" src="{{ asset('assets/images/icons/header-phone.svg') }}">
            </div>
            <div class="hotline-info">
                <span>{{trans('actions.click_to_call')}}</span>
                <h6><a href="tel:{{ \App\Helpers\Helper::Setting('footer_phone')->translate('en')->value }}">{{ \App\Helpers\Helper::Setting('footer_phone')->translate('en')->value }}</a></h6>
            </div>
        </div>
        <div class="search-btn">
            <i class="bi bi-search"></i>
        </div><div class="mobile-menu-btn d-lg-none d-block">
            <i class='bx bx-menu'></i>
        </div>
    </div>
</header>
