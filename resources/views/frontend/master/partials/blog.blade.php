<!-- Blog Meta Tags -->
<meta name="description" content="{{ $blog->meta_description ?? Str::limit(strip_tags($blog->description), 150) }}">
<meta name="keywords" content="{{ $blog->meta_keyword ?? '' }}">
<meta name="robots" content="index, follow">

<!-- Open Graph Meta Tags -->
<meta property="og:title" content="{{ $blog->meta_title ?? $blog->title }}">
<meta property="og:description" content="{{ $blog->meta_description ?? Str::limit(strip_tags($blog->description), 150) }}">
<meta property="og:image" content="{{ asset('storage/blog/thumbnail/' . $blog->thumbnail) }}">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:type" content="article">

<!-- Twitter Card Meta Tags -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $blog->meta_title ?? $blog->title }}">
<meta name="twitter:description" content="{{ $blog->meta_description ?? Str::limit(strip_tags($blog->description), 150) }}">
<meta name="twitter:image" content="{{ asset('storage/blog/thumbnail/' . $blog->thumbnail) }}">

<!-- Structured Data (JSON-LD) -->
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Article",
    "headline": "{{ $blog->meta_title ?? $blog->title }}",
    "description": "{{ $blog->meta_description ?? Str::limit(strip_tags($blog->description), 150) }}",
    "image": "{{ $blog->thumbnail ? asset('storage/blog/thumbnail/' . $blog->thumbnail) : asset('images/default-og-image.jpg') }}",
    "url": "{{ url()->current() }}",
    "datePublished": "{{ $blog->created_at->format('Y-m-d\TH:i:sP') }}",
    "dateModified": "{{ $blog->updated_at->format('Y-m-d\TH:i:sP') }}",
    "mainEntityOfPage": {
        "@type": "WebPage",
        "@id": "{{ url()->current() }}"
    },
    "author": {
        "@type": "Person",
        "name": "{{ $blog->getUser->name ?? 'Admin' }}"
    },
    "publisher": {
        "@type": "Organization",
        "name": "{{ $system_name }}",
        "image": {
            "@type": "ImageObject",
            "url": "https://miluv.app/public/storage/logo/light/light.png"
        }
    }
}
</script>