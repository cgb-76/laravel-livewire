<div>
    <div class="grid grid-cols-[auto_300px] gap-1 pb-6">
        <div>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight pt-2">
                Test Application
            </h2>
            <p>
                This is a test app to demonstrate Laravel CRUD, and parent-child
                communication in Jetstream+Livewire
            </p>
        </div>
        <div class="text-right">
            <x-jet-button
                wire:click="showStoreMasterModal"
                wire:loading.attr="disabled"
            >
                Create Master
            </x-jet-button>
        </div>
    </div>

    <!-- the masters -->
    <!-- prettier-ignore-next-line -->
    @foreach ($masters as $master)
    <!-- prettier-ignore-next-line -->
    @livewire('master-component', ['id' => $master->id], key($master->id))
    <!-- prettier-ignore-next-line -->
    @endforeach

    <x-jet-dialog-modal maxWidth="md" wire:model="storeMasterModalVisible">
        <x-slot name="title">
            {{ __("Create Master") }}
        </x-slot>

        <x-slot name="content">
            <form>
                @csrf

                <div class="pb-2">
                    <x-jet-label
                        for="name"
                        value="{{ __('Name') }}"
                    ></x-jet-label>
                    <x-jet-input
                        id="name"
                        class="block mt-1 w-full"
                        type="text"
                        name="name"
                        wire:model.defer="storeMasterFormName"
                        required
                        autofocus
                    ></x-jet-input>
                    @error('name')
                    <span class="field-error">{{ $message }}</span> @enderror
                </div>

                <div class="pb-2">
                    <x-jet-label
                        for="cash"
                        value="{{ __('Cash') }}"
                    ></x-jet-label>
                    <x-jet-input
                        id="cash"
                        class="block mt-1 w-full"
                        type="number"
                        name="cash"
                        wire:model.defer="storeMasterFormCash"
                        required
                    ></x-jet-input>
                    @error('cash')
                    <span class="field-error">{{ $message }}</span> @enderror
                </div>
            </form>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button
                wire:click="hideStoreMasterModal"
                wire:loading.attr="disabled"
            >
                {{ __("Cancel") }}
            </x-jet-secondary-button>

            <x-jet-button
                class="ml-1"
                wire:click.prevent="store()"
                wire:loading.attr="disabled"
            >
                {{ __("Create Master") }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
