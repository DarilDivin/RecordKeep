<?php

namespace App\Http\Livewire;

use App\Models\Direction;
use App\Models\Service;
use Livewire\Component;

class DivisionDynamicSelect extends Component
{
    public $services;

    public $division;

    public $directions;

    public $selectedService;

    public $selectedDirection;


    public function mount()
    {
        if(!is_null($this->division->service)){
            $this->selectedService = $this->division->service_id;
            $this->selectedDirection = $this->division->service->direction_id;
        }

        if(old('service_id')) {
            $this->services = Direction::find(old('direction_id'))->services->where('service', '!=', 'Aucun')->sortBy('service');
            $this->selectedService = old('service_id');
        }

        if(old('direction_id')) {
            $this->selectedDirection = old('direction_id');
        }
    }

    public function updatedSelectedDirection($direction_id)
    {
        $this->services =
            Service::where('direction_id', $direction_id)
            ->orderBy('service', 'ASC')->get()
            ->where('service', '!=', 'Aucun');
    }

    public function updatedSelectedService($service_id)
    {
        $this->selectedDirection = Service::find($service_id)->direction_id;
    }

    public function render()
    {
        return view('livewire.division-dynamic-select');
    }
}
