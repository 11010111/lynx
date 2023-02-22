<?php

/**
 * Extension Manager/Repository config file for ext "lynx".
 */
$EM_CONF[$_EXTKEY] = [
    'title' => 'Lynx',
    'description' => 'Distribution Template',
    'category' => 'templates',
    'constraints' => [
        'depends' => [
            'typo3' => '11.5.0-12.9.99',
            'fluid_styled_content' => '11.5.0-12.9.99',
            'rte_ckeditor' => '11.5.0-12.9.99',
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
    'version' => '1.0.41',
];
