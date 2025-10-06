<div>
    <div class="container-fluid">
        <!-- Message de succès -->
        @if($successMessage)
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ $successMessage }}
            <button type="button" class="btn-close" wire:click="$set('successMessage', '')"></button>
        </div>
        @endif

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Niya ya mwezi</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Niya ya mwezi</h5>
                        <div class="d-flex flex-column flex-md-row gap-2 mb-3">
                            {{-- Champ de recherche --}}
                            <input type="text" class="form-control" placeholder="Rechercher..."
                                wire:model.live="searchTerm" style="flex: 1 1 70%;">

                            {{-- Bouton d'ajout --}}
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#niamweziModal" style="flex: 0 0 25%;">
                                <i class="fas fa-plus-circle"></i>
                                Ajouter
                            </button>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>ID</th>
                                        <th>Désignation</th>
                                        <th>Mois</th>
                                        <th>Statuts</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($niamwezis as $niamwezist)
                                    <tr>
                                        <td>{{ $niamwezist->id }}</td>
                                        <td>{{ $niamwezist->designation }}</td>
                                        <td>{{ $niamwezist->mois }}</td>
                                        <td>
                                            @if($niamwezist->statuts == 'actif')
                                            <a wire:click.prevent="changeStatus({{ $niamwezist->id }})"><span class="badge bg-success">{{ $niamwezist->statuts }}</span></a>
                                            @else
                                            <a wire:click.prevent="changeStatus({{ $niamwezist->id }})"><span class="badge bg-secondary">{{ $niamwezist->statuts }}</span></a>
                                            @endif
                                        </td>
                                         <td>
                                            <div class="btn-group" role="group">
                                                <button type="button" class="btn btn-sm btn-warning" 
                                                    wire:click="editNia({{ $niamwezist->id }})">
                                                    <i class="fas fa-edit"></i>
                                                </button>&nbsp;&nbsp;
                                                <button type="button" class="btn btn-sm btn-danger" 
                                                    wire:click="deleteNia({{ $niamwezist->id }})">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5" class="text-center">Aucun élément trouvé.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>

                            @if(method_exists($niamwezis, 'links'))
                            <div class="mt-3">
                                {{ $niamwezis->links('livewire::bootstrap') }}
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal pour l'ajout/édition -->
        <div class="modal fade" id="niamweziModal" tabindex="-1" aria-labelledby="niamweziModal" aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="niamweziModal">
                            {{ $editMode ? 'Modifier' : 'Ajouter' }} Nia
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form wire:submit.prevent="{{ $editMode ? 'updateNiamwezi' : 'addNiamwezi' }}">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="designation" class="form-label">Désignation</label>
                                        <textarea class="form-control" id="designation" wire:model.live="designation" placeholder="Entrez la désignation"
                                            rows="10"></textarea>
                                        @error('designation') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>  
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="mois" class="form-label">Mois</label>
                                        <select class="form-select" id="mois" wire:model.live="mois">
                                            <option value="">-- Sélectionner le mois --</option>
                                            <option value="janvier">Janvier</option>
                                            <option value="février">Février</option>
                                            <option value="mars">Mars</option>
                                            <option value="avril">Avril</option>
                                            <option value="mai">Mai</option>
                                            <option value="juin">Juin</option>
                                            <option value="juillet">Juillet</option>
                                            <option value="août">Août</option>
                                            <option value="septembre">Septembre</option>
                                            <option value="octobre">Octobre</option>
                                            <option value="novembre">Novembre</option>
                                            <option value="décembre">Décembre</option>
                                        </select>
                                        @error('mois') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-primary" wire:loading.attr="disabled" wire:target="{{ $editMode ? 'updateNiamwezi' : 'addNiamwezi' }}">
                                <span wire:loading.remove wire:target="{{ $editMode ? 'updateNiamwezi' : 'addNiamwezi' }}">
                                    {{ $editMode ? 'Modifier' : 'Enregistrer' }}
                                </span>
                                <span wire:loading wire:target="{{ $editMode ? 'updateNiamwezi' : 'addNiamwezi' }}">
                                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                    {{ $editMode ? 'Modification...' : 'Enregistrement...' }}
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal de confirmation de suppression -->
        @if($confirmingDelete)
        <div class="modal fade show" style="display: block; background-color: rgba(0,0,0,0.5);" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Suppression Nia</h5>
                    </div>
                    <div class="modal-body">
                        <p>Êtes-vous sûr de vouloir supprimer cet élément ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click="cancelDelete">Annuler</button>
                        <button type="button" class="btn btn-danger" wire:click="confirmDelete">Supprimer</button>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div> <!-- container-fluid -->
</div>

@push('scripts')
<script>
    document.addEventListener('livewire:initialized', () => {
        // Fermer le modal après l'ajout ou la modification
        Livewire.on('niamweziAdded', () => {
            const modal = bootstrap.Modal.getInstance(document.getElementById('niamweziModal'));
            modal.hide();
        });

        Livewire.on('niamweziUpdated', () => {
            const modal = bootstrap.Modal.getInstance(document.getElementById('niamweziModal'));
            modal.hide();
        });
        
        // Ouvrir le modal en mode édition
        Livewire.on('openNiamweziModal', () => {
            const modal = new bootstrap.Modal(document.getElementById('niamweziModal'));
            modal.show();
        });
    });
</script>
@endpush