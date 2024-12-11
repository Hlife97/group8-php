@extends('layouts.admin')

@section('title', 'Settings')

@section('content')
    <div class="container-fluid">

        <h1 class="h3 mb-4 text-gray-800">@lang('settings')</h1>

        <div class="card shadow mb-4">
            <form action="{{route('admin.setting.update')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="container mt-4">
                    <div class="row">
                        <!-- Title -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title">@lang('Title')</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                       id="title" name="title" value="{{ old('title', $settings->title ?? '') }}">
                                @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Company Name -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="company_name">@lang('Company Name')</label>
                                <input type="text" class="form-control @error('company_name') is-invalid @enderror"
                                       id="company_name" name="company_name" value="{{ old('company_name', $settings->company_name ?? '') }}">
                                @error('company_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Description -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description">@lang('Description')</label>
                                <textarea class="form-control @error('description') is-invalid @enderror"
                                          id="description" name="description">{{ old('description', $settings->description ?? '') }}</textarea>
                                @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Phone -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">@lang('Phone')</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                       id="phone" name="phone" value="{{ old('phone', $settings->phone ?? '') }}">
                                @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">@lang('Email')</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                       id="email" name="email" value="{{ old('email', $settings->email ?? '') }}">
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Address -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="address">@lang('Address')</label>
                                <textarea class="form-control @error('address') is-invalid @enderror"
                                          id="address" name="address">{{ old('address', $settings->address ?? '') }}</textarea>
                                @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Meta Title -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="meta_title">@lang('Meta Title')</label>
                                <input type="text" class="form-control @error('meta_title') is-invalid @enderror"
                                       id="meta_title" name="meta_title" value="{{ old('meta_title', $settings->meta_title ?? '') }}">
                                @error('meta_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Meta Description -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="meta_description">@lang('Meta Description')</label>
                                <input type="text" class="form-control @error('meta_description') is-invalid @enderror"
                                       id="meta_description" name="meta_description" value="{{ old('meta_description', $settings->meta_description ?? '') }}">
                                @error('meta_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Meta Keywords -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="meta_keywords">@lang('Meta Keywords')</label>
                                <input type="text" class="form-control @error('meta_keywords') is-invalid @enderror"
                                       id="meta_keywords" name="meta_keywords" value="{{ old('meta_keywords', $settings->meta_keywords ?? '') }}">
                                @error('meta_keywords')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- About Description -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="about_description">@lang('About Description')</label>
                                <textarea class="form-control @error('about_description') is-invalid @enderror"
                                          id="about_description" name="about_description">{{ old('about_description', $settings->about_description ?? '') }}</textarea>
                                @error('about_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- About Image -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="about_image">@lang('About Image')</label>
                                <input type="file" class="form-control @error('about_image') is-invalid @enderror"
                                       id="about_image" name="about_image">
                                @error('about_image')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="breadcrumb_image">@lang('Breadcrumb Image')</label>
                                <input type="file" class="form-control @error('breadcrumb_image') is-invalid @enderror"
                                       id="breadcrumb_image" name="breadcrumb_image">
                                @error('breadcrumb_image')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="slider_image">@lang('Slider Image')</label>
                                <input type="file" class="form-control @error('slider_image') is-invalid @enderror"
                                       id="about_image" name="slider_image">
                                @error('slider_image')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <!-- WhatsApp -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="whatsapp">@lang('WhatsApp')</label>
                                <input type="text" class="form-control @error('whatsapp') is-invalid @enderror"
                                       id="whatsapp" name="whatsapp" value="{{ old('whatsapp', $settings->whatsapp ?? '') }}">
                                @error('whatsapp')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Twitter -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="twitter">@lang('Twitter')</label>
                                <input type="text" class="form-control @error('twitter') is-invalid @enderror"
                                       id="twitter" name="twitter" value="{{ old('twitter', $settings->twitter ?? '') }}">
                                @error('twitter')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Facebook -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="facebook">@lang('Facebook')</label>
                                <input type="text" class="form-control @error('facebook') is-invalid @enderror"
                                       id="facebook" name="facebook" value="{{ old('facebook', $settings->facebook ?? '') }}">
                                @error('facebook')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Instagram -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="instagram">@lang('Instagram')</label>
                                <input type="text" class="form-control @error('instagram') is-invalid @enderror"
                                       id="instagram" name="instagram" value="{{ old('instagram', $settings->instagram ?? '') }}">
                                @error('instagram')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Google Map -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="google_map">@lang('Google Map')</label>
                                <input type="text" class="form-control @error('google_map') is-invalid @enderror"
                                       id="google_map" name="google_map" value="{{ old('google_map', $settings->google_map ?? '') }}">
                                @error('google_map')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">@lang('Submit')</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <x-admin.alert />
@endsection

