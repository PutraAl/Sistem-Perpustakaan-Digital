@props([
    'id' => 'modal',
    'title' => 'Modal',
])

<div id="{{ $id }}" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">

    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-neutral-primary-soft border border-default rounded-base shadow-sm p-4 md:p-6">

            <!-- Header -->
            <div class="flex items-center justify-between border-b border-default pb-4 md:pb-5">
                <h3 class="text-lg font-medium text-heading">
                    {{ $title }}
                </h3>

                <button type="button"
                    class="text-body hover:bg-neutral-tertiary rounded-base w-9 h-9 flex justify-center items-center"
                    data-modal-hide="{{ $id }}">
                    ✕
                </button>
            </div>

            <!-- Body -->
            {{ $slot }}

        </div>
    </div>
</div>