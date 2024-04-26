@extends('client.master')

@section('content')
<section class="breadcrumb-area bread-bg-10">
    <div class="breadcrumb-wrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-content text-center">
                        <div class="section-heading">
                            <h2 class="sec__title text-white">Room List</h2>
                        </div>
                    </div><!-- end breadcrumb-content -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end breadcrumb-wrap -->

</section>
<section class="card-area section--padding">
    <div class="container">
        <div class="tab-content" id="may-tabContent4">
            <div class="container">
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
                <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                    <div class="row" id="table_id">
                        @foreach ($room as $item)
                        <div class="col-lg-12 item">
                            <div class="card-item card-item-list room-card">
                                <div class="card-img-carousel carousel-action carousel--action">
                                    <div class="card-img">
                                        <a href="{{route('client.roomdetail',['id'=>$item->id])}}" class="d-block">
                                            <img src="{{$item->image}}" alt="hotel-img">
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="card-price pb-2">
                                        <p>
                                            <span class="price__num">{{$item->price}} VND</span>
                                        </p>
                                    </div>
                                    <h3 class="card-title font-size-26"><a href="{{route('client.roomdetail',['id'=>$item->id])}}">{{$item->name}} Room</a></h3>
                                    <p class="card-text pt-2">{{$item->description}}</p>
                                    <div class="card-attributes pt-3 pb-4">
                                        <ul class="d-flex align-items-center">
                                            <li class="d-flex align-items-center"><i class="la la-bed"></i><span>2 Beds</span></li>
                                            <li class="d-flex align-items-center"><i class="la la-building"></i><span>24 ft<sup>2</sup></span></li>
                                            <li class="d-flex align-items-center"><i class="la la-bathtub"></i><span>2 Bathrooms</span></li>
                                        </ul>
                                    </div>
                                    <div class="card-btn">
                                        <a href="{{route('client.roomdetail',['id'=>$item->id])}}" class="theme-btn theme-btn-transparent">See Now</a>
                                    </div>
                                </div>
                            </div><!-- end card-item -->
                        </div><!-- end col-lg-12 -->
                        @endforeach
                    </div><!-- end row -->
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

            </div> <!-- 		End of Container -->
        </div>
            <!--		Start Pagination -->

    </div><!-- end container -->
</section>

@endsection
