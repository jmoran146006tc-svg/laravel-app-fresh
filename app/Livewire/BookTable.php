<?php

namespace App\Livewire;

use App\Models\Book;
use Livewire\Component;
use Livewire\WithPagination;

class BookTable extends Component
{
    use WithPagination;

    public string $search = '';
    public string $genre = '';

    public function updatedSearch(): void { $this->resetPage(); }
    public function updatedGenre(): void  { $this->resetPage(); }

    public function render()
    {
        $books = Book::query()
            ->when($this->search, fn($q) =>
                $q->where('title', 'like', '%' . $this->search . '%')
                  ->orWhere('author', 'like', '%' . $this->search . '%')
            )
            ->when($this->genre, fn($q) =>
                $q->where('genre', $this->genre)
            )
            ->latest()
            ->paginate(10);

        $genres = Book::distinct()->pluck('genre');

        return view('livewire.book-table', compact('books', 'genres'));
    }
}