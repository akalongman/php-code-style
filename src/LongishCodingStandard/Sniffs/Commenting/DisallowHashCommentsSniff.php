<?php

declare(strict_types=1);

namespace LongishCodingStandard\Sniffs\Commenting;

use PHP_CodeSniffer\Files\File;
use PHP_CodeSniffer\Sniffs\Sniff;

class DisallowHashCommentsSniff implements Sniff
{
    public function register(): array
    {
        return [T_COMMENT];
    }

    public function process(File $phpcsFile, $stackPtr): void
    {
        $tokens = $phpcsFile->getTokens();
        if ($tokens[$stackPtr]['content']{0} === '#') {
            $error = 'Hash comments are prohibited; found %s';
            $data = [trim($tokens[$stackPtr]['content'])];
            $phpcsFile->addError($error, $stackPtr, 'Found', $data);
        }
    }
}


