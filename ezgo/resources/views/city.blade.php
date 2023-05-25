@extends('components.layout-city')

@section('jkt')
    <!-- Destination Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <div class="text-center mb-3 pb-3">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Destination</h6>
                <h1>JAKARTA</h1>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4" data-toggle="modal" data-target="#myModal">
                    <div class="destination-item position-relative overflow-hidden mb-2">
                        <img class="img-fluid" src="img/destination-1.jpg" alt="">
                        <div class="destination-overlay text-white text-decoration-none">
                            <h5 class="text-white">Monas</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4" data-toggle="modal" data-target="#myModal">
                    <div class="destination-item position-relative overflow-hidden mb-2">
                        <img class="img-fluid" src="img/destination-2.jpg" alt="">
                        <div class="destination-overlay text-white text-decoration-none" href="">
                            <h5 class="text-white">Kota Tua</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4" data-toggle="modal" data-target="#myModal">
                    <div class="destination-item position-relative overflow-hidden mb-2">
                        <img class="img-fluid" src="img/destination-3.jpg" alt="">
                        <div class="destination-overlay text-white text-decoration-none" href="">
                            <h5 class="text-white">Masjid Istiqlal</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4" data-toggle="modal" data-target="#myModal">
                    <div class="destination-item position-relative overflow-hidden mb-2">
                        <img class="img-fluid" src="img/destination-4.jpg" alt="">
                        <div class="destination-overlay text-white text-decoration-none" href="">
                            <h5 class="text-white">Tanah Abang</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4" data-toggle="modal" data-target="#myModal">
                    <div class="destination-item position-relative overflow-hidden mb-2">
                        <img class="img-fluid" src="img/destination-5.jpg" alt="">
                        <div class="destination-overlay text-white text-decoration-none" href="">
                            <h5 class="text-white">PRJ</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4" data-toggle="modal" data-target="#myModal">
                    <div class="destination-item position-relative overflow-hidden mb-2">
                        <img class="img-fluid" src="img/destination-6.jpg" alt="">
                        <div class="destination-overlay text-white text-decoration-none" href="">
                            <h5 class="text-white">Ancol</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Destination Start -->


    <!-- Modal  Start-->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog d-flex align-items-center" role="document" style="min-width: 80%;">
            <div class="modal-content" style="width: 200%;">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Description</h4>
                </div>
                <div class="modal-body">
                    <div style="text-align: center;">
                        <img src="img/about-1.jpg" class="mw-100" alt="Hotel Image">
                    </div>
                    <div>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Architecto expedita dicta a, eum
                            animi cum cupiditate facilis esse ut, corrupti ipsam placeat inventore voluptas sapiente
                            beatae. Eaque, reiciendis magnam recusandae perferendis at natus repellendus incidunt minus
                            facere rerum corrupti maiores expedita nesciunt nisi, non fugit quod explicabo ipsam.
                            Molestias nostrum quos, perspiciatis, provident praesentium eaque dicta nobis consequuntur
                            ipsam hic sint, nesciunt fuga architecto fugiat illum corporis vero sequi cumque. Rerum,
                            cumque unde, laboriosam culpa perferendis vero sit eos similique cum a magni enim aliquam
                            beatae ipsa fuga. Veniam rerum in possimus similique harum maxime explicabo, ipsam placeat
                            fuga reiciendis.</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal End -->

    <!-- Modal  Start-->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog d-flex align-items-center" role="document" style="min-width: 80%;">
            <div class="modal-content" style="width: 200%;">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Description</h4>
                </div>
                <div class="modal-body">
                    <div style="text-align: center;">
                        <img src="img/about-1.jpg" class="mw-100" alt="Hotel Image">
                    </div>
                    <div>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Architecto expedita dicta a, eum
                            animi cum cupiditate facilis esse ut, corrupti ipsam placeat inventore voluptas sapiente
                            beatae. Eaque, reiciendis magnam recusandae perferendis at natus repellendus incidunt minus
                            facere rerum corrupti maiores expedita nesciunt nisi, non fugit quod explicabo ipsam.
                            Molestias nostrum quos, perspiciatis, provident praesentium eaque dicta nobis consequuntur
                            ipsam hic sint, nesciunt fuga architecto fugiat illum corporis vero sequi cumque. Rerum,
                            cumque unde, laboriosam culpa perferendis vero sit eos similique cum a magni enim aliquam
                            beatae ipsa fuga. Veniam rerum in possimus similique harum maxime explicabo, ipsam placeat
                            fuga reiciendis.</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal End -->

    <!-- Modal  Start-->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog d-flex align-items-center" role="document" style="min-width: 80%;">
            <div class="modal-content" style="width: 200%;">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Description</h4>
                </div>
                <div class="modal-body">
                    <div style="text-align: center;">
                        <img src="img/about-1.jpg" class="mw-100" alt="Hotel Image">
                    </div>
                    <div>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Architecto expedita dicta a, eum
                            animi cum cupiditate facilis esse ut, corrupti ipsam placeat inventore voluptas sapiente
                            beatae. Eaque, reiciendis magnam recusandae perferendis at natus repellendus incidunt minus
                            facere rerum corrupti maiores expedita nesciunt nisi, non fugit quod explicabo ipsam.
                            Molestias nostrum quos, perspiciatis, provident praesentium eaque dicta nobis consequuntur
                            ipsam hic sint, nesciunt fuga architecto fugiat illum corporis vero sequi cumque. Rerum,
                            cumque unde, laboriosam culpa perferendis vero sit eos similique cum a magni enim aliquam
                            beatae ipsa fuga. Veniam rerum in possimus similique harum maxime explicabo, ipsam placeat
                            fuga reiciendis.</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal End -->

    <!-- Modal  Start-->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog d-flex align-items-center" role="document" style="min-width: 80%;">
            <div class="modal-content" style="width: 200%;">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Description</h4>
                </div>
                <div class="modal-body">
                    <div style="text-align: center;">
                        <img src="img/about-1.jpg" class="mw-100" alt="Hotel Image">
                    </div>
                    <div>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Architecto expedita dicta a, eum
                            animi cum cupiditate facilis esse ut, corrupti ipsam placeat inventore voluptas sapiente
                            beatae. Eaque, reiciendis magnam recusandae perferendis at natus repellendus incidunt minus
                            facere rerum corrupti maiores expedita nesciunt nisi, non fugit quod explicabo ipsam.
                            Molestias nostrum quos, perspiciatis, provident praesentium eaque dicta nobis consequuntur
                            ipsam hic sint, nesciunt fuga architecto fugiat illum corporis vero sequi cumque. Rerum,
                            cumque unde, laboriosam culpa perferendis vero sit eos similique cum a magni enim aliquam
                            beatae ipsa fuga. Veniam rerum in possimus similique harum maxime explicabo, ipsam placeat
                            fuga reiciendis.</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal End -->

    <!-- Modal  Start-->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog d-flex align-items-center" role="document" style="min-width: 80%;">
            <div class="modal-content" style="width: 200%;">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Description</h4>
                </div>
                <div class="modal-body">
                    <div style="text-align: center;">
                        <img src="img/about-1.jpg" class="mw-100" alt="Hotel Image">
                    </div>
                    <div>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Architecto expedita dicta a, eum
                            animi cum cupiditate facilis esse ut, corrupti ipsam placeat inventore voluptas sapiente
                            beatae. Eaque, reiciendis magnam recusandae perferendis at natus repellendus incidunt minus
                            facere rerum corrupti maiores expedita nesciunt nisi, non fugit quod explicabo ipsam.
                            Molestias nostrum quos, perspiciatis, provident praesentium eaque dicta nobis consequuntur
                            ipsam hic sint, nesciunt fuga architecto fugiat illum corporis vero sequi cumque. Rerum,
                            cumque unde, laboriosam culpa perferendis vero sit eos similique cum a magni enim aliquam
                            beatae ipsa fuga. Veniam rerum in possimus similique harum maxime explicabo, ipsam placeat
                            fuga reiciendis.</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal End -->

    <!-- Modal  Start-->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog d-flex align-items-center" role="document" style="min-width: 80%;">
            <div class="modal-content" style="width: 200%;">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Description</h4>
                </div>
                <div class="modal-body">
                    <div style="text-align: center;">
                        <img src="img/about-1.jpg" class="mw-100" alt="Hotel Image">
                    </div>
                    <div>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Architecto expedita dicta a, eum
                            animi cum cupiditate facilis esse ut, corrupti ipsam placeat inventore voluptas sapiente
                            beatae. Eaque, reiciendis magnam recusandae perferendis at natus repellendus incidunt minus
                            facere rerum corrupti maiores expedita nesciunt nisi, non fugit quod explicabo ipsam.
                            Molestias nostrum quos, perspiciatis, provident praesentium eaque dicta nobis consequuntur
                            ipsam hic sint, nesciunt fuga architecto fugiat illum corporis vero sequi cumque. Rerum,
                            cumque unde, laboriosam culpa perferendis vero sit eos similique cum a magni enim aliquam
                            beatae ipsa fuga. Veniam rerum in possimus similique harum maxime explicabo, ipsam placeat
                            fuga reiciendis.</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal End -->
@endsection

@section('bdg')
<html>
    <table>
        <tr>
            <td><img src="{{ asset('img/cigadung.jpg') }}" alt="" width="300" height="300" class="city2" name="cgd"></td>
            <td><img src="{{ asset('img/kiara.jpg') }}" alt="" width="300" height="300" class="city2" name="kar"></td>
            <td><img src="{{ asset('img/kuliner.jpeg') }}" alt="" width="300" height="300" class="city2" name="kln"></td>
        </tr>
        <tr>
            <td><img src="{{ asset('img/siliwangi.jpg') }}" alt="" width="300" height="300" class="city2" name="slw"></td>
            <td><img src="{{ asset('img/tangga.jpg') }}" alt="" width="300" height="300" class="city2" name="tng"></td>
            <td><img src="{{ asset('img/wetland.jpeg') }}" alt="" width="300" height="300" class="city2" name="wtl"></td>
        </tr>
    </table>
</html>
@endsection

@section('srby')
<html>
    <table>
        <tr>
            <td><img src="{{ asset('img/10november.jpg') }}" alt="" width="300" height="300" class="city3" name="10n"></td>
            <td><img src="{{ asset('img/arab.jpg') }}" alt="" width="300" height="300" class="city3" name="arb"></td>
            <td><img src="{{ asset('img/kelenteng.jpg') }}" alt="" width="300" height="300" class="city3" name="klt"></td>
        </tr>
        <tr>
            <td><img src="{{ asset('img/pakuwon.jpg') }}" alt="" width="300" height="300" class="city3" name="pkw"></td>
            <td><img src="{{ asset('img/sampoerna.jpg') }}" alt="" width="300" height="300" class="city3" name="smp"></td>
            <td><img src="{{ asset('img/tugu.jpg') }}" alt="" width="300" height="300" class="city3" name="tgu"></td>
        </tr>
    </table>
</html>
@endsection

@section('dpsr')

@endsection