<?php

/**
 * The sidebar containing the main widget area
 *
 */

if (! is_active_sidebar('sidebar-1')) {
	return;
}
?>
<div class="contents">
	<div class="sidebar">
		<div class="sidebar-top"></div>
		<?php dynamic_sidebar('sidebar-1'); ?>
	</div>
</div>