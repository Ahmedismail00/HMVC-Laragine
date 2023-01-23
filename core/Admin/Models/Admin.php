<?php

namespace Core\Admin\Models;

use Core\Base\Models\Base;
use Core\Base\Traits\Custom\AttachmentAttribute;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
class Admin extends Base
{
    use LogsActivity,AttachmentAttribute;

    protected $fillable = ['name', 'email','phone','password','type','is_active'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['name', 'text']);
        // Chain fluent methods for configuration options
    }
}
