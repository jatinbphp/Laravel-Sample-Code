<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>
	<div class="row">
	    <div class="input-field col s12 k-input-text">
	      <div id="service_request_template">
	        @if(isset($content))
			   {!! stripslashes($content) !!}
	        @endif
	      </div>
	    </div>
  	</div>
</body>
</html>
