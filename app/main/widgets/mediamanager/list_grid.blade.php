<div class="media-list row no-gutters">
    @foreach ($items as $item)
        <div class="media-item col-2">
            <div
                class="media-thumb"
                data-media-item
                data-media-item-name="{{ $item->name }}"
                data-media-item-type="{{ $item->type}}"
                data-media-item-path="{{ $item->path }}"
                data-media-item-size="{{ $item->sizeToString() }}"
                data-media-item-modified="{{ $item->lastModifiedAsString() }}"
                data-media-item-url="{{ $item->publicUrl }}"
                data-media-item-dimension="{{ isset($item->thumb['dimension']) ? $item['thumb']['dimension'] : '--' }}"
                data-media-item-folder="{{ $currentFolder }}"
                data-media-item-data='@json($item)'
                @if ($item->name == $selectItem OR $loop->iteration == 0) data-media-item-marked=""@endif
            >
                <a>
                    <img
                        alt="{{ $item->name }}" class="img-responsive"
                        src="{{ $item->publicUrl }}"
                    />
                </a>
            </div>
        </div>
    @endforeach
</div>
