<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
date_default_timezone_set('Asia/Taipei');

function dd($array){
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}

function q($sql){
    $dsn="mysql:host=localhost;charset=utf8;dbname=db11";
    $pdo=new PDO($dsn,'root','');
    return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}

function to($url){
    header("location:".$url);
}

function captcha(){
    $str = "abcdefghijkmnopqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ23456789";
    $code = '';
    for ($i = 0; $i < 4; $i++) {
        $code .= $str[rand(0, strlen($str) - 1)];
    }
    $_SESSION['ans'] = $code;

    $font = '../fonts/font.ttf';
    $fontSize = 20;

    // Increased image dimensions for safety
    $width = 160;
    $height = 50;
    $im = imagecreatetruecolor($width, $height);
    $white = imagecolorallocate($im, 255, 255, 255);
    $black = imagecolorallocate($im, 0, 0, 0);
    imagefill($im, 0, 0, $white);

    // Starting position for the first character
    $x = 15;

    // Loop through each character
    for ($i = 0; $i < strlen($code); $i++) {
        $char = $code[$i];
        $angle = rand(-15, 15); // Individual random angle

        // Calculate bounding box for the character
        $bbox = imagettfbbox($fontSize, $angle, $font, $char);

        // Y position - adjust to keep characters vertically aligned near the center
        $y = 35 + rand(-5, 5);

        // Draw the character
        imagettftext($im, $fontSize, $angle, $x, $y, $black, $font, $char);

        // Update x position for the next character
        $x += ($bbox[2] - $bbox[0]) + 5; // Add 5px spacing
    }

    // Keep the noise, adjusted for new dimensions
    for ($i = 0; $i < 5; $i++) {
        $color = imagecolorallocate($im, rand(0, 255), rand(0, 255), rand(0, 255));
        imageline($im, rand(0, $width), rand(0, $height), rand(0, $width), rand(0, $height), $color);
    }
    for ($i = 0; $i < 100; $i++) {
        $color = imagecolorallocate($im, rand(0, 255), rand(0, 255), rand(0, 255));
        imagesetpixel($im, rand(0, $width), rand(0, $height), $color);
    }

    header("Content-type: image/png");
    imagepng($im);
    imagedestroy($im);
}


class DB{
private $dsn="mysql:host=localhost;dbname=db11;charset=utf8";
private $pdo;   
private $table;

function __construct($table){
    $this->table=$table;
    $this->pdo=new PDO($this->dsn,"root",'');
}

function all(...$arg){
    $sql="select * from $this->table ";
    if(isset($arg[0])){
        if(is_array($arg[0])){
            $tmp=$this->arraytosql($arg[0]);
            $sql=$sql." where ".join(" AND " , $tmp);

        }else{
            $sql .= $arg[0];
        }
    }

    if(isset($arg[1])){
        $sql .= $arg[1];
    }

    return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}

function count(...$arg){
    $sql="select count(*) from $this->table ";
    if(isset($arg[0])){
        if(is_array($arg[0])){
            $tmp=$this->arraytosql($arg[0]);
            $sql=$sql." where ".join(" AND " , $tmp);

        }else{
            $sql .= $arg[0];
        }
    }

    if(isset($arg[1])){
        $sql .= $arg[1];
    }

    return $this->pdo->query($sql)->fetchColumn();
}

function find($id){
    $sql="select * from $this->table ";
    
    if(is_array($id)){
        $tmp=$this->arraytosql($id);
        $sql=$sql." where ".join(" AND " , $tmp);

    }else{
        $sql .= " WHERE `id`='$id'";
    }
    //echo $sql;
    return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
}

function save($array){
    if(isset($array['id'])){
        //update
        $sql="update $this->table set ";
        $tmp=$this->arraytosql($array);
        $sql.= join(" , ",$tmp) . "where `id`= '{$array['id']}'";
    }else{
        //insert
        $cols=join("`,`",array_keys($array));
        $values=join("','",$array);
        $sql="insert into $this->table (`$cols`) values('$values')";
    }

    return $this->pdo->exec($sql);
}

function del($id){
    $sql="delete  from $this->table ";
    
    if(is_array($id)){
        $tmp=$this->arraytosql($id);
        $sql=$sql." where ".join(" AND " , $tmp);

    }else{
        $sql .= " WHERE `id`='$id'";
    }
    //echo $sql;
    return $this->pdo->exec($sql);
}


private function arraytosql($array){
    $tmp=[];
    foreach($array as $key => $value){
        $tmp[]="`$key`='$value'";
    }

    return $tmp;
}

}


$User=new DB('user');
$Admin=new DB('admin');
$Type=new DB('type');
$Bot=new DB("bot");
$Item=new DB("item");
$Order=new DB("orders");
