@extends('admin.master')

@section('module','Hotel Type')
@section('action','Update')


@section('content')
<!-- Default box -->
<div class="card">
    <div   div class="card-header">
        <h3 class="card-title">Hotel Type Update</h3>

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
    <form method="post" action="{{ route('admin.hoteltype.update')}}">
        @csrf

        <div class="form-group">
            <label>Hotel type</label>
            <select class="form-control">
                <option value="0">5 star</option>
                <option value="0">4 star</option>
                <option value="0">3 star</option>
                <option value="0">2 star</option>
                <option value="0">1 star</option>
            </select>
        </div>

    </form>
</div>
<div class="card-footer">
    <button type="submit" class="btn btn-primary">update</button>
</div>
<!-- /.card -->
@endsection
