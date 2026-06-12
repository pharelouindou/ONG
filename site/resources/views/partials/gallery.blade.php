<div class="gallery-grid">
    @foreach (config('site.gallery') as $photo)
        <figure class="gallery-item">
            <img src="{{ asset($photo['file']) }}" alt="{{ $photo['caption'] }}" loading="lazy" />
            <figcaption>{{ $photo['caption'] }}</figcaption>
        </figure>
    @endforeach
</div>
