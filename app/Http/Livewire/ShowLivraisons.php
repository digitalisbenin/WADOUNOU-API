<?php

namespace App\Http\Livewire;

use App\Models\Livraison;
use Livewire\Component;

class ShowLivraisons extends Component
{
    public Livraison $deleting;
    public Livraison $editing;
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
            'editing.description' => 'required',
            'editing.status' => 'required',
            'editing.commande_id' => 'required',
            'editing.livreur_id' => 'required',
            
        ];
    }

    public function delete(Livraison $livraisons)
    {
        $this->deleting = $livraisons;
        $this->action = 'Supprimer une livraisons';
        $this->showDeleteModal = true;
    }

    public function edit(Livraison $livraisons)
    {
        $this->editing = $livraisons;
        $this->action = 'Modifier une livraisons';
        $this->showEditModal = true;
    }

    public function create()
    {
        $this->editing = new Livraison();
        $this->action = 'Ajouter une livraisons';
        $this->showEditModal = true;
    }
    public function deleteSelected()
    {
        $this->deleting->delete();

        $this->showDeleteModal = false;

        $this->notify('Vous avez supprimé une livraisons');
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
        return view('livewire.show-livraisons',[
            'livraisons'=> Livraison::all(),
        ]);
    }
}
