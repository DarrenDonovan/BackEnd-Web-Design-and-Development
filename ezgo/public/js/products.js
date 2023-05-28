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
                                    "tcFromDestination"
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
                                break;
                            case 3:
                                fetchImage(item.tpImage).then(function (pic) {
                                    document.getElementById("hImage").src = pic;
                                });
                                document.getElementById("productID").innerText =
                                    item.productID;
                                document.getElementById("tpName").innerText =
                                    item.tpName;
                                document.getElementById(
                                    "tpFromDestination"
                                ).innerText = item.tpMeeting;
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
    if (document.getElementById("numedit").value > 1) {
        document.getElementById("numedit").value--;
        let priceNow = parseInt(document.getElementById("price").textContent);
        priceNow -= parseInt(harga);
        document.getElementById("price").textContent = priceNow;
        event.preventDefault();
    } else {
        event.preventDefault();
    }
}
