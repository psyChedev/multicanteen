@extends('products.layout')
@section('title', 'Add products')
@section('content')
@push('head')
        <link rel="stylesheet" href="{{ asset('plugins/DataTables/datatables.min.css') }}">
    @endpush
 
<div class="col-md-6">
                <div class="card">
                    @foreach ($products as $product)
                    <div class="card-header"><h3>{{ __('Add Ingredient for')}} {{$product->Product_Name}}</h3></div>
                    <div class="card-body">
                        <form class="forms-sample" action="{{route('phi.store')}}" method="post">
                        @csrf    
                        <div class="form-group d-none">
                                <label for="exampleInputUsername1">{{ __('Product Id')}}</label>
                                <input type="text" class="form-control" id="exampleInput1" name="pid" placeholder="Product ID" value="{{$product->id}}" >
                        </div>
                        <div class="form-group">
                              <button id="add-ingredient" class="bg-success border-0 p-2 text-white" style="border-radius:10px">Add Ingredient</button>
                        </div>
                        <div class="add-in"></div>
                            <button type="submit" class="btn btn-primary mr-2">{{ __('Submit')}}</button>
                            
                          </form>
                    </div>
                    
                    @endforeach
                </div>
</div>

<div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h3>{{ __('Ingredients for ')}} {{$product->Product_Name}}</h3></div>
                    <div class="card-body">
                        @if (count($phis)>0)
                        <table id="data_table" class="table">
                            <thead>
                                <tr>
                                    <th>{{ __('Id')}}</th>
                                    <th class="nosort">{{ __('Ingredient Name')}}</th>
                                    <th>{{ __('Ingredient Quantity')}}</th>
                                   
                                    <th class="nosort">{{ __('Actions')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($phis as $key=>$value)
                                <tr>
                                    <td>{{$value->id}}</td>
                                    <td>{{$table_ingredients[$key]}}</td>
                                    <td>{{$value->quantity}} {{$value->measurement}}</td>
                                   
                                    <td>
                                        <div class="table-actions float-left">
                                            <a href="{{route('phi.add',$product)}}"><i class="ik ik-edit-2"></i></a>
                                            <a href="#"><i class="ik ik-trash-2"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                        <div>Add Products to show...</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>-->
<script>
    var count=0;
    $(document).ready(function() {
        $('#add-ingredient').on('click',function(e){
            e.preventDefault();
            $('.add-in').append(`<div class="form-group"><label for="">Ingredient Name</label><select class="col-12 p-2" name="iname[${count}]">@foreach ($ingredients as $ingredient)
                <option value="{{$ingredient->id}}">{{$ingredient->ingredient_name}}</option>
            @endforeach</select></div><div class="form-group"><label for="">Ingredient Quantity</label><input type="number" class="form-control" name="inq[${count}]" id="" aria-describedby="helpId" placeholder=""></div><div class="form-group">
                                <label for="exampleInputUsername1">{{ __('Product measurement')}}</label>
                                <select class="col-12 p-2" name="imeasure[${count}]">
                                    <option value="kg">Kg</option>
                                    <option value="g">G</option>
                                    <option value="ml">ml</option>
                                    <option value="l">L</option>
                                    <option value="pcs">Pcs</option>
                                </select>
                        </div>`);
            count=count+1;  
        });
    });
</script>
@endsection