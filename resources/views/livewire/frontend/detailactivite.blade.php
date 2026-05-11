<div>
    @php
        $activityShareUrl = route('detailactivite', ['slug' => $activity->slug]);
        $activityShareDescription = \Illuminate\Support\Str::limit(strip_tags($activity->description ?? ''), 150);
    @endphp
    <div class="page-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="page-header-box">
                        <h1 class="text-anime-style-2" data-cursor="-opaque">{{ $activity->titre }}</h1>
                        <nav class="wow fadeInUp">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('acceuil') }}">Accueil</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('activites') }}">Activites</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Detail</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-sermons">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="sermons-item wow fadeInUp">
                        <div class="sermons-image">
                            <figure>
                                <img src="{{ $activity->image1 ? asset('storage/' . $activity->image1) : asset('asset_frontend/images/post-1.png') }}" alt="{{ $activity->titre }}">
                            </figure>
                            @if($activity->dateactivite)
                                @php
                                    $date = \Carbon\Carbon::parse($activity->dateactivite);
                                @endphp
                                <div class="sermons-meta">
                                    <h3>{{ $date->format('d') }}</h3>
                                    <p>{{ $date->translatedFormat('F') }}</p>
                                </div>
                            @endif
                        </div>
                        <div class="sermons-body">
                            <div class="sermons-title">
                                <h2>{{ $activity->titre }}</h2>
                            </div>
                            @include('partials.social-share-buttons', [
                                'shareUrl' => $activityShareUrl,
                                'shareTitle' => $activity->titre,
                                'shareDescription' => $activityShareDescription,
                            ])
                            @php
                                $actImg2 = $activity->image2 ?? null;
                                $actImg3 = $activity->image3 ?? null;
                                $hasExtraImages = $actImg2 || $actImg3;
                            @endphp
                            <div class="row g-4 align-items-start">
                                <div class="{{ $hasExtraImages ? 'col-lg-7' : 'col-12' }}">
                                    <div class="sermons-list">
                                        <ul>
                                            <li><i class="fa-solid fa-location-dot"></i>Lieu : <span>{{ $activity->emplacement ?? 'N/A' }}</span></li>
                                            <li><i class="fa-solid fa-tag"></i>Categorie : <span>{{ $activity->typeactivite ?? 'N/A' }}</span></li>
                                            <li><i class="fa-solid fa-church"></i>Paroisse : <span>{{ $activity->paroisse->designation ?? 'N/A' }}</span></li>
                                            <li><i class="fa-solid fa-people-group"></i>Doyenne : <span>{{ $activity->doyenne->designation ?? 'N/A' }}</span></li>
                                            @if($activity->dateactivite)
                                                <li><i class="fa-regular fa-calendar-days"></i>Date : <span>{{ \Carbon\Carbon::parse($activity->dateactivite)->format('d/m/Y') }}</span></li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                                @if($hasExtraImages)
                                    <div class="col-lg-5">
                                        <div class="activity-extra-gallery">
                                            @if($actImg2)
                                                <figure class="activity-extra-image mb-3">
                                                    <img src="{{ asset('storage/' . $actImg2) }}" alt="{{ $activity->titre }}">
                                                </figure>
                                            @endif
                                            @if($actImg3)
                                                <figure class="activity-extra-image mb-3">
                                                    <img src="{{ asset('storage/' . $actImg3) }}" alt="{{ $activity->titre }}">
                                                </figure>
                                            @endif
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <p style="text-align: justify;">{{ $activity->description }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="blog-item wow fadeInUp">
                        <div class="post-item-body">
                            <h2>Informations</h2>
                            <p><strong>Statut:</strong> {{ ucfirst($activity->statut ?? 'N/A') }}</p>
                            @if($activity->start_time || $activity->end_time)
                                <p><strong>Heure:</strong> {{ $activity->start_time }} - {{ $activity->end_time }}</p>
                            @endif
                            <p><strong>Paroisse:</strong> {{ $activity->paroisse->designation ?? 'N/A' }}</p>
                            <p><strong>Doyenne:</strong> {{ $activity->doyenne->designation ?? 'N/A' }}</p>
                            @include('partials.social-share-buttons', [
                                'shareUrl' => $activityShareUrl,
                                'shareTitle' => $activity->titre,
                                'shareDescription' => $activityShareDescription,
                            ])
                        </div>
                        <div class="post-item-footer">
                            <a href="{{ route('activites') }}" class="read-more-btn">Retour aux activites</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
