$(window).on("load", function () {
    $(".pre.loader").fadeOut(function () {
        $(this).removeClass("pre");
    });
});

$(window)
    .scroll(function () {
        $("[animate]").each(function () {
            var top_of_element = $(this).offset().top;
            var bottom_of_element =
                $(this).offset().top + $(this).outerHeight();
            var bottom_of_screen =
                $(window).scrollTop() + $(window).innerHeight();
            var top_of_screen = $(window).scrollTop();

            if (
                bottom_of_screen > top_of_element &&
                top_of_screen < bottom_of_element
            ) {
                $(this).addClass("show");
            }
        });
    })
    .scroll();

$(document).mousemove(function (getCurrentPos) {
    var xCord = getCurrentPos.clientX;
    var yCord = getCurrentPos.clientY;

    var xPercent = xCord / window.innerWidth;
    var yPercent = yCord / window.innerHeight;

    $(".login-card-shadow").css(
        "transform",
        "translate3d(" +
            (20 * xPercent + 10) +
            "px, " +
            (20 * yPercent + 10) +
            "px, " +
            (25 * yPercent + 5) +
            "px)"
    );
});

var toastTimeout;
$("#login-form").on("submit", function (e) {
    e.preventDefault();

    var form = $(this);
    var toast = $(".toast");
    var loader = $(".loader");

    loader.fadeIn();
    toast.removeClass("show");
    clearTimeout(toastTimeout);

    $.ajax({
        method: "post",
        data: form.serialize(),
        success: function () {
            window.location.href = "products";
        },
        error: function (r) {
            toast.html("");

            for (let inputName in r.responseJSON.errors) {
                for (
                    let i = 0;
                    i < r.responseJSON.errors[inputName].length;
                    i++
                ) {
                    toast.append(
                        '<p class="mb-0">' +
                            r.responseJSON.errors[inputName][i] +
                            "</p>"
                    );
                }
            }

            loader.fadeOut(function () {
                toast.addClass("show");

                toastTimeout = setTimeout(function () {
                    toast.removeClass("show");
                }, 3000);
            });
        },
    });
});

$(document).on("click", ".filter-title", function () {
    $(this).closest(".filter-wrapper").toggleClass("open");
    $(this).closest(".filter-wrapper").find(".filter-subitems").slideToggle();
});

$(document).on("click", ".filter-single", function () {
    $('.category-content').addClass('d-none');
    var productid = $(this).data('id');
    $("product-"+ productid).toggleClass("open");
    $(".category-content.product-"+ productid).removeClass('d-none');
});

$(document).on("click", ".menuClear", function () {
   $(".category-label input").prop("checked", false);
});


$(document).on("change", ".products-filters-wrapper form input", function () {
    $('.products-filters-wrapper input[name="page"]').val(1);
    $(this).closest("form").submit();
});

$(document).on("change", ".filter-products input", function () {
    $('.filter-products input[name="page"]').val(1);
    console.log($('.filter-products input[name="page"]').val(1));
    $(this).closest("form").submit();
});

$(document).on(
    "click",
    ".products-pagination-wrapper a.page-link",
    function (e) {
        e.preventDefault();
        $('.products-filters-wrapper input[name="page"]').val(
            $(this).attr("href").split("page=")[1]
        );
        $(".products-filters-wrapper form").submit();
    }
);

$(document).on("submit", ".products-filters-wrapper form", function (e) {
    e.preventDefault();

    var form = $(this);
    var loader = $(".loader");
    var url = "products?" + form.serialize();

    loader.fadeIn();
    window.history.pushState("", "", url);

    $.ajax({
        url: url,
        success: function (r) {
            $("#products-grid").html(r);
            refreshItemsLinks();
            loader.fadeOut();
            $(window).scroll();
        },
    });
});



$(".menuButton").on("click", function (e) {
    e.preventDefault();
    $(".burgerMenu").fadeToggle(200);
    if($(".category-content").children(':visible').length == 0 ){
        $(".category-content").first().removeClass("d-none");
    }
});


function refreshItemsLinks() {
    $('.product-grid-item').each(function () {
        var gridItemA = $(this).find('> a');
        gridItemA.attr('href', gridItemA.data('href') + "?" + $(".products-filters-wrapper form").serialize())
    });
}

refreshItemsLinks();