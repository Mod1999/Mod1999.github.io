<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8"/>
    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <title>Админ Панель</title>
    <meta name="description" content="4CASH - Поднимаем настроение"/>
    <meta name="keywords" content="открытие кейсов,призовые кейсы,дропы,кейсы,4cash,4cash.ru"/>
    <!-- Styles -->
    <link href="/assets/admin/css/chosen.css" rel='stylesheet' tyle="text/css">
    <link href="/assets/admin/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/assets/admin/css/theme/avocado.css" rel="stylesheet" type="text/css" id="theme-style">
    <link href="/assets/admin/css/prism.css" rel="stylesheet/less" type="text/css">
    <link href="/assets/admin/css/fullcalendar.css" rel='stylesheet' tyle="text/css">
    <link rel="stylesheet" href="/css/animate.min.css">
    <script>
        window.onload = function () {
            window.setTimeout(function () {
                        window.addEventListener('popstate', function (e) {
                                    //   e.preventDefault();
                                    if (e.state && e.state.link) Page.Go(e.state.link, {no_change_link: 1});
                                },
                                false);
                    },
                    1);
        }
        var Page = {
            Go: function (h, params) {

                if (!params) params = {};
                if (!params.no_change_link && h != location.href) history.pushState({link: h}, null, h);

                $.post(h, function (data) {
                    $('main.content').html(data);

                    // fillCarusel();
                });
            }
        }
    </script>
    <style type="text/css">
        body {
            padding-top: 102px;
        }
    </style>
    <link href="/assets/admin/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- JavaScript/jQuery, Pre-DOM -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <script src="/assets/admin/js/charts/excanvas.min.js"></script>
    <script src="/assets/admin/js/charts/jquery.flot.js"></script>
    <script src="/assets/admin/js/jquery.jpanelmenu.min.js"></script>
    <script type="text/javascript" src="/js/noty/packaged/jquery.noty.packaged.min.js"></script>
    <script src="/assets/admin/js/jquery.cookie.js"></script>
    <script src="/assets/admin/js/avocado-custom-predom.js"></script>

    <!-- HTML5, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="https://html5shim.googlecode.com/svn/trunk/html5.js"
            tppabs="https://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
<div class="jPanelMenu-panel" style="position: static; left: 0px;">
    <div class="navbar navbar-inverse navbar-fixed-top">


        <div class="navbar-inner">


            <div class="container">

                <a href="#">
                    <button type="button" class="btn btn-navbar mobile-menu">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </a>
                <a class="brand" href="/admin"><i class="icon-leaf"></i>Cash <b>Panel</b></a>
                <ul class="nav pull-right">
                    <li class="dropdown">

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-user icon-white"></i>
                            <span class="hidden-phone"><?= $u->username ?></span>
                        </a>

                        <ul class="dropdown-menu">
                            <li><a href="#"><i class="icon-user"></i>Профиль</a></li>
                            <li><a href="#settings" data-toggle="modal"><i class="icon-cog"></i>Настройки</a></li>
                            <li class="divider"></li>
                            <li><a href="/logout"><i class="icon-off"></i>Выход</a></li>
                        </ul>


                    </li>


                </ul>


            </div>


        </div>


        <div class="breadcrumb clearfix">


            <div class="container">


                <ul class="pull-left">
                    <li><a href="/admin"><i class="icon-home"></i>Главная</a> <span class="divider">/</span></li>
                    <!--li><a href="/admin/support" >Поддержка</a> <span class="divider">/</span></li>
                    <li><a href="/admin/users">Пользователи</a> <span class="divider">/</span></li-->
                    <li><a href="/admin/case">Кейсы</a> <span class="divider">/</span></li>
                    <li><a href="/admin/items">Предметы в кейсах</a> <span class="divider">/</span></li>
                    <!--li><a href="/admin/config">Настройки сайта</a><span class="divider">/</span></li-->
                </ul>


            </div>

        </div>


    </div>
    </br>
    <div class="container"> <?= $this->getContent() ?></div>
</div>
</body>

<!-- Javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="/assets/admin/js/jquery.hotkeys.js"></script>
<script src="/assets/admin/js/calendar/fullcalendar.min.js"></script>
<script src="/assets/admin/js/jquery-ui-1.10.2.custom.min.js"></script>
<script src="/assets/admin/js/jquery.pajinate.js"></script>
<script src="/assets/admin/js/jquery.prism.min.js"></script>
<script src="/assets/admin/js/jquery.dataTables.min.js"></script>
<script src="/assets/admin/js/charts/jquery.flot.time.js"></script>
<script src="/assets/admin/js/charts/jquery.flot.pie.js"></script>
<script src="/assets/admin/js/charts/jquery.flot.resize.js"></script>
<script src="/assets/admin/js/bootstrap/bootstrap.min.js"></script>
<script src="/assets/admin/js/bootstrap/bootstrap-wysiwyg.js"></script>
<script src="/assets/admin/js/bootstrap/bootstrap-typeahead.js"></script>
<script src="/assets/admin/js/jquery.easing.min.js"></script>
<script src="/assets/admin/js/jquery.chosen.min.js"></script>
<script src="/assets/admin/js/avocado-custom.js"></script>

</html>