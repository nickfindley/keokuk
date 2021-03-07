<?php
/**
 * Month View Tooltip Template
 * @package Dutchtown
 * @subpackage Keokuk
 * @since 0.1
 */
?>

<script type="text/html" id="tribe_tmpl_tooltip">
	<div id="tribe-events-tooltip-[[=eventId]]" class="tribe-events-tooltip tooltip">
		<div class="tooltip-inner">
			<h3>
				<a href="[[=permalink]]" class="stretched-link">[[=raw title]]<\/a>
			<\/h3>

			<div class="tooltip-body">
				<div class="tooltip-date">
					[[=dateDisplay]]
				<\/div>
				[[ if(imageTooltipSrc.length) { ]]
				<div class="tooltip-image">
					<img src="[[=imageTooltipSrc]]" alt="[[=title]]" \/>
				<\/div>
				[[ } ]]
				[[ if(excerpt.length) { ]]
				<div class="tooltip-description">[[=raw excerpt]]<\/div>
				[[ } ]]
			<\/div>
		<\/div>
	<\/div>
</script>

<script type="text/html" id="tribe_tmpl_tooltip_featured">
	<div id="tribe-events-tooltip-[[=eventId]]" class="tribe-events-tooltip tooltip featured">
		<div class="tooltip-inner">
			<h3>
				<a href="[[=permalink]]" class="stretched-link">[[=raw title]]<\/a>
			<\/h3>

			<div class="tooltip-body">
				<div class="tooltip-date">
					[[=dateDisplay]]
				<\/div>
				[[ if(imageTooltipSrc.length) { ]]
				<div class="tooltip-image">
					<img src="[[=imageTooltipSrc]]" alt="[[=title]]" \/>
				<\/div>
				[[ } ]]
				[[ if(excerpt.length) { ]]
				<div class="tooltip-description">[[=raw excerpt]]<\/div>
				[[ } ]]
			<\/div>
		<\/div>
	<\/div>
</script>