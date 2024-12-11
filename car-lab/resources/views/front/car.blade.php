@extends('layouts.app')

@section('content')
    @include('front.partials.breadcrumb', ['title' => $car->make])

    <section class="ftco-section ftco-car-details">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="car-details">
                        <div class="img rounded" style="background-image: url({{Storage::url($car->image)}});"></div>
                        <div class="text text-center">
                            <span class="subheading">{{$car->make}}</span>
                            <h2>{{$car->model}}</h2>
                            <h3>@lang('price_per_day'): {{$car->price_per_day}} $</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services">
                        <div class="media-body py-md-4">
                            <div class="d-flex mb-3 align-items-center">
                                <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-dashboard"></span></div>
                                <div class="text">
                                    <h3 class="heading mb-0 pl-3">
                                        Mileage
                                        <span>40,000</span>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services">
                        <div class="media-body py-md-4">
                            <div class="d-flex mb-3 align-items-center">
                                <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-pistons"></span></div>
                                <div class="text">
                                    <h3 class="heading mb-0 pl-3">
                                        Transmission
                                        <span>Manual</span>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services">
                        <div class="media-body py-md-4">
                            <div class="d-flex mb-3 align-items-center">
                                <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-car-seat"></span></div>
                                <div class="text">
                                    <h3 class="heading mb-0 pl-3">
                                        Seats
                                        <span>5 Adults</span>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services">
                        <div class="media-body py-md-4">
                            <div class="d-flex mb-3 align-items-center">
                                <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-backpack"></span></div>
                                <div class="text">
                                    <h3 class="heading mb-0 pl-3">
                                        Luggage
                                        <span>4 Bags</span>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services">
                        <div class="media-body py-md-4">
                            <div class="d-flex mb-3 align-items-center">
                                <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-diesel"></span></div>
                                <div class="text">
                                    <h3 class="heading mb-0 pl-3">
                                        Fuel
                                        <span>Petrol</span>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 pills">
                    <div class="bd-example bd-example-tabs">
                        <div class="d-flex justify-content-center">
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-description-tab" data-toggle="pill" href="#pills-description" role="tab" aria-controls="pills-description" aria-expanded="true">Features</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-manufacturer-tab" data-toggle="pill" href="#pills-manufacturer" role="tab" aria-controls="pills-manufacturer" aria-expanded="true">Description</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-review-tab" data-toggle="pill" href="#pills-review" role="tab" aria-controls="pills-review" aria-expanded="true">Review</a>
                                </li>
                            </ul>
                        </div>

                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-description" role="tabpanel" aria-labelledby="pills-description-tab">
                                <div class="row">


                                    <div class="col-md-4">
                                        <ul class="features">
                                            @if($car_services)
                                                @foreach($services as $service)
                                                    @php
                                                        $isCarService = in_array($service->id, $car_services);
                                                    @endphp
                                                    @if($isCarService)
                                                        <li class="check"><span class="ion-ios-checkmark"></span>{{ $service->name }}</li>
                                                    @else
                                                        <li class="remove"><span class="ion-ios-close"></span>{{ $service->name }}</li>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="pills-manufacturer" role="tabpanel" aria-labelledby="pills-manufacturer-tab">
                                {!! $car->description !!}
                            </div>

                            <div class="tab-pane fade" id="pills-review" role="tabpanel" aria-labelledby="pills-review-tab">
                                <div class="row">
                                    <div class="col-md-7">
                                        <h3 class="head">{{$comments->count()}} Reviews</h3>
                                        @foreach($comments as $comment)
                                        <div class="review d-flex">
                                            <div class="user-img" style="background-image: url({{Storage::url($comment->user->avatar)}})"></div>
                                            <div class="desc">
                                                <h4>
                                                    <span class="text-left">{{$comment->user->name}}</span>
                                                    <span class="text-right">{{$comment->created_at->diffForHumans()}}</span>
                                                </h4>
                                                <p class="star">
									   				<span>
                                                       @for ($i = 0; $i < $comment->rating; $i++)
                                                            <i class="ion-ios-star"></i>
                                                        @endfor
                                                    </span>
                                                </p>
                                                    <p>{{$comment->content}}</p>
                                                    </div>
                                                </div>
                                        @endforeach

                                        <div class="row">
                                            <div class="col-12">
                                                <form action="{{route('app.comment', ['car_id' => $car->id])}}" method="POST">
                                                    @csrf
                                                    <!-- Content Textarea -->
                                                    <div class="form-group">
                                                        <label for="content">Content</label>
                                                        <textarea name="content" id="content" cols="30" rows="10" class="form-control">{{ old('content') }}</textarea>

                                                        <!-- Error Display for Content -->
                                                        @error('content')
                                                        <div class="alert alert-danger mt-2">
                                                            <strong>{{ $message }}</strong>
                                                        </div>
                                                        @enderror
                                                    </div>

                                                    <!-- Rating Select -->
                                                    <div class="form-group">
                                                        <label for="rating">Rating</label>
                                                        <select name="rating" id="rating" class="form-control">
                                                            <option value="1" {{ old('rating') == 1 ? 'selected' : '' }}>1</option>
                                                            <option value="2" {{ old('rating') == 2 ? 'selected' : '' }}>2</option>
                                                            <option value="3" {{ old('rating') == 3 ? 'selected' : '' }}>3</option>
                                                            <option value="4" {{ old('rating') == 4 ? 'selected' : '' }}>4</option>
                                                            <option value="5" {{ old('rating') == 5 ? 'selected' : '' }}>5</option>
                                                        </select>

                                                        <!-- Error Display for Rating -->
                                                        @error('rating')
                                                        <div class="alert alert-danger mt-2">
                                                            <strong>{{ $message }}</strong>
                                                        </div>
                                                        @enderror
                                                    </div>

                                                    <!-- Submit Button -->
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="rating-wrap">
                                            <h3 class="head">Give a Review</h3>
                                            <div class="wrap">
                                                <p class="star">
									   				<span>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					(98%)
								   					</span>
                                                    <span>20 Reviews</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
