<?php

namespace App\Service;

class ImageService
{
    /**
     * saveImage
     *
     * @param  mixed $req
     * @return mixed
     */
    public function saveImage(object $req): mixed
    {
        return $req->file('photo')->store('uploads', 'public');
    }
}
