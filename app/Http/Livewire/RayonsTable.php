<?php

namespace App\Http\Livewire;

use DateTime;
use App\Models\RayonRangement;
use Livewire\Component;
use Livewire\WithPagination;

class RayonsTable extends Component
{
    use WithPagination;

    public $rayon = '';

    public $code = '';

    public $orderField = 'libelle';

    public $orderDirection = 'ASC';

    public array $rayonsChecked = [];

    protected $rules = [
        'rayon' => 'nullable|string'
    ];

    public function updatedRayon()
    {
        $this->resetPage();
    }

    public function deletedRayons(array $ids)
    {
        RayonRangement::destroy($ids);
        $this->rayonsChecked = [];
        session()->flash('success', 'Les Rayons de Rangement ont bien été supprimé');
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

        $rayons = RayonRangement::query();

        if(!empty($this->rayon)){
            $rayons = $rayons->where('libelle', 'LIKE', "%{$this->rayon}%");
        }

        if(!empty($this->code)){
            $rayons = $rayons->where('code', 'LIKE', "%{$this->code}%");
        }

        return view('livewire.rayons-table', [
            'rayons' => $rayons
                ->orderBy($this->orderField, $this->orderDirection)
                ->get()
        ]);
    }

}
