jQuery(document).ready(function ($) {

    var pageBody = $("body");

    $("select[name='mainCondition']").change(function (e) {
        var symptom_name = $(this).val();
       $.ajax({
           method: "POST",
           url : "http://localhost/tibot-doctor-app/sub_symtoms.php",
           data: {
               symptom_name: symptom_name
           },
           success: function (resp) {
               var sub_symptoms = JSON.parse(resp);
               var options = "";
               sub_symptoms.forEach(function (item, i) {
                   options += "<option value='" + item.subName +  "'>" + item.subName  + "</option>";
               });
               $("select[name='secondaryCondition']").html(options);
           }
       });
    });
    //const http = 'https://admin.tibot.ai/';

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
