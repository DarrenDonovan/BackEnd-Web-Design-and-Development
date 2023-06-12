function detail(id, orderid, kode, odi) {
    console.log(id);
    console.log(orderid);
    console.log(odi);
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
                document.getElementById("download").onclick = function (event) {
                    download(odi, kode);
                };
            } else {
                console.log("error response :(");
            }
        },
        error: function (xhr) {
            console.log("error send :(");
        },
    });
}

function download(orderid, kode) {
    console.log(orderid);
    let token = $('meta[name="csrf-token"]').attr("content");
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": token,
        },
    });
    $.ajax({
        url: "/download",
        type: "POST",
        data: { id: orderid, code: kode },
        xhrFields: {
            responseType: "blob", // Set the response type to 'blob'
        },
        success: function (response, status, xhr) {
            var blob = new Blob([response], { type: "application/pdf" });
            var link = document.createElement("a");
            link.href = window.URL.createObjectURL(blob);
            link.download = "struk.pdf";
            link.click();
        },
        error: function (xhr) {
            console.log("error send :(");
        },
    });
}

function getFilenameFromResponse(xhr) {
    var contentDispositionHeader = xhr.getResponseHeader("Content-Disposition");
    var filenameRegex = /filename[^;=\n]*=((['"]).*?\2|[^;\n]*)/;
    var matches = filenameRegex.exec(contentDispositionHeader);
    var filename = matches[1].replace(/['"]/g, "");
    return decodeURIComponent(filename);
}
