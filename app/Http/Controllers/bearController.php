<?php
namespace App\Http\Controllers;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use DB; 
use App\Http\Requests;
use App\Bear;
use App\Http;

class bearController extends Controller
{
    public function getbear(){
         $bears = DB::table('bears')->get();
         $dat=json_encode($bears);
         return view('my.print',['data'=>$dat]);

    }
//     public function getbear_json(){
//          $bears = DB::table('bears')->get();
////        print_r($users);
////        echo json_encode($bears);
////        print_r( json_decode(json_encode($bears)));
//          $dat=json_encode($bears);
//          return view('my.print',['data'=>$dat]);
//    }
     public function getpicnic(){
         $bears = DB::table('picnics')->get();
         $dat=json_encode($bears);
         return view('my.picnic',['data'=>$dat]);
    }
     public function getfish(){
         $bears = DB::table('fish')->get();
         $dat=json_encode($bears);
         return view('my.fish',['data'=>$dat]);
         
    }
     public function gettree(){
         $bears = DB::table('trees')->get();
         $dat=json_encode($bears);
         return view('my.trees',['data'=>$dat]);
    }
    
    public function add_bear(Request $request){
        $bear = new Bear;        
        $bear->name =$request->get('name');
        $bear->type = $request->get('type');
        $bear->danger_level=$request->get('level');
        $bear->save();
        return back();
    }


}
