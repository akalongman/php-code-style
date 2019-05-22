<?php
declare(strict_types=1);

namespace Longman\LongishStandard\Sniffs\Commenting;

use PHP_CodeSniffer\Sniffs\Sniff;
use PHP_CodeSniffer\Files\File;

class DisallowHashCommentsSniff implements Sniff
{
    public function register()
    {
        return [T_COMMENT];
    }

    public function process(File $phpcsFile, $stackPtr)
    {
        $tokens = $phpcsFile->getTokens();
        if ($tokens[$stackPtr]['content']{0} === '#') {
            $error = 'Hash comments are prohibited; found %s';
            $data = [trim($tokens[$stackPtr]['content'])];
            $phpcsFile->addError($error, $stackPtr, 'Found', $data);
        }
    }
}


