@extends('layouts.dashboard')

@section('content')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h3>News Details</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">NewsPortal</a></li>
                        <li class="breadcrumb-item active">News</li>
                        <li class="breadcrumb-item active">Details</li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header pb-0">
                            <h4 class="mb-0">News Details Table</h4>
                        </div>
                        <div class="card-body">
                            <div class="dt-ext table-responsive theme-scrollbar">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Image</th>
                                            <th>Type</th>
                                            <th>Categories</th>
                                            <th>Author</th>
                                            <th>Publisher</th>
                                            <th>State</th>
                                            <th>Content</th>
                                            <th>Created At</th>
                                            <th>Updated At</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($newsDetails as $news)
                                            <tr>
                                                <td>{{ $news->title }}</td>
                                                <td>
                                                    <img src="{{ asset('storage/' . $news->image_path) }}" alt="News Image" width="100" height="100">
                                                </td>
                                                <td>{{ $news->type->name ?? 'N/A' }}</td>
                                                <td>
                                                    {{ implode(', ', $news->categories->pluck('name')->toArray()) }}
                                                </td>
                                                <td>{{ $news->author }}</td>
                                                <td>{{ $news->state }}</td>
                                                <td>{{ Str::limit($news->content, 50) }}</td> <!-- Limiting content to 50 characters -->
                                                <td>{{ $news->created_at->format('d M Y H:i') }}</td>
                                                <td>{{ $news->updated_at->format('d M Y H:i') }}</td>
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
@endsection
@push('scripts')
<script src="assets/vendor/libs/datatable/datatables/js/jquery.dataTables.min.js"></script>
<script src="assets/vendor/libs/datatable/datatable-extension/js/dataTables.buttons.min.js"></script>
<script src="assets/vendor/libs/datatable/datatable-extension/js/jszip.min.js"></script>
<script src="assets/vendor/libs/datatable/datatable-extension/js/buttons.colVis.min.js"></script>
<script src="assets/vendor/libs/datatable/datatable-extension/js/pdfmake.min.js"></script>
<script src="assets/vendor/libs/datatable/datatable-extension/js/vfs_fonts.js"></script>
<script src="assets/vendor/libs/datatable/datatable-extension/js/dataTables.autoFill.min.js"></script>
<script src="assets/vendor/libs/datatable/datatable-extension/js/dataTables.select.min.js"></script>
<script src="assets/vendor/libs/datatable/datatable-extension/js/buttons.bootstrap4.min.js"></script>
<script src="assets/vendor/libs/datatable/datatable-extension/js/buttons.html5.min.js"></script>
<script src="assets/vendor/libs/datatable/datatable-extension/js/buttons.print.min.js"></script>
<script src="assets/vendor/libs/datatable/datatable-extension/js/dataTables.bootstrap4.min.js"></script>
<script src="assets/vendor/libs/datatable/datatable-extension/js/dataTables.responsive.min.js"></script>
<script src="assets/vendor/libs/datatable/datatable-extension/js/responsive.bootstrap4.min.js"></script>
<script src="assets/vendor/libs/datatable/datatable-extension/js/dataTables.keyTable.min.js"></script>
<script src="assets/vendor/libs/datatable/datatable-extension/js/dataTables.colReorder.min.js"></script>
<script src="assets/vendor/libs/datatable/datatable-extension/js/dataTables.fixedHeader.min.js"></script>
<script src="assets/vendor/libs/datatable/datatable-extension/js/dataTables.rowReorder.min.js"></script>
<script src="assets/vendor/libs/datatable/datatable-extension/js/dataTables.scroller.min.js"></script>
<script src="assets/vendor/libs/datatable/datatable-extension/js/custom.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', function(e) {
            const categoryId = e.currentTarget.getAttribute('data-id');

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
                            form.action = '/categories/' + categoryId;

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
@endpush
