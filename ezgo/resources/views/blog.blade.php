<?php
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

$id = session()->get('userID');
$blogs = DB::table('Blogs')->where('custID', $id)->orderByDesc('bLikes')->get()->toArray();
$jktNum = DB::table('Blogs')->where('destID', "jkt")->count();
$bdgNum = DB::table('Blogs')->where('destID', "bdg")->count();
$sbyNum = DB::table('Blogs')->where('destID', "sby")->count();
$dpsNum = DB::table('Blogs')->where('destID', "dps")->count();

?>

@extends('components.layout-blog')
    
@section('blog')
    @foreach($blogs as $blog)
        <?php
            $user = DB::table('Customer')->where('custID', $blog->custID)->first();
            $comments = DB::table('Comments')->where('blogID', $blog->blogID)->get();
            $branch;

            switch($blog->destID){
                case "jkt":
                    $branch = "Jakarta";
                    break;
                case "bdg":
                    $branch = "Bandung";
                    break;
                case "sby":
                    $branch = "Surabaya";
                    break;
                case "dps":
                    $branch = "Denpasar";
                    break;
            }
        ?>

        <!-- Blog Detail Start -->
        <div class="pb-3">
                        <div class="blog-item">
                            <div class="position-relative">
                                <img class="img-fluid w-100" src="{{ asset('img/'.$blog->bImage) }}" alt="">
                            </div>
                        </div>
                        <div class="bg-white mb-3" style="padding: 30px;">
                            <div class="d-flex mb-3">
                                <a class="text-primary text-uppercase text-decoration-none" href="">{{ $user->cName }}</a>
                                <span class="text-primary px-2">|</span>
                                <a class="text-primary text-uppercase text-decoration-none" href="">{{ $branch }}</a>
                            </div>
                            <h2 class="mb-3">{{ $blog->bTitle }}</h2>
                            <p>{{ $blog->bContent }}</p>
                            <div class="likecontainer">
                                <button class="likebutton btn btn-outline-danger" onclick="like('{{ $blog->blogID }}')">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                        <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                                      </svg>
                                </button>
                                <p class="likecount" id="count">{{ $blog->bLikes }}</p>
                            </div>
                        </div>
                    </div>
                    <!-- Blog Detail End -->
                    
                <div class="position-relative mb-4">
                    <input type="text" class="contenttext mb-4" placeholder="Add Comments Here">
                    <div class="button-container">
                    <input type="button" value="Post" class="btn btn-primary">
                    <input type="button" value="Cancel">
                </div>
                </div>
                <div>
                   <button id="showCommentsButton" class="mb-3 btn btn-primary" onclick="show('{{ $blog->blogID }}')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-dots" viewBox="0 0 16 16">
                        <path d="M5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                        <path d="m2.165 15.803.02-.004c1.83-.363 2.948-.842 3.468-1.105A9.06 9.06 0 0 0 8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6a10.437 10.437 0 0 1-.524 2.318l-.003.011a10.722 10.722 0 0 1-.244.637c-.079.186.074.394.273.362a21.673 21.673 0 0 0 .693-.125zm.8-3.108a1 1 0 0 0-.287-.801C1.618 10.83 1 9.468 1 8c0-3.192 3.004-6 7-6s7 2.808 7 6c0 3.193-3.004 6-7 6a8.06 8.06 0 0 1-2.088-.272 1 1 0 0 0-.711.074c-.387.196-1.24.57-2.634.893a10.97 10.97 0 0 0 .398-2z"/>
                      </svg> Show Comments
                   </button>
                </div>
                <div class="row pb-3" id="{{ $blog->blogID }}" style="display: none;"> 
                            <div class="col mb-4 pb-2">
                                <div class="bg-white p-4">            
                                    <h4>Comments</h4>
                                @foreach($comments as $comment)
                                    <?php
                                        $cmtr = DB::table('Customer')->where('custID', $comment->custID)->first();
                                    ?>

                                    <div>
                                        <p class="font-weight-bold pt-3">{{ $cmtr->cName }}</p>
                                        <p>{{ $comment->ctContent }}</p>
                                    </div>
                                @endforeach    
                            </div>
                        </div>
                    </div>
    @endforeach
@endsection

