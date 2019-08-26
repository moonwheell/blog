<?php

namespace App\Observers;

use App\Models\BlogPost;
use Carbon\Carbon;
use Illuminate\Support\Str;

class BlogPostObserver
{

    /**
     * Handle the blog post "updating" event.
     *
     * @param BlogPost $blogPost
     *
     * @return void
     */
    public function updating(BlogPost $blogPost)
    {
        $this->setPublishedAt($blogPost);
        $this->setSlug($blogPost);
    }

    /**
     * @param BlogPost $blogPost
     *
     * @return void
     */
    protected function setPublishedAt(BlogPost $blogPost)
    {
        if (!$blogPost->published_at && $blogPost->is_published)
            $blogPost->published_at = Carbon::now();
    }

    /**
     * @param BlogPost $blogPost
     *
     * @return void
     */
    protected function setSlug(BlogPost $blogPost)
    {
        if (!$blogPost->slug)
            $blogPost->slug = Str::slug($blogPost->title);
    }

    /**
     * Handle the blog post "created" event.
     *
     * @param BlogPost $blogPost
     *
     * @return void
     */
    public function created(BlogPost $blogPost)
    {
//        dd(__METHOD__);
    }

    /**
     * Handle the blog post "updated" event.
     *
     * @param BlogPost $blogPost
     *
     * @return void
     */
    public function updated(BlogPost $blogPost)
    {
//        dd(__METHOD__);
    }

    /**
     * Handle the blog post "deleted" event.
     *
     * @param BlogPost $blogPost
     *
     * @return void
     */
    public function deleted(BlogPost $blogPost)
    {
        //
    }

    /**
     * Handle the blog post "restored" event.
     *
     * @param BlogPost $blogPost
     *
     * @return void
     */
    public function restored(BlogPost $blogPost)
    {
        //
    }

    /**
     * Handle the blog post "force deleted" event.
     *
     * @param BlogPost $blogPost
     *
     * @return void
     */
    public function forceDeleted(BlogPost $blogPost)
    {
        //
    }
}
