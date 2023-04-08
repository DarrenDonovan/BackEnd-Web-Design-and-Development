document.querySelectorAll(".obj").forEach((ob) => {
    ob.addEventListener("click", function () {
        switch (ob.getAttribute("name")) {
            case "jkt":
                $.ajax({
                    url: cityRoutes.city1,
                    type: "GET",
                    async: true,
                    complete: function (xhr, status) {
                        window.location.replace(cityRoutes.city1);
                    },
                });
                break;
            case "bdg":
                $.ajax({
                    url: cityRoutes.city2,
                    type: "GET",
                    async: true,
                    complete: function (xhr, status) {
                        window.location.replace(cityRoutes.city2);
                    },
                });
                break;
            case "srby":
                $.ajax({
                    url: cityRoutes.city3,
                    type: "GET",
                    async: true,
                    complete: function (xhr, status) {
                        window.location.replace(cityRoutes.city3);
                    },
                });
                break;
            case "dpsr":
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
