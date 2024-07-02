
<div class="mobile-search">
    <div class="container">
        <form action="{{ route('search') }}" method="get">
            @csrf
            <div class="row d-flex justify-content-center">
                <div class="col-md-11">
                    <label>{{ trans('search_modal.title') }}</label>
                    <input type="text" name="q" placeholder="{{ trans('search_modal.placeholder') }}">
                </div>
                <div class="col-1 d-flex justify-content-end align-items-center">
                    <div class="search-cross-btn">
                        <i class="bi bi-x"></i>
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>
