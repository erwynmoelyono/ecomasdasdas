<?php return array(
    'root' => array(
        'pretty_version' => 'dev-develop',
        'version' => 'dev-develop',
        'type' => 'wordpress-plugin',
        'install_path' => __DIR__ . '/../../',
        'aliases' => array(),
        'reference' => '76f6f3bbecd288c77b3b60f1cc32a4e8981c1441',
        'name' => 'woocommerce/woocommerce-point-of-sale',
        'dev' => false,
    ),
    'versions' => array(
        'composer/installers' => array(
            'pretty_version' => 'v1.10.0',
            'version' => '1.10.0.0',
            'type' => 'composer-plugin',
            'install_path' => __DIR__ . '/./installers',
            'aliases' => array(),
            'reference' => '1a0357fccad9d1cc1ea0c9a05b8847fbccccb78d',
            'dev_requirement' => false,
        ),
        'roundcube/plugin-installer' => array(
            'dev_requirement' => false,
            'replaced' => array(
                0 => '*',
            ),
        ),
        'shama/baton' => array(
            'dev_requirement' => false,
            'replaced' => array(
                0 => '*',
            ),
        ),
        'stripe/stripe-php' => array(
            'pretty_version' => 'v7.92.0',
            'version' => '7.92.0.0',
            'type' => 'library',
            'install_path' => __DIR__ . '/../stripe/stripe-php',
            'aliases' => array(),
            'reference' => '4b549e6f7d3e7ffd877547a0f1e8bd01c363e268',
            'dev_requirement' => false,
        ),
        'woocommerce/woocommerce-point-of-sale' => array(
            'pretty_version' => 'dev-develop',
            'version' => 'dev-develop',
            'type' => 'wordpress-plugin',
            'install_path' => __DIR__ . '/../../',
            'aliases' => array(),
            'reference' => '76f6f3bbecd288c77b3b60f1cc32a4e8981c1441',
            'dev_requirement' => false,
        ),
    ),
);
