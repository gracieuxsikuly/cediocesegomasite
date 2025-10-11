<div>
   <!-- Hero Section Start -->
	<div class="hero hero-slider">
        <div class="hero-slider-layout">
            <div class="swiper">
                <div class="swiper-wrapper">
                    <!-- Hero Slide Start -->
                    <div class="swiper-slide">
                        <div class="hero-slide">
                            <!-- Slider Image Start -->
                            <div class="hero-slider-image">
                                <img src="{{asset('asset_frontend/images/hero-bg-3.jpg')}}" alt="">
                            </div>
                            <!-- Slider Image End -->
    
                            <!-- Slider Content Start -->
                            <div class="container">
                                <div class="row align-items-center">
                                    <div class="col-lg-12">
                                        <!-- Hero Content Start -->
                                        <div class="hero-content">
                                            <!-- Section Title Start -->
                                            <div class="section-title">
                                                <h3 class="wow fadeInUp">L'adoration</h3>
                                                <h1 class="text-anime-style-2" data-cursor="-opaque">Notre device</h1>
                                                <p class="wow fadeInUp" data-wow-delay="0.25s">Prie, communie, sacrifie-toi, sois apotre</p>
                                            </div>
                                            <!-- Section Title End -->
                    
                                            <!-- Hero Content Body Start -->
                                            <div class="hero-content-body wow fadeInUp" data-wow-delay="0.5s">
                                                <a href="{{ route('ressources') }}" class="btn-default"><span>Ressources</span></a>
                                                <a href="{{ route('contact') }}" class="btn-default btn-highlighted"><span>Rejoindre la croisade eucharistique</span></a>
                                            </div>
                                            <!-- Hero Content Body End -->
                                        </div>
                                        <!-- Hero Content End -->
                                    </div>
                                </div>
                            </div>
                            <div class="down-arrow">
                                <a href="#home-about"><i class="fa-solid fa-arrow-down-long"></i></a>
                            </div>
                            <!-- Slider Content End -->
                        </div>
                    </div>
                    <!-- Hero Slide End -->

                    <!-- Hero Slide Start -->
                    <div class="swiper-slide">
                        <div class="hero-slide">
                            <!-- Slider Image Start -->
                            <div class="hero-slider-image">
                                <img src="{{asset('asset_frontend/images/hero-bg-4.jpg')}}" alt="">
                            </div>
                            <!-- Slider Image End -->
    
                            <!-- Slider Content Start -->
                            <div class="container">
                                <div class="row align-items-center">
                                    <div class="col-lg-12">
                                        <!-- Hero Content Start -->
                                        <div class="hero-content">
                                            <!-- Section Title Start -->
                                            <div class="section-title">
                                                <h3 class="wow fadeInUp">Avec le Christ!!!</h3>
                                                <h1 class="text-anime-style-2" data-cursor="-opaque">Rien n'est impossible</h1>
                                                <p class="wow fadeInUp" data-wow-delay="0.25s">Une journée sans messe est une journée sans soleil</p>
                                            </div>
                                            <!-- Section Title End -->
                    
                                            <!-- Hero Content Body Start -->
                                            <div class="hero-content-body wow fadeInUp" data-wow-delay="0.5s">
                                                <a href="{{ route('ressources') }}" class="btn-default"><span>Ressources</span></a>
                                                <a href="{{ route('contact') }}" class="btn-default btn-highlighted"><span>Rejoindre la croisade eucharistique</span></a>
                                            </div>
                                            <!-- Hero Content Body End -->
                                        </div>
                                        <!-- Hero Content End -->
                                    </div>
                                </div>
                            </div>
                            <div class="down-arrow">
                                <a href="#home-about"><i class="fa-solid fa-arrow-down-long"></i></a>
                            </div>
                            <!-- Slider Content End -->
                        </div>
                    </div>
                    <!-- Hero Slide End -->
                     
                </div>
                <div class="hero-pagination"></div>
            </div>
        </div>		
	</div>
	<!-- Hero Section End -->

    <!-- Our Scrolling Ticker Section Start -->
    <div class="our-scrolling-ticker">
        <!-- Scrolling Ticker Start -->
        <div class="scrolling-ticker-box">
            <div class="scrolling-content">
                <span></span>
                <span></span>
                  <span><img src="{{asset('asset_frontend/images/icon-sparkles.svg')}}" alt="">Niya ya mwezi :{{$this->mois}}</span>
                <span><img src="{{asset('asset_frontend/images/icon-sparkles.svg')}}" alt="">{{$this->designation}}</span>
                <span></span>
            </div>

            <div class="scrolling-content">
                <span></span>
                  <span></span>
                  <span><img src="{{asset('asset_frontend/images/icon-sparkles.svg')}}" alt="">Niya ya mwezi :{{$this->mois}}</span>
                <span><img src="{{asset('asset_frontend/images/icon-sparkles.svg')}}" alt="">{{$this->designation}}</span>
                <span></span>
            </div>
        </div>
    </div>
	<!-- Scrolling Ticker Section End -->

    <!-- About Us Section Start -->
	<div class="about-us" id="home-about">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <!-- About Image Start -->
                    <div class="about-image">
                        <div class="about-img-1">
                            <figure class="image-anime reveal">
                                <img src="{{asset('asset_frontend/images/about-us-img-3.jpg')}}" alt="">
                            </figure>
                        </div>

                        <div class="about-img-2">
                            <figure class="image-anime reveal">
                                <img src="{{asset('asset_frontend/images/about.jpg')}}" alt="">
                            </figure>
                        </div>
                    </div>
                    <!-- About Image End -->
                </div>

                <div class="col-lg-6">
                    <!-- About Content Start -->
                    <div class="about-content">
                        <!-- Section Title Start -->
                        <div class="section-title">
                            <h3 class="wow fadeInUp">A propos de nous</h3>
                            <h2 class="text-anime-style-2" data-cursor="-opaque">
                                Prie, communie, sacrifie-toi,<span>sois apotre</span></h2>
                            <p class="wow fadeInUp" data-wow-delay="0.25s" style="text-align: justify;">La Croisade Eucharistique est un mouvement d’action catholique dont la spiritualité
est centrée sur l’Eucharistie. Mouvement pontifical à vocation apostolique, elle vise à
contribuer à la vie de l’Église par la formation d’une véritable École primaire de
l’action catholique.</p>
                            <p class="wow fadeInUp" data-wow-delay="0.5s" style="text-align: justify;">
                                Fidèle à sa spiritualité et à son charisme, la Croisade Eucharistique trouve son
activité principale dans <b>la célébration de la Messe</b> et <b>l’adoration du Saint-Sacrement</b>, considérées comme le cœur de sa mission. Cette culture eucharistique
confère au mouvement un caractère à la fois contemplatif et sacerdotal, tout en
demeurant actif et ludique. Elle a 4 sections : 

                            </p>
                        </div>
                        <!-- Section Title End -->

                        <!-- About Content List Start -->
                        <div class="about-content-body">
                            <!-- About List Item Start -->
                            <div class="about-list-item wow fadeInUp">
                                <div class="icon-box">
                                    <img src="{{asset('asset_frontend/images/icon-about-list-1.svg')}}" alt="">
                                </div>
                                {{-- les enfants (6-12 ans), les adolescents (13-17 ans), les jeunes (18-35 ans) et les adultes (36 ans et plus). --}}
                                <div class="about-list-item-content">
                                    <h3>A.	La Section des Croisillons et Croisillonne (4-10 ans)</h3>
                                </div>
                            </div>
                            <!-- About List Item End -->

                            <!-- About List Item Start -->
                            <div class="about-list-item wow fadeInUp" data-wow-delay="0.25s">
                                <div class="icon-box">
                                    <img src="{{asset('asset_frontend/images/icon-about-list-2.svg')}}" alt="">
                                </div>
                                <div class="about-list-item-content">
                                    <h3>B.	La section des Feux Nouveaux (11-14 ans)</h3>
                                </div>
                            </div>
                            <!-- About List Item End -->

                            <!-- About List Item Start -->
                            <div class="about-list-item wow fadeInUp" data-wow-delay="0.5s">
                                <div class="icon-box">
                                    <img src="{{asset('asset_frontend/images/icon-about-list-3.svg')}}" alt="">
                                </div>
                                <div class="about-list-item-content">
                                    <h3>C.	La section des Cadets (tes) (15-25 ans)</h3>
                                </div>
                            </div>
                            <!-- About List Item End -->

                            <!-- About List Item Start -->
                            <div class="about-list-item wow fadeInUp" data-wow-delay="0.75s">
                                <div class="icon-box">
                                    <img src="{{asset('asset_frontend/images/icon-about-list-4.svg')}}" alt="">
                                </div>
                                <div class="about-list-item-content">
                                    <h3>D.	La section apostolique (Equap) (26 ans et plus)</h3>
                                </div>
                            </div>
                            <!-- About List Item End -->
                        </div>
                        <!-- About Content List End -->


                        <!-- About Us Footer Start -->
                        <div class="about-us-footer wow fadeInUp" data-wow-delay="1s">
                            <a href="{{ route('aboutus') }}" class="btn-default">En savoir plus</a>
                        </div>
                        <!-- About Us Footer End -->
                    </div>
                    <!-- About Content End -->
                </div>
            </div>
        </div>
    </div>
    <!-- About Us Section End -->

    
     <!-- Our Mission Section Start -->
    <div class="join-worship">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="mission-content">
                        <!-- Section Title Start -->
                        <div class="section-title">
                            <h3 class="wow fadeInUp">SILAHA ZETU</h3>
                            <h2 class="text-anime-style-2" data-cursor="-opaque">Sala, sadaka <span>Komunio, na Kitume</span></h2>
                        </div>
                        <!-- Section Title End -->

                        <!-- Mission Content Body Start -->
                        <div class="mission-content-body">
                            <h3 class="wow fadeInUp" data-wow-delay="0.25s">UKOMO WETU</h3>
                            <p class="wow fadeInUp" data-wow-delay="0.5s"> Ukomo wetu ni kulinganisha maisha yetu
na ya yesu kristu “nime ishi ila si mimi tena ni kristu anaye
ishi ndani mwangu” sherti kuangaliya njiya saba (7 piste) na
namna saba (7 moyens) kwa kufikiya ukomo wa croisade
eucharistique</p>
                        </div>
                        <!-- Mission Content Body End -->
                        <div class="mission-content-body">
                            <h3 class="wow fadeInUp" data-wow-delay="0.25s">LES 7 PISTE D’UN CROISE / NJIYA 7 ZA MUCROISE</h3>
                            <p class="wow fadeInUp" data-wow-delay="0.5s"> 
                                1. Kukombowa roho zinazo gandamizwa na shetani kuzileta kwake yesu.<br>
                                2. Kufata umoja wa wandugu wa kristu wote piya makanisa zote.<br>
                                3. Kuishi maisha ya uusiano na yesu kristu katinda vikundi vya sala .<br>
                                4. Kwa kipekee kuishi maisha ya sala na ushirika kwa kuchangiya neno la yesu na wengine wa kristu.<br>
                                5. Kusikiya uito wamatendo ya roho mtakatifu ndani ya maisha yako kila siku na ndani ya tukiyo ya histoire yako.<br>
                                6. Kuishi kama vile mitume wa sasa.<br>
                                7. Kuishi mwenyi heri kwakuendelesha maisha ya kristu.<br>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <!-- Mission Image Start -->
                    <div class="mission-image">
                        <!-- Mission Image Start -->
                        <div class="mission-img">
                            <figure class="image-anime reveal">
                                <img src="{{asset('asset_frontend/images/hero-bg-5.jpg')}}" alt="">
                            </figure>
                        </div>
                        <!-- Mission Image End -->

                        <!-- Mission Life Circle Start -->
                        <div class="mission-life-circle">
                            <img src="{{asset('asset_frontend/images/CElogs.png')}}" alt="">
                        </div>
                        <!-- Mission Life Circle End -->
                    </div>
                    <!-- Mission Image End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Our Mission Section End -->

    <!-- Our Counter Section Start -->
    <div class="our-counter">
        <div class="container">
            <div class="row counter-box">
                <div class="col-lg-3 col-md-6">
                    <!-- Counter Item Start -->
                    <div class="counter-item">
                        <!-- Counter Title Start -->
                        <div class="counter-title">
                            <h2><span class="counter">{{$count_croisions}}</span>+</h2>
                        </div>
                        <!-- Counter Title End -->                     

                        <!-- Counter Content Start -->
                        <div class="counter-content">
                            <h3>Croisillons</h3>
                            <p>sur {{$total_ce}} croises du Diocese de Goma</p>
                        </div>
                        <!-- Counter Content End -->
                    </div>
                    <!-- Counter Item End -->
                </div>

                <div class="col-lg-3 col-md-6">
                    <!-- Counter Item Start -->
                    <div class="counter-item">
                        <!-- Counter Title Start -->
                        <div class="counter-title">
                            <h2><span class="counter">{{$count_feunouveau}}</span>+</h2>
                        </div>
                        <!-- Counter Title End -->                     

                        <!-- Counter Content Start -->
                        <div class="counter-content">                            
                            <h3>Feux nouveaux</h3>
                            <p>sur {{$total_ce}} croises du Diocese de Goma</p>
                        </div>
                        <!-- Counter Content End -->
                    </div>
                    <!-- Counter Item End -->
                </div>

                <div class="col-lg-3 col-md-6">
                    <!-- Counter Item Start -->
                    <div class="counter-item">
                        <!-- Counter Title Start -->
                        <div class="counter-title">
                            <h2><span class="counter">{{$count_cadets}}</span>+</h2>
                        </div>
                        <!-- Counter Title End -->                     

                        <!-- Counter Content Start -->
                        <div class="counter-content">
                            <h3>Cadet(te)s</h3>
                           <p>sur {{$total_ce}} croises du Diocese de Goma</p>
                        </div>
                        <!-- Counter Content End -->
                    </div>
                    <!-- Counter Item End -->
                </div>

                <div class="col-lg-3 col-md-6">
                    <!-- Counter Item Start -->
                    <div class="counter-item">
                        <!-- Counter Title Start -->
                        <div class="counter-title">
                            <h2><span class="counter">{{$count_equaps}}</span>+</h2>
                        </div>
                        <!-- Counter Title End -->                     

                        <!-- Counter Content Start -->
                        <div class="counter-content">
                            <h3>Equaps</h3>
                           <p>sur {{$total_ce}} croises du Diocese de Goma</p>
                        </div>
                        <!-- Counter Content End -->
                    </div>
                    <!-- Counter Item End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Our Counter Section End -->

   

    <!-- Our Services Section Start -->
    <div class="our-services">
        <div class="container">
            <div class="row section-row">
                <!-- Section Title Start -->
                <div class="section-title">
                    {{-- <h3 class="wow fadeInUp">LES ENGAGEMENTS(MAAGANO)</h3> --}}
                    <h2 class="text-anime-style-2" data-cursor="-opaque">LES ENGAGEMENTS(MAAGANO)<span></span></h2>
                </div>
                <!-- Section Title End -->
            </div>

            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <!-- Service Item Start -->
                    <div class="service-item wow fadeInUp">
                        <!-- Icon Box Start -->
                        <div class="icon-box">
                            <img src="{{asset('asset_frontend/images/icon-service-1.svg')}}" alt="">
                        </div>
                        <!-- Icon Box End -->

                        <!-- Service Body Start -->
                        <div class="service-body">
                            <p style="text-align: justify;">
                        Ibada ya ahadi ya kupokelewa kama mwanamemba mpya wa C.E inaanza na wimbo wa  <b>( veni creator)</b> na kumalizika na <b>( hymne : je suis croise)</b>. Inafanyika ndani ya ibada ya missa takatifu, kiisha homelia ya padri, kwani  
« mbali ya kanisa hakuna wokovu wowote »  ( mtakatifu Augistino ) 
Ibada hii inaelekea wanamemba wapya ( bila tafauti ya mikasama) ambamo wame kwisha kuonesha ushunjaa wao na kuhuzuria kama desturi 
mafundisho ya kuelekea kawaida ya chama, ikiwezekana, muda ya myezi sita.
 Ndiyo kusema Ibada hii ya weza ku fanyika tu mara mbili kwa mwaka katika parokia, secteur, ao sous-secteur fulani fulani. 

                            </p>
                        </div>
                        <!-- Service Body End -->

                        <!-- Service Footer Start -->
                        <div class="service-footer">
                            <div class="service-content">
                                <h3>Aspirant croisé(kukopelewa upya)</h3>
                            </div>
                            <div class="service-btn">
                                <a href="#" class="readmore-btn"><img src="{{asset('asset_frontend/images/arrow-white.svg')}}" alt=""></a>
                            </div>
                        </div>
                        <!-- Service Footer End -->
                    </div>
                    <!-- Service Item End -->
                </div>

                <div class="col-lg-3 col-md-6">
                    <!-- Service Item Start -->
                    <div class="service-item wow fadeInUp" data-wow-delay="0.25s">
                        <!-- Icon Box Start -->
                        <div class="icon-box">
                            <img src="{{asset('asset_frontend/images/icon-service-2.svg')}}" alt="">
                        </div>
                        <!-- Icon Box End -->

                        <!-- Service Body Start -->
                        <div class="service-body">
                            <p style="text-align: justify;">Ibada ya ahadi ya kupewa daraja la umiliki inaanza na wimbo wa
                                <b>kuomba nguvu ya Roho Mtakatifu</b> na kumalizika na hymne <b>“Debout fils de l’Eglise”</b>
Ibada hii ni matengeneo ambayo hupatia mpenzi wa Ukaristia umiliki wa kupewa madaraka ya uongozi ndani ya mkasama moja. Shabaa kubwa ni kwamba waongozi hawa wafikie hali ya kujenga ushirikiano ao uhusiano bora na utengeneo wa kweli ndani ya chama cha Croisade Eucharistique ;  hasa kusaidia kufasiriya wanamemba wote mambo yanayo unda samani yetu kama, kwa Eklezia, moja na vyama vilivyo shamba la miche kwa mwito mbali mbali.
 
	Ibada hii, inatolewa vile ndani ya ibada ya Misa Takatifu kiisha Homelia ya Padri 
</p>
                        </div>
                        <!-- Service Body End -->

                        <!-- Service Footer Start -->
                        <div class="service-footer">
                            <div class="service-content">
                                <h3>Feu Aspirant croisé(daraja la umiliki)</h3>
                            </div>
                            <div class="service-btn">
                                <a href="#" class="readmore-btn"><img src="{{asset('asset_frontend/images/arrow-white.svg')}}" alt=""></a>
                            </div>
                        </div>
                        <!-- Service Footer End -->
                    </div>
                    <!-- Service Item End -->
                </div>

                <div class="col-lg-3 col-md-6">
                    <!-- Service Item Start -->
                    <div class="service-item wow fadeInUp" data-wow-delay="0.5s">
                        <!-- Icon Box Start -->
                        <div class="icon-box">
                            <img src="{{asset('asset_frontend/images/icon-service-3.svg')}}" alt="">
                        </div>
                        <!-- Icon Box End -->

                        <!-- Service Body Start -->
                        <div class="service-body">
                            <p style="text-align: justify;">Ibada hii inaanza na wimbo wa <b>« zaburi 115 »</b> na kumalizika na <b>« hymne de la promesse »</b>
Inafanyika ndani ya misa takatifu, Kiisha Komunio na yalazimisha Sacramenta ya Ukaristia takatifu.
 Ahadi ya ibada hii inatambulisha vema mpenzi wa Ukaristia katika uito wake wa pekee,
ambamo:
- Anatolea maisha yake yote kwa kuiunganisha na sadaka ya Yesu Kristu kwa ajili ya wokovu wa
dunia nzima;
- Anahaidia uaminifu ndani ya Chama cha Wapenzi wa Ukaridtia na kushika mapashwa yake:
Sala, Sadaka, Komunio na Kitume.
- Anajikusudia kujitolea bila kuchoka kwa ajili ya Wapenzi wote;
- Anajikusuida pia kupenda Misa, kufwata Misa na kuishi Misa; kuabudu Ukaristia takatifu,
kupenda na kuheshimu Mama Bikira Maria, Malkia wa Croisade Eucharistia.
</p>
                        </div>
                        <!-- Service Body End -->

                        <!-- Service Footer Start -->
                        <div class="service-footer">
                            <div class="service-content">
                                <h3>Apostolat croisé(Ahadi Ya Kuagania Uaminifu Kwa Moyo Mtakatifu Wa Yesu Na Moyo Safi Wa Bikira Maria Ndani Ya Chama)</h3>
                            </div>
                            <div class="service-btn">
                                <a href="#" class="readmore-btn"><img src="{{asset('asset_frontend/images/arrow-white.svg')}}" alt=""></a>
                            </div>
                        </div>
                        <!-- Service Footer End -->
                    </div>
                    <!-- Service Item End -->
                </div>

                <div class="col-lg-3 col-md-6">
                    <!-- Service Item Start -->
                    <div class="service-item wow fadeInUp" data-wow-delay="0.75s">
                        <!-- Icon Box Start -->
                        <div class="icon-box">
                            <img src="{{asset('asset_frontend/images/icon-service-4.svg')}}" alt="">
                        </div>
                        <!-- Icon Box End -->

                        <!-- Service Body Start -->
                        <div class="service-body">
                            <p style="text-align: justify;"> Ibada hii inaanza na wimbo wa <b>« zaburi 115 »</b> na kumalizika na <b>« hymne de la promesse »</b>
Inafanyika ndani ya misa takatifu, Kiisha Komunio na yalazimisha Sacramenta ya Ukaristia takatifu.
 Ahadi ya ibada hii inatambulisha vema mpenzi wa Ukaristia katika uito wake wa pekee,
ambamo:
- Anatolea maisha yake yote kwa kuiunganisha na sadaka ya Yesu Kristu kwa ajili ya wokovu wa
dunia nzima;
- Anahaidia uaminifu ndani ya Chama cha Wapenzi wa Ukaridtia na kushika mapashwa yake:
Sala, Sadaka, Komunio na Kitume.
- Anajikusudia kujitolea bila kuchoka kwa ajili ya Wapenzi wote;
- Anajikusuida pia kupenda Misa, kufwata Misa na kuishi Misa; kuabudu Ukaristia takatifu,
kupenda na kuheshimu Mama Bikira Maria, Malkia wa Croisade Eucharistia.</p>
                        </div>
                        <!-- Service Body End -->

                        <!-- Service Footer Start -->
                        <div class="service-footer">
                            <div class="service-content">
                                <h3>Feu Apostolat, Chevalier du Christ et Vrai soldat du Christ</h3>
                            </div>
                            <div class="service-btn">
                                <a href="#" class="readmore-btn"><img src="{{asset('asset_frontend/images/arrow-white.svg')}}" alt=""></a>
                            </div>
                        </div>
                        <!-- Service Footer End -->
                    </div>
                    <!-- Service Item End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Our Services Section End -->

    <!-- Service Ticker Start -->
	<div class="service-ticker">
		<div class="scrolling-ticker">
            <div class="scrolling-ticker-box">
                <div class="scrolling-content">
                    <span><img src="{{asset('asset_frontend/images/icon-asterisk.svg')}}" alt="">L'adoration</span>					
                    <span><img src="{{asset('asset_frontend/images/icon-asterisk.svg')}}" alt="">Notre devise</span>				
                    <span><img src="{{asset('asset_frontend/images/icon-asterisk.svg')}}" alt="">Le foulard</span>				
                    <span><img src="{{asset('asset_frontend/images/icon-asterisk.svg')}}" alt="">Notre drapeau</span>				
                    <span><img src="{{asset('asset_frontend/images/icon-asterisk.svg')}}" alt="">Avec le Christ</span>				
                </div>

                <div class="scrolling-content">
                    <span><img src="{{asset('asset_frontend/images/icon-asterisk.svg')}}" alt="">Rien n'est impossible</span>					
                    <span><img src="{{asset('asset_frontend/images/icon-asterisk.svg')}}" alt="">Dieu le veux</span>				
                    <span><img src="{{asset('asset_frontend/images/icon-asterisk.svg')}}" alt="">Toujours plus</span>				
                    <span><img src="{{asset('asset_frontend/images/icon-asterisk.svg')}}" alt="">Toujours mieux</span>				
                </div>
            </div>
        </div>
	</div>
	<!-- Service Ticker End -->

    <!-- Our Ministries Section Start -->
    <div class="our-ministries">
         <div class="container">
            <div class="row section-row">
                <!-- Section Title Start -->
                <div class="section-title">
                    <h3 class="wow fadeInUp"> Activités</h3>
                    <h2 class="text-anime-style-2" data-cursor="-opaque">Nos Recentes<span> Activites</span></h2>
                </div>
                <!-- Section Title End -->
            </div>

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
               
            </div>
        </div>
    </div>
    <!-- Our Ministries Section End -->

  

    <!-- Verse Church Section Start -->
    <div class="verse-church">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <!-- Verse Church Content Start -->
                    <div class="verse-church-content">
                        <!-- Section Title Start -->
                        <div class="section-title">
                            <h2 class="text-anime-style-2" data-cursor="-opaque">MAPASHWA YA MU CROISE(Les devoirs du Croisé.)</h2>
                             <h3 class="wow fadeInUp"> KUPENDA MISA, KUFUATA NA KUSIKILIZA MISA <span>KUISHI NA KUFUASA MISA.</span></h3>
                            <p class="wow fadeInUp" data-wow-delay="0.25s" style="text-align: justify; font-size: 12px;">
                                Pour un Croisé, kupenda Misa, kufuata na kusikiliza Misa, kuishi na kufuasa Misa signifie vivre 
                                l’Eucharistie comme le centre de toute sa vie. Aimer la Messe, c’est reconnaître en elle la 
                                présence vivante de Jésus qui se donne par amour ; la suivre et l’écouter, c’est participer 
                                avec tout son cœur, son esprit et son corps, en laissant la Parole et le Sacrifice eucharistique 
                                transformer sa vie. Enfin, vivre et suivre la Messe, c’est prolonger dans le quotidien 
                                ce qu’on célèbre à l’autel : être témoin de l’amour, de la paix et du service, 
                                à l’exemple du Christ. Ainsi, pour le Croisé, la Messe n’est pas seulement un 
                                moment de prière, mais une école de vie et une mission à accomplir chaque jour.
                            </p>
                        </div>
                        <!-- Section Title End -->

                        {{-- <!-- Verse Church Btn Start -->
                        <div class="verse-church-btn wow fadeInUp" data-wow-delay="0.5s">
                            <a href="#" class="btn-default">donate now</a>
                        </div> --}}
                        <!-- Verse Church Btn End -->
                    </div>
                    <!-- Verse Church Content End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Verse Church Section End -->

    <!-- Donate Now Section Start -->
    {{-- <div class="donate-now parallaxie">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-4">
                    <div class="intro-video-box">
                        <!-- Video Play Button Start -->
                        <div class="video-play-button">
                            <a href="https://www.youtube.com/watch?v=Y-x0efG1seA" class="popup-video" data-cursor-text="Play">
                                <i class="fa-solid fa-play"></i>
                            </a>
                        </div>
                        <!-- Video Play Button End -->
                    </div>
                </div>

                <div class="col-lg-6 col-md-8">
                    <!-- Donate Box Start -->
                    <div class="donate-box">
                        <!-- Section Title Start -->
                        <div class="section-title">
                            <h3 class="wow fadeInUp">donate now</h3>
                            <h2 class="text-anime-style-2" data-cursor="-opaque">Support <span>Our Mission</span></h2>
                            <p class="wow fadeInUp" data-wow-delay="0.25s">Your generous support enables to continue its mission of spreading God's love and serving our community.</p>
                        </div>
                        <!-- Section Title End -->

                        <div class="donate-form wow fadeInUp" data-wow-delay="0.5s">
                            <form id="donateForm" action="#" method="POST">
                                <div class="form-group mb-4">
                                    <input type="text" name="text" class="form-control" placeholder="donate now ..." required>
                                </div>

                                <fieldset class="donate-value-box">                                  
                                    <div class="donate-value">
                                        <input type="radio" id="value1" name="value" value="value1" checked>
                                        <label for="value1">$ 100.00</label>
                                      </div>
                                    
                                      <div class="donate-value">
                                        <input type="radio" id="value2" name="value" value="value2">
                                        <label for="value2">$ 200.00</label>
                                      </div>
                                    
                                      <div class="donate-value">
                                        <input type="radio" id="value3" name="value" value="value3">
                                        <label for="value3">$ 300.00</label>
                                      </div>
                                      
                                      <div class="donate-value">
                                          <input type="radio" id="value4" name="value" value="value4">
                                          <label for="value4">$ 400.00</label>
                                      </div>
                                      
                                      <div class="donate-value">
                                          <input type="radio" id="value5" name="value" value="value5">
                                          <label for="value5">$ 500.00</label>
                                      </div>
                                      
                                      <div class="donate-value">
                                          <input type="radio" id="value6" name="value" value="value6">
                                          <label for="value6">$ 600.00</label>
                                      </div>
                                </fieldset>

                                <div class="form-group-btn">
                                    <button type="submit" class="btn-default">donate now</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Donate Box End -->
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Donate Now Section End -->

    <!-- Our Blog Start -->
    <div class="our-blog">
        <div class="container">
            <div class="row section-row">
                <div class="col-lg-12">
                     <!-- Section Title Start -->
                     <div class="section-title">
                        <h3 class="wow fadeInUp">Derniere Ressources(themes, hymne, brochures,etc...)</h3>
                        <h2 class="text-anime-style-2" data-cursor="-opaque">Lire ou telecharger<span> nos Ressources</span></h2>
                    </div>
                    <!-- Section Title End -->
                </div>
            </div>

            <div class="row">
    @forelse ($resources as $resource)
    <div class="col-lg-4 col-md-6">
        <!-- Blog Item Start -->
        <div class="blog-item wow fadeInUp">
            <!-- Post Featured Image Start-->
            <div class="post-featured-image" data-cursor-text="View">
                <figure>
                    <a href="#" class="image-anime" data-bs-toggle="modal" data-bs-target="#resourceModal{{ $resource->id }}">
                        <!-- Toujours afficher post-1.png -->
                        <img src="{{ asset('asset_frontend/images/post-1.png') }}" alt="{{ $resource->titre }}">
                    </a>
                </figure>
            </div>
            <!-- Post Featured Image End -->

            <!-- Post Item Body Start -->
            <div class="post-item-body">
                <h2><a href="#" data-bs-toggle="modal" data-bs-target="#resourceModal{{ $resource->id }}">{{ $resource->titre }}</a></h2>
            </div>
            <!-- Post Item Body End-->

            <!-- Post Item Footer Start-->
            <div class="post-item-footer">
                <!-- Badge pour le type de ressource -->
                <span class="badge 
                    @if($resource->formatressource === 'pdf') bg-danger
                    @elseif($resource->formatressource === 'audio') bg-success
                    @elseif($resource->formatressource === 'video') bg-primary
                    @elseif($resource->formatressource === 'image') bg-info
                    @else bg-secondary
                    @endif
                ">
                    <i class="fas 
                        @if($resource->formatressource === 'pdf') fa-file-pdf
                        @elseif($resource->formatressource === 'audio') fa-file-audio
                        @elseif($resource->formatressource === 'video') fa-file-video
                        @elseif($resource->formatressource === 'image') fa-file-image
                        @else fa-file
                        @endif
                    "></i>
                    {{ strtoupper($resource->formatressource ?? 'file') }}
                </span>
                
                <a href="#" class="read-more-btn" data-bs-toggle="modal" data-bs-target="#resourceModal{{ $resource->id }}">Lire plus</a>
            </div>
            <!-- Post Item Footer End-->
        </div>
        <!-- Blog Item End -->
    </div>

    <!-- Modal pour la ressource -->
    <div class="modal fade" id="resourceModal{{ $resource->id }}" tabindex="-1" aria-labelledby="resourceModalLabel{{ $resource->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="resourceModalLabel{{ $resource->id }}">
                        <i class="fas 
                            @if($resource->formatressource === 'pdf') fa-file-pdf text-danger
                            @elseif($resource->formatressource === 'audio') fa-file-audio text-success
                            @elseif($resource->formatressource === 'video') fa-file-video text-primary
                            @elseif($resource->formatressource === 'image') fa-file-image text-info
                            @else fa-file text-secondary
                            @endif
                        "></i>
                        {{ $resource->title }}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if($resource->file)
                        @php
                            $fileExtension = strtolower(pathinfo($resource->file, PATHINFO_EXTENSION));
                            $fileName = basename($resource->file);
                        @endphp
                        
                        <!-- PDF Viewer -->
                        @if($fileExtension === 'pdf')
                            <div class="pdf-viewer">
                                <embed src="{{ asset('storage/' . $resource->file) }}#toolbar=1&navpanes=1" 
                                       type="application/pdf" 
                                       width="100%" 
                                       height="500px"
                                       class="rounded border">
                            </div>
                        
                        <!-- Audio Player -->
                        @elseif(in_array($fileExtension, ['mp3', 'wav', 'ogg', 'm4a']))
                            <div class="audio-player">
                                <div class="d-flex align-items-center gap-3 bg-light p-3 rounded">
                                    <div class="flex-shrink-0">
                                        <i class="fas fa-music fa-2x text-primary"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <audio controls class="w-100">
                                            <source src="{{ asset('storage/' . $resource->file) }}" 
                                                    type="audio/{{ $fileExtension }}">
                                            Votre navigateur ne supporte pas la lecture audio.
                                        </audio>
                                    </div>
                                </div>
                            </div>
                        
                        <!-- Video Player -->
                        @elseif(in_array($fileExtension, ['mp4', 'webm', 'ogg', 'mov', 'avi']))
                            <div class="video-player text-center">
                                <video controls width="100%" class="rounded" style="max-height: 400px;">
                                    <source src="{{ asset('storage/' . $resource->file) }}" 
                                            type="video/{{ $fileExtension }}">
                                    Votre navigateur ne supporte pas la lecture vidéo.
                                </video>
                            </div>
                        
                        <!-- Image Preview -->
                        @elseif(in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'svg', 'webp']))
                            <div class="text-center">
                                <img src="{{ asset('storage/' . $resource->file) }}" 
                                     alt="{{ $resource->title }}" 
                                     class="img-fluid rounded" 
                                     style="max-height: 500px;">
                            </div>
                        
                        <!-- Other file types -->
                        @else
                            <div class="text-center py-4">
                                <i class="fas fa-file fa-3x text-secondary mb-3"></i>
                                <p class="text-muted">Aperçu non disponible pour ce type de fichier</p>
                                <p class="small text-muted">Fichier: {{ $fileName }}</p>
                            </div>
                        @endif
                        
                        <!-- Download button -->
                        <div class="mt-3 d-flex justify-content-between align-items-center">
                            <small class="text-muted">
                                <i class="fas 
                                    @if($fileExtension === 'pdf') fa-file-pdf text-danger
                                    @elseif(in_array($fileExtension, ['mp4', 'webm', 'ogg', 'mov', 'avi'])) fa-file-video text-primary
                                    @elseif(in_array($fileExtension, ['mp3', 'wav', 'ogg', 'm4a'])) fa-file-audio text-success
                                    @elseif(in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'svg', 'webp'])) fa-file-image text-info
                                    @else fa-file text-secondary
                                    @endif
                                "></i>
                                {{ $fileName }}
                            </small>
                            <a href="{{ asset('storage/' . $resource->file) }}" 
                               download 
                               class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-download"></i> Télécharger
                            </a>
                        </div>
                        
                        {{-- <!-- Description -->
                        @if($resource->description)
                            <div class="mt-3 p-3 bg-light rounded">
                                <h6>Description:</h6>
                                <p class="mb-0">{{ $resource->description }}</p>
                            </div>
                        @endif --}}
                        
                    @else
                        <div class="alert alert-warning text-center">
                            <i class="fas fa-exclamation-triangle"></i> Aucun fichier associé à cette ressource.
                        </div>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    @if($resource->file)
                        <a href="{{ asset('storage/' . $resource->file) }}" 
                           download 
                           class="btn btn-primary">
                            <i class="fas fa-download"></i> Télécharger
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@empty
    <div class="col-12">
        <p class="text-center text-muted">Aucune ressource</p>
    </div>
@endforelse
            </div>
        </div>
    </div>
    <!-- Our Blog End -->
</div>