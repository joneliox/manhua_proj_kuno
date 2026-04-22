<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

/**
 * ManhuaController
 *
 * Handles the main Manhua homepage. In production, each array of data
 * here would be replaced by Eloquent queries (e.g. Manhua::trending()->take(6)->get()).
 *
 * Why Inertia::render() instead of a plain view()?
 * — This project uses Inertia.js, so data is injected as component props.
 *   The controller passes typed, structured data; the Vue component does
 *   zero HTTP calls on load, keeping TTFB fast.
 *
 * Why stub data here instead of a seeder?
 * — The page must render immediately before any DB is seeded.
 *   The Vue component falls back to its own mock data if these arrays
 *   are empty, so both paths work.
 */
class ManhuaController extends Controller
{
    /**
     * Render the Manhua homepage.
     *
     * Replace each stub array with real Eloquent queries, e.g.:
     *   $featured = Manhua::featured()->with('genres')->take(5)->get();
     */
    public function index(): Response
    {
        return Inertia::render('ManhuaHome', [
            // Hero carousel — top curated/editorial picks
            'featuredManhua' => [],   // TODO: Manhua::featured()->take(5)->get()

            // Trending today — ordered by view_count in last 24h
            'trendingToday' => [],    // TODO: Manhua::trendingToday()->take(6)->get()

            // Popular manhua — will be filtered client-side by weekly/monthly/all
            'popularManhua' => [],    // TODO: Manhua::popular()->take(10)->get()

            // Latest chapter updates — ordered by latest_chapter_updated_at
            'latestUpdates' => [],    // TODO: Manhua::latestUpdates()->take(12)->get()

            // Genre list — static or from DB
            'genres' => [],           // TODO: Genre::withCount('manhua')->get()
        ]);
    }
}
