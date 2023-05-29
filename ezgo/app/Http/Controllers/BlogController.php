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
            switch($data->destID){
                case "jkt":
                    $data->branch = "Jakarta";
                    break;
                case "bdg":
                    $data->branch = "Bandung";
                    break;
                case "sby":
                    $data->branch = "Surabaya";
                    break;
                case "dps":
                    $data->branch = "Denpasar";
                    break;
            }
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
    }

    public function add(Request $req){
        $user = session()->get('userID');
        $title = $req->input('title');
        $isi = $req->input('isi');
        $dest = $req->input('dropdown');
        $num = DB::table('Blogs')->where('custID', $user)->count();
        $blogID = "blg".$user.($num + 1);
        $img = "";
        if ($req->hasFile('imageBlog')) {
            $blogimg = $req->file('imageBlog');
            $img = $blogimg->getClientOriginalName();
            $blogimg->move(public_path('img'), $img);
        }

        if(DB::table('Blogs')->insert([
            'blogID' => $blogID,
            'custID' => $user,
            'bContent' => $isi,
            'bImage' => $img,
            'bTitle' => $title,
            'destID' => $dest,
            'bLikes' => 0
        ])){
            return redirect()->back();
        }
    }

    public function jump(Request $req){
        $data = DB::table('Blogs')
                ->join('Customer', 'Blogs.custID', '=', 'Customer.custID')
                ->where('Blogs.blogID', $req->id)
                ->select('Blogs.*', 'Customer.*')
                ->first();
        $comment = DB::table('Comments')->where('blogID', $data->blogID)->get();
        foreach($comment as $comm){
            $comm->cName = DB::table('Customer')->where('custID', $comm->custID)->first()->cName;
        }
        $data->bImage = asset('img/'.$data->bImage);
        
        return response()->json(['success' => true, 'blog' => $data, 'comment' => $comment]);
    }

}

?>