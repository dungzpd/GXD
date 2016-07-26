<!-- Vendor JS -->
<script type="text/javascript" src="{!! '/builds/js/vendor.admin.js' !!}"></script>
<!---- My plugins ---->
@yield('scripts')
<!---- themes ---->
<script type="text/javascript" src="{!! '/builds/theme/js/ckeditor/ckeditor.js' !!}"></script>
<script type="text/javascript" src="{!! '/builds/theme/js/ckeditor/adapters/jquery.js' !!}"></script>
<script type="text/javascript" src="{!! '/builds/theme/js/theme.js' !!}"></script>

<!---- Normal JS ----> 
<script type="text/javascript" src="{!! '/builds/js/main.admin.js' !!}"></script>

@if ( Config::get('app.debug') )
  <script type="text/javascript">
    document.write('<script src="//localhost:35729/livereload.js?snipver=1" type="text/javascript"><\/script>')
  </script>
@endif