<?php
    use Illuminate\Support\Facades\DB;

    $blogs = DB::table('Blogs')->orderByDesc('bLikes')->get()->toArray();
    $jktNum = DB::table('Blogs')->where('destID', "jkt")->count();
    $bdgNum = DB::table('Blogs')->where('destID', "bdg")->count();
    $sbyNum = DB::table('Blogs')->where('destID', "sby")->count();
    $dpsNum = DB::table('Blogs')->where('destID', "dps")->count();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ezgo Admin Page</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Favicon -->
    <link href="{{ asset('img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet"> 
     
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet">
</head>
<body>

<div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-8">
                    <div id="konten">

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
                                                <button class="btn btn-outline-danger" onclick="Delete('{{ $blog->blogID }}', 1)">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                            <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                                                        </svg>
                                                </button>
                                            </div>
                                        </div>
                                        <!-- Blog Detail End -->
                            
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
                                                    <div class="bg-white p-4" id="{{ 'cmt'.$blog->blogID.'div' }}">            
                                                        <h4>Comments</h4>
                                                    @foreach($comments as $comment)
                                                        <?php
                                                            $cmtr = DB::table('Customer')->where('custID', $comment->custID)->first();
                                                        ?>

                                                        <div>
                                                            <p class="font-weight-bold pt-3">{{ $cmtr->cName }}</p>
                                                            <p>{{ $comment->ctContent }}</p>
                                                        </div>
                                                        <div class="likecontainer pb-4">
                                                            <button class="delbutton btn btn-outline-danger" onclick="Delete('{{ $comment->commentID }}', 2)">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                                                                </svg>
                                                            </button>
                                                        </div>
                                                    @endforeach    
                                                </div>
                                            </div>
                                        </div>
                    @endforeach
                    </div>
                </div>

                <div class="col-lg-4 mt-5 mt-lg-0">

                    <!-- Category List -->
                    <div class="mb-5">
                        <h4 class="text-uppercase mb-4" style="letter-spacing: 5px;">Categories</h4>
                        <div class="bg-white" style="padding: 30px;">
                            <ul class="list-inline m-0">
                                <li class="mb-3 d-flex justify-content-between align-items-center">
                                    <a class="text-dark" href="javascript:void(0)" onclick="sort(1)"><i
                                            class="fa fa-angle-right text-primary mr-2"></i>Jakarta</a>
                                    <span class="badge badge-primary badge-pill">{{ $jktNum }}</span>
                                </li>
                                <li class="mb-3 d-flex justify-content-between align-items-center">
                                    <a class="text-dark" href="javascript:void(0)" onclick="sort(2)"><i
                                            class="fa fa-angle-right text-primary mr-2"></i>Bandung</a>
                                    <span class="badge badge-primary badge-pill">{{ $bdgNum }}</span>
                                </li>
                                <li class="mb-3 d-flex justify-content-between align-items-center">
                                    <a class="text-dark" href="javascript:void(0)" onclick="sort(3)"><i
                                            class="fa fa-angle-right text-primary mr-2"></i>Surabaya</a>
                                    <span class="badge badge-primary badge-pill">{{ $sbyNum }}</span>
                                </li>
                                <li class="mb-3 d-flex justify-content-between align-items-center">
                                    <a class="text-dark" href="javascript:void(0)" onclick="sort(4)"><i
                                            class="fa fa-angle-right text-primary mr-2"></i>Denpasar</a>
                                    <span class="badge badge-primary badge-pill">{{ $dpsNum }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Successful Modal-->
    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel2">Purchase</h4>
            </div>
            <div class="modal-body">
            <p>Delete Success</p>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
            </div>
        </div>
        </div>
    </div>
    <!-- Modal End -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/admin.js') }}"></script>
</body>
</html>