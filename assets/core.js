var baseurl = "http://localhost/uniba-siakad/";
// var baseurl = "http://192.168.1.30/uniba-siakad/";

function loadContent(hash) {
    if (hash == '') {
        hash = 'home';
    }
    $('#main').load(baseurl + 'admin/' + hash);
}

$(window).on('hashchange', function () {
    loadContent(location.hash.slice(1));
});

var url = window.location.href;
var hash = url.substring(url.indexOf("#") + 1);

if (hash == url) {
    hash = 'home';
}

$(document).ready(function () {
    $('#main').load(baseurl + 'admin/' + hash);
    $("li").click(function () {
        $(".nav-link").removeClass('active');
        $(this).addClass("active");
    })
})