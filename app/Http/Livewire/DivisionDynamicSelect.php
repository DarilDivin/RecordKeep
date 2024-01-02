<?php

namespace App\Http\Livewire;

use App\Models\Direction;
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
        $route = request()->route()->getName();
        if($route === 'admin.division.create') {
            $d = $this->directions;
            $this->selectedDirection = $d[array_key_first($d->toArray())]['id'];
            $s = Direction::find($this->selectedDirection)->services;
            $this->selectedService = $s[array_key_first($s->where('service', '!=', 'Aucun')->toArray())]['id'];
        }
        elseif($route === 'admin.division.edit') {
            if(!is_null($this->division->service)){
                $this->selectedService = $this->division->service_id;
                $this->selectedDirection = $this->division->service->direction_id;
            }
        }

        if(old('direction_id')) {
            $this->selectedDirection = old('direction_id');
        }
        if(old('service_id')) {
            $this->selectedService = old('service_id');
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
