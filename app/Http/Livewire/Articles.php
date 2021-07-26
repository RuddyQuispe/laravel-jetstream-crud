<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Article;

class Articles extends Component
{

    use WithPagination;
    public $active;
    public $q;

    public function render()
    {
        $article = Article::where('user_id', auth()->user()->id)
            ->when($this->q, function ($query) {
                return $query->where(function ($query) {
                    $query->where('name', 'like', '%' . $this->q . '%')
                        ->orWhere('price', 'like', '%' . $this->q . '%')
                        ->orWhere('quantity', 'like', '%' . $this->q . '%');
                });
            })
            ->when($this->active, function ($query) {
                return $query->active();
            });
        $query = $article->toSql();
        $article = $article->paginate(10);
        return view('livewire.articles', [
            'articles' => $article,
            'query' => $query,
        ]);
    }

    public function updatingActive()
    {
        $this->resetPage();
    }
}
