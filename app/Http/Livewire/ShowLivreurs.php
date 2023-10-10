<?php

namespace App\Http\Livewire;

use App\Models\Livreur;
use App\Models\Restaurant;
use App\Models\User;
use Livewire\Component;

class ShowLivreurs extends Component
{
    public Livreur $deleting;
    public Livreur $editing;
    public $showDeleteModal = false;
    public $showEditModal = false;
    public $action = '';
    public $search;

    public function rules()
    {
        return [
            'editing.name' => 'required|min:2',
            'editing.addrese' => 'required',
            'editing.phone' => 'required',
            'editing.description' => 'nullable',
            'editing.restaurant_id' => 'nullable',
            'editing.user_id' => 'required',
            
        ];
    }

    public function delete(Livreur $livreurs)
    {
        $this->deleting = $livreurs;
        $this->action = 'Supprimer un livreur';
        $this->showDeleteModal = true;
    }

    public function edit(Livreur $livreurs)
    {
        $this->editing = $livreurs;
        $this->action = 'Modifier un livreur';
        $this->showEditModal = true;
    }

    public function create()
    {
        $this->editing = new Livreur();
        $this->action = 'Ajouter un livreur';
        $this->showEditModal = true;
    }
    public function deleteSelected()
    {
        $this->deleting->delete();

        $this->showDeleteModal = false;

        $this->notify('Vous avez supprimé un livreur');
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
        return view('livewire.show-livreurs',[
            'livreurs'=> Livreur::all(),
            'users'=> User::all(),
            'restaurants'=> Restaurant::all(),
        ]);
    }
}
