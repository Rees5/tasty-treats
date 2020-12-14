<div class="card">
    <div class="nav flex-column">
        @foreach ($pagesSideMenu->menuItems() as $topItem)
            @foreach ($topItem->items as $item)
                <li class="nav-item">
                    <a
                        class="nav-link{{ ($item->isActive OR $item->isChildActive) ? ' active font-weight-bold' : '' }}"
                        href="{{ $item->url }}"
                        {!! $item->extraAttributes !!}
                    >@lang($item->title)</a>
                </li>
            @endforeach
        @endforeach
    </div>
</div>