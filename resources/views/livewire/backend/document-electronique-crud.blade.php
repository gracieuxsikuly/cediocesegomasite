<div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Gestion electronique des documents</h4>
                    <button type="button" class="btn btn-primary" wire:click="createDocument">
                        <i class="fas fa-folder-plus"></i> Classer un document
                    </button>
                </div>
            </div>
        </div>

        @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row">
            <div class="col-xl-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="row g-2 mb-3">
                            <div class="col-md-5">
                                <input type="text" class="form-control" placeholder="Rechercher par nom, motif, doyenne ou paroisse..." wire:model.live.debounce.400ms="searchTerm">
                            </div>
                            <div class="col-md-3">
                                <select class="form-control" wire:model.live="typeFilter">
                                    <option value="">Tous les types</option>
                                    @foreach($typeOptions as $value => $label)
                                        <option value="{{ $value }}">{{ $label }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select class="form-control" wire:model.live="ownerFilter">
                                    <option value="">Tous les proprietaires</option>
                                    <option value="bureau_diocesain">Bureau diocesan</option>
                                    <option value="doyenne">Doyenne</option>
                                    <option value="paroisse">Paroisse</option>
                                </select>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>Nom du fichier</th>
                                        <th>Type</th>
                                        <th>Proprietaire</th>
                                        <th>Date</th>
                                        <th>Motif</th>
                                        <th>Fichier</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($documents as $document)
                                        <tr>
                                            <td><strong>{{ $document->nom_fichier }}</strong></td>
                                            <td><span class="badge bg-primary">{{ $typeOptions[$document->type_document] ?? $document->type_document }}</span></td>
                                            <td>{{ $document->proprietaire_label }}</td>
                                            <td>{{ optional($document->date_document)->format('d/m/Y') ?? 'N/A' }}</td>
                                            <td>{{ Str::limit($document->motif, 60) }}</td>
                                            <td>
                                                <a href="{{ asset('storage/' . $document->fichier) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                                    <i class="fas fa-download"></i> Telecharger
                                                </a>
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <button class="btn btn-sm btn-warning" wire:click="editDocument({{ $document->id }})"><i class="fas fa-edit"></i></button>
                                                    <button class="btn btn-sm btn-danger" wire:click="deleteDocument({{ $document->id }})"><i class="fas fa-trash"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr><td colspan="7" class="text-center text-muted">Aucun document classe.</td></tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $documents->links('livewire::bootstrap') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="documentModal" tabindex="-1" aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ $editMode ? 'Modifier le document' : 'Classer un document' }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form wire:submit.prevent="{{ $editMode ? 'updateDocument' : 'addDocument' }}">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-8 mb-3">
                                    <label class="form-label">Nom du fichier <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" wire:model.live="nom_fichier">
                                    @error('nom_fichier') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Type <span class="text-danger">*</span></label>
                                    <select class="form-control" wire:model.live="type_document">
                                        @foreach($typeOptions as $value => $label)
                                            <option value="{{ $value }}">{{ $label }}</option>
                                        @endforeach
                                    </select>
                                    @error('type_document') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Proprietaire <span class="text-danger">*</span></label>
                                    <select class="form-control" wire:model.live="proprietaire_type">
                                        <option value="bureau_diocesain">Bureau diocesan</option>
                                        <option value="doyenne">Doyenne</option>
                                        <option value="paroisse">Paroisse</option>
                                    </select>
                                    @error('proprietaire_type') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                @if($proprietaire_type === 'doyenne')
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Doyenne <span class="text-danger">*</span></label>
                                        <select class="form-control" wire:model.live="doyenne_id">
                                            <option value="">Selectionner</option>
                                            @foreach($doyennes as $doyenne)
                                                <option value="{{ $doyenne->id }}">{{ $doyenne->designation }}</option>
                                            @endforeach
                                        </select>
                                        @error('doyenne_id') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                @endif
                                @if($proprietaire_type === 'paroisse')
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Paroisse <span class="text-danger">*</span></label>
                                        <select class="form-control" wire:model.live="paroisse_id">
                                            <option value="">Selectionner</option>
                                            @foreach($paroisses as $paroisse)
                                                <option value="{{ $paroisse->id }}">{{ $paroisse->designation }}</option>
                                            @endforeach
                                        </select>
                                        @error('paroisse_id') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                @endif
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Date du document</label>
                                    <input type="date" class="form-control" wire:model.live="date_document">
                                    @error('date_document') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Motif</label>
                                <textarea class="form-control" rows="3" wire:model.live="motif"></textarea>
                                @error('motif') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Fichier {{ $editMode ? '' : '*' }}</label>
                                <input type="file" class="form-control" wire:model.live="fichier">
                                @error('fichier') <span class="text-danger">{{ $message }}</span> @enderror
                                @if($fichier)
                                    <small class="text-muted">Fichier selectionne: {{ $fichier->getClientOriginalName() }}</small>
                                @elseif($editMode)
                                    <small class="text-muted">Laissez vide pour conserver le fichier existant.</small>
                                @endif
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-primary" wire:loading.attr="disabled" wire:target="fichier,addDocument,updateDocument">
                                <span wire:loading.remove wire:target="fichier,addDocument,updateDocument">{{ $editMode ? 'Modifier' : 'Enregistrer' }}</span>
                                <span wire:loading wire:target="fichier,addDocument,updateDocument">Traitement...</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('livewire:initialized', () => {
        Livewire.on('openDocumentModal', () => new bootstrap.Modal(document.getElementById('documentModal')).show());
        Livewire.on('documentSaved', () => bootstrap.Modal.getInstance(document.getElementById('documentModal'))?.hide());
    });
</script>
@endpush
