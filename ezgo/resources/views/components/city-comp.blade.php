@extends('city')

@section('city1')
    <table>
        <tr>
            <td><img src="{{ asset('img/ancol.jpg') }}" alt="" width="300" height="300" class="city1" name="acl"></td>
            <td><img src="{{ asset('img/istiqlal-mosque.jpg') }}" alt="" width="300" height="300" class="city1" name="ist"></td>
            <td><img src="{{ asset('img/monas.jpg') }}" alt="" width="300" height="300" class="city1" name="mns"></td>
        </tr>
        <tr>
            <td><img src="{{ asset('img/glodok.jpg') }}" alt="" width="300" height="300" class="city1" name="gdk"></td>
            <td><img src="{{ asset('img/jakarta-cathedral.jpg') }}" alt="" width="300" height="300" class="city1" name="jct"></td>
            <td><img src="{{ asset('img/tmii.jpg') }}" alt="" width="300" height="300" class="city1" name="tmi"></td>
        </tr>
    </table>
@endsection

