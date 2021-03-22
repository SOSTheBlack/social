<?php

namespace App\SocialMedias\Instagram;

function generateCsrfToken()
{
    return md5(uniqid());
}
