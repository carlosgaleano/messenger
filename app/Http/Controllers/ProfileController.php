<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Image;

//http://image.intervention.io/getting_started/installation#laravels
class ProfileController extends Controller
{
    //
    public function edit(){

        return view('profile');

    }

    public function update(Request $request){

      // dd($request->all());
      $user=  auth()->user();
      $user->name=$request->name;
      if ($request->password)
      $user->password=bcrypt($request->password);

      $file=$request->image;

      if($file){
        $path = public_path('/users/');
        $fileName=time().'.'.$file->getClientOriginalExtension();
        $Image = Image::make($file)->resize(144, 144)->save($path.$fileName);
       // $moved=$file->move($path, $fileName);
        $user->image=$fileName;
      }
      $user->save();





      return  back();

    }
}
