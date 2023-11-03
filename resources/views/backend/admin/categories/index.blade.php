@extends('backend.admin.layouts.app')

@section('meta_title', 'Alerts')
@section('page_title', 'Alerts')
@section('page_title_icon')
    <i class="pe-7s-menu icon-gradient bg-ripe-malin"></i>
@endsection

@section('page_title_buttons')
    <div class="d-flex justify-content-end">
        <div class="custom-control custom-switch p-2 mr-3">
            <input type="checkbox" class="custom-control-input trashswitch" id="trashswitch">
            <label class="custom-control-label" for="trashswitch"><strong>Trash</strong></label>
        </div>

        {{-- @can('add_category') --}}
        <a href="{{ route('admin.categories.create') }}" title="Add Category" class="btn btn-primary action-btn">Add Category</a>
        {{-- @endcan --}}
    </div>
@endsection

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Notification Form</h2>
            </div>
            <div class="card-body">
                <form id="notificationForm">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="minHeadCount">Min Head Count:</label>
                            <input type="number" class="form-control" id="minHeadCount" name="minHeadCount" required min="1">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="maxHeadCount">Max Head Count:</label>
                            <input type="number" class="form-control" id="maxHeadCount" name="maxHeadCount" required min="1">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>

                    <div class="form-group">
                        <label for="sms">SMS:</label>
                        <input type="text" class="form-control" id="sms" name="sms">
                    </div>

                    <div class="form-group">
                        <label for="notificationMethod">Alert Type:</label>
                        <select class="form-control" id="notificationMethod" name="notificationMethod" required>
                            <option value="email">Send Email</option>
                            <option value="sms">Send SMS</option>
                            <option value="email+sms">Send SMS & Email</option>
                        </select>
                    </div>

                    <button type="button" class="btn btn-primary" onclick="sendNotification()">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <script>

function sendNotification() {
    // ... (existing code)

    // AJAX request
    $.ajax({
        type: 'POST',
        url: '{{ route("admin.sendNotification") }}', // Update the route name
        data: {
            minHeadCount: minHeadCount,
            maxHeadCount: maxHeadCount,
            email: email,
            sms: sms,
            notificationMethod: notificationMethod,
        },
        success: function (response) {
            alert('Notification Send Successfully');
        },
        error: function (error) {
            console.error('Error sending notification:', error);
        },
    });
}


        document.addEventListener('DOMContentLoaded', function () {
            function sendNotification() {
                var minHeadCount = document.getElementById('minHeadCount').value;
                var maxHeadCount = document.getElementById('maxHeadCount').value;
                var email = document.getElementById('email').value;
                var sms = document.getElementById('sms').value;
                var notificationMethod = document.getElementById('notificationMethod').value;

                // Your validation logic based on minHeadCount and maxHeadCount here

                alert('Notification Send Successfully');
            }

            var submitBtn = document.getElementById('submitBtn');
            submitBtn.addEventListener('click', sendNotification);
        });
    </script>
@endsection

@section('script')
    <script>
        var route_model_name = "categories";
        var app_table;
        document.addEventListener('DOMContentLoaded', function () {
            app_table = $('.data-table').DataTable({
                // DataTable initialization code
            });
        });
    </script>
    @include('backend.admin.layouts.assets.trash_script')
@endsection
