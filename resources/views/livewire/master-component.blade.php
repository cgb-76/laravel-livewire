<div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 sm:pb-6 lg:pb-8">
        <div class="bg-stone-100 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-stone-100 border-b border-stone-200">
                <div class="grid grid-cols-[auto_300px] gap-1">
                    <div>
                        <h2
                            class="font-semibold text-xl text-gray-800 leading-tight pt-1"
                        >
                            {{ $master->name }} has ${{ $master->cash }}
                        </h2>
                    </div>
                    <div class="text-right">
                        <x-jet-button
                            wire:click="showSetCashModal"
                            wire:loading.attr="disabled"
                        >
                            Set Cash
                        </x-jet-button>
                        <x-jet-button
                            wire:click="showStoreChildModal"
                            wire:loading.attr="disabled"
                        >
                            Create Child
                        </x-jet-button>
                        <x-jet-danger-button
                            wire:click="destroy"
                            wire:loading.attr="disabled"
                        >
                            X
                        </x-jet-danger-button>
                    </div>
                </div>
                @if (count($this->children) > 0)
                <div class="grid gap-2 grid-cols-3 pt-6">
                    <!-- the children -->
                    <!-- prettier-ignore-next-line -->
                    @foreach ($children as $child)
                    <!-- prettier-ignore-next-line -->
                    @livewire('child-component', ['id' => $child->id],
                    key($child->id))
                    <!-- prettier-ignore-next-line -->
                    @endforeach
                </div>
                @endif
            </div>
        </div>
    </div>

    <x-jet-dialog-modal maxWidth="md" wire:model="setCashModalVisible">
        <x-slot name="title">
            {{ __("Set Cash") }}
        </x-slot>

        <x-slot name="content">
            <form>
                @csrf

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
                        wire:model.defer="updateMasterFormCash"
                        required
                    ></x-jet-input>
                    @error('cash')
                    <span class="field-error">{{ $message }}</span> @enderror
                </div>
            </form>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button
                wire:click="hideSetCashModal"
                wire:loading.attr="disabled"
            >
                {{ __("Cancel") }}
            </x-jet-secondary-button>

            <x-jet-button
                class="ml-1"
                wire:click.prevent="update()"
                wire:loading.attr="disabled"
            >
                {{ __("Set Cash") }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>

    <x-jet-dialog-modal maxWidth="md" wire:model="storeChildModalVisible">
        <x-slot name="title">
            {{ __("Create Child") }}
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
                        wire:model.defer="storeChildFormName"
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
                        wire:model.defer="storeChildFormCash"
                        required
                    ></x-jet-input>
                    @error('cash')
                    <span class="field-error">{{ $message }}</span> @enderror
                </div>
            </form>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button
                wire:click="hideStoreChildModal"
                wire:loading.attr="disabled"
            >
                {{ __("Cancel") }}
            </x-jet-secondary-button>

            <x-jet-button
                class="ml-1"
                wire:click.prevent="store()"
                wire:loading.attr="disabled"
            >
                {{ __("Create Child") }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
