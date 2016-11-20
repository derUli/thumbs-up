<?php
define ( "MODULE_ADMIN_HEADLINE", get_translation("thumbs_up") );
define ( "MODULE_ADMIN_REQUIRED_PERMISSION", "thumbs_up_settings" );
function thumbs_up_admin() {
	if (isset ( $_POST ["submit"] )) {
		if (isset ( $_POST ["thumbs_up_only_registered_users_can_vote"] )) {
			Settings::set ( "thumbs_up_only_registered_users_can_vote", "thumbs_up_only_registered_users_can_vote" );
		} else {
			Settings::delete ( "thumbs_up_only_registered_users_can_vote" );
		}
	}
	?>
<form action="<?php echo getModuleAdminSelfPath()?>" method="post">
<?php csrf_token_html();?>
<p>
		<input type="checkbox" name="thumbs_up_only_registered_users_can_vote"
			id="thumbs_up_only_registered_users_can_vote" value="thumbs_up_only_registered_users_can_vote"
			<?php if(Settings::get("thumbs_up_only_registered_users_can_vote")) echo "checked";?>>
		<label for="thumbs_up_only_registered_users_can_vote"><?php translate("ONLY_REGISTERED_USERS_CAN_VOTE");?></label>
	</p>
	<p>
		<input name="submit" type="submit"
			value="<?php translate("save_changes");?>">
	</p>
</form>
<?php
}
?>
