<?php

namespace App\Entities\Users;

use App\Entities\BaseEntity;
use Illuminate\Auth\Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\HasActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends BaseEntity implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword, HasActivity, HasRoles, Notifiable, SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'users';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * @var bool
     */
    public $timestamps = true;

    /**
     * @var array
     */
    protected $with = ['roles'];

    /**
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * @var bool
     */
    protected static $logFillable = true;

    /**
     * @var string
     */
    protected static $logName = 'user';

    /**
     * @var bool
     */
    protected static $logOnlyDirty = true;

    /**
     * @var array
     */
    protected $ignoreChangedAttributes = [
        'updated_at',
    ];

    /**
     * @return string
     */
    public function getGravatarAttribute() : string
    {
        $hash = md5(strtolower(trim($this->attributes['email'])));

        return 'https://www.gravatar.com/avatar/'.$hash;
    }
}
