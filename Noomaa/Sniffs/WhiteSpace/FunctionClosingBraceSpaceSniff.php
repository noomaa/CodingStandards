<?php

/**
 * Checks that there is one empty line before the closing brace of a function.
 */

namespace Noomaa\CodingStandards\WhiteSpace;

use PHP_CodeSniffer\Files\File;
use PHP_CodeSniffer\Sniffs\Sniff;

class FunctionClosingBraceSpaceSniff implements Sniff
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

    public function process( File $file, $position )
    {
        $tokens = $file->getTokens();

        if( isset( $tokens[ $position ][ 'scope_closer' ] ) === false )
        {
            // Probably an interface method.
            return;
        }

        $closeBrace  = $tokens[$position]['scope_closer'];
        $prevContent = $file->findPrevious(T_WHITESPACE, ($closeBrace - 1), null, true);

        // Special case for empty JS functions.
        if( $file->tokenizerType === 'JS' && $prevContent === $tokens[$position]['scope_opener'] )
        {
            // In this case, the opening and closing brace must be
            // right next to each other.
            if( $tokens[$position]['scope_closer'] !== ($tokens[$position]['scope_opener'] + 1) )
            {
                $error = 'The opening and closing braces of empty functions must be directly next to each other; e.g., function () {}';
                $fix   = $file->addFixableError($error, $closeBrace, 'SpacingBetween');
                if( $fix === true )
                {
                    $file->fixer->beginChangeset();
                    for( $i = ($tokens[$position]['scope_opener'] + 1); $i < $closeBrace; $i++ )
                    {
                        $file->fixer->replaceToken($i, '');
                    }

                    $file->fixer->endChangeset();
                }
            }

            return;
        }

        $nestedFunction = false;
        if ( $file->hasCondition($position, [T_FUNCTION, T_CLOSURE]) === true
            || isset($tokens[$position]['nested_parenthesis']) === true
        ) {
            $nestedFunction = true;
        }

        $braceLine = $tokens[$closeBrace]['line'];
        $prevLine  = $tokens[$prevContent]['line'];
        $found     = ($braceLine - $prevLine - 1);

        if ( $nestedFunction === true ) {
            if ( $found < 0 ) {
                $error = 'Closing brace of nested function must be on a new line';
                $fix   = $file->addFixableError($error, $closeBrace, 'ContentBeforeClose');
                if ( $fix === true ) {
                    $file->fixer->addNewlineBefore($closeBrace);
                }
            } elseif ( $found > 0 ) {
                $error = 'Expected 0 blank lines before closing brace of nested function; %s found';
                $data  = [$found];
                $fix   = $file->addFixableError($error, $closeBrace, 'SpacingBeforeNestedClose', $data);

                if ( $fix === true ) {
                    $file->fixer->beginChangeset();
                    $changeMade = false;
                    for ( $i = ($prevContent + 1); $i < $closeBrace; $i++ ) {
                        // Try and maintain indentation.
                        if ( $tokens[$i]['line'] === ($braceLine - 1) ) {
                            break;
                        }

                        $file->fixer->replaceToken($i, '');
                        $changeMade = true;
                    }

                    // Special case for when the last content contains the newline
                    // token as well, like with a comment.
                    if ( $changeMade === false ) {
                        $file->fixer->replaceToken(($prevContent + 1), '');
                    }

                    $file->fixer->endChangeset();
                }//end if
            }//end if
        } else {
            if ( $found !== 1 ) {
                if ( $found < 0 ) {
                    $found = 0;
                }

                $error = 'Expected 1 blank line before closing function brace; %s found';
                $data  = [$found];
                $fix   = $file->addFixableError($error, $closeBrace, 'SpacingBeforeClose', $data);

                if ( $fix === true ) {
                    if ( $found > 1 ) {
                        $file->fixer->beginChangeset();
                        for ( $i = ($prevContent + 1); $i < ($closeBrace - 1); $i++ ) {
                            $file->fixer->replaceToken($i, '');
                        }

                        $file->fixer->replaceToken($i, $file->eolChar);
                        $file->fixer->endChangeset();
                    } else {
                        // Try and maintain indentation.
                        if ( $tokens[($closeBrace - 1)]['code'] === T_WHITESPACE ) {
                            $file->fixer->addNewline($closeBrace - 1);
                        } else {
                            $file->fixer->addNewline($closeBrace);
                        }
                    }
                }
            }//end if
        }//end if

    }

}