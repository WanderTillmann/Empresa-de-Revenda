let baseurl = window.location.origin;

$(function () {
    $("#empresa-ajax").select2({
        ajax: {
            url: baseurl + "/empresas/buscar-por/nome",
            dataType: 'json',
            delay: 250,
            type: 'post',
            data: function (params) {
                return {
                    nome: params.term,
                    tipo: $('#tipo').val()
                };
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            processResults: function (data) {
                return {
                    results: data,

                };
            },
            cache: true
        },
    });
});

$(function () {
    $("#produto-ajax").select2({
        ajax: {
            url: baseurl + "/produtos/buscar-por/nome",
            dataType: 'json',
            delay: 250,
            type: 'post',
            data: function (params) {
                return {
                    nome: params.term,
                };
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            processResults: function (data) {
                return {
                    results: data,
                };
            },
            cache: true
        },
    });
});