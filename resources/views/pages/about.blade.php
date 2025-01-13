@extends('layouts.app')

@section('content')

<section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('assets/images/image_2.jpg') }}');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
            <p class="breadcrumbs mb-2"><span class="mr-2"><a href="{{ route('home') }}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>About us <i class="ion-ios-arrow-forward"></i></span></p>
          <h1 class="mb-0 bread">About Us</h1>
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
                        <h3 class="heading">Your Trusted Travel Partner</h3>
                        <p>At ANY-ROOM, we specialize in creating memorable vacation experiences by connecting you with comfortable, well-equipped rentals in prime locations. Whether it’s a weekend getaway or a long holiday, we've got you covered.</p>
                        <p><a href="#" class="btn btn-primary">Read more</a></p>
                    </div>
                </div>      
            </div>
            <div class="col-md-4 d-flex services align-self-stretch px-4 ftco-animate">
                <div class="d-block services-wrap text-center">
                    <div class="img" style="background-image: url('{{ asset('assets/images/services-2.jpg') }}');"></div>
                    <div class="media-body py-4 px-3">
                        <h3 class="heading">Exceptional Accommodation</h3>
                        <p>From luxury apartments to cozy cottages, we offer a range of accommodation options tailored to meet your unique needs. Our properties are handpicked for their quality, comfort, and proximity to local attractions.</p>
                        <p><a href="#" class="btn btn-primary">Read more</a></p>
                    </div>
                </div>    
            </div>
            <div class="col-md-4 d-flex services align-self-stretch px-4 ftco-animate">
                <div class="d-block services-wrap text-center">
                    <div class="img" style="background-image: url('{{ asset('assets/images/image_2.jpg') }}');"></div>
                    <div class="media-body py-4 px-3">
                        <h3 class="heading">Unforgettable Experiences</h3>
                        <p>Whether you’re traveling for leisure or business, our rentals are designed to make your stay stress-free and enjoyable. Explore vibrant cities, relax in tranquil settings, and create lasting memories with ANY-ROOM.</p>
                        <p><a href="#" class="btn btn-primary">Read more</a></p>
                    </div>
                </div>      
            </div>
        </div>
    </div>
</section>

<section class="ftco-section testimony-section bg-light">
    <div class="container">
        <div class="row justify-content-center pb-5 mb-3">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <h2>What Our Guests Say</h2>
            </div>
        </div>
        <div class="row ftco-animate">
            <div class="col-md-12">
                <div class="carousel-testimony owl-carousel">
                    @php
                        $testimonials = [
                            [
                                'image' => 'assets/images/person_2.jpg',
                                'quote' => 'ANY-ROOM made my family vacation truly unforgettable. The property was immaculate, and the service was outstanding!',
                                'name' => 'Lisa Okine',
                                'position' => 'Entrepreneur',
                            ],
                            [
                                'image' => 'assets/images/person_4.jpg',
                                'quote' => 'From booking to check-out, the experience was seamless. The rental exceeded my expectations!',
                                'name' => 'John Doe',
                                'position' => 'Frequent Traveler',
                            ],
                            [
                                'image' => 'assets/images/person_1.jpg',
                                'quote' => 'The service was impeccable, and the location was perfect. I’ll definitely book again!',
                                'name' => 'Sarah Lee',
                                'position' => 'Vacationer',
                            ],
                        ];
                    @endphp

                    @foreach ($testimonials as $testimonial)
                        <div class="item">
                            <div class="testimony-wrap d-flex">
                                <div class="user-img" style="background-image: url('{{ asset($testimonial['image']) }}');"></div>
                                <div class="text pl-4">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="fa fa-quote-left"></i>
                                    </span>
                                    <p>{{ $testimonial['quote'] }}</p>
                                    <p class="name">{{ $testimonial['name'] }}</p>
                                    <span class="position">{{ $testimonial['position'] }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
    


@endsection
