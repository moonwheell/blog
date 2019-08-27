<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Requests\BlogCategoryCreateRequest;
use App\Http\Requests\BlogCategoryUpdateRequest;
use App\Models\BlogCategory;
use App\Repositories\BlogCategoryRepository;

class CategoryController extends BaseController
{
    /**
     * @var BlogCategoryRepository
     */
    private $blogCategoryRepository;

    public function __construct()
    {
        parent::__construct();

        $this->blogCategoryRepository = app(BlogCategoryRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginator = $this->blogCategoryRepository->getAllWithPaginate(5);
        return view('blog.admin.categories.index', compact('paginator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = new BlogCategory();
        $categoryList = $this->blogCategoryRepository->getForComboBox();

        return view('blog.admin.categories.edit',
            compact('item', 'categoryList'));
    }

    /**
     * @param BlogCategoryCreateRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(BlogCategoryCreateRequest $request)
    {
        $dataRequest = $request->input();
        try {
            $item = new BlogCategory($dataRequest);//Todo have to create Builder
            $item->save();//Todo replace to repository
            return redirect()
                ->route('blog.admin.categories.edit', $item->id)
                ->with(['success' => 'Successful saved']);
        } catch (\Exception $e) {
            return back()
                ->withErrors(['msg' => "{$e->getMessage()}"])
                ->withInput();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $item = $this->blogCategoryRepository->getEdit($id);
        if (!$item) abort(404);
        $categoryList = $this->blogCategoryRepository->getForComboBox();

        return view('blog.admin.categories.edit',
            compact('item', 'categoryList'));
    }

    /**
     * @param BlogCategoryUpdateRequest $request
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(BlogCategoryUpdateRequest $request, $id)
    {
        $item = $this->blogCategoryRepository->getEdit($id);

        if (!$item)
            return back()
                ->withErrors(['msg' => "No such entity with id=[{$id}]"])
                ->withInput(); //return back inputted data

        $dataRequest = $request->input();
        try {
            $item->update($dataRequest);
            return redirect()
                ->route('blog.admin.categories.edit', $item->id)
                ->with(['success' => 'Successful saved']);
        } catch (\Exception $e) {
            return back()
                ->withErrors(['msg' => "{$e->getMessage()}"])
                ->withInput();
        }
    }
}
