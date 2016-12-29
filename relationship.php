<?php
/**
 * MongoDB 关系演示实例
 * https://jiangbianwanghai.gitbooks.io/mongodb/content/relationship.html
 */

if (isset($_GET['demo']) && in_array($_GET['demo'], [1,2])) {
    $demo = $_GET['demo'];
} else {
    $demo = 1;
}

$uri = "mongodb://mongoadmin:mongoadmin@192.168.8.234:27017";
$client = new MongoClient($uri);
$users = $client->test->users;

//嵌入式关系
if ($demo == 1) {
    echo "嵌入式关系实例演示";
    $cursor = $users->findOne(array('name' => 'Tom Benzamin'));
    var_dump($cursor);
}

//引用式关系
if ($demo == 2) {
    echo "引用式关系实例演示";
    $cursor = $users->findOne(array('name' => 'Tom Hanks'));
    var_dump($cursor);
    echo "#===========#\n";
    $address = $client->test->address;
    $all = $address->find(array("_id"=>array('$in' => $cursor["address_ids"])));
    foreach ($all as $item) {
        var_dump($item);
        echo "#-----------#\n";
    }
}
