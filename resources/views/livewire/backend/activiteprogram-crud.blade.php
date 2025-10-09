<div>
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Activités Programmées</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Liste des activités</h5>
                        
                        <div class="d-flex flex-column flex-md-row gap-2 mb-3">
                            {{-- Champ de recherche --}}
                            <input type="text" class="form-control" placeholder="Rechercher une activité..."
                                wire:model.live="searchTerm" style="flex: 1 1 70%;">

                            {{-- Bouton d'ajout --}}
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#activiteModal" style="flex: 0 0 25%;">
                                <i class="fas fa-plus-circle"></i>
                                Ajouter une nouvelle Activité
                            </button>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-responsive table-bordered table-striped align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>ID</th>
                                        <th>Titre</th>
                                        <th>Date</th>
                                        <th>Heure</th>
                                        <th>Lieu</th>
                                        <th>Type</th>
                                        <th>Images</th>
                                        <th>Statut</th>
                                        <th>Doyenne</th>
                                        <th>Paroisse</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($activites as $activite)
                                    <tr>
                                        <td>{{ $activite->id }}</td>
                                        <td>
                                            <strong>{{ $activite->titre }}</strong>
                                            @if($activite->description)
                                                <br><small class="text-muted">{{ Str::limit($activite->description, 50) }}</small>
                                            @endif
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($activite->dateactivite)->format('d/m/Y') }}</td>
                                        <td>
                                            @if($activite->start_time && $activite->end_time)
                                                {{ \Carbon\Carbon::parse($activite->start_time)->format('H:i') }} - {{ \Carbon\Carbon::parse($activite->end_time)->format('H:i') }}
                                            @else
                                                <span class="text-muted">N/A</span>
                                            @endif
                                        </td>
                                        <td>{{ $activite->emplacement }}</td>
                                        <td>
                                            <span class="badge bg-info">{{ $activite->typeactivite }}</span>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-1">
                                                @if($activite->image1)
                                                    <img src="{{ asset('storage/' . $activite->image1) }}" 
                                                         alt="Image 1" 
                                                         style="width: 40px; height: 40px; object-fit: cover; cursor: pointer;"
                                                         data-bs-toggle="modal" 
                                                         data-bs-target="#imageModal"
                                                         onclick="document.getElementById('modalImage').src = this.src">
                                                @endif
                                                @if($activite->image2)
                                                    <img src="{{ asset('storage/' . $activite->image2) }}" 
                                                         alt="Image 2" 
                                                         style="width: 40px; height: 40px; object-fit: cover; cursor: pointer;"
                                                         data-bs-toggle="modal" 
                                                         data-bs-target="#imageModal"
                                                         onclick="document.getElementById('modalImage').src = this.src">
                                                @endif
                                                @if($activite->image3)
                                                    <img src="{{ asset('storage/' . $activite->image3) }}" 
                                                         alt="Image 3" 
                                                         style="width: 40px; height: 40px; object-fit: cover; cursor: pointer;"
                                                         data-bs-toggle="modal" 
                                                         data-bs-target="#imageModal"
                                                         onclick="document.getElementById('modalImage').src = this.src">
                                                @endif
                                                @if(!$activite->image1 && !$activite->image2 && !$activite->image3)
                                                    <span class="text-muted">Aucune image</span>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge bg-{{ $activite->statut === 'effectif' ? 'success' : 'secondary' }}">
                                                {{ $activite->statut === 'effectif' ? 'Effectif' : 'en attente' }}
                                            </span>
                                        </td>
                                        <td>{{ $activite->doyenne->designation ?? 'N/A' }}</td>
                                        <td>{{ $activite->paroisse->designation ?? 'N/A' }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <button type="button" class="btn btn-sm btn-warning" 
                                                    wire:click="editActivite({{ $activite->id }})">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button type="button" class="btn btn-sm btn-danger" 
                                                    wire:click="deleteActivite({{ $activite->id }})">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                                <button type="button" class="btn btn-sm btn-{{ $activite->statut === 'effectif' ? 'secondary' : 'success' }}" 
                                                    wire:click="toggleStatus({{ $activite->id }})"
                                                    title="{{ $activite->statut === 'effectif' ? 'Désactiver' : 'Activer' }}">
                                                    <i class="fas fa-{{ $activite->statut === 'effectif' ? 'eye-slash' : 'eye' }}"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="10" class="text-center">Aucune activité trouvée.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            @if(method_exists($activites, 'links'))
                            <div class="mt-3">
                                {{ $activites->links('livewire::bootstrap') }}
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal pour l'ajout/édition -->
        <div class="modal fade" id="activiteModal" tabindex="-1" aria-labelledby="activiteModalLabel" aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="activiteModalLabel">
                            {{ $editMode ? 'Modifier l\'Activité' : 'Ajouter une nouvelle Activité' }}
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    
                    {{-- message --}}
                    @if (session()->has('message'))
                        <div class="alert alert-success m-3">
                            {{ session('message') }}
                        </div>
                    @endif
                    {{-- Fin message --}}
                    
                    <form wire:submit.prevent="{{ $editMode ? 'updateActivite' : 'addActivite' }}" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="titre" class="form-label">Titre *</label>
                                        <input type="text" class="form-control" id="titre" wire:model.live="titre"
                                            placeholder="Entrez le titre de l'activité">
                                        @error('titre')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description *</label>
                                        <textarea class="form-control" id="description" wire:model.live="description" 
                                                  rows="3" placeholder="Décrivez l'activité"></textarea>
                                        @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="dateactivite" class="form-label">Date de l'activité *</label>
                                        <input type="date" class="form-control" id="dateactivite" wire:model.live="dateactivite">
                                        @error('dateactivite')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                 <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="start_time" class="form-label">Heure de début *</label>
                                        <input type="time" class="form-control" id="start_time" wire:model.live="start_time">
                                        @error('start_time')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="end_time" class="form-label">Heure de fin *</label>
                                            <input type="time" class="form-control" id="end_time" wire:model.live="end_time">
                                            @error('end_time')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="emplacement" class="form-label">Lieu *</label>
                                        <input type="text" class="form-control" id="emplacement" wire:model.live="emplacement"
                                            placeholder="Entrez le lieu de l'activité">
                                        @error('emplacement')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                               <div class="col-md-12">
    <div class="mb-3">
        <label for="typeactivite" class="form-label">Type d'activité *</label>
        <select class="form-control" id="typeactivite" wire:model.live="typeactivite">
            <option value="">Sélectionnez un type</option>
            <option value="Jeudi saint">Jeudi saint</option>
            <option value="Pie X">Pie X</option>
            <option value="Investiture">Investiture</option>
            <option value="Aspiranant">Aspiranant</option>
            <option value="Promesse">Promesse</option>
            <option value="Journee eucharistique">Journée eucharistique</option>
            <option value="Sesssion paroiciale">Session paroissiale</option>
            <option value="Session decanale">Session décanale</option>
            <option value="Session diocesaine">Session diocésaine</option>
            <option value="Jeudi Adoration">Jeudi Adoration</option>
            <option value="Christ Roi">Christ Roi</option>
            <option value="Autre">Autre</option>
        </select>
        @error('typeactivite')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>

                            </div>
                            
                            <div class="row">
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
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="paroisse_id" class="form-label">Paroisse</label>
                                        <select class="form-control" id="paroisse_id" wire:model.live="paroisse_id">
                                            <option value="">Sélectionnez une paroisse</option>
                                            @foreach($paroisses as $paroisse)
                                                <option value="{{ $paroisse->id }}">{{ $paroisse->designation }}</option>
                                            @endforeach
                                        </select>
                                        @error('paroisse_id')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            {{-- Section des images --}}
                            <div class="row">
                                <div class="col-md-12">
                                    <h6 class="mb-3">Images de l'activité</h6>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="image1" class="form-label">Image 1</label>
                                        <input type="file" class="form-control" id="image1" wire:model.live="image1" accept="image/*">
                                        @error('image1')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        @if($image1)
                                            <div class="mt-2">
                                                <img src="{{ $image1->temporaryUrl() }}" alt="Aperçu" style="width: 80px; height: 60px; object-fit: cover;">
                                                <button type="button" class="btn btn-sm btn-danger ms-2" wire:click="removeImage('image1')">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="image2" class="form-label">Image 2</label>
                                        <input type="file" class="form-control" id="image2" wire:model.live="image2" accept="image/*">
                                        @error('image2')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        @if($image2)
                                            <div class="mt-2">
                                                <img src="{{ $image2->temporaryUrl() }}" alt="Aperçu" style="width: 80px; height: 60px; object-fit: cover;">
                                                <button type="button" class="btn btn-sm btn-danger ms-2" wire:click="removeImage('image2')">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="image3" class="form-label">Image 3</label>
                                        <input type="file" class="form-control" id="image3" wire:model.live="image3" accept="image/*">
                                        @error('image3')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        @if($image3)
                                            <div class="mt-2">
                                                <img src="{{ $image3->temporaryUrl() }}" alt="Aperçu" style="width: 80px; height: 60px; object-fit: cover;">
                                                <button type="button" class="btn btn-sm btn-danger ms-2" wire:click="removeImage('image3')">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="slug" class="form-label">Slug (généré automatiquement)</label>
                                        <input type="text" class="form-control" id="slug" wire:model.live="slug" readonly>
                                        @error('slug')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-primary" 
                                wire:loading.attr="disabled" 
                                wire:target="{{ $editMode ? 'updateActivite' : 'addActivite' }}, image1, image2, image3">
                                <span wire:loading.remove wire:target="{{ $editMode ? 'updateActivite' : 'addActivite' }}, image1, image2, image3">
                                    {{ $editMode ? 'Modifier' : 'Enregistrer' }}
                                </span>
                                <span wire:loading wire:target="{{ $editMode ? 'updateActivite' : 'addActivite' }}, image1, image2, image3">
                                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                    {{ $editMode ? 'Modification...' : 'Enregistrement...' }}
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal pour l'affichage de l'image en grand -->
        <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="imageModalLabel">Aperçu de l'image</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <img id="modalImage" src="" alt="Aperçu" style="max-width: 100%; max-height: 80vh;">
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
        Livewire.on('activiteAdded', () => {
            const modal = bootstrap.Modal.getInstance(document.getElementById('activiteModal'));
            modal.hide();
        });

        Livewire.on('activiteUpdated', () => {
            const modal = bootstrap.Modal.getInstance(document.getElementById('activiteModal'));
            modal.hide();
        });
        
        // Ouvrir le modal en mode édition
        Livewire.on('openModal', () => {
            const modal = new bootstrap.Modal(document.getElementById('activiteModal'));
            modal.show();
        });

        // Réinitialiser le formulaire quand le modal est fermé
        document.getElementById('activiteModal').addEventListener('hidden.bs.modal', function () {
            Livewire.dispatch('resetForm');
        });
    });

    // Gestion de l'affichage des images en grand
    document.addEventListener('DOMContentLoaded', function() {
        const imageModal = new bootstrap.Modal(document.getElementById('imageModal'));
    });
</script>
@endpush