@extends('website.layouts.app')
@section('edecx')
<section class="t-c">
    <div class="container">
        <h3>Terms and Conditions</h3>
        @foreach($tc as $terms)
            {!! $terms->condition !!}
        @endforeach
    </div>
</section>
@endsection
