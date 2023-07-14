function ubahFormatTanggal(currentDate) {
     var date = new Date(currentDate);
     var tahun = date.getFullYear();
     var bulan = date.getMonth();
     var tanggal = date.getDate();
     var hari = date.getDay();
     var jam = date.getHours();
     var menit = date.getMinutes();
     var detik = date.getSeconds();
     switch (hari) {
          case 0:
               hari = 'Minggu';
               break;
          case 1:
               hari = 'Senin';
               break;
          case 2:
               hari = 'Selasa';
               break;
          case 3:
               hari = 'Rabu';
               break;
          case 4:
               hari = 'Kamis';
               break;
          case 5:
               hari = "Jum'at";
               break;
          case 6:
               hari = 'Sabtu';
               break;
     }
     switch (bulan) {
          case 0:
               bulan = 'Januari';
               break;
          case 1:
               bulan = 'Februari';
               break;
          case 2:
               bulan = 'Maret';
               break;
          case 3:
               bulan = 'April';
               break;
          case 4:
               bulan = 'Mei';
               break;
          case 5:
               bulan = 'Juni';
               break;
          case 6:
               bulan = 'Juli';
               break;
          case 7:
               bulan = 'Agustus';
               break;
          case 8:
               bulan = 'September';
               break;
          case 9:
               bulan = 'Oktober';
               break;
          case 10:
               bulan = 'November';
               break;
          case 11:
               bulan = 'Desember';
               break;
     }
     var tampilTanggal = hari + ', ' + tanggal + ' ' + bulan + ' ' + tahun;
     return tampilTanggal;
}
function ubahFormatTanggal2(currentDate) {
     if (currentDate == '0000-00-00' || currentDate == '' ) {
          // console.log(currentDate);
          return "Belum Ada";
     }
     
     var date = new Date(currentDate);
     var tahun = date.getFullYear();
     var bulan = date.getMonth();
     var tanggal = date.getDate();
     var hari = date.getDay();
     var jam = date.getHours();
     var menit = date.getMinutes();
     var detik = date.getSeconds();
     switch (hari) {
          case 0:
               hari = 'Minggu';
               break;
          case 1:
               hari = 'Senin';
               break;
          case 2:
               hari = 'Selasa';
               break;
          case 3:
               hari = 'Rabu';
               break;
          case 4:
               hari = 'Kamis';
               break;
          case 5:
               hari = "Jum'at";
               break;
          case 6:
               hari = 'Sabtu';
               break;
          default:
               hari = '-'
     }
     switch (bulan) {
          case 0:
               bulan = 'Jan';
               break;
          case 1:
               bulan = 'Feb';
               break;
          case 2:
               bulan = 'Mar';
               break;
          case 3:
               bulan = 'Apr';
               break;
          case 4:
               bulan = 'Mei';
               break;
          case 5:
               bulan = 'Juni';
               break;
          case 6:
               bulan = 'Juli';
               break;
          case 7:
               bulan = 'Agust';
               break;
          case 8:
               bulan = 'Sept';
               break;
          case 9:
               bulan = 'Okt';
               break;
          case 10:
               bulan = 'Nov';
               break;
          case 11:
               bulan = 'Des';
               break;
          default:
               bulan = '-'
     }
     var tampilTanggal = tanggal + ' ' + bulan + ' ' + tahun;
     return tampilTanggal;
}
