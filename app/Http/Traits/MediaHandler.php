<?php
namespace App\Http\Traits;

use Illuminate\Support\Facades\Storage;

trait MediaHandler{

    public static function upload($fileValidated,$path){

        $originalName = $fileValidated->getClientOriginalName();

        // IF IMAGE NAME HAS SPACES REPLACE IT BY "-"
        if(strpos($fileValidated->getClientOriginalName()," ")){
            $originalName = str_replace(" ","-",$fileValidated->getClientOriginalName());
        }

        $vidName = rand(1,100000). now()->format('YmdHis') .$originalName;
        $fileValidated->storeAs($path, $vidName, 'public');
        return $path . '/' . $vidName;
    }

    public static function updateMedia($media,$path,$storagePath)
    {
        $storagePath = str_replace(asset('storage') . '/', '', $storagePath);

        if(Storage::disk('public')->exists($storagePath)){
            Storage::disk('public')->delete($storagePath);

        }
        return self::upload($media, $path);
    }

    public static function deleteMedia($storagePath)
    {
        $storagePath = str_replace(asset('storage') . '/', '', $storagePath);

        if(Storage::disk('public')->exists($storagePath)){

            Storage::disk('public')->delete($storagePath);

        }
    }

    public static function deleteArrayOfMedia(array $storagePaths)
    {
        foreach($storagePaths as $storagePath){
            $storagePath='public/'.$storagePath;
            if(Storage::exists($storagePath)){
                Storage::delete($storagePath);
                }
                }
                }
                }
