<?php

namespace Ttree\JsonStore\Manager\ViewHelpers;

use TYPO3\Flow\Reflection\ObjectAccess;
use TYPO3\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * @api
 */
class ObjectAccessViewHelper extends AbstractViewHelper
{
    /**
     * @var boolean
     */
    protected $escapeChildren = false;

    /**
     * @param mixed $subject
     * @param string $path
     * @return mixed
     * @see http://www.php.net/manual/function.strip-tags.php
     * @api
     */
    public function render($subject, $path)
    {
        return ObjectAccess::getPropertyPath($subject, $path);
    }
}
