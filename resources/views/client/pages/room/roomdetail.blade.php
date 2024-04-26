@extends('client.master')

@section('content')
<section class="room-detail-bread">
    <div class="full-width-slider carousel-action">
        @foreach($roomdetail->room_image as $image)
        <div class="full-width-slide-item">
                    <img src="{{ asset('uploads/' . $image->images) }}" alt="Room Image" style="height: 350px">
        </div><!-- end full-width-slide-item -->
        @endforeach

    </div><!-- end full-width-slider -->

</section><!-- end room-detail-bread -->

<section class="tour-detail-area padding-bottom-90px">
    <div class="single-content-navbar-wrap menu section-bg" id="single-content-navbar">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="single-content-nav" id="single-content-nav">
                        <ul>
                            <li><a data-scroll="description" href="#description" class="scroll-link "></a></li>
                            <li><a data-scroll="services" href="#services" class="scroll-link"></a></li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end single-content-navbar-wrap -->
    <div class="single-content-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="single-content-wrap padding-top-60px">
                        <div id="description" class="page-scroll">
                            <div class="single-content-item pb-4" style="color:gray">
                                <img src="{{ asset('uploads/' . $image->images) }}" alt="Room Image" style="width:620px">
                                <h3 class="title font-size-26" style="margin-top: 20px">{{ $roomdetail->name }}</h3>
                                <p class="pt-2">{{ number_format($roomdetail->price) }} VND</p>
                                <h3 class="title font-size-20">Description</h3>
                                <p class="py-3" name="description">{{ $roomdetail->description }}</p>
                                <h3 class="title font-size-15 font-weight-medium pb-3">House Rules</h3>
                                <ul class="list-items">
                                    <li><i class="la la-dot-circle mr-2"></i>No smoking, parties or events.</li>
                                    <li><i class="la la-dot-circle mr-2"></i>Check-in time is 2 PM - 4 PM and check-out by 10 AM.</li>
                                </ul>
                            </div><!-- end single-content-item -->

                            <div class="section-block"></div>
                        </div><!-- end description -->
                    </div><!-- end single-content-wrap -->
                </div><!-- end col-lg-8 -->
                <div class="col-lg-4">
                    <div class="sidebar single-content-sidebar mb-0" style="width: 500px">
                        <div class="sidebar-widget single-content-widget">
                            <h3 class="title stroke-shape">Your Reservation</h3>
                            <div class="sidebar-widget-item" >
                                <div class="contact-form-action">
                                    <form action="{{ route('client.addbooking', ['id' => $id, 'quantity' => 1]) }}" method="POST">
                                        @csrf
                                        <!-- Form và các trường nhập liệu cho việc đặt phòng -->
                                        @if(Auth::check())
                                        <div class="btn-box">
                                            <button type="submit" class="theme-btn text-center w-100 mb-2">Book Now</button>
                                        </div>
                                    @else
                                        <p>Please <a href="{{ route('login') }}">Log-in</a> for booking, if you don't have an account <a href="{{ route('user.create') }}">Click here</a> to create.</p>
                                    @endif
                                </form>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="sidebar single-content-sidebar " style="padding-right: 50px">
                                   <div class="sidebar-widget single-content-widget" style="width: 400px;margin-top:130px">
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
                                   <div class="sidebar-widget single-content-widget" style="width: 400px">>
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

                                <div class="sidebar-widget single-content-widget" style="width: 400px">>
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
                                <!-- end sidebar -->



                        </div><!-- end sidebar-widget -->

                        </div>
                    </div><!-- end sidebar -->
                </div><!-- end col-lg-4 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end single-content-box -->

</section>

@endsection
