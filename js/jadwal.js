// mengambil elemen dari input search
let keyword = document.getElementById('keyword_cari');
let btnSearch = document.getElementById('btn_cari');
let contain = document.getElementById('tabel_data');

keyword.addEventListener('keyup', function() {
	
	let xhr = new XMLHttpRequest();

	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && xhr.status == 200) {
			contain.innerHTML = xhr.responseText;
		}
	}

	xhr.open('GET', 'ajax/jadwal_ajax.php?keyword=' + keyword.value, true);
	xhr.send();

});