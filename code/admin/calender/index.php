<!DOCTYPE html>
<html>
<head>
  <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
  
  <script>
  $(document).ready(function() {
    $("#datepicker").datepicker();
	$.datepicker.formatDate('yy-mm-dd', new Date(2010, 04 - 1, 26));
  });
  </script>
</head>
<body style="font-size:62.5%;"><p>Date: <input type="text" id="datepicker"></p></body>
</html>
