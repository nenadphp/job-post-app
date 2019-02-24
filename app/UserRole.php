<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'user_roles';

    /**
     * @param int $id
     * @return mixed
     */
    public function getRoles(int $id)
    {
        return self::where('user_id', $id)->get();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function roles()
    {
        return $this->hasMany('App\Role','id','user_id');
    }
}
