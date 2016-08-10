<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Ремонт стиральных машин</title>

	<!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="/template/css/bootstrap/bootstrap.min.css">
    <!-- мои стили -->
    <link rel="stylesheet" type="text/css" href="/template/css/common.css">
    <link rel="stylesheet" type="text/css" href="/template/css/header.css">
    <link rel="stylesheet" type="text/css" href="/template/css/content.css">
    <link rel="stylesheet" type="text/css" href="/template/css/footer.css">
    <link rel="stylesheet" type="text/css" href="/template/css/admin.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

    <!--==============================header=================================-->
    <header>
        <div class="headerWrapper">
            <div class="container">
    	        <div class="row">
    	            <div class="siteName col-sm-7">
                        <a href="/">
    	                   <img src="/template/images/logo-big.png">
                        </a>
    	            </div>
    	            <div class="col-sm-5">
    	                <ul class="nav nav-pills nav-justified">
                            <?php foreach ($this->menu as $item) : ?>
                                <li role="presentation" class="<?php if($item['id'] == $pageId) echo 'active'; ?>">
                                    <a class="managed" data-table="menu" data-id="<?php echo $item['id']; ?>" href="<?php echo $item['href']; ?>">
                                        <?php echo $item['value']; ?>
                                    </a>
                                </li>
                            <?php endforeach ?>
    	                </ul>
    	            </div>
    	        </div>
            </div>
        </div>
    </header>

    <?php if(isset($_SESSION['login'])) : ?>
        <div class="admin-panel">
            <form method="post" action="/logout">
                <div id="current-orders" class="orders">
                    Заявок: <?php echo $this->ordersCount; ?>
                </div>
                <input type="submit" id="logout" class="logout" value="Выйти">
            </form>
        </div>
    <?php endif ?>

    <!-- Modal -->
    <div class="modal" id="myManageModal">
      <div class="modal-dialog" role="document">

        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" ><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Редактировать:</h4>
          </div>
          <div class="modal-body">
            <form method="post" name="modalForm">       
                <textarea name="text" class="modal-edit" style="width: 100%; max-width: 100%; height: 150px"></textarea>
                <input type="text" name="price" class="modal-price" style="display:none; width: 200px; max-width: 100%">
            </form>
          </div>
          <div class="modal-footer">
            <button id="cancel" type="button" class="btn btn-default">Отменить</button>
            <button id="save" type="button" class="btn btn-primary">Сохранить</button>
          </div>

        </div>

      </div>
    </div>

    <!--==============================Content=================================-->
    <div class="wrapper">
