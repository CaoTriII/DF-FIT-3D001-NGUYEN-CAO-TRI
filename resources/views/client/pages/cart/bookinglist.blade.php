@extends('admin.master')

@section('module','Users')
@section('action','Booking List')

@push('handlejs')
<script>
    function confirmDelete() {
        return confirm('Are you sure you want to delete this Room?')
    }
</script>
@endpush
@section('content')

<div class="card form-content2">
    <div   div class="form-content1">
        <h3 class="card-title p-3">Booking List</h3>
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
      <div class="dashboard-main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-box">
                        <div class="form-title-wrap">
                            <div class="d-flex align-items-center justify-content-between">
                                <h3 class="title">Booking Results</h3>
                            </div>
                        </div>
                        @foreach ($bookingdetails as $item)
                        <div class="form-content1 pb-2">
                            <div class="card-item card-item-list card-item--list">
                                <div class="card-img">
                                    <img src="{{asset('uploads/'.$item->room->image)}}" alt="hotel-img">
                                </div>
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <h3 class="card-title">{{$item->room->name}}</h3>
                                    </div>
                                   <ul class="list-items list-items-2 pt-2 pb-3">
                                       <li><span>Arrival time:</span>{{$item->check_in}}</li>
                                       <li><span>Start date:</span>{{$item->check_in}}</li>
                                       <li><span>End date:</span>{{$item->check_out}}</li>
                                       <li><span>Booking room:</span>{{$item->quantity}} room</li>
                                       <li><span>Booked Customer:</span>{{$item->booking->fullname}}</li>
                                   </ul>
                                    <div class="btn-box">
                                        <a href="{{route('bookingdetail',['id'=>$item->id])}}" class="theme-btn theme-btn-small theme-btn-transparent">See detail</a>
                                    </div>
                                </div>
                            </div><!-- end card-item -->

                        </div>
                        @endforeach
                    </div><!-- end form-box -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
            <div class="row">
                <div class="col-lg-12">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link page-link-nav" href="#" aria-label="Previous">
                                    <span aria-hidden="true"><i class="la la-angle-left"></i></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link page-link-nav" href="#">1</a></li>
                            <li class="page-item active">
                                <a class="page-link page-link-nav" href="#">2 <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="page-item"><a class="page-link page-link-nav" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link page-link-nav" href="#" aria-label="Next">
                                    <span aria-hidden="true"><i class="la la-angle-right"></i></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="border-top mt-5"></div>

        </div><!-- end container-fluid -->
    </div><!-- end dashboard-main-content -->

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
<!-- /.card -->

@endsection
