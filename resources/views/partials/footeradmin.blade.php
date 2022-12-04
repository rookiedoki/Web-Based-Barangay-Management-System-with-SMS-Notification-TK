<script src="{{url('assets/js/jquery.min.js')}}"></script>
<script src="{{url('assets/js/popper.min.js')}}"></script>
<script src="{{url('assets/js/moment.min.js')}}"></script>
<script src="js/bootstrap.min.js"></script>
<script src="{{url('assets/js/simplebar.min.js')}}"></script>
<script src='{{url('assets/js/daterangepicker.js')}}'></script>
<script src='{{url('assets/js/jquery.stickOnScroll.js')}}'></script>
<script src="{{url('assets/js/tinycolor-min.js')}}"></script>
<script src="{{url('assets/js/config.js')}}"></script>
<script src="{{url('assets/js/d3.min.js')}}"></script>
<script src="{{url('assets/js/topojson.min.js')}}"></script>
<script src="{{url('assets/js/datamaps.all.min.js')}}"></script>
<script src="{{url('assets/js/datamaps-zoomto.js')}}"></script>
<script src="{{url('assets/js/datamaps.custom.js')}}"></script>
<script src="{{url('assets/js/Chart.min.js')}}"></script>
<script>
  /* defind global options */
  Chart.defaults.global.defaultFontFamily = base.defaultFontFamily;
  Chart.defaults.global.defaultFontColor = colors.mutedColor;
</script>
<script src="{{url('assets/js/gauge.min.js')}}"></script>
<script src="{{url('assets/js/jquery.sparkline.min.js')}}"></script>
<script src="{{url('assets/js/apexcharts.min.js')}}"></script>
<script src="{{url('assets/js/apexcharts.custom.js')}}"></script>
<script src='{{url('assets/js/jquery.mask.min.js')}}'></script>
<script src='{{url('assets/js/select2.min.js')}}'></script>
<script src='{{url('assets/js/jquery.steps.min.js')}}'></script>
<script src='{{url('assets/js/jquery.validate.min.js')}}'></script>
<script src='{{url('assets/js/jquery.timepicker.js')}}'></script>
<script src='{{url('assets/js/dropzone.min.js')}}'></script>
<script src='{{url('assets/js/uppy.min.js')}}'></script>
<script src='{{url('assets/js/quill.min.js')}}'></script>

<script src="{{url('assets/js/apps.js')}}"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];

  function gtag()
  {
    dataLayer.push(arguments);
  }
  gtag('js', new Date());
  gtag('config', 'UA-56159088-1');
</script>

<script type="text/javascript">

$("document").ready(function()

{
setTimeout(function()
  {
    $("div.alert").remove();
  },3000);
});

</script>
</body>
</html>
