<x-layout>
    <x-slot:heading>
      Create Job
  </x-slot:heading>
    
  <form method="POST" action="/jobs">
    @csrf
    <div class="space-y-12">
      <div class="border-b border-gray-900/10 pb-12">
        <h2 class="text-base/7 font-semibold text-gray-900">Create a new job</h2>
        <p class="mt-1 text-sm/6 text-gray-600">We just need a handful of details from you.</p>
  
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          <x-form-field >
           <x-form-label for="title">Title</x-form-label>
            <div class="mt-2">
           <x-form-input name="title" id="title" placeholder="Shift Leader" required> </x-form-input>
             <x-form-error name="title"/>
            </div>
          </x-form-field>
  
          <x-form-field>
            <x-form-label for="salary">salary</x-form-label>
             <div class="mt-2">
            <x-form-input name="salary" id="salary" placeholder="$50,000" required> </x-form-input>
              <x-form-error name="salary"></x-form-error>
             </div>
           </x-form-field>
          {{-- <div class="sm:col-span-4">
            <label for="salary" class="block text-sm/6 font-medium text-gray-900">salary</label>
            <div class="mt-2">
              <div class="flex items-center rounded-md bg-white pl-3 outline outline-1 -outline-offset-1 outline-gray-300 focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600" required>
                
                <input type="text" name="salary" id="salary" class="block min-w-0 grow py-1.5 pl-3 pr-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline focus:outline-0 sm:text-sm/6" placeholder="$50,000" required>
              </div>
              @error('salary')
                 <p class="text-xs text-red-500 font-semibold mt-1"> {{$message}}</p>
              @enderror
            </div>
          </div> --}}
        </div>

        {{-- <div class="mt-10">
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error )
                    <li class="text-red-500 italic">
                        {{$error}}
                    </li>
                @endforeach
            </ul>
        
            
        @endif
    </div> --}}
      </div>
  
  
  

    </div>
  
    <div class="mt-6 flex items-center justify-end gap-x-6">
      <button type="button" class="text-sm/6 font-semibold text-gray-900">Cancel</button>
      <x-form-button>Save</x-form-button>
    </div>
  </form>
  
  
  </x-layout>