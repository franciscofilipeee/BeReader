<?php

namespace App\Livewire;

use App\Models\Livros;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Livewire\Component;

class SearchBooks extends Component
{
    public $search = '';

    public function render()
    {
        return view('livewire.search-books', [
            'livros' => Livros::search($this->search),
        ]);
    }
}
