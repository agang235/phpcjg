<?php
define(COUNTER_FILE, realpath(APPPATH).DIRECTORY_SEPARATOR."logs/counter.txt");
echo COUNTER_FILE;
if(!file_exists(COUNTER_FILE))
{
	$visits = 0;
	
}
else
{
	$visits = file_get_contents(COUNTER_FILE);
}

$visits++;

file_put_contents(COUNTER_FILE, $visits);
define("VISITED_NUM", $visits);//浏览次数
