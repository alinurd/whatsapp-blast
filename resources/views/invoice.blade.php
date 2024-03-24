<!DOCTYPE html>
<html>

<head>
  
	<style>
		@media print {
    body {
        width: 210mm;
        height: 297mm;
        margin: 0;
        padding: 0;
    }

    .head {
        max-width: 210mm;
        margin: auto;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
        background-image: url("{{asset('images/icons/watermak.png')}}");
        background-size: 37%;
        background-repeat: repeat;
        background-position: center; 
    }

    .invoice-box {
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }


		.invoice-box table {
			width: 100%;
			line-height: inherit;
			text-align: left;
		}

		.invoice-box table td {
			padding: 5px;
			vertical-align: top;
		}

		.invoice-box table tr td:nth-child(2) {
			text-align: right;
		}

		.invoice-box table tr.top table td {
			padding-bottom: 20px;
		}

		.invoice-box table tr.top table td.title {
			font-size: 45px;
			line-height: 45px;
			color: #333;
		}

		.invoice-box table tr.information table td {
			padding-bottom: 40px;
		}

		.invoice-box table tr.heading td {
			background: #eee;
			border-bottom: 1px solid #ddd;
			font-weight: bold;
		}

		.invoice-box table tr.details td {
			padding-bottom: 20px;
		}

		.invoice-box table tr.item td {
			border-bottom: 1px solid #eee;
		}

		.invoice-box table tr.item.last td {
			border-bottom: none;
		}

		.invoice-box table tr.total td:nth-child(2) {
			border-top: 2px solid #eee;
			font-weight: bold;
		}

		@media only screen and (max-width: 600px) {
			.invoice-box table tr.top table td {
				width: 100%;
				display: block;
				text-align: center;
			}

			.invoice-box table tr.information table td {
				width: 100%;
				display: block;
				text-align: center;
			}
		}

		/** RTL **/
		.invoice-box.rtl {
			direction: rtl;
			font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
		}

		.invoice-box.rtl table {
			text-align: right;
		}

		.invoice-box.rtl table tr td:nth-child(2) {
			text-align: left;
		}
		}
	</style>
</head>

<body>
	<div class="head">
		<img src="{{asset('images/icons/header.jpg')}}" style="width: 100%; " />
	<div class="invoice-box">

		<table cellpadding="0" cellspacing="0">
			<tr class="top">
				<td colspan="7">
					<table style="width: 100%;">
						<tr>
							<td style="text-align: right;">
								No Invoice: <br><b>{{$header[0]['code']}}</b><br />
								<i style="font-size: 12px;">Jakarta, {{$header[0]['created_at']}}</i>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr class="information">
				<td colspan="2">
					<table>
						<tr>
							<td>salam,
								<u>{{$header[0]['user']['nama_lengkap']}}</u><br />
								terima kasih sudah membayarkan zakat<br />
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<table>
				<thead>
					<tr class="heading">
						<th>No</th>
						<th colspan="2">Nama</th>
						<th>Kategori</th>
						<th>Type</th>
						<th>Jumlah</th>
						<th>Satuan</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 0; ?>
					@foreach ($detail as $item)
					<tr class="items">
						<td>{{++$no}}</td>
						<td colspan="2" style="text-align: left;">{{$item['user']['nama_lengkap']}}</td>
						<td>{{$item['kategori']['nama_kategori']}}</td>
						<td>{{$item['type']}}</td>
						<td>{{$item['jumlah_bayar']}}</td>
						<td>{{$item['satuan']}}</td>
					</tr>
					@endforeach
					<tr>
					<tr>
						<td colspan="7" style="border-top: 1px solid black; height: 10px;"></td>
					</tr>
					</tr>
					<tr>
						<td colspan="5" rowspan="4" style="text-align: right;"><strong>Total:</strong></td>
					</tr>
					<tr>
						<td colspan="2" class="text-star"><span id="ttlLiter">0</span> <i>Liter</i></td>
					</tr>
					<tr>
						<td colspan="2" class="text-star"><span id="ttlKg">0</span> <i>Kilo Gram</i></td>
					</tr>
					<tr>
						<td colspan="2" class="text-star"><span id="ttlRupiah">0</span> <i>Rupiah</i></td>
					</tr>
				</tbody>
			</table>

			<br><br><br>
			<center>
			<table style="margin: 0 auto;">
				<tr>
					<td>Dibayarkan Oleh</td>
					<td style="width: 200px; height: 120px;"></td>
					<td>Diterima Oleh</td>
				</tr>
				<tr>
					<td>{{$header[0]['user']['nama_lengkap']}}</td>
					<td></td>
					<td>Panitia</td>
				</tr>
			</table>
			<br>
			<br>
			<span>www.zis-alhasanah.com</span>
			</center>
	</div>
	</div>

</body>

</html>


<script>
	document.addEventListener('DOMContentLoaded', function() {
		var totalBeras = 0;
		var totalUang = 0;
		var totalKg = 0;

		@foreach($detail as $item)
		@if($item['satuan'] === 'Liter')
		totalBeras += parseFloat("{{ str_replace(',', '.', $item['jumlah_bayar']) }}");
		@elseif($item['satuan'] === 'Rupiah')
		totalUang += parseFloat("{{ str_replace(',', '.', $item['jumlah_bayar']) }}");
		@elseif($item['satuan'] === 'Kg')
		totalKg += parseFloat("{{ str_replace(',', '.', $item['jumlah_bayar']) }}");
		@endif
		@endforeach


		document.getElementById('ttlLiter').textContent = totalBeras.toLocaleString();
		document.getElementById('ttlRupiah').textContent = formatRupiah(totalUang);
		document.getElementById('ttlKg').textContent = totalKg.toLocaleString();
	});

	function formatRupiah(angka) {
		var number_string = angka.toString().replace(/[^,\d]/g, ''),
			split = number_string.split(','),
			sisa = split[0].length % 3,
			rupiah = split[0].substr(0, sisa),
			ribuan = split[0].substr(sisa).match(/\d{1,3}/gi);

		if (ribuan) {
			separator = sisa ? '.' : '';
			rupiah += separator + ribuan.join('.');
		}

		rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
		return rupiah;
	}

</script>