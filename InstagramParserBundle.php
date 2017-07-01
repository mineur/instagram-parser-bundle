<?php

/*
 * Mineur/instagram-parser-bundle package
 *
 * Feel free to contribute!
 *
 * @license MIT
 * @author alexhoma <alexcm.14@gmail.com>
 */

namespace Mineur\TwitterStreamApiBundle;

use Mineur\InstagramParserBundle\DependencyInjection\InstagramParserExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Class InstagramParserBundle
 *
 * @package Mineur\TwitterStreamApiBundle
 */
class InstagramParserBundle extends Bundle
{
    public function getContainerExtension()
    {
        return new InstagramParserExtension();
    }
}