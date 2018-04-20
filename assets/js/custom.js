jQuery(document).ready(function ($) {

    var pageBody = $("body");

    const http = 'https://admin.tibot.ai/';
    //const http = 'http://localhost:3000/';

    // var loginForm = $("#login-form");
    // loginForm.submit(function (ev) {
    //     ev.preventDefault();
    //     //var loginFormData = loginForm.serializeFormObject();
    //     var loginFormData = {
    //         "email": "imanali.cse@gmail.com",
    //         "password": "CodeFest%6"
    //     }
    //     const loginUrl = http + "registeredDoctor/login";
    //     //const loginUrl = http + "login";
    //
    //     fetchApiService.post(loginUrl, loginFormData)
    //         .then(function (resp) {
    //             console.log('login resp ', resp);
    //             if(resp.message == 'Auth successful'){
    //                 const token = resp.token;
    //             }
    //         }).catch(function (err) {
    //         console.log(err.message);
    //     });
    // });


    // if (pageBody.find('.home-page').length > 0) {
    //     const caseDetailUrl = http + "caseDetail";
    //     fetchApiService.get(caseDetailUrl)
    //         .then(function (data) {
    //             console.log("second then", data);
    //         }).catch(function (err) {
    //             console.log(err)
    //     });
    // }
});
