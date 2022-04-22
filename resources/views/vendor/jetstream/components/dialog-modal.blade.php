@props(['id' => null, 'maxWidth' => null])

<x-jet-modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <div class="py-4 border-b border-slate-200 border-solid">
        <div class="font-semibold text-lg text-center">
            {{ $title }}
        </div>

        <div class="mt-4 mx-6">
            {{ $content }}
        </div>
    </div>

    <div class="flex flex-row justify-end px-6 py-4 bg-gray-100 text-right">
        {{ $footer }}
    </div>
</x-jet-modal>