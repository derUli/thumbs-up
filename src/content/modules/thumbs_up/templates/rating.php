<?php
$imageDir = getModulePath("thumbs_up") . "pics";
$scriptFile = getModulePath("thumbs_up") . "js/thumbs.js";
$canRate = true;
$page = get_page();
if (Settings::get("thumbs_up_only_registered_users_can_vote")) {
    if (! is_logged_in()) {
        $canRate = false;
    } else {
        $acl = new ACL();
        if (! $acl->hasPermission("thumbs_up_rate")) {
            $canRate = false;
        }
    }
}
$upImage = $imageDir . "/up";
$downImage = $imageDir . "/down";
if (! $canRate) {
    $upImage .= "-disabled";
    $downImage .= "-disabled";
}
$upImage .= ".png";
$downImage .= ".png";
?>
<input type="hidden" id="can-rate"
	value="<?php echo strbool($canRate);?>">
<input type="hidden" id="image-dir" value="<?php echo $imageDir;?>">
<input type="hidden" id="csrf-token"
	value="<?php Template::escape(get_csrf_token());?>">
<div class="thumbs-container row" data-id="<?php echo get_ID();?>">
	<div class="thumbs-button col-md-1 text-center">
		<a href="#" class="thumbs-up" data-id="<?php echo get_ID();?>"><img
			src="<?php echo $upImage;?>" alt="<?php translate("vote_up");?>"
			title="<?php translate("vote_up");?>"></a>
		</p>
		<p class="thumb-up text-center"><?php echo $page["thumbs_up"];?></p>
	</div>
	<div class="thumbs-button col-md-1 text-center">
		<p>
			<a href="#" class="thumbs-down" data-id="<?php echo get_ID();?>"><img
				src="<?php echo $downImage;?>" alt="<?php translate("vote_down");?>"
				title="<?php translate("vote_down");?>"> </a>
		</p>
		<p class="thumb-down text-center"><?php echo $page["thumbs_down"];?></p>
	</div>
</div>

<script type="text/javascript" src="<?php echo $scriptFile;?>">
</script>
