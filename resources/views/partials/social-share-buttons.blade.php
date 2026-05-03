@php
    $shareUrl = $shareUrl ?? url()->current();
    $shareTitle = $shareTitle ?? 'Croisade Eucharistique - Diocèse de Goma';
    $shareDescription = $shareDescription ?? '';
    $shareText = trim($shareTitle . ($shareDescription ? ' - ' . $shareDescription : ''));
    $whatsappUrl = 'https://wa.me/?text=' . rawurlencode(trim($shareText . ' ' . $shareUrl));
    $facebookUrl = 'https://www.facebook.com/sharer/sharer.php?u=' . rawurlencode($shareUrl);
    $xUrl = 'https://twitter.com/intent/tweet?url=' . rawurlencode($shareUrl) . '&text=' . rawurlencode($shareText);
@endphp

<div class="social-share-box" aria-label="Partager sur les réseaux sociaux">
    <span class="social-share-label">Partager</span>
    <a class="social-share-btn whatsapp" href="{{ $whatsappUrl }}" target="_blank" rel="noopener" aria-label="Partager sur WhatsApp" title="Partager sur WhatsApp">
        <i class="fa-brands fa-whatsapp"></i>
    </a>
    <a class="social-share-btn facebook" href="{{ $facebookUrl }}" target="_blank" rel="noopener" aria-label="Partager sur Facebook" title="Partager sur Facebook">
        <i class="fa-brands fa-facebook-f"></i>
    </a>
    <a class="social-share-btn x-twitter" href="{{ $xUrl }}" target="_blank" rel="noopener" aria-label="Partager sur X" title="Partager sur X">
        <i class="fa-brands fa-x-twitter"></i>
    </a>
    <button class="social-share-btn copy-link" type="button" onclick="navigator.clipboard && navigator.clipboard.writeText(@js($shareUrl))" aria-label="Copier le lien" title="Copier le lien">
        <i class="fa-solid fa-link"></i>
    </button>
</div>