<?php

namespace App\Http\Livewire;

use DateTime;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersTable extends Component
{
    use WithPagination;

    public $nom = '';

    public $matricule = '';

    public $orderField = 'nom';

    public $orderDirection = 'ASC';

    public array $usersChecked = [];

    protected $rules = [
        'nom' => 'nullable|string',
        'matricule' => 'nullable|string'
    ];

    public function updatedNom()
    {
        $this->resetPage();
    }

    public function updatedMatricule()
    {
        $this->resetPage();
    }

    public function deletedUsers(array $ids)
    {
        User::destroy($ids);
        $this->usersChecked = [];
        session()->flash('success', 'Les Utilisateurs ont bien été supprimé');
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

        $users = User::query();

        if(!empty($this->nom)){
            $users = $users->where('nom', 'LIKE', "%{$this->nom}%");
        }

        if(!empty($this->matricule)){
            $users = $users->where('matricule', 'LIKE', "%{$this->matricule}%");
        }

        return view('livewire.users-table', [
            'users' => $users
                ->orderBy($this->orderField, $this->orderDirection)
                ->get()
        ]);
    }

}
