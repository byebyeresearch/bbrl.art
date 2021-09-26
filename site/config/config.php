<?php
date_default_timezone_set('Australia/Melbourne');
/**
 * The config file is optional. It accepts a return array with config options
 * Note: Never include more than one return statement, all options go within this single return array
 * In this example, we set debugging to true, so that errors are displayed onscreen. 
 * This setting must be set to false in production.
 * All config options: https://getkirby.com/docs/reference/system/options
 */

return [
    'debug' => true,

    // config will use default settings to load the env file
    'bnomei.dotenv.dir' => function (): string {
        // return kirby()->roots()->index();
        return realpath(kirby()->roots()->index() . '/../site/plugins/kirby-shopify/'); // public folder setup
    },
    // 'bnomei.dotenv.file' => '.env',
    // 'bnomei.dotenv.required' => [],
];
