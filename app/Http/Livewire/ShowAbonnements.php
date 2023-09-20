<?php

namespace App\Http\Livewire;

use App\Models\Abonnement;
use Livewire\Component;

class ShowAbonnements extends Component
{
    public Abonnement $deleting;
    public Abonnement $editing;
    public $showDeleteModal = false;
    public $showEditModal = false;
    public $action = '';
    public $search;

    public function rules()
    {
        return [
            'editing.name' => 'required|min:2',
            'editing.description' => 'required',
            
        ];
    }

    public function delete(Abonnement $abonnements)
    {
        $this->deleting = $abonnements;
        $this->action = 'Supprimer un Abonnement';
        $this->showDeleteModal = true;
    }

    public function edit(Abonnement $abonnements)
    {
        $this->editing = $abonnements;
        $this->action = 'Modifier un Abonnement';
        $this->showEditModal = true;
    }

    public function create()
    {
        $this->editing = new Abonnement();
        $this->action = 'Ajouter un Abonnement';
        $this->showEditModal = true;
    }
    public function deleteSelected()
    {
        $this->deleting->delete();

        $this->showDeleteModal = false;

        $this->notify('Vous avez supprimé un Abonnement');
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
        return view('livewire.show-abonnements',[
            'abonnements'=> Abonnement::all(), 
        ]);
    }
}
