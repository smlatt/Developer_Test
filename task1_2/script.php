<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" >
<head>
	<title>Task 1: Solution 2</title>
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
		body {font-family: verdana, arial, sans-serif; width: 90%; }
		.error{color: #F90909; padding-bottom: 20px; }
		.title{color: #069B33; }
		.result{border: 1px solid #069B33; padding: 10px; width: 80%; margin-top: 20px;word-wrap:break-word;}
	</style>
</head>
<body>
	<form method="POST">
		<!-- Accept input -->
		<span class="title">Enter positive integer range :<br> <br> </span>
		From : <input type="text" name="from" id="from" value="<?php echo $_REQUEST['from'];?>" maxlength="10" onkeypress = "return numbersonly(event);" >
		To : <input type="text" name="to" id="from" value="<?php echo $_REQUEST['to'];?>" maxlength="10" onkeypress = "return numbersonly(event);" >
		<input type="submit" value="Print" name="submit" id="submit">
		
	</form>
	<div>
		
		<?php	
		 // check form submit
		if($_REQUEST['submit']){
			// check range are not empty and from range must less than to range
			if( $_REQUEST['from']!='' && $_REQUEST['to']!='' && $_REQUEST['from'] < $_REQUEST['to'] ){  
				//display result div
				echo '<div class="result">';
				for( $i=$_REQUEST['from']; $i<=$_REQUEST['to']; $i++ ){				
					if( ($i % 3) == 0  && ($i % 5) == 0 ){ // $i is both multiple of 3 and 5 
						echo 'FizzBuzz'.'&nbsp;';
					}elseif( ($i % 3) == 0 ){ // $i is multiple of 3 
						echo 'Fizz'.'&nbsp;';
					}elseif( ($i % 5) == 0 ){// $i is multiple of 5 
						echo 'Buzz'.'&nbsp;';
					}else{
						if( $i-1 >= $_REQUEST['from'] && $i-2 >= $_REQUEST['from'] ){ // check not to less than from range
							if( ( ($i-1) % 3 ==0 || ($i-1) % 5 ==0 ) && ( ($i-2) % 3 ==0 || ($i-2) % 5 ==0  ) ){
								echo 'Bazz'.'&nbsp;';
							}else{
								echo $i.'&nbsp;';
							}
						}else{
							echo $i.'&nbsp;'; // $i is not multiple of both 3 or 5
						}
					}
				}
				echo '</div>';
				
			}else{
				// display error message for "from" range empty
				if( $_REQUEST['from'] == '' ) echo '<div class="error">Please enter <b>"From"</b> range</div>'; 
				// display error message for "to" range empty
				if( $_REQUEST['to'] == '' ) echo '<div class="error">Please enter <b>"To"</b> range</div>'; 
				// display error message for "from" range greater than "to" range
				if ( $_REQUEST['from'] > $_REQUEST['to'] )	echo '<div class="error"><b>"From"</b> range should not greater than <b>"To"</b> range.</div>'; 				
			}
			
		}
		?>
	</div>
</body>
</html>