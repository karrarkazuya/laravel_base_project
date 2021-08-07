
<div>
    <div class="mt-10 sm:mt-0">
        <x-jet-action-section>
            <x-slot name="title">
                @lang('strings.roles')
            </x-slot>

            <x-slot name="description">
                @lang('strings.roles_note')
            </x-slot>

            <x-slot name="content">
                <div class="space-y-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <x-jet-label value="{{__('strings.new_role_create')}}" />
                            <x-jet-label for="name" value="{{__('strings.name')}}" />
        
                            <x-jet-input id="name"
                                        type="text"
                                        name="name"
                                        class="mt-1 block w-full"
                                        wire:model="name" />
                                        
                
                            <x-jet-input-error for="name" class="mt-2" />
                            </div>

                            <x-jet-action-message class="mr-3" on="saved">
                                @lang('strings.saved')
                            </x-jet-action-message>
                            <x-jet-action-message class="mr-3" on="exists">
                                @lang('strings.already_exists')
                            </x-jet-action-message>

                            <x-jet-action-message class="mr-3" on="cant">
                                @lang('strings.users_associated')
                            </x-jet-action-message>
                
                            <x-jet-button wire:click='addNewRole'>
                                @lang('strings.create')
                            </x-jet-button>
                        </div>


                    @foreach ($roles as $role)
                    <div class="flex items-center justify-between">
                        <div class="text-gray-600">{{ $role->name }}</div>

                        <div class="flex items-center">
                            <a href="{{Route('roles_show', $role)}}">
                                <button class="mr-2 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                                    @lang('strings.edit')
                                </button>
                            </a>
                            <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition"
                                wire:click="removeRole({{ $role->id }})">
                                @lang('strings.remove')
                            </button>
                        </div>
                    </div>
                    @endforeach
                </div>
            </x-slot>
        </x-jet-action-section>
    </div>
</div>
