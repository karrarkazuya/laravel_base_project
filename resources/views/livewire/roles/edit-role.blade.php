<x-jet-form-section submit="updateRoleName">
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

@livewire('roles.permissions-switch', ['role' => $role])