@extends('layouts.app')

@section('content')

    <div class="hero-wrap js-fullheight" style="margin-top: -25px; background-image: url('{{ asset('assets/images/room-1.jpg') }} ');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
            <div class="col-md-7 ftco-animate">
                <h1 class="subheading">My Bookings</h1>
                <h1 class="mb-4"></h1>
            {{-- <p><a href="{{ route('home') }}" class="btn btn-primary">Go Home</a></p> --}}
            </div>
        </div>
        </div>
    </div>

    <div class="container">  
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">My Bookings</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Room</th>
                                        <th>Price</th>
                                        <th>Check In</th>
                                        <th>Check Out</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bookings as $booking)
                                        <tr>
                                            <td>{{ $booking->room->name }}</td>
                                            <td>{{ $booking->price }}</td>
                                            <td>{{ $booking->check_in }}</td>
                                            <td>{{ $booking->check_out }}</td>
                                            <td>
                                                <a href="{{ route('hotel.bookings.cancel', $booking->id) }}" class="btn btn-danger">Cancel</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <table class="table">
        <caption>List of users</caption>
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td>Larry</td>
            <td>the Bird</td>
            <td>@twitter</td>
          </tr>
        </tbody>
      </table>
      </div>

@endsection