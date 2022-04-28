<!DOCTYPE html>
<html lang="en" class="no-js">
<?php
	if ( isset($header) && $header!= "") $this->load->view($header);
	if ( isset($contents) && $contents!= "") $this->load->view($contents);
	if ( isset($footer) && $footer!= "") $this->load->view($footer);
?>
</html>
