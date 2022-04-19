@extends('ingredients.layout')
@section('title', 'Add Ingredient')
@section('content')
@push('head')
        <link rel="stylesheet" href="{{ asset('plugins/DataTables/datatables.min.css') }}">
    @endpush
 
<div class="col-md-6">
                <div class="card">
                    <div class="card-header"><h3>{{ __('Add Raw Materials')}}</h3></div>
                    <div class="card-body">
                        <form class="forms-sample" action="{{route('ingredient.store')}}" method="post">
                        @csrf   
                        <div class="form-group d-none">
                                <label for="exampleInputUsername1">{{ __('Canteen ID')}}</label>
                                <input type="text" class="form-control" id="exampleInput1" name="cid" placeholder="Canteen ID" value="{{$canteen}}">
                        </div> 
                        <div class="form-group">
                                <label for="exampleInputUsername1">{{ __('Ingredient Name')}}</label>
                                <input type="text" class="form-control" id="exampleInput1" name="iname" placeholder="Ingredient Name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername1">{{ __('Ingredient Quantity')}}</label>
                            <input type="text" class="form-control" id="exampleInput1" name="iqty" placeholder="Ingredient qty">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername1">{{ __('Ingredient Measurement')}}</label>
                            <select class="col-12 " name="imeasure">
                                <option value="kg">Kg</option>
                                <option value="gm">Gm</option>
                                <option value="ml">Ml</option>
                                <option value="ltr">Ltr</option>
                                <option value="pcs">Pcs</option>
                            </select>
                        </div>
                            
                            <button type="submit" class="btn btn-primary mr-2">{{ __('Submit')}}</button>
                            
                          </form>
                    </div>
                </div>
</div>
<div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h3>{{ __('Raw Materials')}}</h3></div>
                    <div class="card-body">
                    @if ($ingredients)
                        <table id="data_table" class="table">
                            <thead>
                                <tr>
                                    <th>{{ __('Id')}}</th>
                                    <th class="nosort">{{ __('Ingedient Name')}}</th>
                                    <th>{{ __('Ingredient Quantity')}}</th>
                                    <th>{{__('Ingredient Measurement')}}</th>
                                    <th class="nosort">{{ __('Actions')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                                    
                               
                                @foreach ($ingredients as $ingredient)
                                <tr>
                                    <td>{{$ingredient->id}}</td>
                                    <td>{{$ingredient->ingredient_name}}</td>
                                    <td>{{$ingredient->ingredient_quantity}}</td>
                                    <td>{{$ingredient->measurement}}</td>
                                    <td>
                                        <div class="table-actions float-left">
                                            <a href="#"><i class="ik ik-edit-2"></i></a>
                                           
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