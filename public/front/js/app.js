"use strict";

(function ($) {
    /*------------------
        Preloader
    --------------------*/
    $(window).on("load", function () {
        $(".loader").fadeOut();
        $("#preloder").delay(200).fadeOut("slow");
    });

    /*------------------
        Background Set
    --------------------*/
    $(".set-bg").each(function () {
        var bg = $(this).data("setbg");
        $(this).css("background-image", "url(" + bg + ")");
    });

    /*------------------
		Navigation
	--------------------*/
    $(".mobile-menu").slicknav({
        prependTo: "#mobile-menu-wrap",
        allowParentLinks: true,
    });

    /*------------------
        Hero Slider
    --------------------*/
    $(".hero-items").owlCarousel({
        loop: true,
        margin: 0,
        nav: true,
        items: 1,
        dots: false,
        animateOut: "fadeOut",
        animateIn: "fadeIn",
        navText: [
            '<i class="ti-angle-left"></i>',
            '<i class="ti-angle-right"></i>',
        ],
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: true,
    });

    /*------------------
        Product Slider
    --------------------*/
    $(".product-slider").owlCarousel({
        loop: true,
        margin: 25,
        nav: true,
        items: 4,
        dots: true,
        navText: [
            '<i class="ti-angle-left"></i>',
            '<i class="ti-angle-right"></i>',
        ],
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: true,
        responsive: {
            0: {
                items: 1,
            },
            576: {
                items: 2,
            },
            992: {
                items: 2,
            },
            1200: {
                items: 3,
            },
        },
    });

    /*-----------------------
       Product Single Slider
    -------------------------*/
    $(".ps-slider").owlCarousel({
        loop: false,
        margin: 10,
        nav: true,
        items: 3,
        dots: false,
        navText: [
            '<i class="fa fa-angle-left"></i>',
            '<i class="fa fa-angle-right"></i>',
        ],
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: true,
    });

    /*-------------------
		Range Slider
	--------------------- */
    var rangeSlider = $(".price-range"),
        minamount = $("#minamount"),
        maxamount = $("#maxamount"),
        minPrice = rangeSlider.data("min"),
        maxPrice = rangeSlider.data("max"),
        minValue =
            rangeSlider.data("min-value") !== ""
                ? rangeSlider.data("min-value")
                : minPrice,
        maxValue =
            rangeSlider.data("max-value") !== ""
                ? rangeSlider.data("max-value")
                : maxPrice;
    rangeSlider.slider({
        range: true,
        min: minPrice,
        max: maxPrice,
        values: [minValue, maxValue],
        slide: function (event, ui) {
            minamount.val("$" + ui.values[0]);
            maxamount.val("$" + ui.values[1]);
        },
    });
    minamount.val("$" + rangeSlider.slider("values", 0));
    maxamount.val("$" + rangeSlider.slider("values", 1));

    /*-------------------
		Radio Btn
	--------------------- */
    $(".fw-size-choose .sc-item label, .pd-size-choose .sc-item label").on(
        "click",
        function () {
            $(
                ".fw-size-choose .sc-item label, .pd-size-choose .sc-item label"
            ).removeClass("active");
            $(this).addClass("active");
        }
    );

    /*-------------------
		Nice Select
    --------------------- */
    $(".sorting, .p-show").niceSelect();

    /*-------------------
		Quantity change
	--------------------- */
    var proQty = $(".pro-qty");
    proQty.prepend('<span class="dec qtybtn">-</span>');
    proQty.append('<span class="inc qtybtn">+</span>');
    proQty.on("click", ".qtybtn", function () {
        var $button = $(this);
        var oldValue = $button.parent().find("input").val();
        if ($button.hasClass("inc")) {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            // Don't allow decrementing below zero
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }
        $button.parent().find("input").val(newVal);

        // Update cart
        var rowId = $button.parent().find("input").data("rowid");
        updateCart(rowId, newVal);
    });
})(jQuery);

function addCart(productId) {
    $.ajax({
        type: "GET",
        url: "cart/add",
        data: { productId: productId },
        success: function (response) {
            $(".cart-count").text(response["count"]);
            $(".cart-price").text("$" + response["total"]);
            $(".select-total h5").text("$" + response["total"]);

            var cartHover_tbody = $(".select-items tbody");
            var cartHover_existItem = cartHover_tbody.find(
                "tr " + "[data-rowId = '" + response["cart"].rowId + "']"
            );

            if (cartHover_existItem.length) {
                cartHover_existItem
                    .find(".product-selected p")
                    .text(
                        "$" +
                            response["cart"].price.toFixed(2) +
                            " x" +
                            response["cart"].quantity
                    );
            } else {
                var newItem =
                    '<tr data-rowId="' +
                    response["cart"].rowId +
                    '">\n' +
                    '   <td class="si-pic">\n' +
                    '       <img style="height: 70px;"\n' +
                    '           src="' +
                    response["cart"].options.images[0].path +
                    '"\n' +
                    '           alt="">\n' +
                    "   </td>\n " +
                    '   <td class="si-text">\n' +
                    '       <div class="product-selected">\n' +
                    "           <p>$" +
                    response["cart"].price.toFixed(2) +
                    " x " +
                    response["cart"].quantity +
                    "</p>\n " +
                    "           <h6>" +
                    response["cart"].name +
                    "</h6> \n " +
                    "       </div>\n " +
                    "   </td>\n " +
                    '   <td class="si-close">\n' +
                    "       <i onclick=\"removeCart('" +
                    response["cart"].rowId +
                    '\')" class="ti-close"></i>\n' +
                    "   </td>\n " +
                    "</tr>";

                cartHover_tbody.append(newItem);
            }

            alert("Thêm sản phẩm " + response["cart"].name + " vào giỏ hàng thành công");
            window.location.reload();
        },
        error: function (response) {
            alert("Thêm sản phẩm vào giỏ hàng thất bại");
            console.log(response);
        },
    });
}

function removeCart(rowId) {
    $.ajax({
        type: "GET",
        url: "cart/delete",
        data: { rowId: rowId },
        success: function (response) {
            //Xu ly cart hover
            $(".cart-count").text(response["count"]);
            $(".cart-price").text("$" + response["total"]);
            $(".select-total h5").text("$" + response["total"]);

            var cartHover_tbody = $(".select-items tbody");
            var cartHover_existItem = cartHover_tbody.find(
                "tr" + "[data-rowId='" + rowId + "']"
            );
            cartHover_existItem.remove();

            //Xu ly trong cart
            var cart_tbody = $(".cart-table tbody");
            var cart_existItem = cart_tbody.find(
                "tr" + "[data-rowId='" + rowId + "']"
            );
            cart_existItem.remove();

            alert("delete successful" + response["cart"].name);
            console.log(response);
        },
        error: function (response) {
            alert("Xoá sản phẩm khỏi giỏ hàng thất bại");
            console.log(response);
        },
    });
}

function updateCart(rowId, quantity) {
    $.ajax({
        type: "GET",
        url: "cart/update",
        data: { rowId: rowId, quantity: quantity },
        success: function (response) {
            //Xu ly cart hover
            $(".cart-count").text(response["count"]);
            $(".cart-price").text("$" + response["total"]);
            $(".select-total h5").text("$" + response["total"]);

            var cartHover_tbody = $(".select-items tbody");
            var cartHover_existItem = cartHover_tbody.find(
                "tr" + "[data-rowId = '" + rowId + "']"
            );
            if (quantity === 0) {
                cartHover_existItem.remove();
            } else {
                cartHover_existItem
                    .find(".product-selected p")
                    .text(
                        "$" +
                            response["cart"].price.toFixed(2) +
                            " x " +
                            response["cart"].quantity
                    );
            }

            //Xu ly trong cart
            var cart_tbody = $(".cart-table tbody");
            var cart_existItem = cart_tbody.find(
                "tr" + "[data-rowId='" + rowId + "']"
            );
            if (quantity === 0) {
                cart_existItem.remove();
            } else {
                cart_existItem
                    .find(".total-price")
                    .text(
                        "$" +
                            (
                                response["cart"].price *
                                response["cart"].quantity
                            ).toFixed(2)
                    );
            }

            $(".subtotal span").text("$" + response["subtotal"]);
            $(".cart-total span").text("$" + response["total"]);
        },
        error: function (response) {
            console.log(response);
        },
    });
}
