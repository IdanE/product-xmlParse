<?php
namespace Idane\ProductParser;


use Idane\ProductParser\Parsers\Shufersal;
use Idane\ProductParser\Parsers\Victory;

class Constants
{
    const CHAINS = [
        // Shufersal
        '7290027600007' => [
            'friendly_name' => "שופרסל",
            'class' => Shufersal::class
        ],
        // Victory
        '7290696200003' => [
            'friendly_name' => "ויקטורי",
            'class' => Victory::class
        ]
    ];
}