<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Order;

class ProductController extends Controller
{
    protected Model $model;

    public function __construct(Product $model)
    {
        $this->model = $model;
    }


    public function store(Request $request){
        $product=$this->model->create($request->all());

        return response([
            'status'=>true,
            'message' => "Product Added Successfully",
            'data'=> $product,
        ]);
    }

    public function index(){
        return response()->json($this->model->all());
    }

    public function show(Product $product){
        return response()->json([
            'data'=>$product
        ]);
    }

    public function destroy(Product $product){
        $product->delete();
        return response(['message'=>'item deleted Successfully'],Response::HTTP_ACCEPTED);
    }

    public function showOrder(){
       $order= Order::all();
       $product= Product::all();
        return view('welcome',['orders'=>$order,'product'=>$product]);
    }

    public function confirm($id,$count,$orderid){

        $product=Product::find($id);
        if(!$product){
            return redirect()->back()->with('warning','Product Not availabe');
        }
        
        if($product->stock<$count) return redirect()->back()->with('failed','Quantity Not available');
        if($product->stock<0 || $product->stock ==0 ){
            $product->stock=0;
            $product->save();
            return redirect()->back()->with('failed','Stock Out');
        }else{
            $product->stock-=$count;
            $product->save();
            Order::find($orderid)->delete();
            return redirect()->back()->with('success','Order Confirmed');
        }
    }

    public function reject($id){
        Order::find($id)->delete();
        return redirect()->back()->with('success','Order Rejection Success');
    }
}
