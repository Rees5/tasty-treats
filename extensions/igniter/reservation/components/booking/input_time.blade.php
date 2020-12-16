<select
    name="time"
    id="time"
    class="form-control"
>
    @foreach ($timeOptions as $key => $value)
        <option
            value="{{ $value->rawTime }}"
            {!! set_select('time', $value->rawTime) !!}
            {!! $value->fullyBooked ? 'disabled="disabled"' : '' !!}
        >{{ $value->time }}</option>
    @endforeach
</select>
