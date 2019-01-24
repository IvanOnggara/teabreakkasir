function uidate(datestring) {
	

	if (datestring.substring(4,5) == '/') {
		var date = datestring.split("/");

		var tanggal = date[2];
		var bulan = date[1];
		var tahun = date[0];
	}else if (datestring.substring(4,5) == '-') {
		var date = datestring.split("-");

		var tanggal = date[2];
		var bulan = date[1];
		var tahun = date[0];
	}else if (datestring.substring(2,3) == '/') {
		var date = datestring.split("/");

		var tanggal = date[0];
		var bulan = date[1];
		var tahun = date[2];
	}else{
		var date = datestring.split("-");

		var tanggal = date[0];
		var bulan = date[1];
		var tahun = date[2];
	}

	var newdate = new Date(tahun+"/"+bulan+"/"+tanggal);
	var d = newdate.getDay();

	if (d == 0) {
		var hari =  "Minggu";
	}else if (d == 1) {
		var hari =  "Senin";
	}else if (d == 2) {
		var hari =  "Selasa";
	}else if (d == 3) {
		var hari =  "Rabu";
	}else if (d == 4) {
		var hari =  "Kamis";
	}else if (d == 5) {
		var hari =  "Jumat";
	}else if (d == 6) {
		var hari =  "Sabtu";
	}

	var all = hari+", "+tanggal+"/"+bulan+"/"+tahun;
	return all;
}

function currency(x) {
	var retVal=x.toString().replace(/[^\d]/g,'');
	while(/(\d+)(\d{3})/.test(retVal)) {
	  retVal=retVal.replace(/(\d+)(\d{3})/,'$1'+'.'+'$2');
	}
	return retVal;
}

function currency_special(x) {
	var awal = x.split('.');
	awal = x[0];
	var koma = x[1];
	var retVal=awal.toString().replace(/[^\d]/g,'');
	while(/(\d+)(\d{3})/.test(retVal)) {
	  retVal=retVal.replace(/(\d+)(\d{3})/,'$1'+'.'+'$2');
	}
	return retVal+","+koma;
}