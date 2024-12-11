@extends('layouts.admin')

@section('title', 'Cars-Edit')

@section('content')
    <div class="container-fluid">

        <h1 class="h3 mb-4 text-gray-800">@lang('cars') @lang('edit')</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="{{route('admin.cars.index')}}" class="btn btn-info">@lang('list')</a>
            </div>

            <form action="{{route('admin.cars.update', ['id' => $car->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="container mt-4">
                    <h2>@lang('update_car')</h2>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="make">@lang('make')</label>
                                <input type="text" class="form-control @error('make') is-invalid @enderror"
                                       id="make" name="make" value="{{ $car->make }}" >
                                @error('make')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="model">@lang('model')</label>
                                <input type="text" class="form-control @error('model') is-invalid @enderror"
                                       id="model" name="model" value="{{ $car->model }}" >
                                @error('model')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="year">@lang('year')</label>
                                <input type="number" class="form-control @error('year') is-invalid @enderror"
                                       id="year" name="year" value="{{ $car->year }}" required>
                                @error('year')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="price_per_day">@lang('price_per_day')</label>
                                <input type="number" class="form-control @error('price_per_day') is-invalid @enderror"
                                       id="price_per_day" name="price_per_day" value="{{ $car->price_per_day }}" required>
                                @error('price_per_day')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="image">@lang('image')</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror"
                                       id="image" name="image">
                                @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="availability">@lang('availability')</label>
                                <select class="form-control @error('availability') is-invalid @enderror"
                                        id="availability" name="availability" required>
                                    <option value="1" {{ $car->availability == 1 ? 'selected' : '' }}>@lang('available')</option>
                                    <option value="0" {{ $car->availability == 0 ? 'selected' : '' }}>@lang('not_available')</option>
                                </select>
                                @error('availability')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        @if($car->image)
                            <div class="col-md-12">
                                <div class="form-group">
                                    <img src="{{Storage::url($car->image)}}" alt="{{$car->make}}" width="80">
                                </div>
                            </div>
                        @else
                            <div>No Image</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">@lang('update')</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
