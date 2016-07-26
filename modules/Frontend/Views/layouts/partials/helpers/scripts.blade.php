<!-- Vendor JS -->
<script type="text/javascript" src="{!! '/builds/js/vendor.js' !!}"></script>

<!---- My plugins ---->
@yield('scripts')
<script type="text/javascript" src="{!! '/builds/theme/js/jquery-smooth-scroll/jquery.smooth-scroll.js' !!}"></script>
<script type="text/javascript" src="{!! '/builds/theme/js/raty/lib/jquery.raty.js' !!}"></script>
<script type="text/javascript" src="{!! '/builds/theme/js/OwlCarousel/owl-carousel/owl.carousel.min.js' !!}"></script>
<!---- Normal JS ---->
<script type="text/javascript" src="{!! '/builds/js/main.js' !!}"></script>

@if ( Config::get('app.debug') )
  <script type="text/javascript">
    document.write('<script src="//localhost:35729/livereload.js?snipver=1" type="text/javascript"><\/script>')
  </script>
@endif
