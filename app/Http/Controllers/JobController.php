<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobRequest;
use App\Http\Requests\PostMarkRequest;
use App\Http\Services\JobService;

class JobController extends Controller
{
    /**
     * @var JobService $service
     */
    private $service;

    /**
     * JobController constructor.
     * @param JobService $service
     */
    public function __construct(JobService $service)
    {
        $this->service = $service;
    }

    /**
     * Return all
     *
     * @return array
     * @throws \Exception
     */
    public function index()
    {
        try{
            $collection = $this->service->index();
            return view('job/jobs', compact('collection'));
        }catch (\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * @param JobRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function store(JobRequest $request)
    {
        try{
            $this->service->store($request);
            return redirect('/');
        }catch (\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * Mark post as public
     *
     * @param PostMarkRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function markAsPublic(PostMarkRequest $request)
    {
        try {
            $data = $this->service->publishPost($request);
            return view('job/job-publish', compact('data'));
        } catch (\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * Mark post as spam
     *
     * @param PostMarkRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function markAsSpam(PostMarkRequest $request)
    {
        try {
            $data = $this->service->spamPost($request);
            return view('job/job-spam', compact('data'));
        } catch (\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function jobAdd()
    {
        return view('job/job-add');
    }
}
