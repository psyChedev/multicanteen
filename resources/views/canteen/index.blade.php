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
                                <input type="text" class="form-control" id="exampleInput1" name="cname" placeholder="Canteen Name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">{{ __('User')}}</label>
                                <select class="col-12" name="uid">
                                    @foreach ($users as $user)
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">{{ __('Canteen Owner Name')}}</label>
                                <input type="text" class="form-control" id="exampleInput1" name="oname" placeholder="Canteen Name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">{{ __('Owner Number')}}</label>
                                <input type="number" class="form-control" id="exampleInput1" name="onumber" placeholder="Canteen Name">
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">{{ __('Submit')}}</button>
                            
                          </form>
                    </div>
                </div>
</div>


<div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h3>{{ __('Data Table')}}</h3></div>
                    <div class="card-body">
                    @if ($canteens)
                        <table id="data_table" class="table">
                            <thead>
                                <tr>
                                    <th>{{ __('Id')}}</th>
                                    <th class="nosort">{{ __('Canteen Name')}}</th>
                                    <th>{{ __('Alloted to')}}</th>
                                    <th>{{ __('Owner Name')}}</th>
                                    <th>{{__('Owner Number')}}</th>
                                    <th class="nosort">{{ __('Actions')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                                    
                               
                                @foreach ($canteens as $canteen)
                                <tr>
                                    <td>{{$canteen->id}}</td>
                                    <td>{{$canteen->canteen_name}}</td>
                                    <td>{{$canteen->user_id}}</td>
                                    <td>{{$canteen->owner_name}}</td>
                                    <td>{{$canteen->owner_number}}</td>
                                    <td>
                                        <div class="table-actions float-left">
                                            <a href="{{route('canteen.edt',$canteen)}}"><i class="ik ik-edit-2"></i></a>
                                            <a href="{{route('ingredient.add',$canteen)}}"><button class="btn btn-success">Add Ingredient</button></a>
                                            <a href="{{route('product.add',$canteen)}}"><button class="btn btn-warning">Add Product</button></a>
                                           
                                            <!--<a href="#"><i class="ik ik-trash-2"></i></a>-->
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                              
                            </tbody>
                        </table>
                        @else
                        <div>No data to show</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
       
@endsection