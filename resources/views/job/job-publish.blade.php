@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="container-fluid text-center">
            <p class="text-center text-muted h5">Post is public</p>
        </div>
        <section id="what-we-do">
            <div class="container-fluid">
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

    </div>
@endsection