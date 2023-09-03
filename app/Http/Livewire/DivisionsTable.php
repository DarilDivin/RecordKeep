<?php

namespace App\Http\Livewire;

use DateTime;
use App\Models\Division;
use App\Models\Service;
use Livewire\Component;
use Livewire\WithPagination;

class DivisionsTable extends Component
{
    use WithPagination;

    public $sigle = '';

    public $division = '';

    public $selectedService;

    public $orderField = 'division';

    public $orderDirection = 'ASC';

    public array $divisionsChecked = [];

    protected $rules = [
        'division' => 'nullable|string'
    ];

    public function updatedSigle()
    {
        $this->resetPage();
    }

    public function updatedDivision()
    {
        $this->resetPage();
    }

    public function deletedDivisions(array $ids)
    {
        Division::destroy($ids);
        $this->divisionsChecked = [];
        session()->flash('success', 'Les Divisions ont bien été supprimé');
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

        $divisions = division::query();

        if(!empty($this->sigle)){
            $divisions = $divisions->where('sigle', 'LIKE', "%{$this->sigle}%");
        }

        if(!empty($this->division)){
            $divisions = $divisions->where('division', 'LIKE', "%{$this->division}%");
        }

        if($this->selectedService){
            $divisions = $divisions->where('service_id', $this->selectedService);
        }

        return view('livewire.divisions-table', [
            'divisions' => $divisions
                ->orderBy($this->orderField, $this->orderDirection)
                ->get(),
            'services' => Service::getAllServices()
        ]);
    }

}
