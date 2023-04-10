document.querySelectorAll(".city1").forEach((ct) => {
    ct.addEventListener("click", function () {
        switch (ct.getAttribute("name")) {
            case "acl":
                event.preventDefault();
                history.pushState(null, null, city1.ancol);
                $.ajax({
                    url: city1.ancol,
                    type: "GET",
                    async: true,
                    complete: function (xhr, status) {
                        window.location.replace(city1.ancol);
                    },
                });
                break;
            case "ist":
                event.preventDefault();
                history.pushState(null, null, city1.istiqlal);
                $.ajax({
                    url: city1.istiqlal,
                    type: "GET",
                    async: true,
                    complete: function (xhr, status) {
                        window.location.replace(city1.istiqlal);
                    },
                });
                break;
            case "mns":
                event.preventDefault();
                history.pushState(null, null, city1.monas);
                $.ajax({
                    url: city1.monas,
                    type: "GET",
                    async: true,
                    complete: function (xhr, status) {
                        window.location.replace(city1.monas);
                    },
                });
                break;
            case "gdk":
                event.preventDefault();
                history.pushState(null, null, city1.glodok);
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
                event.preventDefault();
                history.pushState(null, null, city1.cathedral);
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
                event.preventDefault();
                history.pushState(null, null, city1.tmii);
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

document.querySelectorAll(".city2").forEach((ct) => {
    ct.addEventListener("click", function () {
        switch (ct.getAttribute("name")) {
            case "cgd":
                event.preventDefault();
                history.pushState(null, null, city2.cigadung);
                $.ajax({
                    url: city2.cigadung,
                    type: "GET",
                    async: true,
                    complete: function (xhr, status) {
                        window.location.replace(city2.cigadung);
                    },
                });
                break;
            case "kar":
                event.preventDefault();
                history.pushState(null, null, city2.kiara);
                $.ajax({
                    url: city2.kiara,
                    type: "GET",
                    async: true,
                    complete: function (xhr, status) {
                        window.location.replace(city2.kiara);
                    },
                });
                break;
            case "kln":
                event.preventDefault();
                history.pushState(null, null, city2.kuliner);
                $.ajax({
                    url: city2.kuliner,
                    type: "GET",
                    async: true,
                    complete: function (xhr, status) {
                        window.location.replace(city2.kuliner);
                    },
                });
                break;
            case "slw":
                event.preventDefault();
                history.pushState(null, null, city2.siliwangi);
                $.ajax({
                    url: city2.siliwangi,
                    type: "GET",
                    async: true,
                    complete: function (xhr, status) {
                        window.location.replace(city2.siliwangi);
                    },
                });
                break;
            case "tng":
                event.preventDefault();
                history.pushState(null, null, city2.tangga);
                $.ajax({
                    url: city2.tangga,
                    type: "GET",
                    async: true,
                    complete: function (xhr, status) {
                        window.location.replace(city2.tangga);
                    },
                });
                break;
            case "wtl":
                event.preventDefault();
                history.pushState(null, null, city2.wetland);
                $.ajax({
                    url: city2.wetland,
                    type: "GET",
                    async: true,
                    complete: function (xhr, status) {
                        window.location.replace(city2.wetland);
                    },
                });
                break;
        }
    });
});
