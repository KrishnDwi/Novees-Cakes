// Tombol untuk maju mundur slider
var button = document.getElementById('next');
button.onclick = function () {
    var container = document.getElementById('container-slider');
    sideScroll(container,'right',15,320,20);
};

var back = document.getElementById('prev');
back.onclick = function () {
    var container = document.getElementById('container-slider');
    sideScroll(container,'left',15,320,20);
};

function sideScroll(element,direction,speed,distance,step){
    scrollAmount = 0;
    var slideTimer = setInterval(function(){
        if(direction == 'left'){
            element.scrollLeft -= step;
        } else {
            element.scrollLeft += step;
        }
        scrollAmount += step;
        if(scrollAmount >= distance){
            window.clearInterval(slideTimer);
        }
    }, speed);
}

//form validation
function pesan() {
    var nama = document.getElementById('nama').value;
    var alamat = document.getElementById('alamat').value;
    var kue = document.getElementById('kue').value;

    // Implement your authentication logic here
    // For demonstration purposes, let's check if both fields are non-empty
    if (nama == '' || alamat == '' || kue == '') {
      document.getElementById('respon-pesan').innerHTML = "Mohon isi semua kolom"
    } else{
        document.getElementById('respon-pesan').innerHTML = "Pesanan diterima"
    }
  }