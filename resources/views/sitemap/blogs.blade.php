<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($blogs as $blog)
        <url>
            <loc>{{ url('/blog/view' . $blog->slug) }}</loc>
            <lastmod>{{ \Carbon\Carbon::parse($blog->updated_at)->toAtomString() }}</lastmod>
            <changefreq>daily</changefreq>
            <priority>0.9</priority>
        </url>
    @endforeach
</urlset>
