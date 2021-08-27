<?php

namespace App\Utils;

use Illuminate\Support\Str;


trait ImageUplaodTrait{

    public function imageUpload($query)
    {
        $imagName = Str::random(20);
        $ext = strtolower($query->getClientOriginalExtension());
        $imageFullName = $imagName.'.'.$ext;
        $uploadPath = 'candidate/';
        $imageUrl = $uploadPath.$imageFullName;
        $query->move($uploadPath, $imageFullName);
        return $imageUrl;
    }
}