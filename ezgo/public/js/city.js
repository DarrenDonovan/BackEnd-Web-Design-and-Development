document.querySelectorAll(".city1").forEach((ct) => {
    ct.addEventListener("click", function () {
        switch (ct.getAttribute("name")) {
            case "acl":
                $.ajax({
                    url: cityRoutes.city1,
                    type: "GET",
                    async: true,
                    complete: function (xhr, status) {
                        window.location.replace(cityRoutes.city1);
                    },
                });
                break;
            case "ist":
                $.ajax({
                    url: cityRoutes.city2,
                    type: "GET",
                    async: true,
                    complete: function (xhr, status) {
                        window.location.replace(cityRoutes.city2);
                    },
                });
                break;
            case "mns":
                $.ajax({
                    url: cityRoutes.city3,
                    type: "GET",
                    async: true,
                    complete: function (xhr, status) {
                        window.location.replace(cityRoutes.city3);
                    },
                });
                break;
            case "gdk":
                $.ajax({
                    url: cityRoutes.city4,
                    type: "GET",
                    async: true,
                    complete: function (xhr, status) {
                        window.location.replace(cityRoutes.city4);
                    },
                });
                break;
            case "jct":
                $.ajax({
                    url: cityRoutes.city4,
                    type: "GET",
                    async: true,
                    complete: function (xhr, status) {
                        window.location.replace(cityRoutes.city4);
                    },
                });
                break;
            case "tmi":
                $.ajax({
                    url: cityRoutes.city4,
                    type: "GET",
                    async: true,
                    complete: function (xhr, status) {
                        window.location.replace(cityRoutes.city4);
                    },
                });
                break;
        }
    });
});
