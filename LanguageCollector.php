
<?php

require 'vendor/autoload.php';

$paths   = [
    'C:\wamp64\www\football',
];

$list = [];
function listFolderFiles($dir, &$list){
    $ffs = scandir($dir);// return the folders name in an array

    // removing the . or .. folders
    unset($ffs[array_search('.', $ffs, true)]);
    unset($ffs[array_search('..', $ffs, true)]);


    // prevent empty ordered elements
    if (count($ffs) < 1)
        return;

    foreach($ffs as $ff){
        
        if (file_exists($dir.'/'.$ff) && !is_dir($dir.'/'.$ff)) {
            $list[] = $dir.'/'.$ff;
        }

        if(is_dir($dir.'/'.$ff)) {
            listFolderFiles($dir.'/'.$ff, $list);
        }
    }
}


foreach($paths as $path){
    listFolderFiles($path, $list);
}

$text = '';
$arr = [];
$count = 1;

foreach ($list as $item) {
    $fh = fopen($item,'r');

    while ($line = fgets($fh)) {
        preg_match_all('#\_\_\([\'\"](.*?)[\'\"][( ,),\)]#', $line, $match);
        preg_match_all('#jsLang\([\'\"](.*?)[\'\"][( ,),\)]#', $line, $jsMatch);
        
        foreach ($match[1] as $key => $value) {
            if (!in_array($value, $arr)) {
                $arr[] = $value;
                $text .= '    "' . $value . '": "' . $value . '",' . "\n";
            }
        }
        foreach ($jsMatch[1] as $key => $value) {
            if (!in_array($value, $arr)) {
                $arr[] = $value;
                $text .= '    "' .  $value . '": "' . $value . '",'. "\n";
            }
        }
    
    }
    fclose($fh);
}

$text = str_replace("\'", "'", $text);

$text = "{\n" . $text . "}";
$text = str_replace(",\n}", "\n}", $text);
// echo $text;

// Location where file save
$lang = fopen("C:/wamp64/www/football/lang/en.json", "w");
fwrite($lang, $text);
fclose($lang);
echo 'success';
?>
