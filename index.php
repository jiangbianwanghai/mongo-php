<?php
//组合URI
//$uri = ""; //如果为空等同于mongodb://localhost:27017
$uri = "mongodb://mongoadmin:mongoadmin@192.168.8.234:27017";
$client = new MongoClient($uri);

//第一种方式。使用selectDB和selectCollention选择库和集合
//$db = $client->selectDB('demo');
//$collection = $db->selectCollection('teams');

//第二种方式。使用链式选择集合
//$collection = $client->demo->teams;

//==========================
//更新单条文档
/*$newdata = array('$set' => array("address" => "3 Smith Lane"));
$res = $collection->update(array('_id' => new MongoId('582d5fa021b8cf1a733d7344')), $newdata);*/

//==========================
//查找单条文档
/*$cursor = $collection->findOne(array('_id' => new MongoId('582d5fa021b8cf1a733d7344')));
var_dump($cursor);*/

//==========================
//创建集合，插入文档，并遍历集合
/*$db = $client->demo;
$log = $db->createCollection(
    "logger",
    array(
        'capped' => true,
        'size' => 10*1024,
        'max' => 10
    )
);

for ($i = 0; $i < 100; $i++) {
    $log->insert(array("level" => "WARN", "msg" => "sample log message #$i", "ts" => new MongoDate()));
}

$msgs = $log->find();

foreach ($msgs as $msg) {
    echo $msg['msg']."\n";
}*/

//==========================
//删除文档
/*$collection = $client->demo->teams;
$collection->remove(array("name"=>"Hinterland"), array("justOne" => true));*/

//==========================
//保存一个文档到集合
/*$collection = $client->demo->teams;
$obj = array('x' => 1);

// 插入 $obj 到 db
$collection->save($obj);
var_dump($obj);

// 增加额外的字段
$obj['foo'] = 'bar';

// $obj 不能被再次插入，导致 duplicate _id 错误
$collection->insert($obj);

// 保存、更新附带新字段的 $obj
$collection->save($obj);*/

//==========================
//分页
/*$collection = $client->demo->logger;
$cursor = $collection->find();
$res = $cursor->limit(3);
foreach ($res as $item) {
    echo $item['msg']."\n";
}*/

//==========================
//分页(第N页)
/*$collection = $client->demo->logger;
$cursor = $collection->find();
$res = $cursor->skip(3)->limit(3);
foreach ($res as $item) {
    echo $item['msg']."\n";
}*/

//==========================
//检索数据可以使用sort()方法来对数据进行排序，指定排序字段，并使用1或-1来指定排序方式是升序或降序。类似于SQL语句中的order by语句。
/*$collection = $client->demo->logger;
$cursor = $collection->find();
$res = $cursor->sort(array('msg' => -1));
foreach ($res as $msg) {
    echo $msg['msg']."\n";
}
*/
