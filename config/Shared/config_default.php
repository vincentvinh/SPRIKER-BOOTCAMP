<?php

use SprykerFeature\Shared\Acl\AclConfig;
use SprykerFeature\Shared\Auth\AuthConfig;
use SprykerFeature\Shared\DbDump\DbDumpConfig;
use SprykerFeature\Shared\Customer\CustomerConfig;
use Pyz\Shared\Mail\MailConfig;
use SprykerFeature\Shared\System\SystemConfig;
use SprykerFeature\Shared\User\UserConfig;
use SprykerFeature\Shared\Yves\YvesConfig;

$config[SystemConfig::PROJECT_NAMESPACES] = [
    'Pyz'
];
$config[SystemConfig::CORE_NAMESPACES] = [
    'SprykerFeature',
    'SprykerEngine'
];

$config[SystemConfig::CURRENT_APPLICATION_STORE] = APPLICATION_STORE;
$config[SystemConfig::CURRENT_APPLICATION_ENV] = APPLICATION_ENV;

$config[SystemConfig::PROJECT_TIMEZONE] = 'UTC';
$config[SystemConfig::PROJECT_NAMESPACE] = 'Pyz';

$config[DbDumpConfig::DB_DUMP_USERNAME] = '';
$config[DbDumpConfig::DB_DUMP_PASSWORD] = '';
$config[DbDumpConfig::DB_DUMP_DATABASE] = '';
$config[DbDumpConfig::DB_DUMP_HOST] = 'localhost';
$config[DbDumpConfig::DB_DUMP_MYSQLDUMP_BIN] = '/usr/bin/mysqldump';
$config[DbDumpConfig::DB_DUMP_MYSQL_BIN] = '/usr/bin/mysql';

$config[SystemConfig::STORAGE_KV_SOURCE] = 'redis';

$config[SystemConfig::ELASTICA_PARAMETER__HOST] = 'localhost';
$config[SystemConfig::ELASTICA_PARAMETER__TRANSPORT] = 'http';
$config[SystemConfig::ELASTICA_PARAMETER__PORT] = '9200';
$config[SystemConfig::ELASTICA_PARAMETER__INDEX_NAME] = 'page';

$config[SystemConfig::HOST_YVES]
    = $config[SystemConfig::HOST_STATIC_ASSETS]
    = $config[SystemConfig::HOST_STATIC_MEDIA]
    = $config[SystemConfig::HOST_SSL_YVES]
    = $config[SystemConfig::HOST_SSL_STATIC_ASSETS]
    = $config[SystemConfig::HOST_SSL_STATIC_MEDIA]
    = 'www.spryker.dev';

$config[SystemConfig::HOST_ZED_GUI]
    = $config[SystemConfig::HOST_ZED_API]
    = $config[SystemConfig::HOST_SSL_ZED_GUI]
    = $config[SystemConfig::HOST_SSL_ZED_API]
    = 'zed.spryker.dev';

$config[SystemConfig::LOG_LEVEL] = Monolog\Logger::INFO;
$config[SystemConfig::LOG_PROPEL_SQL] = true;

$config[YvesConfig::TRANSFER_USERNAME] = 'yves';
$config[YvesConfig::TRANSFER_PASSWORD] = 'o7&bg=Fz;nSslHBC';
$config[YvesConfig::TRANSFER_SSL] = false;
$config[YvesConfig::TRANSFER_DEBUG_SESSION_FORWARD_ENABLED] = false;
$config[YvesConfig::TRANSFER_DEBUG_SESSION_NAME] = 'XDEBUG_SESSION';

$config[SystemConfig::ZED_LIBRARY_PASSWORD_ALGORITHM] = PASSWORD_BCRYPT;
$config[SystemConfig::ZED_LIBRARY_PASSWORD_OPTIONS] = [];

$config[SystemConfig::ZED_SESSION_SAVE_HANDLER] = null;

$config[SystemConfig::ZED_SSL_ENABLED] = false;
$config[SystemConfig::ZED_SSL_EXCLUDED] = ['system/heartbeat'];

$config[YvesConfig::YVES_THEME] = 'demoshop';
$config[YvesConfig::YVES_TRUSTED_PROXIES] = [];
$config[YvesConfig::YVES_SSL_ENABLED] = false;
$config[YvesConfig::YVES_COMPLETE_SSL_ENABLED] = false;
$config[YvesConfig::YVES_SSL_EXCLUDED] = ['/monitoring/heartbeat'];
$config[YvesConfig::YVES_SESSION_SAVE_HANDLER] = null;
$config[YvesConfig::YVES_SESSION_NAME] = 'yves_session';
$config[YvesConfig::YVES_SESSION_COOKIE_DOMAIN] = $config[SystemConfig::HOST_YVES];
$config[YvesConfig::YVES_ERROR_PAGE] = APPLICATION_ROOT_DIR . '/static/public/Yves/errorpage/error.html';

$config[CustomerConfig::CUSTOMER_SECURED_PATTERN] = "(^/login_check$|^/customer)";
$config[CustomerConfig::CUSTOMER_ANONYMOUS_PATTERN] = "^/.*";

$currentStore = \SprykerEngine\Shared\Kernel\Store::getInstance()->getStoreName();
$config[SystemConfig::PROPEL] = [
    'database' => [
        'connections' => [
            'default' => [
                'adapter' => 'mysql',
                'dsn' => '',
                'user' => '',
                'password' => '',
                'settings' => [
                    'charset' => 'utf8',
                    'queries' => [
                        'utf8' => 'SET NAMES utf8 COLLATE utf8_unicode_ci, COLLATION_CONNECTION = utf8_unicode_ci, COLLATION_DATABASE = utf8_unicode_ci, COLLATION_SERVER = utf8_unicode_ci'
                    ]
                ]
            ]
        ]
    ],
    'runtime' => [
        'defaultConnection' => 'default',
        'connections' => ['default', 'zed']
    ],
    'generator' => [
        'defaultConnection' => 'default',
        'connections' => ['default', 'zed'],
        'objectModel' => [
            'defaultKeyType' => 'fieldName',
            'builders' => [
                'tablemap' => '\SprykerFeature\Zed\Library\Propel\Builder\TableMapBuilder',
                'query' => '\SprykerFeature\Zed\Library\Propel\Builder\QueryBuilder'
            ]
        ]
    ],
    'paths' => [
        'phpDir' => APPLICATION_ROOT_DIR,
        'sqlDir' => APPLICATION_ROOT_DIR . '/src/Generated/Propel/' . $currentStore . '/Sql',
        'migrationDir' => APPLICATION_ROOT_DIR . '/src/Generated/Propel/' . $currentStore . '/Migration',
        'schemaDir' => APPLICATION_ROOT_DIR . '/src/Generated/Propel/' . $currentStore . '/Schema',
        'phpConfDir' => APPLICATION_ROOT_DIR . '/src/Generated/Propel/' . $currentStore . '/Config'
    ]
];

$config[SystemConfig::CLOUD_ENABLED] = false;
$config[SystemConfig::CLOUD_OBJECT_STORAGE_ENABLED] = false;
$config[SystemConfig::CLOUD_OBJECT_STORAGE_PROVIDER_NAME] = 'rackspace';
$config[SystemConfig::CLOUD_OBJECT_STORAGE_DATA_CONTAINERS] = [
    'defaultPrivateContainerName' => 'pyz-private',
    'defaultPublicContainerName' => '',
    'defaultPublicCdnContainerName' => 'pyz-cdn',
    'defaultImagesContainerName' => 'pyz-private',
];

$config[SystemConfig::CLOUD_OBJECT_STORAGE_RACKSPACE] = [
    'username' => 'cloudfiles.contorion',
    'apiKey' => 'e73a9eb8d9324e98bbf6552e8150ec9c',
    'apiEndpoint' => 'https://lon.identity.api.rackspacecloud.com/v2.0/',
    'storageService' => 'cloudFiles',
    'location' => 'LON'
];
$config[SystemConfig::CLOUD_OBJECT_STORAGE_PRODUCT_IMAGES] = [
    'prefix' => 'productImages',
    'deleteRemoteObjects' => true,
];

$config[SystemConfig::CLOUD_CDN_ENABLED] = false;

$config[SystemConfig::CLOUD_CDN_STATIC_MEDIA_PREFIX] = 'media';
$config[SystemConfig::CLOUD_CDN_STATIC_MEDIA_HTTP] = '';
$config[SystemConfig::CLOUD_CDN_STATIC_MEDIA_HTTPS] = '';

$config[SystemConfig::CLOUD_CDN_STATIC_ASSETS_PREFIX] = '';
$config[SystemConfig::CLOUD_CDN_STATIC_ASSETS_HTTP] = '';
$config[SystemConfig::CLOUD_CDN_STATIC_ASSETS_HTTPS] = '';

$config[SystemConfig::CLOUD_CDN_PRODUCT_IMAGES_PATH_NAME] = '/images/products/';

$config[SystemConfig::CLOUD_CDN_DELETE_LOCAL_PROCESSED_IMAGES] = false;
$config[SystemConfig::CLOUD_CDN_DELETE_LOCAL_ORIGINAL_IMAGES] = false;

$config[MailConfig::MAIL_PROVIDER_MANDRILL] = [
    'api-key' => '1zPena6fBFPIxctt6VgCSQ',
    'host' => 'smtp.mandrillapp.com',
    'port' => '587',
    'username' => 'fabian.wesner@spryker.com',
    'from_mail' => 'service@demoshop.de',
    'from_name' => 'Demoshop'
];

$config[UserConfig::USER_SYSTEM_USERS] = [
    'yves_system'
];

$config[AuthConfig::AUTH_DEFAULT_CREDENTIALS] = [
    'yves_system' => [
        'rules' => [
            [
                "bundle" => "*",
                "controller" => "stub",
                "action" => "*"
            ]
        ],
        'token' => 'JDJ5JDEwJFE0cXBwYnVVTTV6YVZXSnVmM2l1UWVhRE94WkQ4UjBUeHBEWTNHZlFRTEd4U2F6QVBqejQ2'
    ]
];

$config[AclConfig::ACL_DEFAULT_RULES] = [
    [
        "bundle" => "auth",
        "controller" => "login",
        "action" => "index",
        "type" => "allow"
    ],
    [
        "bundle" => "auth",
        "controller" => "login",
        "action" => "check",
        "type" => "allow"
    ],
    [
        "bundle" => "auth",
        "controller" => "password",
        "action" => "reset",
        "type" => "allow"
    ]
];

$config[AclConfig::ACL_DEFAULT_CREDENTIALS] = [
    'yves_system' => [
        'rules' => [
            [
                "bundle" => "*",
                "controller" => "stub",
                "action" => "*",
                "type" => "allow"
            ]
        ]
    ]
];
