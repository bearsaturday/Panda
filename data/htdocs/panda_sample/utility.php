<?php
include 'panda_ini.php';
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="default.css" type="text/css" media="screen" />
</head>
<body>
<h1>Panda Debug Utilities</h1>
<p>start. (Open firebug console with firePHP.)</p>
<h2>p —   Prints human-readable information about a variable with location and variable name</h2>
<h2>p —  指定した変数に関する情報を出力元と変数名と共に解りやすく出力する </h2>
<h3> mixed p ( mixed $expression  [, string $mode= 'dump'  ] [, array $options = array() ])</h3>
<code>p($_GET);</code>
<p><?php
p($_GET);
?></p>
<code>p($_GET, 'var');</code>
<p><?php
p($_GET, 'var');
?></p>
<code>p($_GET, 'printa');p($date, 'printa');</code>
<p><?php
$date = date('r');
p($_GET, 'printa');
p($date, 'printa');
?></p>
<code>p($_GET, 'dump');p($date, 'dump');</code>
<p><?php
p($_GET, 'dump');
p($date);
?></p>
<code>p($_GET, 'export');</code>
<p><?php
//trigger_error(0, E_USER_WARNING);
p($_GET, 'export');
?></p>
<code>p($_GET, 'syslog');</code>
<p><?php
p($_GET, 'syslog');
?> See syslog</p>
<code>p($_GET, 'fire');</code>
<p><?php
p($_GET, 'fire');
?> See firebug console on FireFox with firePHP</p>

<h2>t — Prints trace link</h2>
<h2>t — トレースリンクを出力する </h2>
<h3> void t ( void )</h3>

<h2>Trace</h2>
<code>t();t();</code>
<?php
t();
t();
?>
</body>
</html>
