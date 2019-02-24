@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="container-fluid text-center">
            <h2 class=" mb-2 h1">Post is spam</h2>
            <p class="text-center text-muted h5"></p>
        </div>

        <section id="what-we-do">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-block block-2">
                                <h3 class="card-title">{{$data->title}}</h3>
                                <p class="card-text">{{$data->description}}</p>
                                <a href="javascript:void();" title="Read more" class="read-more" >Read more<i class="fa fa-angle-double-right ml-2"></i></a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

    </div>
@endsection