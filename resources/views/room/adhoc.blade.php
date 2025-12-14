<x-app-admin>
    <p class=" font-bold">Create Adhoc</p>
    <span class=" text-xs">Fill in all the infomation</span>

    <form action="/rooms/Adhoc/" method="POST">
        @csrf
        <div>
             <x-input-label for="name" :value="__('Room Name')" />
            <x-text-input id="name" class="block mt-1 w-full p-2" type='text' name="name" :value="old('name')" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="wifi_bssid" :value="__('Wifi BSSID')" />
            <x-text-input id="wifi_bssid" class="block mt-1 w-full p-2" type="" name="" :value="old('')"  />
            <x-input-error :messages="$errors->get('')" class="mt-2" />
        </div>
        <div>
             <x-input-label for="metadata" :value="__('Metadata')" />
             <section class="pt-4" >
               <div id="metadata-container"></div>
               <span id="add-metadata" class=" px-2 py-1 border rounded cursor-pointer" onclick="AddmetaField()" type="none">Add Metadata</span>
            </section>
        </div>
        <div>
            <x-input-label for="description" :value="__('Description')" />
            {{-- <x-input-textarea name="" id="" /> --}}
            <textarea name="" id="" cols="30" rows="5" class="w-full border rounded mt-2"></textarea>
            <x-input-error :messages="$errors->get('')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="location" :value="__('Location')" />
            <x-text-input id="location" class="block mt-1 w-full p-2" type="" name="" :value="old('')"  />
            <x-input-error :messages="$errors->get('')" class="mt-2" />
        </div>
        {{-- <div>
            <select class="js-example-basic-multiple" name="states[]">
                <option value="AL">Alabama</option>
                <option value="WY">Wyoming</option>
        </select>
        </div> --}}
        <x-primary-button class="mt-2">Apply</x-primary-button>

              

        @push('scripts')
            <script>
    
                // $('.js-example-basic-multiple').select2();

                let target = document.getElementById("metadata-container");
               function AddmetaField(){
                let child = document.createElement('div');
                child.classList.add("flex", "justify-between", "items-center", "mb-3")
                child.innerHTML = ` <input type="text" placeholder="Name" class=" basis-4/12 border border-black p-1 rounded">
                <span>datatype</span>
                <select name="datattype" id="" class="basis-2/12">
                 <option selected>Select a datatype</option>
                <option value="integer">integer</option>
                <option value="string">string</option>
                <option value="datatime">datatime</option>
                <option value="boolean">boolean</option>
                </select>
                <span id="delete-metadata" class=" px-2 py-1 border rounded text-red-500" onclick="deleteField(this)">Delete Metadata</span>`
                target.appendChild(child);   
               }

               function deleteField(button){
                button.parentElement.remove()
                console.log(button);
                
               }

                
            </script>
        @endpush

    </form>
</x-app-admin>