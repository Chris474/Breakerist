<?php require_once "$this->plugin_path/templates/partial-map-init.php"; ?>

<div class="open-user-map">
  <div class="add-user-location">
    <label><?php echo __('Click on the map set a marker of your location', 'open-user-map'); ?>:</label>
    <div class="map-wrap">
      <div id="mapGetLocation" class="leaflet-map map-style_<?php echo $map_style; ?>"></div>
    </div>
    <input type="hidden" id="oum_location_lat" name="oum_location_lat" required placeholder="<?php echo __('Latitude', 'open-user-map'); ?>*" />
    <input type="hidden" id="oum_location_lng" name="oum_location_lng" required placeholder="<?php echo __('Longitude', 'open-user-map'); ?>*" />

    <script>
      var map_el = `map-<?php echo $unique_id; ?>`;
      
      <?php if($marker_icon == 'user1' && $marker_user_icon): ?>
        var marker_icon_url = `<?php echo esc_url($marker_user_icon); ?>`;
      <?php else: ?>
        var marker_icon_url = `<?php echo esc_url($this->plugin_url); ?>src/leaflet/images/marker-icon_<?php echo esc_attr($marker_icon); ?>-2x.png`;
      <?php endif; ?>
      
      var marker_shadow_url = `<?php echo esc_url($this->plugin_url); ?>src/leaflet/images/marker-shadow.png`;
      var mapStyle = `<?php echo esc_attr($map_style); ?>`;
      var oum_disable_cluster = <?php echo $oum_disable_cluster; ?>;
      var oum_disable_fullscreen = <?php echo $oum_disable_fullscreen; ?>;
      var oum_enable_currentlocation = <?php echo $oum_enable_currentlocation; ?>;
      var start_lat = `<?php echo esc_attr($start_lat); ?>`;
      var start_lng = `<?php echo esc_attr($start_lng); ?>`;
      var start_zoom = `<?php echo esc_attr($start_zoom); ?>`;
    </script>
  </div>
</div>
