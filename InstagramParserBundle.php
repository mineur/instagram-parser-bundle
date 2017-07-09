<?php

/*
 * Mineur/instagram-parser-bundle package
 *
 * Feel free to contribute!
 *
 * @license MIT
 * @author alexhoma <alexcm.14@gmail.com>
 */

namespace Mineur\InstagramParserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

use Mineur\InstagramParserBundle\DependencyInjection\InstagramParserExtension;

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