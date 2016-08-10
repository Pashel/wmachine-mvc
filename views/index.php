<?php include ROOT . '/views/layouts/header.php' ?>

<!--=========================Carousel+Contacts============================-->
<section class="mainUp">
	<div class="container">
		<div class="row">

			<div class="col-sm-7 carouselWrapper">
				<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
				  	<!-- Indicators -->
				  	<!-- Wrapper for slides -->
				  	<div class="carousel-inner" role="listbox">
				    	<div class="item active">
				      	<img src="/template/images/1.png" alt="...">
				      	<div class="carousel-caption">
				        ...
				      	</div>
				    </div>
				    <div class="item">
				      	<img src="/template/images/2.png" alt="...">
				      	<div class="carousel-caption">
				        ...
				      	</div>
				    </div>
				   	<div class="item">
				      	<img src="/template/images/3.png" alt="...">
				      	<div class="carousel-caption">
				        ...
				      	</div>
				    	</div>
				  	</div>

				  	<!-- Controls -->
				  	<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
				    	<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				   		<span class="sr-only">Previous</span>
				  	</a>
				  	<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
				    	<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				    	<span class="sr-only">Next</span>
				  	</a>
				</div>
			</div>

			<div class="col-sm-5 callWrapper">
				<div class="callForm">
					<h3 class="managed" data-table="data" data-id="<?php echo $headers['phones']['id']; ?>"><?php echo $headers['phones']['value']; ?></h3>
					<?php foreach ($phones as $phone) : ?>
						<h4 class="managed" data-table="data" data-id="<?php echo $phone['id']; ?>"><?php echo $phone['value']; ?></h4>
					<?php endforeach ?>
				</div>
				<!-- Button trigger modal -->
				<button type="button" id="makeOrder" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
					<span>Оставить заявку</span>
				</button>
			</div>

		</div>
	</div>
</section>

<!--==============================TextContent=================================-->
<section class="mainDown">
	<div class="container">
        
        <div class="title row" style="text-align: center;">
        	<h2 class="managed" data-table="data" data-id="<?php echo $headers['site_name']['id']; ?>"><?php echo $headers['site_name']['value']; ?></h2>
        </div>

        <div class="row">
        	<p class="managed" data-table="data" data-id="<?php echo $paragraphs[0]['id']; ?>">
				<?php echo $paragraphs[0]['value']; ?>
			</p>
			<p class="managed" data-table="data" data-id="<?php echo $paragraphs[1]['id']; ?>">
				<?php echo $paragraphs[1]['value']; ?>
        	</p>
        </div>

        <div class="row">
    		<div class="col-sm-6">
	    		<h3 class="managed" data-table="data" data-id="<?php echo $headers['why']['id']; ?>" style="text-align: center;"><?php echo $headers['why']['value']; ?></h3>
	    		<ul class="managed" data-table="data" data-id="<?php echo $whyList['id']; ?>">
	    			<?php foreach ($whyList['value'] as $case => $value) : ?>
	    				<li><?php echo $value; ?></li>
	    			<?php endforeach ?>
				</ul>
            </div>
            <div class="col-sm-6">
	    		<h3 class="managed" data-table="data" data-id="<?php echo $headers['what']['id']; ?>" style="text-align: center;"><?php echo $headers['what']['value']; ?></h3>
	    		<ul class="managed" data-table="data" data-id="<?php echo $whatList['id']; ?>">
	    			<?php foreach ($whatList['value'] as $case => $value) : ?>
	    				<li><?php echo $value; ?></li>
	    			<?php endforeach ?>
				</ul>
            </div>
        </div>

        <div class="row">
        	<p class="managed" data-table="data" data-id="<?php echo $paragraphs[2]['id']; ?>">
				<?php echo $paragraphs[2]['value']; ?>
			</p>
        </div>

	</div>	
</section>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Оставьте вашу заявку</h4>
      </div>
      <div class="modal-body">
      	<form id="order-form" action="/new-order" method="post">
      		Вашe имя:<br><input type="text" name="name"><br>
      		Ваш телефон:<br><input type="text" name="phone"><br>
      		Ваше сообщение:<br><textarea name="message" rows="5" cols="50" style="max-width: 100%"></textarea>
      	</form>
      </div>
      <div class="modal-footer">
        <button id="order-cancel" type="button" class="btn btn-default" data-dismiss="modal">Отменить</button>
        <button id="send-order" type="submit" form="order-form" class="btn btn-primary">Отправить</button>
      </div>
    </div>
  </div>
</div>


<?php include ROOT . '/views/layouts/footer.php' ?>