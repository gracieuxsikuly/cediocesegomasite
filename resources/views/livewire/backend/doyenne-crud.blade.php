<div>
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Doyenne</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <!-- Liste des domaines -->
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Liste des doyennes</h5>

                        <div class="d-flex flex-column flex-md-row gap-2 mb-3">
                            {{-- Champ de recherche --}}
                            <input type="text" class="form-control" placeholder="Rechercher un doyenne..."
                                wire:model.live="searchTerm" style="flex: 1 1 70%;">

                            {{-- Bouton d'ajout --}}
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#doyenneModal" style="flex: 0 0 25%;">
                                <i class="fas fa-plus-circle"></i>
                                Ajouter un nouveau Doyenne
                            </button>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-responsive table-bordered table-striped align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>ID</th>
                                        <th>Désignation</th>
                                        <th>Localisation</th>
                                        <th>Responsable</th>
                                        <th>Nombre approximatif de membres</th>
                                        <th>Fonction</th>
                                        <th>Contact</th>
                                        {{-- <th>Status</th> --}}
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($doyennes as $doyenne)
                                    <tr>
                                        <td>{{ $doyenne->id }}</td>
                                        <td>{{ $doyenne->designation }}</td>
                                        <td>{{ $doyenne->localisation }}</td>
                                        <td>{{ $doyenne->responsable }}</td>
                                        <td>{{ $doyenne->nombreaproximatifmembre }}</td>
                                        <td>{{ $doyenne->fonction }}</td>
                                        <td>{{ $doyenne->contact }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <button type="button" class="btn btn-sm btn-warning"
                                                    wire:click="editDoyenne({{ $doyenne->id }})">
                                                    <i class="fas fa-edit"></i>
                                                </button>&nbsp;&nbsp;
                                                <button type="button" class="btn btn-sm btn-danger"
                                                    wire:click="deleteDoyenne({{ $doyenne->id }})">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                        {{-- <td>
                                            <span
                                                class="badge {{ $doyenne->status == 'active' ? 'bg-success' : 'bg-danger' }}">
                                                {{ ucfirst($doyenne->status) }}
                                            </span>
                                        </td> --}}

                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="9" class="text-center">Aucun doyenne trouvé.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            @if(method_exists($doyennes, 'links'))
                            <div class="mt-3">
                                {{ $doyennes->links('livewire::bootstrap') }}
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal pour l'ajout/édition -->
        <div class="modal fade" id="doyenneModal" tabindex="-1" aria-labelledby="doyenneModalLabel" aria-hidden="true"
            wire:ignore.self>
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="doyenneModalLabel">
                            {{ $editMode ? 'Modifier le Doyenne' : 'Ajouter un nouveau Doyenne' }}
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form wire:submit.prevent="{{ $editMode ? 'updateDoyenne' : 'addDoyenne' }}">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="designation" class="form-label">Désignation</label>
                                        <input type="text" class="form-control" id="designation"
                                            wire:model.live="designation" placeholder="Entrez la désignation">
                                        @error('designation')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="localisation" class="form-label">Localisation</label>
                                        <input type="text" class="form-control" id="localisation"
                                            wire:model.live="localisation" placeholder="Entrez la localisation">
                                        @error('localisation')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="nombreaproximatifmembre" class="form-label">Nombre approximatif de
                                            membres</label>
                                        <input type="number" class="form-control" id="nombreaproximatifmembre"
                                            wire:model.live="nombreaproximatifmembre"
                                            placeholder="Entrez le nombre approximatif de membres">
                                        @error('nombreaproximatifmembre')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="responsable" class="form-label">Responsable</label>
                                        <input type="text" class="form-control" id="responsable"
                                            wire:model.live="responsable" placeholder="Entrez le nom du responsable">
                                        @error('responsable')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="fonction" class="form-label">Fonction</label>
                                        <select class="form-control" id="fonction" wire:model.live="fonction">
                                            <option value="">Sélectionnez une fonction</option>
                                            <option value="zelateur">Zélateur</option>
                                            <option value="zelatrice">Zélatrice</option>
                                        </select>
                                        @error('fonction')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="contact" class="form-label">Contact</label>
                                        <input type="text" class="form-control" id="contact" wire:model.live="contact"
                                            placeholder="Entrez le contact">
                                        @error('contact')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- mesage --}}
                        @if (session()->has('message'))
                        <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
                            {{ session('message') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                        {{-- fin message --}}
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-primary" wire:loading.attr="disabled"
                                wire:target="{{ $editMode ? 'updateDoyenne' : 'addDoyenne' }}">
                                <span wire:loading.remove
                                    wire:target="{{ $editMode ? 'updateDoyenne' : 'addDoyenne' }}">
                                    {{ $editMode ? 'Modifier' : 'Enregistrer' }}
                                </span>
                                <span wire:loading wire:target="{{ $editMode ? 'updateDoyenne' : 'addDoyenne' }}">
                                    <span class="spinner-border spinner-border-sm" role="status"
                                        aria-hidden="true"></span>
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
        Livewire.on('doyenneAdded', () => {
            const modal = bootstrap.Modal.getInstance(document.getElementById('doyenneModal'));
            modal.hide();
        });

        Livewire.on('doyenneUpdated', () => {
            const modal = bootstrap.Modal.getInstance(document.getElementById('doyenneModal'));
            modal.hide();
        });
        
        // Ouvrir le modal en mode édition
        Livewire.on('openModal', () => {
            const modal = new bootstrap.Modal(document.getElementById('doyenneModal'));
            modal.show();
        });
    });
</script>
@endpush