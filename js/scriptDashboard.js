
function toggleStatus(e,action,id) {
    let xmlHttp = new XMLHttpRequest();
    xmlHttp.onreadystatechange = function () {
        e.setAttribute('class','status '+xmlHttp.responseText);
        e.innerHTML=xmlHttp.responseText;
        console.log(xmlHttp.responseText);
    }
    xmlHttp.open('GET', `./xmlHttpRequest/statusOrder.php?action=${action}&order_id=${id}`, true);
    xmlHttp.send();
}
