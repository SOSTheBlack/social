<?php

namespace App\Services\Instagram;

function generateCsrfToken()
{
    return md5(uniqid());
}
