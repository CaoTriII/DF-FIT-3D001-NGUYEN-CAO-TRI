@extends('admin.master')

@section('module','Room')
@section('action','List')
@section('content')
<!-- Default box -->
<div class="form-content1">
    <div >
        <h3 class="card-title">Room List</h3>
        <div >
        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
        </button>
        </div>
    </div>
    <div >
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Room Type</th>
                    <th>Created At</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>single room</td>
                    <td>15/11/2023 - 13:23PM</td>
                    <td><a href="">Edit</a></td>
                    <td><a  href="">Delete</a></td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Room Type</th>
                    <th>Created At</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
    <!-- /.card -->


@endsection
