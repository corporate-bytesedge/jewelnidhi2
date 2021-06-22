@extends('layouts.manage')

@section('title')
    @lang('Edit Coupon')
@endsection

@section('page-header-title')
    @lang('Edit Coupon') <a class="btn btn-info btn-sm" href="{{route('manage.coupons.index')}}">@lang('View Coupons')</a>
@endsection

@section('page-header-description')
    @lang('Edit Coupon') <a href="{{route('manage.coupons.index')}}">@lang('Go Back')</a>
@endsection

@section('styles')
    <link href="{{asset('css/jquery.datetimepicker.min.css')}}" rel="stylesheet">
@endsection

@section('scripts')
    <script src="{{asset('js/jquery.datetimepicker.full.min.js')}}"></script>
    <script>
        $('#datetimepicker_start').datetimepicker({
            // options here
        });
        $('#datetimepicker_end').datetimepicker({
            // options here
        });
        $('.product_box').dropdown({
            // options here
        });

        jQuery(document).ready(function() {

            // $("#discount_flat_rate").hide();
            // $("#discount_percentage").hide();

            $(".discountRadio").on("click",function() {

                var radioValue = $("input[name='type']:checked").val();
                
                if(radioValue == '0') {
                    
                    $("#discount_flat_rate").show();
                    $("#discount_percentage").hide();

                } else { 

                    $("#discount_flat_rate").hide();
                    $("#discount_percentage").show();
                }

            });
           
        });
    </script>
@endsection

@section('content')
    @include('partials.manage.coupons.edit')
@endsection