<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <title>Footer</title>
        <link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" href="../css/style.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js"></script>
        <style type="text/css">
			footer {

				height: 80px;
				display: flex;
				justify-content: space-around;
				align-items: center;
				background-color: #7D8B96;
			}

			footer a:hover {
				text-decoration: underline;
				color: white;
				text-underline-offset: 10px;
			}
		</style>
    </head>

    <body>
        <div class="footer">
            <!-- footer-->
                <!-- Main content -->
                <!-- <iframe style="width: 100%;" id="Main" name="Main" src="main.php" frameBorder="0" onload="this.style.height=(this.contentWindow.document.body.scrollHeight+20)+'px';" scrolling="no" ></iframe> -->
                <!-- Footer: non-essential information -->
                <footer>
                    <a href="about_us.php" target="Main">
                        <h2>About Us</h2>
                    </a>

                    <a href="contact.php" target="Main">
                        <h2>Contact</h2>
                    </a>
                    <a href="legal.php" target="Main">
                        <h2>Legal</h2>
                    </a>
                    <a href="../html/main.html" target="Main" style="text-decoration: none;">
                        <h2>J&V Library &#169;</h2>
	        </a>
	    </footer>
            <!--/footer-->
        </div>
    </body>

</html>