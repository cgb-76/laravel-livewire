<div>
    <div class="bg-stone-200 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-4 pt-3 bg-stone-200 border-b border-stone-300">
            <div class="grid grid-cols-2 mx-1 pb-1">
                <div class="font-semibold text-xl text-stone-800 leading-tight">
                    {{ $child->name }}
                </div>
                <div
                    class="font-semibold text-xl text-stone-800 leading-tight text-right pr-1"
                >
                    ${{ $child->cash }}
                </div>
            </div>
            <div class="grid grid-cols-2 mx-1 pb-1">
                <div
                    class="pb-1 font-semibold text-xs text-gray-800 leading-tight"
                >
                    Ask for cash
                </div>
                <div
                    class="pb-1 font-semibold text-xs text-gray-800 leading-tight text-right pr-1"
                >
                    ${{ $child->master->cash }} available
                </div>
            </div>
            <div class="md:container md:mx-auto">
                <div class="flex gap-x-0">
                    <x-jet-button
                        class="flex-grow mr-1"
                        wire:click="$emitUp('askForCash', {{ $this->childId }}, 10)"
                        wire:loading.attr="disabled"
                    >
                        $10
                    </x-jet-button>
                    <x-jet-button
                        class="flex-grow mr-1"
                        wire:click="$emitUp('askForCash', {{ $this->childId }}, 20)"
                        wire:loading.attr="disabled"
                    >
                        $20
                    </x-jet-button>
                    <x-jet-button
                        class="flex-grow mr-1"
                        wire:click="$emitUp('askForCash', {{ $this->childId }}, 30)"
                        wire:loading.attr="disabled"
                    >
                        $30
                    </x-jet-button>
                    <x-jet-danger-button
                        class="flex-none"
                        wire:click="destroy"
                        wire:loading.attr="disabled"
                    >
                        X
                    </x-jet-danger-button>
                </div>
            </div>
        </div>
    </div>
</div>
