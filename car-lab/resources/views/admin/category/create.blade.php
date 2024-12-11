@extends('layouts.admin')

@section('title', 'Category-Create')

@section('content')
    <div class="container-fluid">

        <h1 class="h3 mb-4 text-gray-800">@lang('categories') @lang('list')</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="{{route('admin.categories.index')}}" class="btn btn-info">@lang('list')</a>
            </div>

            <form action="{{route('admin.categories.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="container mt-4">
                    <h2>@lang('create_category')</h2>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name_az">@lang('name az')</label>
                                <input type="text" class="form-control @error('name[az]') is-invalid @enderror"
                                       id="name_az" name="name[az]" value="{{ old('name[az]') }}" >
                                @error('name[az]')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name_en">@lang('name en')</label>
                                <input type="text" class="form-control @error('name[en]') is-invalid @enderror"
                                       id="name_en" name="name[en]" value="{{ old('name[en]') }}" >
                                @error('name[en]')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">@lang('status')</label>
                                <select name="status" class="form-control">
                                    <option value="1" selected>Active</option>
                                    <option value="0">Passive</option>
                                </select>
                                @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
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
