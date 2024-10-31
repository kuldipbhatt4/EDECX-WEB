@extends('edecx-admin.layouts.app')
@section('edecx')
<div id="content-page" class="content-page">
    <div class="container-fluid">
        @include('edecx-admin.flash-message')
       <div class="row">
          <div class="col-sm-12">
                <div class="iq-card">
                   <div class="iq-card-header d-flex justify-content-between">
                      <div class="iq-header-title">
                         <h4 class="card-title">Student Pending Order History</h4>
                      </div>
                   </div>
                   <div class="iq-card-body">
                      <div class="table-responsive">
                         <table id="user-list-table" class="table table-striped table-bordered mt-4" role="grid" aria-describedby="user-list-page-info">
                           <thead>
                               <tr>
                                  <th>Sr. No.</th>
                                  <th>Student Name</th>
                                  <th>Student Email</th>
                                  <th>Student Number</th>
                                  <th>Student Address</th>
                                  <th>Student city</th>
                                  <th>Tutor Name</th>
                                  <th>Tutor Email</th>
                                  <!-- <th>Tutor Number</th> -->
                                  <th>Booking Amount</th>
                                  <th>Admin Commission</th>
                                  <th>Tutor Price</th>
                                  <th>Booking Date</th>
                                  <th>Booking Start Time</th>
                                  <th>Booking status</th>
                               </tr>
                           </thead>
                           <tbody>
                           @if(!empty($getBookings) && $getBookings->count())
                           @foreach ($getBookings as $key => $getBooking)
                               <tr>
                                    <td>{{ $getBookings->firstItem() + $key }}</td>
                                    <td>{{$getBooking->fname . ' '.$getBooking->lname}}</td>
                                    <td>{{$getBooking->email}}</td>
                                    <td>{{$getBooking->mobile_no}}</td>
                                    <td>{{$getBooking->student_address}},{{$getBooking->street_address}}</td>
                                    <td>{{$getBooking->student_city}}</td>
                                    <td>{{$getBooking->tutors_fname . ' '.$getBooking->tutors_lname}}</td>
                                    <td>{{$getBooking->tutor_email}}</td>
                                    <!-- <td>{{$getBooking->contact_no}}</td> -->
                                    <td>{{env('CURRENCY_SIGN')}}{{number_format($getBooking->price,2)}}</td>
                                    <td>{{env('CURRENCY_SIGN')}}{{number_format($getBooking->admin_commission,2)}}</td>                                    
                                    <td>{{env('CURRENCY_SIGN')}}{{number_format($getBooking->tutor_price,2)}}</td>
                                    <td>{{date('d F yy',strtotime($getBooking->booking_date))}}</td>
                                    <td>{{date('H:i A',strtotime($getBooking->start_time))}}</td>
                                    <td><span class="badge iq-bg-primary">{{$getBooking->status}}</span></td>                                    
                              </tr>
                              </tbody>
                              @endforeach
                              @else
                                 <tr>
                                    <td colspan="12">There are no data.</td>
                                 </tr>
                                 </tbody>
                              @endif
                         </table>
                      </div>
                         <div class="row justify-content-between mt-3">
                             <div id="user-list-page-info" class="col-md-6">
                             <span>
                               Showing {{ $getBookings->firstItem() }} to {{ $getBookings->lastItem() }} of total {{$getBookings->total()}} entries</span>
                              </div>
                            <div class="col-md-6">
                               <nav aria-label="Page navigation example">
                                  <ul class="pagination justify-content-end mb-0">
                                    {{ $getBookings->links() }}
                                  </ul>
                               </nav>
                            </div>
                         </div>
                   </div>
                </div>
          </div>
       </div>
    </div>
 </div> 
@endsection
@section('page-js-script')
@endsection
