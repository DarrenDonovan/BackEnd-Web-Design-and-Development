document.querySelectorAll(".obj").forEach((ob) => {
    ob.addEventListener("click", function () {
        switch (ob.getAttribute("name")) {
            case "jkt":
                event.preventDefault();
                history.pushState(null, null, cityRoutes.city1);
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
                event.preventDefault();
                history.pushState(null, null, cityRoutes.city2);
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
                event.preventDefault();
                history.pushState(null, null, cityRoutes.city3);
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
                event.preventDefault();
                history.pushState(null, null, cityRoutes.city4);
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
