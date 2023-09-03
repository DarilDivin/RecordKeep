<?php

namespace App\Http\Livewire;

use DateTime;
use App\Models\Categorie;
use Livewire\Component;
use Livewire\WithPagination;

class CategoriesTable extends Component
{
    use WithPagination;

    public $categorie = '';

    public $orderField = 'categorie';

    public $orderDirection = 'ASC';

    public array $categoriesChecked = [];

    protected $rules = [
        'categorie' => 'nullable|string'
    ];

    public function updatedCategorie()
    {
        $this->resetPage();
    }

    public function deletedCategories(array $ids)
    {
        Categorie::destroy($ids);
        $this->categoriesChecked = [];
        session()->flash('success', 'Les Catégories ont bien été supprimé');
    }

    public function setOrderField(string | int | DateTime  $field)
    {
        if($field === $this->orderField){
            $this->orderDirection = $this->orderDirection === 'ASC' ? 'DESC' : 'ASC';
        }
        else {
            $this->orderField = $field;
            $this->reset('orderDirection');
        }
    }

    public function render()
    {
        $this->validate();

        $categories = Categorie::query();

        if(!empty($this->categorie)){
            $categories = $categories->where('categorie', 'LIKE', "%{$this->categorie}%");
        }

        return view('livewire.categories-table', [
            'categories' => $categories
                ->orderBy($this->orderField, $this->orderDirection)
                ->get()
        ]);
    }

}
