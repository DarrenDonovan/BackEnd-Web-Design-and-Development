document
    .getElementById("showCommentsButton")
    .addEventListener("click", function () {
        var commentsdiv = document.getElementById("commentsdiv");
        if (commentsdiv.style.display === "none") {
            commentsdiv.style.display = "block";
        } else {
            commentsdiv.style.display = "none";
        }
    });

function sort(kode) {
    let dest;

    switch (kode) {
        case 1:
            dest = "jkt";
            break;
        case 2:
            dest = "bdg";
            break;
        case 3:
            dest = "sby";
            break;
        case 4:
            dest = "dps";
            break;
    }

    let token = $('meta[name="csrf-token"]').attr("content");
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": token,
        },
    });
    $.ajax({
        url: "/imag",
        type: "POST",
        data: { dest: dest },
        success: function (response) {
            if (response.success) {
                let kontenDiv = document.getElementById("konten");
                kontenDiv.innerHTML = "";

                response.rows.forEach(function (row) {});
            } else {
                console.log("error response :(");
            }
        },
        error: function (xhr) {
            console.log("error send :(");
        },
    });
}
