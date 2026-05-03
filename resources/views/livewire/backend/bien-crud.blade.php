<div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Gestion des biens et equipements</h4>
                    <button type="button" class="btn btn-primary" wire:click="createBien">
                        <i class="fas fa-plus-circle"></i> Ajouter un bien
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
            <div class="col-xl-4 col-md-6">
                <div class="card border-0 shadow-sm"><div class="card-body"><p class="text-muted mb-1">Quantite totale</p><h3>{{ number_format($totalBiens, 0, ',', ' ') }}</h3></div></div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="card border-0 shadow-sm"><div class="card-body"><p class="text-muted mb-1">Valeur totale du stock</p><h3>{{ number_format($valeurStock, 2, ',', ' ') }} USD</h3></div></div>
            </div>
            <div class="col-xl-4 col-md-12">
                <div class="card border-0 shadow-sm"><div class="card-body"><p class="text-muted mb-1">Categories</p><h3>{{ $categories->count() }}</h3></div></div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Categories de biens</h5>
                        <form wire:submit.prevent="addCategorie" class="mb-3">
                            <input type="text" class="form-control mb-2" placeholder="Nouvelle categorie" wire:model.live="categorieDesignation">
                            @error('categorieDesignation') <span class="text-danger d-block mb-2">{{ $message }}</span> @enderror
                            <textarea class="form-control mb-2" rows="2" placeholder="Description" wire:model.live="categorieDescription"></textarea>
                            <button class="btn btn-sm btn-primary" type="submit">{{ $categorieEditMode ? 'Modifier categorie' : 'Ajouter categorie' }}</button>
                        </form>
                        <div class="list-group">
                            @forelse($categories as $categorie)
                                <div class="list-group-item d-flex justify-content-between align-items-center gap-2">
                                    <div><span>{{ $categorie->designation }}</span><span class="badge bg-primary rounded-pill ms-2">{{ $categorie->biens_count }}</span></div>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-warning" wire:click="editCategorie({{ $categorie->id }})"><i class="fas fa-edit"></i></button>
                                        <button type="button" class="btn btn-sm btn-outline-danger" wire:click="deleteCategorie({{ $categorie->id }})"><i class="fas fa-trash"></i></button>
                                    </div>
                                </div>
                            @empty
                                <p class="text-muted mb-0">Aucune categorie.</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="row g-2 mb-3">
                            <div class="col-md-5"><input type="text" class="form-control" placeholder="Rechercher bien, reference, lieu..." wire:model.live.debounce.400ms="searchTerm"></div>
                            <div class="col-md-4">
                                <select class="form-control" wire:model.live="categorieFilter">
                                    <option value="">Toutes les categories</option>
                                    @foreach($categories as $categorie)
                                        <option value="{{ $categorie->id }}">{{ $categorie->designation }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select class="form-control" wire:model.live="etatFilter">
                                    <option value="">Tous les etats</option>
                                    <option value="neuf">Neuf</option>
                                    <option value="bon">Bon</option>
                                    <option value="moyen">Moyen</option>
                                    <option value="a_reparer">A reparer</option>
                                    <option value="hors_service">Hors service</option>
                                </select>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped align-middle">
                                <thead class="table-light"><tr><th>Bien</th><th>Categorie</th><th>Qt</th><th>Prix unitaire</th><th>Prix total</th><th>Etat</th><th>Proprietaire</th><th>Actions</th></tr></thead>
                                <tbody>
                                    @forelse($biens as $bien)
                                        <tr>
                                            <td><strong>{{ $bien->designation }}</strong><br><small>{{ $bien->reference }}</small></td>
                                            <td>{{ $bien->categorie->designation ?? 'N/A' }}</td>
                                            <td>{{ $bien->quantite }}</td>
                                            <td>{{ $bien->prix_unitaire ? number_format($bien->prix_unitaire, 2, ',', ' ') : 'N/A' }}</td>
                                            <td>{{ number_format($bien->prix_total, 2, ',', ' ') }}</td>
                                            <td><span class="badge bg-info">{{ str_replace('_', ' ', $bien->etat) }}</span></td>
                                            <td>{{ $bien->proprietaire_label }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <button class="btn btn-sm btn-warning" wire:click="editBien({{ $bien->id }})"><i class="fas fa-edit"></i></button>
                                                    <button class="btn btn-sm btn-danger" wire:click="deleteBien({{ $bien->id }})"><i class="fas fa-trash"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr><td colspan="8" class="text-center text-muted">Aucun bien enregistre.</td></tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $biens->links('livewire::bootstrap') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="bienModal" tabindex="-1" aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog modal-lg"><div class="modal-content">
                <div class="modal-header"><h5 class="modal-title">{{ $editMode ? 'Modifier le bien' : 'Ajouter un bien' }}</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div>
                <form wire:submit.prevent="{{ $editMode ? 'updateBien' : 'addBien' }}">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 mb-3"><label class="form-label">Designation *</label><input type="text" class="form-control" wire:model.live="designation">@error('designation') <span class="text-danger">{{ $message }}</span> @enderror</div>
                            <div class="col-md-6 mb-3"><label class="form-label">Categorie *</label><select class="form-control" wire:model.live="categorie_bien_id"><option value="">Selectionner</option>@foreach($categories as $categorie)<option value="{{ $categorie->id }}">{{ $categorie->designation }}</option>@endforeach</select>@error('categorie_bien_id') <span class="text-danger">{{ $message }}</span> @enderror</div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-3"><label class="form-label">Reference</label><input type="text" class="form-control" wire:model.live="reference"></div>
                            <div class="col-md-4 mb-3"><label class="form-label">Quantite *</label><input type="number" class="form-control" wire:model.live="quantite" min="1"></div>
                            <div class="col-md-4 mb-3"><label class="form-label">Prix unitaire</label><input type="number" step="0.01" class="form-control" wire:model.live="prix_unitaire"></div>
                            <div class="col-md-4 mb-3"><label class="form-label">Etat *</label><select class="form-control" wire:model.live="etat"><option value="neuf">Neuf</option><option value="bon">Bon</option><option value="moyen">Moyen</option><option value="a_reparer">A reparer</option><option value="hors_service">Hors service</option></select></div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-3"><label class="form-label">Proprietaire *</label><select class="form-control" wire:model.live="proprietaire_type"><option value="bureau_diocesain">Bureau diocesan</option><option value="doyenne">Doyenne</option><option value="paroisse">Paroisse</option></select></div>
                            @if($proprietaire_type === 'doyenne')<div class="col-md-4 mb-3"><label class="form-label">Doyenne *</label><select class="form-control" wire:model.live="doyenne_id"><option value="">Selectionner</option>@foreach($doyennes as $doyenne)<option value="{{ $doyenne->id }}">{{ $doyenne->designation }}</option>@endforeach</select>@error('doyenne_id') <span class="text-danger">{{ $message }}</span> @enderror</div>@endif
                            @if($proprietaire_type === 'paroisse')<div class="col-md-4 mb-3"><label class="form-label">Paroisse *</label><select class="form-control" wire:model.live="paroisse_id"><option value="">Selectionner</option>@foreach($paroisses as $paroisse)<option value="{{ $paroisse->id }}">{{ $paroisse->designation }}</option>@endforeach</select>@error('paroisse_id') <span class="text-danger">{{ $message }}</span> @enderror</div>@endif
                            <div class="col-md-4 mb-3"><label class="form-label">Localisation</label><input type="text" class="form-control" wire:model.live="localisation"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3"><label class="form-label">Date acquisition</label><input type="date" class="form-control" wire:model.live="date_acquisition"></div>
                            <div class="col-md-6 mb-3"><label class="form-label">Prix total automatique</label><input type="text" class="form-control" value="{{ number_format(((float) $quantite) * ((float) $prix_unitaire), 2, ',', ' ') }}" readonly></div>
                        </div>
                        <div class="mb-3"><label class="form-label">Description</label><textarea class="form-control" rows="3" wire:model.live="description"></textarea></div>
                    </div>
                    <div class="modal-footer"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button><button type="submit" class="btn btn-primary">{{ $editMode ? 'Modifier' : 'Enregistrer' }}</button></div>
                </form>
            </div></div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('livewire:initialized', () => {
        Livewire.on('openBienModal', () => new bootstrap.Modal(document.getElementById('bienModal')).show());
        Livewire.on('bienSaved', () => bootstrap.Modal.getInstance(document.getElementById('bienModal'))?.hide());
    });
</script>
@endpush
