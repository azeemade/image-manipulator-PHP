<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Image\Image;
use Spatie\Image\Manipulations;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    //
    public function index()
    {
        return view('index');
    }

    public function convert(Request $request)
    {
        $url = $request->input('url');
        $title = $request->input('title');
        $slug = $request->input('slug');
        $width = $request->input('width');
        $height = $request->input('height');
        //
        // $url = 'https://samplelib.com/lib/preview/png/sample-boat-400x300.png';
        $filename_from_url = parse_url($url);
        $ext = pathinfo($filename_from_url['path'], PATHINFO_EXTENSION);

        $newName = "https://dailytrust.com/imageserver/$width/$height/$slug.webp?original_url=$url";

        header('Content-Type: image/webp');
        header("content-disposition: inline; filename=$newName");

        if ($ext == 'png') {
            $img = imagecreatefrompng($url);
            $this->webpImage($img, $width, $height);
        } else if ($ext == 'jpeg' || $ext == 'jpg') {
            $img = imagecreatefromjpeg($url);
            $this->webpImage($img, $width, $height);
        }
    }

    public function webpImage($img, $width, $height)
    {
        imagepalettetotruecolor($img);
        imagealphablending($img, true);
        imagesavealpha($img, true);
        $oldw = imagesx($img);
        $oldh = imagesy($img);
        $temp = imagecreatetruecolor($width, $height);
        imagecopyresampled($temp, $img, 0, 0, 0, 0, $width, $height, $oldw, $oldh);
        imagewebp($temp, null, 100);
        return $temp;
    }

    public function watermark($webp, $watermark)
    {
        $image = Image::load($webp)
            ->watermark($watermark)
            ->save('image.webp');
        return $image;
    }
}
