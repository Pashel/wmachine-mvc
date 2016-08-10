	</div>
	<!--==============================footer=================================-->
	<footer>
		<div class="footerWrapper">
			<div class="container">
		        <div class="row">
		            <div class="infoName col-sm-5">
		                <img src="/template/images/logo-small.png">
		            </div>
		            <div class="col-sm-7 infoText">
		                <h4 class="managed" data-table="data" data-id="<?php echo $this->footerStrings[0]['id']; ?>"><?php echo $this->footerStrings[0]['value']; ?></h4>
		                <h4 class="managed" data-table="data" data-id="<?php echo $this->footerStrings[1]['id']; ?>"><?php echo $this->footerStrings[1]['value']; ?></h4>
		            </div>
		        </div>
			</div>
		</div>
	</footer>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/template/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/template/js/bootstrap.min.js"></script>

    <!-- Мой скрипт: элементы управления -->
    <?php if(isset($_SESSION['login'])) : ?>
    	<script src="/template/js/manageElements.js"></script>
    	<script src="/template/js/manageModal.js"></script>
    	<script src="/template/js/order.js"></script>
	<?php endif ?>

</body>
</html>