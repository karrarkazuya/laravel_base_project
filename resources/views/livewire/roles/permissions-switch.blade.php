<div class="grid grid-cols-2 mt-4">
    <div class="p-4 m-1 bg-white rounded-sm shadow">
        <div>
            <span class="text-gray-500">
                Permissions not added
            </span>
            <ul>
                @foreach ($permissionsLeft as $permission)
                    <li class="flex mb-1">
                        <div>
                            <button wire:click="addPermission({{$permission->id}})" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                                +
                            </button>
                        </div>
                        <x-jet-label class="pl-4 text-lg font-bold">{{$permission->title}}</x-jet-label>
                    </li>
                @endforeach
                </ul>
        </div>
    </div>
    <div class="p-4 m-1 bg-white rounded-sm shadow">
        <div>
            <span class="text-gray-500">
                Permissions already added
            </span>
            <ul>
                @foreach ($permissionsAdded as $permission)
                    <li class="flex mb-1">
                        <div>
                            <button wire:click="removePermission({{$permission->id}})" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                                -
                            </button>
                        </div>
                        <x-jet-label class="pl-4 text-lg font-bold">{{$permission->title}}</x-jet-label>
                    </li>
                @endforeach
                </ul>
        </div>
    </div>
</div>