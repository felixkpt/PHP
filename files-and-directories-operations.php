<style>
    h1, h2, h3{
        color: blue;
    }
    div{
        font-size: 18px;
        color: #ff2834;
        /*font-weight: bold;*/
        line-height: 40px;
    }
</style>
<h1>Files and Directories Operations in PHP</h1>
<?php
echo '<h2>Path Operations</h2>';
$path = 'includes/sample.txt';
$path2 = 'includes/sample2.txt';
echo '<div>Path:</div>';
echo $path.'<br>';

//Returning file name
echo '<div>Returning file name:</div>';
echo basename($path)."<br>";

//Returning filename without extension
echo '<div>Returning filename without extension:</div>';
echo basename($path, '.php')."<br>";
//or even more advanced
echo '<div>Getting base name without extension automatically:</div>';
$extension = pathinfo($path)['extension'];
echo basename($path, '.'.$extension)."<br>";

//Returning dirname
echo '<div>Returning dirname:</div>';
echo dirname($path)."<br>";


echo '<div>Getting absolute path (abs path)  of a file:</div>';
echo realpath($path)."<br>";


echo '<div>Check if file is writable:</div>';
echo is_writable($path)."<br>";

echo '<div>Make Directory named uploads inside includes directory using function mkdir() and then specify path. in our case the path will be: \'./includes/uploads\'</div>';
$res = mkdir('./includes/uploads');
echo $res.'<br>';


echo '<div>Remove/Delete a directory if empty using php function rmdir():</div>';
//rmdir('./includes/uploads');

echo '<div>Coping files from another file to another with the same content using copy() function:</div>';
echo copy($path, $path2);

echo '<div>Rename file using rename() function:</div>';
//echo rename($path2, $path);

echo '<div>Delete a file using unlink() function:</div>';
//echo unlink($path2);


echo '<div><h2>Opening/Writing/Deleting Files</h2></div>

<p>Opening a file named sample.txt located at '.$path.' and reading its contents using file_get_contents()</p>';
$contents = file_get_contents($path);
echo $contents.'<br>';

echo '<div>Write contents to a file using file_put_contents() function:</div>';
//file_put_contents($path, 'Name: John Doe
//Career: Web Developer
//Skills: Multi Talented');
echo '<div>Append contents to a file using file_put_contents() function:</div>';
$contents .= "Name: John Doe
Career: Web Developer
Skills: Multi Talented\n";
file_put_contents($path, $contents);


echo '<p>Opening a file named sample.txt located at ./includes and reading its contents using fopen</p>';
$handle = fopen($path, 'r');

    $size_to_read = filesize($path);

    if ($size_to_read > 0) {
        echo fread($handle, $size_to_read);
    }else{
    echo "No content in the file.<br>";
    }

fclose($handle);


echo '<div>Write contents to a file using fwrite() function (we open the file using fopen() with w mode):</div>';

$handle = fopen('./includes/sample3.txt', 'w');
$txt = "John Doe\n";
fwrite($handle, $txt);
$txt = "Steve Smith\n";
fwrite($handle, $txt);
fclose($handle);