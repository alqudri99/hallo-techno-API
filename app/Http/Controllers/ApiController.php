<?php

namespace App\Http\Controllers;

use App\Category;
use App\Image;
use App\Office;
use App\Product;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function catAll(Request $request)
    {
        $d = 'https://kjsdsjdks.com';
        return str_replace('https', 'http', $d);
        $index =array();
        $helper = array();
        $data = Category::all('id', 'category_name', 'icon');

        $i = 0;
        foreach ($data as $item) {
            if($i == 0){
                $helper['id'] = 0;
                $helper['category_name'] = 'Semua';
                $helper['icon'] = 'https://cdn.iconscout.com/icon/free/png-256/categories-2026379-1713652.png';
                
                $index[] = $helper;
                $i++;
            }
            $index[] = $item;
        }
        return response($index, 200);
    }

    public function product(Request $request)
    {
        // return $request;
        // $image = Image::where('product_id', 3)->first();
        // return $image->url;
        $f =array();
        $prod = array();
        if ($request->category != 0 && !$request->q) {
            $product = Product::all();
            foreach($product as $item){
                $image = Image::where('product_id', 3)->first();
                $prod['product_name'] = $item->product_name;
                $prod['id'] = $item->id;
                $prod['price'] = $item->price;
                $prod['url'] = $image->url;
                $f[]=$prod;
            }
            return response($f, 200);
        } else {
            if ($request->category == 0) {
                $data = Product::where('product_name', 'LIKE',  "%{$request->q}%")->get();

                foreach($data as $item){
                    $image = Image::where('product_id', 3)->first();
                    $prod['product_name'] = $item->product_name;
                    $prod['id'] = $item->id;
                    $prod['price'] = $item->price;
                    $prod['url'] = $image->url;
                    $f[]=$prod;
                }
                return response($f, 200);
            } else {
                $data = Product::where('category_id', $request->category)->where('product_name', 'LIKE',  "%{$request->q}%")->get();

                foreach($data as $item){
                    $image = Image::where('product_id', 3)->first();
                    $prod['product_name'] = $item->product_name;
                    $prod['id'] = $item->id;
                    $prod['price'] = $item->price;
                    $prod['url'] = $image->url;
                    $f[]=$prod;
                }
                return response($f, 200);
            }
        }
    }

    public function productDetail(Request $request)
    {
        $photo = array();
        $data = Product::find($request->id);
        $foto = Image::where('product_id', $request->id)->get();
        foreach ($foto as $item) {
            $photo[]=$item->url;
        }

        $data['foto'] = $photo;
        
        if($data){
            return response($data, 200);
        }else{
            
        return response('{}', 200);
        }
    }

    public function office(Request $request)
    {
       $f = Office::all();

       return response('{"data":'.$f.'}', 200);
    }
    
}
