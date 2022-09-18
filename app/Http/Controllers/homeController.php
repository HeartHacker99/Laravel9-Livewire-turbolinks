<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\Orders as adminOrder;
use App\Models\products;
use App\Models\slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class homeController extends Controller
{
    public function home()
    {
        return view('layouts.client');
    }

//    public function viewProduct($id)
//    {
//        $sliders = slider::all()->where('status', 1);
//        $categories = category::all();
//        $products = products::where('category_id', $id)->where('status', 1)->paginate(12);
//        return view('livewire.client.shop',compact('products', 'sliders', 'categories'))
//            ->layout('layouts.client');
//    }

    public function viewPdf($id)
    {
        $this->id = $id;
        try{
            $pdf = App::make('dompdf.wrapper')->setPaper('a4', 'landscape');
            $pdf->loadHTML($this->convert_orders_data_to_html());
            return $pdf->stream();
        }
        catch(\Exception $e){
            session()->flash('error', $e->getMessage());
        }
    }

    public function convert_orders_data_to_html(){
        $orders = adminOrder::where('id',$this->id)->get();

        foreach($orders as $order){
            $name = $order->user->name;
            $product_name = $order->product->product_name;
            $date = $order->created_at->diffForHumans();
        }

        $orders->transform(function($order, $key){
            $order->cart = unserialize($order->cart);
            return $order;
        });
        $output = '<link rel="stylesheet" href="assets/client/css/style.css">
                        <table class="table">
                            <thead class="thead">
                                <tr class="text-left">
                                    <th>Client Name : '.$name.'<br> Product Name : '.$product_name.' <br> Date : '.$date.'</th>
                                </tr>
                            </thead>
                        </table>
                        <table class="table">
                            <thead class="thead-primary">
                                <tr class="text-center">
                                    <th>Image</th>
                                    <th>Product name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>';

        foreach($orders as $order){

            $output .= '<tr class="text-center">
                                <td class="image-prod"><img src="storage/product_images/'.$order->product->product_image.'" alt="" style = "height: 80px; width: 80px;"></td>
                                <td class="product-name">
                                    <h3>'.$order->product->product_name.'</h3>
                                </td>
                                <td class="price">$ '.$order->product->product_price.'</td>
                                <td class="price">'.$order->quantity.'</td>
                                <td class="total">$ '.$order->quantity * $order->product->product_price.'</td>
                            </tr><!-- END TR-->
                            </tbody>';
        }

        $output .='</table>';

        $output .='<table class="table">
                        <thead class="thead">
                            <tr class="text-center">
                                    <th>Total</th>
                                    <th>$ '.$order->amount.'</th>
                            </tr>
                        </thead>
                    </table>';

        return $output;



    }

}
