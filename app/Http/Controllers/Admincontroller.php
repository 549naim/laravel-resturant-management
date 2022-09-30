<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Food;
use App\Models\foodcheif;
use App\Models\Reserve;

class Admincontroller extends Controller
{
    public function user(){
        $data=User::all();
         return view('admin.users',compact('data'));
    }

    public function deleteuser($id){
        $data=User::find($id);
        $data->delete();
        return redirect('users');
    }

    public function foodmenu(){
      $food=Food::all();
      return view('admin.foodmenu',compact('food'));
    }

    public function upload( Request $request){
      $data= new Food;
      $image=$request->image;
      $imageName=time(). '.'.$image->getClientOriginalExtension();
      $request->image->move('foodimage',$imageName);
      $data->image=$imageName;

      $data->title=$request->title;
      $data->price=$request->price;
      $data->description=$request->description;
      $data->save();
      return redirect('/foodmenu');

    }

    public function deletefood($id){
      $data=Food::find($id);
      $data->delete();
      return redirect('/foodmenu');
  }

  public function updatefood($id){
      $data=Food::find($id);
      return view("admin.updatefoodview",compact("data"));
  }

  public function editfood(Request $request,$id){
    $data=Food::find($id);

    $image=$request->image;
    if($image){
      $imageName=time(). '.'.$image->getClientOriginalExtension();
      $request->image->move('foodimage',$imageName);
      $data->image=$imageName;
    }

    $data->title=$request->title;
    $data->price=$request->price;
    $data->description=$request->description;
    $data->save();
    return redirect('/foodmenu');

  }

  public function reservation(Request $request){
    $data= new Reserve;
      
      $data->name=$request->name;
      $data->email=$request->email;
      $data->phone=$request->phone;
      $data->guest=$request->guest;
      $data->date=$request->date;
      $data->time=$request->time;
      $data->message=$request->message;
      $data->save();
      return redirect('/');
  }

  public function viewfoodreserve(){

    $data = Reserve::all();
    return view('admin.viewreservation',compact('data'));
  }
     

  public function addcheif(){
    $data = foodcheif::all();
    return view('admin.addcheif',compact('data'));
  }

  public function uploadcheif( Request $request){
    $data= new foodcheif;
    $image=$request->image;
    $imageName=time(). '.'.$image->getClientOriginalExtension();
    $request->image->move('cheifimage',$imageName);
    $data->image=$imageName;

    $data->name=$request->name;
    $data->speciality=$request->speciality;
   
    $data->save();
    return redirect('/addcheif');

  }

  public function deletecheif($id){
    $data=foodcheif::find($id);
      $data->delete();
      return redirect('/addcheif');
  }

  public function updatecheif($id){
    $data=foodcheif::find($id);
    return view("admin.updatecheif",compact("data"));
}

public function editcheif(Request $request,$id){
  $data=foodcheif::find($id);
  $image=$request->image;
  if($image){
    $imageName=time(). '.'.$image->getClientOriginalExtension();
    $request->image->move('cheifimage',$imageName);
    $data->image=$imageName;
  }
 
  $data->name=$request->name;
  $data->speciality=$request->speciality;
 
  $data->save();
  return redirect('/addcheif');

}

}
