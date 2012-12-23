<form method="get" id="searchform" class="search-form" action="<?php echo home_url(); ?>" _lpchecked="1">
	<fieldset> 
		<input type="text" name="s" id="s" value="Search this Site..." onfocus="if(this.value=='Search this Site...')this.value='';" x-webkit-speech onwebkitspeechchange="transcribe(this.value)"> 
		<input id="search-image" class="sbutton" type="image" src="<?php echo get_template_directory_uri(); ?>/images/search.png" style="border:0; vertical-align: top;">
	</fieldset>
	</fieldset>
</form>