<?php
require 'html/top.html';
if ($handle = opendir('images')) {
	while (false !== ($entry = readdir($handle))) {
		if ($entry !== "." && $entry !== "..") {
			echo "\t\t\t\t<section><img src='images/$entry' /></section>\n";
		}
	}
	closedir($handle);
}
require 'html/bottom.html';
