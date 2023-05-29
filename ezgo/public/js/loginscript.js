const signUpButton = document.getElementById("signUp");
const signInButton = document.getElementById("signIn");
const container = document.getElementById("container");

signUpButton.addEventListener("click", () => {
    container.classList.add("right-panel-active");
});

signInButton.addEventListener("click", () => {
    container.classList.remove("right-panel-active");
});

$(document).ready(function () {
    $("#sub-btn").click(function (e) {
        e.preventDefault();
        let formData = $("#form2").serialize();
        $.ajax({
            type: "POST",
            url: "/login",
            data: formData,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (response) {
                switch (response.success) {
                    case 1:
                        console.log("titip");
                        window.location.href = "/home";
                        break;
                    case 2:
                        console.log("titio");
                        $(".useror").css("display", "block");
                        break;
                    case 3:
                        console.log("titia");
                        $(".userir").css("display", "block");
                        break;
                }
            },
            error: function (xhr, status, error) {
                console.log(error);
            },
        });
    });

    $("#submit-btn").click(function (e) {
        e.preventDefault();
        let formData = $("#form1").serialize();
        $.ajax({
            type: "POST",
            url: "/signup",
            data: formData,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (response) {
                switch (response.success) {
                    case 1:
                        console.log("titip");
                        $(".usiror").css("display", "block");
                        break;
                    case 2:
                        console.log("titio");
                        window.location.href = "/home";
                        break;
                }
            },
            error: function (xhr, status, error) {
                console.log(error);
            },
        });
    });
});
