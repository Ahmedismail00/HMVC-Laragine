<?php

namespace Core\Log\Controllers\API\V1;

use Core\Log\Requests\LogRequest as FormRequest;
use Core\Log\Models\Log as Model;
use Core\Log\Resources\LogResource as Resource;

class LogController extends \Core\Base\Controllers\API\Controller
{
    /**
     * Init.
     * @param FormRequest $request
     * @param Model       $model
     * @param string      $resource
     */
    public function __construct(FormRequest $request, Model $model, $resource = Resource::class)
    {
        parent::__construct($request, $model, $resource);
    }
}
