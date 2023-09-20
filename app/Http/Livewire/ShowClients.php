<?php

namespace App\Http\Livewire;

use App\Models\Client;
use Livewire\Component;

class ShowClients extends Component
{

    public Client $deleting;
    public Client $editing;
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
            
        ];
    }

    public function delete(Client $clients)
    {
        $this->deleting = $clients;
        $this->action = 'Supprimer un client';
        $this->showDeleteModal = true;
    }

    public function edit(Client $clients)
    {
        $this->editing = $clients;
        $this->action = 'Modifier un client';
        $this->showEditModal = true;
    }

    public function create()
    {
        $this->editing = new Client();
        $this->action = 'Ajouter un client';
        $this->showEditModal = true;
    }
    public function deleteSelected()
    {
        $this->deleting->delete();

        $this->showDeleteModal = false;

        $this->notify('Vous avez supprimé un client');
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
        return view('livewire.show-clients',[
            'clients'=> Client::all(),
        ]);
    }
}
