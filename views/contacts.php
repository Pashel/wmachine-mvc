<?php include ROOT . '/views/layouts/header.php' ?>

<!--=========================Paragraph+Table=============================-->
<section class="contacts">
	<div class="container">
		
		<div class="row title">
			<h2 class="managed">
				<?php echo $headers['contacts']; ?>
			</h2>
		</div>

		<div class="row">
			<p class="managed">
				<?php echo $paragraphs[0]; ?>
			</p>
		</div>

		<div class="row" style="position: relative">
			<div style="position: absolute; width: 100%; height: 100%;  background-color: transparent: "></div>
			<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d75229.32384604095!2d27.561182693233597!3d53.89769036127079!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sru!2sru!4v1469900286895" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen></iframe>
		</div>

		<div class="row">
			<div class="callForm">
				<h3 class="managed"><?php echo $headers['phones']; ?></h3>
				<?php foreach ($phones as $phone => $value) : ?>
					<h4 class="managed"><?php echo $value; ?></h4>
				<?php endforeach ?>
			</div>
		</div>

	</div>
</section>

<?php include ROOT . '/views/layouts/footer.php' ?>