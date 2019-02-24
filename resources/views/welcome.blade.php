@extends('layouts.app')

@section('content')

    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                Welcome to job posts App
            </div>
            @if(Auth::user())
                <div class="links">
                    <a href="/job-add">Add job</a>
                </div>

                <div class="links">
                    <a href="/jobs">Job list</a>
                </div>
            @endif
        </div>
    </div>

@endsection
