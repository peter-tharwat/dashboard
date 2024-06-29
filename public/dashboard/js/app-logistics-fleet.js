/**
 * Logistic Fleet
 */
('use strict');

(function () {
  //Selecting Sidebar Accordion for perfect scroll
  var sidebarAccordionBody = $('.logistics-fleet-sidebar-body');

  //Perfect Scrollbar for Sidebar Accordion
  if (sidebarAccordionBody.length) {
    new PerfectScrollbar(sidebarAccordionBody[0], {
      wheelPropagation: false,
      suppressScrollX: true
    });
  }

  // Mapbox Access Token

  //!YOUR_MAPBOX_ACCESS_TOKEN_HERE!
  mapboxgl.accessToken =
    '';

  const geojson = {
    type: 'FeatureCollection',
    features: [
      {
        type: 'Feature',
        properties: {
          iconSize: [20, 42],
          message: '1'
        },
        geometry: {
          type: 'Point',
          coordinates: [-73.999024, 40.75249842]
        }
      },
      {
        type: 'Feature',
        properties: {
          iconSize: [20, 42],
          message: '2'
        },
        geometry: {
          type: 'Point',
          coordinates: [-74.03, 40.75699842]
        }
      },
      {
        type: 'Feature',
        properties: {
          iconSize: [20, 42],
          message: '3'
        },
        geometry: {
          type: 'Point',
          coordinates: [-73.967524, 40.7599842]
        }
      },
      {
        type: 'Feature',
        properties: {
          iconSize: [20, 42],
          message: '4'
        },
        geometry: {
          type: 'Point',
          coordinates: [-74.0325, 40.742992]
        }
      }
    ]
  };

  const map = new mapboxgl.Map({
    container: 'map',
    // Choose from Mapbox's core styles, or make your own style with Mapbox Studio
    style: 'mapbox://styles/mapbox/light-v9',
    center: [-73.999024, 40.75249842],
    zoom: 12.25
  });

  // Add markers to the map and thier functionality
  for (const marker of geojson.features) {
    // Create a DOM element for each marker.
    const el = document.createElement('div');
    const width = marker.properties.iconSize[0];
    const height = marker.properties.iconSize[1];
    el.className = 'marker';
    el.insertAdjacentHTML(
      'afterbegin',
      '<img src="' +
        assetsPath +
        'img/illustrations/fleet-car.png" alt="Fleet Car" width="20" class="rounded-3" id="carFleet-' +
        marker.properties.message +
        '">'
    );
    el.style.width = `${width}px`;
    el.style.height = `${height}px`;
    el.style.cursor = 'pointer';

    // Add markers to the map.
    new mapboxgl.Marker(el).setLngLat(marker.geometry.coordinates).addTo(map);

    // Select Accordion for respective Marker
    const element = document.getElementById('fl-' + marker.properties.message);

    // Select Car for respective Marker
    const car = document.getElementById('carFleet-' + marker.properties.message);

    element.addEventListener('click', function () {
      const focusedElement = document.querySelector('.marker-focus');

      if (Helpers._hasClass('active', element)) {
        //fly to location
        map.flyTo({
          center: geojson.features[marker.properties.message - 1].geometry.coordinates,
          zoom: 16
        });
        // Remove marker-focus from other marked cars
        focusedElement && Helpers._removeClass('marker-focus', focusedElement);
        Helpers._addClass('marker-focus', car);
      } else {
        //remove marker-focus if not active
        Helpers._removeClass('marker-focus', car);
      }
    });
  }

  //For selecting default car location
  const defCar = document.getElementById('carFleet-1');
  Helpers._addClass('marker-focus', defCar);

  //hide mapbox controls
  document.querySelector('.mapboxgl-control-container').classList.add('d-none');
})();
