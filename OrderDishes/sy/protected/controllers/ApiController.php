<?php

class ApiController extends Controller {
   
    /*
     * 获取菜肴的接口
     * action 接口获取更多post
     * $_GET['FROM'], 从第几个开始. $_GET['OFFSET'],到第几个
     * url如如http://localhost:8888/orderdish/index.php/api/getdish?dishkind=酒&from=1&offset=20&order=price&callback=fn
     */
    public function actionGetdish() {
        $dishkind = null;
        if(isset($_GET['dishkind'])) {
            $dishkind = $_GET['dishkind'];
        }
        if (isset($_GET['from']) && isset($_GET['offset']) && isset($_GET['callback'])) {
            $from = $_GET['from'];
            $offset = $_GET['offset'];
            $callback_fn = $_GET['callback'];
            $order = $_GET['order'];
        }
        $sql = "SELECT * FROM dish ". ($dishkind? "WHERE dish_kind LIKE '%$dishkind%'":"") ." ORDER BY $order DESC LIMIT $from, $offset";
        $connection = Yii::app()->db;
        $dishes = $connection->createCommand($sql)->queryAll();

        echo $callback_fn . '(' . json_encode($dishes) . ');';
    }
    
    /*
     * 获取推荐菜肴的接口
     * http://localhost:8888/orderdish/index.php/api/getrecdish?callback=fn
     */
    public function actionGetrecdish() {
        $sql = "SELECT * FROM dish WHERE dish_reco=1 ORDER BY dish_score ASC";
        $connection = Yii::app()->db;
        $dishes = $connection->createCommand($sql)->queryAll();
        echo $_GET['callback'] . '(' . json_encode($dishes) . ');';
    }
    
    /*
     * 获取搜索菜肴的接口
     * http://localhost:8888/orderdish/index.php/api/searchdish?condition=菜&from=0&offset=6&callback=fn
     */
    public function actionSearchdish() {
        if(isset($_GET['condition'])&isset($_GET['from']) && isset($_GET['offset']) && isset($_GET['callback'])) {
            $from = $_GET['from'];
            $offset = $_GET['offset'];
            $callback_fn = $_GET['callback'];
            $condition = $_GET['condition'];
        } else
            return;
        $sql = "SELECT * FROM dish WHERE dish_name LIKE '%$condition%' OR dish_kind LIKE '%$condition%' ORDER BY dish_price DESC LIMIT $from, $offset";
        $connection = Yii::app()->db;
        $dishes = $connection->createCommand($sql)->queryAll();
        echo $callback_fn . '(' . json_encode($dishes) . ');';
    }
    
    /*
     * 根据id获取菜肴
     * http://localhost:8888/orderdish/index.php/api/getorderdish?orderdish=1,3&callback=fn
     */
    public function actionGetorderdish() {
        if(isset($_GET['orderdish']) && isset($_GET['callback'])) {
            $orderdish = $_GET['orderdish'];
            $callback_fn = $_GET['callback'];
        } else
            return;
        $sql = "SELECT * FROM dish WHERE dish_id IN(".$orderdish.")";
        $connection = Yii::app()->db;
        $dishes = $connection->createCommand($sql)->queryAll();
        echo $callback_fn . '(' . json_encode($dishes) . ');';
    }
    
    
    /*
     * 结账认证
     * http://localhost:8888/orderdish/index.php/api/getorderdish?orderdish=1,3&callback=fn
     */
    public function actionAdccount() {
        if(isset($_GET['orderdish']) && isset($_GET['callback'])) {
            $orderdish = $_GET['orderdish'];
            $callback_fn = $_GET['callback'];
        } else
            return;
        $sql = "SELECT * FROM dish WHERE dish_id IN(".$orderdish.")";
        $connection = Yii::app()->db;
        $dishes = $connection->createCommand($sql)->queryAll();
        echo $callback_fn . '(' . json_encode($dishes) . ');';
    }
    
    /*
     *验证账户， http://localhost:8888/orderdish/index.php/api/account?username='sy'&password="111"&callback=fn
     */
    public function actionAccount() {
        if(isset($_GET['username'])&&isset($_GET['password'])&&isset($_GET['callback'])) {
            $username = $_GET['username'];
            $password = $_GET['password'];
            $callback_fn = $_GET['callback'];
        } 
        echo $callback_fn . '({result:'.$this->vertifyAccount($username, $password).'})';
    }
    
    public function vertifyAccount($username, $password) {
        $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
        $connection = Yii::app()->db;
        $user = $connection->createCommand($sql)->queryAll();
        return $user != null;
    }

    
    /*
     * 呼叫服务接口 http://localhost:8888/orderdish/index.php/api/callserver?tableid='001'&content="呼叫服务员"
     */
    public function actionCallserver() {
        if(isset($_GET['tableid']) && isset($_GET['content'])) {
            $server_table_id = $_GET['tableid'];
            $server_content = $_GET['content'];
        }
        $time = date('Y-m-d H:i:s',time());
        $sql = "INSERT INTO `server` VALUES (null, '$server_table_id', '$server_content', '0', '$time', null)";
        $connection = Yii::app()->db;
        $connection->createCommand($sql)->execute();
    }
    
     /*
     * 查询服务接口 http://localhost:8888/orderdish/index.php/api/selectserver?from=2
     */
    public function actionSelectserver() {
        if(isset($_GET['from']) && isset($_GET['callback'])) {
            $from = $_GET['from'];
            $callback_fn = $_GET['callback'];
        }
        $time = date('Y-m-d H:i:s',time());
        $sql = "SELECT * FROM `server` WHERE server_state = 0 ORDER BY server_insert_time LIMIT $from, 999";
        $connection = Yii::app()->db;
        $servers = $connection->createCommand($sql)->queryAll();
        
        echo $callback_fn . '(' . json_encode($servers) . ');';
    }
    
    /*
     * 服务完成接口 http://localhost:8888/orderdish/index.php/api/server?serverid=7
     */
    public function actionServer() {
        if(isset($_GET['serverid'])) {
            $serverid = $_GET['serverid'];
        }
        $time = date('Y-m-d H:i:s',time());
        $sql = "UPDATE server SET server_state=1, server_time='$time' WHERE server_id=$serverid ";
        $connection = Yii::app()->db;
        $connection->createCommand($sql)->execute();
    }
    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex() {
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        $this->render('index');
    }

}