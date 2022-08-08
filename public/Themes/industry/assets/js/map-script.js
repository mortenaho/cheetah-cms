

/* --------------------------------------------

Google Map

-------------------------------------------- */	

window.onload = MapLoadScript;

function GmapInit() {

	  Gmap = jQuery('.map-canvas');

	  Gmap.each(function() {

		var $this           = jQuery(this),

			lat             = '',

			lng             = '',

			zoom            = 12,

			scrollwheel     = false,

			zoomcontrol 	= true,

			draggable       = true,

			mapType         = google.maps.MapTypeId.ROADMAP,

			title           = '',

			contentString   = '',

			dataLat         = $this.data('lat'),

			dataLng         = $this.data('lng'),

			dataZoom        = $this.data('zoom'),

			dataType        = $this.data('type'),

			dataScrollwheel = $this.data('scrollwheel'),

			dataZoomcontrol = $this.data('zoomcontrol'),

			dataHue         = $this.data('hue'),

			dataTitle       = $this.data('title'),
			
			theme_icon_path = $this.data('icon-path'),

			dataContent     = $this.data('content');

			

		if( dataZoom !== undefined && dataZoom !== false ) {

			zoom = parseFloat(dataZoom);

		}

		if( dataLat !== undefined && dataLat !== false ) {

			lat = parseFloat(dataLat);

		}

		if( dataLng !== undefined && dataLng !== false ) {

			lng = parseFloat(dataLng);

		}

		if( dataScrollwheel !== undefined && dataScrollwheel !== null ) {

			scrollwheel = dataScrollwheel;

		}

		if( dataZoomcontrol !== undefined && dataZoomcontrol !== null ) {

			zoomcontrol = dataZoomcontrol;

		}

		if( dataType !== undefined && dataType !== false ) {

			if( dataType == 'satellite' ) {

				mapType = google.maps.MapTypeId.SATELLITE;

			} else if( dataType == 'hybrid' ) {

				mapType = google.maps.MapTypeId.HYBRID;

			} else if( dataType == 'terrain' ) {

				mapType = google.maps.MapTypeId.TERRAIN;

			}		  	

		}

		if( dataTitle !== undefined && dataTitle !== false ) {

			title = dataTitle;

		}

		if( navigator.userAgent.match(/iPad|iPhone|Android/i) ) {

			draggable = false;

		}

		

		var mapOptions = {

		  zoom        : zoom,

		  scrollwheel : scrollwheel,

		  zoomControl : zoomcontrol,

		  draggable   : draggable,

		  center      : new google.maps.LatLng(lat, lng),

		  mapTypeId   : mapType

		};		

		var map = new google.maps.Map($this[0], mapOptions);

		

		var image = theme_icon_path;

		if( dataContent !== undefined && dataContent !== false ) {

			contentString = '<div class="map-data">' + '<h6>' + title + '</h6>' + '<div class="map-content">' + dataContent + '</div>' + '</div>';

		}

		var infowindow = new google.maps.InfoWindow({

			content: contentString

		});

		

		var marker = new google.maps.Marker({

		  position : new google.maps.LatLng(lat, lng),

		  map      : map,

		  icon     : image,

		  title    : title

		});

		if( dataContent !== undefined && dataContent !== false ) {

			google.maps.event.addListener(marker, 'click', function() {

				infowindow.open(map,marker);

			});

		}

		

		if( dataHue !== undefined && dataHue !== false ) {

		  var styles = [
  {
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#1d2c4d"
      }
    ]
  },
  {
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#8ec3b9"
      }
    ]
  },
  {
    "elementType": "labels.text.stroke",
    "stylers": [
      {
        "color": "#1a3646"
      }
    ]
  },
  {
    "featureType": "administrative.country",
    "elementType": "geometry.stroke",
    "stylers": [
      {
        "color": "#4b6878"
      }
    ]
  },
  {
    "featureType": "administrative.land_parcel",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#64779e"
      }
    ]
  },
  {
    "featureType": "administrative.province",
    "elementType": "geometry.stroke",
    "stylers": [
      {
        "color": "#4b6878"
      }
    ]
  },
  {
    "featureType": "landscape.man_made",
    "elementType": "geometry.stroke",
    "stylers": [
      {
        "color": "#334e87"
      }
    ]
  },
  {
    "featureType": "landscape.natural",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#023e58"
      }
    ]
  },
  {
    "featureType": "poi",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#283d6a"
      }
    ]
  },
  {
    "featureType": "poi",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#6f9ba5"
      }
    ]
  },
  {
    "featureType": "poi",
    "elementType": "labels.text.stroke",
    "stylers": [
      {
        "color": "#1d2c4d"
      }
    ]
  },
  {
    "featureType": "poi.park",
    "elementType": "geometry.fill",
    "stylers": [
      {
        "color": "#023e58"
      }
    ]
  },
  {
    "featureType": "poi.park",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#3C7680"
      }
    ]
  },
  {
    "featureType": "road",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#304a7d"
      }
    ]
  },
  {
    "featureType": "road",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#98a5be"
      }
    ]
  },
  {
    "featureType": "road",
    "elementType": "labels.text.stroke",
    "stylers": [
      {
        "color": "#1d2c4d"
      }
    ]
  },
  {
    "featureType": "road.highway",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#2c6675"
      }
    ]
  },
  {
    "featureType": "road.highway",
    "elementType": "geometry.stroke",
    "stylers": [
      {
        "color": "#255763"
      }
    ]
  },
  {
    "featureType": "road.highway",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#b0d5ce"
      }
    ]
  },
  {
    "featureType": "road.highway",
    "elementType": "labels.text.stroke",
    "stylers": [
      {
        "color": "#023e58"
      }
    ]
  },
  {
    "featureType": "transit",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#98a5be"
      }
    ]
  },
  {
    "featureType": "transit",
    "elementType": "labels.text.stroke",
    "stylers": [
      {
        "color": "#1d2c4d"
      }
    ]
  },
  {
    "featureType": "transit.line",
    "elementType": "geometry.fill",
    "stylers": [
      {
        "color": "#283d6a"
      }
    ]
  },
  {
    "featureType": "transit.station",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#3a4762"
      }
    ]
  },
  {
    "featureType": "water",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#0e1626"
      }
    ]
  },
  {
    "featureType": "water",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#4e6d70"
      }
    ]
  }
];

		  map.setOptions({styles: styles});

		}

	 });

}

	

function MapLoadScript() {

	var script = document.createElement('script');

	script.type = 'text/javascript';

	GmapInit();

	document.body.appendChild(script);

}





