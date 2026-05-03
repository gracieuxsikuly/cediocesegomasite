<div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <div>
                        <h4 class="mb-sm-0 font-size-18">Tableau de bord</h4>
                        <p class="text-muted mb-0 mt-1">Espace: {{ $roleLabel }}</p>
                    </div>
                    <div class="page-title-right">
                        <span class="badge bg-primary font-size-12">{{ now()->format('d/m/Y') }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            @forelse($cards as $card)
                <div class="col-xl-3 col-md-6">
                    <div class="card mini-stats-wid border-0 shadow-sm">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <p class="text-muted fw-medium mb-2">{{ $card['label'] }}</p>
                                    <h3 class="mb-0">{{ number_format($card['value'], 0, ',', ' ') }}</h3>
                                </div>
                                <div class="avatar-sm rounded-circle bg-{{ $card['color'] }} bg-opacity-10">
                                    <span class="avatar-title rounded-circle bg-{{ $card['color'] }} bg-opacity-10 text-{{ $card['color'] }} font-size-24">
                                        <i class="{{ $card['icon'] }}"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info">Aucun indicateur disponible pour ce role.</div>
                </div>
            @endforelse
        </div>

        <div class="row">
            <div class="col-xl-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Actions rapides</h5>
                        <div class="d-grid gap-2">
                            @forelse($quickLinks as $link)
                                <a href="{{ route($link['route']) }}" class="btn btn-outline-primary text-start">
                                    <i class="{{ $link['icon'] }} me-2"></i>{{ $link['label'] }}
                                </a>
                            @empty
                                <p class="text-muted mb-0">Aucune action rapide disponible.</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <ul class="nav nav-tabs nav-tabs-custom" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#recent-activities" role="tab">Activites recentes</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#recent-emissions" role="tab">Radio Maria</a>
                            </li>
                        </ul>

                        <div class="tab-content pt-4">
                            <div class="tab-pane active" id="recent-activities" role="tabpanel">
                                <div class="table-responsive">
                                    <table class="table table-sm align-middle mb-0">
                                        <thead>
                                            <tr>
                                                <th>Activite</th>
                                                <th>Paroisse</th>
                                                <th>Date</th>
                                                <th>Statut</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($recentActivities as $activity)
                                                <tr>
                                                    <td>{{ Str::limit($activity->titre, 35) }}</td>
                                                    <td>{{ $activity->paroisse->designation ?? 'N/A' }}</td>
                                                    <td>{{ $activity->dateactivite ? \Carbon\Carbon::parse($activity->dateactivite)->format('d/m/Y') : 'N/A' }}</td>
                                                    <td><span class="badge bg-{{ $activity->statut === 'effectif' ? 'success' : 'secondary' }}">{{ $activity->statut ?? 'N/A' }}</span></td>
                                                </tr>
                                            @empty
                                                <tr><td colspan="4" class="text-center text-muted">Aucune activite recente.</td></tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="tab-pane" id="recent-emissions" role="tabpanel">
                                <div class="table-responsive">
                                    <table class="table table-sm align-middle mb-0">
                                        <thead>
                                            <tr>
                                                <th>Emission</th>
                                                <th>Paroisse</th>
                                                <th>Date</th>
                                                <th>Statut</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($recentEmissions as $emission)
                                                <tr>
                                                    <td>{{ Str::limit($emission->titre, 35) }}</td>
                                                    <td>{{ $emission->paroisse->designation ?? 'N/A' }}</td>
                                                    <td>{{ optional($emission->date_emission)->format('d/m/Y') }}</td>
                                                    <td><span class="badge bg-{{ $emission->statut === 'publie' ? 'success' : 'secondary' }}">{{ $emission->statut }}</span></td>
                                                </tr>
                                            @empty
                                                <tr><td colspan="4" class="text-center text-muted">Aucune emission recente.</td></tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
