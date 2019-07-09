<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class message extends Model 
{
    protected $col_messageTemplate;
    protected $col_messageTypeId;
    protected $col_usersIds;
    protected $messageTemplate;
    protected $messageTypeId;
    protected $usersIds;

    public function __construct($id = '')
    {
        $this->tableName = 'messages';
        $this->col_messageTemplate = 'messageTemplate';
        $this->col_messageTypeId = 'messageTypeId';
        
        
        if ($id != '') {
            $this->id = $id;
            $this->messageTemplate = $this->getMessage($id);
        }
    }
   
    public function store($request , $ckeditorHtml)
    {
        // var_dump($request); die();
        // var_dump($ckeditorHtml); echo "<br>";
        // $ckeditorHtml = addslashes($ckeditorHtml); 
        $encodedContent = base64_encode($ckeditorHtml);
        // var_dump($encodedContent); die();
        $name = $request['name'];
        $messageTypeId = $request['MessageTypeId'];
        $db = Controller::getInstance();
        $sql = "INSERT INTO `$this->tableName`(`name`,`messageTemplate`, `messageTypeId`) 
        VALUES ('$name' , '$encodedContent' , $messageTypeId)";
        // echo $sql; die();
        $db->query($sql);
    }
    public function getMessage($id)
    {
        $db = Controller::getInstance();
        $sql = "SELECT `messageTemplate` FROM `messages` WHERE `id` = $id; ";
        // echo $sql; die();
        $row = $db->queryFetchRowAssoc($sql);
        $encodedContent = base64_decode($row['messageTemplate']);
        return $encodedContent;
    }
    public function getMsgNameByType($messageTypeId)
    {
        $db = Controller::getInstance();
        $sql = "SELECT * FROM `$this->tableName` WHERE `$this->col_messageTypeId` = '$messageTypeId'; ";
        // echo $sql; die();
        $row = $db->queryFetchRowAssoc($sql);
        // $encodedContent = base64_decode($row['messageTemplate']);
        return $row['name'];
    }
    public function getAllMessagesNames()
    {
        return $this->selectAll($this->tableName);
    }
    // public function getHeaderBody()
    // {
    //     $db = Controller::getInstance();
    //     $sql = "SELECT * FROM `messages` WHERE `name` = 'header'; ";
    //     // echo $sql; die();
    //     $row = $db->queryFetchRowAssoc($sql);
    //     $encodedContent = base64_decode($row['messageTemplate']);
    //     return $encodedContent;
    // }

    
}
