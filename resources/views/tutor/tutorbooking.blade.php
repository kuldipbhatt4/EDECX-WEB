@extends('tutor.layouts.app')
@section('edecx')
<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
    @include('tutor.partials.sidebar')
</div>
<div class="col-md-7 col-lg-8 col-xl-9">
    <h3 class="pb-3">Booking Summary</h3>
    <div class="tab-pane show active" id="mentee-list">
        <div class="card card-table">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-center mb-0">
                        <thead>
                            <tr>
                                <th>Tutor List</th>
                                <th>SCHEDULED DATE</th>
                                <th class="text-center">SCHEDULED TIMINGS</th>
                                <th class="text-center">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <h2 class="table-avatar">
                                        <a href="" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset('edecx/admin/default/default.jpg')}}" alt="User Image"></a>
                                        <a href="">Tyrone Roberts<span>tyroneroberts@adobe.com</span></a>
                                    </h2>
                                </td>
                                <td>08 April 2020</td>
                                <td class="text-center"><span class="pending">9:00 AM - 10:00 AM</span></td>
                                <td class="text-center"><a href="profile-mentee.html" class="btn btn-sm bg-info-light"><i class="far fa-eye"></i> View</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
