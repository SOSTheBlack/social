<?php

namespace App\Presenters;

use App\Transformers\EnterpriseUserTransformer;
use League\Fractal\TransformerAbstract;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class EnterpriseUserPresenter.
 *
 * @package namespace App\Presenters;
 */
class EnterpriseUserPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return TransformerAbstract
     */
    public function getTransformer()
    {
        return new EnterpriseUserTransformer();
    }
}
