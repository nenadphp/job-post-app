@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="jumbotron text-center"><h1>Post Job</h1></div>
        <form action="job-store" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" id="title" aria-describedby="title" placeholder="Enter title" required>
            </div>
            <div class="form-group">
                <label for="description">Password</label>
                <textarea type="text" name="description" class="form-control" id="description" placeholder="description" rows="5" required></textarea>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="email" required>
            </div>
            <button type="submit" class="btn btn-block btn-primary">Submit</button>
        </form>
    </div>
@endsection
