<?php
$data = file_get_contents('https://sgfyl-cdn.nskok.com/SGFYL/Game/1.1.57/StreamingAssets/WebGL/catalog_1.0.1.json');
$data = json_decode($data, true);
$data = $data['m_InternalIds'];
$data = array_filter($data, function ($item) {
    return str_starts_with($item, 'http');
});
$aria2 = implode("\n", $data);
file_put_contents('sgfyl.aria2', $aria2);
passthru('aria2c -i sgfyl.aria2 -j 10 -d sgfyl源文件');
