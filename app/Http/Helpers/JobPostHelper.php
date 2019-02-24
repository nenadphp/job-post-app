<?php

namespace App\Http\Helpers;

use App\Role;

class JobPostHelper
{

    /**
     * @const MODERATOR_ROLE
     */
    private const MODERATOR_ROLE = 'moderator';

    /**
     * Transform data
     *
     * @param object $request
     * @return array
     */
    public static function transformDataManager($request)
    {
        return [
            'email'         => $request->user()->email,
            'content'       => 'submission is in moderation'
        ];
    }

    /**
     * Transform data
     *
     * @param object $request
     * @return array
     */
    public static function transformDataBoardModerator($request)
    {
        /** @var GetUserByRole $userByRole */
        $userByRole = Role::getUserByRole(self::MODERATOR_ROLE);

        return [
            'moderator_id'  => $userByRole['id'],
            'moderator_mail'=> $userByRole['email'],
            'author'        => $request->user()->name,
            'email'         => $request->user()->email,
            'title'         => $request->title,
            'description'   => $request->description,
            'approved_link' => 'http://localhost:8000/publish?id='. $request->user()->id .'&hash='. $request->user()->hash,
            'spam_link'     => 'http://localhost:8000/spam?id='. $request->user()->id .'&hash='. $request->user()->hash
        ];
    }
}