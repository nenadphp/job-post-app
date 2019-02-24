<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobPost extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','title', 'description', 'user_id', 'email', 'is_published'
    ];


    /**
     * @return mixed
     */
    public function index(){
        return self::with('user')
            ->where('is_published','=',1)
            ->get();
    }

    /**
     * @param $request
     * @param $is_published
     * @return mixed
     */
    public function  store($request, $is_published)
    {
        return self::create([
            'user_id' => $request->user()->id,
            'title' => $request->title,
            'description' => $request->description,
            'email' => $request->email,
            'is_published' => $is_published ? 1 : 0
        ]);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function isAlreadyPosted(int $id)
    {
        return self::where( 'user_id','=', $id )
            ->count();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function publishPost(int $id)
    {
       $jobPost = self::where('user_id','=', $id)->first();
       $jobPost->is_published = 1;
       $jobPost->save();
       return $jobPost;
    }

    /**
     * Mark post as spam
     *
     * @param $id
     * @return mixed
     */
    public function spamPost(int $id)
    {
        $jobPost = self::where('user_id','=', $id)->where('is_published','=',0)->first();
        $jobPost->is_spam = 1;
        $jobPost->save();
        return $jobPost;
    }
}
