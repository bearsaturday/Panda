<html>
<head>
<link rel="stylesheet" href="default.css" type="text/css" media="screen" />
</head>
<body>
<h1>Panda Sample Page</h1>
<?php
$main = new Test_App_Main();
$main->run();
// warning error in root (BIG context)
//echo 1 / 0;
?>
<p>end.</p>
<h1>More Error</h1>
<ul>
	<li><a href="fatal_error.php">fatal error</a></li>
	<li><a href="pear_error.php">pear error</a></li>
	<li><a href="uncaught_exception.php">uncaght exception</a></li>
	<li><a href="panda_exception.php">panda exception</a></li>
</ul>
<h1>PHP Standard Error (without Panda)</h1>
<ul>

	<li><a href="?nopanda">this page</a></li>
	<li><a href="fatal_error.php?_nopanda">fatal error</a></li>
	<li><a href="pear_error.php?_nopanda">pear error</a></li>
	<li><a href="uncaught_exception.php?_nopanda">uncaght exception</a></li>

</ul>
<h1>Debug Utility</h1>
<ul>
	<li><a href="utility.php?a=1&msg=hello_panda">panda debug function</a></li>
</ul>
<h1>FirePHP supported.</h1>
<p>firebug console error output on FireFox is also available, open firefox console after install <a href="https://addons.mozilla.org/ja/firefox/addon/6149">FirePHP.</a></p>
</body>
</html>



</body>
</html>
