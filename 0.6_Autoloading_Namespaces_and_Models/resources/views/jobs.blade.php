<x-layout>
   <x-slot:heading>
      Job Page
   </x-slot:heading>
<ul>
   @foreach ($jobs as $job)
     <li>
      <a href="jobs/{{ $job['id']}}" class="text-blue-500 hover:underline">
         <strong>{{ $job['title'] }} : </strong> {{ $job['salary'] }} per year
      </a>
     </li> 
   @endforeach
</ul>   
</x-layout>