<x-layout title="Add Book | Book Management">
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
                        <div class="p-3 bg-indigo-500/20 rounded-2xl ring-1 ring-indigo-400/30">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-2xl font-bold text-white tracking-tight">Add New Book</h1>
                            <p class="text-xs text-indigo-300 uppercase tracking-widest font-bold opacity-70">Book Management System</p>
                        </div>
                    </div>
                </div>

                <div class="px-8 pb-8">
                    <form method="POST" action="{{ route('books.store') }}" enctype="multipart/form-data">
                        @csrf
                        @include('books._form')
                        <div class="mt-6 flex flex-col sm:flex-row justify-end gap-3">
                            <a href="{{ route('books.index') }}"
                               class="text-center px-6 py-3 rounded-xl bg-white/10 hover:bg-white/20 text-slate-300 font-bold text-sm transition-all">
                                Cancel
                            </a>
                            <button type="submit"
                                    class="bg-indigo-600 hover:bg-indigo-500 active:scale-95 transition-all px-8 py-3 rounded-xl text-sm font-bold text-white shadow-lg shadow-indigo-500/20">
                                Save Book
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>