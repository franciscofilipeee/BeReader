<?php

namespace App\Livewire;

use App\Models\Bibliotecas;
use Livewire\Component;

class SearchBibliotecas extends Component
{
    public $search = '';

    public function render()
    {
        return view('livewire.search-bibliotecas', [
            'bibliotecas' => Bibliotecas::search($this->search),
        ]);
    }
}
