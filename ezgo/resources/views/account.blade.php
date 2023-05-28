<?php
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

$ID = session()->get('userID');
$user = DB::table('Customer')->where('custID', $ID)->first();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ezgo Account Page</title>
</head>
<body>
    @include('components.navbar')

     <!--Profile Start-->
     <div class="container-fluid pl-5">
      <div class="container pl-5">
        <div class="row align-items-center justify-content-center pl-4">
          <div class="col-lg-10 pl-5 pt-5 pb-lg-5">
            <div class="about-text bg-white p-4 p-lg-5 my-lg-5">
              <img class="profilepic" src="{{ asset('img/'.$user->cImage) }}" />
              <button class="btn-editprofile" data-toggle="modal" data-target="#myModal">Edit
                  Profile</button>
              <h4 class="profilename">{{ $user->cName }}</h1>
                <h5>Address  : {{ $user->cAddress }}</h5>
                <h5>Phone    : {{ $user->cPhone }}</h5>
                <h5>Email    : {{ $user->cEmail }}</h5>
                <h5>Birthday : {{ $user->cBirthDate }}</h5>

                <div class="row pl-3 mt-4 pt-4">
                  <h4>Purchase History</h4>
                </div>
                <div class="row pl-3 mb-4 mt-2 pt-3" style="border: 1px solid black; border-radius: 10px;">
                  <h5 class="purchaseno">Purchase......</h5>
                  <button class="btn-purchasedetail" data-toggle="modal" data-target="#historyModal">Details</button>
                  <br>
                  <p class="destination">Destination : </p>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Profile End -->

    
    <!-- Edit Profile Modal Start -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Edit Account</h4>
          </div>
          <div class="modal-body">
            <table class="tableedit">
                <form class="formedit" action="{{ route('update') }}" method="POST" enctype="multipart/form-data">
                    @csrf 
                    <tr>
                        <td><label for="name">Name</label></td>
                        <td><input type="text" id="name" name="name" value="{{ $user->cName }}"><br></td>
                    </tr>
                    <tr>
                        <td><label for="address">Address</label></td>
                        <td><input type="text" id="address" name="address" value="{{ $user->cAddress }}"><br></td>
                    </tr>
                    <tr>
                        <td><label for="phone">Phone</label></td>
                        <td><input type="text" id="phone" name="phone" value="{{ $user->cPhone }}"><br></td>
                    </tr>
                    <tr>
                        <td><label for="email">Email</label></td>
                        <td><input type="email" id="email" name="email" value="{{ $user->cEmail }}"><br></td>
                    </tr>
                    <tr>
                        <td><label for="birthday">Birthday</label></td>
                        <td><input type="date" id="birthday" name="birthday" value="{{ $user->cBirthDate }}"><br></td>
                    </tr>
                    <tr>
                        <td><label for="profilePicture">Profile Picture</label></td>
                        <td><input type="file" id="profilePicture" name="profilePicture" value="{{ $user->cImage }}"><br></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-center">
                        <button class="buttonupdate">Update</button>
                        <button class="buttoncancel" data-dismiss="modal">Cancel</button>
                        </td>
                    </tr>
                </form>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- Edit Profile Modal End -->

    <!--History Modal Start-->
    <div class="modal fade" id="historyModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Purchase Details</h4>
          </div>
          <div class="modal-body">
            <p>Detail 1 : </p><br>
            <p>Detail 2 : </p>
            <button class="buttoncancel" data-dismiss="modal">OK</button>
          </div>
        </div>
      </div>
    </div>
    <!--History Modal End-->

    @include('components.footer')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
</body>
</html>