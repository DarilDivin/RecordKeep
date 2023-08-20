<?php

namespace App\Http\Livewire;

use App\Models\Division;
use App\Models\Service;
use Livewire\Component;

class DynamicSelect extends Component
{
    public $document;

    public $directions;

    public $services;

    public $divisions;

    public $selectedDirection = null;

    public $selectedService = null;

    public $selectedDivision = null;


    public function updatedSelectedDirection($direction_id)
    {
        $this->services = Service::where('direction_id', $direction_id)->pluck('service', 'id');
        if(!empty(array_key_first($this->services->toArray()))){
            $this->divisions = Division::where('service_id', array_key_first($this->services->toArray()))->pluck('division', 'id');
        }
        else {
            $this->divisions = [];
        }
    }

    public function updatedSelectedService($service_id)
    {
        $this->divisions = Division::where('service_id', $service_id)->pluck('division', 'id');
        $this->selectedDirection = Service::find($service_id)->direction_id;
    }

    public function updatedSelectedDivision($division_id)
    {
        $this->selectedService = Division::find($division_id)->service_id;
        $this->selectedDirection = Service::find($this->selectedService)->direction_id;
    }

    public function render()
    {
        return view('livewire.dynamic-select');
    }
}
