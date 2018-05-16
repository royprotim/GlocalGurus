<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use View;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $uid= Auth::user()->id;
       // $appoint= DB::table('blogs')->where('id', $uid)->get();
         $appoint = DB::table('users')
            ->join('blogs', 'users.id', '=', 'blogs.id')->get();

        //$user= DB::table('users')->get();                         
                return View::make('home')
                    ->with('appoint',$appoint);
                    
                


    }
    // 


   function add_blog(Request $req)
                {
                $ttle=$req->input("title");
                $cntnt=$req->input("content");
                if ($req->hasFile('media')) 
                    {
                    $image = $req->file('media');
                    $filename = $image->getClientOriginalName();
                    $path = public_path('/images');
                    $image->move($path, $filename);
                    $path='/images/'.$filename;
                    }
                else
                    $path='/images/wsn.png';
                $uid= Auth::user()->id;
              //  $user= DB::table('users')->get();    
                $data=array("title"=>$ttle,"content"=>$cntnt,"image_location"=>$path,"id"=>$uid);
                //inserting into Table
                DB::table('blogs')->insert($data);
                $appoint = DB::table('users')
                        ->join('blogs', 'users.id', '=', 'blogs.id')->get();
                //$appoint= DB::table('blogs')->where('id', $uid)->get();                   
                return View::make('home')
                    ->with('appoint',$appoint);
                }
}
