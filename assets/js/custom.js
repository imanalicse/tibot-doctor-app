jQuery(document).ready(function ($) {

    var pageBody = $("body");

    //const http = 'https://admin.tibot.ai/';
    const http = 'http://localhost:3000/';

    var loginForm = $("#login-form");
    loginForm.submit(function (ev) {
        ev.preventDefault();
        var loginFormData = loginForm.serializeFormObject();
        //const loginUrl = http + "registeredDoctor/login";
        const loginUrl = http + "login";

        fetchApiService.post(loginUrl, loginFormData)
            .then(function (resp) {
                console.log('resp => ', resp);
            }).catch(function (err) {
            console.log(err);
        });
    });


    if (pageBody.find('.home-page')) {
        const caseDetailUrl = http + "caseDetail";
        fetchApiService.get(caseDetailUrl)
            .then(function (data) {
                console.log("second then", data);
            }).catch(function (err) {
            console.log(err)
        });

    }
});
