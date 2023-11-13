<?php


namespace App\SOLID\Traits;


use App\Models\Media;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;

trait FileTraits
{
    public function uploadImage_and_save($file,$path, $renameFile = null, $collection_name, $model_id,$model_name)
    {
        // name, type,model_name, model_id,path,collection_name
        if(!empty($file)){
            $filename = $renameFile .'.' . $file->extension();
            $savePath = public_path()."/".$path;
            if (!file_exists($savePath)) {
                mkdir($savePath , 0777, true);
            }
            $image_resize = Image::make($file->getRealPath());
            $image_resize->save($savePath.'/'.$filename);

            Media::create([
                'name' => $filename,
                'path' => $path.'/'.$filename,
                'collection_name' => $collection_name,
                'model_id' => $model_id,
                'model_name' => $model_name,
            ]);
            return;
        }
    }
}
