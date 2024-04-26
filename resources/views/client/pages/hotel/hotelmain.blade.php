@extends('client.master')

@section('content')
<section class="breadcrumb-area bread-bg-7">
    <div class="breadcrumb-wrap">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="breadcrumb-content">
                        <div class="section-heading">
                            <h2 class="sec__title text-white">Hotel List</h2>
                        </div>
                    </div><!-- end breadcrumb-content -->
                </div><!-- end col-lg-6 -->
                <div class="col-lg-6">
                    <div class="breadcrumb-list text-right">
                        <ul class="list-items">
                            <li><a href="{{route('client.index')}}">Home</a></li>
                            <li>Hotel</li>
                            <li>Hotel List</li>
                        </ul>
                    </div><!-- end breadcrumb-list -->
                </div><!-- end col-lg-6 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end breadcrumb-wrap -->
</section>
<section class="card-area section--padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="filter-wrap margin-bottom-30px">
                    <div class="filter-top d-flex align-items-center justify-content-between pb-4">
                        <div>
                        </div>

                    </div><!-- end filter-top -->

                </div><!-- end filter-wrap -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->

        <div class="row">
            <div class="col-lg-4">
                <div class="sidebar mt-0">
                    <div class="sidebar-widget">
                        <h3 class="title stroke-shape">Filter by District</h3>
                        <div class="sidebar-price-range">
                            <div class="main-search-input-item">
                                <div class="form-group" >
                                    <input type="hidden" name="url" data-url="{{ route('processfilter') }}">
                                    <select class="form-control" name="district" >
                                        @php
                                            $district = App\Models\District::orderBy('id','ASC')->get();
                                        @endphp
                                    @foreach ($district as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="sidebar-widget">
                        <h3 class="title stroke-shape">Filter by Rating</h3>
                        <div class="form-group" >
                                <select class="form-control" name="rating" data-url="{{ route('processfilter') }}">

                            @php
                                $hotelrating = App\Models\HotelRating::orderBy('id','ASC')->get();
                            @endphp
                                    @foreach ($hotelrating as $item)
                                        <option value="{{$item->rating}}" >{{$item->name}}</option>
                                    @endforeach
                                </select>
                        </div>
                    </div><!-- end sidebar-widget -->

                </div><!-- end sidebar -->
            </div><!-- end col-lg-4 -->
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
            <div class="col-lg-8 " id="table_id">
                @foreach ($hotel as $item)
                <div class="card-item card-item-list item" >
                    <div class="card-img">
                        <a href="{{route('client.detail',['id'=>$item->id])}}" class="d-block">
                            <img src="{{asset('uploads/'.$item->image) }}" alt="hotel-img" style="height: 200px">
                        </a>
                        <span class="badge" >{{$item->star_number}} Star</span>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title"><a href="{{route('client.detail',['id'=>$item->id])}}" >{{$item->name}} Hotel</a></h3>
                        <p class="card-meta">{{$item->address}}</p>

                        <div class="card-price d-flex align-items-center justify-content-between">

                            <a href="{{route('client.detail',['id'=>$item->id])}}" class="btn-text">See details<i class="la la-angle-right"></i></a>
                        </div>
                    </div>
                </div><!-- end card-item -->
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
            </div><!-- end col-lg-8 -->
        </div><!-- end row -->

    </div><!-- end container -->
</section>
@endsection
