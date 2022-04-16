@extends('products.layout')
@section('title', 'Add products')
@section('content')
@push('head')
        <link rel="stylesheet" href="{{ asset('plugins/DataTables/datatables.min.css') }}">
    @endpush
    <div class="container-fluid">
    <h1>Canteen {{$p}}</h1>
    	<div class="row">
          
    @foreach ($final_data as $key=>$value)
            @if ($temp['product'][$key]->canteen_id==$p)
            <div class="col-xl-3 col-md-6">
                <div class="card card-blue text-white h-100">
                    <div class="card-block">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h4 class="mb-0">{{$value}}</h4>
                                <p class="mb-0">{{$temp['product'][$key]->Product_Name}}</p>
                            </div>
                            <div class="col-4 text-right">
                                <img src="{{url('/')}}/{{$temp['product'][$key]->Product_Image}}" alt="" width=100% class=" rounded-circle">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>

@endsection