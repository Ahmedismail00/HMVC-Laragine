<?php

namespace Core\Attachment\Models;

use Core\Base\Models\Base;

class Attachment extends Base
{
    protected $table = 'attachments';
    public $timestamps = true;
    // protected $fillable = array('usage','type','path');
    protected $fillable = array('original', 'extension', 'photo_400', 'photo_600', 'photo_800', 'type','usage','display_name','attachmentable_type', 'attachmentable_id');

    public function attachmentable()
    {
        return $this->morphTo();
    }
}
