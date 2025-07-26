<?php

namespace App\Observers;

use App\Models\Article;

class ArticleObserver
{
    /**
     * Handle the Article "created" event.
     */
    public function created(Article $article): void
    {
        cache()->forget('article_'.$article->id);
    }

    /**
     * Handle the Article "updated" event.
     */
    public function updated(Article $article): void
    {
        cache()->forget('article_'.$article->id);
    }

    /**
     * Handle the Article "deleted" event.
     */
    public function deleted(Article $article): void
    {
        cache()->forget('article_'.$article->id);
    }

    /**
     * Handle the Article "restored" event.
     */
    public function restored(Article $article): void
    {
        cache()->forget('article_'.$article->id);
    }

    /**
     * Handle the Article "force deleted" event.
     */
    public function forceDeleted(Article $article): void
    {
        cache()->forget('article_'.$article->id);
    }
}
