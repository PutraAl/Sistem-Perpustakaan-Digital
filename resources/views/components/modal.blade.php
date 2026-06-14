@props([
    'id' => 'modal',
    'title' => 'Modal',
])

<div
    id="{{ $id }}"
    tabindex="-1"
    aria-hidden="true"
    class="hidden fixed inset-0 z-50 flex items-center justify-center p-4">

    {{-- Overlay --}}
    <div
        class="absolute inset-0 bg-slate-900/60 backdrop-blur-sm"
        data-modal-hide="{{ $id }}">
    </div>

    {{-- Modal --}}
    <div
        class="
        relative
        w-full
        max-w-lg

        bg-white

        rounded-3xl

        border
        border-slate-200

        shadow-2xl

        overflow-hidden

        animate-fade-in">

        {{-- Header --}}
        <div
            class="
            px-6
            py-5

            bg-gradient-to-r
            from-blue-500
            to-cyan-500

            text-white">

            <div class="flex items-center justify-between">

                <div class="flex items-center gap-3">

                    <div
                        class="
                        w-10 h-10
                        rounded-xl

                        bg-white/20

                        flex
                        items-center
                        justify-center">

                        <svg
                            class="w-5 h-5"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            viewBox="0 0 24 24">

                            <path d="M20.59 13.41L11 3H4v7l9.59 9.59a2 2 0 002.82 0l4.18-4.18a2 2 0 000-2.82z"/>
                            <line x1="7" y1="7" x2="7.01" y2="7"/>

                        </svg>

                    </div>

                    <div>

                        <h3 class="text-lg font-semibold">
                            {{ $title }}
                        </h3>

                        <p class="text-xs text-blue-100">
                            Kelola data perpustakaan digital
                        </p>

                    </div>

                </div>

                <button
                    type="button"
                    data-modal-hide="{{ $id }}"
                    class="
                    w-9 h-9

                    rounded-xl

                    bg-white/20

                    hover:bg-white/30

                    transition">

                    <svg
                        class="w-5 h-5 mx-auto"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        viewBox="0 0 24 24">

                        <path d="M18 6L6 18"/>
                        <path d="M6 6l12 12"/>

                    </svg>

                </button>

            </div>

        </div>

        {{-- Body --}}
        <div class="p-6 bg-white">

            {{ $slot }}

        </div>

    </div>

</div>