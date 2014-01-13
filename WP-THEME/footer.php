    <section id="sidebar">
        <a id="menu-button"></a>

        <nav>
            <?php wp_nav_menu( array( 'theme_location' => 'main-nav' ) ); ?>
        </nav>

        <form role="search" class="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>" autocomplete="off">
            <input type="text" value="" name="s" id="search" class="searchbar" />
        </form>

        <ul id="social-nav">
            <li><a href="http://twitter.com/MFStrangers" target="_blank"><span aria-hidden="true" class="icon-twitter"></span></a></li>
            <li><a href="http://www.facebook.com/MFSBlog" target="_blank"><span aria-hidden="true" class="icon-facebook"></span></a></li>
            <li><a href="http://feeds.feedburner.com/MistakenForStrangers" target="_blank"><span aria-hidden="true" class="icon-feed"></span></a></li>
        </ul>

        <?php wp_nav_menu( array( 'theme_location' => 'sidebar-page-nav' ) ); ?>

        <a href="#" id="search-submit"/></a>
    </section>

    <div id="loading"></div>

</div>

<?php wp_footer(); ?>

<script type="text/javascript">
    jQuery(document).ready(function($) {
        $('#loading').css('display','none');
        if (navigator.userAgent.match(/mobile/i)) {
            $('body').addClass('body-mobile');
        }
        FastClick.attach(document.body);
        $('div, section, header').fitVids();
        ratingFix();
        fancyType();

        if (!navigator.userAgent.match(/mobile/i) && $(window).width() > 640) {
            $('#sidebar').hover(
                function () {
                    $('#main-container, #sidebar').addClass('sidebar-hover');
                },
                function () {
                    $('#main-container, #sidebar').removeClass('sidebar-hover');
                }
            );
        }
        $('#menu-button').click(function() {
            if ($('#sidebar').hasClass('sidebar-active')) {
                $('#main-container, #sidebar').removeClass('sidebar-active');
            }
            else {
                $('#main-container, #sidebar').addClass('sidebar-active');
            }

            return false;
        });
        if (navigator.userAgent.match(/mobile/i) && $(window).width() > 640) {
            $('html').swipe({
                swipeLeft:function() {
                    $('#main-container, #sidebar').addClass('sidebar-active');
                },
                threshold:75
            });
            $('#sidebar').swipe({
                swipeRight:function() {
                    $('#main-container, #sidebar').removeClass('sidebar-active');
                },
                threshold:75
            });
        }

        $(window).load(function() {
            evenColumns();
        });

        $('body').djax('.djax');

        $(window).bind('djaxClick', function(e, data) {
            $('#main-container, #sidebar').removeClass('sidebar-active');
            $('#loading').css('display','block');
            setTimeout(function(){
                $('#loading').addClass('active');
            },100);
            $('html, body').delay(1000).animate({ scrollTop: 0 }, 100);
        });
        $(window).bind('djaxLoad', function(e, data) {
            _gaq.push(['_trackPageview']);
            $('div, section, header').fitVids();
            ratingFix();
            fancyType();
            $('.audio-playlist').each(function () {
                return new AudioPlayer(this);
            });

            $('#loading').removeClass('active');
            setTimeout(function(){
                $('#loading').css('display','none');
            },800);
        });
        $('#searchform').submit(function(e){
            event.preventDefault();
            $('#search-submit').attr('href', '<?php bloginfo('url');?>/?s='+encodeURIComponent($('#search').val())).trigger('click');
        });

        (function($,sr){
            var debounce = function (func, threshold, execAsap) {
                var timeout;

                return function debounced () {
                    var obj = this, args = arguments;
                    function delayed () {
                        if (!execAsap)
                        func.apply(obj, args);
                        timeout = null;
                    };

                    if (timeout)
                    clearTimeout(timeout);
                    else if (execAsap)
                    func.apply(obj, args);

                    timeout = setTimeout(delayed, threshold || 100);
                };
            }

            jQuery.fn[sr] = function(fn){  return fn ? this.bind('resize', debounce(fn)) : this.trigger(sr); };

        })(jQuery,'smartresize');

        $(window).smartresize(function(){
            evenColumns();
        });
        $(window).smartresize();

        function evenColumns() {
            $('.bottom-post').css('height','auto').equalHeights();

            if ($(window).width() > 640) {
                $('.center-column').css('height','auto').equalHeights();
            }
            else {
                $('.center-column').css('height','auto');
            }
        }

        function ratingFix() {
            if($('.rating').html() == 10){
                $('.rating').css('letter-spacing',-15).css('padding-right',25);
            }
            var isFirefox = typeof InstallTrigger !== 'undefined';
            if (isFirefox) {
                $('.rating').css('line-height','16.5rem');
            }
        }

        function fancyType() {
            $("h2 > a:contains('&'), .single-post h2:contains('&')").each(function(){
                $(this).html($(this).html().replace(/&amp;/, "<span class='amp'>&amp;</span>"))
            });
            $("h2 > a:contains('/'), .single-post h2:contains('/')").each(function(){
                $(this).html($(this).html().replace(/\//, "<span class='slash'>/</span>"))
            });
            $("h2 > a:contains('–'), .single-post h2:contains('–')").each(function(){
                $(this).html($(this).html().replace(/–/g, "<span class='dash'>–</span>"))
            });
        }

        if(!Modernizr.svg) {
            $('img[src*="svg"]').attr('src', function() {
                return $(this).attr('src').replace('.svg', '.png');
            });
        }
    });
</script>

<!--[if lt IE 9]>
    <script type="text/javascript" src="<?php bloginfo("template_url"); ?>/JS/css3-mediaqueries.js"></script>
<![endif]-->

</body>
</html>