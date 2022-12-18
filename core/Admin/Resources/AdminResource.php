<?php

namespace Core\Admin\Resources;

use Illuminate\Http\Resources\Json\JsonResource as Resource;

class AdminResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'   => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'phone' => $this->phone,
            'is_active' => $this->is_active,
            'type' => $this->type,

            $this->mergeWhen($request->route()->getName() == 'api.v1.admins.show', [

            ])
        ];
    }
}
