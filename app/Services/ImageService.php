<?php

namespace App\Services;

class ImageService
{
    /**
     * saveImage
     *
     * @param  mixed $req
     * @return mixed
     */
    public function saveImage(mixed $request): mixed
    {
        return $request->file('photo')->store('uploads', 'public');
    }
}
