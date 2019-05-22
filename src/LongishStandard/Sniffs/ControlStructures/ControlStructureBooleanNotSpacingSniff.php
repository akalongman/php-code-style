<?php
declare(strict_types=1);

namespace Longman\LongishStandard\Sniffs\ControlStructures;

use Exception;
use PHP_CodeSniffer\Files\File;
use PHP_CodeSniffer\Sniffs\Sniff;

use function str_repeat;
use const T_WHITESPACE;

class ControlStructureBooleanNotSpacingSniff implements Sniff
{
    public $requiredSpacesAfterBooleanNot = 1;

    public function register()
    {
        return [T_IF];
    }

    public function process(File $phpcsFile, $stackPtr)
    {
        $this->requiredSpacesAfterBooleanNot = (int) $this->requiredSpacesAfterBooleanNot;
        $tokens = $phpcsFile->getTokens();

        if (isset($tokens[$stackPtr]['parenthesis_opener']) === false
            || isset($tokens[$stackPtr]['parenthesis_closer']) === false
        ) {
            return;
        }

        if (! array_key_exists('scope_closer', $tokens[$stackPtr])) {
            throw new Exception('"if" without curly braces is not supported.');
        }

        $notPosition = $phpcsFile->findNext(T_BOOLEAN_NOT, ($stackPtr + 1), null, false, null, true);
        if ($notPosition === false) {
            return;
        }

        $i = 1;
        $spacesAfterBooleanNot = 0;
        while ($tokens[$notPosition + $i]['code'] === T_WHITESPACE) {
            $spacesAfterBooleanNot += $tokens[$notPosition + $i]['length'];
            $i++;
        }

        $phpcsFile->recordMetric($stackPtr, 'Spaces after boolean not character', $spacesAfterBooleanNot);

        if ($spacesAfterBooleanNot === $this->requiredSpacesAfterBooleanNot) {
            return;
        }

        $error = 'Expected %s spaces after boolean not character; %s found';
        $data = [$this->requiredSpacesAfterBooleanNot, $spacesAfterBooleanNot];
        $fix = $phpcsFile->addFixableError($error, $stackPtr, 'SpacingAfterBooleanNot', $data);
        // Stop here if we are not fixing the error.
        if ($fix !== true) {
            return;
        }

        $phpcsFile->fixer->beginChangeset();
        $padding = str_repeat(' ', $this->requiredSpacesAfterBooleanNot);
        if ($spacesAfterBooleanNot === 0) {
            $phpcsFile->fixer->addContent($notPosition, $padding);
        } else {
            $phpcsFile->fixer->replaceToken($notPosition + 1, $padding);
        }
        $phpcsFile->fixer->endChangeset();
    }
}


