<?php
/**
 * Ensure return types are defined correctly for functions and closures.
 */

namespace Noomaa\CodingStandards\Functions;

use PHP_CodeSniffer\Files\File;
use PHP_CodeSniffer\Sniffs\Sniff;

class ReturnTypeDeclarationSniff implements Sniff
{

    public function register() : array
    {
        return [
            T_FUNCTION,
            T_CLOSURE,
            T_FN,
        ];
    }

    public function process( File $file, $position ) : void
    {
        $tokens = $file->getTokens();
        if( isset( $tokens[ $position ][ 'parenthesis_opener' ] ) === false
            || isset( $tokens[ $position ][ 'parenthesis_closer' ] ) === false
            || $tokens[ $position ][ 'parenthesis_opener' ] === null
            || $tokens[ $position ][ 'parenthesis_closer' ] === null )
        {
            return;
        }

        $methodProperties = $file->getMethodProperties( $position );
        if( $methodProperties[ 'return_type' ] === '' )
        {
            return;
        }

        $returnType = $methodProperties[ 'return_type_token' ];
        if( $methodProperties[ 'nullable_return_type' ] === true )
        {
            $returnType = $file->findPrevious( T_NULLABLE, ( $returnType - 1 ) );
        }

        if ( $tokens[($returnType - 1)]['code'] !== T_WHITESPACE
            || $tokens[($returnType - 1)]['content'] !== ' '
            || $tokens[($returnType - 2)]['code'] !== T_COLON
        )
        {
            $error = 'There must be a single space between the colon and type in a return type declaration';
            if ( $tokens[($returnType - 1)]['code'] === T_WHITESPACE
                && $tokens[($returnType - 2)]['code'] === T_COLON
            ) {
                $fix = $file->addFixableError($error, $returnType, 'SpaceBeforeReturnType');
                if ( $fix === true ) {
                    $file->fixer->replaceToken(($returnType - 1), ' ');
                }
            } elseif ( $tokens[($returnType - 1)]['code'] === T_COLON ) {
                $fix = $file->addFixableError($error, $returnType, 'SpaceBeforeReturnType');
                if ( $fix === true ) {
                    $file->fixer->addContentBefore($returnType, ' ');
                }
            } else {
                $file->addError($error, $returnType, 'SpaceBeforeReturnType');
            }
        }

        $colon = $file->findPrevious( T_COLON, $returnType );
        var_dump( $colon);
        
        if ( $tokens[ ( $colon - 1 ) ][ 'code' ] !== T_WHITESPACE )
        {
            $error    = 'There must be a single space before the colon in a return type declaration';
            $previous = $file->findPrevious( T_WHITESPACE, ( $colon - 1 ), null, true );

            if ( $tokens[ $previous ][ 'code' ] === T_WHITESPACE )
            {
                $fix = $file->addFixableError( $error, $colon, 'NoSpaceBeforeColon' );
                if( $fix === true )
                {
                    $file->fixer->beginChangeset();
                    for ( $x = ( $previous + 1 ); $x < $colon; $x++ )
                    {
                        $file->fixer->replaceToken( $x, ' ' );
                    }

                    $file->fixer->endChangeset();
                }
            }
            else
            {
                $file->addError( $error, $colon, 'NoSpaceBeforeColon' );
            }
        }

        // $colon = $file->findPrevious(T_COLON, $returnType);
        // if ($tokens[($colon - 1)]['code'] !== T_CLOSE_PARENTHESIS) {
        //     $error = 'There must not be a space before the colon in a return type declaration';
        //     $prev  = $file->findPrevious(T_WHITESPACE, ($colon - 1), null, true);
        //     if ($tokens[$prev]['code'] === T_CLOSE_PARENTHESIS) {
        //         $fix = $file->addFixableError($error, $colon, 'SpaceBeforeColon');
        //         if ($fix === true) {
        //             $file->fixer->beginChangeset();
        //             for ($x = ($prev + 1); $x < $colon; $x++) {
        //                 $file->fixer->replaceToken($x, '');
        //             }
        //
        //             $file->fixer->endChangeset();
        //         }
        //     } else {
        //         $file->addError($error, $colon, 'SpaceBeforeColon');
        //     }
        // }
    }//end process()


}