<x-layout>
  <x-slot:heading>
    JOBS
</x-slot:heading>
  
<div class="space-y-4">
  @foreach ($jobs as $job)
    <a href="/jobs/{{$job ['id']}}" class=" block px-4 py-6 border-gray-2000 rounded-lg">
      <div class="font-bold text-blue-500 text-sm">{{$job->employer->name}}</div>
      <div>
      <strong class="text-laracasts">{{$job['title']}}:</strong> Pays {{$job['Salary']}} per year
    </div>
    </a>  
@endforeach

<div>
  {{-- links can't work without pagination --}}
  {{$jobs->links()}}
</div>
</div>

</x-layout> 