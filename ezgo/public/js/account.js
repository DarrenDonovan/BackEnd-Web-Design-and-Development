function detail(id, orderid, kode) {
    console.log(id);
    console.log(orderid);
    console.log(kode);
    let token = $('meta[name="csrf-token"]').attr("content");
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": token,
        },
    });
    $.ajax({
        url: "/details",
        type: "POST",
        data: { id: id, od: orderid, kode: kode },
        success: function (response) {
            if (response.success) {
                let item = response.item;
                document.getElementById("idnya").innerText = item.id;
                document.getElementById("label").innerText = item.id;
                document.getElementById("namanya").innerText = item.name;
                document.getElementById("jumlahnya").innerText = item.total;
                document.getElementById("harga").innerText = item.price;
                document.getElementById("price").innerText = item.totPrice;
            } else {
                console.log("error response :(");
            }
        },
        error: function (xhr) {
            console.log("error send :(");
        },
    });
}
