<?php

namespace App\Http\Controllers;

use App\Entities\SocialMedia;
use App\Entities\SocialMediaAccount;
use App\SocialMedias\Instagram\Instagram;
use Throwable;

/**
 * Class TestController.
 *
 * @package App\Http\Controllers
 */
class TestController extends Controller
{
    public function __invoke()
    {
        $this->instagramGetInfo();
    }

    private function instagramGetInfo()
    {
        try {
            $socialMedia = SocialMedia::whereSlug(Instagram::SLUG)->firstOrFail();
            $socialMediaAccount = SocialMediaAccount::whereSocialMediaId($socialMedia->id)->firstOrFail();
            $instagram = new Instagram($socialMediaAccount);

            $infoMe = $instagram->users()->me();

            dd($infoMe->object());
        } catch (Throwable $exception) {
            dd($exception);
        }
    }
}