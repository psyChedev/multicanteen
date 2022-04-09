@extends('products.layout')
@section('title', 'Add products')
@section('content')
@push('head')
        <link rel="stylesheet" href="{{ asset('plugins/DataTables/datatables.min.css') }}">
    @endpush
 
<div class="col-md-6">
                <div class="card">
                    <div class="card-header"><h3>{{ __('Add Product')}}</h3></div>
                    <div class="card-body">
                        <form class="forms-sample" action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                        @csrf    
                        <div class="form-group d-none">
                                <label for="exampleInputUsername1">{{ __('Canteen Id')}}</label>
                                <input type="text" class="form-control" id="exampleInput1" name="cid" placeholder="Canteen ID" value="{{$canteen}}" >
                            </div>
                        <div class="form-group">
                                <label for="exampleInputUsername1">{{ __('Product Name')}}</label>
                                <input type="text" class="form-control" id="exampleInput1" name="pname" placeholder="Product Name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">{{ __('Product Image')}}</label>
                                <input type="file" class="form-control" id="examplefileInput" name="pimage" placeholder="Product Image">
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">{{ __('Submit')}}</button>
                            
                          </form>
                    </div>
                </div>
</div>

<div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h3>{{ __('Products')}}</h3></div>
                    <div class="card-body">
                        @if (count($products)>0)
                        <table id="data_table" class="table">
                            <thead>
                                <tr>
                                    <th>{{ __('Id')}}</th>
                                    <th class="nosort">{{ __('Product Image')}}</th>
                                    <th>{{ __('Product Name')}}</th>
                                   
                                    <th class="nosort">{{ __('Actions')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                <tr>
                                    <td>{{$product->id}}</td>
                                    <td><img src="{{asset($product->Product_Image)}}" class="table-user-thumb" alt=""></td>
                                    <td>{{$product->Product_Name}}</td>
                                   
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
        </div>
<script>
    var count=0;
    $(document).ready(function() {
        $('#add-ingredient').on('click',function(e){
            e.preventDefault();
            $('.add-in').append(`<div class="form-group"><label for="">Ingredient Name</label><select class="col-12" name="product[${count}]">@foreach ($ingredients as $ingredient)
                <option>{{$ingredient->name}}</option>
            @endforeach</select></div><div class="form-group"><label for="">Ingredient Quantity</label><input type="text" class="form-control" name="inq[${count}]" id="" aria-describedby="helpId" placeholder=""></div>`);
            count=count+1;  
        });
    });
</script>
@endsection