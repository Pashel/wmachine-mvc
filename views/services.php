<?php include ROOT . '/views/layouts/header.php' ?>

<!--=========================Paragraph+Table=============================-->
<section class="services">
	<div class="container">
		
		<div class="row title">
			<h2 class="managed" data-table="data" data-id="<?php echo $headers['services']['id']; ?>">
				<?php echo $headers['services']['value']; ?>
			</h2>
		</div>

		<div class="row">
			<p class="managed" data-table="data" data-id="<?php echo $paragraphs[0]['id']; ?>">
				<?php echo $paragraphs[0]['value']; ?>
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
		  			<?php foreach ($serviceList as $service) : ?>
		  				<tr>
		  					<td class="managed service-row" data-table="service" data-id="<?php echo $service['id']; ?>">
		  						<?php echo $service['name']; ?>
	  						</td>
		  					<td>
		  						<?php echo $service['price']; ?>
		  					</td>
		  					<?php if(isset($_SESSION['login'])) : ?>
			  					<td>
			  						<a href="/delete-service/<?php echo $service['id']; ?>">
			  							x
			  						</a>
			  					</td>
		  					<?php endif ?>
		  				</tr>	
		  			<?php endforeach ?>
			  	</tbody>
			</table>
			<?php if(isset($_SESSION['login'])) : ?>
				<button type="button" class="btn btn-primary btn-lg new-service" style="padding: 0px" data-table="service" data-id="-1">
					<span class="manage-button" style="display:block; padding: 10px">Добавить услугу</span>
				</button>
			<?php endif ?>
		</div>

	</div>
</section>

<?php include ROOT . '/views/layouts/footer.php' ?>