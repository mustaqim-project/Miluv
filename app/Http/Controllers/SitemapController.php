<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use App\Models\Blog;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
    public function index()
    {
        return response()->view('sitemap.index')->header('Content-Type', 'text/xml');
    }

    // Sitemap untuk Blog Categories
    public function categories()
    {
        $categories = BlogCategory::orderBy('id', 'desc')->get();
        return response()->view('sitemap.categories', compact('categories'))->header('Content-Type', 'text/xml');
    }

    // Sitemap untuk Blogs
    public function blogs()
    {
        $blogs = Blog::orderBy('created_at', 'desc')->where('status', 'published')->get();
        return response()->view('sitemap.blogs', compact('blogs'))->header('Content-Type', 'text/xml');
    }
}
