function show(id) {
    var commentsdiv = document.getElementById(id);
    if (commentsdiv.style.display === "none") {
        commentsdiv.style.display = "block";
    } else {
        commentsdiv.style.display = "none";
    }
}

function sort(kode) {
    let dest;

    switch (kode) {
        case 1:
            dest = "jkt";
            document.getElementById("blogTitle").innerText = "Jakarta Blog";
            break;
        case 2:
            dest = "bdg";
            document.getElementById("blogTitle").innerText = "Bandung Blog";
            break;
        case 3:
            dest = "sby";
            document.getElementById("blogTitle").innerText = "Surabaya Blog";
            break;
        case 4:
            dest = "dps";
            document.getElementById("blogTitle").innerText = "Denpasar Blog";
            break;
    }

    let token = $('meta[name="csrf-token"]').attr("content");
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": token,
        },
    });
    $.ajax({
        url: "/change",
        type: "POST",
        data: { dest: dest },
        success: function (response) {
            if (response.success) {
                let kontenDiv = document.getElementById("konten");
                kontenDiv.innerHTML = "";

                let i = 0;

                response.blogs.forEach(function (blog) {
                    let html = '<div class="pb-3">';
                    html += '<div class="blog-item">';
                    html += '<div class="position-relative">';
                    html +=
                        '<img class="img-fluid w-100" src="' +
                        blog.bImage +
                        '" alt="">';
                    html += "</div>";
                    html += "</div>";

                    html +=
                        '<div class="bg-white mb-3" style="padding: 30px;">';
                    html += '<div class="d-flex mb-3">';
                    html +=
                        '<a class="text-primary text-uppercase text-decoration-none" href="">' +
                        blog.cName +
                        "</a>";
                    html += '<span class="text-primary px-2">|</span>';
                    html +=
                        '<a class="text-primary text-uppercase text-decoration-none" href="">' +
                        blog.branch +
                        "</a>";
                    html += "</div>";
                    html += '<h2 class="mb-3">' + blog.bTitle + "</h2>";
                    html += "<p>" + blog.bContent + "</p>";
                    html += '<div class="likecontainer">';
                    html +=
                        '<button class="likebutton btn btn-outline-danger" onclick="like(\'' +
                        blog.blogID +
                        "')\">";
                    html +=
                        '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">';
                    html +=
                        '<path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>';
                    html += "</svg>";
                    html += "</button>";
                    html +=
                        '<p class="likecount" id="count' +
                        blog.blogID +
                        '">' +
                        blog.bLikes +
                        "</p>";
                    html += "</div>";
                    html += "</div>";
                    html += "</div>";

                    html += '<div class="position-relative mb-4">';
                    html +=
                        '<input type="text" id="cmt' +
                        blog.blogID +
                        '" class="contenttext mb-4" placeholder="Add Comments Here">';

                    html += '<div class="button-container">';
                    html +=
                        '<input type="button" value="Post" onclick="comment(\'' +
                        blog.blogID +
                        '\')" class="btn btn-primary">';

                    html += '<input type="button" value="Cancel">';
                    html += "</div>";
                    html += "</div>";

                    html += "<div>";
                    html +=
                        '<button id="showCommentsButton" class="mb-3 btn btn-primary" onclick="show(\'' +
                        blog.blogID +
                        "')\">";
                    html +=
                        '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-dots" viewBox="0 0 16 16">';
                    html +=
                        '<path d="M5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>';
                    html +=
                        '<path d="m2.165 15.803-.003-.007C1.21 15.418.12 14.676.077 13.55c-.073-2.263 1.74-4.487 3.926-6.885C6.37 4.257 8.256 2.067 8.232.393 8.218-.22 6.396.428 5.51 1.332a25.152 25.152 0 0 0-1.115 1.31A14.125 14.125 0 0 1 5 8c0 .597.06 1.185.176 1.765.042.147.187.367.405.598a20.268 20.268 0 0 0 .952-1.56zm1.373-3.49a.5.5 0 0 1 .387-.22c2.713-.38 5.134-.38 7.045 0a.5.5 0 0 1 .387.22l1.724 2.586c.195.292.235.663.103.983l-.442 1.33 1.312-1.05c.23-.184.538-.16.75.054l1.637 1.32a.48.48 0 0 1 .158.394l.298 3.29a.498.498 0 0 1-.608.538l-2.256-.39a.482.482 0 0 1-.372-.265l-1.662-3.593c-.12-.26-.372-.44-.66-.457l-2.96-.154c-.29-.015-.556-.222-.622-.512L7.96 10.11a.5.5 0 0 1 .103-.982l1.313-.13-.442-1.33a.5.5 0 0 1 .387-.763h3.888z"/>';
                    html += "</svg> Show Comments";
                    html += "</button>";
                    html += "</div>";
                    html +=
                        '<div class="row pb-3" id="' +
                        blog.blogID +
                        '" style="display: none;">';
                    html += '<div class="col mb-4 pb-2">';
                    html +=
                        '<div id="cmt' +
                        blog.blogID +
                        'div" class="bg-white p-4">';

                    html += "<h4>Comments</h4>";

                    response.comments[i].forEach(function (comment) {
                        html += "<div>";
                        html +=
                            '<p class="font-weight-bold pt-3">' +
                            comment.cName +
                            "</p>";
                        html += "<p>" + comment.ctContent + "</p>";
                        html += "</div>";
                    });

                    html += "</div>";
                    html += "</div>";
                    html += "</div>";

                    kontenDiv.innerHTML += html;
                    i++;
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

function like(id) {
    console.log("count" + id);
    let amount = document.getElementById("count" + id).value;
    if (amount == null) {
        amount = "0";
    }
    let value = parseInt(amount);
    value++;

    let token = $('meta[name="csrf-token"]').attr("content");
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": token,
        },
    });
    $.ajax({
        url: "/like",
        type: "POST",
        data: { id: id },
        success: function (response) {
            if (response.success) {
                document.getElementById("count" + id).innerText = value;
            } else {
                console.log("error response :(");
            }
        },
        error: function (xhr) {
            console.log("error send :(");
        },
    });
}

function comment(id) {
    console.log("cmt" + id);
    let comment = document.getElementById("cmt" + id).value;

    let token = $('meta[name="csrf-token"]').attr("content");
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": token,
        },
    });
    $.ajax({
        url: "/comment",
        type: "POST",
        data: { id: id, comment: comment },
        success: function (response) {
            if (response.success) {
                let html = "<div>";
                html +=
                    '<p class="font-weight-bold pt-3">' +
                    response.user +
                    "</p>";
                html += "<p>" + comment + "</p>";
                html += "</div>";
                document.getElementById("cmt" + id + "div").innerHTML += html;
                document.getElementById("cmt" + id).value = "";
            } else {
                console.log("error response :(");
            }
        },
        error: function (xhr) {
            console.log("error send :(");
        },
    });
}

function submitForm() {
    $("#myModal").modal("hide");
}
