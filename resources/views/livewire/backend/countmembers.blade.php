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
                    <h4 class="mb-sm-0 font-size-18">Count Members</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Count Members</h5>
                        <div class="d-flex flex-column flex-md-row gap-2 mb-3">
                            {{-- Champ de recherche --}}
                            <input type="text" class="form-control" placeholder="Rechercher..."
                                wire:model.live="searchTerm" style="flex: 1 1 70%;">

                            {{-- Bouton d'ajout --}}
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#countmemberModal" style="flex: 0 0 25%;">
                                <i class="fas fa-plus-circle"></i>
                                Ajouter
                            </button>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>ID</th>
                                        <th>Croisillons</th>
                                        <th>Feu Nouveau</th>
                                        <th>Cadets</th>
                                        <th>Equap</th>
                                        <th>Année</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($countmembers as $member)
                                    <tr>
                                        <td>{{ $member->id }}</td>
                                        <td>{{ $member->count_croisillons }}</td>
                                        <td>{{ $member->count_feunouveau }}</td>
                                        <td>{{ $member->count_cadets }}</td>
                                        <td>{{ $member->count_equap }}</td>
                                        <td>{{ $member->annee }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <button type="button" class="btn btn-sm btn-warning" 
                                                    wire:click="editCount({{ $member->id }})">
                                                    <i class="fas fa-edit"></i>
                                                </button>&nbsp;&nbsp;
                                                <button type="button" class="btn btn-sm btn-danger" 
                                                    wire:click="deleteCount({{ $member->id }})">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="7" class="text-center">Aucun élément trouvé.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>

                            @if(method_exists($countmembers, 'links'))
                            <div class="mt-3">
                                {{ $countmembers->links('livewire::bootstrap') }}
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal pour l'ajout/édition -->
        <div class="modal fade" id="countmemberModal" tabindex="-1" aria-labelledby="countmemberModal" aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="countmemberModal">
                            {{ $editMode ? 'Modifier' : 'Ajouter' }} Count Member
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form wire:submit.prevent="{{ $editMode ? 'updateCountmember' : 'addCountmember' }}">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="count_croisillons" class="form-label">Croisillons</label>
                                    <input type="number" id="count_croisillons" wire:model.live="count_croisillons" class="form-control" placeholder="Entrez le nombre">
                                    @error('count_croisillons') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="count_feunouveau" class="form-label">Feu Nouveau</label>
                                    <input type="number" id="count_feunouveau" wire:model.live="count_feunouveau" class="form-control" placeholder="Entrez le nombre">
                                    @error('count_feunouveau') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label for="count_cadets" class="form-label">Cadets</label>
                                    <input type="number" id="count_cadets" wire:model.live="count_cadets" class="form-control" placeholder="Entrez le nombre">
                                    @error('count_cadets') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="count_equap" class="form-label">Equap</label>
                                    <input type="number" id="count_equap" wire:model.live="count_equap" class="form-control" placeholder="Entrez le nombre">
                                    @error('count_equap') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <label for="annee" class="form-label">Année</label>
                                    <input type="number" id="annee" wire:model.live="annee" class="form-control">
                                    @error('annee') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-primary" wire:loading.attr="disabled" wire:target="{{ $editMode ? 'updateCountmember' : 'addCountmember' }}">
                                <span wire:loading.remove wire:target="{{ $editMode ? 'updateCountmember' : 'addCountmember' }}">
                                    {{ $editMode ? 'Modifier' : 'Enregistrer' }}
                                </span>
                                <span wire:loading wire:target="{{ $editMode ? 'updateCountmember' : 'addCountmember' }}">
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
                        <h5 class="modal-title">Suppression Count Member</h5>
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
        Livewire.on('countmemberAdded', () => {
            const modal = bootstrap.Modal.getInstance(document.getElementById('countmemberModal'));
            modal.hide();
        });

        Livewire.on('countmemberUpdated', () => {
            const modal = bootstrap.Modal.getInstance(document.getElementById('countmemberModal'));
            modal.hide();
        });
        
        // Ouvrir le modal en mode édition
        Livewire.on('openCountmemberModal', () => {
            const modal = new bootstrap.Modal(document.getElementById('countmemberModal'));
            modal.show();
        });
    });
</script>
@endpush
