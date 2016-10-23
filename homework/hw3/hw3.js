function populate() {
    var target = document.getElementById("mytable");
    console.log(target);
    var json_data = JSON.parse(HTTPGet("http://162.105.146.180:8112/cgi-bin/result.pl"));
    for (index in json_data) {
        var newrow = target.insertRow(-1);
        var selected = newrow.insertCell(-1);
        var name = newrow.insertCell(-1);
        var age = newrow.insertCell(-1);
        var gender = newrow.insertCell(-1);
        var email = newrow.insertCell(-1);
        selected.innerHTML = '<input type="checkbox" name="select" value="' + index.toString() + '">'
        name.innerHTML = json_data[index]["name"];
        age.innerHTML = json_data[index]["age"];
        gender.innerHTML = json_data[index]["gender"];
        email.innerHTML = json_data[index]["email"];
    }
}

function HTTPGet(url) {
    var HTTPReq = new XMLHttpRequest();
    HTTPReq.open("GET", url, false);
    HTTPReq.send(null);
    return HTTPReq.responseText;
}