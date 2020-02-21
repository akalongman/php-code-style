<?php

declare(strict_types=1);

namespace LongishCodingStandard\Sniffs\ControlStructures;

use PHP_CodeSniffer\Files\File;
use PHP_CodeSniffer\Sniffs\Sniff;

use function array_reverse;
use function key;

use const T_CASE;
use const T_DEFAULT;

class DefaultAsLastSniff implements Sniff
{
    /**
     * @return int[]
     */
    public function register(): array
    {
        return [T_DEFAULT];
    }

    /**
     * @param int $stackPtr
     */
    public function process(File $phpcsFile, $stackPtr): void
    {
        $tokens = $phpcsFile->getTokens();
        $default = $tokens[$stackPtr];
        $switchPtr = key(array_reverse($default['conditions'], true));
        $closer = $tokens[$switchPtr]['scope_closer'];

        $from = $stackPtr;

        while ($casePtr = $phpcsFile->findNext(T_CASE, $from + 1, $closer)) {
            if ($switchPtr === key(array_reverse($tokens[$casePtr]['conditions'], true))) {
                $error = 'Default case in switch should be as last; another case found here';
                $phpcsFile->addError($error, $casePtr, 'CaseAfterDefault');
                break;
            }

            $from = $casePtr;
        }
    }
}
