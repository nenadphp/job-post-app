<?php

namespace App\Http\Services;

use App\JobPost;
use App\Http\Helpers\JobPostHelper;
use App\Jobs\SendEmailBoardModeratorJob;
use App\Jobs\SendEmailManagerJob;

class JobService
{
    /**
     * @var JobPost $model
     */
    private $model;

    /**
     * JobService constructor.
     * @param JobPost $model
     */
    public function __construct(JobPost $model)
    {
        $this->model = $model;
    }

    /**
     * @return mixed
     */
    public function index()
    {
        return $this->model->index();
    }

    /**
     * Store job post data
     *
     * @param object $request
     * @return mixed
     */
    public function store($request)
    {
        $is_published = true;
        if (!$this->model->isAlreadyPosted($request->user()->id)){
            $is_published = false;
            $this->managerQueueJob($request);
            $this->boardModeratorQueueJob($request);
        }

        return $this->model->store($request, $is_published);
    }

    /**
     * Publish post
     *
     * @param object $request
     * @return mixed
     * @throws \Exception
     */
    public function publishPost($request)
    {
        return $this->model->publishPost($request->id);
    }

    /**
     * Spam post
     *
     * @param object $request
     * @return mixed
     * @throws \Exception
     */
    public function spamPost($request)
    {
        return $this->model->spamPost($request->id);
    }

    /**
     * Moderator queue job
     *
     * @param object $request
     */
    private function managerQueueJob($request)
    {
        dispatch(new SendEmailManagerJob(JobPostHelper::transformDataManager($request)));
    }

    /**
     * Board moderator queue job
     *
     * @param $request
     */
    private function boardModeratorQueueJob($request)
    {
        dispatch(new SendEmailBoardModeratorJob(JobPostHelper::transformDataBoardModerator($request)));
    }
}
