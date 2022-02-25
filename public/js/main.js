let formatHarga;
$(document).on('keyup', '.format-number', function (e) {
  formatHarga = this;
  formatHarga.value = formatForNumber(this.value);
});

function formatForNumber(angka, prefix){
  var number_string = angka.replace(/[^,\d]/g, '').toString(),
  split       = number_string.split(','),
  sisa         = split[0].length % 3,
  formatHarga    = split[0].substr(0, sisa),
  ribuan         = split[0].substr(sisa).match(/\d{3}/gi);

  if(ribuan){
    let separator = sisa ? '.' : '';
    formatHarga += separator + ribuan.join('.');
  }

  formatHarga = split[1] != undefined ? formatHarga + ',' + split[1] : formatHarga;
  return prefix == undefined ? formatHarga : (formatHarga ? formatHarga : '');
}