function fetchData(buttonId, code) {
    let token = $('meta[name="csrf-token"]').attr("content");
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": token,
        },
    });
    $.ajax({
        url: "/check",
        type: "POST",
        data: { buttonId: buttonId, code: code },
        success: function (response) {
            if (response.success) {
                console.log("success!");
                fetchSessionItem("item")
                    .then(function (item) {
                        switch (code) {
                            case 1:
                                fetchImage(item.tcImage).then(function (pic) {
                                    document.getElementById("tcImage").src =
                                        pic;
                                });
                                document.getElementById("productID").innerText =
                                    item.productID;
                                document.getElementById("tcName").innerText =
                                    item.tcName;
                                document.getElementById(
                                    "tcFromDestination"
                                ).innerText =
                                    item.tcFrom + " To " + item.tcDestination;
                                document.getElementById(
                                    "TimeDepArr"
                                ).innerText =
                                    item.TimeDep + " - " + item.TimeArr;
                                document.getElementById(
                                    "decrementBtn"
                                ).onclick = function (event) {
                                    decrement(event, item.tcSellingPrice);
                                };
                                document.getElementById(
                                    "incrementBtn"
                                ).onclick = function (event) {
                                    increment(event, item.tcSellingPrice);
                                };
                                document.getElementById("buton").onclick =
                                    function (event) {
                                        purchase(item.ticketID, 1);
                                    };
                                break;
                            case 2:
                                fetchImage(item.hImage).then(function (pic) {
                                    document.getElementById("hImage").src = pic;
                                });
                                document.getElementById("productID").innerText =
                                    item.productID;
                                document.getElementById("hName").innerText =
                                    item.hName;
                                document.getElementById(
                                    "hFromDestination"
                                ).innerText = item.hAddress;
                                document.getElementById(
                                    "decrementBtn"
                                ).onclick = function (event) {
                                    decrement(event, item.hPrice);
                                };
                                document.getElementById(
                                    "incrementBtn"
                                ).onclick = function (event) {
                                    increment(event, item.hPrice);
                                };
                                document.getElementById("buton").onclick =
                                    function (event) {
                                        purchase(item.hotelID, 2);
                                    };
                                break;
                            case 3:
                                fetchImage(item.tpImage).then(function (pic) {
                                    document.getElementById("tpImage").src =
                                        pic;
                                });
                                document.getElementById("productID").innerText =
                                    item.productID;
                                document.getElementById("tpName").innerText =
                                    item.tpName;
                                document.getElementById(
                                    "tpFromDestination"
                                ).innerText = item.Date;
                                document.getElementById(
                                    "decrementBtn"
                                ).onclick = function (event) {
                                    decrement(event, item.tpPrice);
                                };
                                document.getElementById(
                                    "incrementBtn"
                                ).onclick = function (event) {
                                    increment(event, item.tpPrice);
                                };
                                document.getElementById("buton").onclick =
                                    function (event) {
                                        purchase(item.tourID, 3);
                                    };
                                break;
                        }
                    })
                    .catch(function (error) {
                        console.log("Error:", error);
                    });
            } else {
                console.log("error response :(");
            }
        },
        error: function (xhr) {
            console.log("error send :(");
        },
    });
}

function recommend(dest, type, id) {
    let token = $('meta[name="csrf-token"]').attr("content");
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": token,
        },
    });
    $.ajax({
        url: "/recom",
        type: "POST",
        data: { dest: dest, type: type, id: id },
        success: function (response) {
            if (response.success) {
                let rec = document.getElementById("recContain");
                rec.innerHTML = "";
                response.rows.forEach(function (row) {
                    let html = "<div>";
                    html += "<p>" + row.Name + "</p>";
                    html += '<img src="' + row.Image + '" style="width: 75%;">';
                    html += "<p>" + row.Price + "</p>";
                    html +=
                        '<a href="javascript:void(0)" onclick="changeModal(\'' +
                        row.Tag +
                        "')\">Buy Now</a>";
                    html += "</div>";
                    rec.innerHTML += html;
                });
            } else {
                console.log("error response :(");
            }
        },
        error: function (xhr) {
            console.log("error send :(");
        },
    });
}

function purchase(id, kode) {
    let bought = document.getElementById("numedit").value;
    let price = parseInt(document.getElementById("price").innerText);

    let token = $('meta[name="csrf-token"]').attr("content");
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": token,
        },
    });
    $.ajax({
        url: "/purchase",
        type: "POST",
        data: { id: id, kode: kode, total: bought, price: price },
        success: function (response) {
            if (response.success) {
                alert("Item has been purchased!");
                $("#myModal").modal("hide");
            } else {
                console.log("error response :(");
                switch (response.code) {
                    case 1:
                        alert(
                            "Sorry we don't have enough stock to fulfill your order!"
                        );
                        break;
                    case 2:
                        alert(
                            "Unfortunately there's been an error and we are currently unable to complete your order"
                        );
                        break;
                }
            }
        },
        error: function (xhr) {
            console.log("error send :(");
        },
    });
}

function fetchSessionItem(sessionName) {
    return new Promise((resolve, reject) => {
        let token = $('meta[name="csrf-token"]').attr("content");
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": token,
            },
        });
        $.ajax({
            url: "/sessionGet",
            type: "POST",
            data: { name: sessionName },
            success: function (response) {
                if (response.success) {
                    console.log("success!");
                    resolve(response.item);
                } else {
                    console.log("error response :(");
                    reject();
                }
            },
            error: function (xhr) {
                console.log("error send :(");
                reject();
            },
        });
    });
}

function fetchImage(picName) {
    return new Promise((resolve, reject) => {
        let token = $('meta[name="csrf-token"]').attr("content");
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": token,
            },
        });
        $.ajax({
            url: "/imag",
            type: "POST",
            data: { name: picName },
            success: function (response) {
                if (response.success) {
                    console.log("success!");
                    resolve(response.pic);
                } else {
                    console.log("error response :(");
                    reject();
                }
            },
            error: function (xhr) {
                console.log("error send :(");
                reject();
            },
        });
    });
}

function increment(event, harga) {
    document.getElementById("numedit").value++;
    let priceNow = parseInt(document.getElementById("price").textContent);
    priceNow += parseInt(harga);
    document.getElementById("price").textContent = priceNow;
    console.log("0");
    event.preventDefault();
}

function decrement(event, harga) {
    if (document.getElementById("numedit").value > 0) {
        document.getElementById("numedit").value--;
        let priceNow = parseInt(document.getElementById("price").textContent);
        priceNow -= parseInt(harga);
        document.getElementById("price").textContent = priceNow;
        event.preventDefault();
    } else {
        event.preventDefault();
    }
}

function sort(kode) {
    let arr = [];
    let key = [];

    switch (kode) {
        case 1:
            let dest1 = document.getElementById("dest");
            let trans = document.getElementById("trans");
            let budg1 = document.getElementById("budget");

            let dest1Num = dest1.options[dest.selectedIndex].value;
            let transNum = trans.options[trans.selectedIndex].value;
            let budg1Num = budg1.value.trim();

            console.log(dest1Num);

            switch (dest1Num) {
                case "1":
                    key.push("destID");
                    arr.push("jkt");
                    break;
                case "2":
                    key.push("destID");
                    arr.push("bdg");
                    break;
                case "3":
                    key.push("destID");
                    arr.push("sby");
                    break;
                case "4":
                    key.push("destID");
                    arr.push("dps");
                    break;
            }

            switch (transNum) {
                case "1":
                    key.push("tcType");
                    arr.push("krt");
                    break;
                case "2":
                    key.push("tcType");
                    arr.push("fer");
                    break;
                case "3":
                    key.push("tcType");
                    arr.push("fly");
                    break;
            }

            if (budg1Num != "") {
                key.push("tcSellingPrice");
                arr.push(parseInt(budg1Num));
            }

            break;
        case 2:
            let dest2 = document.getElementById("dest");
            let duration = document.getElementById("duration");
            let budg2 = document.getElementById("budget");

            let dest2Num = dest2.options[dest2.selectedIndex].value;
            let duraNum = duration.options[duration.selectedIndex].value;
            let budg2Num = budg2.value.trim();

            console.log(dest2Num);

            switch (dest2Num) {
                case "1":
                    key.push("destID");
                    arr.push("jkt");
                    break;
                case "2":
                    key.push("destID");
                    arr.push("bdg");
                    break;
                case "3":
                    key.push("destID");
                    arr.push("sby");
                    break;
                case "4":
                    key.push("destID");
                    arr.push("dps");
                    break;
            }

            if (duraNum != "0") {
                key.push("hAmount");
                arr.push(parseInt(duraNum));
            }

            if (budg2Num != "") {
                key.push("hPrice");
                arr.push(parseInt(budg2Num));
            }

            break;
        case 3:
            let dest3 = document.getElementById("dest");
            let budg3 = document.getElementById("budget");

            let dest3Num = dest3.options[dest3.selectedIndex].value;
            let budg3Num = budg3.value.trim();

            console.log(dest3Num);

            switch (dest3Num) {
                case "1":
                    key.push("destID");
                    arr.push("jkt");
                    break;
                case "2":
                    key.push("destID");
                    arr.push("bdg");
                    break;
                case "3":
                    key.push("destID");
                    arr.push("sby");
                    break;
                case "4":
                    key.push("destID");
                    arr.push("dps");
                    break;
            }

            if (budg3Num != "") {
                key.push("tpPrice");
                arr.push(parseInt(budg3Num));
            }

            break;
    }

    key.forEach(function (roll) {
        console.log(roll);
    });

    let data = {
        key: key,
        arr: arr,
        code: kode,
    };

    let token = $('meta[name="csrf-token"]').attr("content");
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": token,
        },
    });
    $.ajax({
        url: "/sort",
        type: "POST",
        data: data,
        success: function (response) {
            if (response.success) {
                console.log("success!");

                let kontenDiv = document.getElementById("konten");
                kontenDiv.innerHTML = "";

                switch (kode) {
                    case 1:
                        response.rows.forEach(function (row) {
                            console.log(row.destID);
                            let html = '<div class="col-lg-12 col-md-6 mb-4">';
                            html +=
                                '<div class="service-item bg-white text-center mb-2 py-5 px-4">';
                            html += '<div class="row">';
                            html += '<div style="width: 20%;">';
                            html +=
                                '<img src="' +
                                row.tcImage +
                                '" alt="tujuan" style="width: 100%; height: auto;">';
                            html += "</div>";
                            html += '<div style="width: 70%">';
                            html += "<h3>" + row.tcName + "</h3>";
                            html += "<h4>" + row.Date + "</h4>";
                            html += '<div class="row">';
                            html += '<div style="width: 47%;">';
                            html += '<h3 class="mb-2">' + row.tcFrom + "</h3>";
                            html += '<h5 class="m-0">' + row.TimeDep + "</h5>";
                            html += "</div>";
                            html += '<div style="width: 6%;">';
                            html += "<h3></h3>";
                            html += "<h5>-</h5>";
                            html += "</div>";
                            html += '<div style="width: 47%;">';
                            html +=
                                '<h3 class="mb-2">' +
                                row.tcDestination +
                                "</h3>";
                            html += '<h5 class="m-0">' + row.TimeArr + "</h5>";
                            html += "</div>";
                            html += "</div>";
                            html += "</div>";
                            html +=
                                '<div style="width: 10%; display: flex; align-items: center; justify-content: center;" class="text-center">';
                            html +=
                                '<button class="btn btn-primary" data-toggle="modal" data-target="#myModal" onclick="fetchData(\'' +
                                row.ticketID +
                                "', 1)\">Purchase</button>";
                            html += "</div>";
                            html += "</div>";
                            html += "</div>";

                            kontenDiv.innerHTML += html;
                        });
                        break;
                    case 2:
                        response.rows.forEach(function (row) {
                            let html = "";
                            html +=
                                '<div class="col-lg-4 col-md-6 mb-4" data-toggle="modal" data-target="#myModal">';
                            html += '<div class="package-item bg-white mb-2">';
                            html +=
                                '<img class="img-fluid" src="' +
                                row.hImage +
                                '" alt="">';
                            html += '<div class="p-4">';
                            html +=
                                '<div class="d-flex justify-content-between mb-3">';
                            html +=
                                '<small class="m-0"><i class="fa fa-map-marker-alt text-primary mr-2"></i>' +
                                row.hName +
                                "</small>";
                            html +=
                                '<small class="m-0"><i class="fa fa-calendar-alt text-primary mr-2"></i>' +
                                row.hAmount +
                                " days</small>";
                            html +=
                                '<small class="m-0"><i class="fa fa-user text-primary mr-2"></i>' +
                                row.hRoomType +
                                "</small>";
                            html += "</div>";
                            html +=
                                '<a class="h5 text-decoration-none" href="" data-toggle="modal" data-target="#myModal" onclick="fetchData(\'' +
                                row.hotelID +
                                "', 2)\">Discover amazing places of the world with us</a>";
                            html += '<div class="border-top mt-4 pt-4">';
                            html +=
                                '<div class="d-flex justify-content-between">';
                            html +=
                                '<h6 class="m-0"><small>' +
                                row.Date +
                                "</small></h6>";
                            html +=
                                '<h5 class="m-0">Rp. ' + row.hPrice + "</h5>";
                            html += "</div>";
                            html += "</div>";
                            html += "</div>";
                            html += "</div>";
                            html += "</div>";

                            document.getElementById("konten").innerHTML += html;
                        });

                        break;
                    case 3:
                        response.rows.forEach(function (row) {
                            let html = "";
                            html +=
                                '<div class="col-lg-4 col-md-6 mb-4" data-toggle="modal" data-target="#myModal">';
                            html += '<div class="package-item bg-white mb-2">';
                            html +=
                                '<img class="img-fluid" src="' +
                                row.tpImage +
                                '" alt="">';
                            html += '<div class="p-4">';
                            html +=
                                '<div class="d-flex justify-content-between mb-3">';
                            html +=
                                '<small class="m-0"><i class="fa fa-map-marker-alt text-primary mr-2"></i>' +
                                row.tpName +
                                "</small>";
                            html +=
                                '<small class="m-0"><i class="fa fa-calendar-alt text-primary mr-2"></i>' +
                                row.tpSlot +
                                " Persons</small>";
                            html +=
                                '<small class="m-0"><i class="fa fa-user text-primary mr-2"></i>' +
                                row.Date +
                                "</small>";
                            html += "</div>";
                            html +=
                                '<a class="h5 text-decoration-none" href="" data-toggle="modal" data-target="#myModal" onclick="fetchData(\'' +
                                row.tourID +
                                "', 3)\">Discover amazing places of the world with us</a>";
                            html += '<div class="border-top mt-4 pt-4">';
                            html +=
                                '<div class="d-flex justify-content-between">';
                            html +=
                                '<h6 class="m-0"><small>' +
                                row.TimeDep +
                                "</small></h6>";
                            html +=
                                '<h5 class="m-0">Rp. ' + row.tpPrice + "</h5>";
                            html += "</div>";
                            html += "</div>";
                            html += "</div>";
                            html += "</div>";
                            html += "</div>";

                            document.getElementById("konten").innerHTML += html;
                        });

                        break;
                }
            } else {
                console.log("error response :(");
            }
        },
        error: function (xhr) {
            console.log("error send :(");
        },
    });
}
