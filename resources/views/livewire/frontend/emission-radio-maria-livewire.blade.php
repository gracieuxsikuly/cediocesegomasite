<div>
    <div class="page-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="page-header-box">
                        <h1 class="text-anime-style-2" data-cursor="-opaque">Emissions Radio Maria</h1>
                        <nav class="wow fadeInUp">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('acceuil') }}">Accueil</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Emissions Radio Maria</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-sermons">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8">
                    <div class="section-title text-center">
                        <h3 class="wow fadeInUp">Radio Maria</h3>
                        <h2 class="text-anime-style-2" data-cursor="-opaque">Ecoutez les emissions <span>les plus recentes</span></h2>
                        <p class="wow fadeInUp" data-wow-delay="0.25s">
                            Les emissions enregistrees sont classees par date et par paroisse pour faciliter l'ecoute et la recherche.
                        </p>
                    </div>
                </div>
            </div>

            @if($latestEmission)
                @php
                    $latestShareDescription = \Illuminate\Support\Str::limit(strip_tags($latestEmission->description ?? ''), 130);
                    $latestAudioUrl = asset('storage/' . $latestEmission->fichier_audio);
                @endphp
                <div class="row align-items-center mb-5" id="emission-featured-{{ $latestEmission->id }}" wire:key="featured-emission-{{ $latestEmission->id }}-{{ md5($latestEmission->fichier_audio) }}">
                    <div class="col-lg-5">
                        <div class="mission-image">
                            <div class="mission-img">
                                <figure class="image-anime reveal">
                                    <img src="{{ asset('asset_frontend/images/hero-bg-4.jpg') }}" alt="{{ $latestEmission->titre }}">
                                </figure>
                            </div>
                            <div class="mission-life-circle">
                                <img src="{{ asset('asset_frontend/images/logoce.png') }}" alt="Radio Maria">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="mission-content">
                            <div class="section-title">
                                <h3 class="wow fadeInUp">Emission recente</h3>
                                <h2 class="text-anime-style-2" data-cursor="-opaque">{{ $latestEmission->titre }}</h2>
                            </div>
                            <div class="sermons-list mb-4">
                                <ul>
                                    <li><i class="fa-solid fa-church"></i>Paroisse : <span>{{ $latestEmission->paroisse->designation ?? 'N/A' }}</span></li>
                                    <li><i class="fa-solid fa-location-dot"></i>Doyenne : <span>{{ $latestEmission->paroisse->doyenne->designation ?? 'N/A' }}</span></li>
                                    <li><i class="fa-regular fa-calendar-days"></i>Date : <span>{{ optional($latestEmission->date_emission)->format('d/m/Y') }}</span></li>
                                    <li><i class="fa-solid fa-headphones"></i>Ecoutes : <span>{{ number_format($latestEmission->nombre_ecoutes ?? 0, 0, ',', ' ') }}</span></li>
                                </ul>
                            </div>
                            @include('partials.social-share-buttons', [
                                'shareUrl' => route('partage.radio-maria', ['emission' => $latestEmission->id]),
                                'shareTitle' => $latestEmission->titre,
                                'shareDescription' => $latestShareDescription,
                            ])
                            @if($latestEmission->description)
                                <p>{{ $latestEmission->description }}</p>
                            @endif
                            <audio controls class="w-100 mt-3" src="{{ $latestAudioUrl }}" wire:key="featured-audio-{{ $latestEmission->id }}-{{ md5($latestEmission->fichier_audio) }}" wire:play="recordListen({{ $latestEmission->id }})">
                                Votre navigateur ne supporte pas la lecture audio.
                            </audio>
                        </div>
                    </div>
                </div>
            @endif

            @if($topEmissions->isNotEmpty())
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="section-title">
                            <h3 class="wow fadeInUp">Les plus suivies</h3>
                        </div>
                    </div>
                    @foreach($topEmissions as $topEmission)
                        <div class="col-lg-4 col-md-6 mb-3">
                            <div class="blog-item wow fadeInUp h-100">
                                <div class="post-item-body">
                                    <h2>{{ $topEmission->titre }}</h2>
                                    <p><i class="fa-solid fa-headphones"></i> {{ number_format($topEmission->nombre_ecoutes ?? 0, 0, ',', ' ') }} ecoute(s)</p>
                                    <p><i class="fa-regular fa-calendar-days"></i> {{ optional($topEmission->date_emission)->format('d/m/Y') }}</p>
                                </div>
                                <div class="post-item-footer">
                                    <a href="{{ route('emissions.radio-maria.frontend', ['emission' => $topEmission->id]) }}" class="read-more-btn">Ecouter</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            <div class="row mb-4">
                <div class="col-lg-4 col-md-6 mb-3">
                    <input type="text" class="form-control" placeholder="Rechercher une emission..."
                        wire:model.live.debounce.400ms="searchTerm">
                </div>
                <div class="col-lg-4 col-md-6 mb-3">
                    <select class="form-control" wire:model.live="paroisseId">
                        <option value="">Toutes les paroisses</option>
                        @foreach($paroisses as $paroisse)
                            <option value="{{ $paroisse->id }}">
                                {{ $paroisse->designation }} @if($paroisse->doyenne) - {{ $paroisse->doyenne->designation }} @endif
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-4 col-md-12 mb-3">
                    <input type="date" class="form-control" wire:model.live="dateEmission">
                </div>
            </div>

            <div class="row">
                @forelse($emissions as $emission)
                    @php
                        $emissionShareDescription = \Illuminate\Support\Str::limit(strip_tags($emission->description ?? ''), 130);
                        $emissionAudioUrl = asset('storage/' . $emission->fichier_audio);
                    @endphp
                    <div class="col-lg-4 col-md-6" wire:key="emission-column-{{ $emission->id }}-{{ md5($emission->fichier_audio) }}">
                        <div class="sermons-item wow fadeInUp" id="emission-{{ $emission->id }}">
                            <div class="sermons-image">
                                <figure>
                                    <img src="{{ asset('asset_frontend/images/post-1.png') }}" alt="{{ $emission->titre }}">
                                </figure>
                                <div class="sermons-meta">
                                    <h3>{{ optional($emission->date_emission)->format('d') }}</h3>
                                    <p>{{ optional($emission->date_emission)->translatedFormat('M') }}</p>
                                </div>
                                <div class="sermons-audio-icon">
                                    <a href="{{ $emissionAudioUrl }}" target="_blank"><img src="{{ asset('asset_frontend/images/audio-play-icon.svg') }}" alt="Ecouter"></a>
                                </div>
                            </div>
                            <div class="sermons-body">
                                <div class="sermons-title">
                                    <h2>{{ $emission->titre }}</h2>
                                </div>
                                <div class="sermons-list">
                                    <ul>
                                        <li><i class="fa-solid fa-church"></i>Paroisse : <span>{{ $emission->paroisse->designation ?? 'N/A' }}</span></li>
                                        <li><i class="fa-solid fa-tag"></i>Doyenne : <span>{{ $emission->paroisse->doyenne->designation ?? 'N/A' }}</span></li>
                                        <li><i class="fa-regular fa-calendar-days"></i>Date : <span>{{ optional($emission->date_emission)->format('d/m/Y') }}</span></li>
                                        <li><i class="fa-solid fa-headphones"></i>Ecoutes : <span>{{ number_format($emission->nombre_ecoutes ?? 0, 0, ',', ' ') }}</span></li>
                                    </ul>
                                </div>
                                @include('partials.social-share-buttons', [
                                    'shareUrl' => route('partage.radio-maria', ['emission' => $emission->id]),
                                    'shareTitle' => $emission->titre,
                                    'shareDescription' => $emissionShareDescription,
                                ])
                                @if($emission->description)
                                    <p>{{ Str::limit($emission->description, 120) }}</p>
                                @endif
                                <audio controls class="w-100 mt-3" src="{{ $emissionAudioUrl }}" wire:key="emission-audio-{{ $emission->id }}-{{ md5($emission->fichier_audio) }}" wire:play="recordListen({{ $emission->id }})">
                                    Votre navigateur ne supporte pas la lecture audio.
                                </audio>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <p class="text-center text-muted">Aucune emission publiee pour le moment.</p>
                    </div>
                @endforelse

                <div class="col-lg-12">
                    @if(method_exists($emissions, 'links'))
                    <div class="page-pagination wow fadeInUp" data-wow-delay="0.5s">
                        {{ $emissions->links('livewire::bootstrap') }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
