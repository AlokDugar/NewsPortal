@extends('layouts.dashboard')
@section('content')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h3>News Types</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">NewsPortal</a></li>
                        <li class="breadcrumb-item active">News</li>
                        <li class="breadcrumb-item active">News Types</li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <!-- Total Articles Card -->
                <div class="col-lg-4 col-sm-12 box-col-12">
                    <div class="card">
                        <div class="card-header pb-0">
                            <h4>Total Articles</h4>
                        </div>
                        <div class="card-body">
                            <h5>{{ $totalCount }}</h5>
                        </div>
                    </div>
                </div>

                <!-- Published Articles Card -->
                <div class="col-lg-4 col-sm-12 box-col-12">
                    <div class="card">
                        <div class="card-header pb-0">
                            <h4>Published Articles</h4>
                        </div>
                        <div class="card-body">
                            <h5>{{ $publishedCount }}</h5>
                            <div class="progress mt-2">
                                <div class="progress-bar bg-success" role="progressbar" style="width: {{ $totalCount > 0 ? ($publishedCount / $totalCount) * 100 : 0 }}%;" aria-valuenow="{{ $publishedCount }}" aria-valuemin="0" aria-valuemax="{{ $totalCount }}"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Unpublished Articles Card -->
                <div class="col-lg-4 col-sm-12 box-col-12">
                    <div class="card">
                        <div class="card-header pb-0">
                            <h4>Unpublished Articles</h4>
                        </div>
                        <div class="card-body">
                            <h5>{{ $unpublishedCount }}</h5>
                            <div class="progress mt-2">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: {{ $totalCount > 0 ? ($unpublishedCount / $totalCount) * 100 : 0 }}%;" aria-valuenow="{{ $unpublishedCount }}" aria-valuemin="0" aria-valuemax="{{ $totalCount }}"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Donut Chart -->
                <div class="col-lg-6 col-sm-12 box-col-12">
                    <div class="card">
                        <div class="card-header pb-0">
                            <h4>Donut Color Chart</h4>
                        </div>
                        <div class="card-body chart-block">
                            <div class="flot-chart-container">
                                <canvas id="newsStateChart"></canvas>
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('newsStateChart').getContext('2d');
        var newsStateChart = new Chart(ctx, {
            type: 'doughnut',  // You can change this to 'pie' if you prefer a pie chart
            data: {
                labels: ['Published', 'Unpublished'],
                datasets: [{
                    label: 'News Articles',
                    data: [{{ $publishedCount }}, {{ $unpublishedCount }}],
                    backgroundColor: ['#4caf50', '#f44336'],  // Green for published, Red for unpublished
                    borderColor: ['#ffffff', '#ffffff'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        enabled: true
                    }
                }
            }
        });
    </script>
@endpush
