<div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Emissions Radio Maria</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Liste des emissions enregistrees</h5>

                        <div class="d-flex flex-column flex-md-row gap-2 mb-3">
                            <input type="text" class="form-control" placeholder="Rechercher une emission..."
                                wire:model.live="searchTerm" style="flex: 1 1 70%;">

                            <button type="button" class="btn btn-primary" wire:click="createEmission" style="flex: 0 0 25%;">
                                <i class="fas fa-plus-circle"></i>
                                Ajouter une emission
                            </button>
                        </div>

                        @if (session()->has('message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('message') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif

                        <div class="table-responsive">
                            <table class="table table-responsive table-bordered table-striped align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>ID</th>
                                        <th>Titre</th>
                                        <th>Date</th>
                                        <th>Paroisse</th>
                                        <th>Doyenne</th>
                                        <th>Audio</th>
                                        <th>Ecoutes</th>
                                        <th>Statut</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($emissions as $emission)
                                    <tr>
                                        <td>{{ $emission->id }}</td>
                                        <td>
                                            <strong>{{ $emission->titre }}</strong>
                                            @if($emission->description)
                                                <br><small class="text-muted">{{ Str::limit($emission->description, 70) }}</small>
                                            @endif
                                        </td>
                                        <td>{{ optional($emission->date_emission)->format('d/m/Y') }}</td>
                                        <td>{{ $emission->paroisse->designation ?? 'N/A' }}</td>
                                        <td>{{ $emission->paroisse->doyenne->designation ?? 'N/A' }}</td>
                                        <td style="min-width: 220px;">
                                            @if($emission->fichier_audio)
                                                <audio controls class="w-100">
                                                    <source src="{{ asset('storage/' . $emission->fichier_audio) }}">
                                                    Votre navigateur ne supporte pas la lecture audio.
                                                </audio>
                                            @else
                                                <span class="text-muted">Aucun fichier</span>
                                            @endif
                                        </td>
                                        <td>
                                            <span class="badge bg-info">
                                                <i class="fas fa-headphones"></i>
                                                {{ number_format($emission->nombre_ecoutes ?? 0, 0, ',', ' ') }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge bg-{{ $emission->statut === 'publie' ? 'success' : 'secondary' }}">
                                                {{ $emission->statut === 'publie' ? 'Publie' : 'Brouillon' }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <button type="button" class="btn btn-sm btn-warning"
                                                    wire:click="editEmission({{ $emission->id }})" title="Modifier">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button type="button" class="btn btn-sm btn-danger"
                                                    wire:click="deleteEmission({{ $emission->id }})" title="Supprimer">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="9" class="text-center">Aucune emission trouvee.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            @if(method_exists($emissions, 'links'))
                            <div class="mt-3">
                                {{ $emissions->links('livewire::bootstrap') }}
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="emissionModal" tabindex="-1" aria-labelledby="emissionModalLabel" aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="emissionModalLabel">
                            {{ $editMode ? 'Modifier emission Radio Maria' : 'Ajouter une emission Radio Maria' }}
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form wire:submit.prevent="{{ $editMode ? 'updateEmission' : 'addEmission' }}">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <label for="titre" class="form-label">Titre <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="titre" wire:model.live="titre"
                                            placeholder="Titre de l'emission">
                                        @error('titre') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="date_emission" class="form-label">Date <span class="text-danger">*</span></label>
                                        <input type="date" class="form-control" id="date_emission" wire:model.live="date_emission">
                                        @error('date_emission') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <label for="paroisse_id" class="form-label">Paroisse <span class="text-danger">*</span></label>
                                        <select class="form-control" id="paroisse_id" wire:model.live="paroisse_id">
                                            <option value="">Selectionnez une paroisse</option>
                                            @foreach($paroisses as $paroisse)
                                                <option value="{{ $paroisse->id }}">
                                                    {{ $paroisse->designation }} @if($paroisse->doyenne) - {{ $paroisse->doyenne->designation }} @endif
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('paroisse_id') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="statut" class="form-label">Statut <span class="text-danger">*</span></label>
                                        <select class="form-control" id="statut" wire:model.live="statut">
                                            <option value="publie">Publie</option>
                                            <option value="brouillon">Brouillon</option>
                                        </select>
                                        @error('statut') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea class="form-control" id="description" wire:model.live="description" rows="3"
                                            placeholder="Resume ou theme aborde pendant l'emission"></textarea>
                                        @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="fichier_audio" class="form-label">Fichier audio {{ $editMode ? '' : '*' }}</label>
                                        <input type="file" class="form-control" id="fichier_audio" wire:model.live="fichier_audio" accept="audio/*">
                                        @error('fichier_audio') <span class="text-danger">{{ $message }}</span> @enderror
                                        @if($fichier_audio)
                                            <small class="text-muted">Fichier selectionne: {{ $fichier_audio->getClientOriginalName() }}</small>
                                        @elseif($editMode)
                                            <small class="text-muted">Laissez vide pour conserver l'ancien fichier audio.</small>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-primary" wire:loading.attr="disabled"
                                wire:target="{{ $editMode ? 'updateEmission' : 'addEmission' }},fichier_audio">
                                <span wire:loading.remove wire:target="{{ $editMode ? 'updateEmission' : 'addEmission' }},fichier_audio">
                                    {{ $editMode ? 'Modifier' : 'Enregistrer' }}
                                </span>
                                <span wire:loading wire:target="{{ $editMode ? 'updateEmission' : 'addEmission' }},fichier_audio">
                                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                    Traitement...
                                </span>
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
        Livewire.on('emissionAdded', () => {
            const modal = bootstrap.Modal.getInstance(document.getElementById('emissionModal'));
            modal.hide();
        });

        Livewire.on('emissionUpdated', () => {
            const modal = bootstrap.Modal.getInstance(document.getElementById('emissionModal'));
            modal.hide();
        });

        Livewire.on('openModal', () => {
            const modal = new bootstrap.Modal(document.getElementById('emissionModal'));
            modal.show();
        });
    });
</script>
@endpush
