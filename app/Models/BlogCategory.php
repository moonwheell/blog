<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class BlogCategory
 *
 * @package App\Models
 *
 * @property int id
 * @property string $title
 * @property string $slug
 * @property string $description
 *
 * @property-read BlogCategory $parentCategory
 * @property-read string $parentTitle
 */
class BlogCategory extends Model
{
    use SoftDeletes;

    const ROOT = 1;

    protected $fillable =
        [
            'title',
            'slug',
            'parent_id',
            'description',
        ];

    /**
     * Get parent category
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parentCategory()
    {
        return $this->belongsTo(BlogCategory::class, 'parent_id', 'id');
    }

    /**
     * Get parent category title (accessor)
     *
     * @return string
     */
    public function getParentTitleAttribute()
    {
        $title = $this->parentCategory->title
            ?? ($this->isRoot()
                ? 'Root'
                : 'Main');

        return $title;
    }

    /**
     * Is current object a root
     *
     * @return bool
     */
    public function isRoot()
    {
        return $this->id === BlogCategory::ROOT;
    }

//    /**
//     * Accessor example
//     *
//     * @param $value
//     *
//     * @return bool|false|mixed|string|string[]|null
//     */
//    public function getTitleAttribute($value)
//    {
//        return mb_strtoupper($value);
//    }
//
//    /**
//     * Mutator example
//     *
//     * @param $value
//     */
//    public function setTitleAttribute($value)
//    {
//        $this->attributes['title'] = mb_strtolower($value);
//    }
}
