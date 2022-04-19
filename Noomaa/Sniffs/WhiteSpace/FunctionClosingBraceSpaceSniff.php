<?php

/**
 * Checks that there is no empty line before the closing brace of a function.
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

    public function process(File $file, $position): void
    {
        $tokens = $file->getTokens();

        // if( isset( $tokens[ $position ][ 'scope_closer' ] ) === false )
        // {
        //     // Probably an interface method.
        //     return;
        // }

        $close_brace_position   = $tokens[$position]['scope_closer'];
        $previous_content       = $file->findPrevious(T_WHITESPACE, ($close_brace_position - 1), null, true);
        $close_brace_line       = $tokens[$close_brace_position]['line'];
        $previous_line          = $tokens[$previous_content]['line'];
        $founds                 = ($close_brace_line - $previous_line - 1);

        // $nestedFunction = false;
        // if( $file->hasCondition($position, [T_FUNCTION, T_CLOSURE]) === true || isset($tokens[$position]['nested_parenthesis']) === true )
        // {
        //     $nestedFunction = true;
        // }


        // if( $nestedFunction === true )
        // {
        //     // if ( $founds < 0 ) {
        //     //     $error = 'Closing brace of nested function must be on a new line';
        //     //     $fix   = $file->addFixableError($error, $close_brace_position, 'ContentBeforeClose');
        //     //     if ( $fix === true ) {
        //     //         $file->fixer->addNewlineBefore($close_brace_position);
        //     //     }
        //     // } elseif ( $founds > 0 ) {
        //     //     $error = 'Expected 0 blank lines before closing brace of nested function; %s founds';
        //     //     $data  = [$founds];
        //     //     $fix   = $file->addFixableError($error, $close_brace_position, 'SpacingBeforeNestedClose', $data);

        //     //     if ( $fix === true ) {
        //     //         $file->fixer->beginChangeset();
        //     //         $changeMade = false;
        //     //         for ( $i = ($previous_content + 1); $i < $close_brace_position; $i++ ) {
        //     //             // Try and maintain indentation.
        //     //             if ( $tokens[$i]['line'] === ($close_brace_line - 1) ) {
        //     //                 break;
        //     //             }

        //     //             $file->fixer->replaceToken($i, '');
        //     //             $changeMade = true;
        //     //         }

        //     //         // Special case for when the last content contains the newline
        //     //         // token as well, like with a comment.
        //     //         if ( $changeMade === false ) {
        //     //             $file->fixer->replaceToken(($previous_content + 1), '');
        //     //         }

        //     //         $file->fixer->endChangeset();
        //     //     }//end if
        //     // }//end if
        // }
        // else
        // {

            if( $founds !== 0 )
            {
                $error = $founds .  ' ' . $previous_content . ' ' . $close_brace_position . 'NoomaaCodingStandard: Expected 0 blank line before closing function brace; %s founds';
                $data  = [ $founds ];
                $fix   = $file->addFixableError( $error, $close_brace_position, 'NoBlankLineBeforeClosingBrace', $data );
                // if( $fix === true )
                // {
                    // if( $founds < 0 )
                    // {
                    //     $file->fixer->beginChangeset();
                    //     for ( $i = ($previous_content + 1); $i < ($close_brace_position - 1); $i++ ) {
                    //         $file->fixer->replaceToken($i, '');
                    //     }

                    //     $file->fixer->replaceToken($i, $file->eolChar);
                    //     $file->fixer->endChangeset();
                    // } 



                    // if( $founds > 0 )
                    // {
                    //     $file->fixer->beginChangeset();
                    //     for( $i = ( $previous_content + 1 ); $i < ( $close_brace_position - 1 ); $i++ )
                    //     {
                    //         // $file->fixer->replaceToken( $i, '' );
                    //         // $file->fixer->addNewline($close_brace_position);
                    //         // $file->fixer->replaceToken( $i, $file->eolChar );
                    //     }
                    //     $file->fixer->endChangeset();

                    // }
                    // else
                    // {
                        // // Try and maintain indentation.
                        // if ( $tokens[($close_brace_position - 1)]['code'] === T_WHITESPACE ) {
                        //     $file->fixer->addNewline($close_brace_position - 1);
                        // } else {
                        //     $file->fixer->addNewline($close_brace_position);
                        // }
                // }
            }

                // if( $founds < 0 )
                // {
                //     $founds = 0;
                // }

            // if( $founds > 0 )
            // {
                // if( $founds < 0 )
                // {
                //     $founds = 0;
                // // }
                // $error = $founds . 'NoomaaCodingStandard: Expected 0 blank line before closing function brace; %s founds';
                // $data  = [ $founds ];
                // $fix   = $file->addFixableError( $error, $close_brace_position, 'NoBlankLineBeforeClosingBrace', $data );

                // if( $fix === true )
                // {
                //     // if( $founds < 0 )
                //     // {
                //     //     $file->fixer->beginChangeset();
                //     //     for ( $i = ($previous_content + 1); $i < ($close_brace_position - 1); $i++ ) {
                //     //         $file->fixer->replaceToken($i, '');
                //     //     }

                //     //     $file->fixer->replaceToken($i, $file->eolChar);
                //     //     $file->fixer->endChangeset();
                //     // } 



                //     if( $founds > 0 )
                //     {
                //         $file->fixer->beginChangeset();
                //         for( $i = ( $previous_content + 1 ); $i < ( $close_brace_position - 1 ); $i++ )
                //         {
                //             $file->fixer->replaceToken( $i, '' );
                //         }
                //         $file->fixer->replaceToken( $i, $file->eolChar );
                //         $file->fixer->endChangeset();

                //     }
                //     else
                //     {
                //         // // Try and maintain indentation.
                //         // if ( $tokens[($close_brace_position - 1)]['code'] === T_WHITESPACE ) {
                //         //     $file->fixer->addNewline($close_brace_position - 1);
                //         // } else {
                //         //     $file->fixer->addNewline($close_brace_position);
                //         // }
                //     }
                // }
            }//end if
        // }//end if

    // }

}