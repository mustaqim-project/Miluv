<!-- Category Meta Tags -->
<meta name="description" content="{{ $category->meta_description ?? 'Jelajahi artikel-artikel menarik seputar ' . $category->name . ' di ' . $system_name }}">
<meta name="keywords" content="{{ $category->meta_keyword ?? $category->name }}">
<meta name="robots" content="index, follow">

<!-- Open Graph Meta Tags -->
<meta property="og:title" content="{{ $category->meta_title ?? $category->name }} - {{ $system_name }}">
<meta property="og:description" content="{{ $category->meta_description ?? 'Jelajahi artikel-artikel menarik seputar ' . $category->name . ' di ' . $system_name }}">
<meta property="og:image" content="{{ asset('storage/category/thumbnail/' . $category->thumbnail) }}">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:type" content="website">

<!-- Twitter Card Meta Tags -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $category->meta_title ?? $category->name }} - {{ $system_name }}">
<meta name="twitter:description" content="{{ $category->meta_description ?? 'Jelajahi artikel-artikel menarik seputar ' . $category->name . ' di ' . $system_name }}">
<meta name="twitter:image" content="{{ asset('storage/category/thumbnail/' . $category->thumbnail) }}">

<!-- Structured Data (JSON-LD) -->
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "CollectionPage",
    "name": "{{ $category->meta_title ?? $category->name }} - {{ $system_name }}",
    "description": "{{ $category->meta_description ?? 'Jelajahi artikel-artikel menarik seputar ' . $category->name . ' di ' . $system_name }}",
    "url": "{{ url()->current() }}",
    "image": "{{ asset('storage/category/thumbnail/' . $category->thumbnail) }}"
}
</script>