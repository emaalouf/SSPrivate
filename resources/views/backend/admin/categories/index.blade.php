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
    <div class="container">
        <h2>Notification Form</h2>
        <h6>Room Number: 1</h6>
        <h6>Device Number: 1</h6>

        <form id="notificationForm">
            <label for="headCount">Head Count:</label>
            <input type="number" id="headCount" name="headCount" required><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email"><br>

            <label for="sms">SMS:</label>
            <input type="text" id="sms" name="sms"><br>

            <label for="notificationMethod">Alert Type:</label>
            <select id="notificationMethod" name="notificationMethod" required>
                <option value="email">Send Email</option>
                <option value="sms">Send SMS</option>
                <option value="email+sms">Send SMS & Email</option>
            </select><br>

            <button type="button" onclick="sendNotification()">Submit</button>
        </form>
    </div>

    <script>
        function sendNotification() {
            var headCount = document.getElementById('headCount').value;
            var email = document.getElementById('email').value;
            var sms = document.getElementById('sms').value;
            var notificationMethod = document.getElementById('notificationMethod').value;

            if (headCount >= 10 && notificationMethod === 'email') {
                alert('Sending email notification to specified recipients: ' + email);
                // Add your email notification logic here
            } else if (headCount >= 5 && notificationMethod === 'sms') {
                alert('Sending SMS notification to specified recipients: ' + sms);
                // Add your SMS notification logic here
            } else {
                alert('Notification Send Successfully');
            }
        }
    </script>
@endsection

@section('script')
    <script>
        var route_model_name = "categories";
        var app_table;
        $(function () {
            app_table = $('.data-table').DataTable({
                // DataTable initialization code
            });
        });
    </script>
    @include('backend.admin.layouts.assets.trash_script')
@endsection
