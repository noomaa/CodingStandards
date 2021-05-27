<?php

/**
 * Checks that there is no empty line after the opening brace of a function.
 */

namespace Noomaa\CodingStandards\WhiteSpace;

use PHP_CodeSniffer\Files\File;
use PHP_CodeSniffer\Sniffs\Sniff;

class FunctionOpeningBraceSpaceSniff implements Sniff
{

    public $supportedTokenizers = [
        'PHP',
        'JS',
    ];

    public function register() : array
    {
        return [
            T_FUNCTION,
            T_CLOSURE,
        ];
    }

    public function process(File $phpcsFile, $stackPtr): void
    {
        $tokens = $phpcsFile->getTokens();

        if( isset($tokens[$stackPtr]['scope_opener']) === false )
        {
            // Probably an interface or abstract method.
            return;
        }

        $openBrace   = $tokens[ $stackPtr ][ 'scope_opener' ];
        $nextContent = $phpcsFile->findNext(T_WHITESPACE, ($openBrace + 1), null, true);

        if( $nextContent === $tokens[$stackPtr]['scope_closer'] )
        {
            return;
        }

        $braceLine = $tokens[$openBrace]['line'];
        $nextLine  = $tokens[$nextContent]['line'];

        $found = ($nextLine - $braceLine - 1);
        if ( $found > 0 ) {
            $error = 'Expected 0 blank lines after opening function brace; %s found';
            $data  = [$found];
            $fix   = $phpcsFile->addFixableError($error, $openBrace, 'SpacingAfter', $data);
            if ( $fix === true ) {
                $phpcsFile->fixer->beginChangeset();
                for ( $i = ($openBrace + 1); $i < $nextContent; $i++ ) {
                    if ( $tokens[$i]['line'] === $nextLine ) {
                        break;
                    }

                    $phpcsFile->fixer->replaceToken($i, '');
                }

                $phpcsFile->fixer->addNewline($openBrace);
                $phpcsFile->fixer->endChangeset();
            }
        }
    }//end process()


}//end class