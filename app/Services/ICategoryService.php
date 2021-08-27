<?php
namespace App\Services;

use App\Http\Requests\CategoryCreateRequest;

interface ICategoryService
{    
    public function getAllCategories();
    public function createCategory($request);
    public function updateCategory($request,$id);
    public function deleteCategory($id);
}