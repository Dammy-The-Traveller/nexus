@props(['active' => false, 'type' => 'a'])

 {{-- a prop is anything that is not an attribute so any props we declare laravel would assume it is not an attribute like if we say active = "foobar" in something like "<x-nav-link href="/jobs"  :active="request()->is('jobs')" active = "foobar">Jobs</x-nav-link>" laravel would ignore it because we declared it as a props already and once we declare anything up there as props we have the variable already like active we have $active variable already --}}

 {{-- <a class="{{ $active ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'}} rounded-md  px-3 py-2 text-sm font-medium" aria-current="{{ $active ? 'page' : 'false'}}" {{$attributes}}>{{$slot}}</a> --}}

 @if($type == 'a')
 <a class="{{ $active ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'}} rounded-md  px-3 py-2 text-sm font-medium" aria-current="{{ $active ? 'page' : 'false'}}" {{$attributes}}>{{$slot}}</a>
 @else
 <button class="{{ $active ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'}} rounded-md  px-3 py-2 text-sm font-medium" aria-current="{{ $active ? 'page' : 'false'}}" {{$attributes}}>{{$slot}}</button>
 @endif