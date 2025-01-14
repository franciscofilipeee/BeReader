<?php

namespace App\Livewire;

use App\Models\LivrosUsados;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class SearchUsados extends Component
{
    public $search = '';

    public function render()
    {
        return view('livewire.search-usados', [
            'usados' => LivrosUsados::with('livro')
                ->whereHas('livro', function (Builder $query) {
                    $query->where('nome', 'like', "%$this->search%");
                })
                ->get()
        ]);
    }
}
