<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class notifications extends Model implements Isubject
{
  private $favorites;
  private $observers;
  function __construct()
  {

    $this->favorites = NULL;
    $this->tableName = 'notification';
    $this->observers = array();
  }
  // function getAllattached() {
  //   $userid = array('userId');
  //   $this->selectWhere($userid , '`usersNotifications`' , "`notificationId` = $this->id ");
  // }
  function attach(Iobserver $observer_in)
  {
    array_push($this->observers, $observer_in);
    // $this->observers[] = $observer_in;
  }
  function detach(Iobserver $observer_in)
  {
    //$key = array_search($observer_in, $this->observers);
    foreach ($this->observers as $okey => $oval) {
      if ($oval == $observer_in) {
        unset($this->observers[$okey]);
      }
    }
  }
  //betnotify kol el nas
  function notify()
  {
    foreach ($this->observers as $obs) 
    {
      $this->insert_User_Notification_Relation($obs->getUserId() , $this->id);
      $obs->updateNotifications($this); // argument $this = object of current notification
    }
  }
  function updateFavorites($newFavorites)
  {
    $this->favorites = $newFavorites;
    $this->store($this->favorites);
    $this->id = $this->getLastInsertedId();
    $this->notify();
  }
  public function getLastInsertedId()
  {
      $db = Controller::getInstance();
      $sql = "SELECT MAX(`id`) AS LastId FROM `$this->tableName`";
      $id = $db->queryFetchRowAssoc($sql);
      return $id['LastId'];
  }
    
  function getFavorites()
  {
    return $this->favorites;
  }

  public function store($favorite)
  {
    $db = Controller::getInstance();
    $sql = "INSERT INTO `notification`(`favorite`) VALUES ('$favorite')";
    $db->query($sql);
  }
  public function insert_User_Notification_Relation($userId ,$notificationId)
  {
    $db = Controller::getInstance();
    $sql = "INSERT INTO `usersnotifications`(`userId`, `notificationId`) 
    VALUES ($userId , $notificationId)";
    $db->query($sql);
  }

  public function getObservers()
  {
    return $this->observers;
  }
}
