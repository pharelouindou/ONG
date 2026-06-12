<section class="page-hero {{ $heroClass ?? '' }}">
    {{-- Éléments décoratifs --}}
    <div class="ph-deco ph-deco-1"></div>
    <div class="ph-deco ph-deco-2"></div>
    <div class="ph-deco ph-deco-3"></div>

    <div class="container ph-inner">
        <div class="ph-text">
            @isset($tag)
                <span class="ph-tag">{{ $tag }}</span>
            @endisset
            <h1>{{ $title }}</h1>
            @isset($subtitle)
                <p>{{ $subtitle }}</p>
            @endisset
        </div>
        @isset($icon)
        <div class="ph-icon" aria-hidden="true">{{ $icon }}</div>
        @endisset
    </div>
</section>
