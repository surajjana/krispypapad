<?php session_start();
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
	    
	<script src="../js/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<style>
	    .container{
		width: 1170px;
	    }
	    .news-card {
		position: relative;
		display: inline-block;
		border-radius: 3px;
		margin: 15px 22px 20px 1px; 
		padding: 8px;
		height: 255px;
		width: 541px;
		z-index: 1;
		vertical-align: top;
	    }
	    .news-card-image {
		position: absolute;
		height: 150px;
		width: 160px;
		border-radius: 4px;
		overflow: hidden;
		margin-left: 1px;
		background-size: cover;
		background-position: 50%;
	    }
	    .news-card-title{
		font-size: 17px;
		line-height: 23px;
	    }
	    .navbar, .news-card, .card, .side-nav{
		box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);
	    }
	    .right-element{
		left:34%;
		position: absolute;
	    }
	    .news-card-author-time {
		font-size: 12px;
		font-weight: 300;
		line-height: 20px;
		color: #808290;
		padding-right: 18px;
	    }
	    .article-body{
		font-size: 12px;
		padding: 5px 25px 0px 0px;
	    }
	    .article-tags{
		font-size: 11px;
		position: absolute;
		top: 65%;
		padding-top: 3px;
		padding-left: 7px;
		width: 160px;
		line-height: 15px;
		height: auto;
		border-left: 1px solid #8c8b8bb3;
		border-right: 1px solid #8c8b8bb3;
	    }
	    .news-card-title a{
		text-decoration: none;
	    }
	    .block2{
		margin-top: 10px;
		padding-right: 25px;
	    }
	    .buttons{
		float: right;
	    }
	    .aid{
		position: absolute;
		border-radius: 3px;
		padding: 8px;
		background-color: #eeeeee;
	    }
	    .acontainer{ 
	    }
	</style>
	<script type="text/javascript">
            $(document).ready(function(){
	    $('.acontainer').hide();
	    $("#loading").show();
	    
	    $.ajax({
	    url: 'http://crm.krispypapad.xyz/articles',
	    dataType: 'text',
	    success: function(data){
		$("#loading").hide();
		$('.acontainer').show();
		var obj = JSON.parse(data);
        //    	for(var i=0; i<= obj.length; i++)
	//	{
		    var status = obj[5].status;
		    var source_name = obj[5].source_name;
		    var powered_by = obj[5].powered_by;
		    var tags = obj[5].tags;
		    var image = obj[5].image;
		    var title = obj[5].title;
		    var shares = obj[5].shares;
		    var id = obj[5].id;
		    var likes = obj[5].likes;
		    var content_1 = obj[5].content_1;
		    var time_stamp = obj[5].time_stamp;
		    var author = obj[5].author;
		//    var id = obj._id[i].$oid;
		    var _id = obj[5]._id.$oid;          
		    var original_link = obj[5].original_link;
		    var conntent_2 = obj[5].content_2;
		   
		    var timeStamp_value = time_stamp;
		    var theDate = new Date(timeStamp_value * 1000);
		    dateString = theDate.toGMTString();
            	   
		    if (image.length == 0 || null) {
			    image = 'images/404.jpg';
		    }
		    $('.aimage').attr("src",image);    
		    	    
		    $('.asource').append(source_name);
		    $('.atags').append(tags);
		    $('.atitle').append(title);
		    $('.gid').append(id);
		    $('.article-body').append(content_1);
		    $('.time').append(dateString);
		    $('.author-name').append(author);
//		    $('').append(original_link);
//		    $('').append(content_2);
	//	}  
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
			<li class="active"><a href="#">Home</a></li>
			<li><a href="edit-article.php">Edit Articles</a></li>
			<li><a href="published">Publised</a></li> 
		    </ul>
		    <ul class="nav navbar-nav navbar-right" style="margin-right: 12px;">
			<li style="border-left: thin solid #fff;"><a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a></li>
		    </ul>
		</div>
	    </div>
	</nav>
	<div id="loading" style="margin-left: 50%;"><img src="../img/loading.gif" /></div>
	
	
	<div class="container">
	    <div class="acontainer">
		<div class="news-card">
		<a href="#" target="_blank"><div class="news-card-image" >
		    <img class="aimage" src="" style="height: 150px; width: 160px;">
		</div></a>
		    <div class="article-tags">
			<div class="article-source">
			    <span style="color:#44444d;"><b>Source: </b></span>
			    <span class="asource"></span>
			</div>
			<div style="padding-top: 5px;">
			    <span style="color:#44444d;"><b>Tags: </b></span>
			    <span class="atags"> </span>
			</div>
		    </div>
		    <div class="right-element">
		        <div class="news-card-title"><a href="#" target="_blank"><span class="atitle"></span></a></div>
			<div class="news-card-author-time">
			    <span style="color:#44444d;">Author: </span>
			    <span class="author-name"> </span> on <span class="time"> </span>
			</div>
			<div class="article-body">
			    
			</div>
			<div class="block2">
			    <span class="aid">ID: <span class="gid"></span></span>			    
			    <div class="buttons">
				<a href="edit-article.php" id="link"><button type="button" class="btn btn-default">Edit</button></a>
				<button type="button" class="btn btn-info">Publish</button>
				<button type="button" class="btn btn-warning">Push To Bot</button>
			    </div>
			</div>
		    </div>
		</div>
	    </div>    
	</div>
    <script type="text/javascript">
	$(".btn-default").click(function(){
	    var id = $(".gid").html();
	    $("#link").attr("href", "edit-article.php?id=" + id);
    });
	
	function getid() {
	    var id = $('.gid').html();
	    
	   // alert(txt);
	    
	}
    </script>
</body>
</html>