@extends('admin.master')
@section('content')
<div class="card form-content2">
    <div   div class="form-content1">
        <h3 class="card-title p-3">Hotel List</h3>
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
    <div class="form-group" style="display: none">
        <select class  ="form-control" name="state" id="maxRows">
            <option value="5000">show all rows</option>
            <option value="5">5</option>
            <option value="10">10</option>
            <option value="15">15</option>
            <option value="20">20</option>
            <option value="50">50</option>
            <option value="70">70</option>
            <option value="100">100</option>
        </select>
    </div>
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody id="table_id">
            @foreach ($service as $item)
                <tr class="item">
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->description}}</td>
                    <td><a href="">Edit</a></td>
                    <td><a  href="">Delete</a></td>
                </tr>
            @endforeach
        </tbody>
      </table>
      <div class='pagination-container' >
        <nav>
            <ul class="pagination">
                <li data-page="prev" >
                    <span> < <span class="sr-only"></span></span>
                </li>
                            <!--	Here the JS Function Will Add the Rows -->
                <li data-page="next" id="prev">
                    <span> > <span class="sr-only"></span></span>
                </li>
            </ul>
        </nav>
    </div>
    </div>
</div>
@endsection
