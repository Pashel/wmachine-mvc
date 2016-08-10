<?php include ROOT . '/views/layouts/header.php' ?>

<!--=========================Orders table=============================-->
<section class="services">
	<div class="container">

		<div class="row">
			<table class="table table-hover">
		  		<thead>
			  		<tr>
			  			<th>Имя</th>
			  			<th>Телефон</th>
			  			<th>Сообщение</th>
			  		</tr>
		  		</thead>
		  		<tbody>
		  			<?php foreach ($orders as $order) : ?>
		  				<tr>
		  					<td><?php echo $order['name']; ?></td>
		  					<td><?php echo $order['phone']; ?></td>
		  					<td><?php echo $order['message']; ?></td>
		  					<td>
		  						<a href="/delete-order/<?php echo $order['id']; ?>">
		  							x
		  						</a>
		  					</td>
		  				</tr>	
		  			<?php endforeach ?>
			  	</tbody>
			</table>
		</div>

	</div>
</section>

<?php include ROOT . '/views/layouts/footer.php' ?>