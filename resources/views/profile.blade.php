@extends('layouts.dashboard')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
        <div class="page-title">
            <div class="row">
            <div class="col-sm-6">
                <h3>My Profile</h3>
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
                <div class="card">
                <div class="card-header pb-0">
                    <h4 class="card-title mb-0">Change Password</h4>
                    <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                </div>
                <div class="card-body">
                    <form class="card" method="POST" action="{{ route('admin.updatePassword') }}" onsubmit="return validateForm()">
                        @csrf
                        <div class="row mb-2">
                            <div class="profile-title">
                            <div class="d-lg-flex d-md-flex d-sm-flex align-items-center">
                                <div class="p-image">
                                <img class="img-100 rounded-circle profile-pic" alt="" src="{{ Auth::guard('admin')->user()->image_path ? asset('storage/' . Auth::guard('admin')->user()->image_path) : 'assets/images/user/no-image.jpg' }}">
                                </div>
                                <div class="flex-grow-1">
                                <h3 class="mb-1 f-20 txt-primary"> <a href="user-profile.html" class="upload-button">{{Auth::guard('admin')->user()->name}}</a></h3>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label f-w-500">Old Password</label>
                            <input class="form-control" id="old_password" name="old_password" type="password" required>
                            <small id="old_password_error" ></small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label f-w-500">New Password</label>
                            <input class="form-control" id="password" name="password" type="password" required>
                            <small id="password_error" class="text-danger"></small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label f-w-500">Confirm Password</label>
                            <input class="form-control" id="password_confirmation" name="password_confirmation" type="password" required>
                            <small id="confirm_password_error" class="text-danger"></small>
                        </div>

                        <div class="card-footer text-center">
                            <button class="btn btn-primary" type="submit" id="submit_button">Update Password</button>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
    const oldPassword = document.getElementById("old_password");
    const oldPasswordError = document.getElementById("old_password_error");

    let timeout = null;

    oldPassword.addEventListener("input", function () {
        clearTimeout(timeout);

        let oldPasswordValue = oldPassword.value;

        if (oldPasswordValue.length > 0) {
            timeout = setTimeout(() => {
                checkOldPassword(oldPasswordValue);
            }, 500);
        } else {
            oldPasswordError.textContent = "";
            oldPasswordError.style.color = "";
        }
    });

    function checkOldPassword(password) {
        fetch("{{ route('admin.checkOldPassword') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify({ old_password: password })
        })
        .then(response => response.json())
        .then(data => {
            if (data.valid) {
                oldPasswordError.textContent = "✔ Old password is correct.";
                oldPasswordError.style.color = "green";
            } else {
                oldPasswordError.textContent = "✘ Old password is incorrect.";
                oldPasswordError.style.color = "red";
            }
        })
        .catch(error => console.error("Error:", error));
    }
});


    </script>

@endsection
