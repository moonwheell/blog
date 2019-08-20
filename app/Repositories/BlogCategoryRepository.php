<?php

namespace App\Repositories;

use App\Models\BlogCategory as Model;
use Illuminate\Database\Eloquent\Collection;

class BlogCategoryRepository extends CoreRepository
{
    /**
     * Edit category by id
     *
     * @param int $id
     *
     * @return Model
     */
    public function getEdit($id)
    {
        return $this->startConditions()->find($id);
    }

    /**
     * Get list of categories
     *
     * @return Collection
     */
    public function getForComboBox()
    {
        return $this->startConditions()->all();
    }

    /**
     * @return string
     */
    protected function getModelClass()
    {
        return Model::class;
    }

}
