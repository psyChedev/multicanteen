<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\phi;
use App\Models\Product;
use App\Models\Ingredients;

class DashboardController extends Controller
{
    public function index()
    {   
        $phis = phi::all();
        $products = Product::all();
        $final_data = [];
        $temp=[];
        $temp_product=[];
        $ingredients = Ingredients::all();
        $count=0;
        foreach ($phis as $phi) {
            foreach ($products as $product) {
                if ($phi->product_id == $product->id) {
                   
                    $temp['product'][$count] = $product;
                    $count++;
                }
            }
        }
        $count=0;
        foreach ($phis as $phi) {
            foreach ($ingredients as $ingredient) {
                if ($phi->ingredient_id == $ingredient->id) {
                    
                    $temp['ingredient'][$count] = $ingredient;
                    $count++;
                }
           
            }
        }
        $count=0;
        foreach ($phis as $phi) {
            foreach($ingredients as $ingredient) {
                if ($phi->ingredient_id == $ingredient->id) {
                    if($ingredient->measurement == 'kg') {
                        $temp1=$ingredient->ingredient_quantity*1000;
                        $temp['measurement'][$phi->product_id][$count] = $temp1/$phi->quantity;
                    }
                    else if($ingredient->measurement == 'pcs') {
                        $temp['measurement'][$phi->product_id][$count] = $temp1/$phi->quantity;
                    }
                }
        }
        $count++;
    }
    $count=0;
        foreach ($temp['measurement'] as $tmp) {
                $final_data[$count] = min($tmp);
                $count++;
        }
        $count=0;
        foreach ($temp['product'] as $t) {
            $temp_product[$count]=$t;
            $count++;
        }
        $temp['product']=array_values(array_unique($temp_product, SORT_REGULAR));
        // dd($temp['product']);    
        // $final_data['value'] = 
        $temp['measurement'] = $final_data;
        //dd($temp);
        return view('pages.dashboard', compact('phi','product','ingredients','final_data','temp'));
    }
}
