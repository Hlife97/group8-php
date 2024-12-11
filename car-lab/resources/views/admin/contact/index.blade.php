@extends('layouts.admin')

@section('title', 'Contact Messages')

@section('content')
    <div class="container-fluid">

        <h1 class="h3 mb-4 text-gray-800">@lang('messages') @lang('list')</h1>

        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>@lang('name')</th>
                            <th>@lang('email')</th>
                            <th>@lang('subject')</th>
                            <th>@lang('message')</th>
                            <th>@lang('status')</th>
                            <th>@lang('action')</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>@lang('name')</th>
                            <th>@lang('email')</th>
                            <th>@lang('subject')</th>
                            <th>@lang('message')</th>
                            <th>@lang('status')</th>
                            <th>@lang('action')</th>
                        </tr>
                        </tfoot>
                        <tbody>
                            @foreach($contacts as $message)
                                <tr>
                                    <td>{{$message->name}}</td>
                                    <td>{{$message->email}}</td>
                                    <td>{{$message->subject}}</td>
                                    <td>{{$message->message}}</td>
                                    <td>
                                        @if($message->status)
                                            <span class="badge badge-pill badge-success">Oxundu</span>
                                        @else
                                            <span class="badge badge-pill badge-danger">Oxunmadı</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if(!$message->status)
                                            <a href="{{route('admin.contact.read', ['id' => $message->id])}}" class="btn btn-success" onclick="confirm('Are You Sure To Update?')">Change Status</a>
                                        @endif
                                        <a href="{{route('admin.contact.destroy', ['id' => $message->id])}}" class="btn btn-danger" onclick="confirm('Are You Sure To Delete?')">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
