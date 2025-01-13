@extends('layouts.app')

@section('content')

<section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('assets/images/image_2.jpg') }}');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs mb-2"><span class="mr-2"><a href="{{ route('home') }}">Home <i class="fa fa-chevron-right"></i></a></span> <span>Services <i class="fa fa-chevron-right"></i></span></p>
                <h1 class="mb-0 bread">Our Services</h1>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-4 d-flex services align-self-stretch px-4 ftco-animate">
                <div class="d-block services-wrap text-center">
                    <div class="img" style="background-image: url('{{ asset('assets/images/services-1.jpg') }}');"></div>
                    <div class="media-body py-4 px-3">
                        <h3 class="heading">Easy Booking</h3>
                        <p>Book your perfect stay with just a few clicks.</p>
                        <p><a href="#" class="btn btn-primary">Learn More</a></p>
                    </div>
                </div>      
            </div>
            <div class="col-md-4 d-flex services align-self-stretch px-4 ftco-animate">
                <div class="d-block services-wrap text-center">
                    <div class="img" style="background-image: url('{{ asset('assets/images/services-2.jpg') }}');"></div>
                    <div class="media-body py-4 px-3">
                        <h3 class="heading">Luxury Stays</h3>
                        <p>Experience comfort and style at every property.</p>
                        <p><a href="#" class="btn btn-primary">Learn More</a></p>
                    </div>
                </div>    
            </div>
            <div class="col-md-4 d-flex services align-self-stretch px-4 ftco-animate">
                <div class="d-block services-wrap text-center">
                    <div class="img" style="background-image: url('{{ asset('assets/images/image_2.jpg') }}');"></div>
                    <div class="media-body py-4 px-3">
                        <h3 class="heading">Great Locations</h3>
                        <p>Stay close to top attractions and key areas.</p>
                        <p><a href="#" class="btn btn-primary">Learn More</a></p>
                    </div>
                </div>      
            </div>
        </div>
    </div>
</section>

<section class="ftco-section bg-light ftco-no-pt">
    <div class="container">
        <div class="row no-gutters justify-content-center pb-5 mb-3">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <h2>Our Amenities</h2>
            </div>
        </div>
        <div class="row">
            <div class="services-2 col-md-3 d-flex w-100 ftco-animate">
                <div class="icon d-flex justify-content-center align-items-center">
                    <span class="flaticon-diet"></span>
                </div>
                <div class="media-body pl-3">
                    <h3 class="heading">Free Coffee</h3>
                    <p>Enjoy complimentary tea and coffee during your stay.</p>
                </div>
            </div> 
            <div class="services-2 col-md-3 d-flex w-100 ftco-animate">
                <div class="icon d-flex justify-content-center align-items-center">
                    <span class="flaticon-workout"></span>
                </div>
                <div class="media-body pl-3">
                    <h3 class="heading">Hot Showers</h3>
                    <p>Relax with 24/7 hot water facilities.</p>
                </div>
            </div>
            <div class="services-2 col-md-3 d-flex w-100 ftco-animate">
                <div class="icon d-flex justify-content-center align-items-center">
                    <span class="flaticon-diet-1"></span>
                </div>
                <div class="media-body pl-3">
                    <h3 class="heading">Laundry</h3>
                    <p>On-site laundry service for your convenience.</p>
                </div>
            </div>      
            <div class="services-2 col-md-3 d-flex w-100 ftco-animate">
                <div class="icon d-flex justify-content-center align-items-center">
                    <span class="flaticon-first"></span>
                </div>
                <div class="media-body pl-3">
                    <h3 class="heading">Air Conditioning</h3>
                    <p>Stay cool with air-conditioned rooms.</p>
                </div>
            </div>
            <div class="services-2 col-md-3 d-flex w-100 ftco-animate">
                <div class="icon d-flex justify-content-center align-items-center">
                    <span class="flaticon-first"></span>
                </div>
                <div class="media-body pl-3">
                    <h3 class="heading">Free Wifi</h3>
                    <p>Stay connected with high-speed internet access.</p>
                </div>
            </div> 
            <div class="services-2 col-md-3 d-flex w-100 ftco-animate">
                <div class="icon d-flex justify-content-center align-items-center">
                    <span class="flaticon-first"></span>
                </div>
                <div class="media-body pl-3">
                    <h3 class="heading">Fully Equipped Kitchen</h3>
                    <p>Cook your favorite meals with ease.</p>
                </div>
            </div> 
            <div class="services-2 col-md-3 d-flex w-100 ftco-animate">
                <div class="icon d-flex justify-content-center align-items-center">
                    <span class="flaticon-first"></span>
                </div>
                <div class="media-body pl-3">
                    <h3 class="heading">Ironing</h3>
                    <p>Ironing services and facilities are available.</p>
                </div>
            </div> 
            <div class="services-2 col-md-3 d-flex w-100 ftco-animate">
                <div class="icon d-flex justify-content-center align-items-center">
                    <span class="flaticon-first"></span>
                </div>
                <div class="media-body pl-3">
                    <h3 class="heading">Secure Lockers</h3>
                    <p>Keep your valuables safe and secure.</p>
                </div>
            </div>
        </div>  
    </div>
</section>

@endsection
