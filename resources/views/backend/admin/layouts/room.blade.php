@extends('backend.admin.layouts.app')

@section('meta_title', 'Admin Dashboard')
@section('page_title', 'Dashboard')
@section('page_title_sub', 'Welcome to SafeSense Dashboard')

@section('content')

<div class="room-container">
    <h3 class="text-primary">Room 1</h3>
    <br />

    <div class="tabs">
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="live-map-tab" data-toggle="tab" href="#live-map" role="tab">Live Map</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="headcount-tab" data-toggle="tab" href="#headcount" role="tab">Head Count</a>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade show active" id="live-map" role="tabpanel">
                <!-- Content for the Live Map tab -->
                <div class="content-container">
                    <h3 class="text-success">Live Map</h3>
                    <!-- Add your live map content here -->
                    <div id="live-map-content" class="interactive-content">
                        <!-- Content for the Live Map tab -->
<div class="content-container">
    <h3 class="text-success">Live Map</h3>

    <div id="live-map-content" class="interactive-content">
        <!-- Display thermal images here -->

    </div>
</div>

                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="headcount" role="tabpanel">
                <!-- Content for the Head Count tab -->
                <div class="content-container">
                    <h3 class="text-warning">Realtime Head Count:<span class="badge badge-info">{{ $lastRecord['head_count'] }}</span></h3>
                    <p> Captured Date: {{ $lastRecord['date'] }}</p>
                    <p> Captured Time: {{ $lastRecord['time'] }}</p>
                    <!-- Add your head count content here -->
                    <button class="btn btn-primary" id="refresh-headcount">Refresh Head Count</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Example JavaScript for interactivity
    document.getElementById('refresh-headcount').addEventListener('click', function () {
        // Add logic to refresh head count or perform other actions
        alert('Refreshing Head Count...');
    });
</script>

@endsection
