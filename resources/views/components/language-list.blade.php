<div class="social-icons">
    <ul class="list-inline">
        @foreach ($list as $item)
            <li>
                <a href="{{ route('locale.swapper',$item->code) }}" class="text-white">
                    {{ $item->name }}
{{--                    <i class="flag-icon flag-icon-{{ $item->flag }}"></i>--}}
                </a>
            </li>
        @endforeach
    </ul>
</div>
