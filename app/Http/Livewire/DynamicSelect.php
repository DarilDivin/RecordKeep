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
    }

    public function updatedSelectedService($service_id)
    {
        $this->divisions = Division::where('service_id', $service_id)->pluck('division', 'id');
    }

    public function render()
    {
        return view('livewire.dynamic-select');
    }
}
