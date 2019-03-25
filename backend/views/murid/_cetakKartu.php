<table class="table table-bordered">
	<tr>
		<td style="width: 100px">
			<img src="<?php echo Yii::getAlias('@web').'/uploads/gambar/logo.jpg' ?>" width="200" height="100">
		</td>
		<td colspan="3" class="text-center" style="font-size: 20px"><b>Kartu Santri <br> PONDOK PESANTREN <br> DARUNNASYIEN</b></td>
	</tr>
	<tr>
		<td colspan="4"></td>
	</tr>
	<tr>
		<td rowspan="5">
			<img src="<?php echo Yii::getAlias('@web').'/uploads/foto/'.$dataMurid->FOTO ?>" width="200" height="200">
		</td>
		<td style="width: 100px; padding-left: 10px">NIS</td>
		<td class="text-center" style="width: 20px"> : </td>
		<td style="padding-left: 10px"><?php echo $dataMurid->NIS; ?></td>
	</tr>
	<tr>
		<td style="padding-left: 10px">Nama</td>
		<td class="text-center"> : </td>
		<td style="padding-left: 10px"><?php echo $dataMurid->NAMA ?></td>
	</tr>
	<tr>
		<td style="padding-left: 10px">Tempat Lahir</td>
		<td class="text-center"> : </td>
		<td style="padding-left: 10px"><?php echo $dataMurid->TEMPAT_LAHIR ?></td>
	</tr>
	<tr>
		<td style="padding-left: 10px">Tanggal Lahir</td>
		<td class="text-center"> : </td>
		<td style="padding-left: 10px"><?php echo date('d F Y' , strtotime($dataMurid->TANGGAL_LAHIR)) ?></td>
	</tr>
	<tr>
		<td style="padding-left: 10px">Alamat</td>
		<td class="text-center"> : </td>
		<td style="padding-left: 10px"><?php echo $dataMurid->ALAMAT ?></td>
	</tr>
	<tr>
		<td colspan="2" rowspan="4">Kartu Santri ini wajib dibawa saat mengikuti ujian</td>
		<td colspan="1"></td>
		<td>Malang, 15 September 2018</td>
	</tr>
	<tr>
		<td></td>
		<td>Ttd</td>
	</tr>
	<tr>
		<td></td>
		<td>.....</td>
	</tr>
	<tr>
		<td></td>
		<td>Iwan Setiawan</td>
	</tr>
</table>