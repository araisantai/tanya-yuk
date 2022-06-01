var overlay = document.getElementById("myOverlay");

function side_open() {
    overlay.style.display = "block";
    document.getElementById("cek").onclick = function () {side_close()};
}
  
function side_close() {
    overlay.style.display = "none";
    document.getElementById("cek").onclick = function () {side_open()};
}