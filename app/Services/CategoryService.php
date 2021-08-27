<?php

namespace App\Services;

use App\Http\Requests\CategoryCreateRequest;
use App\Repositories\ICategoryRepository;
use tidy;

class CategoryService implements ICategoryService{

    private $categoryRepository;

    public function __construct(ICategoryRepository $iCategoryRepository)
    {
        $this->categoryRepository = $iCategoryRepository;
    }

    public function getAllCategories()
    {
        return $this->categoryRepository->all();
    }

    public function createCategory($request)
    {
        try {
            $category = $this->categoryRepository->create([
                "name" => $request->name
            ]);
            notify()->success('Category created successfuly');
        } catch (\Throwable $th) {
            notify()->error('Category was not created');
        }
       

        return $category;
    }

    public function updateCategory($request, $id)
    {
        try {
            $category = $this->categoryRepository->find($id);
            $category->name = $request->name;
            $category->save();
            notify()->success('Category updated successfuly');
        } catch (\Throwable $th) {
            notify()->error('Category was not updated');
        }
        

    }

    public function deleteCategory($id)
    {
        try {
            return $this->categoryRepository->deleteById($id);
            notify()->success('Category deleted successfuly');
        } catch (\Throwable $th) {
            notify()->error('Category was not deleted');
        }
        
    }
}