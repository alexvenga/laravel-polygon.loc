<?php


namespace App\Repositories;

use App\Models\BlogCategory as Model;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class BlogCategoryRepository
 *
 * @package App\Repositories
 */
class BlogCategoryRepository extends CoreRepository
{

    /**
     * @return string
     */
    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     *
     * Get BlogCategory model for editing
     *
     * @param  int  $id
     *
     * @return Model
     */
    public function getEdit($id)
    {
        return $this->startConditions()->find($id);
    }

    /**
     * @return Collection
     */
    public function getForCombobox()
    {
        //return $this->startConditions()->all();

        $columns = implode(', ', [
            'id',
            'CONCAT (id, ". ", title) AS id_title'
        ]);

        //$resoults = $this->startConditions()->all();

//        $results = $this
//            ->startConditions()
//            ->select('blog_categories.*',
//                \DB::raw('CONCAT (id, ". ", title) AS id_title'))
//            ->toBase()
//            ->get();

        $results = $this
        ->startConditions()
        ->selectRaw($columns)
        ->toBase()
        ->get();

        return $results;

    }

    /**
     * Get all categories with paginator
     *
     * @param  int|null  $perPage
     *
     * @return LengthAwarePaginator
     */
    public function getAllWithPaginate($perPage = null)
    {

        $columns = ['id', 'title', 'parent_id',];

        $resoult = $this
            ->startConditions()
            ->select($columns)
            ->paginate($perPage);

        return $resoult;

    }

}