<?php

/*
 * Mineur/instagram-parser-bundle package
 *
 * Feel free to contribute!
 *
 * @license MIT
 * @author alexhoma <alexcm.14@gmail.com>
 */

namespace Mineur\InstagramParserBundle\Command;

/**
 * Class AsciiArt
 */
class AsciiArt
{
    public static function generate()
    {
        return [
            '',
            '<fg=white;options=bold> __    __    __    __    __    ______    __  __    ______    </>',
            '<fg=white;options=bold>/\ "-./  \  /\ \  /\ "-. \ \  /\  ___\  /\ \/\ \  /\  == \   </>',
            '<fg=white;options=bold>\ \ \-./\ \ \ \ \ \ \ \- .  \ \ \  __\  \ \ \_\ \ \ \  __<   </>',
            '<fg=white;options=bold> \ \_\ \ \_\ \ \_\ \ \_\ \"\_\ \ \_____\ \ \_____\ \ \_\ \_\ </>',
            '<fg=white;options=bold>  \/_/  \/_/  \/_/  \/_/  \/_/  \/_____/  \/_____/  \/_/ /_/ </>',
            '',
            '<fg=green>---------------- Instagram Parser PHP API ----------------</>',
            '',
            '',
        ];
    }
}