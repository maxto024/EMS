
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <script src="beaverslider.js"></script>         <!-- link to a framework -->
    <script src="beaverslider-effects.js"></script> <!-- link to a set of effects -->
  <script src="jquery-1.11.0-beta3.min.js"></script>
  <script>
    
    $(function(){
      var slider = new BeaverSlider({
        structure: {
          container: {
            id: "my-slider",
            width: 649,
            height: 420
          }
        },
        content: {
          images: [
            "img/1.jpg",
            "img/2.jpg"
          ]
        },
        animation: {
          effects: effectSets["slider: big set 2"],
          interval: 900
        }
      });   
    });
    
    </script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" /> 
<title>Home Page</title>
</head>

<body>
<div class="container">

    <div class="banner">
	    <div class="banner_text_icon">
           <h1>HRM</h1>
        </div>
        <div class="banner_text">
        <h1>Human Resource Manager</h1>
        </div>
    </div>
    
    <div class="right_menu">
        <div class="login">
        
        <div class="form_login"> 
		    <p "> User Login</p>
			<form name="login" method="post" action="login_action.php">
			<div style="margin-top:40px;"><label class="my_label">Name</label></div>
			<input name="user_name" id="user_name" type="text" required /><br/>
			<div style="margin-top:20px;"><label class="my_label">Password</label></div>
			<input name="password" id="password" type="password" required />
			<div style="margin-top:20px; margin-left:215px;"><input name="submit" type="submit" value="Login"></div>
			</form>
		</div>
        </div>
    </div>
    
    <div class="center_contain">
    
    <div id="my-slider" ></div>
    </div>
    
    <div class="footer">
            <p class="footer_text">
				   (c) 2015  developed by SOUALIHOU & ALAMINE "The Camer Boys" .
		    </p> 
        </div>
    
</div>    
</body>
</html>