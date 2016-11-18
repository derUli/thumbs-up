<?php
$imageDir = getModulePath("thumbs_up") . "pics";
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

?>
<div class="thumbs-container">
  <div class="thumbs-button">
    <?php if($canRate){?><a href="#" class="thumbs-up"><?php }?><img src="<?php echo $imageDir;?>/up.png" alt="<?php translate("vote_up");?>" title="<?php translate("vote_up");?>"><?php if($canRate){?></a><?php }?>
  </div>
  <div class="thumbs-button">

      <?php if($canRate){?><a href="#" class="thumbs-down"><?php }?><img src="<?php echo $imageDir;?>/down.png" alt="<?php translate("vote_down");?>" title="<?php translate("vote_down");?>">
        <?php if($canRate){?></a><?php }?>
  </div>
</div>
