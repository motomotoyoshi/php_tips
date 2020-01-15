<?php
// 規則性のあるテキストの配列を分類してkey,valueペアを生成しJSONにする

$items = [
    "item1key1=value1",
    "item1key2=value2",
    "item2key1=value3",
    "item2key2=value4"
];
$array_index = [];
$array = [];

foreach($items as $item) {
    preg_match("/item\d{1,3}/", $item, $key);

    // idを生成
    if(!in_array($key[0], $array_index)) {
        array_push($array_index, $key[0]);
        $array_index_num = array_search($key[0], $array_index);
        array_push($array, array('id' => $key[0]));
    }

    // headを生成
    if (preg_match("/key1=.*/", $item)) {
        preg_match("/key1=.*/", $item, $key1);
        $key1 = str_replace("key1=", "", $key1[0]);
        $array[$array_index_num]['key1'] = $key1;
    }

    // bodyを生成
    if (preg_match("/key2=.*/", $item)) {
        preg_match("/key2=.*/", $item, $key2);
        $key2 = str_replace("key2=", "", $key2[0]);
        $array[$array_index_num]['key2'] = $key2;
    }

    
}

var_dump(json_encode($array));


// [
//     {
//         "id":"item1",
//         "key1":"value1",
//         "key2":"value2"
//     },
//     {
//         "id":"item2",
//         "key1":"value3",
//         "key2":"value4"
//     }
// ]