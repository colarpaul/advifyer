$(document).ready(function () {
    //breakdown the labels into single character spans
    $(".flp label").each(function () {
        var sop = '<span class="ch">'; //span opening
        var scl = '</span>'; //span closing
        //split the label into single letters and inject span tags around them
        $(this).html(sop + $(this).html().split("").join(scl + sop) + scl);
        //to prevent space-only spans from collapsing
        $(".ch:contains(' ')").html("&nbsp;");
    })

    var d;
//animation time
    $(".flp input").focus(function () {
        //calculate movement for .ch = half of input height
        var tm = $(this).outerHeight() / 2 * -1 + "px";
        //label = next sibling of input
        //to prevent multiple animation trigger by mistake we will use .stop() before animating any character and clear any animation queued by .delay()
        $(this).next().addClass("focussed").children().stop(true).each(function (i) {
            d = i * 50;//delay
            $(this).delay(d).animate({top: tm}, 200, 'easeOutBack');
        })
    })
    $(".flp input").blur(function () {
        //animate the label down if content of the input is empty
        if ($(this).val() == "") {
            $(this).next().removeClass("focussed").children().stop(true).each(function (i) {
                d = i * 50;
                $(this).delay(d).animate({top: 0}, 500, 'easeInOutBack');
            })
        }
    })

    $('.pencil-edit-icon').on('click', function () {
        var productId = $(this).data('product');
        var token = $('#editProductToken').val();

        var isDisabled = $("input[data-product='" + productId + "']").prop('disabled');
        if (isDisabled) {
            $(this).removeClass('fa-pencil').addClass('fa-check');
            $("input[data-product='" + productId + "']").prop("disabled", false);
            $("input[data-product='" + productId + "']").css("border", "2px solid #00cfff");
            $("input[data-product='" + productId + "']").css("background", "none");

            $("input[data-category='" + productId + "']").prop("disabled", false);
            $("input[data-category='" + productId + "']").css("border", "2px solid #00cfff");
            $("input[data-category='" + productId + "']").css("background", "none");

            $("input[data-price='" + productId + "']").prop("disabled", false);
            $("input[data-price='" + productId + "']").css("border", "2px solid #00cfff");
            $("input[data-price='" + productId + "']").css("background", "none");
        } else {
            $(this).removeClass('fa-check').addClass('fa-pencil');
            $("input[data-product='" + productId + "']").prop("disabled", true);
            $("input[data-product='" + productId + "']").css("border", "none");
            $("input[data-product='" + productId + "']").css("background", "transparent");

            $("input[data-category='" + productId + "']").prop("disabled", true);
            $("input[data-category='" + productId + "']").css("border", "none");
            $("input[data-category='" + productId + "']").css("background", "transparent");

            $("input[data-price='" + productId + "']").prop("disabled", true);
            $("input[data-price='" + productId + "']").css("border", "none");
            $("input[data-price='" + productId + "']").css("background", "transparent");

            var productName = $("input[data-product='" + productId + "']").val();
            var productCategory = $("input[data-category='" + productId + "']").val();
            var productPrice = $("input[data-price='" + productId + "']").val();

            $.ajax({
                type: "POST",
                url: '/product/edit/' + productId,
                data: {
                    '_token': token,
                    'productName': productName,
                    'productCategory': productCategory,
                    'productPrice': productPrice
                }
            });
        }

    });

    $('#buttonsOption').change(function () {
        $('.buttonsType').hide();
        $('.' + $(this).val()).show();
    });


    $('#viewCodes-codeTypeField').change(function () {
        // EAN 13
        if ($(this).val() == 1) {
            $('#viewCodes-codeIdField').attr("minlength", 13);
            $('#viewCodes-codeIdField').attr("maxlength", 13);
        }
        // EAN 8
        if ($(this).val() == 2) {
            $('#viewCodes-codeIdField').attr("minlength", 8);
            $('#viewCodes-codeIdField').attr("maxlength", 8);
        }
    });

    $("#example1").DataTable();
    $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false
    });

    $("#drag-button-1, #drag-button-2, #drag-button-3, #drag-button-4, #drag-button-5, #drag-button-6").draggable({revert: true});
    $("#button-drop-box-1").droppable({
        drop: function (event, ui) {
            $(this).html(ui.draggable.remove());
            $(this).droppable('destroy');
            $(this).addClass("ui-state-highlight");
            var buttonName = ui.draggable.data('name');
            $('#firstButton').val(buttonName);
            $('.firstButtonURLInfo').removeAttr('disabled');
            $('#firstURLInfo').html('').append("<img src=/images/button_icons/" + buttonName + ".png>");
        }
    });
    $("#button-drop-box-2").droppable({
        drop: function (event, ui) {
            $(this).html(ui.draggable.remove());
            $(this).droppable('destroy');
            $(this).addClass("ui-state-highlight");
            var buttonName = ui.draggable.data('name');
            $('#secondButton').val(buttonName);
            $('.secondButtonURLInfo').removeAttr('disabled');
            $('#secondURLInfo').html('').append("<img src=/images/button_icons/" + buttonName + ".png>");
        }
    });
    $("#button-drop-box-3").droppable({
        drop: function (event, ui) {
            $(this).html(ui.draggable.remove());
            $(this).droppable('destroy');
            $(this).addClass("ui-state-highlight");
            var buttonName = ui.draggable.data('name');
            $('#thirdButton').val(buttonName);
            $('.thirdButtonURLInfo').removeAttr('disabled');
            $('#thirdURLInfo').html('').append("<img src=/images/button_icons/" + buttonName + ".png>");
        }
    });
    $("#button-drop-box-4").droppable({
        drop: function (event, ui) {
            $(this).html(ui.draggable.remove());
            $(this).droppable('destroy');
            $(this).addClass("ui-state-highlight");
            var buttonName = ui.draggable.data('name');
            $('#fourthButton').val(buttonName);
            $('.fourthButtonURLInfo').removeAttr('disabled');
            $('#fourthURLInfo').html('').append("<img src=/images/button_icons/" + buttonName + ".png>");
        }
    });

    $('.slider').each(function () {
        var $this = $(this);
        var $group = $this.find('.slide_group');
        var $slides = $this.find('.slide');
        var bulletArray = [];
        var currentIndex = 0;
        var timeout;

        function move(newIndex) {
            var animateLeft, slideLeft;

            advance();

            if ($group.is(':animated') || currentIndex === newIndex) {
                return;
            }

            bulletArray[currentIndex].removeClass('active');
            bulletArray[newIndex].addClass('active');

            if (newIndex > currentIndex) {
                slideLeft = '100%';
                animateLeft = '-100%';
            } else {
                slideLeft = '-100%';
                animateLeft = '100%';
            }

            $slides.eq(newIndex).css({
                display: 'block',
                left: slideLeft
            });
            $group.animate({
                left: animateLeft
            }, function () {
                $slides.eq(currentIndex).css({
                    display: 'none'
                });
                $slides.eq(newIndex).css({
                    left: 0
                });
                $group.css({
                    left: 0
                });
                currentIndex = newIndex;
            });
        }

        function advance() {
            clearTimeout(timeout);
            timeout = setTimeout(function () {
                if (currentIndex < ($slides.length - 1)) {
                    move(currentIndex + 1);
                } else {
                    move(0);
                }
            }, 4000);
        }

        $('.next_btn').on('click', function () {
            if (currentIndex < ($slides.length - 1)) {
                move(currentIndex + 1);
            } else {
                move(0);
            }
        });

        $('.previous_btn').on('click', function () {
            if (currentIndex !== 0) {
                move(currentIndex - 1);
            } else {
                move(3);
            }
        });

        $.each($slides, function (index) {
            var $button = $('<a class="slide_btn">&bull;</a>');

            if (index === currentIndex) {
                $button.addClass('active');
            }
            $button.on('click', function () {
                move(index);
            }).appendTo('.slide_buttons');
            bulletArray.push($button);
        });

        advance();
    });

    // $('li').hover(function () {
    //     $(this).addClass('active');
    //     $(this).children('h1').addClass('active');
    // });

    // $('li').mouseleave(function () {
    //     $(this).removeClass('active');
    //     $(this).children('h1').removeClass('active');
    // });

    function flip() {
        console.log('asd');
        // $('.card').toggleClass('flipped');
    }

    function showAdvifyerOnMap() {
        var myLocation = new google.maps.LatLng(48.775900, 9.182885);
        var mapOptions = {
            center: myLocation,
            zoom: 16
        };
        var marker = new google.maps.Marker({
            position: myLocation,
            title: "Property Location"
        });
        var map = new google.maps.Map(document.getElementById("map1"),
            mapOptions);
        marker.setMap(map);
    }

    showAdvifyerOnMap();
});