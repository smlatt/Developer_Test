<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" >
<head>
	<title>Task 1: Solution 1</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  <!-- page content encoded as utf-8 -->
	<meta name="keywords" content="integer range,range checker" /> <!-- for SEO friendly -->
	<meta name="description" content="Script will accepts a positive integer range and, print relavant data" /> <!-- for SEO friendly -->
	
	<script type="text/javascript">
	// Check number only
	function numbersonly(e){
		var key;
		var keychar;
		if (window.event)
	  	 	key = window.event.keyCode;
		else if (e)
	   		key = e.which;
		else
	   	return true;	
		keychar = String.fromCharCode(key);
		// control keys
		if ((key==null) || (key==0) || (key==8) ||
	    	(key==9) || (key==13) || (key==27) )
	   	return true;
		// numbers
		else if ((("0123456789").indexOf(keychar) > -1)){
            		    return true;
		}
		else return false;
	}
	
	</script>
	<style type="text/css">
		body {font-family: verdana, arial, sans-serif;}
		.error{color: #F90909; padding-bottom: 20px; }
		.title{color: #069B33; }
	</style>
</head>
<body>
	<form method="POST">
		<!-- Accept input -->
		<span class="title">Enter positive integet range <br> </span>
		From : <input type="text" name="from" id="from" value="<?php echo $_REQUEST['from'];?>" maxlength="10" onkeypress = "return numbersonly(event);" >
		To : <input type="text" name="to" id="from" value="<?php echo $_REQUEST['to'];?>" maxlength="10" onkeypress = "return numbersonly(event);" >
		<input type="submit" value="Print" name="submit" id="submit">
		
	</form>
	<div>
		
		<?php	
		if($_REQUEST['submit']){
			if( $_REQUEST['from']!='' && $_REQUEST['to']!='' ){  
				if ( $_REQUEST['from'] > $_REQUEST['to'] ){
					echo '<div class="error"><b>"From"</b> should not greater than <b>"To"</b> range.</div>'; 
				}
				for( $i=$_REQUEST['from']; $i<=$_REQUEST['to']; $i++ ){				
					if( ($i % 3) == 0  && ($i % 5) == 0 ){
						echo 'FizzBuzz'.'&nbsp;';
					}elseif( ($i % 3) == 0 ){
						echo 'Fizz'.'&nbsp;';
					}elseif( ($i % 5) == 0 ){
						echo 'Buzz'.'&nbsp;';
					}else{
						echo $i.'&nbsp;';
					}
				}
			}else{
				if( $_REQUEST['from'] == '' ) echo '<div class="error">Please enter <b>"From"</b> range</div>'; 
				if( $_REQUEST['to'] == '' ) echo '<div class="error">Please enter <b>"To"</b> range</div>'; 
			}
		}
		?>
	</div>
</body>
</html>