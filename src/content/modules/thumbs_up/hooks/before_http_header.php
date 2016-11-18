<?php
$canRate = true;

if(Settings::get("thumbs_up_only_registered_users_can_vote")){
  if(!is_logged_in()){
    $canRate = false;
  } else {
       $acl = new ACL();
       if(!$acl->hasPermission("thumbs_up_rate")){
          $canRate = false;
       }
  }
}

if($canRate){
    if(isset($_POST["vote_up"])){
        $id = intval($_POST["vote_up"]);
        $args = array($id);
        $sql = "UPDATE {prefix}content set thumbs_up = thumbs_up + 1 where id = ?";
        Database::pQuery($sql, $args, true);
        $sql = "select thumbs_up from {prefix}content where id = ?";
        $result = Database::pQuery($sql, $args, true);
        $data = Database::fetchObject($result);
        die($data->thumbs_up);
    } else if(isset($_POST["vote_down"])){
        $id = intval($_POST["vote_down"]);
        $args = array($id);
        $sql = "UPDATE {prefix}content set thumbs_down = thumbs_down + 1 where id = ?";
        Database::pQuery($sql, $args, true);
        $sql = "select thumbs_down from {prefix}content where id = ?";
        $result = Database::pQuery($sql, $args, true);
        $data = Database::fetchObject($result);
        die($data->thumbs_down);
    }
}
