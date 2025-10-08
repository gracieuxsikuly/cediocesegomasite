<div>
   <!-- Page Header Start -->
	<div class="page-header">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-12">
					<!-- Page Header Box Start -->
					<div class="page-header-box">
						<h1 class="text-anime-style-2" data-cursor="-opaque">NOS ACTIVITES</h1>
						<nav class="wow fadeInUp">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{ route('acceuil') }}">ACCEUIL</a></li>
								<li class="breadcrumb-item active" aria-current="page">NOS ACTIVITES</li>
							</ol>
						</nav>
					</div>
					<!-- Page Header Box End -->
				</div>
			</div>
		</div>
	</div>
	<!-- Page Header End -->

    <!-- Page Sermons Start -->
    <div class="page-sermons">
        <div class="container">
            <div class="row">
                 @forelse ($activities as $activity)
                     <div class="col-lg-4 col-md-6">
                    <!-- Sermons Item Start -->
                    <div class="sermons-item wow fadeInUp">
                        <!-- Sermons Image Start -->
                        <div class="sermons-image">
                            <figure>
                                <a href="#" class="image-anime" data-cursor-text="View">
                                    <img src="{{ asset('storage/' . $activity->image1) }}" alt="">
                                </a>
                            </figure>
                            <!-- Sermons Meta Start -->
                            <div class="sermons-meta">
                                @php
                                    \Carbon\Carbon::setLocale('fr');
                                    $date = \Carbon\Carbon::parse($activity->dateactivite);
                                @endphp

                                <h3>{{ $date->format('d') }}</h3>
                                <p>{{ $date->translatedFormat('F') }}</p>
                            </div>
                            <!-- Sermons Meta End -->

                            <div class="sermons-audio-icon">
                                <a href="#"><img src="{{asset('asset_frontend/images/audio-play-icon.svg')}}" alt=""></a>
                            </div>
                        </div>
                        <!-- Sermons Image End -->

                        <!-- Sermons Body Start -->
                        <div class="sermons-body">
                            <!-- Sermons Title Start -->
                            <div class="sermons-title">
                                <h2>{{ Str::limit($activity->titre, 30) }}</h2>
                            </div>
                            <!-- Sermons Title End -->

                            <!-- Sermons List Start -->
                            <div class="sermons-list">
                                <ul>
                                    <li><i class="fa-solid fa-user"></i>Lieu : <span>{{ $activity->emplacement }}</span></li>
                                    <li><i class="fa-solid fa-tag"></i>Categories : <span>{{ $activity->typeactivite }}</span></li>
                                    <li><i class="fa-regular fa-calendar-days"></i>Date & Heure : <span>{{ $date->translatedFormat('F') }} {{ $date->format('d') }} - on {{ $activity->start_time }} - {{ $activity->end_time }}</span></li>
                                </ul>
                            </div>
                            {{-- buton voir --}}
                            <div class="sermons-footer">
                                <a href="{{ route('detailactivite', ['slug'=>$activity->slug]) }}" class="btn-default">Voir Plus</a>
                            </div>
                            <!-- Sermons List End -->
                        </div>
                        <!-- Sermons Body End -->
                    </div>
                    <!-- Sermons Item End -->
                </div>
                @empty
                    <p>Aucune activité pour le moment</p>
                @endforelse
                <div class="col-lg-12">
                    <!-- Page Pagination Start -->
                     @if(method_exists($activities, 'links'))
                    <div class="page-pagination wow fadeInUp" data-wow-delay="0.5s">
                        <ul class="pagination">
                           {{-- pagination livewire avec link --}}
                            {{ $activities->links('livewire::bootstrap') }}
                        </ul>
                    </div>
                      @endif
                    <!-- Page Pagination End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Page Sermons End -->
</div>
