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
                    html +=
                        '<button class="btn btn-outline-danger" onclick="Delete(\'' +
                        blog.blogID +
                        "', 1)\">";
                    html +=
                        '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">';
                    html +=
                        '<path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>';
                    html += "</svg>";
                    html += "</button>";
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
                        html += '<div class="likecontainer pb-4">';
                        html +=
                            '<button class="delbutton btn btn-outline-danger"onclick="Delete(\'' +
                            comment.blogID +
                            "', 2)\">";
                        html +=
                            '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">';
                        html +=
                            '<path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>';
                        html += "</svg>";
                        html += "</button>";
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

function show(id) {
    var commentsdiv = document.getElementById(id);
    if (commentsdiv.style.display === "none") {
        commentsdiv.style.display = "block";
    } else {
        commentsdiv.style.display = "none";
    }
}

function Delete(id, code) {
    let item = "";

    switch (code) {
        case 1:
            item = "post";
            break;
        case 2:
            item = "comment";
            break;
    }

    let token = $('meta[name="csrf-token"]').attr("content");
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": token,
        },
    });
    $.ajax({
        url: "/Del",
        type: "POST",
        data: { id: id, code: code },
        success: function (response) {
            if (response.success) {
                alert(item + "has been deleted!");
                location.reload();
            } else {
                console.log("error response :(");
            }
        },
        error: function (xhr) {
            console.log("error send :(");
        },
    });
}
