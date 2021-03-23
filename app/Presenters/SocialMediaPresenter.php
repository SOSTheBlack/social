<?php

namespace App\Presenters;

use App\Transformers\SocialMediaTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class SocialMediaPresenter.
 *
 * @package namespace App\Presenters;
 */
class SocialMediaPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return SocialMediaTransformer
     */
    public function getTransformer(): SocialMediaTransformer
    {
        return new SocialMediaTransformer();
    }
}
