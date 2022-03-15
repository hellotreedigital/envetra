<?php use \App\Http\Controllers\GeneralController; ?>
@include('header')
<!-- START REVOLUTION SLIDER 5.0 -->
<div class="slide-tmargin" id="home">
    <div id="main-demo" class="owl-carousel home-slider">
        @foreach ($homeSlides as $slide)
        <div class="item">
            <img src="{{Voyager::image($slide->image)}}" alt="{{$slide->colored_title}}">
            <div style="" class="caption-slider">
                <h1><span>{{$slide->colored_title}}</span> {{$slide->title}}</h1>
            </div>
        </div>
        @endforeach
    </div>
    <!-- END REVOLUTION SLIDER WRAPPER -->
    <div id="section01" class="demo">
        <a href="#about-us"><span></span></a>
    </div>
    <a href="#contact" class="fixed-button-slider">{{GeneralController::getTitle('contact-us','title')}}</a>
</div>

<div class="clearfix"></div>
<!-- END OF SLIDER WRAPPER -->

<!-- ABOUT US SECTION -->
<div class="parallax vertical-align" data-parallax-bg-image="{{Voyager::image(GeneralController::getGeneral('about-us','featured_image'))}}"
    data-parallax-speed="0.9" data-parallax-direction="down" id="about-us">
    <div class="parallax-overlay bg-opacity">
        <div class="container sec-tpadding-4 sec-bpadding-4">
            <div class="row">
                <div class="col-md-8 col-sm-12 col-xs-12 nopadding">
                    <div class="ce-feature-box-13">
                        <div class="img-box">
                            <div class="overlay">
                                <div class="text-box min-hei-2 about-section">
                                    <div class="text-box-inner">
                                        <div class="col-sm-12 nopadding">
                                            <div class="sec-title-container less-padding-4 text-left about-us-section">
                                                <!-- <h5 class="font-weight-4 less-mar-1 line-height-4 text-primary opacity-9">About</h5> -->
                                                <h2 class="font-weight-6 less-mar-1 line-height-5">{{GeneralController::getGeneral('about-us','title')}}</h2>
                                                <div class="ce-title-line align-left"></div>
                                                <h5 class="font-weight-6 less-mar-1 line-custom-1 abt-last-line" style="max-width: 500px;">
                                                    {{GeneralController::getGeneral('about-us','description')}}
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <img src="{{Voyager::image(GeneralController::getGeneral('about-us','featured_image'))}}"
                                alt="{{GeneralController::getGeneral('about-us','title')}}" class="img-responsive" />
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12 nopadding">
                    <div class="ce-feature-box-11 margin-bottom">
                        <div class="text-box min-hei-2 text-box-upper" style="position: relative;">
                            <h6 class="font-weight-6 less-mar-1 line-custom-1 about-text">
                                {!!GeneralController::getGeneral('about-us','content')!!}
                            </h6>
                        </div>
                    </div>
                </div>
                <!--end item-->

            </div>
        </div>
    </div>
</div>
<!-- end about us section -->

<!-- TEAM SECTION -->
<div class="clearfix"></div>
<section class="section-light" id="team">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="sec-title-container text-center section-no-padtop">
                    <h5 class="font-weight-4 less-mar-1 line-height-4 text-primary opacity-9" style="text-transform:uppercase">{{GeneralController::getTitle('the-team','title')}}</h5>
                    <h2 class="font-weight-6 less-mar-1 line-height-5">{{GeneralController::getTitle('the-team','subtitle')}}</h2>
                    <div class="ce-title-line"></div>
                </div>
            </div>
            <div class="clearfix"></div>
            <!--end title-->
            <div class="container">

                <div class="row">

                    @foreach ($teamMembers as $k=>$teamMember)
                    <div class="col-md-4 col-sm-6 col-xs-12 margin-bottom">
                        <div class="ce-feature-box-6">
                            <div class="main-box">
                                <div class="img-box">
                                    <div class="overlay">
                                        <!--<p class="small-text text-center">-->
                                            {!! $teamMember->description !!}
                                        <!--</p>-->
                                    </div>
                                    <img src="{{Voyager::image($teamMember->image)}}" alt="{{$teamMember->full_name}}"
                                        class="img-responsive" />
                                </div>
                                <div class="text-box text-center">
                                    <h5 class="nopadding title">{{$teamMember->full_name}}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end item-->
                    <?php if (($k+1) % 3 == 0){ echo "<div class='clearfix'></div>"; }?>
                    @endforeach

                </div>
            </div>
        </div>
</section>
<!-- <div class="clearfix"></div> -->
<!-- end section -->
<!-- end team section -->

<!-- SERVICES SECTION -->
<div class="clearfix"></div>
<div class="col-sm-12" id="services">
    <div class="sec-title-container text-center sec-tpadding-4 section-no-padtop">
        <h5 class="font-weight-4 less-mar-1 line-height-4 text-primary opacity-9" style="text-transform:uppercase;">{{GeneralController::getTitle('services','title')}}</h5>
        <h2 class="font-weight-6 less-mar-1 line-height-5">{{GeneralController::getTitle('services','subtitle')}}</h2>
        <div class="ce-title-line"></div>
    </div>
</div>
<div class="services-all">
    <section class="sec-tpadding-4 sec-bpadding less-padding section-bgimg-6" style="background: url({{Voyager::image(GeneralController::getGeneral('services-bg-image','featured_image'))}}) center center repeat;background-attachment: fixed;background-position: center;background-repeat: no-repeat;background-size: cover;">
        <div class="container">
            <div class="row">
                
                @foreach ($services as $service)
                <div class="col-md-6 vitals" style="padding-bottom: 6px;">
                    <div class="ce-feature-box-12">
                        <div class="img"><img src="{{Voyager::image($service->image)}}" alt="{{$service->title}}" class="img-responsive"></div>
                        <div class="clearfix"></div>
                        <br><br>
                        <h2 class="title">{{$service->title}}</h2>
                        <a class="service-toggle btn btn-white btn-custom btn-round uppercase vitals" data-toggle="collapse"
                            href="#{{$service->slug}}" role="button" aria-expanded="false" aria-controls="vitals">{{GeneralController::getTitle('read-more','title')}}</a>
                    </div>
                </div>
                <!--end item-->
                @endforeach


            </div>
        </div>
    </section>
    <div class="clearfix"></div>
    <!-- end section -->

    <section>
        <div class="container-fluid">
            <div class="row section-primary">

                @foreach ($services as $service)
                @if ($service->have_icons == 0)
                <div class="collapse appear-section" id="{{$service->slug}}">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" style="padding:40px 0;">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 col-lg-12 col-xl-12">
                                    <h5>{!! strip_tags($service->content,'<br>') !!}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 sec-bpadding-4" style="padding-top:40px;background: #fff;position: relative;">
                        <a class="btn btn-custom btn-round uppercase close-section read-less" href="#">{{GeneralController::getTitle('read-less','title')}}</a>
                    </div>
                </div>
                @else
                <?php $serviceIcons = GeneralController::getServiceIcon($service->id); ?>
                <div class="collapse appear-section bg-white" id="{{$service->slug}}">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 bg-white">
                        <div class="row">
                            <?php $flag = true; ?>
                            @foreach ($serviceIcons as $icon)
                            <div class="col-md-5 col-sm-12 <?= ($flag) ? 'white-bg' : 'grey-bg' ?>">
                                <div class="caption">
                                    <img src="{{Voyager::image($icon->image)}}" alt="{{$service->title}}" class="img-responsive">
                                    <h5>{{$icon->description}}</h5>
                                </div>
                            </div>
                            <?php ($flag == true) ? $flag = false : $flag = true; ?>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 sec-bpadding-4" style="padding-top:40px;background: #fff;position: relative;">
                        <a class="btn btn-custom btn-round uppercase close-section read-less" href="#">{{GeneralController::getTitle('read-less','title')}}</a>
                    </div>
                </div>
                @endif
                @endforeach
                
            </div>
        </div>
    </section>
</div>
<!-- End SERVICES section -->

<!-- PARTNERS SECTION -->
<section class="section-light" style="padding-top: 40px;" id="partners">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="sec-title-container text-center section-no-padtop">
                    <h5 class="font-weight-4 less-mar-1 line-height-4 text-primary opacity-9" style="text-transform: uppercase;">{{GeneralController::getTitle('partners','title')}}</h5>
                    <h2 class="font-weight-6 less-mar-1 line-height-5">{{GeneralController::getTitle('partners','subtitle')}}</h2>
                    <div class="ce-title-line"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="clearfix"></div>
<section class="section-primary">
    <div class="container">
        <div class="divider-line solid light opacity-1"></div>
        <div class="row">
            <div class="col-md-12 slide-controls-2">
                <div id="owl-demo5" class="owl-carousel">

                    @foreach ($brands as $brand)
                    <div class="item">
                        @if ($brand->url != '')
                        <a href="{{$brand->url}}" target="_blank" title="{{$brand->title}}">
                            <img src="{{Voyager::image($brand->logo)}}" alt="{{$brand->title}}">
                        </a>
                        @else
                        <img src="{{Voyager::image($brand->logo)}}" alt="{{$brand->title}}">
                        @endif
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>
<div class="clearfix"></div>
<!-- end partners section -->

<!-- TESTIMONIALS SECTION -->
<section class="section-light" style="padding-top: 40px;" id="testimonials">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="sec-title-container text-center section-no-padtop">
                    <h5 class="font-weight-4 less-mar-1 line-height-4 text-primary opacity-9" style="text-transform: uppercase;">{{GeneralController::getTitle('testimonials','title')}}</h5>
                    <h2 class="font-weight-6 less-mar-1 line-height-5">{{GeneralController::getTitle('testimonials','subtitle')}}</h2>
                    <div class="ce-title-line"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="clearfix"></div>
<!-- end section -->

<div class="parallax vertical-align" data-parallax-speed="0.9" data-parallax-direction="down">
    <div class="parallax-overlay primary  bg-testimonials" style="background: url({{Voyager::image(GeneralController::getGeneral('testimonials-bg-image','featured_image'))}}) center center repeat;    background-color: rgba(245, 30, 70, 0.9);background-attachment: fixed;background-position: center;background-repeat: no-repeat;background-size: cover;">
        <div class="container sec-tpadding-4 sec-bpadding-4">
            <div class="row slide-controls-4">

                <div id="owl-demo3" class="owl-carousel owl-theme">
                    @foreach ($testimonials as $k=>$testi)
                    <div class="item  testimonial-item" style="padding:15px;">
                        {{-- <div class="col-md-4"> --}}
                            <div class="ce-feature-box-15">
                                <div class="text-box-right" style="display: flex;align-items: center;">
                                    <img src="{{Voyager::image($testi->image)}}" alt="{{$testi->first_name}} {{$testi->last_name}}" class="img-responsive" style="object-fit: cover;max-width: 30%;width: 60px;height: 60px;border-radius: 50%;margin-right: 20px;" />
                                    <div>
                                        <h5 class="less-mar-1">{{$testi->first_name}}</h5>
                                        <p><span class="text-primary">{{$testi->last_name}}</span></p>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <br />
                                <p class="testimonial">{{$testi->content}}</p>
                            </div>
                            {{-- </div> --}}
                        <!--end item-->
                    </div>
                    @endforeach

                </div>
                <!--end carousel-->

            </div>
        </div>
    </div>

</div>
<div class="clearfix"></div>
<!-- end testimonials section -->

<!-- CONTACT US SECTION -->
<div class="parallax vertical-align" id="contact">
    <div class="parallax-overlay bg-opacity">
        <div class="container sec-tpadding-4 sec-bpadding-4">
            <div class="row row-eq-height">
                <div class="col-lg-6 col-sm-12 col-xs-12 nopadding">
                    <div class="ce-feature-box-13">
                        <div class="img-box">
                            <div class="overlay"></div>
                            <img src="{{Voyager::image(GeneralController::getGeneral('contact-us','featured_image'))}}"
                                alt="" class="img-responsive" style="object-fit: cover;" />
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12 col-xs-12 nopadding">
                    <div class="ce-feature-box-11 margin-bottom mb-100">
                        <div class="text-box min-hei-2">
                            <div class="text-box-inner">
                                <div class="col-sm-12 nopadding contact-information">
                                    <div class="sec-title-container less-padding-4 text-left contact-us-section" style="padding-top: 0;">
                                        <h5 class="font-weight-4 less-mar-1 line-height-4 text-primary opacity-9">
                                            {{GeneralController::getGeneral('contact-us','title')}}
                                        </h5>
                                        <h2 class="font-weight-6 less-mar-1 line-height-5">
                                            {{GeneralController::getGeneral('contact-us','subtitle')}}
                                        </h2>
                                        <div class="ce-title-line align-left"></div>
                                    </div>
                                    <h6 class="contact-info">{{GeneralController::getGeneral('contact-us','description')}}</h6>
                                    <h6 class="contact-info">{{GeneralController::getGeneral('phone-number','title')}}
                                        <a href="tel:{{GeneralController::getGeneral('phone-number','subtitle')}}">{{GeneralController::getGeneral('phone-number','subtitle')}}</a></h6>
                                    <h6 class="contact-info" style="margin-bottom: 10px;">{{GeneralController::getGeneral('e-mail-address','title')}}
                                        <a href="mailto:{{GeneralController::getGeneral('e-mail-address','subtitle')}}">{{GeneralController::getGeneral('e-mail-address','subtitle')}}</a></h6>
                                </div>
                                <div class="clearfix"></div>
                                <!--end title-->
                            <form   action="" class="contact-form"  method="post">
                                @csrf
                                <input type="hidden" name="g-recaptcha-response" value"">
                                <div class="form-body bg-light">
                                    <div class="row">
                                        <div class="col-12"><p class="m-0  text-center text-success sucess" ></div>
                                        <div class="col-lg-6 col-sm-12 col-xs-12 position-relative" style="padding: 0 5px;">  <p class="text-danger error er-fname">&nbsp;</p>
                                            <input id="fname" class="input-1" type="text" placeholder="First Name" name="fname">
                                           
                                        </div>
                                        <div class="col-lg-6 position-relative col-sm-12 col-xs-12" style="padding: 0 5px;">   <p class="text-danger error er-lname">&nbsp;</p>
                                            <input id="lname" class="input-1" type="text" placeholder="Last Name" name="lname">
                                                
                                        </div>
                                    </div>
                                    <!-- end row -->

                                    <div class="row">
                                        <div class="col-md-12 position-relative  col-sm-12 col-xs-12" style="padding: 0 5px;">   <p class="text-danger error er-email">&nbsp;</p>
                                            <input id="email" class="input-1" type="text" placeholder="E-mail Address"
                                                name="email">
                                                    
                                        </div>
                                    </div>
                                    <!-- end row -->


                                    <div class="row">
                                        <div class="col-md-12 position-relative col-sm-12 col-xs-12" style="padding: 0 5px;">   <p class="text-danger error er-phone">&nbsp;</p>
                                            <input id="phone" class="input-1" type="text" placeholder="Phone Number"
                                                name="phone">
                                                   
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12 position-relative  col-sm-12 col-xs-12" style="padding: 0 5px;">    <p class="text-danger error er-subject">&nbsp;</p>
                                            <input id="subject" class="input-1" type="text" placeholder="Subject" name="subject">
                                              
                                        </div>
                                    </div>
                                    <!-- end row -->

                                    <div class="row">
                                        <div class="col-md-12 position-relative col-sm-12 col-xs-12" style="padding: 0 5px;">
                                               <p class="text-danger error er-msg">&nbsp;</p>
                                            <textarea id="comment" class="textaria-1" placeholder="Type your message here"
                                                name="message"></textarea>
                                                   
                                        </div>
                                    </div>
                                    <!-- end row -->

                                    <div class="row"> <br />
                                        <div class="col-md-6 position-relative  col-sm-12 col-xs-12 text-center form-btn-section">
                                            <button class="btn btn-prim btn-round btn-custom2 uppercase" type="submit">Submit</button>
                                        </div>
                                        <div class="col-md-6  position-relative col-sm-12 col-xs-12 text-center social-icons">
                                            <div class="social">
                                                <a target="_blank" href="{{GeneralController::getGeneral('facebook-url','subtitle')}}"
                                                    class="fa fa-facebook"></a>
                                                <a target="_blank" href="{{GeneralController::getGeneral('instagram-url','subtitle')}}"
                                                    class="fa fa-instagram"></a>
                                                <a target="_blank" href="{{GeneralController::getGeneral('linkedin-url','subtitle')}}"
                                                    class="fa fa-linkedin"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end row -->
                                </div>
                          </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end item-->

            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<!-- end contact us section -->

@include('footer')
