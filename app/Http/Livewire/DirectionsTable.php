<?php

namespace App\Http\Livewire;

use DateTime;
use Livewire\Component;
use App\Models\Direction;
use Livewire\WithPagination;

class DirectionsTable extends Component
{
    use WithPagination;

    public $sigle = '';

    public $direction = '';

    public $orderField = 'direction';

    public $orderDirection = 'ASC';

    public array $directionsChecked = [];

    protected $rules = [
        'sigle' => 'nullable|string',
        'direction' => 'nullable|string'
    ];

    public function updatedSigle()
    {
        $this->resetPage();
    }

    public function updatedDirection()
    {
        $this->resetPage();
    }

    public function deletedDirections(array $ids)
    {
        Direction::destroy($ids);
        $this->directionsChecked = [];
        session()->flash('success', 'Les Directions ont bien été supprimé');
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

        $directions = Direction::query();

        if(!empty($this->sigle)){
            $directions = $directions->where('sigle', 'LIKE', "%{$this->sigle}%");
        }

        if(!empty($this->direction)){
            $directions = $directions->where('direction', 'LIKE', "%{$this->direction}%");
        }

        return view('livewire.directions-table', [
            'directions' => $directions
                ->orderBy($this->orderField, $this->orderDirection)
                ->get()
        ]);
    }

}
