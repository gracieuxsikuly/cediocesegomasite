<div data-simplebar class="h-100">
    @php($user = auth()->user())

    <!--- Sidemenu -->
    <div id="sidebar-menu">
        <!-- Left Menu Start -->
      <ul class="metismenu list-unstyled" id="side-menu">
    <li class="menu-title" key="t-menu">Menu</li>

    <li>
        <a href="{{ route('dashboard') }}" class="waves-effect">
            <i class="bx bx-home-circle"></i>
            <span key="t-dashboards">Dashboards</span>
        </a>
    </li>

    <li>
        <a href="{{ route('profile.backend') }}" class="waves-effect">
            <i class="bx bx-user-circle"></i>
            <span>Mon profil</span>
        </a>
    </li>

    @if($user?->canAccess('users'))
    <li>
        <a href="{{ route('utilisateurs') }}" class="waves-effect">
            <i class="bx bx-user-check"></i>
            <span>Utilisateurs</span>
        </a>
    </li>
    @endif

    @if($user?->canAccess('sliders'))
    <li>
        <a href="{{ route('sliders') }}" class="waves-effect">
            <i class="bx bx-images"></i>
            <span>Sliders accueil</span>
        </a>
    </li>
    @endif

    @if($user?->canAccess('data_management'))
    <li>
        <a href="{{ route('doyenne') }}" class="waves-effect">
            <i class="bx bx-group"></i>
            <span key="t-calendar">Doyennes</span>
        </a>
    </li>

    <li>
        <a href="{{ route('raportdoyenne') }}" class="waves-effect">
            <i class="bx bx-file-blank"></i>
            <span key="t-chat">Rapports doyennes</span>
        </a>
    </li>

    <li>
        <a href="{{ route('paroisse') }}" class="waves-effect">
          <i class="bx bx-church"></i>
            <span key="t-chat">Paroisses</span>
        </a>
    </li>

    <li>
        <a href="{{ route('membres') }}" class="waves-effect">
            <i class="bx bx-user"></i>
            <span key="t-chat">Membres</span>
        </a>
    </li>

    <li>
        <a href="{{ route('niamwezis') }}" class="waves-effect">
            <i class="bx bx-calendar-star"></i>
            <span key="t-chat">Niya ya mwezi</span>
        </a>
    </li>

     <li>
        <a href="{{ route('countmembers') }}" class="waves-effect">
            <i class="bx bx-bar-chart-alt-2"></i>
            <span key="t-chat">Statistiques membres</span>
        </a>
    </li>
    @endif

    @if($user?->canAccess('activities_resources'))
    <li>
        <a href="{{ route('ressource') }}" class="waves-effect">
            <i class="bx bx-book-bookmark"></i>
            <span key="t-chat">Ressources</span>
        </a>
    </li>

    <li>
        <a href="{{ route('photovideo') }}" class="waves-effect">
            <i class="bx bx-photo-album"></i>
            <span key="t-chat">Photos & videos</span>
        </a>
    </li>

    <li>
        <a href="{{ route('activite') }}" class="waves-effect">
            <i class="bx bx-calendar-event"></i>
            <span key="t-chat">Activites</span>
        </a>
    </li>

    <li>
        <a href="{{ route('commentaires') }}" class="waves-effect">
            <i class="bx bx-message"></i>
            <span key="t-chat">Commentaires</span>
        </a>
    </li>
    @endif

    @if($user?->canAccess('radio_maria'))
    <li>
        <a href="{{ route('emissions.radio-maria') }}" class="waves-effect">
            <i class="bx bx-radio"></i>
            <span key="t-chat">Emissions Radio Maria</span>
        </a>
    </li>
    @endif

    @if($user?->canAccess('documents'))
    <li>
        <a href="{{ route('documents.electroniques') }}" class="waves-effect">
            <i class="bx bx-folder"></i>
            <span key="t-chat">Documents</span>
        </a>
    </li>
    @endif

    @if($user?->canAccess('stock'))
    <li>
        <a href="{{ route('biens') }}" class="waves-effect">
            <i class="bx bx-package"></i>
            <span key="t-chat">Biens & stock</span>
        </a>
    </li>
    @endif

    @if($user?->canAccess('finance'))
    <li>
        <a href="{{ route('caisse') }}" class="waves-effect">
            <i class="bx bx-wallet"></i>
            <span key="t-chat">Caisse</span>
        </a>
    </li>
    @endif

    @if($user?->canAccess('messages'))
    <li>
        <a href="{{ route('contacts') }}" class="waves-effect">
            <i class="bx bx-phone"></i>
            <span key="t-chat">Contacts</span>
        </a>
    </li>
    @endif
</ul>
    </div>
    <!-- Sidebar -->
</div>