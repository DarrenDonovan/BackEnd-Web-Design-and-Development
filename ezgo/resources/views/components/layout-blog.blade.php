<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ezgo Blog Page</title>
</head>
<body>
    @include('components.navbar')

    <!-- Header Start -->
    <div class="container-fluid page-header">
        <div class="container">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
                <h3 class="display-4 text-white text-uppercase" id="blogTitle">My Blog</h3>
                <div class="d-inline-flex text-white">
                    <p class="m-0 text-uppercase"><a class="text-white" href="">Home</a></p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">Blog</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-8">
                    <div id="konten">
                        @yield('blog')
                    </div>
                </div>

    
                <div class="col-lg-4 mt-5 mt-lg-0">

                    <!-- Add Blog-->
                    <div class="mb-5 position-relative">
                        <div class="d-flex flex-column text-center bg-white mb-5 py-4 px-4">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">+ Add Blog</button>
                        </div>
                    </div>

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
    
                     <!-- Recent Post -->
                     <div class="mb-5 position-relative">
                        <h4 class="text-uppercase mb-4" style="letter-spacing: 5px;">Top Liked</h4>
                        <?php
                            $highestBlogs = $blogs = DB::table('Blogs')->orderByDesc('bLikes')->get()->take(3);
                        ?>
                        @foreach($highestBlogs as $highBlog)
                            <?php
                                $destination;
                                switch($highBlog->destID){
                                    case "jkt":
                                        $destination = "Jakarta";
                                        break;
                                    case "bdg":
                                        $destination = "Bandung";
                                        break;
                                    case "sby":
                                        $destination = "Surabaya";
                                        break;
                                    case "dps":
                                        $destination = "Denpasar";
                                        break;
                                }
                            ?>
                            <a class="d-flex align-items-center text-decoration-none bg-white mb-3" href="javascript:void(0);" onclick="jump('{{ $highBlog->blogID }}')">
                                <div class="pl-3">
                                    <h6 class="m-1">{{ $highBlog->bTitle }}</h6>
                                    <small>{{ $destination }}</small>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog End -->


    <!-- Modal  Start-->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog d-flex align-items-center" role="document" style="min-width: 80%;">
            <div class="modal-content" style="width: 200%;">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">My Blog</h4>
                </div>
                <div class="modal-body">
                <form action="{{ route('add') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="ml-5 pl-5">
                            <input type="text" class="w-85" placeholder="Blog Title" id="title" name="title">
                            <div class="py-3">
                                <textarea rows="5" cols="50" placeholder="Type Your Blog Here..." class="w-85" id="isi" name="isi"></textarea>
                            </div>
                            <div>
                                <label for="dropdown">Choose Your Category</label>
                                <br>
                                <select id="dropdown" name="dropdown">
                                    <option value="jkt">Jakarta</option>
                                    <option value="bdg">Bandung</option>
                                    <option value="sby">Surabaya</option>
                                    <option value="dps">Denpasar</option>
                                </select>
                            </div>
                        </div>
                        <div class="p-2 mb-5 ml-5 pl-5">
                            <label for="imageBlog">Put Image to Your Blog</label>
                            <br>
                            <input type="file" id="imageBlog" name="imageBlog">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" onclick="submitForm()">OK</button>
                        </div>
                </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal End -->


    @include('components.footer')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/blog.js') }}"></script>
</body>
</html>