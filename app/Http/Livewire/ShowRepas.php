<?php

namespace App\Http\Livewire;

use App\Models\Categorie;
use App\Models\Repas;
use App\Models\Restaurant;
use Livewire\Component;

class ShowRepas extends Component
{
    public Repas $deleting;
    public Repas $editing;
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
            'editing.image_url' => 'required',
            'editing.jours' => 'required',
            'editing.restaurant_id' => 'required',
            'editing.categirie_id' => 'required',
            
            
        ];
    }

    public function delete(Repas $repas)
    {
        $this->deleting = $repas;
        $this->action = 'Supprimer un repas';
        $this->showDeleteModal = true;
    }

    public function edit(Repas $repas)
    {
        $this->editing = $repas;
        $this->action = 'Modifier un repas';
        $this->showEditModal = true;
    }

    public function create()
    {
        $this->editing = new Repas();
        $this->action = 'Ajouter un repas';
        $this->showEditModal = true;
    }
    public function deleteSelected()
    {
        $this->deleting->delete();

        $this->showDeleteModal = false;

        $this->notify('Vous avez supprimé un repas');
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
        return view('livewire.show-repas',[
            'repas'=> Repas::all(), 
            'restaurants'=> Restaurant::all(), 
            'categories'=> Categorie::all(), 
        ]);
    }
}
