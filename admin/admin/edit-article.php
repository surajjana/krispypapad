<?php
    session_start();
    if(!isset($_SESSION['login'])){
	header("Location: index.php");
    }
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: PUT, GET, POST");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
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
	    .upload{
		float: right;
		margin-top: -33px;
		margin-right: 15px;
		background: white;
		padding: 6px 10px 6px 10px;
		border-radius: 3px;
		cursor: pointer;
	    }
	    .upload:hover{
		background: #fff9;;
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
	    $('.container').hide();
	    $("#loading").show();
	    var getid = "<?php echo $_GET["id"] ?>";
	    $.ajax({
	    url: "https://krispypapad.com:8000/articles/"+getid,
	    dataType: 'text',
	    success: function(data){
		var obj = JSON.parse(data);
		
		    var status = obj[0].status;
		    var source_name = obj[0].source_name;
		    var powered_by = obj[0].powered_by;
		    var tags = obj[0].tags;
		    var image = obj[0].image;
		    var title = obj[0].title;
		    var shares = obj[0].shares;
		    var id = obj[0].id;
		    var likes = obj[0].likes;
		    var content_1 = obj[0].content_1;
		    var time_stamp = obj[0].time_stamp;
		    var author = obj[0].author;
		    var _id = obj[0]._id.$oid;          
		    var original_link = obj[0].original_link;
		    var content_2 = obj[0].content_2;
		   
		    var timeStamp_value = time_stamp;
		    var theDate = new Date(timeStamp_value * 1000);
		    dateString = theDate.toGMTString();
		 
		    $("#title").attr("value",title);
		    $("#id").attr("value",id);
		    $("#status").attr("value",status);
		    $("#time").attr("value",dateString);
		    $("#source").attr("value",source_name);
		    $("#author").attr("value",author);
		    $("#id2").attr("value",_id);
		    $("#tags").attr("value",tags);
		    $("#powered_by").attr("value",powered_by);
		    $("#content1").val(content_1);
		    $("#content2").val(content_2);
		    $("#original_link").attr("value",original_link);
		    $("#image").attr("value",image);
		    
		    $("#loading").hide();
		    $('.container').show();
		}
	    });  
	});
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
	<div id="loading" style="margin-left: 50%;"><img src="../img/loading.gif" /></div>	
	
	<div class="container form-edit">
	    <form action="#" method="post">
		<div class="row" id="row1">
		    <div class="col-lg-4">
			<label for="title">Title:</label>
			<input type="text" class="form-control" id="title" value=""/>
		    </div>
		    <div class="col-lg-2">
			<label for="id">ID:</label>
			<input type="text" class="form-control" id="id" value=""/>
		    </div>
		    <div class="col-lg-1">
			<label for="stats">Status:</label>
			<input type="text" class="form-control" id="status" value=""/>
		    </div>
		    <div class="col-lg-3">
			<label for="time">Time:</label>
			<input type="text" class="form-control" id="time" value=""/>
		    </div>
		    <div class="col-lg-2">
			<label for="source">Source:</label>
			<input type="text" class="form-control" id="source" value=""/>
		    </div>
		</div><br>
		<div class="row" id="row2">
		    <div class="col-lg-4">
			<label for="author">Author:</label>
			<input type="text" class="form-control" id="author" value=""/>
		    </div>
		    <div class="col-lg-3">
			<label for="id2">ID_2:</label>
			<input type="text" class="form-control" id="id2" value=""/>
		    </div>
		    <div class="col-lg-3">
			<label for="tags">Tags:</label>
			<input type="text" class="form-control" id="tags" value=""/>
		    </div>
		    <div class="col-lg-2">
			<label for="poweredby">Powered By:</label>
			<input type="text" class="form-control" id="powered_by" value=""/>
		    </div>
		</div><br>
		<div class="row" id="row3">
		    <div class="col-lg-4"> 
			<label for="content1">Content_1:</label>
			<textarea class="form-control" rows="3" cols="40" id="content1"></textarea>
		    </div>
		    <div class="col-lg-4"> 
			<label for="content2">Content_2:</label>
			<textarea class="form-control" rows="3" cols="40" id="content2"></textarea>
		    </div>
		    <div class="col-lg-4">
			<label for="originallink">Original Link:</label>
			    <input type="text" class="form-control" id="original_link" value=""/>
			    
			<label for="image" style="margin-top: 3px;">Image Link:</label>
			    <input type="text" class="form-control" id="image" style="width: 82%;" value=""/>
				<span class="upload"><i class="fa fa-upload" aria-hidden="true"></i></span>
		    </div>
		</div>
		<div class="ebuttons" style="float: right; margin-top: 20px;">
		    <button type="button" class="btn btn-default" id="cancel">Cancel</button>
		    <button type="button" class="btn btn-success" onclick="updateFunction()">Update</button>
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
		
	    function updateFunction() {
		var title = document.getElementById("title").value;
		var id = document.getElementById("id").value;
		var status = document.getElementById("status").value;
		var time_stamp = document.getElementById("time").value;
		var source_name = document.getElementById("source").value;
		var author = document.getElementById("author").value;
		var _id = document.getElementById("id2").value;
		var tags = document.getElementById("tags").value;
		var powered_by = document.getElementById("powered_by").value;
		var content_1 = document.getElementById("content1").value;
		var content_2 = document.getElementById("content2").value;
		var original_link = document.getElementById("original_link").value;
		var image = document.getElementById("image").value;
				
		var jsonDataObject = new Object();
		jsonDataObject.status = status==null?"":status;
		jsonDataObject.source_name = source_name==null?"":source_name;
		jsonDataObject.tags = tags==null?"":tags;
		jsonDataObject.title = title==null?"":title;
		jsonDataObject.image = image==null?"":image;
		jsonDataObject.author = author==null?"":author;
		jsonDataObject.powered_by = powered_by==null?"":powered_by;
		jsonDataObject.original_link = original_link==null?"":original_link;
		jsonDataObject.content_2 = content_2==null?"":content_2;
		jsonDataObject.content_1 = content_1==null?"":content_1;
		jsonDataObject.time_stamp = time_stamp==null?"":time_stamp;
		jsonDataObject.id = id==null?"":id;
		
		var jsonData = JSON.stringify(jsonDataObject);
		jQuery.support.cors = true;
		    
		$.ajax({
		type:"POST",
		dataType: "json",
		data :jsonData,
		contentType: "application/json",
		url: 'https://krispypapad.com:8000/update',
		success: function(data){
		    alert("Updated successfully");
		}
	    });
	    }
	</script>
</body>
</html>