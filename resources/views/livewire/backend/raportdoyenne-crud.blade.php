<div>
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Rapports des Doyennes</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Liste des rapports</h5>

                        <div class="d-flex flex-column flex-md-row gap-2 mb-3">
                            {{-- Champ de recherche --}}
                            <input type="text" class="form-control flex-grow-1" placeholder="Rechercher un rapport..."
                                wire:model.live="searchTerm">

                            {{-- Bouton d'ajout --}}
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#raportModal">
                                Ajouter
                            </button>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-responsive table-bordered table-striped align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>ID</th>
                                        <th>Désignation</th>
                                        <th>Année</th>
                                        <th>Fichier</th>
                                        <th>Envoyé par</th>
                                        <th>Doyenne</th>
                                        <th>Date d'envoi</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($raports as $raport)
                                    <tr>
                                        <td>{{ $raport->id }}</td>
                                        <td>{{ $raport->designation }}</td>
                                        <td>{{ $raport->annee }}</td>
                                        <td>
                                            @if($raport->lienfichier)
                                                <button type="button" class="btn btn-sm btn-outline-primary" 
                                                    wire:click="downloadFile({{ $raport->id }})">
                                                    <i class="fas fa-download"></i> Télécharger
                                                </button>
                                            @else
                                                <span class="text-muted">Aucun fichier</span>
                                            @endif
                                        </td>
                                        <td>{{ $raport->envoyer_par }}</td>
                                        <td>{{ $raport->doyenne->designation ?? 'N/A' }}</td>
                                        <td>{{ $raport->dateenvoi }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <button type="button" class="btn btn-sm btn-warning" 
                                                    wire:click="editRaport({{ $raport->id }})">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button type="button" class="btn btn-sm btn-danger" 
                                                    wire:click="deleteRaport({{ $raport->id }})"
                                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce rapport?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="8" class="text-center">Aucun rapport trouvé.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            @if(method_exists($raports, 'links'))
                            <div class="mt-3">
                                {{ $raports->links('livewire::bootstrap') }}
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal pour l'ajout/édition -->
        <div class="modal fade" id="raportModal" tabindex="-1" aria-labelledby="raportModalLabel" aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="raportModalLabel">
                            {{ $editMode ? 'Modifier le Rapport' : 'Ajouter un nouveau Rapport' }}
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form wire:submit.prevent="{{ $editMode ? 'updateRaport' : 'addRaport' }}" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="designation" class="form-label">Désignation</label>
                                        <input type="text" class="form-control" id="designation" wire:model.live="designation"
                                            placeholder="Entrez la désignation du rapport">
                                        @error('designation')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="annee" class="form-label">Année</label>
                                        <input type="number" class="form-control" id="annee" wire:model.live="annee"
                                            placeholder="Entrez l'année" min="2000" max="{{ date('Y') + 1 }}">
                                        @error('annee')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="envoyer_par" class="form-label">Envoyé par</label>
                                        <input type="text" class="form-control" id="envoyer_par" wire:model.live="envoyer_par"
                                            placeholder="Entrez le nom de l'expéditeur">
                                        @error('envoyer_par')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="doyenne_id" class="form-label">Doyenne</label>
                                        <select class="form-control" id="doyenne_id" wire:model.live="doyenne_id">
                                            <option value="">Sélectionnez une doyenne</option>
                                            @foreach($doyennes as $doyenne)
                                                <option value="{{ $doyenne->id }}">{{ $doyenne->designation }}</option>
                                            @endforeach
                                        </select>
                                        @error('doyenne_id')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="dateenvoi" class="form-label">Date d'envoi</label>
                                        <input type="date" class="form-control" id="dateenvoi" wire:model.live="dateenvoi">
                                        @error('dateenvoi')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="lienfichier" class="form-label">Fichier</label>
                                        <input type="file" class="form-control" id="lienfichier" wire:model.live="lienfichier">
                                        @error('lienfichier')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        @if($lienfichier)
                                            <small class="text-muted">Fichier sélectionné: {{ $lienfichier->getClientOriginalName() }}</small>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-primary" wire:loading.attr="disabled" wire:target="{{ $editMode ? 'updateRaport' : 'addRaport' }}, lienfichier">
                                <span wire:loading.remove wire:target="{{ $editMode ? 'updateRaport' : 'addRaport' }}, lienfichier">
                                    {{ $editMode ? 'Modifier' : 'Enregistrer' }}
                                </span>
                                <span wire:loading wire:target="{{ $editMode ? 'updateRaport' : 'addRaport' }}, lienfichier">
                                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                    {{ $editMode ? 'Modification...' : 'Enregistrement...' }}
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> <!-- container-fluid -->
</div>

@push('scripts')
<script>
    document.addEventListener('livewire:initialized', () => {
        // Fermer le modal après l'ajout ou la modification
        Livewire.on('raportAdded', () => {
            const modal = bootstrap.Modal.getInstance(document.getElementById('raportModal'));
            modal.hide();
        });

        Livewire.on('raportUpdated', () => {
            const modal = bootstrap.Modal.getInstance(document.getElementById('raportModal'));
            modal.hide();
        });
        
        // Ouvrir le modal en mode édition
        Livewire.on('openModal', () => {
            const modal = new bootstrap.Modal(document.getElementById('raportModal'));
            modal.show();
        });
    });
</script>
@endpush