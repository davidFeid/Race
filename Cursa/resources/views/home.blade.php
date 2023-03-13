@extends('layouts.app')
    @section('template_title')
    Home
    @endsection

    

    @section('content')
        <div class="container py-5">
            <h1>Races available
                <br>Sign up now </h1>
            <!-- For Demo Purpose -->

            <!-- DEMO 5 -->

            @foreach ($races as $race=> $value)

            @if ($diaActual<$value->date)
                    <div class="py-5">
                        <h3 class="font-weight-bold mb-0">{{$value->name}}</h3>
                        <div class="row">
                        <!-- DEMO 5 Item-->
                        <div class="col-lg-6 mb-3 mb-lg-0">
                            <div class="hover hover-5 text-white rounded">

                                <a class="dropdown-item" href="{{ route('racePage',$value->id) }}">
                                    <img src="/promotionalPosters/{{ $value->promotional_poster }}" width="100px" alt="">
                                    <div class="hover-overlay"></div>
                                    <div class="hover-5-content">
                                        <h3 class="hover-5-title text-uppercase font-weight-light mb-0">{{substr($value->description, 0, 18)."...";}}<span> more info</span></h3>
                                    </div>
                                </a>
                            </div>
                        </div>
                       {{--  <div class="col-lg-6">
                            <!-- DEMO 5 Item-->
                            <div class="hover hover-5 text-white rounded"><img src="/promotionalPosters/{{ $value->promotional_poster }}" width="100px" alt="">
                            <div class="hover-overlay"></div>
                            <div class="hover-5-content">
                                <h3 class="hover-5-title text-uppercase font-weight-light mb-0">Image <strong class="font-weight-bold text-white">Caption </strong><span>Colorfull</span></h3>
                            </div>
                            </div>
                        </div> --}}
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    @endsection
