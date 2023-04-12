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

document.querySelectorAll(".city2").forEach((ct) => {
    ct.addEventListener("click", function () {
        switch (ct.getAttribute("name")) {
            case "cgd":
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

document.querySelectorAll(".city3").forEach((ct) => {
    ct.addEventListener("click", function () {
        switch (ct.getAttribute("name")) {
            case "10n":
                $.ajax({
                    url: city3.sepnovember,
                    type: "GET",
                    async: true,
                    complete: function (xhr, status) {
                        window.location.replace(city3.sepnovember);
                    },
                });
                break;
            case "arb":
                $.ajax({
                    url: city3.arab,
                    type: "GET",
                    async: true,
                    complete: function (xhr, status) {
                        window.location.replace(city3.arab);
                    },
                });
                break;
            case "klt":
                $.ajax({
                    url: city3.kelenteng,
                    type: "GET",
                    async: true,
                    complete: function (xhr, status) {
                        window.location.replace(city3.kelenteng);
                    },
                });
                break;
            case "pkw":
                $.ajax({
                    url: city3.pakuwon,
                    type: "GET",
                    async: true,
                    complete: function (xhr, status) {
                        window.location.replace(city3.pakuwon);
                    },
                });
                break;
            case "smp":
                $.ajax({
                    url: city3.sampoerna,
                    type: "GET",
                    async: true,
                    complete: function (xhr, status) {
                        window.location.replace(city3.sampoerna);
                    },
                });
                break;
            case "tgu":
                $.ajax({
                    url: city3.tugu,
                    type: "GET",
                    async: true,
                    complete: function (xhr, status) {
                        window.location.replace(city3.tugu);
                    },
                });
                break;
        }
    });
});
