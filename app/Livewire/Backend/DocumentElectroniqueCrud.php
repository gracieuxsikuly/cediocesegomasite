<?php

namespace App\Livewire\Backend;

use App\Models\DocumentElectronique;
use App\Models\Doyenne;
use App\Models\Paroisse;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class DocumentElectroniqueCrud extends Component
{
    use WithPagination, WithFileUploads;

    public $searchTerm = '';
    public $typeFilter = '';
    public $ownerFilter = '';
    public $editMode = false;
    public $documentId;
    public $nom_fichier = '';
    public $motif = '';
    public $type_document = 'autre';
    public $proprietaire_type = 'bureau_diocesain';
    public $doyenne_id = '';
    public $paroisse_id = '';
    public $date_document = '';
    public $fichier = null;

    public $typeOptions = [
        'dossier' => 'Dossier',
        'plan_action' => 'Plan d action',
        'lettre' => 'Lettre',
        'rapport' => 'Rapport',
        'courriel' => 'Courriel',
        'autre' => 'Autre',
    ];

    protected $rules = [
        'nom_fichier' => 'required|string|max:255',
        'motif' => 'nullable|string',
        'type_document' => 'required|in:dossier,plan_action,lettre,rapport,courriel,autre',
        'proprietaire_type' => 'required|in:bureau_diocesain,doyenne,paroisse',
        'doyenne_id' => 'nullable|exists:doyennes,id',
        'paroisse_id' => 'nullable|exists:paroisses,id',
        'date_document' => 'nullable|date',
        'fichier' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,jpg,jpeg,png|max:20480',
    ];

    public function updatedProprietaireType()
    {
        $this->doyenne_id = '';
        $this->paroisse_id = '';
    }

    public function render()
    {
        $query = DocumentElectronique::with(['doyenne', 'paroisse', 'creator']);

        if ($this->searchTerm) {
            $query->where(function ($subQuery) {
                $subQuery->where('nom_fichier', 'like', '%'.$this->searchTerm.'%')
                    ->orWhere('motif', 'like', '%'.$this->searchTerm.'%')
                    ->orWhereHas('doyenne', fn ($q) => $q->where('designation', 'like', '%'.$this->searchTerm.'%'))
                    ->orWhereHas('paroisse', fn ($q) => $q->where('designation', 'like', '%'.$this->searchTerm.'%'));
            });
        }

        if ($this->typeFilter) {
            $query->where('type_document', $this->typeFilter);
        }

        if ($this->ownerFilter) {
            $query->where('proprietaire_type', $this->ownerFilter);
        }

        return view('livewire.backend.document-electronique-crud', [
            'documents' => $query->latest()->paginate(10),
            'doyennes' => Doyenne::orderBy('designation')->get(),
            'paroisses' => Paroisse::with('doyenne')->orderBy('designation')->get(),
            'typeOptions' => $this->typeOptions,
        ])->layout('layouts.defaultbackend', ['title' => 'Gestion electronique des documents']);
    }

    public function createDocument()
    {
        $this->resetForm();
        $this->dispatch('openDocumentModal');
    }

    public function addDocument()
    {
        $this->validate(['fichier' => 'required|file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,jpg,jpeg,png|max:20480'] + $this->rules);
        $this->validateOwner();

        DocumentElectronique::create($this->payload() + [
            'fichier' => $this->storeDocument(),
            'created_by' => auth()->id(),
        ]);

        $this->resetForm();
        $this->dispatch('documentSaved');
        session()->flash('message', 'Document classe avec succes.');
    }

    public function editDocument($id)
    {
        $document = DocumentElectronique::findOrFail($id);

        $this->documentId = $id;
        $this->nom_fichier = $document->nom_fichier;
        $this->motif = $document->motif;
        $this->type_document = $document->type_document;
        $this->proprietaire_type = $document->proprietaire_type;
        $this->doyenne_id = $document->doyenne_id;
        $this->paroisse_id = $document->paroisse_id;
        $this->date_document = optional($document->date_document)->format('Y-m-d');
        $this->editMode = true;
        $this->dispatch('openDocumentModal');
    }

    public function updateDocument()
    {
        $this->validate();
        $this->validateOwner();

        $document = DocumentElectronique::findOrFail($this->documentId);
        $data = $this->payload();

        if ($this->fichier) {
            if ($document->fichier && Storage::disk('public')->exists($document->fichier)) {
                Storage::disk('public')->delete($document->fichier);
            }

            $data['fichier'] = $this->storeDocument();
        }

        $document->update($data);

        $this->resetForm();
        $this->dispatch('documentSaved');
        session()->flash('message', 'Document modifie avec succes.');
    }

    public function deleteDocument($id)
    {
        LivewireAlert::title('Suppression document')
            ->text('Voulez-vous supprimer ce document ?')
            ->asConfirm()
            ->onConfirm('deleteItem', ['id' => $id])
            ->show();
    }

    public function deleteItem($data)
    {
        $document = DocumentElectronique::find($data['id']);

        if (! $document) {
            return;
        }

        if ($document->fichier && Storage::disk('public')->exists($document->fichier)) {
            Storage::disk('public')->delete($document->fichier);
        }

        $document->delete();
        LivewireAlert::title('Succes')->text('Document supprime avec succes')->success()->timer(5000)->show();
    }

    private function payload(): array
    {
        return [
            'nom_fichier' => $this->nom_fichier,
            'motif' => $this->motif,
            'type_document' => $this->type_document,
            'proprietaire_type' => $this->proprietaire_type,
            'doyenne_id' => $this->proprietaire_type === 'doyenne' ? $this->doyenne_id : null,
            'paroisse_id' => $this->proprietaire_type === 'paroisse' ? $this->paroisse_id : null,
            'date_document' => $this->date_document ?: null,
        ];
    }

    private function validateOwner(): void
    {
        if ($this->proprietaire_type === 'doyenne') {
            $this->validate(['doyenne_id' => 'required|exists:doyennes,id']);
        }

        if ($this->proprietaire_type === 'paroisse') {
            $this->validate(['paroisse_id' => 'required|exists:paroisses,id']);
        }
    }

    private function storeDocument(): string
    {
        $fileName = time().'_'.$this->fichier->getClientOriginalName();

        return $this->fichier->storeAs('documents-electroniques', $fileName, 'public');
    }

    private function resetForm(): void
    {
        $this->reset([
            'documentId',
            'nom_fichier',
            'motif',
            'doyenne_id',
            'paroisse_id',
            'date_document',
            'fichier',
            'editMode',
        ]);
        $this->type_document = 'autre';
        $this->proprietaire_type = 'bureau_diocesain';
        $this->resetErrorBag();
    }
}
