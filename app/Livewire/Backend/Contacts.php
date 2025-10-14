<?php

namespace App\Livewire\Backend;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Contact;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

class Contacts extends Component
{
    use WithPagination;

    public $searchTerm = '';
    public $confirmingDelete = false;
    public $itemIdToDelete;
    public $successMessage = '';

    // SUPPRESSION 
     public function deleteContact($id){
 LivewireAlert::title('Supression contact')
    ->text('Êtes-vous sûr de vouloir supprimer ce contact ?')
    ->asConfirm()
    ->onConfirm('deleteItem', ['id' => $id])
    ->show();
    }

public function deleteItem($data)
{
    $itemId = $data['id'];
     Contact::find($itemId)->delete();
     LivewireAlert::title('Success')
    ->text('contact Suprimé avec success')
    ->success()
    ->timer(5000) // Dismisses after 5 seconds
    ->show();
}

    public function cancelDelete()
    {
        $this->confirmingDelete = false;
        $this->itemIdToDelete = null;
    }

    public function render()
    {
        $query = Contact::query();

        if ($this->searchTerm) {
            $query->where(function($q) {
                $q->where('name', 'like', '%'.$this->searchTerm.'%')
                  ->orWhere('email', 'like', '%'.$this->searchTerm.'%')
                  ->orWhere('sujet', 'like', '%'.$this->searchTerm.'%')
                  ->orWhere('message', 'like', '%'.$this->searchTerm.'%');
            });
        }

        $contacts = $query->orderBy('created_at', 'desc')->paginate(10);
        
        return view('livewire.backend.contacts', [
            'contacts' => $contacts
        ])->layout('layouts.defaultbackend', ['title' => 'Contacts']);
    }
}