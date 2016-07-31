<?php include ROOT . '/views/layouts/header.php' ?>

<!--=========================Paragraph+Table=============================-->
<section class="services">
	<div class="container">
		
		<div class="row title">
			<h2 class="managed">
				<?php echo $headers['services']; ?>
			</h2>
		</div>

		<div class="row">
			<p class="managed">
				<?php echo $paragraphs[0]; ?>
			</p>
		</div>

		<div class="row">
			<table class="table table-hover">
		  		<thead>
			  		<tr>
			  			<th>Услуга</th>
			  			<th>Стоимость</th>
			  		</tr>
		  		</thead>
		  		<tbody>
		  			<?php foreach ($serviceList as $key => $value) : ?>
		  				<tr>
		  					<td class="managed"><?php echo $key; ?></td>
		  					<td class="managed"><?php echo $value; ?></td>
		  				</tr>	
		  			<?php endforeach ?>
			  	</tbody>
			</table>
		</div>

	</div>
</section>

<?php include ROOT . '/views/layouts/footer.php' ?>