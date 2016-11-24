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
		margin-top: 80px;
	    }
	</style>
	<script type="text/javascript">
        $(document).ready(function(){
	    $("#loading").show();
	    
	    $.ajax({
	    url: 'http://crm.krispypapad.xyz/articles',
	    dataType: 'text',
	    success: function(data){
		var obj = JSON.parse(data);
            	for(var i=0; i<= obj.length; i++)
		{
		    var status = obj[i].status;
		    var source_name = obj[i].source_name;
		    var powered_by = obj[i].powered_by;
		    var tags = obj[i].tags;
		    var aimage = obj[i].image;
		    var title = obj[i].title;
		    var shares = obj[i].shares;
		    var id = obj[i].id;
		    var likes = obj[i].likes;
		    var content_1 = obj[i].content_1;
		    var time_stamp = obj[i].time_stamp;
		    var author = obj[i].author;
		//    var id = obj._id[i].$oid;
		    var _id = obj[i]._id.$oid;          
		    var original_link = obj[i].original_link;
		    var conntent_2 = obj[i].content_2;
		    var querystring='edit-article.php?id='+obj[i].id;
		    var timeStamp_value = time_stamp;
		    var theDate = new Date(timeStamp_value * 1000);
		    dateString = theDate.toGMTString();
            	   
		    if (aimage === undefined || aimage==null || aimage=='') {
			    aimage = 'images/404.jpg';
			}else if (!aimage.toString().match(/\.(gif|jpeg|jpg|png)/)){
				    aimage = 'images/404.jpg';
				}
		    $('.acontainer').append(
				"<div class='news-card'>" +
				    "<a href='#' target='_blank'>" +
					"<div class='news-card-image'>" +
					    "<img class='aimage' src='"+ aimage+ "'" + "style='height: 150px; width: 160px;'>" +
					"</div>" +
				    "</a>" +
				    "<div class='article-tags'>" +
					"<div class='article-source'>" +
					    "<span style='color:#44444d;'><b>Source: </b></span>" +
					    "<span class='asource'>"+ source_name +"</span>" +
					"</div>" +
					"<div style='padding-top: 5px;'>" +
					    "<span style='color:#44444d;'><b>Tags: </b></span>" +
					    "<span class='atags'>"+ tags +"</span>" +
					"</div>" +
				    "</div>" + 
				    "<div class='right-element'>" +
				    "<div class='news-card-title'><a href='#' target='_blank'><span class='atitle'>"+ title +"</span></a></div>" +
				    "<div class='news-card-author-time'>" +	
					"<span style='color:#44444d;'>Author: </span>" +
					"<span class='author-name'>"+ author +"</span> on <span class='time'>"+ dateString +"</span>" +
				    "</div>" +
				    "<div class='article-body'>" + content_1 +			    
				    "</div>" +
				    "<div class='block2'>" +
					"<span class='aid'>ID: <span class='gid'>"+ id +"</span></span>" +		    
					"<div class='buttons'>" +
					    "<a href="+querystring+" id='api_"+id+"' target='_blank'><button type='button' class='btn btn-default'>Edit</button></a>&nbsp;" +
//					    "<button type='button' id='api_"+id+"' class='btn btn-default'>Edit</button>&nbsp;" +
					    "<button type='button' class='btn btn-success'>Approve</button>&nbsp;" +
					    "<button type='button' class='btn btn-info'>Push To Bot</button>" +
					"</div>" +
	    			    "</div>" +
				"</div>" +
			    "</div>" );
		$("#loading").hide();
		}  
	    }
        });
// to load the model and edit data 	    
/*	$(document).on('click', '.btn', function(){ 
	      alert(this.id);
	});	
*/
    });
    </script>
	
    </head>
    <body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
	    <div class="container-fluid">
		<div class="navbar-header">
		    <a class="navbar-brand" href="index.php">
			<img src="../img/brand.png" alt="KP" style="margin-top:-16px; padding-left: 5px;" />
		    </a>
		</div>
		<div>
		    <ul class="nav navbar-nav">
			<li class="active"><a href="home.php">Home</a></li>
			<li><a href="edit-article.php">Edit Articles</a></li>
			<li><a href="published">Publised</a></li> 
		    </ul>
		    <ul class="nav navbar-nav navbar-right" style="margin-right: 12px;">
			<li style="border-left: thin solid #fff;"><a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a></li>
		    </ul>
		</div>
	    </div>
	</nav>
	<div id="loading" style="margin-left: 50%; margin-top: 10%;"><img src="../img/loading.gif" /></div>
	
	<div class="container">
	    <div class="acontainer">
	    </div>    
	</div>	
</body>
</html>