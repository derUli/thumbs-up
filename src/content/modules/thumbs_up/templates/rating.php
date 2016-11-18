<?php
$imageDir = getModulePath("thumbs_up") . "pics";
?>
<div class="thumbs-container">
  <div class="thumbs-button">
    <a href="#" class="thumbs-up"><img src="<?php echo $imageDir;?>/up.png" alt="<?php translate("vote_up");?>" title="<?php translate("vote_up");?>"></a>
  </div>
  <div class="thumbs-button">
    <a href="#" class="thumbs-down"><img src="<?php echo $imageDir;?>/down.png" alt="<?php translate("vote_down");?>" title="<?php translate("vote_down");?>"></a>
  </div>
</div>
