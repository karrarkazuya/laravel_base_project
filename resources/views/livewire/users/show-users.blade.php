
    <div>
        <div class="mt-10 sm:mt-0">
            <x-jet-action-section>
                <x-slot name="title">
                    @lang('strings.users')
                </x-slot>
    
                <x-slot name="description">
                    @lang('strings.users_note')
                </x-slot>
    
                <x-slot name="content">
                    <div class="space-y-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <x-jet-label value="{{__('strings.new_user_create')}}" />
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
                            </div>

                            <div>
                                <x-jet-label value="{{__('strings.team_note')}}" />

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
    
                            <x-jet-action-message class="mr-3" on="saved">
                                @lang('strings.saved')
                            </x-jet-action-message>
                            <x-jet-action-message class="mr-3" on="exists">
                                @lang('strings.already_exists')
                            </x-jet-action-message>
    
                            <x-jet-action-message class="mr-3" on="cant">
                                @lang('strings.users_associated')
                            </x-jet-action-message>
                
                            <x-jet-button wire:click='addNewUser'>
                                @lang('strings.create')
                            </x-jet-button>
                        </div>
    
    

                        <x-jet-label value="{{__('strings.enabled')}}" />

                        @foreach ($users as $u)
                        @if ($u->enabled)
                            <div class="flex items-center justify-between">
                                <div class="text-gray-600">
                                    {{ $u->name }}
                                    <br>
                                    {{$u->getTeam()->name}} - {{ $u->email }}
                                </div>
        
                                <div class="flex items-center">
                                    <a href="{{Route('users_show', $u->id)}}">
                                        <button class="mr-2 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                                            @lang('strings.edit')
                                        </button>
                                    </a>
                                    <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition"
                                        wire:click="disableUser({{ $u->id }})">
                                        @lang('strings.disable')
                                    </button>
                                </div>
                            </div>
                        @endif
                        @endforeach
    

                        <x-jet-label value="{{__('strings.disabled')}}" />

                        @foreach ($users as $u)
                        @if (!$u->enabled)
                            <div class="flex items-center justify-between">
                                <div class="text-gray-600">
                                    {{ $u->name }}
                                    <br>
                                    {{$u->getTeam()->name}} - {{ $u->email }}
                                </div>
        
                                <div class="flex items-center">
                                    <a href="{{Route('users_show', $u->id)}}">
                                        <button class="mr-2 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                                            @lang('strings.edit')
                                        </button>
                                    </a>
                                    <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition"
                                        wire:click="enableUser({{ $u->id }})">
                                        @lang('strings.enable')
                                    </button>
                                </div>
                            </div>
                        @endif
                        @endforeach
                    </div>
                </x-slot>
            </x-jet-action-section>
        </div>
    </div>
    