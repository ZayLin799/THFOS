//$('.chosen_hiden').addClass('collapse');
//$('.chosen_hiden').addClass('show');

//////Teacher VS Other//////
var pos_option = document.getElementsByName("pos");
$(pos_option).change(function () {
    //Saves in a variable the wanted div
    var selector = ".chosen_" + $(this).val();

    //hide all elements
    $(".chosen_hiden").collapse("hide");

    //show only element connected to selected option
    $(selector).collapse("show");
});

$("input[type=radio][name=pos]").change(function () {
    if (this.value == "teacher") {
        $("#other_position").val("");
        $(".other-error").attr("style", "display:none");
    } else if (this.value == "other") {
        $("#teacher_role").val("");
        $("#v_course_id").val("");
        $("#v_course_sub").collapse("hide");
        $(".checked-sub").prop("checked", false);
        $("#teaching_time").val("");
        $(".teacher-error").attr("style", "display:none");
    }
});

//////Teacher subjects//////
// var v_course = document.getElementsByName("v_course_id");

// $(v_course).change(function () {
//     if (this.value == "") {
//         $("#v_course_sub").collapse("hide");
//     } else {
//         $("#v_course_sub").collapse("show");
//     }
// });

$(document).ready(function () {

    var v_course = document.getElementsByName("v_course_id");
    if($("#v_course_id").val() !== ""){
    alert('hello');
        $("#v_course_sub").collapse("show");
            var select = $(this).attr("id");
            var value = $(this).val();
            var dependent = $(this).data("dependent");
            // var _token = $('input[name="_token"]').val();

            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });

            $.ajax({
                url: "/volunteer_registration/fetch",
                method: "POST",
                data: {select: select, value: value, dependent: dependent },
                success: function (result) {
                    //alert(result);
                    $("#" + dependent).html(result);
                },
            });
    }
    $(v_course).change(function () {
        if (this.value == "") {
            $("#v_course_sub").collapse("hide");
        } else {
            $("#v_course_sub").collapse("show");
            //var select = $(this).attr("id");
            var value = $(this).val();
            var dependent = $(this).data("dependent");
            // var _token = $('input[name="_token"]').val();

            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
            });

            $.ajax({
                url: "/volunteer_registration/fetch",
                method: "POST",
                data: { value: value, dependent: dependent },
                success: function (result) {
                    alert(result);
                    $("#" + dependent).html(result);
                },
            });
        }
    });
});

//////reset//////
$("#reset").click(function () {
    location.reload();
});

//////submit//////
$(document).ready(function () {
    $(document).on("submit", "form", function () {
        $("button").attr("disabled", "disabled");
    });
});
