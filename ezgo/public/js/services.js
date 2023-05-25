document.querySelectorAll(".product").forEach((ct) => {
    ct.addEventListener("click", function (event) {
        console.log("helo");
        switch (ct.getAttribute("name")) {
            case "tix":
                event.preventDefault();
                history.pushState(null, null, products.ticket);
                $.ajax({
                    url: products.ticket,
                    type: "GET",
                    async: true,
                    complete: function (xhr, status) {
                        window.location.replace(products.ticket);
                    },
                });
                break;
            case "htl":
                event.preventDefault();
                history.pushState(null, null, products.hotel);
                $.ajax({
                    url: products.hotel,
                    type: "GET",
                    async: true,
                    complete: function (xhr, status) {
                        window.location.replace(products.hotel);
                    },
                });
                break;
            case "tur":
                event.preventDefault();
                history.pushState(null, null, products.tour);
                $.ajax({
                    url: products.tour,
                    type: "GET",
                    async: true,
                    complete: function (xhr, status) {
                        window.location.replace(products.tour);
                    },
                });
                break;
        }
    });
});
