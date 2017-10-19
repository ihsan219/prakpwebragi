<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/style.css" rel="stylesheet">
	<title>Upload Images</title>
	<style type="text/css">
	</style>
</head>
<body>

	
<div  class="col-md-4 col-md-offset-4 form-login">
<div class="outter-form-login">
	<div id="wrapper">
	<div>
	<h3 class="text-center">JUAL PRODUK</h3>
	</div>
		<form action="proses.php" method="post" enctype="multipart/form-data">
			<span>Image</span>
			<div class="form-group">
                    <input type="file" class="form-control" name="image" placeholder="Image">
            </div>
			
			<span>Nama </span>
			<div class="form-group">
                    <input type="text" class="form-control" name="nama" placeholder="Nama">
            </div>
			
			<span>Size</span>
			<div class="form-group">
                    <input type="text" class="form-control" name="size" placeholder="Size">
            </div>
			
			<span>Bahan</span>
			<div class="form-group">
                    <input type="text" class="form-control" name="bahan" placeholder="Bahan">
            </div>

			<span>Harga</span>
			<div class="form-group">
                    <input type="text" class="form-control" name="harga" placeholder="Harga">
            </div>
			
			<div class="form-group">
                	<input type="submit" class="btn btn-block btn-custom-green" name="upload" value="UPLOAD" />
            </div>
		</form>
	</div>	
	</div>
	</div>
	<div class="row">
        		<div class="col-md-12 footer" id="site-footer">
            	<footer class="copyright text-center"><p>copyright&copy; 2017 prakpwebragi.com</p></footer>
			</div>
	 <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>