<?php

namespace App\Services\Instagram;

use App\Services\Instagram\Resources\AuthResource;

class Instagram extends \Illuminate\Http\Client\Factory
{
    use HelperInstagram;

    public function auth()
    {
        return new AuthResource($this);
    }
}
