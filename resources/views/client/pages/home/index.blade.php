@extends('client.master')
@push('handlejs')
<script>
    const beamsClient = new PusherPushNotifications.Client({
      instanceId: 'bf1e1c7c-24e2-4983-b377-5d906025ab92',
    });

    beamsClient.start()
      .then(() => beamsClient.addDeviceInterest('hello'))
      .then(() => console.log('Successfully registered and subscribed!'))
      .catch(console.error);
  </script>
@endpush
@section('content')
<section class="hero-wrapper hero-wrapper2">
    <div class="hero-box pb-0">
        {{-- <div id="fullscreen-slide-contain">
                <img src="{{asset('clients/images/hero--bg3.jpg') }}" alt="" style="width: 193%" height="100%"/>
          </div> --}}
          <div id="fullscreen-slide-contain">
            <ul class="slides-container">
              <li><img src="{{asset('clients/images/hero-bg2.jpg') }}" alt="" /></li>
              <li><img src="{{asset('clients/images/hero--bg2.jpg') }}" alt="" /></li>
              <li><img src="{{asset('clients/images/hero--bg3.jpg') }}" alt="" /></li>
              <li><img src="{{asset('clients/images/hero-bg5.jpg') }}" alt="" /></li>
              <li><img src="{{asset('clients/images/hero-bg6.jpg') }}" alt="" /></li>

            </ul>
          </div>
      <!-- End background slider -->
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="hero-content pb-5">
              <div class="section-heading">
                <p class="sec__desc pb-2">Hotel stays, Dream getaways</p>
                <h2 class="sec__title">
                  Find the Perfect Place to Stay <br />
                  for Your Next Trip
                </h2>
              </div>
            </div>
            <!-- end hero-content -->
            <div class="search-fields-container">
                <div class="contact-form-action">
                    <form action="{{route('hotelresult')}}" class="row" method="POST">
                        @csrf
                        <input type="hidden" name="url" data-url="{{route('hotelresult')}}">
                        <div class="main-search-input-item">
                            <div class="form-group" style="margin-left: 10px">
                                <label class="label-text">Local</label>
                                <select class="form-control" name="districts" data-url="{{route('hotelresult')}}">
                                    <option value="0">---District---</option>
                                    @php
                                    $district = App\Models\District::orderBy('id','ASC')->get();
                                    @endphp
                                    @foreach ($district as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- end col-lg-3 -->
                        <div class="col-mt-5" style="margin-left: 20px">
                            {{-- <form action="{{route('client.addbooking',['id'=>$id,'quantity'=>1])}}" method="POST">
                                @csrf --}}
                            <div class="row">
                                <div class="col">
                                    <label for="checkin">Check In</label>
                                    <input type="date" id="checkin" name="checkin" class="form-control" style="height: 38px"
                                        data-url="{{route('hotelresult')}}" required>
                                </div>
                                <div class="col">
                                    <label for="checkout">Check Out</label>
                                    <input type="date" id="checkout" name="checkout" class="form-control " style="height: 38px"
                                        data-url="{{route('hotelresult')}}" required>
                                </div>
                            </div>
                            {{-- </form> --}}
                        </div>
                        <div class="col-lg-3" >
                            <div class="input-box">
                                <label class="label-text" style="margin-left: 100px">Guests and Rooms</label>
                                <div class="form-group">
                                    <div class="qty-box d-flex align-items-center justify-content-around">
                                        <label style="margin-left: 100px;margin-right:20px">Rooms</label>
                                        <div class="qtyBtn d-flex align-items-center">
                                            <div class="qtyDec">
                                                <i class="la la-minus"></i>
                                            </div>
                                            <input type="text" name="room_number" value="0" class="qty-input"
                                                data-url="{{route('hotelresult')}}" />
                                            <div class="qtyInc">
                                                <i class="la la-plus"></i>
                                            </div>
                                        </div>
                                        <label style="margin-left: 45px;margin-right:20px">Adults</label>
                                        <div class="qtyBtn d-flex align-items-center">
                                            <div class="qtyDec">
                                                <i class="la la-minus"></i>
                                            </div>
                                            <input type="text" name="adult_number" value="0" />
                                            <div class="qtyInc">
                                                <i class="la la-plus"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end col-lg-3 -->
                    </form>
                    <div class="btn-box pt-2">
                        <a type="submit" data-url="{{route('hotelresult')}}" class="theme-btn" id="search" style="display:none">Search Now</a>
                    </div>
                </div>
            </div>

          </div>
          <!-- end col-lg-12 -->
        </div>
        <!-- end row -->
      </div>
      <!-- end container -->
    </div>
  </section>
    <div class="section-heading text-center">
        <div>
            <br>
            <br>
        </div>
    </div>

    <div id="table_id" class="scrollable-container" style="display: flex;width: 100%;overflow-x: auto;word-wrap: break-word; max-width: none;">




        <!-- Nơi hiển thị kết quả -->
        <div class="col-lg-5" >
            <!-- Nội dung kết quả -->
        </div>
        <!-- Thêm các div khác tương tự cho kết quả khác nếu có -->
    </div>

<section
   class="info-area info-bg info-area2 padding-top-80px padding-bottom-45px"
   >
   <div class="container">
      <div class="row">
         <div class="col-lg-3 responsive-column">
            <div class="icon-box icon-layout-2 d-flex">
               <div class="info-icon flex-shrink-0 bg-rgb text-color-2">
                  <i class="las la-radiation"></i>
               </div>
               <!-- end info-icon-->
               <div class="info-content">
                  <h4 class="info__title">Unique Atmosphere</h4>
                  <p class="info__desc">Varius quam quisque id diam vel quam</p>
               </div>
               <!-- end info-content -->
            </div>
            <!-- end icon-box -->
         </div>
         <!-- end col-lg-3 -->
         <div class="col-lg-3 responsive-column">
            <div class="icon-box icon-layout-2 d-flex">
               <div class="info-icon flex-shrink-0 bg-rgb-2 text-color-3">
                  <i class="la la-tree"></i>
               </div>
               <!-- end info-icon-->
               <div class="info-content">
                  <h4 class="info__title">Environment</h4>
                  <p class="info__desc">Varius quam quisque id diam vel quam</p>
               </div>
               <!-- end info-content -->
            </div>
            <!-- end icon-box -->
         </div>
         <!-- end col-lg-3 -->
         <div class="col-lg-3 responsive-column">
            <div class="icon-box icon-layout-2 d-flex">
               <div class="info-icon flex-shrink-0 bg-rgb-3 text-color-4">
                  <i class="las la-map-marked-alt"></i>
               </div>
               <!-- end info-icon-->
               <div class="info-content">
                  <h4 class="info__title">Great Location</h4>
                  <p class="info__desc">Varius quam quisque id diam vel quam</p>
               </div>
               <!-- end info-content -->
            </div>
            <!-- end icon-box -->
         </div>
         <!-- end col-lg-3 -->
         <div class="col-lg-3 responsive-column">
            <div class="icon-box icon-layout-2 d-flex">
               <div class="info-icon flex-shrink-0 bg-rgb-4 text-color-5">
                  <i class="las la-bed"></i>
               </div>
               <!-- end info-icon-->
               <div class="info-content">
                  <h4 class="info__title">Homey Comfort</h4>
                  <p class="info__desc">Varius quam quisque id diam vel quam</p>
               </div>
               <!-- end info-content -->
            </div>
            <!-- end icon-box -->
         </div>
         <!-- end col-lg-3 -->
      </div>
      <!-- end row -->
   </div>
   <!-- end container -->
</section>
<section class="about-area section--padding overflow-hidden">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="about-content pr-5">
            <div class="section-heading">
              <h4 class="font-size-16 pb-2">Our Story</h4>
              <h2 class="sec__title">Atmosphere and Design</h2>
              <p class="sec__desc pt-4 pb-2">
                It is a long established fact that a reader will be distracted
                by the readable content of a page when looking at its layout.
                The point of using Lorem Ipsum is that it has a more-or-less
                normal distribution of letters
              </p>
              <p class="sec__desc">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. A
                accusamus amet consectetur ipsa officia. Doloremque error
                porro sit soluta totam! A iste nobis vel voluptatem!
              </p>
            </div>
            <!-- end section-heading -->
            <div class="btn-box pt-4">
              <a href="{{route('client.about')}}" class="theme-btn"
                >Read More <i class="la la-arrow-right ml-1"></i
              ></a>
            </div>
          </div>
        </div>
        <!-- end col-lg-6 -->
        <div class="col-lg-6">
          <div class="image-box about-img-box">
            <img
              src="{{asset('clients/images/img5.jpg') }}"
              alt="about-img"
              class="img__item img__item-1"
            />
            <img
              src="{{asset('clients/images/tripadvisor.png') }}"
              alt="about-img"
              class="img__item img__item-2"
            />
          </div>
        </div>
        <!-- end col-lg-6 -->
      </div>
      <!-- end row -->
    </div>
    <!-- end container -->
  </section>

<section
   class="hotel-area section-bg padding-top-100px padding-bottom-200px overflow-hidden"
   >
   <div class="container">
      <div class="row">
         <div class="col-lg-12">
            <div class="section-heading text-center">
               <h2 class="sec__title line-height-55">
                  Popular Hotel Destinations <br />
                  You Might Like
               </h2>
            </div>
         </div>
      </div>
      <div class="row padding-top-50px">
         <div class="col-lg-12" style="margin-bottom: 30px">
            <div class="hotel-card-wrap">
               <div class="hotel-card-carousel-2 carousel-action">
                  @foreach ($hotel as $item)
                  <div class="card-item">
                     <div class="card-img">
                        <a href="{{route('client.detail',['id'=>$item->id])}}" class="d-block">
                            <img src="{{asset('uploads/'.$item->image) }}" alt="" height="180px" >
                        </a>
                        <span class="badge">{{$item->star_number}} star</span>

                     </div>
                     <div class="card-body" style="padding: 60px 30px">
                        <h3 class="card-title" style="font-size: 30px">
                           <a href="{{route('client.detail',['id'=>$item->id])}}" style="text-decoration:none;color:black">{{$item->name}} </a>
                        </h3>
                        <p class="card-meta">{{$item->address}}</p>
                        <div class="card-rating">
                           <span class="badge text-white">{{$item ->star_number}} Star</span>
                        </div>
                        <div class="card-price d-flex align-items-center justify-content-between">
                           <a href="{{route('client.detail',['id'=>$item->id])}}" class="btn-text">See details<i class="la la-angle-right"></i></a>
                        </div>
                     </div>
                  </div>
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
@endsection
