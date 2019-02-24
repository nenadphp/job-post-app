@extends('layouts.app')

@section('content')
    @if(count($collection))
        <div class="container">
            <div class="container-fluid text-center">
            <p class="text-center text-muted h5">Job Posts</p>
            </div>
        @foreach($collection as $data)
            <section id="what-we-do">
                <div class="container-fluid ">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-block block-2">
                                    <h3 class="card-title">{{$data->title}}</h3>
                                    <p class="card-text">{{$data->description}}</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
        @endforeach
        </div>
    @else
        <div class="container">
            <div class="container-fluid text-center">
                <p class="text-center text-muted h5">Sorry at this moment there are no posts!!!</p>
            </div>

    @endif
@endsection
