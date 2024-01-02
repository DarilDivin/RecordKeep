<?php

namespace App\Http\Livewire;

use App\Models\Service;
use Livewire\Component;
use App\Models\Division;
use App\Models\Direction;
use Illuminate\Support\Str;

class DocumentDynamicSelect extends Component
{

    public $user;

    public $services;

    public $document;

    public $divisions;

    public $directions;

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

        if(old('division_id')) {
            $this->selectedDivision = old('division_id');
        }

        if(old('service_id')) {
            $this->divisions = Service::find(old('service_id'))->divisions->sortBy('division');
            $this->services = Direction::find(old('direction_id'))->services->sortBy('service');
            $this->selectedService = old('service_id');
        }

        if(old('direction_id')) {
            $this->services = Direction::find(old('direction_id'))->services->sortBy('service');
            $this->selectedDirection = old('direction_id');
        }

    }


    public function updatedSelectedDirection($direction_id)
    {
        $this->services = Service::where('direction_id', $direction_id)->orderBy('service', 'ASC')->get();
        if($this->services->isNotEmpty()) {
            $this->divisions = Division::where('service_id', $this->services->sortBy('service')->first()->id)->get();
        }
        else {
            $this->divisions = [];
        }
    }

    public function updatedSelectedService($service_id)
    {
        $this->divisions = Division::where('service_id', $service_id)->orderBy('division', 'ASC')->get();
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
