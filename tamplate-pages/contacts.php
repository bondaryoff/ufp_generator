<?php
/**
 * Template Name: Контакти
 * //NOTE: Контакти
 *
 */
;?>
<!-- <div class="pPixel" data-show="true">
	<div class="pPixel__img" data-img="<?php bloginfo('template_url');?>/notes/ppixel/Contacts.jpg"
		data-position="50% 0px" data-height="15000px" data-opacity=".5">
	</div>
</div> -->
<?php get_header();?>
<div class="contacts">

	<div class="container">
		<?php
    if (function_exists('yoast_breadcrumb')) {
      yoast_breadcrumb('<div id="breadcrumbs">', '</div>');
    }
    ?>
		<div class="row">
			<div class="contacts__legend">
				<div class="contacts__item contacts__item--location">
					<?php if (get_field('zagolovok')): ?>
					<h2><?php echo get_field('zagolovok'); ?></h2>
					<?php endif;?>
					<?php if (get_field('adresa')): ?>
					<?php echo get_field('adresa'); ?>
					<?php endif;?>
				</div>

				<div class="contacts__item contacts__item--phone">
					<?php while (have_rows('telefony')): the_row();?>
					<a href="tel:<?php the_sub_field('telefon');?>">
						<?php the_sub_field('telefon');?>
					</a>
					<?php endwhile;?>
				</div>

				<div class="contacts__item contacts__item--email">
					<?php while (have_rows('emejly')): the_row();?>
					<a href="mailto:<?php the_sub_field('emejl');?>">
						<?php the_sub_field('emejl');?>
					</a>
					<?php endwhile;?>
				</div>
			</div>

			<div class="contacts__map">
				<?php $location = get_field('mapa'); ?>
				<?php if ($location): ?>
				<div class="acf-map" data-zoom="18">
					<div class="marker" data-lat="<?php echo esc_attr($location['lat']); ?>"
						data-lng="<?php echo esc_attr($location['lng']); ?>"></div>
				</div>
				<?php endif;?>
			</div>
		</div>
    <a href="" class="btn">Замовити консультацію</a>
	</div>
</div>
<?php get_footer();?>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAqn_--LrDNTF6w9Dz5WOLUsyLVIZ6FqOc"></script>
<script type="text/javascript">
(function($) {

	function initMap($el) {

		// Find marker elements within map.
		var $markers = $el.find('.marker');

		// Create gerenic map.
		var mapArgs = {
			zoom: $el.data('zoom') || 16,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		};
		var map = new google.maps.Map($el[0], mapArgs);

		// Add markers.
		map.markers = [];
		$markers.each(function() {
			initMarker($(this), map);
		});

		// Center map based on markers.
		centerMap(map);

		// Return map instance.
		return map;
	}

	function initMarker($marker, map) {

		// Get position from marker.
		var lat = $marker.data('lat');
		var lng = $marker.data('lng');
		var latLng = {
			lat: parseFloat(lat),
			lng: parseFloat(lng)
		};

		// Create marker instance.
		var marker = new google.maps.Marker({
			position: latLng,
			map: map
		});

		// Append to reference for later use.
		map.markers.push(marker);

		// If marker contains HTML, add it to an infoWindow.
		if ($marker.html()) {

			// Create info window.
			var infowindow = new google.maps.InfoWindow({
				content: $marker.html()
			});

			// Show info window when marker is clicked.
			google.maps.event.addListener(marker, 'click', function() {
				infowindow.open(map, marker);
			});
		}
	}

	function centerMap(map) {

		// Create map boundaries from all map markers.
		var bounds = new google.maps.LatLngBounds();
		map.markers.forEach(function(marker) {
			bounds.extend({
				lat: marker.position.lat(),
				lng: marker.position.lng()
			});
		});

		// Case: Single marker.
		if (map.markers.length == 1) {
			map.setCenter(bounds.getCenter());

			// Case: Multiple markers.
		} else {
			map.fitBounds(bounds);
		}
	}

	// Render maps on page load.
	$(document).ready(function() {
		$('.acf-map').each(function() {
			var map = initMap($(this));
		});
	});

})(jQuery);
</script>