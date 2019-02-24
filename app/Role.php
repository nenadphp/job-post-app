<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['role'];

    /**
     * @param $role
     * @return Role[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public static function getUserByRole($role)
    {
        $roles = self::find(self::where('role', '=', $role)->first()->id);

        $userData = [];

        foreach ($roles->users as $user){
            $userData['id'] = $user->id;
            $userData['email'] = $user->email;
        }

        return $userData;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function users()
    {
        return $this->belongsToMany('App\User', 'user_roles','user_id')
            ->select('users.id','users.email');
    }
}
