<select
    name="menu_options[{{ $index }}][option_values][]"
    class="form-control my-2"
    data-option-price
>
    <option>@lang('admin::lang.text_select')</option>
    @foreach ($optionValues as $optionValue)
        @php $isSelected = ($cartItem AND $cartItem->hasOptionValue($optionValue->menu_option_value_id)); @endphp
        <option
            value="{{ $optionValue->menu_option_value_id }}"
            @if (($cartItem AND $cartItem->hasOptionValue($optionValue->menu_option_value_id)) OR $optionValue->isDefault())
            selected="selected"
            @endif
            data-option-price="{{ $optionValue->price }}"
        >{{ $optionValue->name }}{!! ($optionValue->price > 0 || !$hideZeroOptionPrices ? '&nbsp;&nbsp;-&nbsp;&nbsp;'.lang('main::lang.text_plus').currency_format($optionValue->price) : '') !!}</option>
    @endforeach
</select>