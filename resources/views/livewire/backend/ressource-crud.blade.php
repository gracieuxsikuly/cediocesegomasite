<div>
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Gestion des Ressources</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Liste des ressources</h5>

                        <div class="d-flex flex-column flex-md-row gap-2 mb-3">
                            {{-- Champ de recherche --}}
                            <input type="text" class="form-control flex-grow-1" placeholder="Rechercher une ressource..."
                                wire:model.live="searchTerm">

                            {{-- Bouton d'ajout --}}
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ressourceModal">
                                <i class="fas fa-plus me-1"></i> Ajouter
                            </button>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-responsive table-bordered table-striped align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>ID</th>
                                        <th>Titre</th>
                                        <th>Description</th>
                                        <th>Type</th>
                                        <th>Date de création</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($ressources as $ressource)
                                    <tr>
                                        <td>{{ $ressource->id }}</td>
                                        <td>
                                            <strong>{{ $ressource->titre }}</strong>
                                        </td>
                                        <td>
                                            <span class="d-inline-block text-truncate" style="max-width: 300px;" 
                                                  title="{{ $ressource->description }}">
                                                {{ $ressource->description }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge bg-primary">
                                                {{ $typeOptions[$ressource->typeressource] ?? $ressource->typeressource }}
                                            </span>
                                        </td>
                                        <td>{{ $ressource->created_at->format('d/m/Y H:i') }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <button type="button" class="btn btn-sm btn-info" 
                                                    wire:click="showRessource({{ $ressource->id }})"
                                                    title="Voir les détails">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                                <button type="button" class="btn btn-sm btn-warning" 
                                                    wire:click="editRessource({{ $ressource->id }})"
                                                    title="Modifier">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button type="button" class="btn btn-sm btn-danger" 
                                                    wire:click="deleteRessource({{ $ressource->id }})"
                                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette ressource?')"
                                                    title="Supprimer">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Aucune ressource trouvée.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            @if(method_exists($ressources, 'links'))
                            <div class="mt-3">
                                {{ $ressources->links('livewire::bootstrap') }}
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal pour l'ajout/édition -->
        <div class="modal fade" id="ressourceModal" tabindex="-1" aria-labelledby="ressourceModalLabel" aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ressourceModalLabel">
                            {{ $editMode ? 'Modifier la Ressource' : 'Ajouter une nouvelle Ressource' }}
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form wire:submit.prevent="{{ $editMode ? 'updateRessource' : 'addRessource' }}">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="titre" class="form-label">Titre <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="titre" wire:model="titre"
                                            placeholder="Entrez le titre de la ressource">
                                        @error('titre')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
                                        <textarea class="form-control" id="description" wire:model="description" 
                                            rows="4" placeholder="Entrez la description de la ressource"></textarea>
                                        @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="typeressource" class="form-label">Type de ressource <span class="text-danger">*</span></label>
                                        <select class="form-control" id="typeressource" wire:model="typeressource">
                                            <option value="">Sélectionnez un type</option>
                                            @foreach($typeOptions as $value => $label)
                                                <option value="{{ $value }}">{{ $label }}</option>
                                            @endforeach
                                        </select>
                                        @error('typeressource')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                              <div class="row">
                             <div class="col-md-12">
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
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-primary" wire:loading.attr="disabled" wire:target="{{ $editMode ? 'updateRessource' : 'addRessource' }}">
                                <span wire:loading.remove wire:target="{{ $editMode ? 'updateRessource' : 'addRessource' }}">
                                    {{ $editMode ? 'Modifier' : 'Enregistrer' }}
                                </span>
                                <span wire:loading wire:target="{{ $editMode ? 'updateRessource' : 'addRessource' }}">
                                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                    {{ $editMode ? 'Modification...' : 'Enregistrement...' }}
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal pour afficher les détails -->
        <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="detailModalLabel">Détails de la ressource</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div wire:loading class="text-center">
                            <div class="spinner-border" role="status">
                                <span class="visually-hidden">Chargement...</span>
                            </div>
                        </div>
                        <div wire:loading.remove>
                            <div class="row">
                                <div class="col-md-12">
                                    <h4 class="text-primary" id="detailTitre"></h4>
                                    <hr>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <strong>Type:</strong>
                                    <span id="detailType" class="badge bg-primary ms-2"></span>
                                </div>
                                <div class="col-md-6">
                                    <strong>Date de création:</strong>
                                    <span id="detailDate" class="ms-2"></span>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <strong>Description:</strong>
                                    <p id="detailDescription" class="mt-2 p-3 bg-light rounded"></p>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
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
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- container-fluid -->
</div>

@push('scripts')
<script>
    document.addEventListener('livewire:initialized', () => {
        // Fermer le modal après l'ajout ou la modification
        Livewire.on('ressourceAdded', () => {
            const modal = bootstrap.Modal.getInstance(document.getElementById('ressourceModal'));
            modal.hide();
        });

        Livewire.on('ressourceUpdated', () => {
            const modal = bootstrap.Modal.getInstance(document.getElementById('ressourceModal'));
            modal.hide();
        });
        
        // Ouvrir le modal en mode édition
        Livewire.on('openModal', () => {
            const modal = new bootstrap.Modal(document.getElementById('ressourceModal'));
            modal.show();
        });

        // Afficher les détails de la ressource
        Livewire.on('showRessourceDetail', (ressource) => {
            document.getElementById('detailTitre').textContent = ressource.titre;
            document.getElementById('detailDescription').textContent = ressource.description;
            document.getElementById('detailType').textContent = ressource.typeressource;
            document.getElementById('detailDate').textContent = new Date(ressource.created_at).toLocaleDateString('fr-FR');
            
            const modal = new bootstrap.Modal(document.getElementById('detailModal'));
            modal.show();
        });
    });

    // Gérer la fermeture du modal et réinitialiser
    document.getElementById('ressourceModal').addEventListener('hidden.bs.modal', function () {
        Livewire.dispatch('resetForm');
    });
</script>
@endpush