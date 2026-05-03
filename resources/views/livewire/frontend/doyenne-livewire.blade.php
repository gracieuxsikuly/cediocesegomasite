<div>
    <div class="page-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="page-header-box">
                        <h1 class="text-anime-style-2" data-cursor="-opaque">Nos Doyennes</h1>
                        <nav class="wow fadeInUp">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('acceuil') }}">Accueil</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Nos Doyennes</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-blog">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8">
                    <div class="section-title text-center">
                        <h3 class="wow fadeInUp">Organisation diocesaine</h3>
                        <h2 class="text-anime-style-2" data-cursor="-opaque">Chaque doyenne rassemble <span>ses paroisses</span></h2>
                        <p class="wow fadeInUp" data-wow-delay="0.25s">
                            Retrouvez les doyennes de la Croisade Eucharistique du Diocese de Goma, leurs responsables,
                            leurs localisations et les paroisses rattachees a chaque doyenne.
                        </p>
                    </div>
                </div>
                <div class="col-lg-7">
                    <input type="text" class="form-control" placeholder="Rechercher une doyenne, une paroisse ou un responsable..."
                        wire:model.live.debounce.400ms="searchTerm">
                </div>
            </div>

            <div class="row">
                @forelse ($doyennes as $doyenne)
                    <div class="col-lg-6 col-md-12">
                        <div class="blog-item wow fadeInUp h-100">
                            <div class="post-featured-image" data-cursor-text="Voir">
                                <figure>
                                    <img src="{{ asset('asset_frontend/images/about-us-img-3.jpg') }}" alt="{{ $doyenne->designation }}">
                                </figure>
                            </div>
                            <div class="post-item-body">
                                <h2>{{ $doyenne->designation }}</h2>
                                <p class="mb-2"><i class="fa-solid fa-location-dot"></i> {{ $doyenne->localisation }}</p>
                                <p class="mb-2"><i class="fa-solid fa-user"></i> {{ ucfirst($doyenne->fonction) }}: {{ $doyenne->responsable }}</p>
                                @if($doyenne->contact)
                                    <p class="mb-2"><i class="fa-solid fa-phone"></i> {{ $doyenne->contact }}</p>
                                @endif
                                <p class="mb-3"><i class="fa-solid fa-people-group"></i> {{ number_format((int) $doyenne->nombreaproximatifmembre, 0, ',', ' ') }} membres approximatifs</p>

                                <h3 class="h5 mb-3">Paroisses rattachees ({{ $doyenne->paroisses_count }})</h3>
                                <div class="row g-2">
                                    @forelse($doyenne->paroisses as $paroisse)
                                        <div class="col-md-6">
                                            <div class="p-3 bg-light rounded h-100">
                                                <strong>{{ $paroisse->designation }}</strong>
                                                <br><small class="text-muted">{{ $paroisse->localisation }}</small>
                                                @if($paroisse->responsable)
                                                    <br><small>{{ ucfirst($paroisse->fonction) }}: {{ $paroisse->responsable }}</small>
                                                @endif
                                            </div>
                                        </div>
                                    @empty
                                        <div class="col-12">
                                            <p class="text-muted mb-0">Aucune paroisse rattachee pour le moment.</p>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <p class="text-center text-muted">Aucune doyenne disponible pour le moment.</p>
                    </div>
                @endforelse

                <div class="col-lg-12">
                    @if(method_exists($doyennes, 'links'))
                    <div class="page-pagination wow fadeInUp" data-wow-delay="0.5s">
                        {{ $doyennes->links('livewire::bootstrap') }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
