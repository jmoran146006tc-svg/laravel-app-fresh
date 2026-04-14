@php $book = $book ?? null; @endphp

@if($errors->any())
    <div class="mb-6 px-4 py-3 rounded-xl bg-red-500/10 border border-red-500/20 text-red-300 text-sm">
        <ul class="list-disc list-inside space-y-1">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="grid grid-cols-1 md:grid-cols-2 gap-4">

    {{-- Title --}}
    <div class="relative">
        <label class="block text-xs font-semibold text-slate-400 mb-2 ml-1 uppercase tracking-wider">Title *</label>
        <input type="text" name="title" value="{{ old('title', $book?->title) }}" required
               placeholder="e.g. The Great Gatsby"
               class="w-full rounded-xl bg-slate-950/50 border border-slate-700/50 text-white px-4 py-3.5 text-sm placeholder:text-slate-600 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/20 focus:outline-none transition-all" />
    </div>

    {{-- Author --}}
    <div class="relative">
        <label class="block text-xs font-semibold text-slate-400 mb-2 ml-1 uppercase tracking-wider">Author *</label>
        <input type="text" name="author" value="{{ old('author', $book?->author) }}" required
               placeholder="e.g. F. Scott Fitzgerald"
               class="w-full rounded-xl bg-slate-950/50 border border-slate-700/50 text-white px-4 py-3.5 text-sm placeholder:text-slate-600 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/20 focus:outline-none transition-all" />
    </div>

    {{-- Description --}}
    <div class="md:col-span-2">
        <label class="block text-xs font-semibold text-slate-400 mb-2 ml-1 uppercase tracking-wider">Description *</label>
        <textarea name="description" rows="3" required
                  placeholder="Brief summary of the book..."
                  class="w-full rounded-xl bg-slate-950/50 border border-slate-700/50 text-white px-4 py-3.5 text-sm placeholder:text-slate-600 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/20 focus:outline-none transition-all resize-none">{{ old('description', $book?->description) }}</textarea>
    </div>

    {{-- Genre --}}
    <div>
        <label class="block text-xs font-semibold text-slate-400 mb-2 ml-1 uppercase tracking-wider">Genre *</label>
        <select name="genre" required
                class="w-full rounded-xl bg-slate-950/50 border border-slate-700/50 text-white px-4 py-3.5 text-sm focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/20 focus:outline-none transition-all">
            <option value="">-- Select Genre --</option>
            @foreach(['Fiction','Non-Fiction','Sci-Fi','Fantasy','Mystery','Romance','Horror','Biography','History','Other'] as $g)
                <option value="{{ $g }}" {{ old('genre', $book?->genre) == $g ? 'selected' : '' }}>{{ $g }}</option>
            @endforeach
        </select>
    </div>

    {{-- ISBN --}}
    <div>
        <label class="block text-xs font-semibold text-slate-400 mb-2 ml-1 uppercase tracking-wider">ISBN *</label>
        <input type="text" name="isbn" value="{{ old('isbn', $book?->isbn) }}" required
               placeholder="e.g. 978-3-16-148410-0"
               class="w-full rounded-xl bg-slate-950/50 border border-slate-700/50 text-white px-4 py-3.5 text-sm placeholder:text-slate-600 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/20 focus:outline-none transition-all" />
    </div>

    {{-- Published Year --}}
    <div>
        <label class="block text-xs font-semibold text-slate-400 mb-2 ml-1 uppercase tracking-wider">Published Year *</label>
        <input type="number" name="published_year" value="{{ old('published_year', $book?->published_year) }}" required
               placeholder="e.g. 2024"
               class="w-full rounded-xl bg-slate-950/50 border border-slate-700/50 text-white px-4 py-3.5 text-sm placeholder:text-slate-600 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/20 focus:outline-none transition-all" />
    </div>

    {{-- Pages --}}
    <div>
        <label class="block text-xs font-semibold text-slate-400 mb-2 ml-1 uppercase tracking-wider">Pages *</label>
        <input type="number" name="pages" value="{{ old('pages', $book?->pages) }}" required
               placeholder="e.g. 320"
               class="w-full rounded-xl bg-slate-950/50 border border-slate-700/50 text-white px-4 py-3.5 text-sm placeholder:text-slate-600 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/20 focus:outline-none transition-all" />
    </div>

    {{-- Language --}}
    <div>
        <label class="block text-xs font-semibold text-slate-400 mb-2 ml-1 uppercase tracking-wider">Language *</label>
        <input type="text" name="language" value="{{ old('language', $book?->language) }}" required
               placeholder="e.g. English"
               class="w-full rounded-xl bg-slate-950/50 border border-slate-700/50 text-white px-4 py-3.5 text-sm placeholder:text-slate-600 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/20 focus:outline-none transition-all" />
    </div>

    {{-- Publisher --}}
    <div>
        <label class="block text-xs font-semibold text-slate-400 mb-2 ml-1 uppercase tracking-wider">Publisher *</label>
        <input type="text" name="publisher" value="{{ old('publisher', $book?->publisher) }}" required
               placeholder="e.g. Penguin Books"
               class="w-full rounded-xl bg-slate-950/50 border border-slate-700/50 text-white px-4 py-3.5 text-sm placeholder:text-slate-600 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/20 focus:outline-none transition-all" />
    </div>

    {{-- Price --}}
    <div>
        <label class="block text-xs font-semibold text-slate-400 mb-2 ml-1 uppercase tracking-wider">Price (₱) *</label>
        <input type="number" step="0.01" name="price" value="{{ old('price', $book?->price) }}" required
               placeholder="e.g. 299.99"
               class="w-full rounded-xl bg-slate-950/50 border border-slate-700/50 text-white px-4 py-3.5 text-sm placeholder:text-slate-600 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/20 focus:outline-none transition-all" />
    </div>

    {{-- Cover Image --}}
    <div>
        <label class="block text-xs font-semibold text-slate-400 mb-2 ml-1 uppercase tracking-wider">Cover Image</label>
        <input type="file" name="cover_image" accept="image/*"
               class="w-full rounded-xl bg-slate-950/50 border border-slate-700/50 text-slate-400 px-4 py-3 text-sm file:mr-4 file:py-1 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-indigo-500/20 file:text-indigo-300 hover:file:bg-indigo-500/30 focus:outline-none transition-all" />
        @if($book?->cover_image)
            <img src="{{ asset('storage/' . $book->cover_image) }}" class="mt-3 h-16 rounded-lg border border-white/10 object-cover" alt="Current cover">
        @endif
    </div>

    {{-- Is Available --}}
    <div class="md:col-span-2 flex items-center gap-3 px-1">
        <input type="checkbox" name="is_available" id="is_available"
               {{ old('is_available', $book?->is_available ?? true) ? 'checked' : '' }}
               class="w-4 h-4 rounded bg-slate-800 border-slate-600 text-indigo-500 focus:ring-indigo-500/20" />
        <label for="is_available" class="text-sm font-medium text-slate-300 cursor-pointer">
            Mark as Available
        </label>
    </div>

</div>