<?php

namespace App\Http\Livewire;

use App\Models\Abonnement;
use App\Models\Restaurant;
use App\Models\User;
use Livewire\Component;

class ShowRestaurants extends Component
{
    public Restaurant $deleting;
    public Restaurant $editing;
    public $showDeleteModal = false;
    public $showEditModal = false;
    public $action = '';
    public $search;


    
    public function rules()
    {
        return [
            'editing.name' => 'required|min:2',
            'editing.description' => 'required',
            'editing.addrese' => 'required',
            'editing.image_url' => 'required',
            'editing.phone' => 'required',
            'editing.abonnement_id' => 'required',
            'editing.user_id' => 'required',
            
            
        ];
    }

    public function delete(Restaurant $restaurants)
    {
        $this->deleting = $restaurants;
        $this->action = 'Supprimer un restaurants';
        $this->showDeleteModal = true;
    }

    public function edit(Restaurant $restaurants)
    {
        $this->editing = $restaurants;
        $this->action = 'Modifier un restaurants';
        $this->showEditModal = true;
    }

    public function create()
    {
        $this->editing = new Restaurant();
        $this->action = 'Ajouter un restaurants';
        $this->showEditModal = true;
    }
    public function deleteSelected()
    {
        $this->deleting->delete();

        $this->showDeleteModal = false;

        $this->notify('Vous avez supprimé un restaurants');
    }

    public function save()
    {
        $this->validate();
        $this->editing->save();
        $this->notify('Enregistrement effectué avec succès');
        $this->showEditModal = false;
    }
    
    public function render()
    {
        return view('livewire.show-restaurants',[
            'restaurants'=> Restaurant::all(), 
            'abonnements'=> Abonnement::all(),
            'users'=> User::all(),  
        ]);
    }
}
