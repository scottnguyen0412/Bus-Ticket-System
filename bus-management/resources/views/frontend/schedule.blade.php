@extends('layouts.frontend')

@section('content')
    <div class="hero-wrap js-fullheight" style="background-image: url('https://images.unsplash.com/photo-1570125909232-eb263c188f7e?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1471&q=80');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-9 text-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
            <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="index.html">Home</a></span> <span>Schedules</span></p>
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Schedules</h1>
          </div>
        </div>
      </div>
    </div>
    <section class="ftco-section">
      <div class="container">
        <div class="row">
        	<div class="col-lg-3 sidebar order-md-last ftco-animate">
        		<div class="sidebar-wrap ftco-animate">
        			<h3 class="heading mb-4 font-weight-bold">Find Schedule</h3>
        			<form action="#">
        				<div class="fields">
		              <div class="form-group">
		                <input type="text" class="form-control" placeholder="Destination, City">
		              </div>
		              <div class="form-group">
		                <div class="select-wrap one-third">
	                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
	                    <select name="" id="" class="form-control" placeholder="Keyword search">
	                      <option value="">Select Location</option>
	                      <option value="">San Francisco USA</option>
	                    </select>
	                  </div>
		              </div>
		              <div class="form-group">
		                <input type="text" id="checkin_date" class="form-control checkin_date" placeholder="Date">
		              </div>
		              <div class="form-group">
		              	<div class="range-slider">
                                <span>
                                  <input type="number" id="val1" value="25000" min="0" max="120000"/>	-
                                  <input type="number" value="50000" min="0" max="120000"/>
                              </span>
							    <input value="25000" min="0" max="120000" step="500" type="range"/>
								<input value="50000" min="0" max="120000" step="500" type="range"/>
						</div>
		              </div>
		              <div class="form-group">
		                <input type="submit" value="Search" class="btn btn-outline-warning py-3 px-5">
		              </div>
		            </div>
	            </form>
        		</div>

                <div class="sidebar-wrap ftco-animate">
        			<h3 class="heading mb-4 font-weight-bold">Bus House</h3>
                    @include('frontend.searchBusHouse')
					<input type="checkbox" class="form-check-input" id="exampleCheck1">
						name of bus
					</div>
                </div>

                <div class="sidebar-wrap ftco-animate">
        			<h3 class="heading mb-4 font-weight-bold">Start Destination</h3>
                    <form>
                        <div class="input-group">
                            <div class="form-outline">
                                <input type="search" id="start_destination" class="form-control form-control-sm rounded" placeholder="Search start destination"/>
                            </div>
                        </div><br/>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            name of start destination
                        </div>
                    </form>
                </div>
                <div class="sidebar-wrap ftco-animate">
        			<h3 class="heading mb-4 font-weight-bold">Destination</h3>
                    <form>
                        <div class="input-group">
                            <div class="form-outline">
                                <input type="search" id="destination" class="form-control form-control-sm rounded" placeholder="Search destination"/>
                            </div>
                        </div><br/>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            name of destination
                        </div>
                    </form>
                </div>

        		<div class="sidebar-wrap ftco-animate">
        			<h3 class="heading mb-4 font-weight-bold">Star Rating</h3>
        			<form method="post" class="star-rating">
							  <div class="form-check">
									<input type="checkbox" class="form-check-input" id="exampleCheck1">
									<label class="form-check-label" for="exampleCheck1">
										<p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i></span></p>
									</label>
							  </div>
							  <div class="form-check">
						      <input type="checkbox" class="form-check-input" id="exampleCheck1">
						      <label class="form-check-label" for="exampleCheck1">
						    	   <p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star-o"></i></span></p>
						      </label>
							  </div>
							  <div class="form-check">
						      <input type="checkbox" class="form-check-input" id="exampleCheck1">
						      <label class="form-check-label" for="exampleCheck1">
						      	<p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star-o"></i><i class="icon-star-o"></i></span></p>
						     </label>
							  </div>
							  <div class="form-check">
							    <input type="checkbox" class="form-check-input" id="exampleCheck1">
						      <label class="form-check-label" for="exampleCheck1">
						      	<p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star-o"></i><i class="icon-star-o"></i><i class="icon-star-o"></i></span></p>
						      </label>
							  </div>
							  <div class="form-check">
						      <input type="checkbox" class="form-check-input" id="exampleCheck1">
						      <label class="form-check-label" for="exampleCheck1">
						      	<p class="rate"><span><i class="icon-star"></i><i class="icon-star-o"></i><i class="icon-star-o"></i><i class="icon-star-o"></i><i class="icon-star-o"></i></span></p>
							    </label>
							  </div>
							</form>
        		</div>
          </div><!-- END-->

        <div class="col-lg-9">
            <div class="font-weight-bold">
                Sort by:
				<a href="{{URL::current()}}" class="btn btn-primary">All</a>
                <a href="{{URL::current()."?sort=price_desc"}}" class="btn btn-success">Highest Price</a>
                <a href="{{URL::current()."?sort=price_asc"}}" class="btn btn-info">Lowest Price</a>
                <a href="{{URL::current()."?sort=newest"}}" class="btn btn-secondary text-white">Newest</a>
            </div>
			
			{{-- @foreach ($schedule as $sche) --}}
			@foreach ($schedules as $schedule_a)
			<div class="gx-5 mt-3">
				<div class="col mb-2">
					<div class="card mb-3 mt-3" >
					<div class="row g-0">
						<div class="col-md-3">
							{{-- Get first image in multiple image --}}
							<img src="{{asset($schedule_a->images_bus[0])}}" class="img-fluid rounded-start mt-2" alt="..."> 
						</div>
						<div class="col-md-9">
							<div class="card-body">
								<h5 class="card-title font-weight-bold">
									{{$schedule_a->schedule->bus->bus_name}}
									<p class="text-secondary float-right">{{$schedule_a->schedule->price_schedules}}$</p>
								</h5>
								<small class="card-text">{{$schedule_a->schedule->bus->number_of_seats}} Seats</small><br/>
								{{-- Icon --}}
								<div class="mt-3">
								<div class="font-weight-bold" style="margin-left: 20px; display:flex; position:absolute; -webkit-box-align:center; line-height:20px;">{{$schedule_a->schedule->start_dest->name}}</div>
								<small style="font-size: 12px; position: absolute; margin-left:20px; line-height: 72px">{{$schedule_a->schedule->estimated_arrival_time}}</small>
								<svg class="TicketPC__LocationRouteSVG-sc-1mxgwjh-4 eKNjJr" xmlns="http://www.w3.org/2000/svg" width="14" height="74" viewBox="0 0 14 74"><path fill="none" stroke="#787878" stroke-linecap="round" stroke-width="2" stroke-dasharray="0 7" d="M7 13.5v46"></path><g fill="none" stroke="#484848" stroke-width="3"><circle cx="7" cy="7" r="7" stroke="none"></circle><circle cx="7" cy="7" r="5.5"></circle></g><path d="M7 58a5.953 5.953 0 0 0-6 5.891 5.657 5.657 0 0 0 .525 2.4 37.124 37.124 0 0 0 5.222 7.591.338.338 0 0 0 .506 0 37.142 37.142 0 0 0 5.222-7.582A5.655 5.655 0 0 0 13 63.9 5.953 5.953 0 0 0 7 58zm0 8.95a3.092 3.092 0 0 1-3.117-3.06 3.117 3.117 0 0 1 6.234 0A3.092 3.092 0 0 1 7 66.95z" fill="#787878"></path>
								</svg>
								<div class="font-weight-bold" style="margin-left: 20px; display:flex; position: absolute; bottom:2px; -webkit-box-align:center; line-height:68px;">{{$schedule_a->schedule->destination->name}}</div>
								</div>
							</div>
						</div>	
						<div class=" ml-3 mb-2">
								<a class="btn btn-gradient-danger dropdown-toggle" data-toggle="collapse" href="#{{$schedule_a->schedule->id}}" role="button" aria-expanded="false" aria-controls="collapseExample">
									Details Information
								</a>
								<div class="btn btn-outline-success rounded-0">
									Book now
								</div>
								<div class="collapse" id="{{$schedule_a->schedule->id}}">
								<div class="card-body"> 
									<ul class="nav nav-tabs" id="myTab" role="tablist">
										{{-- Image --}}
										<li class="nav-item">
											<a class="nav-link active" id="image-tab" data-toggle="tab" href="#image{{$schedule_a->schedule->id}}" role="tab" aria-controls="image" aria-selected="true">Image Bus</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" id="amenities-tab" data-toggle="tab" href="#amenities{{$schedule_a->schedule->id}}" role="tab" aria-controls="amenities" aria-selected="false">Amenities</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" id="policies-tab" data-toggle="tab" href="#policies" role="tab" aria-controls="policies" aria-selected="false">Policies</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" id="rating-tab" data-toggle="tab" href="#rating" role="tab" aria-controls="rating" aria-selected="false">Rating</a>
										</li>
										</ul>
										
										<div class="tab-content" id="myTabContent">
											<div class="tab-pane fade show active" id="image{{$schedule_a->schedule->id}}" role="tabpanel" aria-labelledby="image-tab">
												<br/>
												<div id="carouselExampleControls{{$schedule_a->schedule->id}}" class="carousel slide" data-ride="carousel">
												<div class="carousel-inner">
													{{-- Cho biến i = 1 --}}
													@php $i = 1; @endphp
													@foreach ($schedule_a->images_bus as $img)	
													{{-- Sau Mỗi vòng lặp thì $i tăng thêm 1 đơn vị và check active carousel --}}
													<div class="carousel-item {{$i == '1' ? 'active' : ''}}">
														@php $i++; @endphp
															<img class="d-block w-100" src="{{asset($img)}}" alt="slide {{$i++}}">
														</div>
													@endforeach
												</div>
												<a class="carousel-control-prev" href="#carouselExampleControls{{$schedule_a->schedule->id}}" role="button" data-slide="prev">
													<i class="fa-solid fa-circle-arrow-left text-success font-weight-bold" style="font-size: 20px" aria-hidden="true"></i>
													<span class="sr-only ">Previous</span>
												</a>
												<a class="carousel-control-next" href="#carouselExampleControls{{$schedule_a->schedule->id}}" role="button" data-slide="next">
													<i class="fa-solid fa-circle-arrow-right text-success font-weight-bold" style="font-size: 20px" aria-hidden="true"></i>
													<span class="sr-only">Next</span>
												</a>
												</div>
											</div>
											<div class="tab-pane fade" id="amenities{{$schedule_a->schedule->id}}" role="tabpanel" aria-labelledby="amenities-tab">
												<br/>
												<div class="" >
													<ul class="list-group list-group-flush">
														<li class="list-group-item">
															<i class="fa-solid fa-shield-virus mb-4" style="color: #dec3c3 "> Covid-19 safety guaramtee</i>
															<div>
																For customers on Covid-19, this is a service for safety protection.
																Bus Booking will work with bus companies to provide the best safety protections and measures possible:
																<p>- Check the temperature before getting on the bus.</p>
																<p>- Hand sanitizer that is always with you</p>
																<p>- Suggest Donning a Face Mask</p>
																<p>- Cleaning the Bus</p>
																<p>- The driver and employees have received Covid-19 vaccinations.</p>
															</div>
														</li>
														<li class="list-group-item">
															<i class="fa-solid fa-language mb-4" style="color: #dec3c3 "> English Speaking Staff</i>
															<div>
																Bus Company's staffs can speak english
															</div>
														</li>
														<li class="list-group-item">
															<i class="fa-solid fa-syringe mb-4" style="color: #dec3c3"> Covid-19 vaccinated Staff</i>
															<div>
																Driver and staff have been vaccinated against Covid-19
															</div>
														</li>
														<li class="list-group-item">
															<i class="fa-solid fa-wifi mb-4" style="color: #dec3c3"> Wifi</i>
															<div>
																Bus Company have equipted Wifi on bus
															</div>
														</li>
														<li class="list-group-item">
															<i class="fa-solid fa-snowflake mb-4" style="color: #dec3c3"> Air Conditions</i>
															<div>
																Bus Company have equipted air condition on bus
															</div>
														</li>
														<li class="list-group-item"> 
															<i class="fas fa-glass-martini-alt" style="color: #dec3c3"> Water</i>
															<div>
																Customers will served water on bus
															</div>
														</li>
													</ul>
												</div>
											</div>
											<div class="tab-pane fade" id="policies" role="tabpanel" aria-labelledby="policies-tab">Policies </div>
											<div class="tab-pane fade" id="rating" role="tabpanel" aria-labelledby="rating-tab">Rating</div>
										</div>
								</div>
								</div>
						</div>
				</div>
				</div>
				</div>
        	</div>
			@endforeach
			{{-- @endforeach --}}
      	</div>
    </section> <!-- .section -->
@endsection
