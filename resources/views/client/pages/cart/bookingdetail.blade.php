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
        @foreach ($bookingdetail as $item)
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-box">
                        <div class="form-title-wrap">
                            <h3 class="title">Order Detail Lists</h3>
                        </div>
                        <div class="form-content1 pb-2" >
                            <div class="card-item card-item-list card-item--list" style="margin: 20px">
                                <div class="card-img "style="margin: 20px">
                                    <img src="{{asset('uploads/'.$item->room->image)}}" alt="hotel-img" style="width: 500px" >
                                    <ul class="list-items list-items-2 list-items-flush">

                                        <li><span>Hotel Ordered:</span>{{$item->room->hotel->name}}</li>
                                        <li><span>Room Ordered:</span>{{$item->room->name}}</li>
                                        <li><span>check_in:</span>{{$item->check_in}}</li>
                                        <li><span>check_out:</span>{{$item->check_out}}</li>
                                        <li><span>Arrival Time:</span>{{$item->check_in}}</li>
                                    </ul>
                                </div>
                                    <ul class="list-items list-items-2 list-items-flush" style="margin: 20px">
                                        <li><strong><span>ORDER CODE:</span>{{$item->Booking->ordercode}}</strong></li>
                                        <li><span>Customer Name:</span>{{$item->booking->fullname}}</li>
                                        <li><span>Customer Email:</span>{{$item->booking->email}}</li>
                                        <li><span>Customer Phone:</span>{{$item->booking->phone}}</li>
                                        <li><span>Customer Address:</span>{{$item->booking->address}}</li>
                                        <li><span>Total Cost:</span>{{$item->booking->cart_total}}</li>
                                        <li><span>Booking Date:</span>{{$item->created_at}}</li>
                                        <li><span>Payment Method:</span> Local Payment</li>
                                    </ul>
                                </div>
                            </div><!-- end card-item -->

                        </div>


                    </div><!-- end form-box -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
            <div class="border-top mt-5"></div>
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="copy-right padding-top-30px">
                        <p class="copy__desc">
                            &copy; Copyright Trizen 2020. Made with
                            <span class="la la-heart"></span> by <a href="https://themeforest.net/user/techydevs/portfolio">TechyDevs</a>
                        </p>
                    </div><!-- end copy-right -->
                </div><!-- end col-lg-7 -->
                <div class="col-lg-5">
                    <div class="copy-right-content text-right padding-top-30px">
                        <ul class="social-profile">
                            <li><a href="#"><i class="lab la-facebook-f"></i></a></li>
                            <li><a href="#"><i class="lab la-twitter"></i></a></li>
                            <li><a href="#"><i class="lab la-instagram"></i></a></li>
                            <li><a href="#"><i class="lab la-linkedin-in"></i></a></li>
                        </ul>
                    </div><!-- end copy-right-content -->
                </div><!-- end col-lg-5 -->
            </div><!-- end row -->
        </div><!-- end container-fluid -->
    </div><!-- end dashboard-main-content -->
    @endforeach
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
