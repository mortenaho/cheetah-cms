<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($posts as $post)
        <url>
            <loc>{{\Illuminate\Support\Facades\Request::root(). $post->link_address}}</loc>
            <lastmod>{{substr($post->created_at,0,10)}}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.5</priority>
        </url>
    @endforeach
</urlset>
