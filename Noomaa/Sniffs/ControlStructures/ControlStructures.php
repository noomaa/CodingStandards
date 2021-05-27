<?php

namespace Noomaa\CodingStandards\ControlStructures;

use PHP_CodeSniffer\Sniffs\AbstractPatternSniff;

class ControlSignatureSniff extends AbstractPatternSniff
{

    public $ignoreComments = false;

    protected function getPatterns() : array
    {
        return [
            'doEOL',
            'while(...)EOL',
            'for(...)EOL',
            'foreach(...)EOL',
            'if(...)EOL',
            'elseEOL',
            'elseif(...)EOL',
            'else if(...)EOL',
            'tryEOL',
            'catch(...)EOL',
        ];
    }

}