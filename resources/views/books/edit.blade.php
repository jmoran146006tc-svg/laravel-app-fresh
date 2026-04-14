<x-layout title="Edit Book | Book Management">
    <style>
        @keyframes gradientFlow {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        .animate-mesh {
            background: linear-gradient(-45deg, #1e1b4b, #312e81, #1e3a5f, #020617);
            background-size: 400% 400%;
            animation: gradientFlow 10s ease infinite;
        }
        .glass-card {
            background: rgba(15, 23, 42, 0.8);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
    </style>

    <div class="min-h-screen animate-mesh py-12 px-4 sm:px-6 lg:px-8 font-sans antialiased flex items-start justify-center">
        <div class="max-w-2xl mx-auto w-full">

            <div class="glass-card rounded-3xl shadow-2xl overflow-hidden">

                <div class="px-8 pt-8 pb-6 bg-gradient-to-b from-white/5 to-transparent">
                    <div class="flex items-center space-x-4">
                        <div class="p-3 bg-amber-500/20 rounded-2xl ring-1 ring-amber-400/30">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-amber-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-2xl font-bold text-white tracking-tight">Edit Book</h1>
                            <p class="text-xs text-amber-300 uppercase tracking-widest font-bold opacity-70">{{ $book->title }}</p>
                        </div>
                    </div>
                </div>

                <div class="px-8 pb-8">
                    <form method="POST" action="{{ route('books.update', $book) }}" enctype="multipart/form-data">
                        @csrf @method('PUT')
                        @include('books._form')
                        <div class="mt-6 flex flex-col sm:flex-row justify-end gap-3">
                            <a href="{{ route('books.index') }}"
                               class="text-center px-6 py-3 rounded-xl bg-white/10 hover:bg-white/20 text-slate-300 font-bold text-sm transition-all">
                                Cancel
                            </a>
                            <button type="submit"
                                    class="bg-amber-500 hover:bg-amber-400 active:scale-95 transition-all px-8 py-3 rounded-xl text-sm font-bold text-amber-950 shadow-lg shadow-amber-500/20">
                                Update Book
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>