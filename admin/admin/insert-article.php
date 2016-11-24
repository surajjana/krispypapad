<?php
    session_start();
    if(!isset($_SESSION['login'])){
	header("Location: index.php");
    }
?>
<!DOCTYPE html>
<html>
    <head>
	<title>Krispy Papad | Admin Home</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Krispy Papad | Admin Home</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="../img/favicon.png" />	
        <link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/agency.min.css" rel="stylesheet">
	<link href="../css/main.css" rel="stylesheet"> 	   
	<link href="../css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<style type="text/css">
	    .navbar, .news-card, .card, .side-nav, .form-edit{
		box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);
	    }
	    textarea {
		   resize: none;
	    }
	    #row1, #row2, #row3{
		background: #e9e9e9;
		padding: 10px 5px 30px 5px;
		border-radius: 6px;
	    }
	    #row2{
		background: #ffffff;
	    }
	    .form-edit{
		margin-top: 40px;
		padding: 20px;
	    }
	</style>    
	<script src="../js/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script type="text/javascript">
	    $(document).ready(function(){
    	
    	$("#content-1").on("change paste keyup", function() {
    		var x = 320 - $(this).val().length 
    		if(x >= 0){
    			$("#char_val_1").css("color", "blue")
    			$("#char_val_1").text(x + " characters remaining")
    		}else if(x < 0){
    			$("#char_val_1").css("color", "red")
    			$("#char_val_1").text(x + " characters remaining")
    		}
		})

		$("#content-2").on("change paste keyup", function() {
    		var x = 320 - $(this).val().length 
    		if(x >= 0){
    			$("#char_val_2").css("color", "blue")
    			$("#char_val_2").text(x + " characters remaining")
    		}else if(x < 0){
    			$("#char_val_2").css("color", "red")
    			$("#char_val_2").text(x + " characters remaining")
    		}
		})

		$.fn.serializeFormJSON = function () {
	        var o = {};
	        var a = this.serializeArray();
	        $.each(a, function () {
	            if (o[this.name]) {
	                if (!o[this.name].push) {
	                    o[this.name] = [o[this.name]];
	                }
	                o[this.name].push(this.value || '');
	            } else {
	                o[this.name] = this.value || '';
	            }
	        });
	        return o;
	    };
	    
	    function validate() {
		var title=geElementByID('#title');
		if (title == NULL) {
		    alert('give the title')
		}
	    }
    	    $('#submit').click(function(){
		    if (validate()) {
			var data = $('#test').serializeFormJSON();
			if(data.content_1.length <= 320 && data.content_2.length <= 320){
	    		$.post('http://krispypapad.herokuapp.com/summary', data, function(data){

	            	console.log(data)
	            	var data = JSON.parse(data)

	              	if(data.status == 'OK'){
	                 	console.log('data inserted')
	                 	alert('Data Inserted')
    
	              	}else{
	                	console.log('not valid')
	                	alert('Not Valid')
	              	}
	           	})
		    }else{
			console.log('not valid')
			alert('Not Valid')
		    }
		 }
		})
	    

    })    
	</script>
	
    </head>
    <body>
	<nav class="navbar navbar-inverse">
	    <div class="container-fluid">
		<div class="navbar-header">
		    <a class="navbar-brand" href="index.php">
			<img src="../img/brand.png" alt="KP" style="margin-top:-16px; padding-left: 5px;" />
		    </a>
		</div>
		<div>
		    <ul class="nav navbar-nav">
			<li><a href="home.php">Home</a></li>
			<li class="active"><a href="edit.php">Edit Articles</a></li>
			<li><a href="published">Publised</a></li> 
		    </ul>
		    <ul class="nav navbar-nav navbar-right" style="margin-right: 12px;">
			<li style="border-left: thin solid #fff;"><a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a></li>
		    </ul>
		</div>
	    </div>
	</nav>
	<div class="container form-edit">
	    <center style="padding-bottom: 15px; font-size: 18px;">Krispypapad Content Admin Portal For Updating Articles</center>
	    <form id="test" action="#" method="post">
		<div class="row" id="row1">
		    <div class="col-lg-4">
			<label for="title">Title:</label>
			<input type="text" class="form-control" name="title" id="title"placeholder="Article Title"/>
		    </div>
		    <div class="col-lg-4">
			<label for="author">Author:</label>
			<input type="text" class="form-control" name="author" placeholder="Author"/>
		    </div>
		    <div class="col-lg-2">
			<label for="source">Source:</label>
			<input type="text" class="form-control" name="source" placeholder="Article Source Name"/>
		    </div>
		    <div class="col-lg-2">
			<label for="poweredby">Powered By:</label>
			<input type="text" class="form-control" name="powered_by" placeholder="Powered By"/>
		    </div>
		</div><br>
		<div class="row" id="row2">
		    <div class="col-lg-4">
			<label for="tags">Tags:</label>
			<input type="text" class="form-control" name="tags" placeholder="Article Tags"/>
		    </div>
		     <div class="col-lg-4">
			<label for="image">Image Link:</label>
			    <input type="text" class="form-control" name="img" placeholder="Article Image"/>
		    </div>
		    <div class="col-lg-4">
			<label for="originallink">Original Link:</label>
			    <input type="text" class="form-control" name="article_link" placeholder="Original Article Link"/>
		    </div> 
		</div><br>
		<div class="row" id="row3">
		    <div class="col-lg-6"> 
			<label for="content1">Content_1:</label>
			<textarea class="form-control" rows="3" cols="40" name="content_1" id="content-1" placeholder="Article Short Content In 320 Characters"></textarea>
			<p id="char_val_1" style="color: blue;">320 characters remaining</p>
		    </div>
		    <div class="col-lg-6"> 
			<label for="content2">Content_2:</label>
			<textarea class="form-control" rows="3" cols="40" name="content_2" id="content-2" placeholder="Article Short Content In 320 Characters"></textarea>
			<p id="char_val_2" style="color: blue;">320 characters remaining</p>
		    </div>
		    
		</div>
		<div style="float: right; margin-top: 20px;">
		    <button type="button" class="btn btn-default" id="cancel">Cancel</button>
		    <button type="button" class="btn btn-success" name="submit" id="submit">Submit</button>
		</div>
	    </form>
	</div>
	<script type="text/javascript">
	    $(document).ready(function () {
		$('#cancel').click(function(){
		    if (confirm("Click ok to close the current tab?")) {
			window.top.close();
		    }
		});
	    });
	</script>
</body>
</html>