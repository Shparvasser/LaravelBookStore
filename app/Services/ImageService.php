<?php

namespace App\Services;

class ImageService
{
    /**
     * saveImage
     *
     * @param  object $request
     * @return mixed
     */
    public function saveImage(object $request): mixed
    {
        return $request->file('photo')->store('uploads', 'public');
    }
}
