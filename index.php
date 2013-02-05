
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Murphy-JS</title>
    <!-- Le styles -->
        <link href="../assets/css/bootstrap.css" rel="stylesheet">

     <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
        background-color:#333;
      }
      footer {
        bottom: 0;
        left: 0;
        position: fixed;
        right: 0;
        text-align: center;
        background-color: #222;
        color: #eee;
       }
    </style>
  </head>

  <body  style="padding:0px;-moz-user-select: none;-webkit-user-select: none;' onselectstart='return false;">

        <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-27832441-2']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
    <div id="container">

          <table>
            <tr>
              <td>
                <canvas id="canvas"></canvas>
    <script src="js/images.js"></script>
    <script src="js/functions.js"></script>
    <script src="js/game.php"></script></script>
    </td>
    <td style="width:300px;">
      <?php 
          session_start();
          if($_SESSION['active']!==1)
            { echo "<h3 style='color:#eee;text-align:center;'><a href='/signin.php?return=murphy'>Sign in</a> to save progress!</h3>";
        }
        else echo "<h3><a href='/signout.php'> Sign out </a></h3>";

          ?> 
          <a href="https://github.com/Anrijs/Murphy-JS" style="color:#05e"><b> Source available on GitHub</b></a>
    </td>
  </tr>
</table>
    </div>

    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap-transition.js"></script>
    <script src="../assets/js/bootstrap-alert.js"></script>
    <script src="../assets/js/bootstrap-modal.js"></script>
    <script src="../assets/js/bootstrap-dropdown.js"></script>
    <script src="../assets/js/bootstrap-scrollspy.js"></script>
    <script src="../assets/js/bootstrap-tab.js"></script>
    <script src="../assets/js/bootstrap-tooltip.js"></script>
    <script src="../assets/js/bootstrap-popover.js"></script>
    <script src="../assets/js/bootstrap-button.js"></script>
    <script src="../assets/js/bootstrap-collapse.js"></script>
    <script src="../assets/js/bootstrap-carousel.js"></script>
    <script src="../assets/js/bootstrap-typeahead.js"></script>
      
  </body>
 </html>
