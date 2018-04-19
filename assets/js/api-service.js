var fetchApiService = {
    post: function (url, data) {
        return fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data),
            mode: 'cors'
        }).then(function (resp) {
            return resp.json();
        });
    },
    get: function (url) {
        return fetch(url)
            .then(function (resp) {
                return resp.json();
            });
    }
};

$.fn.serializeFormObject = function () {
    var formData = $(this).serializeArray();
    var result = {};
    $.each(formData, function (index, value) {
        result[value.name] = value.value;
    });
    return result;
};