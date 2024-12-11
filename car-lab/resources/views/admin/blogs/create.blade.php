@extends('layouts.admin')

@section('title', 'Create Blog')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">@lang('create') @lang('blog')</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="{{ route('admin.blogs.index') }}" class="btn btn-secondary">@lang('back')</a>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Error messages -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Category -->
                    <div class="form-group">
                        <label for="category_id">@lang('category')</label>
                        <select name="category_id" id="category_id" class="form-control" required>
                            <option value="">@lang('select_category')</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                        @if(old('category_id') == $category->id) selected @endif>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Title (Languages) -->
                    <div class="form-group">
                        <label for="title_en">@lang('title') (English)</label>
                        <input type="text" name="title[en]" class="form-control" value="{{ old('title.en') }}" required>
                        @error('title.en')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="title_az">@lang('title') (Azerbaijani)</label>
                        <input type="text" name="title[az]" class="form-control" value="{{ old('title.az') }}" required>
                        @error('title.az')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div class="form-group">
                        <label for="description_en">@lang('description') (English)</label>
                        <textarea name="description[en]" class="form-control" required>{{ old('description.en') }}</textarea>
                        @error('description.en')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description_az">@lang('description') (Azerbaijani)</label>
                        <textarea name="description[az]" class="form-control" required>{{ old('description.az') }}</textarea>
                        @error('description.az')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Slug -->
                    <div class="form-group">
                        <label for="slug">@lang('slug')</label>
                        <input type="text" name="slug" class="form-control" value="{{ old('slug') }}" required>
                        @error('slug')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Image -->
                    <div class="form-group">
                        <label for="image">@lang('image')</label>
                        <input type="file" name="image" class="form-control">
                        @error('image')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Meta Title -->
                    <div class="form-group">
                        <label for="meta_title">@lang('meta_title')</label>
                        <input type="text" name="meta_title" class="form-control" value="{{ old('meta_title') }}">
                        @error('meta_title')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Meta Description -->
                    <div class="form-group">
                        <label for="meta_description">@lang('meta_description')</label>
                        <input type="text" name="meta_description" class="form-control" value="{{ old('meta_description') }}">
                        @error('meta_description')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Meta Keywords -->
                    <div class="form-group">
                        <label for="meta_keywords">@lang('meta_keywords')</label>
                        <input type="text" name="meta_keywords" class="form-control" value="{{ old('meta_keywords') }}">
                        @error('meta_keywords')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Status -->
                    <div class="form-group">
                        <label for="status">@lang('status')</label>
                        <select name="status" class="form-control" required>
                            <option value="1" @if(old('status') == 1) selected @endif>@lang('active')</option>
                            <option value="0" @if(old('status') == 0) selected @endif>@lang('inactive')</option>
                        </select>
                        @error('status')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">@lang('save')</button>
                </form>
            </div>
        </div>
    </div>
@endsection
