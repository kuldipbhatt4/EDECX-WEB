@extends('student.layouts.app')
@section('edecx')

<div class="col-xl-7 col-lg-12 order-md-last order-sm-last order-last map-left">
    <div class="row align-items-center mb-4">
        <div class="col-md-6 col">
            <h4 class="total_mentees"> - Mentees found</h4>
        </div>
        <div class="col-md-6 col-auto">
            <div class="view-icons">
            
                <a href="{{url('student/tutor-list')}}?tutor_subject={{$tutor_subject}}&tutor_level={{$tutor_level}}&tutor_class={{$tutor_class}}&orderBy={{$orderBy}}&view=grid" class="grid-view"><i class="fas fa-th-large"></i></a>
                <a href="{{url('student/tutor-list')}}?tutor_subject={{$tutor_subject}}&tutor_level={{$tutor_level}}&tutor_class={{$tutor_class}}&orderBy={{$orderBy}}&view=list" class="list-view active"><i class="fas fa-bars"></i></a>
            </div>
            <div class="sort-by d-sm-block d-none">
                <span class="sortby-fliter">
                    <select class="select" name="change_filter" id="change_filter">
                        <option>Sort by</option>
                        <option class="sorting"  <?php echo ($orderBy == 'rating' ? 'selected' : '');?> value="rating">Rating</option>
                        <option class="sorting"  <?php echo ($orderBy == 'popular' ? 'selected' : '');?> value="popular" >Popular</option>
                        <option class="sorting"  <?php echo ($orderBy == 'latest' ? 'selected' : '');?> value="latest" >Latest</option>
                        <option class="sorting"  <?php echo ($orderBy == 'free' ? 'selected' : '');?> value="free" >Free</option>
                    </select>
                </span>
            </div>
        </div>
    </div>    
    <div class="show_listings">Please wait....Your page content load here</div>
   
    
    <div class="load-more text-center show_load_more">
        <a class="btn btn-primary btn-sm"  href="javascript:void(0);" id="clk_load_more"  onclick="loadMore()" data-page="1">Load More</a>
    </div>
</div>
<!-- /content-left-->
<div class="col-xl-5 col-lg-12 map-right">
    <div id="map" class="map-listing"></div>
    <!-- map-->
</div>

@endsection

<!-- /Main Wrapper -->
<link href="{{asset('edecx/website/assets/plugins/ratings/rateit.css')}}" rel="stylesheet" type="text/css">
@section('page-js-script')

<script src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_MAP_KEY')}}"></script>
<script src="{{asset('edecx/website/assets/js/map.js')}}"></script>
<script src="{{asset('edecx/website/assets/plugins/ratings/jquery.rateit.js')}}"></script>
<script>
    $(document).ready(function(){
        $(document).on('click','.nav-link',function(){
                let id = $(this).attr('data-id');
                $('#id').val(id);
        });    
        $("#change_filter").change(function(){
            var currentValue = $("#change_filter").val();
            var getParamLink = "{{url('student/tutor-list')}}?tutor_subject={{$tutor_subject}}&tutor_level={{$tutor_level}}&tutor_class={{$tutor_class}}&view={{$view_type}}";
            window.location.href = getParamLink+'&orderBy='+currentValue;
        });        
        loadMore();
    });
    function loadMore(){
            var pageNumber=parseInt($("#clk_load_more").attr('data-page'));
            pageNumber = pageNumber > 0 ? pageNumber : 1;
            $.ajax({
                type : 'GET',
                url: "{{url('student/tutor-list-page')}}?tutor_subject={{$tutor_subject}}&tutor_level={{$tutor_level}}&tutor_class={{$tutor_class}}&orderBy={{$orderBy}}&view={{$view_type}}"+'&page='+pageNumber,
                dataType:'json',                
                success : function(data){
                    if(pageNumber == 1){
                        $('.show_listings').html(data.html);   
                    }
                    else{
                        $('.show_listings').append(data.html);   
                    }
                    $("#clk_load_more").attr('data-page',parseInt(pageNumber+1));                                                               
                             
                    $(".total_mentees").html(data.totalTutors + ' Mentees found');
                    if(data.nextPage == false){
                        $("#clk_load_more").hide();
                    }
                    else{
                        $("#clk_load_more").show();
                    }
                    $('div.rateit, span.rateit').rateit();
                },error: function(data){
                    alert("Sorry! Something went Wrong, Please try after some time.");
                },
            });
        }
 </script>
@endsection
</body>
</html>