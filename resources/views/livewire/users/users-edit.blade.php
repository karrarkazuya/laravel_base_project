<x-jet-form-section submit="updateUser">
    <x-slot name="title">
        @lang('strings.roles')
    </x-slot>

    <x-slot name="description">
        @lang('strings.edit_role')
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{__('strings.name')}}" />

            <x-jet-input id="name"
                        type="text"
                        name="name"
                        class="mt-1 block w-full"
                        wire:model="name" />
                        

            <x-jet-input-error for="name" class="mt-2" />

            <x-jet-label for="email" value="{{__('strings.email')}}" />

            <x-jet-input id="email"
                        type="text"
                        name="email"
                        class="mt-1 block w-full"
                        wire:model="email" />
                        

            <x-jet-input-error for="email" class="mt-2" />


            <x-jet-label for="password" value="{{__('strings.password')}}" />

            <x-jet-input id="password"
                        type="password"
                        name="password"
                        class="mt-1 block w-full"
                        wire:model="password" />
                        

            <x-jet-input-error for="password" class="mt-2" />


            <x-jet-label for="team" value="{{__('strings.team')}}" />

            <select name="team" id="team" class="p-2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
            wire:model="team" >

                @foreach ($teams as $team)
                    <option value="{{$team->id}}">{{$team->name}}</option>
                @endforeach
            </select>
                        
            <x-jet-input-error for="team" class="mt-2" />


            <x-jet-label for="phone" value="{{__('strings.phone')}}" />

            <x-jet-input id="phone"
                        type="text"
                        name="phone"
                        class="mt-1 block w-full"
                        wire:model="phone" />
                        
            <x-jet-input-error for="phone" class="mt-2" />


            <x-jet-label for="address" value="{{__('strings.address')}}" />

            <x-jet-input id="address"
                        type="text"
                        name="address"
                        class="mt-1 block w-full"
                        wire:model="address" />
                        
            <x-jet-input-error for="address" class="mt-2" />

        </div>
    </x-slot>

        <x-slot name="actions">
            <x-jet-action-message class="mr-3" on="saved">
                {{ __('Saved.') }}
            </x-jet-action-message>

            <x-jet-button>
                {{ __('Save') }}
            </x-jet-button>
        </x-slot>
</x-jet-form-section>