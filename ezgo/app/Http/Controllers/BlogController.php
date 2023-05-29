<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Routing\Controller as BaseController;

class BlogController extends BaseController{

    public function change(Request $req){
        $datas = DB::table('Blogs')
                ->join('Customer', 'Blogs.custID', '=', 'Customer.custID')
                ->where('Blogs.destID', $req->dest)
                ->select('Blogs.*', 'Customer.*')
                ->get();
        $comments = [];
        foreach($datas as $data){
            $comment = DB::table('Comments')->where('blogID', $data->blogID)->get();
            foreach($comment as $comm){
                $comm->cName = DB::table('Customer')->where('custID', $comm->custID)->first()->cName;
            }
            $data->bImage = asset('img/'.$data->bImage);
            array_push($comments, $comment);
        }
        return response()->json(['success' => true, 'blogs' => $datas, 'comments' => $comments]);
    }
}

?>