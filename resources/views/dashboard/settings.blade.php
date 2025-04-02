@extends('layouts.dashboard')

@section('content')

<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show d-flex align-items-center justify-content-between" role="alert">
                    <span>{{ session('success') }}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="row">
                <div class="col-sm-6">
                    <h3>General Settings</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">NewsPortal</a></li>
                        <li class="breadcrumb-item active">General Settings</li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">


                            <form action="{{route('settings.update')}}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label>Website Name</label>
                                    <input type="text" name="website_name" class="form-control" value="{{ $settings->website_name ?? '' }}" required>
                                </div>

                                <div class="form-group">
                                    <label>Website URL</label>
                                    <input type="url" name="website_url" class="form-control" value="{{ $settings->website_url ?? '' }}" required>
                                </div>

                                <div class="form-group">
                                    <label>Logo</label>
                                    <input type="file" name="logo" class="form-control">
                                    @if($settings && $settings->logo)
                                        <img src="{{ asset('storage/' . $settings->logo) }}" height="80" class="mt-2">
                                    @endif
                                </div>

                                <button type="submit" class="btn btn-primary mt-3">Save Settings</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection

