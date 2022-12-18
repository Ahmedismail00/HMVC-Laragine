<?php

namespace Core\Admin\Controllers\API\V1;

use Core\Admin\Requests\AdminRequest as FormRequest;
use Core\Admin\Models\Admin as Model;
use Core\Admin\Resources\AdminResource as Resource;

/**
 * @OA\Info(title="My First API", version="0.1")
 */
class AdminController extends \Core\Base\Controllers\API\Controller
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


   /**
     * @OA\Get(
     *      path="/projectsss",
     *      operationId="getProjectsList",
     *      tags={"Projects"},
     *      summary="Get list of projects",
     *      description="Returns list of projects",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     */
    public function index()
    {
        return view($this->path . __FUNCTION__);
    }
}
