<div>
    <div class="flex flex-col md:flex-row gap-3 mb-6">
        <input
            type="text"
            wire:model.live.debounce.300ms="search"
            placeholder="Search by title or author..."
            class="flex-1 rounded-xl bg-white/5 border border-white/10 text-white px-4 py-2.5 text-sm placeholder:text-slate-500 focus:outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 transition-all"
        />
        <select
            wire:model.live="genre"
            class="rounded-xl bg-blue-500 border-white/10 text-white px-4 py-2.5 text-sm focus:outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 transition-all"
        >
            <option value="">All Genres</option>
            @foreach($genres as $g)
                <option value="{{ $g }}">{{ $g }}</option>
            @endforeach
        </select>
        @if($search || $genre)
            <button
                wire:click="$set('search', ''); $set('genre', '')"
                class="bg-white/10 hover:bg-white/20 text-slate-300 px-4 py-2.5 rounded-xl font-bold text-sm transition-all"
            >
                Clear
            </button>
        @endif
    </div>

    <div class="relative overflow-hidden bg-white/5 border border-white/10 backdrop-blur-md rounded-3xl shadow-2xl">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-white/5 text-blue-200/70 text-xs uppercase tracking-widest font-bold">
                        <th class="px-6 py-4">Title & Author</th>
                        <th class="px-6 py-4">Genre</th>
                        <th class="px-6 py-4">Price</th>
                        <th class="px-6 py-4">Language</th>
                        <th class="px-6 py-4">Availability</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/10">
                    @forelse($books as $book)
                        <tr class="group hover:bg-white/[0.03] transition-colors">
                            <td class="px-6 py-5">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-full bg-gradient-to-br from-indigo-500/20 to-purple-500/20 border border-white/10 flex items-center justify-center text-indigo-300 font-bold text-sm flex-shrink-0">
                                        {{ substr($book->title, 0, 1) }}
                                    </div>
                                    <div>
                                        <div class="text-white font-semibold">{{ $book->title }}</div>
                                        <div class="text-blue-100/40 text-xs">{{ $book->author }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-5">
                                <span class="bg-blue-400/10 text-blue-300 px-2.5 py-0.5 rounded-full text-xs border border-blue-400/20">
                                    {{ $book->genre }}
                                </span>
                            </td>
                            <td class="px-6 py-5 text-blue-100/70 text-sm font-mono">
                                ₱{{ number_format($book->price, 2) }}
                            </td>
                            <td class="px-6 py-5 text-sm text-slate-400">
                                {{ $book->language }}
                            </td>
                            <td class="px-6 py-5">
                                @if($book->is_available)
                                    <span class="bg-green-500/10 text-green-400 px-2.5 py-0.5 rounded-full text-xs border border-green-500/20">Available</span>
                                @else
                                    <span class="bg-red-500/10 text-red-400 px-2.5 py-0.5 rounded-full text-xs border border-red-500/20">Unavailable</span>
                                @endif
                            </td>
                            <td class="px-6 py-5 text-right">
                                <div class="flex justify-end items-center gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                    <a href="{{ route('books.show', $book) }}"
                                       class="p-2 text-blue-300 hover:bg-blue-400/20 rounded-lg transition-colors" title="View">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </a>
                                    <a href="{{ route('books.edit', $book) }}"
                                       class="p-2 text-amber-300 hover:bg-amber-400/20 rounded-lg transition-colors" title="Edit">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>
                                    <form action="{{ route('books.destroy', $book) }}" method="POST" class="inline"
                                          onsubmit="return confirm('Delete this book permanently?')">
                                        @csrf @method('DELETE')
                                        <button class="p-2 text-red-400 hover:bg-red-400/20 rounded-lg transition-colors" title="Delete">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">
                                <div class="py-20 text-center">
                                    <p class="text-blue-200/40 italic font-mono">No books found in the catalog.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-6">
        {{ $books->links() }}
    </div>
</div>