<?php include ROOT . '/views/layouts/header.php' ?>

<!--=========================Carousel+Contacts============================-->
<section class="mainUp">
	<div class="container">
		<div class="row">

			<div class="col-sm-7">
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

			<div class="callWrapper col-sm-5">
				<div class="callForm">
					<h3 class="managed"><?php echo $headers['phones']; ?></h3>
					<?php foreach ($phones as $phone => $value) : ?>
						<h4 class="managed"><?php echo $value; ?></h4>
					<?php endforeach ?>
				</div>
				<!-- Button trigger modal -->
				<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
					<span class="managed">Оставить заявку</span>
				</button>
				<!-- Modal -->
				<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
				      </div>
				      <div class="modal-body">
				        ...
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				        <button type="button" class="btn btn-primary">Save changes</button>
				      </div>
				    </div>
				  </div>
				</div>
			</div>

		</div>
	</div>
</section>

<!--==============================TextContent=================================-->
<section class="mainDown">
	<div class="container">
        
        <div class="title row" style="text-align: center;">
        	<h2 class="managed"><?php echo $headers['site_name']; ?></h2>
        </div>

        <div class="row">
        	<p class="managed">
				<?php echo $paragraphs[0]; ?>
			</p>
			<p class="managed">
				<?php echo $paragraphs[1]; ?>
        	</p>
        </div>

        <div class="row">
    		<div class="col-sm-6">
	    		<h3 class="managed" style="text-align: center;"><?php echo $headers['why']; ?></h3>
	    		<ul class="managed">
	    			<?php foreach ($whyList as $case => $value) : ?>
	    				<li><?php echo $value; ?></li>
	    			<?php endforeach ?>
				</ul>
            </div>
            <div class="col-sm-6">
	    		<h3 class="managed" style="text-align: center;"><?php echo $headers['what']; ?></h3>
	    		<ul class="managed">
	    			<?php foreach ($whatList as $case => $value) : ?>
	    				<li><?php echo $value; ?></li>
	    			<?php endforeach ?>
				</ul>
            </div>
        </div>

        <div class="row">
        	<p class="managed">
				<?php echo $paragraphs[2]; ?>
			</p>
        </div>

	</div>	
</section>


<?php include ROOT . '/views/layouts/footer.php' ?>