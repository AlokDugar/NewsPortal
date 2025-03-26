@extends('layouts.dashboard')

@section('content')
<div class="page-body">
    <div class="container-fluid">
      <div class="page-title">
        <div class="row">
          <div class="col-sm-6">
            <h3>Types</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{url('/')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Types</li>
            </ol>
          </div>
        </div>
      </div>
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
                <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Types Table</h4>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createCategoryModal">
                        Create Type
                    </button>
                </div>
                <div class="modal fade" id="createCategoryModal" tabindex="-1" aria-labelledby="createCategoryModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="createCategoryModalLabel">Create Type</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('types.store') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="typeName" class="form-label">Type Name</label>
                                        <input type="text" class="form-control" id="typeName" name="name" required>
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
              <div class="card-body">
                <div class="dt-ext table-responsive theme-scrollbar">
                  <table class="display keytable">
                    <thead>
                      <tr>
                        <th>Type Name</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($types as $type)
                        <tr>
                          <td>{{$type->name}}</td>
                          <td>
                            <ul class="action">
                                <li class="edit">
                                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#editTypeModal{{ $type->id }}">
                                        <i data-feather="edit"></i>
                                    </a>
                                </li>
                                <li class="delete">
                                    <a href="javascript:void(0);" class="delete-btn" data-id="{{ $type->id }}">
                                        <i data-feather="trash-2"></i>
                                    </a>
                                </li>
                            </ul>
                        </td>
@foreach ($types as $type)
<div class="modal fade" id="editTypeModal{{ $type->id }}" tabindex="-1" aria-labelledby="editTypeModalLabel{{ $type->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editTypeModalLabel{{ $type->id }}">Edit Type</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('types.update', $type->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="typeName" class="form-label">Type Name</label>
                        <input type="text" class="form-control" id="typeName" name="name" value="{{ $type->name }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
</div>

<script>
    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', function(e) {
            const typeId = e.currentTarget.getAttribute('data-id');
            if (typeId === '1' || typeId === '2') {
            Swal.fire({
                title: 'Deletion not allowed!',
                text: "This type isn't allowed to be deleted.",
                icon: 'error',
                confirmButtonText: 'OK'
            });
            return;
        }
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: 'Deleted!',
                        text: '{{ session("success") }}',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.action = '/types/' + typeId;

                    const methodField = document.createElement('input');
                    methodField.type = 'hidden';
                    methodField.name = '_method';
                    methodField.value = 'DELETE';
                    form.appendChild(methodField);

                    const csrfToken = document.createElement('input');
                    csrfToken.type = 'hidden';
                    csrfToken.name = '_token';
                    csrfToken.value = '{{ csrf_token() }}';
                    form.appendChild(csrfToken);
                    document.body.appendChild(form);
                    form.submit();
                }
            });
        }
        });
    });
});
</script>

@endsection
