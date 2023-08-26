<?php

namespace App\Http\Livewire;

use App\Models\Service;
use Livewire\Component;
use App\Models\Division;
use Illuminate\Support\Str;

class DocumentDynamicSelect extends Component
{
    public $document;

    public $user;

    public $directions;

    public $services;

    public $divisions;

    public $selectedService;

    public $selectedDivision;

    public $selectedDirection;


    public function mount()
    {
        $route = request()->route()->getName();
        if(Str::contains($route, 'document')){
            $this->selectedService = $this->document->service_id;
            $this->selectedDivision = $this->document->division_id;
            $this->selectedDirection = $this->document->direction_id;
        }
        elseif(Str::contains($route, 'user')) {
            $this->selectedService = $this->user->service_id;
            $this->selectedDivision = $this->user->division_id;
            $this->selectedDirection = $this->user->direction_id;
        }
    }

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
        return view('livewire.document-dynamic-select');
    }
}
