<?php

namespace App\Presenters;

use App\Transformers\SocialMediaAccountTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class SocialMediaAccountPresenter.
 *
 * @package namespace App\Presenters;
 */
class SocialMediaAccountPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new SocialMediaAccountTransformer();
    }
}
