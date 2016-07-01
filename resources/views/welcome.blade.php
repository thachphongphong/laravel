<!DOCTYPE html>
<html>
    <head>
        <title>Pearl Sea Hotel | Danang Hotel | Coastal Hotels| Danang Beach | My Khe Beach</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
				 <?php 
				 $menus = DB::connection('mysql')-> select('select * from menu');
				for ($i=0;$i<sizeof($menus);$i++) {
					$menu_name= $menus[$i]->name;
					echo $menu_name.'</br>';
				}
				 ?>
            </div>
        </div>
    </body>
</html>
