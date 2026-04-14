<x-layout title="Books | Book Management">
    <div class="max-w-6xl mx-auto mt-12 px-4 pb-20">

        <div class="flex flex-col md:flex-row justify-between items-end mb-8 gap-4">
            <div>
                <h1 class="text-3xl font-black text-white tracking-tight">Book Management</h1>
                <p class="text-blue-200/60 text-sm mt-1">Browse and manage the book catalog.</p>
            </div>
            <a href="{{ route('books.create') }}"
               class="flex items-center gap-2 bg-amber-400 hover:bg-amber-300 text-amber-950 px-5 py-2.5 rounded-xl font-bold text-sm transition-all shadow-lg shadow-amber-400/20 active:scale-95">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                </svg>
                Add New Book
            </a>
        </div>

        @if(session('success'))
            <div class="mb-6 px-4 py-3 rounded-xl bg-green-500/10 border border-green-500/20 text-green-300 text-sm font-medium">
                {{ session('success') }}
            </div>
        @endif

        <livewire:book-table />

    </div>
</x-layout>