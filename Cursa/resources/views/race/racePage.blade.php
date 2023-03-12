
@extends('layouts.app')
    @section('template_title')
    racePage
    @endsection

    @section('content')
    <div class="super_container">
        <header class="header" style="display: none;">
            <div class="header_main">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
                            <div class="header_search">
                                <div class="header_search_content">
                                    <div class="header_search_form_container">
                                        <form action="#" class="header_search_form clearfix">
                                            <div class="custom_dropdown">
                                                <div class="custom_dropdown_list"> <span class="custom_dropdown_placeholder clc">All Categories</span> <i class="fas fa-chevron-down"></i>
                                                    <ul class="custom_list clc">
                                                        <li><a class="clc" href="#">All Categories</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="single_product">
            <div class="container-fluid" style=" background-color: #fff; padding: 11px;">
                <div class="row">
                    <div class="col-lg-2 order-lg-1 order-2">
                        <ul class="image_list">
                            <li><img src="/mapsImages/{{ $race->maps_image }}" ></li>

                        </ul>
                    </div>
                    <div class="col-lg-4 order-lg-2 order-1">
                        <div class="image_selected"><img src="/promotionalPosters/{{ $race->promotional_poster }}" alt=""></div>
                    </div>
                        <div class="col-lg-6 order-3">
                            <div class="product_description">

                                <div class="product_name"> {{$race->name}}</div>
                                <div> <span class="product_price">{{$race->race_price}}€</span> <strike class="product_discount"> <span style='color:black'>{{$race->race_price+20}}€<span> </strike> </div>
                                <div> <span class="product_saved">You Saved:</span> <span style='color:black'>20€<span> </div>
                                <div> <span class="product_info">Start of bike race: {{$race->date}}<span></div>
                                <hr class="singleline">
                                <div> <span class="product_info">{{$race->description}}<span></div>
                                <div>
                                    <div class="row">

                                        <div class="col-md-7"> </div>
                                    </div>
                                    <div class="row" style="margin-top: 15px;">
                                        <div class="col-xs-6" > <span class="product_options">Ramp: {{$race->ramp}}</span><br> </div>
                                        <div class="col-xs-6" > <span class="product_options">{{$race->km}}km</span><br></div>

                                    </div>
                                    @if ($date < $race->date)
                                        <br>
                                        <div> <span class="product_info">Sign up for our race<span></div>
                                        <a href="{{ route('runnerForm',$race->id )}}" class="btn btn-primary">Enroll in the race</a>
                                    @endif
                                    <br>
                                    <div class="product_name">Sponsors</div>
                                    @foreach ($sponsorImage as $sponsor)

                                        <img src="/logoImages/{{ $sponsor->logo }}" width="70px">
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="container text-center my-3">
                    <div class="row blog">
                        <div class="col-md-12">
                            <div id="blogCarousel" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <h2 class="font-weight-light">GALLERY</h2>
                                    <div class="carousel-item active">
                                        <div class="row">
                                            @foreach ($raceImage->slice(0,4) as $raceImages)
                                                <div class="col-md-3">
                                                    <img src="/images/{{ $raceImages->race_image }}" width="100px">
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
