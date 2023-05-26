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
                <div class="col-lg-4 col-md-6 mb-4" data-toggle="modal" data-target="#myModal1">
                    <div class="destination-item position-relative overflow-hidden mb-2">
                        <img class="img-fluid" src="{{ asset('img/monas.png') }}" alt="">
                        <div class="destination-overlay text-white text-decoration-none">
                            <h5 class="text-white">Monas</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4" data-toggle="modal" data-target="#myModal2">
                    <div class="destination-item position-relative overflow-hidden mb-2">
                        <img class="img-fluid" src="{{ asset('img/pasar baru.png') }}" alt="">
                        <div class="destination-overlay text-white text-decoration-none" href="">
                            <h5 class="text-white">Pasar Baru</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4" data-toggle="modal" data-target="#myModal3">
                    <div class="destination-item position-relative overflow-hidden mb-2">
                        <img class="img-fluid" src="{{ asset('img/tmii.png') }}" alt="">
                        <div class="destination-overlay text-white text-decoration-none" href="">
                            <h5 class="text-white">Taman Mini Indonesia Indah</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4" data-toggle="modal" data-target="#myModal4">
                    <div class="destination-item position-relative overflow-hidden mb-2">
                        <img class="img-fluid" src="{{ asset('img/ragunan.png') }}" alt="">
                        <div class="destination-overlay text-white text-decoration-none" href="">
                            <h5 class="text-white">Taman Ragunan</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4" data-toggle="modal" data-target="#myModal5">
                    <div class="destination-item position-relative overflow-hidden mb-2">
                        <img class="img-fluid" src="{{ asset('img/dufan.png') }}" alt="">
                        <div class="destination-overlay text-white text-decoration-none" href="">
                            <h5 class="text-white">Dunia Fantasi</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4" data-toggle="modal" data-target="#myModal6">
                    <div class="destination-item position-relative overflow-hidden mb-2">
                        <img class="img-fluid" src="{{ asset('img/kota tua.png') }}" alt="">
                        <div class="destination-overlay text-white text-decoration-none" href="">
                            <h5 class="text-white">Kota Tua</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Destination Start -->


    <!-- Modal  Start-->
    <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog d-flex align-items-center" role="document" style="min-width: 80%;">
            <div class="modal-content" style="width: 200%;">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Monas</h4>
                </div>
                <div class="modal-body">
                    <div style="text-align: center;">
                        <img src="{{ asset('img/monas.png') }}" class="mw-100" alt="Monas">
                    </div>
                    <div>
                        <p>Monas, also known as Monumen Nasional, is an iconic landmark situated in Jakarta, Indonesia. 
                            With its towering height of 132 meters, it stands as a symbol of the nation's independence 
                            and serves as a major tourist attraction. This grand monument encapsulates the essence of 
                            Indonesia's history and national pride.
                            Surrounded by lush greenery, Monas stands majestically in the heart of Jakarta, commanding attention and awe. 
                            Its towering presence symbolizes the strength and resilience of the Indonesian people. 
                            As visitors approach the monument, they are greeted by intricate carvings and reliefs 
                            that depict the struggles and triumphs of the nation's journey towards independence.</p>
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
    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog d-flex align-items-center" role="document" style="min-width: 80%;">
            <div class="modal-content" style="width: 200%;">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Pasar Baru</h4>
                </div>
                <div class="modal-body">
                    <div style="text-align: center;">
                        <img src="{{ asset('img/pasar baru.png') }}" class="mw-100" alt="Pasar Baru">
                    </div>
                    <div>
                        <p>Pasar Baru, located in Central Jakarta, is a vibrant and bustling market that 
                            offers a unique shopping experience. Steeped in history, this traditional 
                            market has been a popular destination for locals and tourists alike for over 
                            a century. In these two paragraphs, I will highlight the charm and attractions 
                            of Pasar Baru.
                            As you step into Pasar Baru, you are immediately greeted by a vibrant atmosphere 
                            filled with the aroma of spices, the sound of haggling, and the colors of diverse 
                            merchandise. This market is renowned for its wide range of products, from textiles 
                            and clothing to electronics and handicrafts. Walking through the maze-like alleys, 
                            you'll find yourself surrounded by shops and stalls offering an array of goods at 
                            competitive prices. Whether you're searching for traditional batik fabrics, antique 
                            furniture, or trendy fashion items, Pasar Baru has it all.</p>
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
    <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog d-flex align-items-center" role="document" style="min-width: 80%;">
            <div class="modal-content" style="width: 200%;">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Taman Mini Indonesia Indah</h4>
                </div>
                <div class="modal-body">
                    <div style="text-align: center;">
                        <img src="{{ asset('img/tmii.png') }}" class="mw-100" alt="Taman Mini Indonesia Indah">
                    </div>
                    <div>
                        <p>Taman Mini Indonesia Indah, located in Jakarta, is a remarkable 
                            cultural and recreational park that offers a captivating glimpse 
                            into the diverse cultures of Indonesia. Spread across a vast area, 
                            this enchanting park showcases traditional architecture, vibrant 
                            traditional costumes, and diverse arts and crafts from the different 
                            regions of the country.
                            As visitors wander through the park, they can explore miniature replicas 
                            of traditional houses, visit museums that exhibit Indonesia's rich heritage, 
                            and enjoy traditional performances and festivals. Taman Mini Indonesia Indah 
                            is a captivating destination that allows visitors to immerse themselves in 
                            the cultural tapestry of Indonesia, providing a memorable experience and a 
                            deeper understanding of the nation's cultural diversity.</p>
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
    <div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog d-flex align-items-center" role="document" style="min-width: 80%;">
            <div class="modal-content" style="width: 200%;">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Ragunan</h4>
                </div>
                <div class="modal-body">
                    <div style="text-align: center;">
                        <img src="{{ asset('img/ragunan.png') }}" class="mw-100" alt="Taman Ragunan">
                    </div>
                    <div>
                        <p>Ragunan Zoo, situated in Jakarta, is a captivating haven for wildlife 
                            enthusiasts and nature lovers. Spanning over a vast area, this renowned 
                            zoo is home to a wide variety of exotic animals, including elephants, 
                            tigers, orangutans, and more.
                            Visitors can embark on a fascinating journey as they explore the zoo's 
                            well-maintained enclosures and witness the diverse array of creatures 
                            from around the world. With its lush greenery and tranquil ambiance, 
                            Ragunan Zoo provides a perfect escape from the bustling city, allowing 
                            visitors to connect with nature and appreciate the beauty and wonder of 
                            the animal kingdom.</p>
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
    <div class="modal fade" id="myModal5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog d-flex align-items-center" role="document" style="min-width: 80%;">
            <div class="modal-content" style="width: 200%;">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Dunia Fantasi</h4>
                </div>
                <div class="modal-body">
                    <div style="text-align: center;">
                        <img src="{{ asset('img/dufan.png') }}" class="mw-100" alt="Dunia Fantasi">
                    </div>
                    <div>
                        <p>Dunia Fantasi, popularly known as Dufan, is a thrilling amusement 
                            park located in Jakarta, Indonesia. With its exciting rides, 
                            captivating entertainment, and vibrant atmosphere, Dufan promises 
                            an unforgettable experience for visitors of all ages. From adrenaline-pumping 
                            roller coasters to family-friendly attractions, the park offers a wide 
                            range of thrilling rides and engaging activities. Whether you're 
                            soaring through the air on a high-speed coaster or enjoying live 
                            performances and shows, Dufan guarantees non-stop fun and excitement. 
                            With its well-maintained facilities, friendly staff, and a wide selection 
                            of food and beverages, Dufan is the ultimate destination for adventure 
                            and entertainment, making it a must-visit for anyone seeking a day filled 
                            with exhilaration and joy.</p>
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
    <div class="modal fade" id="myModal6" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog d-flex align-items-center" role="document" style="min-width: 80%;">
            <div class="modal-content" style="width: 200%;">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Kota Tua</h4>
                </div>
                <div class="modal-body">
                    <div style="text-align: center;">
                        <img src="{{ asset('img/kota tua.png') }}" class="mw-100" alt="Kota Tua">
                    </div>
                    <div>
                        <p>Kota Tua, also known as Old Town or Old Batavia, is a captivating 
                            historic district nestled in the heart of Jakarta, Indonesia. 
                            This remarkable area serves as a living testament to the city's 
                            rich past, offering a nostalgic journey through time. The cobblestone 
                            streets and well-preserved buildings of Kota Tua whisper stories of 
                            the colonial era, reflecting the architectural influences of the Dutch 
                            and Indonesian cultures.
                            As visitors step into this enchanting district, they are instantly 
                            transported to a bygone era. The grand facades of the buildings, 
                            adorned with intricate details and elegant designs, showcase the 
                            architectural beauty of the past. From the iconic Kota Intan Bridge, 
                            the last remaining wooden bridge in Jakarta, to the magnificent Bank 
                            Indonesia Museum housed in a former bank building, every corner of 
                            Kota Tua exudes historical charm.</p>
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