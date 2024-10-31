@extends('student.layouts.app')
@section('edecx')
<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
    <!-- Sidebar -->
       <div class="profile-sidebar">
           @include('student.partials.sidebar')
       </div>
    <!-- /Sidebar -->
</div>
<div class="col-md-7 col-lg-8 col-xl-9">
    @include('flash-message')
    <div class="row">
        <div class="col-md-12 col-lg-4 dash-board-list blue">
            <div class="dash-widget">
                <div class="circle-bar">
                    <div class="icon-col">
                        <i class="fas fa-calendar-check"></i>
                    </div>
                </div>
                <div class="dash-widget-info">
                    <h3>{{$totalClassBookings}}</h3>
                    <h6>Total Class Booking</h6>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-4 dash-board-list yellow">
            <div class="dash-widget">
                <div class="circle-bar">
                    <div class="icon-col">
                        <i class="fas fa-star"></i>
                    </div>
                </div>
                <div class="dash-widget-info">
                    <h3>{{env("CURRENCY_SIGN")}}{{$totalSpent}}</h3>
                    <h6>Total Spent</h6>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-4 dash-board-list pink">
            <div class="dash-widget">
                <div class="circle-bar">
                    <div class="icon-col">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                </div>
                <div class="dash-widget-info">
                    <h3>{{$totalAttendHours}}</h3>
                    <h6>Total Hours</h6>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h4 class="mb-4">My Today's Bookings</h4>
            <div class="card card-table">
                <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-center mb-0">
                        <thead>
                            <tr>
                                <th>Tutor Name</th>
                                <th>Order DATE</th>
                                <th>Order TIME</th>                                                                                        
                                <th class="text-center">STATUS</th>                                                                
                                <th class="text-center">ACTION</th>
                            </tr>
                        </thead>
                        <tbody class="show_listings">
                            <tr>
                                <td>Please wait....Your page content load here</td>
                            </tr>
                        </tbody>
                    </table>
                </div> 
                </div>
            </div>
            <div class="load-more text-center show_load_more">
                <a class="btn btn-primary btn-sm"  href="javascript:void(0);" id="clk_load_more"  onclick="loadMore()" data-page="1">Load More</a>
            </div>
        </div>
    </div>
</div>

<!-- Order Detail Modal -->
<div class="modal fade" id="view_order_details" tabindex="-1" role="dialog" aria-labelledby="view_order_details" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="view_order_details">View order details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="detail_content_html"></div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>        
        </div>
        </div>
    </div>
</div>

@endsection
@section('page-js-script')
<script>
    $(document).ready(function(){
        $(document).on('click','.nav-link',function(){
                let id = $(this).attr('data-id');
                $('#id').val(id);
        });          
        loadMore();
    });
    function loadMore(){
        var pageNumber=parseInt($("#clk_load_more").attr('data-page'));
        pageNumber = pageNumber > 0 ? pageNumber : 1;
        $.ajax({
            type : 'GET',
            url: "{{url('/student/student-dashboard-page')}}"+'?page='+pageNumber,
            dataType:'json',                
            success : function(data){
                if(pageNumber == 1){
                    $('.show_listings').html(data.html);   
                }
                else{
                    $('.show_listings').append(data.html);   
                }
                $("#clk_load_more").attr('data-page',parseInt(pageNumber+1));                                                                                            
                
                if(data.nextPage == false){
                    $("#clk_load_more").hide();
                }
                else{
                    $("#clk_load_more").show();
                }                
            },error: function(data){
                alert("Sorry! Something went Wrong, Please try after some time.");
            },
        });
    }

    function viewDetails(id){
        if(!id){
            var id = 0;
        }
        $.ajax({
            type : 'GET',
            url: "{{url('/student/student-dashboard-page-details')}}"+'?id='+id,
            dataType:'json',                
            success : function(data){                
                $('.detail_content_html').html(data.html);   
                $("#view_order_details").modal('show');
            },error: function(data){
                alert("Sorry! Something went Wrong, Please try after some time.");
            },
        });
    }
    function clickReschedule(getlink){
        if(!getlink){
            var getlink = '';
        }
        if(getlink != ''){
            if(confirm("If you reschedule this booking then existing booking will be canceled. Are you sure to continue?")){
                window.location.href=getlink;
            }
        }
        else{
            alert("Sorry! Something went wrong, Please reload the page.")
        }
    }    
 </script>
@endsection
</body>
</html>


