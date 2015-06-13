<!-- JQUERY -->
<script src="{{ asset('frontend/js/jquery-1.10.2.min.js') }}"></script>
<!-- jQuery REVOLUTION Slider  -->
<script type="text/javascript" src="{{ asset('frontend/rs-plugin/js/jquery.themepunch.plugins.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>
<script type="text/javascript">

    var revapi;

    jQuery(document).ready(function() {

        revapi = jQuery('.tp-banner').revolution(
                {
                    delay:9000,
                    startwidth:1700,
                    startheight:600,
                    hideThumbs:true,
                    navigationType:"none",
                    fullWidth:"on",
                    forceFullWidth:"on"
                });

    });	//ready

</script>

<!-- OTHER JS -->
<script src="{{ asset('frontend/js/superfish.js') }}"></script>
<script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontend/js/retina.min.js') }}"></script>
<script src="{{ asset('frontend/assets/validate.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.placeholder.js') }}"></script>
<script src="{{ asset('frontend/js/functions.js') }}"></script>
<script src="{{ asset('frontend/js/classie.js') }}"></script>
<script src="{{ asset('frontend/js/uisearch.js') }}"></script>
<script>new UISearch( document.getElementById( 'sb-search' ) );</script>