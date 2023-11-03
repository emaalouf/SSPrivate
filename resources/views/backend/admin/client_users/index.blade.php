@extends('backend.admin.layouts.app')

@section('meta_title', 'Users')
@section('page_title', 'Users')
@section('page_title_icon')
<i class="metismenu-icon pe-7s-users"></i>
@endsection

@section('page_title_buttons')
<div class="d-flex justify-content-end">
    <div class="custom-control custom-switch p-2 mr-3">
        <input type="checkbox" class="custom-control-input trashswitch" id="trashswitch">
        <label class="custom-control-label" for="trashswitch"><strong>Trash</strong></label>
    </div>

    {{-- @can('add_user') --}}
    <a href="{{route('admin.client-users.create')}}" title="Add User" class="btn btn-primary action-btn">Add User</a>
    {{-- @endcan --}}
</div>
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
          
            </div>
        </div>
    </div>
</div>


@include('backend.admin.layouts.assets.trash_script')
@endsection