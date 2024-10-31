@extends('student.layouts.app')
@section('edecx')
    <div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
           <div class="profile-sidebar">
               @include('student.partials.sidebar')
           </div>
    </div>
    <div class="col-md-7 col-lg-8 col-xl-9">
        <div class="row">
            <div class="col-md-12">
                <h4 class="mb-4">Repeat Tutor Lists</h4>
                <div class="card card-table">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-center mb-0">
                                <thead>
                                    <tr>
                                        <th>BASIC INFO</th>
                                        <th>CREATED DATE</th>
                                        <th class="text-center">TAGS</th>
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
                                        <td class="text-center"><span class="pending">Completed</span></td>
                                        <td class="text-center"><a href="" class="btn btn-sm bg-info-light"><i class="far fa-eye"></i> Reschedule</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

