<?php
namespace Idane\ProductParser;


use Idane\ProductParser\Parsers\Shufersal;
use Idane\ProductParser\Parsers\Victory;

class Constants
{
    const CHAINS = [
        // Shufersal
        '7290027600007' => [
            'class' => Shufersal::class
        ],
        // Victory
        '7290696200003' => [
            'class' => Victory::class
        ]
    ];
}