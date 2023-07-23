
var form_validation = function() {
    var e = function() {
            jQuery(".form-valide").validate({
                ignore: [],
                errorClass: "invalid-feedback animated fadeInDown",
                errorElement: "div",
                errorPlacement: function(e, a) {
                    jQuery(a).parents(".form-group > div").append(e)
                },
                highlight: function(e) {
                    jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-invalid")
                },
                success: function(e) {
                    jQuery(e).closest(".form-group").removeClass("is-invalid"), jQuery(e).remove()
                },
                rules: {
                    "val-codeSubject": {
                        required: !0,
                    },
                    "val-nameSubject": {
                        required: !0,
                    },
                    "val-credit": {
                        required: !0,
                    },
                    "val-grade": {
                        required: !0
                    }
                },
                messages: {
                    "val-codeSubject": {
                        required: "โปรดระบุรหัสรายวิชา",
                    },
                    "val-nameSubject": "โปรดระบุชื่อรายวิชา",
                    "val-credit": {
                        required: "โปรดระบุจำนวนหน่วยกิตรายวิชา",
                    },
                    "val-grade": "โปรดระบุเกรดที่คาดการณ์"
                }
            })
        }
    return {
        init: function() {
            e(), a(), jQuery(".js-select2").on("change", function() {
                jQuery(this).valid()
            })
        }
    }
}();
jQuery(function() {
    form_validation.init()
});
