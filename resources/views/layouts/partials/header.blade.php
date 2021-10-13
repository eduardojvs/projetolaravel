<script>

    $(document).ready(function() {
    // executes when HTML-Document is loaded and DOM is ready

        // breakpoint and up
        $(window).resize(function() {
            /*
            if ($(window).width() >= 980){

                // when you hover a toggle show its dropdown menu
                $(".navbar .dropdown-toggle").hover(function () {
                    $(this).parent().toggleClass("show");
                    $(this).parent().find(".dropdown-menu").toggleClass("show");
                });

                    // hide the menu when the mouse leaves the dropdown
                $( ".navbar .dropdown-menu" ).mouseleave(function() {
                    $(this).removeClass("show");
                });

            }
            */
        });

        /*$('.navbar .dropdown-item').on('click', function (e) {
            var $el = $(this).children('.dropdown-toggle');
            var $parent = $el.offsetParent(".dropdown-menu");
            $(this).parent("li").toggleClass('open');

            if (!$parent.parent().hasClass('navbar-nav')) {
                if ($parent.hasClass('show')) {
                    $parent.removeClass('show');
                    $el.next().removeClass('show');
                    $el.next().css({"top": -999, "left": -999});
                } else {
                    $parent.parent().find('.show').removeClass('show');
                    $parent.addClass('show');
                    $el.next().addClass('show');
                    $el.next().css({"top": $el[0].offsetTop, "left": $parent.outerWidth() - 4});
                }
                e.preventDefault();
                e.stopPropagation();
            }
        });

        $('.navbar .dropdown').on('hidden.bs.dropdown', function () {
            $(this).find('li.dropdown').removeClass('show open');
            $(this).find('ul.dropdown-menu').removeClass('show open');
        });*/


    });
</script>

<style>

    .search-crescido {
        transition: width 2s;
        padding-right: 46px !important;
        border: 1px solid blue;
    }

    /* adds some margin below the link sets  */
    .navbar .dropdown-menu div[class*="col"] {
        margin-bottom: 1rem;
    }

    .navbar .dropdown-menu {
        border: none !important;
        background-color: rgba(255, 255, 255, 0.9)  !important;
        padding-right: 20px;
    }

    .card-body-menu {
        padding: 12px !important;
    }

    .titulo-verde {
        background-color: #134F00;
    }

    .titulo-laranja {
        background-color: #c4711d;
    }

    .titulo-azul {
        background-color: #076ce0;
    }

    .titulo-vermelho {
        background-color: #c70a0a;
    }

    .titulo-preto {
        background-color: #3d3d3d;
    }

    .titulo-cinza {
        background-color: #bfbfbf;
    }

    #menu-cima {
        width: 96vw !important;
        white-space: nowrap;
    }

    .pai-cards {
        display: flex;
        flex-wrap: wrap;
        overflow-y: auto;
        margin-left: 3vw;
    }

    .cards-menu {
        width: 300px;
        margin: 1%;
    }

    @media screen and (max-width: 600px) {
        #menu-cima {
            width: 90vw !important;
        }
    }


    /* breakpoint and up - mega dropdown styles */
    @media screen and (min-width: 0px) {

        /* remove the padding from the navbar so the dropdown hover state is not broken */
        .navbar {
            padding-top: 0px;
            padding-bottom: 0px;
        }

        /* remove the padding from the nav-item and add some margin to give some breathing room on hovers */
        .navbar .nav-item {
            padding: .5rem .5rem;
            margin: 0 .25rem;
        }

        /* makes the dropdown full width  */
        .navbar .dropdown {
            width: 75vw;
        }

        .navbar .dropdown-menu {
            width: 100%;
            left: 0;
            right: 0;
            /*  height of nav-item  */
            top: 45px;

            display: block;
            visibility: hidden;
            opacity: 0;
            transition: visibility 0s, opacity 0.3s linear;
        }

        /* shows the dropdown menu on hover */
        .navbar .dropdown:hover .dropdown-menu, .navbar .dropdown .dropdown-menu:hover {
            display: block;
            visibility: visible;
            opacity: 1;
            transition: visibility 0s, opacity 0.3s linear;
        }

        .navbar .dropdown-menu {
            border: 1px solid rgba(0,0,0,.15);
            background-color: #fff;
        }

        .lista-produtos-menu {
            padding-left: 10px;
        }

        .lista-produtos-menu li {
            display: block;
            padding: 10px 0px;
        }

        .lista-produtos-menu li:not(:last-child) {
            border-bottom: 1px solid rgba(173, 162, 162, 0.747);
        }

        .icones-menu {
            width: 18px;
            margin-right: 3px;
        }

        @media screen and (min-width: 900px) {
            .pai-cards {
                width: 84vw;
                margin-left: 2%;
            }
        }

        @media screen and (max-width: 900px) {
            .cards-menu {
                margin: 0 auto;
                width: 94%;
                margin-left: 3%;
            }
        }

    }

</style>
<?php $style = 'col-sm-8 col-md-4 col-lg-2'?>
<header id="page-topbar">


    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="/" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ URL::asset('/images/logo-JVS/LOGO_JVS_LARANJA_Prancheta_1.png')}}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ URL::asset('/images/logo-JVS/LOGO_JVS_LARANJA_Prancheta_1.png')}}" alt="" height="17">
                    </span>
                </a>

                <a href="/" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ URL::asset('/images/logo-JVS/LOGO_JVS_LARANJA_Prancheta_1.png')}}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ URL::asset('/images/logo-JVS/logojvs-removebg-preview.png')}}" alt="" height="70">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                <i class="mdi mdi-menu"></i>
            </button>

        </div>

        <div class="d-flex navbar navbar-expand navbar-dark" id="menu-cima">

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">


                </ul>
            </div>

        </div>

        <div class="d-flex col-3 flex-row-reverse">

            <!-- App Search-->
            <form class="app-search d-none d-lg-block">
               <div class="position-relative">
                   <input type="text" class="form-control" id="search-products" placeholder="Procurar...">
                   <span class="fa fa-search"></span>
               </div>
           </form>

           <div class="dropdown d-inline-block d-lg-none">
               <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   <i class="mdi mdi-magnify"></i>
               </button>
               <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
                   aria-labelledby="page-header-search-dropdown">

                   <form class="p-3">
                       <div class="form-group m-0">
                           <div class="input-group">
                               <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                               <div class="input-group-append">
                                   <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                               </div>
                           </div>
                       </div>
                   </form>

               </div>
            </div>
        </div>


        <div class="d-flex">



            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="{{ URL::asset('/images/users/identicon.png')}}"
                        alt="Header Avatar">
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <!-- item-->
                    <a class="dropdown-item" href="#">
                        <i class="mdi mdi-account-circle font-size-17 text-muted align-middle mr-1"></i>
                        Perfil
                    </a>

                    <div class="dropdown-divider">
                    </div>

                    <a class="dropdown-item text-danger" href="javascript:void();" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="mdi mdi-power font-size-17 text-muted align-middle mr-1 text-danger"></i>
                        Sair
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>

        </div>
    </div>

</header>
