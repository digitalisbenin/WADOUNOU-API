<?php

namespace App\Http\Livewire;


use App\Models\Commande;
use Livewire\Component;

class ShowCommandes extends Component
{

    public Commande $deleting;
    public Commande $editing;
    public $showDeleteModal = false;
    public $showEditModal = false;
    public $action = '';
    public $search;

    public function rules()
    {
        return [
            'editing.name' => 'required|min:2',
            'editing.description' => 'required',
            'editing.prix' => 'required',
            'editing.date' => 'required',
            'editing.addrese' => 'required',
            'editing.repas_id' => 'required',
            'editing.client_id' => 'required',
            
        ];
    }

    public function delete(Commande $commandes)
    {
        $this->deleting = $commandes;
        $this->action = 'Supprimer une commande';
        $this->showDeleteModal = true;
    }

    public function edit(Commande $commandes)
    {
        $this->editing = $commandes;
        $this->action = 'Modifier une commande';
        $this->showEditModal = true;
    }

    public function create()
    {
        $this->editing = new Commande();
        $this->action = 'Ajouter une commande';
        $this->showEditModal = true;
    }
    public function deleteSelected()
    {
        $this->deleting->delete();

        $this->showDeleteModal = false;

        $this->notify('Vous avez supprimé une commande');
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
        return view('livewire.show-commandes',[
            'commandes'=> Commande::all(),
            
        ]);
    }
}
