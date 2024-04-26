@extends('client.master')
@section('content')
<section class="breadcrumb-area bread-bg-7">
    <div class="breadcrumb-wrap">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="breadcrumb-content">
                        <div class="section-heading">
                            <h2 class="sec__title text-white">Hotel Details</h2>
                        </div>
                    </div><!-- end breadcrumb-content -->
                </div><!-- end col-lg-6 -->
                <div class="col-lg-6">
                    <div class="breadcrumb-list text-right">
                        <ul class="list-items">
                            <li><a href="{{route('client.index')}}">Home</a></li>
                            <li>Hotel Details</li>
                        </ul>
                    </div><!-- end breadcrumb-list -->
                </div><!-- end col-lg-6 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end breadcrumb-wrap -->
</section>
<section class="tour-detail-area " style="color:#807b7b">
   <!-- end single-content-navbar-wrap -->
   <div class="single-content-box">
      <div class="container">
         <div class="row" style="margin-left:-150px; text-align:center">
            <div class="col-lg-8">
               <div class="single-content-wrap padding-top-60px">
                  <div id="description" class="page-scroll">
                        @foreach ($hoteldetail as $item)
                         <img src="{{asset('uploads/'.$item->image) }}" style="width: 500px">
                     <div class="single-content-item pb-4">
                            <h3 class="title font-size-26" style="margin-top:20px ">{{$item->name}}</h3>
                               <div class="d-flex align-items-center pt-2">
                           <p class="mr-2" style="margin-left:120px">{{$item->address}}<span class="badge badge-warning text-white font-size-16" style="margin-left: 10px">{{$item->star_number}} Star</span>
                           </p>

                        </div>
                     </div>
                     <div class="single-content-item ">
                       <h3 class="title font-size-20">About the {{$item->name}}</h3>
                        <p class="py-3">{{$item->description}} </p>
                     </div>
                     <!-- end single-content-item -->
                     <div class="section-block"></div>
                  </div>
                  @endforeach
                  <div class="single-content-item" >
                       <div class="row" style="margin-left: -30px">
                            <section class="card-area section">
                                <h3 class="title font-size-30" >Room</h3>
                                <div class="container" style="width: 800px">
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
                                                <div class="row" id="table_id" style="width: 115%">
                                                    @foreach ($room as $item)
                                                    <div class="col-lg-12 item" >
                                                        <div class="card-item card-item-list room-card" style="height: 330px">
                                                            <div class="card-img-carousel carousel-action carousel--action" >
                                                                <div class="card-img" >
                                                                    <a href="{{route('client.roomdetail',['id'=>$item->id])}}" class="d-block">
                                                                        <img src="{{asset('uploads/'.$item->image) }}" alt="hotel-img" style="width:300px;padding:10px;text-decoration:none;color:black ">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="card-price pb-2">
                                                                    <p>
                                                                        <span class="price__num">{{number_format($item->price)}} VND</span>
                                                                    </p>
                                                                </div>
                                                                <h3 class="card-title font-size-26"><a href="{{route('client.roomdetail',['id'=>$item->id])}}" style="text-decoration:none;color:black">{{$item->name}}</a></h3>
                                                                <p class="card-text pt-2">{{$item->description}}</p>
                                                                <div class="card-attributes pt-3 pb-4">
                                                                    <ul class="d-flex align-items-center">
                                                                        <li class="d-flex align-items-center"><i class="la la-bed"></i><span>Big Beds</span></li>
                                                                        <li class="d-flex align-items-center"><i class="la la-building"></i><span>24 ft<sup>2</sup></span></li>
                                                                        <li class="d-flex align-items-center"><i class="la la-bathtub"></i><span>2 Bathrooms</span></li>
                                                                    </ul>
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
                                                            <span>  <span class="sr-only"></span></span>
                                                        </li>
                                                                    <!--	Here the JS Function Will Add the Rows -->
                                                        <li data-page="next" id="prev">
                                                            <span>  <span class="sr-only"></span></span>
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
                       </div>
                       <!-- end row -->
                 </div>
                  <!-- end location-map -->
               </div>
               <!-- end single-content-wrap -->
            </div>
            <!-- end col-lg-8 -->
            <div class="col-lg-4">
               <div class="sidebar single-content-sidebar mb-0">
                  <div class="sidebar-widget single-content-widget" style="width: 500px;margin-top:156px">
                  <div id="amenities" class="page-scroll">
                    <h3 class="title font-size-30">Service</h3>

                    <div class="row">
                        <div class="col-lg-6 responsive-column">
                            <div class="single-tour-feature d-flex align-items-center mb-3">
                                <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                    <i class="la la-wifi"></i>
                                </div>
                                <div class="single-feature-titles">
                                    <h3 class="title font-size-15 font-weight-medium">WI-FI</h3>
                                </div>
                            </div><!-- end single-tour-feature -->
                        </div><!-- end col-lg-4 -->
                        <div class="col-lg-6 responsive-column">
                            <div class="single-tour-feature d-flex align-items-center mb-3">
                                <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                    <i class="la la-check"></i>
                                </div>
                                <div class="single-feature-titles">
                                    <h3 class="title font-size-15 font-weight-medium">Swimming Pool</h3>
                                </div>
                            </div><!-- end single-tour-feature -->
                        </div><!-- end col-lg-4 -->
                        <div class="col-lg-6 responsive-column">
                            <div class="single-tour-feature d-flex align-items-center mb-3">
                                <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                    <i class="la la-television"></i>
                                </div>
                                <div class="single-feature-titles">
                                    <h3 class="title font-size-15 font-weight-medium">Television</h3>
                                </div>
                            </div><!-- end single-tour-feature -->
                        </div><!-- end col-lg-4 -->
                        <div class="col-lg-6 responsive-column">
                            <div class="single-tour-feature d-flex align-items-center mb-3">
                                <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                    <i class="la la-coffee"></i>
                                </div>
                                <div class="single-feature-titles">
                                    <h3 class="title font-size-15 font-weight-medium">Coffee</h3>
                                </div>
                            </div><!-- end single-tour-feature -->
                        </div><!-- end col-lg-4 -->
                        <div class="col-lg-6 responsive-column">
                            <div class="single-tour-feature d-flex align-items-center mb-3">
                                <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                    <i class="la la-tree"></i>
                                </div>
                                <div class="single-feature-titles">
                                    <h3 class="title font-size-15 font-weight-medium">Air Conditioning</h3>
                                </div>
                            </div><!-- end single-tour-feature -->
                        </div><!-- end col-lg-4 -->
                        <div class="col-lg-6 responsive-column">
                            <div class="single-tour-feature d-flex align-items-center mb-3">
                                <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                    <i class="la la-gear"></i>
                                </div>
                                <div class="single-feature-titles">
                                    <h3 class="title font-size-15 font-weight-medium">Fitness Facility</h3>
                                </div>
                            </div><!-- end single-tour-feature -->
                        </div><!-- end col-lg-4 -->
                        <div class="col-lg-6 responsive-column">
                            <div class="single-tour-feature d-flex align-items-center mb-3">
                                <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                    <i class="la la-check"></i>
                                </div>
                                <div class="single-feature-titles">
                                    <h3 class="title font-size-15 font-weight-medium">Fridge</h3>
                                </div>
                            </div><!-- end single-tour-feature -->
                        </div><!-- end col-lg-4 -->
                        <div class="col-lg-6 responsive-column">
                            <div class="single-tour-feature d-flex align-items-center mb-3">
                                <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                    <i class="la la-glass"></i>
                                </div>
                                <div class="single-feature-titles">
                                    <h3 class="title font-size-15 font-weight-medium">Wine Bar</h3>
                                </div>
                            </div><!-- end single-tour-feature -->
                        </div><!-- end col-lg-4 -->
                        <div class="col-lg-6 responsive-column">
                            <div class="single-tour-feature d-flex align-items-center mb-3">
                                <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                    <i class="la la-music"></i>
                                </div>
                                <div class="single-feature-titles">
                                    <h3 class="title font-size-15 font-weight-medium">Entertainment</h3>
                                </div>
                            </div><!-- end single-tour-feature -->
                        </div><!-- end col-lg-4 -->
                        <div class="col-lg-6 responsive-column">
                            <div class="single-tour-feature d-flex align-items-center mb-3">
                                <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                    <i class="la la-lock"></i>
                                </div>
                                <div class="single-feature-titles">
                                    <h3 class="title font-size-15 font-weight-medium">Secure Vault</h3>
                                </div>
                            </div><!-- end single-tour-feature -->
                        </div><!-- end col-lg-4 -->
                         <div class="col-lg-6 responsive-column">
                            <div class="single-tour-feature d-flex align-items-center mb-3">
                                <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                    <i class="la la-car"></i>
                                </div>
                                <div class="single-feature-titles">
                                    <h3 class="title font-size-15 font-weight-medium">Pick And Drop</h3>
                                </div>
                            </div><!-- end single-tour-feature -->
                        </div><!-- end col-lg-4 -->
                        <div class="col-lg-6 responsive-column">
                            <div class="single-tour-feature d-flex align-items-center mb-3">
                                <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                    <i class="la la-check"></i>
                                </div>
                                <div class="single-feature-titles">
                                    <h3 class="title font-size-15 font-weight-medium">Room Service</h3>
                                </div>
                            </div><!-- end single-tour-feature -->
                        </div><!-- end col-lg-4 -->
                        <div class="col-lg-6 responsive-column">
                            <div class="single-tour-feature d-flex align-items-center mb-3">
                                <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                    <i class="la la-check-circle"></i>
                                </div>
                                <div class="single-feature-titles">
                                    <h3 class="title font-size-15 font-weight-medium">Pets Allowed</h3>
                                </div>
                            </div><!-- end single-tour-feature -->
                        </div><!-- end col-lg-4 -->
                        <div class="col-lg-6 responsive-column">
                            <div class="single-tour-feature d-flex align-items-center mb-3">
                                <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                    <i class="la la-coffee"></i>
                                </div>
                                <div class="single-feature-titles">
                                    <h3 class="title font-size-15 font-weight-medium">Breakfast</h3>
                                </div>
                            </div><!-- end single-tour-feature -->
                        </div><!-- end col-lg-4 -->
                        <div class="col-lg-6 responsive-column">
                            <div class="single-tour-feature d-flex align-items-center mb-3">
                                <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                    <i class="la la-car"></i>
                                </div>
                                <div class="single-feature-titles">
                                    <h3 class="title font-size-15 font-weight-medium">Free Parking</h3>
                                </div>
                            </div><!-- end single-tour-feature -->
                        </div><!-- end col-lg-4 -->

                        <div class="col-lg-4 responsive-column">
                            <div class="single-tour-feature d-flex align-items-center mb-3">
                                <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                    <i class="la la-building"></i>
                                </div>
                                <div class="single-feature-titles">
                                    <h3 class="title font-size-15 font-weight-medium">Elevator In Building</h3>
                                </div>
                            </div><!-- end single-tour-feature -->
                        </div><!-- end col-lg-4 -->
                    </div><!-- end row -->
                     <!-- end single-content-item -->
                     <div class="section-block"></div>
                  </div>

                  </div>
               </div>
               <!-- end sidebar -->
               <div class="sidebar-widget single-content-widget" style="width: 500px">>
                <h3 class="title stroke-shape">Why Book With Us?</h3>
                <div class="sidebar-list">
                    <ul class="list-items">
                        <li><i class="la la-dollar icon-element mr-2"></i>No-hassle best price guarantee</li>
                        <li><i class="la la-microphone icon-element mr-2"></i>Customer care available 24/7</li>
                        <li><i class="la la-thumbs-up icon-element mr-2"></i>Hand-picked Tours & Activities</li>
                        <li><i class="la la-file-text icon-element mr-2"></i>Free Travel Insureance</li>
                    </ul>
                </div><!-- end sidebar-list -->
            </div><!-- end sidebar-widget -->
            <div class="sidebar-widget single-content-widget" style="width: 500px">>
                <h3 class="title stroke-shape">Get a Question?</h3>
                <p class="font-size-14 line-height-24">Do not hesitate to give us a call. We are an expert team and we are happy to talk to you.</p>
                <div class="sidebar-list pt-3">
                    <ul class="list-items">
                        <li><i class="la la-phone icon-element mr-2"></i><a href="#">+ 61 23 8093 3400</a></li>
                        <li><i class="la la-envelope icon-element mr-2"></i><a href="mailto:info@trizen.com">info@trizen.com</a></li>
                    </ul>
                </div><!-- end sidebar-list -->
            </div><!-- end sidebar-widget -->
            </div>
            <!-- end col-lg-4 -->

         </div>
         <!-- end row -->

      </div>
      <!-- end container -->

    <section
    class="hotel-area section-bg   overflow-hidden"
    >
    <div class="container">
       <div class="row">
          <div class="col-lg-12">
             <div class="section-heading text-center">
                <h2 class="sec__title line-height-55">
                   Related Hotel  <br />
                   You Might Like
                </h2>
             </div>
          </div>
       </div>
       <div class="row padding-top-50px">
          <div class="col-lg-12" style="margin-bottom: 20px">
             <div class="hotel-card-wrap">

                <div class="hotel-card-carousel-2 carousel-action">
                   @foreach ($hotelrelated as $item)
                   @if ($noOtherHotelsAvailable == false)
                   <div class="card-item">
                    <div class="card-img">
                       <a href="{{route('client.detail',['id'=>$item->id])}}" class="d-block">
                       <img src="{{asset('uploads/'.$item->image) }}" alt="hotel-img" />
                       </a>
                       <span class="badge">{{$item->star_number}} star</span>

                    </div>
                    <div class="card-body">
                       <h3 class="card-title">
                          <a href="{{route('client.detail',['id'=>$item->id])}}" style="text-decoration:none;color:black">{{$item->name}}</a
                             >
                       </h3>
                       <p class="card-meta">{{$item->address}}</p>
                       <div class="card-rating">
                          <span class="badge text-white">{{$item ->star_number}} Star</span>

                       </div>
                       <div
                          class="card-price d-flex align-items-center justify-content-between"
                          >
                          <a href="{{route('client.detail',['id'=>$item->id])}}" class="btn-text" style="text-decoration:none;color:black"
                             >See details<i class="la la-angle-right"></i></a>
                       </div>
                    </div>
                 </div>
                 @else
                 <p>No other hotels available.</p>
                   @endif

                   @endforeach
                </div>
                <!-- end hotel-card-carousel -->
             </div>
          </div>
          <!-- end col-lg-12 -->
       </div>
       <!-- end row -->
    </div>
    <!-- end container-fluid -->
 </section>
</div>
   </div>
   <!-- end single-content-box -->
</section>
@endsection
