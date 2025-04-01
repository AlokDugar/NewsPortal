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
                <h3>Edit News Article</h3>
            </div>
            </div>
        </div>
        </div>

      <div class="container-fluid px-0">
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-body">
                <form action="{{route('news.update', $newsDetails->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                  <div class="mb-3">
                    <label for="title" class="form-label">शीर्षक *</label>
                    <input type="text" class="form-control" name="title" id="title" value="{{ $newsDetails->title}}" placeholder="Start off your News by writing an engaging title">
                  </div>

                  <div class="mb-3">
                    <label class="form-label">तस्वीर *</label>
                    <div class="d-lg-flex d-md-flex d-sm-flex align-items-center">
                        <div class="p-image">
                            <img class="img-100 square profile-pic" src="{{ $newsDetails->image_path ? asset('storage/news_images/' . basename($newsDetails->image_path)) : ''}}" alt="News Image">
                            <div class="icon-wrapper">
                                <i class="fas fa-plus" onclick="document.getElementById('profile_image').click();"></i>
                                <input class="file-upload" id="profile_image" type="file" name="image_path" accept="image/*" style="display:none;" />
                            </div>
                        </div>
                    </div>
                  </div>

                  <div class="mb-3">
                    <label class="form-label">वर्गीकरण *</label>
                    <select class="js-example-basic-multiple col-sm-12" multiple="multiple" name="category_ids[]">
                        @foreach ($cats as $cat)
                            <option value="{{ $cat->id }}"
                                    {{ in_array($cat->id, old('category_ids', $newsDetails->categories->pluck('id')->toArray())) ? 'selected' : '' }}>
                                {{ $cat->name }}
                            </option>
                        @endforeach
                    </select>
                    <button type="button" id="add-category" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#createCategoryModal">Add Category</button>
                  </div>

                  <div class="mb-3">
                    <label class="form-label">प्रकार *</label>
                    <div class="tag-container" id="types-container">
                        @foreach ($types as $type)
                            <span class="tag-pill {{ $newsDetails->type_id == $type->id ? 'active' : '' }}"
                                  data-type-id="{{ $type->id }}">
                                <input type="radio" name="type_id" value="{{ $type->id }}" id="type-{{ $type->id }}" class="form-check-input visually-hidden">
                                <label for="type-{{ $type->id }}" class="form-check-label">{{ $type->name }}</label>
                            </span>
                        @endforeach
                    </div>
                    <button type="button" id="add-type" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#createTypeModal">Add Type</button>
                  </div>


                  <div class="mb-3">
                    <label for="author" class="form-label">लेखक</label>
                    <input type="text" class="form-control" name="author" id="author" value="{{$newsDetails->author}}" placeholder="Author">
                  </div>
                  <div class="mb-3">
                    <label for="publisher" class="form-label">प्रकाशक</label>
                    <input type="text" class="form-control" name="publisher" id="publisher" value="{{$newsDetails->author}}" placeholder="Publisher">
                  </div>

                  <div class="mb-3">
                    <label for="state" class="form-label">स्थिति</label>
                    <select class="form-select" name="state" id="state">
                      <option>Select State</option>
                      <option value="Published" {{$newsDetails->state=="Published"?'selected':''}}>Published</option>
                      <option value="Unpublished" {{$newsDetails->state=="Unpublished"?'selected':''}}>Unpublished</option>
                    </select>
                  </div>

                  <div class="mb-3">
                    <label for="article-content" class="form-label">विवरण सामग्री</label>
                    <textarea name="content" id="editor" class="ckeditor rich-text-editor border p-2">{{$newsDetails->content}}</textarea>
                  </div>

                  <div class="text-end mt-4">
                    <button type="button" class="btn btn-secondary me-2" onclick="window.location='{{ route('news.index') }}'">
                        Cancel
                    </button>
                    <button type="submit" class="btn btn-primary">Update</button>
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
@endsection
@push('scripts')
    <script>
        document.querySelectorAll(".tag-pill").forEach(tag => {
        tag.addEventListener("click", function () {
            document.querySelectorAll(".tag-pill").forEach(t => t.classList.remove("active"));
            this.classList.add("active");
            });
        });
    </script>
    <script src="assets/vendor/libs/select2/js/select2.full.min.js"></script>
    <script src="assets/vendor/libs/select2/js/select2-custom.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
        .create(document.querySelector('#editor'),
        {
            ckfinder:
            {
                uploadUrl:"{{route('news.upload',['_token'=>csrf_token()])}}",
            }
        })
        .catch(error=>{
            console.error(error);
        });
    </script>


@endpush
