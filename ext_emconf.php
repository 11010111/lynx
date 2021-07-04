<?php

/**
 * Extension Manager/Repository config file for ext "lynx".
 */
$EM_CONF[$_EXTKEY] = [
    'title' => 'Lynx',
    'description' => '',
    'category' => 'templates',
    'constraints' => [
        'depends' => [
            'typo3' => '9.5.0-11.9.99',
            'fluid_styled_content' => '9.5.0-11.9.99',
            'rte_ckeditor' => '9.5.0-11.9.99',
            'gridelements' => '9.5.0-11.9.99'
        ],
        'conflicts' => [
        ],
    ],
    'autoload' => [
        'psr-4' => [
            'Swe\\Lynx\\' => 'Classes',
        ],
    ],
    'state' => 'stable',
    'uploadfolder' => 0,
    'createDirs' => '',
    'clearCacheOnLoad' => 1,
    'author' => 'Konstantin Schneider',
    'author_email' => 'k.schneider@s-w-e.com',
    'author_company' => 'Smart Web Elements',
    'version' => '10.4.17',
];
