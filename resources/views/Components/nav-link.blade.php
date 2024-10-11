@props(['active' => false, 'type' => 'a'])


@if($type === 'a')
<a class="{{ $active ? 'nav-link active' : 'nav-link'}}" aria-current="{{ $active ? 'page' : 'false'}}" {{$attributes}}>{{$slot}}</a>
@else
<button class="{{ $active ? 'nav-link active' : 'nav-link'}}" aria-current="{{ $active ? 'page' : 'false'}}" {{$attributes}}>{{$slot}}</button>
@endif