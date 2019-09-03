<?php

namespace App\Repositories;

use App\Models\BlogPost as Model;
use Illuminate\Support\Facades\DB;

class BlogPostRepository extends CoreRepository
{
    /**
     * @param int $qty
     *
     * @return mixed
     */
    public function getAllWithPaginate($qty = 25)
    {
//        $result = DB::table('blog_categories')
//            ->select('blog_categories.id','blog_categories.title','blog_posts.title')
//            ->join('blog_category_post', 'blog_categories.id', '=', 'blog_category_post.category_id')
//            ->join('blog_posts', 'blog_category_post.post_id', '=', 'blog_posts.id')
//            ->get();
//dd($result);

        $columns = [
            'id',
            'title',
            'slug',
            'is_published',
            'published_at',
            'user_id',
//            'category_id',
        ];

        $result = $this->startConditions()
            ->select($columns)
            ->orderBy('id', 'DESC')
            ->with([
                'categories' => function ($query) {
                    $query->select(['blog_categories.id', 'blog_categories.title']);
                },
//                'categories:id,title',
                'user:id,name'
            ])
//            ->join()
            ->paginate($qty)
//        ->get()
        ;
//dd($result);
        return $result;
    }

    /**
     * @return string
     */
    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * Edit post by id
     *
     * @param int $id
     *
     * @return Model
     */
    public function getEdit($id)
    {
        return $this->startConditions()->find($id);
    }
}
