@extends('products.layout')
@section('title', 'Add products')
@section('content')
@push('head')
        <link rel="stylesheet" href="{{ asset('plugins/DataTables/datatables.min.css') }}">
    @endpush
 
<div class="col-md-6">
                <div class="card">
                    <div class="card-header"><h3>{{ __('Add Canteen')}}</h3></div>
                    <div class="card-body">
                        <form class="forms-sample" action="{{url('/canteen/store')}}" method="post">
                        @csrf    
                        <div class="form-group">
                                <label for="exampleInputUsername1">{{ __('Canteen Name')}}</label>
                                <input type="text" class="form-control" id="exampleInput1" name="cname" placeholder="Canteen Name" value="{{$canteen_name->canteen_name}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">{{ __('User')}}</label>
                                <select class="col-12" name="uid">
                                    @foreach ($users as $user)
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">{{ __('Submit')}}</button>
                            
                          </form>
                    </div>
                </div>
</div>



       
@endsection