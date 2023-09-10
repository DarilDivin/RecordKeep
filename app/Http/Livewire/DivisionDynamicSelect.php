<?php

namespace App\Http\Livewire;

use App\Models\Service;
use Livewire\Component;

class DivisionDynamicSelect extends Component
{

    public $directions;

    public $services;

    public $selectedService;

    public $selectedDirection;


    public function mount()
    {
        // $route = request()->route()->getName();
        // if(Str::contains($route, 'document')){
        //     $this->selectedService = $this->document->service_id;
        //     $this->selectedDivision = $this->document->division_id;
        //     $this->selectedDirection = $this->document->direction_id;
        // }
        // elseif(Str::contains($route, 'user')) {
        //     $this->selectedService = $this->user->service_id;
        //     $this->selectedDivision = $this->user->division_id;
        //     $this->selectedDirection = $this->user->direction_id;
        // }
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
