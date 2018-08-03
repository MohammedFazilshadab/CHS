<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

      <!-- Footer -->
  <footer class="px-footer px-footer-bottom p-t-0">
    <br>
    <span class="text-muted">Copyright © 2017 PixelAdmin LLC. All rights reserved.</span>
  </footer>
   <!-- END Footer -->
   
  <!-- Scripts -->   
  <!-- jQuery -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/pixeladmin.min.js"></script>


  <script>
    // -------------------------------------------------------------------------
    // Initialize DEMO sidebar

    $(function() {
      pxDemo.initializeDemoSidebar();

      $('#px-demo-sidebar').pxSidebar();
      pxDemo.initializeDemo();
    });
  </script>

  <script type="text/javascript">
    // -------------------------------------------------------------------------
    // Initialize DEMO

    $(function() {
      var file = String(document.location).split('/').pop();

      // Remove unnecessary file parts
      file = file.replace(/(\.html).*/i, '$1');

      if (!/.html$/i.test(file)) {
        file = 'index.html';
      }

      // Activate current nav item
      $('body > .px-nav')
        .find('.px-nav-item > a[href="' + file + '"]')
        .parent()
        .addClass('active');

      $('body > .px-nav').pxNav();
      $('body > .px-footer').pxFooter();

      $('#navbar-notifications').perfectScrollbar();
      $('#navbar-messages').perfectScrollbar();
    });
  </script>

  <script>
    // -------------------------------------------------------------------------
    // Initialize "Equalize heights" button

    $(function() {
      $('#equalize-heights').on('click', function() {
        $('.box-examples').each(function() {
          var maxHeight = 0;

          $(this)
            .find('.box')
            .each(function() {
              var height = $(this).height();

              if (height > maxHeight) {
                maxHeight = height;
              }
            })
            .height(maxHeight);
        });
      });
    });

    // -------------------------------------------------------------------------
    // Initialize "Monthly visitor statistics" box

    $(function() {
      var data = [
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
      ];

      $("#box-sparkline-1").pxSparkline(data, {
        type: 'bar',
        height: '50px',
        width: '100%',
        barSpacing: 2,
        zeroAxis: false,
        barColor: '#ffffff',
      });
    });

    // -------------------------------------------------------------------------
    // Initialize "Retweets graph" box

    $(function() {
      var data = [
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
      ];

      $("#box-sparkline-2").pxSparkline(data, {
        type: 'line',
        width: '100%',
        height: '50px',
        fillColor: '',
        lineColor: '#fff',
        lineWidth: 2,
        spotColor: '#ffffff',
        minSpotColor: '#ffffff',
        maxSpotColor: '#ffffff',
        highlightSpotColor: '#ffffff',
        highlightLineColor: '#ffffff',
        spotRadius: 4,
      });
    });

    // -------------------------------------------------------------------------
    // Initialize "Today's earnings" box

    $(function() {
      var data = [
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
      ];

      $("#box-sparkline-3").pxSparkline(data, {
        type: 'line',
        width: '100%',
        height: '80px',
        lineColor: 'rgba(0,0,0,0)',
        fillColor: 'rgba(0,0,0,.18)',
        lineWidth: 0,
        spotColor: '',
        minSpotColor: '',
        maxSpotColor: '',
        highlightSpotColor: '',
        highlightLineColor: '#ffffff',
        spotRadius: 1.8,
        chartRangeMin: 150
      });
    });

    // -------------------------------------------------------------------------
    // Initialize "Uploads" box

    $(function () {
      var data = [
        { day: '2014-03-10', v: pxDemo.getRandomData(20, 5) },
        { day: '2014-03-11', v: pxDemo.getRandomData(20, 5) },
        { day: '2014-03-12', v: pxDemo.getRandomData(20, 5) },
        { day: '2014-03-13', v: pxDemo.getRandomData(20, 5) },
        { day: '2014-03-14', v: pxDemo.getRandomData(20, 5) },
        { day: '2014-03-15', v: pxDemo.getRandomData(20, 5) },
        { day: '2014-03-16', v: pxDemo.getRandomData(20, 5) }
      ];

      new Morris.Line({
        element: 'hero-graph',
        data: data,
        xkey: 'day',
        ykeys: ['v'],
        labels: ['Value'],
        lineColors: ['#fff'],
        lineWidth: 2,
        pointSize: 4,
        gridLineColor: 'rgba(255,255,255,.5)',
        resize: true,
        gridTextColor: '#fff',
        xLabels: "day",
        xLabelFormat: function(d) {
          return ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov', 'Dec'][d.getMonth()] + ' ' + d.getDate();
        },
      });
    });

    // -------------------------------------------------------------------------
    // Initialize "Overview" box

    $(function() {
      var data = [
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
      ];

      $("#box-sparkline-4").pxSparkline(data, {
        type: 'line',
        width: '100%',
        height: '50px',
        fillColor: '',
        lineColor: '#fff',
        lineWidth: 2,
        spotColor: '#ffffff',
        minSpotColor: '#ffffff',
        maxSpotColor: '#ffffff',
        highlightSpotColor: '#ffffff',
        highlightLineColor: '#ffffff',
        spotRadius: 4,
      });
    });

    // -------------------------------------------------------------------------
    // Initialize "Subscriptions" box

    $(function() {
      var colors = pxDemo.getRandomColors();
      var data = [
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
      ];

      $("#box-sparkline-5").pxSparkline(data, {
        type: 'line',
        width: '100%',
        height: '70px',
        fillColor: null,
        lineColor: colors[0],
        lineWidth: 1,
        spotColor: null,
        minSpotColor: null,
        maxSpotColor: null,
        highlightSpotColor: colors[1],
        highlightLineColor: colors[1],
        spotRadius: 3,
      });
    });

    // -------------------------------------------------------------------------
    // Initialize "New visitors" box

    $(function() {
      var data = [
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
      ];

      $("#box-sparkline-6").pxSparkline(data, {
        type: 'bar',
        height: '50px',
        width: '100%',
        barSpacing: 2,
        zeroAxis: false,
        barColor: '#ffffff',
      });
    });
  </script>
  

  
  </body>
</html>