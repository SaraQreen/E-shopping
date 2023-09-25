@extends('frontEnd.layouts.master')
@section('title','About Page')
@section('slider')
@endsection
@section('content')

    <section>
    <div class="container">
            <div class="row">           
                <div class="col-sm-12">                         
                    <h2 class="title text-center">About <strong>Us</strong></h2>                                                      

                </div>                  
            </div>      
                <div class="col-sm-6">
                    <div class="right-content">
                        <h4>About Us &amp; Our Skills</h4>
                        <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod kon tempor incididunt ut labore.</span>
                        <div class="quote">
                            <i class="fa fa-quote-left"></i><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiuski smod kon tempor incididunt ut labore.</p>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod kon tempor incididunt ut labore et dolore magna aliqua ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-behance"></i></a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="left-image">
                        <img src="{{asset('images/about-left-image.jpg')}}" alt="">
                    </div>
                </div>
            </div>
    </div>
    </section>

    <section class="our-services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2>Our Services</h2>
                        <span>Details to details is what makes Hexashop different from the other themes.</span>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="service-item">
                        <h4>Synther Vaporware</h4>
                        <p>Lorem ipsum dolor sit amet, consecteturti adipiscing elit, sed do eiusmod temp incididunt ut labore, et dolore quis ipsum suspend.</p>
                        <img src="{{asset('images/service-01.jpg')}}" alt="">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="service-item">
                        <h4>Locavore Squidward</h4>
                        <p>Lorem ipsum dolor sit amet, consecteturti adipiscing elit, sed do eiusmod temp incididunt ut labore, et dolore quis ipsum suspend.</p>
                        <img src="{{asset('images/service-02.jpg')}}" alt="">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="service-item">
                        <h4>Health Gothfam</h4>
                        <p>Lorem ipsum dolor sit amet, consecteturti adipiscing elit, sed do eiusmod temp incididunt ut labore, et dolore quis ipsum suspend.</p>
                        <img src="{{asset('images/service-03.jpg')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

