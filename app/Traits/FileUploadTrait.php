<?php 

namespace App\Traits;

use Illuminate\Http\Request;
use File;

trait FileUploadTrait{
    public function UpdateImage(Request $request, $inputName,$oldPath=NULL,$path="/upload"){
        if($request->hasFile($inputName)){
           
            $image = $request->{$inputName};
            $ext = $image->getClientOriginalExtension();
            $imageName = 'media_'.uniqid().'.'.$ext;

            $image->move(public_path($path),$imageName);
             
            // delete previous file if existed
            if($oldPath && File::exists(public_path($oldPath))){
                File::delete(public_path($oldPath));
            }

            return $path.'/'.$imageName;
        }
        return NULL;
    }//end method

    public function removeImage(string $Path){
        if( File::exists(public_path($Path))){
            File::delete(public_path($Path));
        }
    }
}