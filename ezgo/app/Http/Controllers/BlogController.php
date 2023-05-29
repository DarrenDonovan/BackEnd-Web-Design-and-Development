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
                ->orderByDesc('bLikes')
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

    public function like(Request $req){
        $count = DB::table('Blogs')->where('blogID', $req->id)->first()->bLikes;
        if(DB::table('Blogs')
            ->where('blogID', $req->id)
            ->update(['bLikes' => $count + 1])){
                return response()->json(['success' => true]);
        }
        return response()->json(['success' => false]);
    }

    public function comment(Request $req){
        $blog = $req->input('id');
        $user = session()->get('userID');
        $comment = $req->input('comment');

        if(DB::table('Comments')->insert([
            'blogID' => $blog,
            'ctContent' => $comment,
            'custID' => $user
        ])){
            return response()->json(['success' => true, 'user' => $user]);
        }
        return response()->json(['success' => false]);        
    }
}

?>