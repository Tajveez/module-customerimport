<?php

namespace Tajveez\CustomerImport\Model\Profile;

class Profiles
{
    const PROFILES_LIST = [
        'sample-csv' => [
            'class' => \Tajveez\CustomerImport\Model\Importer\Csv::class,
            'description' => 'Used for importing customers using CSV'
        ],
        'sample-json' => [
            'class' => \Tajveez\CustomerImport\Model\Importer\Json::class,
            'description' => 'Used for importing customers using JSON'
        ]
    ];
}
