@extends('layouts.admin')

@section('content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Edit Profile') }}</h1>

    <!-- Page Content -->
    <form method="post" action="{{ route('admin.profile.update', app()->getLocale()), $user->id }}" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="row">
            <div class="col-sm-9">
                <!-- Flash Message -->
                @include('includes.flash-message')

                <div class="form-group">
                    <label>{{ __('Name') }}</label><span class="star"> * </span>
                    <input type="text" name="name" class="form-control" placeholder="{{ __('Enter name') }}" value="{{ old('name', $user->name) }}" required >
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label>{{ __('Email') }}</label><span class="star"> * </span>
                    <input type="email" name="email" class="form-control" placeholder="{{ __('Enter email') }}" value="{{ old('email', $user->email) }}" required >
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label>{{ __('Role') }}</label><span class="star"> * </span>
                    <input type="text" name="role" class="form-control" value="{{ old('role', $user->role->name) ?? '' }}" readonly >
                    @if ($errors->has('role'))
                        <span class="help-block">
                            <strong>{{ $errors->first('role') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label>{{ __('Picture') }}</label>
                    <input type="file" name="path" class="form-control" >
                    @if ($errors->has('path'))
                        <span class="help-block">
                            <strong>{{ $errors->first('path') }}</strong>
                        </span>
                    @endif
                </div>

                <hr>
                <div class="form-group{{ $errors->has('password' ? ' has-error' : '') }}">
                    <label>{{ __('Password') }}</label>
                    <input type="password" name="password" class="form-control" >
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label>{{ __('Confirm Password') }}</label>
                    <input type="password" name="password_confirmation" class="form-control" >
                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-outline-primary" value="{{ __('Save') }}">
                    <a class="btn btn-dark" href="{{ url()->previous() }}">{{ __('Back') }}</a>
                </div>
            </div>
            <div class="col-sm-3">
                <img class="img-fluid img-thumbnail" src="{{ $user->photo ? asset('img/'.$user->photo->path) : asset('img/undraw_posting_photo.svg') }}">
            </div>
        </div>

    </form>
@endsection
