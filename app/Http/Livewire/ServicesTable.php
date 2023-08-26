<?php

namespace App\Http\Livewire;

use DateTime;
use App\Models\Service;
use Livewire\Component;
use Livewire\WithPagination;

class ServicesTable extends Component
{
    use WithPagination;

    public $service = '';

    public $orderField = 'service';

    public $orderDirection = 'ASC';

    public array $servicesChecked = [];

    protected $queryString = [
        'service' => ['except' => ''],
        'orderField' => ['except' => 'name'],
        'orderDirection' => ['except' => 'ASC']
    ];

    protected $rules = [
        'service' => 'nullable|string'
    ];

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
            $services = $services->where('name', 'LIKE', "%{$this->service}%");
        }

        return view('livewire.services-table', [
            'services' => $services
                ->orderBy($this->orderField, $this->orderDirection)
                ->get()
        ]);
    }

}
