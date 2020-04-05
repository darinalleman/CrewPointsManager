$(function() {

	var marker = [], infowindow = [], map, image = 'img/marker.png';

	function addMarker(location,name,contentstr){
        marker[name] = new google.maps.Marker({
            position: location,
            map: map,
			icon: image
        });
        marker[name].setMap(map);
		
		infowindow[name] = new google.maps.InfoWindow({
			content:contentstr
		});
		
		google.maps.event.addListener(marker[name], 'click', function() {
			infowindow[name].open(map,marker[name]);
		});
    }
	
	function initialize() {

		var lat = $('#map-canvas').attr("data-lat");
		var lng = $('#map-canvas').attr("data-lng");

		var myLatlng = new google.maps.LatLng(lat,lng);

		var setZoom = parseInt($('#map-canvas').attr("data-zoom"));

		var styles = [{"featureType":"administrative","elementType":"geometry","stylers":[{"color":"#a7a7a7"}]},{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"visibility":"on"},{"color":"#737373"}]},{"featureType":"landscape","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#efefef"}]},{"featureType":"poi","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#dadada"}]},{"featureType":"poi","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"color":"#696969"}]},{"featureType":"road","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#5e728c"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"visibility":"on"},{"color":"#f0f0f0"}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"road.arterial","elementType":"geometry.stroke","stylers":[{"color":"#d6d6d6"}]},{"featureType":"road.local","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"weight":1.8}]},{"featureType":"road.local","elementType":"geometry.stroke","stylers":[{"color":"#d7d7d7"}]},{"featureType":"transit","elementType":"all","stylers":[{"color":"#808080"},{"visibility":"off"}]},{"featureType":"water","elementType":"geometry.fill","stylers":[{"color":"#c5d8e7"}]}]
		var styledMap = new google.maps.StyledMapType(styles,{name: "Styled Map"});

		var mapOptions = {
			zoom: setZoom,
			
			// panControl: false,
			// panControlOptions: {
			// 	position: google.maps.ControlPosition.LEFT_BOTTOM
			// },
			// zoomControl: true,
			// zoomControlOptions: {
			// 	style: google.maps.ZoomControlStyle.LARGE,
			// 	position: google.maps.ControlPosition.LEFT_BOTTOM
			// },
			// streetViewControl: true,
			// streetViewControlOptions: {
			// 	position: google.maps.ControlPosition.LEFT_BOTTOM
			// },
			
			center: myLatlng,
			mapTypeControlOptions: {
			  mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'map_style']
			}
		
		};
		map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
		
		map.mapTypes.set('map_style', styledMap);
  		map.setMapTypeId('map_style');
		

		$('.addresses-block a').each(function(){
			var mark_lat = $(this).attr('data-lat');
			var mark_lng = $(this).attr('data-lng');
			var this_index = $('.addresses-block a').index(this);
			var mark_name = 'template_marker_'+this_index;
			var mark_locat = new google.maps.LatLng(mark_lat, mark_lng);
			var mark_str = $(this).attr('data-string');
			addMarker(mark_locat,mark_name,mark_str);	
		});
		
	}

	$(window).load(function(){
		setTimeout(function(){initialize();}, 500);
	});

});
