document.querySelectorAll(".city1").forEach((ct) => {
    ct.addEventListener("click", function () {
        switch (ct.getAttribute("name")) {
            case "acl":
                $.ajax({
                    url: city1.monas,
                    type: "GET",
                    async: true,
                    complete: function (xhr, status) {
                        window.location.replace(city1.monas);
                    },
                });
                break;
            case "ist":
                $.ajax({
                    url: city1.ancol,
                    type: "GET",
                    async: true,
                    complete: function (xhr, status) {
                        window.location.replace(city1.ancol);
                    },
                });
                break;
            case "mns":
                $.ajax({
                    url: city1.istiqlal,
                    type: "GET",
                    async: true,
                    complete: function (xhr, status) {
                        window.location.replace(city1.istiqlal);
                    },
                });
                break;
            case "gdk":
                $.ajax({
                    url: city1.glodok,
                    type: "GET",
                    async: true,
                    complete: function (xhr, status) {
                        window.location.replace(city1.glodok);
                    },
                });
                break;
            case "jct":
                $.ajax({
                    url: city1.cathedral,
                    type: "GET",
                    async: true,
                    complete: function (xhr, status) {
                        window.location.replace(city1.cathedral);
                    },
                });
                break;
            case "tmi":
                $.ajax({
                    url: city1.tmii,
                    type: "GET",
                    async: true,
                    complete: function (xhr, status) {
                        window.location.replace(city1.tmii);
                    },
                });
                break;
        }
    });
});
