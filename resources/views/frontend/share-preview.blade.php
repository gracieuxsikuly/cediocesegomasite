@php
    $siteName = 'Croisade Eucharistique - Diocèse de Goma';
    $pageTitle = $title . ' | ' . $siteName;
@endphp
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $pageTitle }}</title>
    <meta name="description" content="{{ $description }}">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ $url }}">
    <meta property="og:locale" content="fr_FR">
    <meta property="og:type" content="{{ $type ?? 'article' }}">
    <meta property="og:site_name" content="{{ $siteName }}">
    <meta property="og:title" content="{{ $pageTitle }}">
    <meta property="og:description" content="{{ $description }}">
    <meta property="og:url" content="{{ $url }}">
    <meta property="og:image" content="{{ $image }}">
    <meta property="og:image:alt" content="{{ $title }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $pageTitle }}">
    <meta name="twitter:description" content="{{ $description }}">
    <meta name="twitter:image" content="{{ $image }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('asset_frontend/images/logoce.png') }}">
    <link href="{{ asset('asset_frontend/css/bootstrap.min.css') }}" rel="stylesheet" media="screen">
    <link href="{{ asset('asset_frontend/css/all.css') }}" rel="stylesheet" media="screen">
    <link href="{{ asset('asset_frontend/css/custom.css') }}" rel="stylesheet" media="screen">
</head>
<body>
    <main class="share-preview-page">
        <div class="share-preview-card">
            <img class="share-preview-logo" src="{{ asset('asset_frontend/images/logoce.png') }}" alt="Croisade Eucharistique">
            <img class="share-preview-image" src="{{ $image }}" alt="{{ $title }}">
            <div class="share-preview-content">
                <p class="share-preview-site">{{ $siteName }}</p>
                <h1>{{ $title }}</h1>
                <p>{{ $description }}</p>

                @include('partials.social-share-buttons', [
                    'shareUrl' => $url,
                    'shareTitle' => $title,
                    'shareDescription' => $description,
                ])

                <div class="share-preview-actions">
                    @if(! empty($fileUrl))
                        <a class="btn-default" href="{{ $fileUrl }}" target="_blank" rel="noopener">Ouvrir la ressource</a>
                    @endif
                    <a class="read-more-btn" href="{{ $backUrl }}">{{ $backLabel }}</a>
                </div>
            </div>
        </div>
    </main>
</body>
</html>