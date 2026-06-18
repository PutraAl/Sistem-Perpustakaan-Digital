@props([
    'id' => 'modal',
    'title' => 'Modal',
])

<div 
    id="{{ $id }}" 
    tabindex="-1" 
    aria-hidden="true"
    class="hidden fixed inset-0 z-[100] flex items-center justify-center p-4 sm:p-6"
>
    {{-- Overlay / Backdrop --}}
    <div 
        class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm transition-opacity" 
        data-modal-hide="{{ $id }}">
    </div>

    {{-- Modal Container --}}
    <div 
        class="relative w-full max-w-lg bg-white rounded-2xl border border-slate-200 shadow-2xl overflow-hidden flex flex-col max-h-[90vh] animate-fade-in"
    >
        {{-- Header --}}
        <div class="px-6 py-4 bg-gradient-to-r from-sky-500 to-cyan-400 text-white flex items-center justify-between shrink-0">
            <div class="flex items-center gap-3">
                {{-- Icon --}}
                <div class="w-10 h-10 rounded-xl bg-white/20 flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                    </svg>
                </div>
                <div>
                    <h3 class="text-lg font-semibold tracking-wide">
                        {{ $title }}
                    </h3>
                    <p class="text-xs text-sky-50 font-light">
                        Kelola data perpustakaan digital
                    </p>
                </div>
            </div>

            {{-- Close Button --}}
            <button 
                type="button" 
                data-modal-hide="{{ $id }}"
                class="w-9 h-9 rounded-xl bg-white/10 hover:bg-white/30 transition duration-200 flex items-center justify-center focus:outline-none focus:ring-2 focus:ring-white/50"
            >
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        {{-- Body (Bisa di-scroll jika konten form sangat panjang) --}}
        <div class="p-6 bg-white overflow-y-auto">
            {{ $slot }}
        </div>
    </div>
</div>