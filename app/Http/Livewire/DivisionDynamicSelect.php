<?php

namespace App\Http\Livewire;

use App\Models\Service;
use Livewire\Component;

class DivisionDynamicSelect extends Component
{
    public $division;

    public $directions;

    public $services;

    public $selectedService;

    public $selectedDirection;


    public function mount()
    {
        if(!is_null($this->division->service)){
           $this->selectedService = $this->division->service_id;
           $this->selectedDirection = $this->division->service->direction_id;
        }
    }

    public function updatedSelectedDirection($direction_id)
    {
        $this->services = Service::where('direction_id', $direction_id)->pluck('service', 'id');
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
