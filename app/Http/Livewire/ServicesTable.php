<?php

namespace App\Http\Livewire;

use App\Models\Direction;
use DateTime;
use App\Models\Service;
use Livewire\Component;
use Livewire\WithPagination;

class ServicesTable extends Component
{
    use WithPagination;

    public $sigle = '';

    public $service = '';

    public $selectedDirection;

    public $orderField = 'service';

    public $orderDirection = 'ASC';

    public array $servicesChecked = [];

    protected $rules = [
        'service' => 'nullable|string'
    ];

    public function updatedSigle()
    {
        $this->resetPage();
    }

    public function updatedService()
    {
        $this->resetPage();
    }

    public function deletedServices(array $ids)
    {
        Service::destroy($ids);
        $this->servicesChecked = [];
        session()->flash('success', 'Les Services ont bien été supprimé');
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

        $services = Service::query();

        if(!empty($this->service)){
            $services = $services->where('service', 'LIKE', "%{$this->service}%");
        }

        if(!empty($this->sigle)){
            $services = $services->where('sigle', 'LIKE', "%{$this->sigle}%");
        }

        if($this->selectedDirection){
            $services = $services->where('direction_id', $this->selectedDirection);
        }

        return view('livewire.services-table', [
            'services' => $services
                ->orderBy($this->orderField, $this->orderDirection)
                ->get(),
            'directions' => Direction::getAllDirections()
        ]);
    }

}
