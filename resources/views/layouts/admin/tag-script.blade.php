<!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->

    <script src="{{ asset('administrator/js/global/global.min.js') }}"></script>
    <script src="{{ asset('administrator/js/chart.js/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('administrator/js/jquery-nice-select/js/jquery.nice-select.min.js') }}"></script>

    <!-- Apex Chart -->
    <script src="{{ asset('administrator/js/apexchart/apexchart.js') }}"></script>

    <script src="{{ asset('administrator/js/chart.js/Chart.bundle.min.js') }}"></script>

    <!-- Chart piety plugin files -->
    <script src="{{ asset('administrator/js/peity/jquery.peity.min.js') }}"></script>
    <!-- Dashboard 1 -->
    <script src="{{ asset('administrator/js/dashboard/dashboard-1.js') }}"></script>
    <script src="{{ asset('administrator/js/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('administrator/js/custom.min.js') }}"></script>
    <script src="{{ asset('administrator/js/dlabnav-init.js') }}"></script>
    <script src="{{ asset('administrator/js/demo.js') }}"></script>
    <script src="{{ asset('administrator/js/styleSwitcher.js') }}"></script>
    <script>
        function cardsCenter() {

            /*  testimonial one function by = owl.carousel.js */



            jQuery('.card-slider').owlCarousel({
                loop: true,
                margin: 0,
                nav: true,
                //center:true,
                slideSpeed: 3000,
                paginationSpeed: 3000,
                dots: true,
                navText: ['<i class="fas fa-arrow-left"></i>', '<i class="fas fa-arrow-right"></i>'],
                responsive: {
                    0: {
                        items: 1
                    },
                    576: {
                        items: 1
                    },
                    800: {
                        items: 1
                    },
                    991: {
                        items: 1
                    },
                    1200: {
                        items: 1
                    },
                    1600: {
                        items: 1
                    }
                }
            })
        }

        jQuery(window).on('load', function() {
            setTimeout(function() {
                cardsCenter();
            }, 1000);
        });
    </script>
