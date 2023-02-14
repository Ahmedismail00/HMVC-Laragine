<?php

namespace Core\Admin\Models;

use Core\Base\Models\Base;
use Core\Base\Traits\Custom\AttachmentAttribute;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use LogsActivity,AttachmentAttribute,HasApiTokens;

    protected $fillable = ['name', 'email','phone','password','type','is_active'];

    protected $hidden = ['password', 'remember_token'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logOnly(['name', 'text']);
    }

    public function setPasswordAttribute(string $input): void
    {
        $this->attributes['password'] = bcrypt($input);
    }
}
