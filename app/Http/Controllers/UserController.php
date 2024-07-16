<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function addVolume() {
        return view('addvolume');
    }

    public function addProduct() {
        return view('addproduct');
    }

    public function addProductPost(Request $request){
        $request->validate([
            'name' => 'required',
            'author' => 'required',
            'category' => 'required',
            'synopsis' => 'required',
            'bookCover' => 'required',
        ]);
        $name = $request->input('name');
        $author = $request->input('author');
        $category = $request->input('category');
        $synopsis = $request->input('synopsis');
        $filePath = "";
        if($request->hasFile('bookCover')){
            $file = $request->file('bookCover');
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('bookCover'), $fileName);
            $filePath = 'bookCover/' . $fileName;
        }
        $data = [
            "name" => $name,
            "author"=> $author,
            "category"=> $category,
            "synopsis"=> $synopsis,
            "imgPath"=> $filePath
        ];
        $response = Http::post('http://127.0.0.1:8000/api/products', $data);
        if($response -> successful()) {
            return redirect(route('home'));
        }else {
            return redirect(route('addproduct'));
        }
    }

    public function addVolumePost(Request $request){
        $request->validate([
            'productId' => 'required',
            'volumeName' => 'required',
            'content' => 'required',
        ]);
        $productId = $request->input('productId');
        $volumeName = $request->input('volumeName');
        $content = $request->input('content');

        $data = [
            "productId"=> $productId,
            "volumeName"=> $volumeName,
            "content"=> $content
        ];

        $response = Http::post('http://127.0.0.1:8000/api/volume', $data);
        if($response->successful()){
            return redirect(route('home'));
        } else {
            return redirect(route('addvolume'));
        }
    }

    public function addBookCover() {

    }
}
