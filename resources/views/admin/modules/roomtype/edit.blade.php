@extends('admin.master')

@section('module','Room')
@section('action','Create')


@section('content')
<!-- Default box -->
<div class="card">
    <div   div class="card-header">
        <h3 class="card-title">Room create</h3>

        <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
        </button>
        </div>
    </div>
<div class="card-body">
    <form method="post" action="{{ route('admin.roomtype.edit')}}">
        @csrf

        <div class="form-group">
            <label>Room type name</label>
            <input type="text" class="form-control"  placeholder="Enter Hotel room type name">
        </div>
        <div class="form-group">
            <label>Room type description</label>
            <input type="text" class="form-control"  placeholder="Enter Hotel room type description">
        </div>
        <div class="form-group">
            <label>status</label>
            <select class="form-control">
                <option value="1">Show</option>
                <option value="2">Hidden</option>
            </select>
        </div>
    </form>
</div>
<div class="card-footer">
    <button type="submit" class="btn btn-primary">Update</button>
</div>
<!-- /.card -->
@endsection
