<?php

use Phalcon\Events\Manager as EventsManager;
use Phalcon\Flash\Direct as Flash;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Mvc\Model\Metadata\Memory as MetaDataAdapter;
use Phalcon\Mvc\Url as UrlResolver;
use Phalcon\Mvc\View;
use Phalcon\Mvc\View\Engine\Php as PhpEngine;
use Phalcon\Mvc\View\Engine\Volt as VoltEngine;
use Phalcon\Session\Adapter\Files as SessionAdapter;
use Phalcon\Crypt;
use Phalcon\Http\Response\Cookies;


/**
 * Shared configuration service
 */
$di->setShared('config', function () {
    return include APP_PATH . "/config/config.php";
});

/**
 * Add routing capabilities
 */
$di->set('router', function () {
    return require APP_PATH . "/config/routes.php";

    //  return $router;
});
/**
 * The URL component is used to generate all kind of urls in the application
 */
$di->setShared('url', function () {
    $config = $this->getConfig();

    $url = new UrlResolver();
    $url->setBaseUri($config->application->baseUri);

    return $url;
});

/**
 * Setting up the view component
 */
$di->setShared('view', function () {
    $config = $this->getConfig();

    $view = new View();
    $view->setDI($this);
    $view->setViewsDir($config->application->viewsDir);

    $view->registerEngines([
        '.volt' => function ($view) {
            $config = $this->getConfig();

            $volt = new VoltEngine($view, $this);

            $volt->setOptions([
                'compiledPath' => $config->application->cacheDir,
                'compiledSeparator' => '_'
            ]);

            return $volt;
        },
        '.phtml' => PhpEngine::class

    ]);

    return $view;
});


$di->setShared('redis', function () {

    $redis = new Redis();
    $redis->connect('127.0.0.1', 6379);



    return $redis;
});




/**
 * Database connection is created based in the parameters defined in the configuration file
 */
$di->setShared('db', function () {
    $config = $this->getConfig();

    $class = 'Phalcon\Db\Adapter\Pdo\\' . $config->database->adapter;
    $connection = new $class([
        'host' => $config->database->host,
        'username' => $config->database->username,
        'password' => $config->database->password,
        'dbname' => $config->database->dbname,
        'charset' => $config->database->charset
    ]);

    return $connection;
});


/**
 * If the configuration specify the use of metadata adapter use it or use memory otherwise
 */
$di->setShared('modelsMetadata', function () {
    return new MetaDataAdapter();
});

/**
 * Register the session flash service with the Twitter Bootstrap classes
 */
$di->set('flash', function () {
    return new Flash([
        'error' => 'alert alert-danger',
        'success' => 'alert alert-success',
        'notice' => 'alert alert-info',
        'warning' => 'alert alert-warning'
    ]);
});

/**
 * Start the session the first time some component request the session service
 */
$di->setShared('session', function () {
    ini_set('session.gc_maxlifetime', 3600 * 24 * 30);
    ini_set('session.cookie_lifetime', 3600 * 24 * 30);
    session_set_cookie_params(3600 * 24 * 30);
    $session = new SessionAdapter();
    $session->start();
    return $session;
});


$di->set(
    "crypt",
    function () {
        $crypt = new Crypt();

        // Устанавливаем глобальный ключ шифрования
        $crypt->setKey(
            "Sosokeyfdsfdsf228dsfdsfdsf"
        );


        return $crypt;
    },
    true
);

$di->set(
    'dispatcher',
    function () use ($di) {

        $eventsManager = new EventsManager();

        // Плагин безопасности слушает события, инициированные диспетчером
        $eventsManager->attach(
            "dispatch:beforeExecuteRoute",
            new SecurityPlugin()
        );

        // Отлавливаем исключения и not-found исключения, используя NotFoundPlugin
        $eventsManager->attach(
            "dispatch:beforeException",
            new NotFoundPlugin()
        );



        $dispatcher = new Dispatcher();
        $dispatcher->setEventsManager($eventsManager);
        return $dispatcher;
    },
    true
);


$di->set(
    "cookies",
    function () {
        $cookies = new Cookies();

        $cookies->useEncryption(true);

        return $cookies;
    }
);

// Assign our new tag a definition so we can call it
$di->set(
    "tag",
    function () {
        return new MyTags();
    }
);