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
    <form method="post" action="{{ route('admin.roomservice.edit')}}">
        @csrf
        <div class="form-group">
            <label>Room type</label>
            <select class="form-control">
                <option value="0">Single Room</option>
                <option value="0">Couple Room</option>
                <option value="0">family Room</option>
            </select>
        </div>
        <div class="form-group">
            <label>Room service name</label>
            <input type="text" class="form-control"  placeholder="Enter Hotel room service name">
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
