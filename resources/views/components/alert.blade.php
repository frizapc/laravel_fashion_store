@props(['type' => 'info', 'message'])
<div {{ $attributes->merge(['class'=> 'alert-'.$type]) }}>
    <p>
        {{$title}}
    </p>
    <p>
        {{$message}}
    </p>
    
    @if ($slot->isEmpty())
        <p>
            This is default content if the slot is empty.
        </p>
    @else
        {{ $slot }}
    @endif
</div>


<select>
    @foreach($options as $option)
    <option {{ $isSelected($option) ? 'selected' : '' }} value="{{ $option }}">{{ $option }}</option>
    @endforeach
</select>