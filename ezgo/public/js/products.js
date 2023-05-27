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
                        fetchImage(item.tcImage).then(function (pic) {
                            document.getElementById("tcImage").src = pic;
                        });
                        document.getElementById("productID").innerText =
                            item.productID;
                        document.getElementById("tcName").innerText =
                            item.tcName;
                        document.getElementById("tcFromDestination").innerText =
                            item.tcFrom + " To " + item.tcDestination;
                        document.getElementById("TimeDepArr").innerText =
                            item.TimeDep + " - " + item.TimeArr;
                        document.getElementById("decrementBtn").onclick =
                            function (event) {
                                decrement(event, item.tcSellingPrice);
                            };
                        document.getElementById("incrementBtn").onclick =
                            function (event) {
                                increment(event, item.tcSellingPrice);
                            };
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
