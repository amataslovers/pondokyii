<table class="table table-bordered">
	<tr>
		<td>Mapel</td>
		<td>Nilai</td>
	</tr>
	<?php $nilai = 0 ?>
	<?php foreach ($nilaiMurid as $key => $value) { ?>
		<tr>
			<td><?php echo $value->dETAILMATAPELAJARAN->mATAPELAJARAN->NAMA ?></td>
			<td><?php echo $value->NILAI ?></td>
		</tr>
		<?php $nilai += $value->NILAI ?>
	<?php } ?>
	<tr>
		<td>Rata-rata :</td>
		<td><?php echo ($nilai/3); ?></td>
	</tr>
	
</table>