jQuery(document).ready(function ($) {
    var loginForm = $("#login-form");
    loginForm.submit(function (ev) {
        ev.preventDefault();
        var loginFormData = loginForm.serializeFormObject();
        console.log( loginFormData );
    });
});

$.fn.serializeFormObject = function () {
    var formData = $(this).serializeArray();
    var result = {};
    $.each(formData, function (index, value) {
        result[value.name] = value.value;
    });
    return result;
};