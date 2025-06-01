@props(['active' => false, 'type' => 'a'])

@if($type = 'a')
   <a  class="{{ $active ? 'bg-gray-900 text-white' : 'hover:bg-gray-700 text-gray-300 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium" aria-current="{$active ? 'page':'false'}}" {{ $attributes}}>
    {{ $slot }}
   </a>
@else
   <button  class="{{ $active ? 'bg-gray-900 text-white' : 'hover:bg-gray-700 text-gray-300 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium" aria-current="{$active ? 'page':'false'}}" {{ $attributes}}>
    {{ $slot }}
   </button>
@endif