<footer class="page-footer blue-grey lighten-3">
    <div class="footer-copyright">
        <div class="container grey-text text-darken-2 center-align">
            &copy; MARUI GROUP CO., LTD.
        </div>
    </div>
</footer>


<script src="{{ asset('/js/materialize.min.js') }}"></script>
<script src="{{ asset('/js/vendor/js.cookie.min.js') }}"></script>
<script src="{{ asset('/js/init.js') }}" defer></script>
{{--<script src="{{ asset('/js/back-create.js') }}" defer></script>--}}
{{--<script src="{{ asset('/js/init.min.js') }}" defer></script>--}}
{{--<script src="{{ asset('/js/mourning.js') }}" defer></script>--}}
{{--<script src="{{ asset('js/app.js') }}" defer></script>--}}
@stack( 'script' )

<!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
<script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('set', 'anonymizeIp', true); ga('set', 'transport', 'beacon'); ga('send', 'pageview')
</script>
<script src="https://www.google-analytics.com/analytics.js" async></script>
