@extends('layouts.app')

@section('customCss')
    <style>
        .pagination {
            display: flex;
            justify-content: center;
            padding: 1rem 0;
        }

        .page-item.disabled .page-link {
            pointer-events: none;
            background-color: #e9ecef;
        }

        .page-item.active .page-link {
            background-color: #007bff;
            color: white;
            border-color: #007bff;
        }

        .page-item .page-link {
            border-radius: 5px;
            margin: 0 2px;
            padding: 8px 16px;
        }

    </style>
@endsection

@section('content')
    @include('front.partials.breadcrumb', ['title' => 'Cars'])

    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row">
                @foreach($cars as $car)
                    <div class="col-md-4">
                        <div class="car-wrap rounded ftco-animate">
                            <div class="img rounded d-flex align-items-end" style="background-image: url({{Storage::url($car->image)}});">
                            </div>
                            <div class="text">
                                <h2 class="mb-0"><a href="">{{$car->make}}</a></h2>
                                <div class="d-flex mb-3">
                                    <span class="cat">{{$car->model}}</span>
                                    <p class="price ml-auto">$ {{$car->price_per_day}} <span>/day</span></p>
                                </div>
                                <p class="d-flex mb-0 d-block">
                                    <a href="#" class="btn btn-primary py-2 mr-1">Book now</a>
                                    <a href="{{route('app.car', ['id' => $car->id])}}" class="btn btn-secondary py-2 ml-1">Details</a>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row mt-5">
                <div class="col text-center">
                    <div class="block-27">
                        @include('front.partials.paginate', ['paginator'=>$cars])
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
