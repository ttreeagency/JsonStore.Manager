<?php
namespace Ttree\JsonStore\Manager\ViewHelpers;

use Neos\Utility\ObjectAccess;
use Neos\FluidAdaptor\Core\ViewHelper\AbstractViewHelper;

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
