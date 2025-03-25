@extends('layouts.dashboard')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
        <div class="page-title">
            <div class="row">
            <div class="col-sm-6">
                <h3>Edit Profile</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Dashboard</a></li>
                <li class="breadcrumb-item active"> Profile</li>
                </ol>
            </div>
            </div>
        </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
        <div class="edit-profile">
            <div class="row">
            <div class="col-xl-4 col-lg-5">
                <div class="card">
                <div class="card-header pb-0">
                    <h4 class="card-title mb-0">Change Password</h4>
                    <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                </div>
                <div class="card-body">
                    <form  method="POST" action="{{ route('admin.updatePassword') }}">
                        @csrf
                    <div class="row mb-2">
                        <div class="profile-title">
                        <div class="d-lg-flex d-md-flex d-sm-flex align-items-center">
                            <div class="p-image">
                            <img class="img-100 rounded-circle profile-pic" alt="" src="assets/images/user/no-image.jpg">
                            <div class="icon-wrapper">
                                <i class="fas fa-camera upload-button"></i>
                                <input class="file-upload" type="file" accept="image/*"/>
                            </div>
                            </div>
                            <div class="flex-grow-1">
                            <h3 class="mb-1 f-20 txt-primary"> <a href="user-profile.html" class="upload-button">{{Auth::guard('admin')->user()->name}}</a></h3>
                            <p class="f-12 mb-0">ADMIN</p>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label f-w-500">Password</label>
                        <input class="form-control" name='password' type="password" value="">
                    </div>
                    <div class="mb-3">
                        <label class="form-label f-w-500">Confirm Password</label>
                        <input class="form-control" name='password_confirmation' type="password" value="">
                    </div>
                    <div class="form-footer">
                        <button class="btn btn-primary btn-block">Change</button>
                    </div>
                    </form>
                </div>
                </div>
            </div>
            <div class="col-xl-8 col-lg-7">
                <form class="card" method="POST" action="{{ route('admin.updateDetails') }}">
                    @csrf
                <div class="card-header pb-0">
                    <h4 class="card-title mb-0">Edit Profile</h4>
                    <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                </div>
                <div class="card-body">
                    <div class="row">
                    <div class="col-sm-6 col-md-3">
                        <div class="mb-3">
                        <label class="form-label f-w-500">Name</label>
                        <input class="form-control" type="text" name="name" placeholder="{{Auth::guard('admin')->user()->name}}">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="mb-3">
                        <label class="form-label f-w-500">Email address</label>
                        <input class="form-control" type="email" name="email" placeholder="{{Auth::guard('admin')->user()->email}}">
                        </div>
                    </div>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <button class="btn btn-primary" type="submit">Update Profile          </button>
                </div>
                </form>
            </div>
            </div>
        </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
@endsection
