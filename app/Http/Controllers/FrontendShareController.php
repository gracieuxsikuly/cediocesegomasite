<?php

namespace App\Http\Controllers;

use App\Models\PhotoVideo;
use App\Models\Ressource;
use Illuminate\Support\Str;

class FrontendShareController extends Controller
{
    public function gallery()
    {
        $photo = PhotoVideo::orderBy('id', 'desc')->first();

        return view('frontend.share-preview', [
            'title' => 'Galerie photos',
            'description' => 'Découvrez les photos des activités, célébrations et événements de la Croisade Eucharistique du Diocèse de Goma.',
            'image' => $photo?->liens ? asset('storage/' . $photo->liens) : asset('asset_frontend/images/logoce.png'),
            'url' => route('partage.galerie'),
            'backUrl' => route('galleriephoto'),
            'backLabel' => 'Voir toute la galerie',
            'type' => 'website',
        ]);
    }

    public function photo(PhotoVideo $photo)
    {
        $title = $photo->designation ?: 'Photo de la Croisade Eucharistique';

        return view('frontend.share-preview', [
            'title' => $title,
            'description' => 'Photo partagée depuis la galerie officielle de la Croisade Eucharistique du Diocèse de Goma.',
            'image' => asset('storage/' . $photo->liens),
            'url' => route('partage.photo', ['photo' => $photo->id]),
            'backUrl' => route('galleriephoto'),
            'backLabel' => 'Voir la galerie',
            'type' => 'article',
        ]);
    }

    public function resource(Ressource $resource)
    {
        $description = Str::limit(strip_tags($resource->description ?? ''), 160);
        $image = $this->resourcePreviewImage($resource);

        return view('frontend.share-preview', [
            'title' => $resource->titre,
            'description' => $description ?: 'Ressource spirituelle partagée depuis la Croisade Eucharistique du Diocèse de Goma.',
            'image' => $image,
            'url' => route('partage.ressource', ['resource' => $resource->id]),
            'backUrl' => route('ressources'),
            'backLabel' => 'Voir les ressources',
            'type' => 'article',
            'fileUrl' => $resource->file ? asset('storage/' . $resource->file) : null,
            'fileFormat' => $resource->formatressource,
        ]);
    }

    private function resourcePreviewImage(Ressource $resource): string
    {
        if (! $resource->file) {
            return asset('asset_frontend/images/logoce.png');
        }

        $extension = strtolower(pathinfo($resource->file, PATHINFO_EXTENSION));

        if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'svg', 'webp'], true)) {
            return asset('storage/' . $resource->file);
        }

        return asset('asset_frontend/images/logoce.png');
    }
}