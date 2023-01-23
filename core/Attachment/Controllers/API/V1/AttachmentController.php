<?php

namespace Core\Attachment\Controllers\API\V1;

use Core\Attachment\Requests\AttachmentRequest as FormRequest;
use Core\Attachment\Models\Attachment as Model;
use Core\Attachment\Resources\AttachmentResource as Resource;

class AttachmentController extends \Core\Base\Controllers\API\Controller
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
