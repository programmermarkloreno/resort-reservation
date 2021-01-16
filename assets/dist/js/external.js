$(function () {

  'use strict'

  
  /* ChartJS
   * -------
   * Here we will create a few charts using ChartJS
   */

  //-----------------------
  //- MONTHLY SALES CHART -
  //-----------------------

  // Get context with jQuery - using jQuery's .get() method.
  var salesChartCanvas = $('#salesChart').get(0).getContext('2d')
  // This will get the first returned node in the jQuery collection.
  var salesChart       = new Chart(salesChartCanvas)

  var stats = '';
  var codStatusArray = '';

  var codOrderedCount = '';
  var codProcessingCount = '';
  var codPendingCount = '';

  var codOrderedAmount = '';
  var codProcessingAmount = '';
  var codPendingAmount = '';

  var mapData = '';

  $.ajax({
        type: 'GET',
        url: '../ajax/waybillPerMonth',
        async: false,
        success: function (data) {
            stats = JSON.parse(data);
        }
    });

  //PieChard Data for COD tracking
  $.ajax({
        type: 'GET',
        url: '../ajax/codTracking',
        async: false,
        success: function (data) {
            codStatusArray = JSON.parse(data);
            codOrderedCount = codStatusArray.orderPlacedCount;
            codProcessingCount = codStatusArray.processingCount;
            codPendingCount = codStatusArray.pendingCount;

            codOrderedAmount = codStatusArray.orderPlacedAmount;
            codProcessingAmount = codStatusArray.processingAmount;
            codPendingAmount = codStatusArray.pendingAmount;

        }
    });

  //Heatmap Get data
  
  
  var salesChartData = {
    labels  : ['January', 'February', 'March', 'April', 'May'],
    datasets: [
      {
        label               : 'Electronics',
        fillColor           : '#5abff8',
        strokeColor         : '#5abff8',
        pointColor          : '#5abff8',
        pointStrokeColor    : '#5abff8',
        pointHighlightFill  : '#5abff8',
        pointHighlightStroke: 'rgb(220,220,220)',
        data                : stats
      }
    ]
  }
  var salesChartOptions = {
    //Boolean - If we should show the scale at all
    showScale               : true,
    //Boolean - Whether grid lines are shown across the chart
    scaleShowGridLines      : false,
    //String - Colour of the grid lines
    scaleGridLineColor      : 'rgba(0,0,0,.05)',
    //Number - Width of the grid lines
    scaleGridLineWidth      : 1,
    //Boolean - Whether to show horizontal lines (except X axis)
    scaleShowHorizontalLines: true,
    //Boolean - Whether to show vertical lines (except Y axis)
    scaleShowVerticalLines  : true,
    //Boolean - Whether the line is curved between points
    bezierCurve             : true,
    //Number - Tension of the bezier curve between points
    bezierCurveTension      : 0.3,
    //Boolean - Whether to show a dot for each point
    pointDot                : false,
    //Number - Radius of each point dot in pixels
    pointDotRadius          : 4,
    //Number - Pixel width of point dot stroke
    pointDotStrokeWidth     : 1,
    //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
    pointHitDetectionRadius : 20,
    //Boolean - Whether to show a stroke for datasets
    datasetStroke           : true,
    //Number - Pixel width of dataset stroke
    datasetStrokeWidth      : 2,
    //Boolean - Whether to fill the dataset with a color
    datasetFill             : true,
    //String - A legend template
    legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].lineColor%>"></span><%=datasets[i].label%></li><%}%></ul>',
    //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
    maintainAspectRatio     : false,
    //Boolean - whether to make the chart responsive to window resizing
    responsive              : true
  }

  //Create the line chart
  salesChart.Line(salesChartData, salesChartOptions)

  /* Morris.js Charts */
  // Sales chart
  
 
  

  

  //---------------------------
  //- END MONTHLY SALES CHART -
  //---------------------------
  /*$('#ph-heat-map').vectorMap({
    map              : 'ph_mill_en',
    normalizeFunction: 'polynomial',
    hoverOpacity     : 0.7,
    hoverColor       : false,
    backgroundColor  : 'transparent',
    regionStyle      : {
      initial      : {
        fill            : 'rgba(210, 214, 222, 1)',
        'fill-opacity'  : 1,
        stroke          : 'none',
        'stroke-width'  : 0,
        'stroke-opacity': 1
      },
      hover        : {
        'fill-opacity': 0.7,
        cursor        : 'pointer'
      },
      selected     : {
        fill: 'yellow'
      },
      selectedHover: {}
    },
    markerStyle      : {
      initial: {
        fill  : '#00a65a',
        stroke: '#111'
      }
    }
  })*/
  //-------------
  //- PIE CHART -
  //-------------
  // Get context with jQuery - using jQuery's .get() method.
  //COD PIECHART FOR TOTAL Count
  var pieChartCanvas = $('#pieChartCount').get(0).getContext('2d')
  var pieChart       = new Chart(pieChartCanvas)
  var PieData        = [
    {
      value    : codOrderedCount,
      color    : '#dd4b39',
      highlight: '#dd4b39',
      label    : 'Processing'
    },
    {
      value    : codProcessingCount,
      color    : '#337ab7',
      highlight: '#337ab7',
      label    : 'For Deposit'
    },
    {
      value    : codPendingCount,
      color    : '#8a6d3b',
      highlight: '#8a6d3b',
      label    : 'Deposited'
    }
  ]
  var pieOptions     = {
    //Boolean - Whether we should show a stroke on each segment
    segmentShowStroke    : true,
    //String - The colour of each segment stroke
    segmentStrokeColor   : '#fff',
    //Number - The width of each segment stroke
    segmentStrokeWidth   : 1,
    //Number - The percentage of the chart that we cut out of the middle
    percentageInnerCutout: 50, // This is 0 for Pie charts
    //Number - Amount of animation steps
    animationSteps       : 100,
    //String - Animation easing effect
    animationEasing      : 'easeOutBounce',
    //Boolean - Whether we animate the rotation of the Doughnut
    animateRotate        : true,
    //Boolean - Whether we animate scaling the Doughnut from the centre
    animateScale         : false,
    //Boolean - whether to make the chart responsive to window resizing
    responsive           : true,
    // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
    maintainAspectRatio  : false,
    //String - A legend template
    legendTemplate       : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>',
    //String - A tooltip template
    tooltipTemplate      : '<%=value %> <%=label%> with COD'
  }
  //Create pie or douhnut chart
  // You can switch between pie and douhnut using the method below.
  pieChart.Doughnut(PieData, pieOptions)


  //COD PIECHART FOR TOTAL AMOUNT
  var pieChartCanvas = $('#pieChartAmount').get(0).getContext('2d')
  var pieChart    = new Chart(pieChartCanvas)
  var PieData      = [
    {
      value    :  codOrderedAmount,
      color    : '#dd4b39',
      highlight: '#dd4b39',
      label    : 'Processing'
    },
    {
      value    : codProcessingAmount,
      color    : '#337ab7',
      highlight: '#337ab7',
      label    : 'For Deposit'
    },
    {
      value    : codPendingAmount,
      color    : '#8a6d3b',
      highlight: '#8a6d3b',
      label    : 'Deposited'
    }
  ]
  var pieOptions     = {
    //Boolean - Whether we should show a stroke on each segment
    segmentShowStroke    : true,
    //String - The colour of each segment stroke
    segmentStrokeColor   : '#fff',
    //Number - The width of each segment stroke
    segmentStrokeWidth   : 1,
    //Number - The percentage of the chart that we cut out of the middle
    percentageInnerCutout: 50, // This is 0 for Pie charts
    //Number - Amount of animation steps
    animationSteps       : 100,
    //String - Animation easing effect
    animationEasing      : 'easeOutBounce',
    //Boolean - Whether we animate the rotation of the Doughnut
    animateRotate        : true,
    //Boolean - Whether we animate scaling the Doughnut from the centre
    animateScale         : false,
    //Boolean - whether to make the chart responsive to window resizing
    responsive           : true,
    // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
    maintainAspectRatio  : false,
    //String - A legend template
    legendTemplate       : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>',
    //String - A tooltip template
    tooltipTemplate      : 'PHP<%=value %> <%=label%>'
  }
  //Create pie or douhnut chart
  // You can switch between pie and douhnut using the method below.
  pieChart.Doughnut(PieData, pieOptions)
  //-----------------
  //- END PIE CHART -
  //-----------------

  /* jVector Maps
   * ------------
   * Create a world map with markers
   */

     $.ajax({
        type: 'GET',
        url: '../ajax/getCity',
        async: false,
        success: function (data) {
            mapData = JSON.parse(data);
        }
    });

  var myLatlng = new google.maps.LatLng(12.8797, 121.7740);
    // map options,
    var myOptions = {
      zoom: 5,
      center: myLatlng
    };

  var map = new google.maps.Map(document.getElementById("map"), myOptions);

  var heatmap = new HeatmapOverlay(map, 
  {
    // radius should be small ONLY if scaleRadius is true (or small radius is intended)
    "radius": 0.1,
    "maxOpacity": 1, 
    // scales the radius based on map zoom
    "scaleRadius": true, 
    // if set to false the heatmap uses the global maximum for colorization
    // if activated: uses the data maximum within the current map boundaries 
    //   (there will always be a red spot with useLocalExtremas true)
    "useLocalExtrema": true,
    // which field name in your data represents the latitude - default "lat"
    latField: 'lat',
    // which field name in your data represents the longitude - default "lng"
    lngField: 'lng',
    // which field name in your data represents the data value - default "value"
    valueField: 'count'
  }
);

var testData = {
  max: 8,
  data: [{lat: 14.5995, lng:120.9842, count: 3},{lat: 14.1407, lng:121.4692, count: 3}]
};

heatmap.setData(testData);
  

  /* SPARKLINE CHARTS
   * ----------------
   * Create a inline charts with spark line
   */

  //-----------------
  //- SPARKLINE BAR -
  //-----------------
  $('.sparkbar').each(function () {
    var $this = $(this)
    $this.sparkline('html', {
      type    : 'bar',
      height  : $this.data('height') ? $this.data('height') : '30',
      barColor: $this.data('color')
    })
  })

  //-----------------
  //- SPARKLINE PIE -
  //-----------------
  $('.sparkpie').each(function () {
    var $this = $(this)
    $this.sparkline('html', {
      type       : 'pie',
      height     : $this.data('height') ? $this.data('height') : '90',
      sliceColors: $this.data('color')
    })
  })

  //------------------
  //- SPARKLINE LINE -
  //------------------
  $('.sparkline').each(function () {
    var $this = $(this)
    $this.sparkline('html', {
      type     : 'line',
      height   : $this.data('height') ? $this.data('height') : '90',
      width    : '100%',
      lineColor: $this.data('linecolor'),
      fillColor: $this.data('fillcolor'),
      spotColor: $this.data('spotcolor')
    })
  })




})
