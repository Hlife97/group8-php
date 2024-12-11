@extends('layouts.admin')

@section('title', 'Cars-Create')

@section('customCss')
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />
@endsection

@section('content')
    <div class="container-fluid">

        <h1 class="h3 mb-4 text-gray-800">@lang('cars') @lang('list')</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="{{route('admin.cars.index')}}" class="btn btn-info">@lang('list')</a>
            </div>

            <form action="{{route('admin.cars.store')}}" method="POST" enctype="multipart/form-data" id="carForm">
                @csrf
                <div class="container mt-4">
                    <h2>@lang('create_car')</h2>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="make">@lang('make')</label>
                                <input type="text" class="form-control @error('make') is-invalid @enderror"
                                       id="make" name="make" value="{{ old('make') }}" >
                                @error('make')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="model">@lang('model')</label>
                                <input type="text" class="form-control @error('model') is-invalid @enderror"
                                       id="model" name="model" value="{{ old('model') }}" >
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
                                       id="year" name="year" value="{{ old('year') }}" required>
                                @error('year')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="price_per_day">@lang('price_per_day')</label>
                                <input type="number" class="form-control @error('price_per_day') is-invalid @enderror"
                                       id="price_per_day" name="price_per_day" value="{{ old('price_per_day') }}" required>
                                @error('price_per_day')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="image">@lang('image')</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror"
                                       id="image" name="image" value="{{ old('image') }}">
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
                                    <option value="1" {{ old('availability') == 1 ? 'selected' : '' }}>@lang('available')</option>
                                    <option value="0" {{ old('availability') == 0 ? 'selected' : '' }}>@lang('not_available')</option>
                                </select>
                                @error('availability')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    @foreach ($services as $key => $service)
                        <div class="form-check">
                            <input
                                type="checkbox"
                                class="form-check-input"
                                name="services[]"
                                value="{{ $service->id }}"
                                id="service{{ $key+1 }}" checked>
                            <label class="form-check-label" for="service{{$key+1}}">
                                {{ $service->name }}
                            </label>
                        </div>
                    @endforeach

                    <!-- Quill Editor for Description -->
                    <div class="form-group">
                        <label for="description">@lang('description')</label>
                        <div id="editor" class="form-control @error('description') is-invalid @enderror"></div>
                        <input type="hidden" name="description" id="description">
                        @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">@lang('submit')</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <x-admin.alert />
@endsection

@section('customJs')
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>

    <script>
        const quill = new Quill('#editor', {
            theme: 'snow',
            placeholder: '@lang('write_description_here')', // Placeholder text (optional)
            modules: {
                toolbar: [
                    [{ 'header': '1' }, { 'header': '2' }, { 'font': [] }],
                    [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                    ['bold', 'italic', 'underline'],
                    [{ 'align': [] }],
                    ['link'],
                    ['image'],
                    ['blockquote']
                ]
            }
        });

        const form = document.querySelector('#carForm');
        form.addEventListener('submit', function() {
            const description = document.querySelector('#description');
            description.value = quill.root.innerHTML;

            console.log("description: ", description);
        });
    </script>
@endsection
