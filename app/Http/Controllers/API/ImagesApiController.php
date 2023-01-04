<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\API\ImagesApiModel;

class ImagesApiController extends Controller
{
    //

    public function index()
    {
        # code...
        return response([
            'code' => 200,
            'message' => "API Images Berhasil Di Panggil",
            'status' => "Success",
        ],200);
    }

    public function insert_data_images(Request $request)    
    {

        # code...

        $images = new ImagesApiModel;

        //gambar
        $image = $request->cover;  // your base64 encoded
        $image = str_replace('data:image/png;base64,', '', $image);
        $image = str_replace(' ', '+', $image);
        $namafoto = time() . '-' . rand(0, 99999) . ".jpg";
        $path = "../public/storage/images/cover/" . $namafoto;
        file_put_contents($path, base64_decode($image));

        //insert data to database
        $insert_images['cover'] = $namafoto;
        $insert_images['title'] = $request->title;
        $images->create($insert_images);
        if ($images != null) 
        {
            # code...
            return response([
                'code' => 200,
                'message' => "Data Berhasil Di Simpan",
                'status' => "Success",
                'data' => $insert_images,
            ],200);
        }else {
            # code...
            return response([
                'code' => 400,
                'message' => "Data Tidak Berhasil Di Simpan",
                'status' => "found",
                'data' => [],
            ],400);
        }
    }


}
