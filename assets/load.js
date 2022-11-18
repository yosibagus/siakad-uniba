var baseurl = "http://localhost:8080/uniba-siakad/";

function loadContent(hash) {
    if (hash == '') {
        hash = 'home';
    }
    // $('#header').load(baseurl + 'admin/header');
    $('#main').load(baseurl + 'admin/' + hash);
}

$(window).on('hashchange', function () {
    loadContent(location.hash.slice(1))
});

var url = window.location.href;
var hash = url.substring(url.indexOf("#") + 1);

if (hash == url) {
    hash = 'home';
}

$(document).ready(function () {
    // $('#header').load(baseurl + 'admin/header');
    $('#main').load(baseurl + 'admin/' + hash);
})