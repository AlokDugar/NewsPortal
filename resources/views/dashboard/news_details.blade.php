@extends('layouts.dashboard')
@push('css')
<style>
    .tag-container {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
    }

    .tag-pill {
        display: inline-block;
        padding: 8px 12px;
        border-radius: 20px;
        background-color: #f1f1f1;
        color: #333;
        cursor: pointer;
        transition: 0.3s;
    }

    .tag-pill.active {
        background-color: rgb(255, 98, 0);
        color: white;
    }
</style>
@endpush
@section('content')
    <div class="page-body">
        <div class="container-fluid">
        <div class="page-title">
            <div class="row">
            <div class="col-sm-6">
                <h3>Create News Article</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">NewsPortal</a></li>
                <li class="breadcrumb-item">News</li>
                <li class="breadcrumb-item active"> News Details</li>
                </ol>
            </div>
            </div>
        </div>
        </div>

      <!-- News Creation Form -->
      <div class="container-fluid px-0">
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-body">
                <form>
                  <div class="mb-3">
                    <label for="title" class="form-label">शीर्षक *</label>
                    <input type="text" class="form-control" id="title" placeholder="Start off your News by writing an engaging title">
                  </div>

                  <div class="mb-3">
                    <label class="form-label">तस्वीर *</label>
                    <div class="d-lg-flex d-md-flex d-sm-flex align-items-center">
                        <div class="p-image">
                            <img class="img-100 square profile-pic" alt="" src="">
                            <div class="icon-wrapper">
                                <i class="fas fa-plus" onclick="document.getElementById('profile_image').click();"></i>
                                <input class="file-upload" id="profile_image" type="file" name="image_path" accept="image/*" style="display:none;" />
                          </div>
                        </div>
                    </div>
                  </div>

                  <div class="mb-3">
                    <label class="form-label">वर्गीकरण *</label>
                    <select class="js-example-basic-multiple col-sm-12" multiple="multiple" name="categories[]">
                        @foreach ($cats as $cat)
                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                        @endforeach
                    </select>
                    <button type="button" id="add-category" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#createCategoryModal">Add Category</button>
                  </div>

                  <div class="mb-3">
                    <label class="form-label">प्रकार *</label>
                    <div class="tag-container" id="types-container">
                        @foreach ($types as $type)
                            <span class="tag-pill">
                                {{$type->name}}
                                <input type="hidden" name="types[]" value="{{$type->id}}">
                            </span>
                        @endforeach
                    </div>
                    <button type="button" id="add-type" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#createTypeModal">Add Type</button>
                  </div>

                  <div class="mb-3">
                    <label for="author" class="form-label">लेखक</label>
                    <input type="text" class="form-control" id="author" placeholder="Author">
                  </div>
                  <div class="mb-3">
                    <label for="publisher" class="form-label">प्रकाशक</label>
                    <input type="text" class="form-control" id="publisher" placeholder="Publisher">
                  </div>

                  <div class="mb-3">
                    <label for="state" class="form-label">स्थिति</label>
                    <select class="form-select" id="state">
                      <option>Select State</option>
                      <option>Published</option>
                      <option>Unpublished</option>
                    </select>
                  </div>

                  <div class="mb-3">
                    <label class="form-label">विवरण सामग्री</label>
                    <div class="rich-text-editor border p-2">
                      <p>This is an interactive text editor that allows you to format text styles like bold, italics, underline, font color and size, alignment, etc.right here.</p>
                    </div>
                  </div>

                  <div class="text-end mt-4">
                    <button type="button" class="btn btn-secondary me-2">Cancel</button>
                    <button type="submit" class="btn btn-primary">नयाँ पत्रकारिता</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="createCategoryModal" tabindex="-1" aria-labelledby="createCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createCategoryModalLabel">Create Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('categories.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Category Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>

                        <div class="mb-3">
                            <label for="url" class="form-label">URL</label>
                            <input type="text" class="form-control" id="url" name="url" required>
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" name="status" id="status" required>
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Create Category</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
      <div class="modal fade" id="createTypeModal" tabindex="-1" aria-labelledby="createTypeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createTypeModalLabel">Create Type</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('types.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="typeName" class="form-label">Type Name</label>
                            <input type="text" class="form-control" id="typeName" name="name" required>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="allowDelete" name="allow_delete" value="1" checked>
                            <label class="form-check-label" for="allowDelete">Allow Delete</label>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Create Type</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
        document.querySelectorAll(".tag-pill").forEach(tag => {
        tag.addEventListener("click", function () {
            document.querySelectorAll(".tag-pill").forEach(t => t.classList.remove("active"));
            this.classList.add("active");
            });
        });
    </script>
@endsection
@push('scripts')

    <script src="assets/vendor/libs/select2/js/select2.full.min.js"></script>
    <script src="assets/vendor/libs/select2/js/select2-custom.js"></script>

@endpush
