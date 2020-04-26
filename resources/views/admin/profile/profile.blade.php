@extends('layouts.admin')

@section('content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Profile') }}</h1>

    <!-- Page Content -->
    <div class="row">
        <div class="col-sm-9">
            <table class="table table-striped">
              <tbody>
                <tr>
                  <th scope="row">Name:</th>
                  <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <th scope="row">{{ __('Email') }}:</th>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <th scope="row">{{ __('Role') }}:</th>
                    <td>{{ $user->role->name ?? __('No role defined')}}</td>
                </tr>
              </tbody>
            </table>
            <br>
            <br>
            <a class="btn btn-outline-primary" href="{{ route('admin.profile.edit', app()->getLocale()) }}">{{ __('Edit Profile') }}</a>
            <a class="btn btn-dark" href="{{ url()->previous() }}">{{ __('Back') }}</a>
        </div>
        <div class="col-sm-3">
            <img class="img-fluid img-thumbnail" src="{{ $user->photo ? asset('img/'.$user->photo->path) : asset('img/undraw_posting_photo.svg') }}">
        </div>
    </div>

@endsection
