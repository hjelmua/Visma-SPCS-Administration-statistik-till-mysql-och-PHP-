$(function () {

  "use strict";

  $('#world-map').vectorMap({
    map: 'world_mill_en',
    backgroundColor: "transparent",
    regionStyle: {
      initial: {
        fill: '#e4e4e4',
        "fill-opacity": 1,
        stroke: 'none',
        "stroke-width": 0,
        "stroke-opacity": 1
      }
    },
    series: {
      regions: [{
        values: visitorsData,
        scale: ["#00d82f", "#00a925"],
        normalizeFunction: 'polynomial'
      }]
    },
    onRegionLabelShow: function (e, el, code) {
      if (typeof visitorsData[code] != "undefined")
        el.html(el.html() + ': ' + visitorsData[code] + ' kunder');
    }
  });


  $('#map').vectorMap({
	  map: 'se_mill', 
	  backgroundColor: "transparent",
          regionStyle: {
            initial: {
              fill: '#f4f2f2',
              "fill-opacity": 1,
              stroke: 'none',
              "stroke-width": 0,
              "stroke-opacity": 1
            }
          },
          series: {
            regions: [{
              values: kundData,
              scale: ["#ade3b9", "#00a925"],
              normalizeFunction: 'polynomial'
            }]
          },
          onRegionLabelShow: function (e, el, code) {
            if (typeof kundData[code] != "undefined")
              el.html(el.html() + ': ' + kundData[code] + ' kunder');
          }
   });



});

