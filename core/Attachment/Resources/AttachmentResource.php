<?php

namespace Core\Attachment\Resources;

use Illuminate\Http\Resources\Json\JsonResource as Resource;

class AttachmentResource extends Resource
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
            'path' => $this->path,
            'type' => $this->type,
            'usage' => $this->usage,
            'display_name' => $this->display_name,
            'attachmentable_type' => $this->attachmentable_type,
            'attachmentable_id' => $this->attachmentable_id,

            $this->mergeWhen($request->route()->getName() == 'api.v1.attachments.show', [

            ])
        ];
    }
}
