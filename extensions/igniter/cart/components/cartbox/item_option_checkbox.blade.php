@foreach ($optionValues as $optionValue)
    <div
        class="custom-control custom-checkbox"
    >
        <input
            type="checkbox"
            class="custom-control-input"
            id="menuOptionCheck{{ $menuOptionValueId = $optionValue->menu_option_value_id }}"
            name="menu_options[{{ $index }}][option_values][]"
            value="{{ $optionValue->menu_option_value_id }}"
            data-option-price="{{ $optionValue->price }}"
            @if (($cartItem AND $cartItem->hasOptionValue($menuOptionValueId)) OR $optionValue->isDefault())
            checked="checked"
            @endif
        >
        <label
            class="custom-control-label w-100"
            for="menuOptionCheck{{ $menuOptionValueId }}"
        >
            {!! $optionValue->name !!}
            @if ($optionValue->price > 0 || !$hideZeroOptionPrices)
                <span class="pull-right">@lang('main::lang.text_plus'){{ currency_format($optionValue->price) }}</span>
            @endif
        </label>
    </div>
@endforeach
