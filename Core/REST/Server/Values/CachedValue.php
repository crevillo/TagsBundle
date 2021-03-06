<?php

namespace Netgen\TagsBundle\Core\REST\Server\Values;

use eZ\Publish\Core\Base\Exceptions\InvalidArgumentException;
use eZ\Publish\Core\REST\Common\Value;

class CachedValue extends Value
{
    /**
     * Actual value object.
     *
     * @var mixed
     */
    public $value;

    /**
     * Associative array of cache tags.
     * Example: array( 'tagId' => 42, 'tagKeyword' => 'Some tag|#eng-GB' ).
     *
     * @var mixed[]
     */
    public $cacheTags;

    /**
     * Constructor.
     *
     * @param mixed $value The value that gets cached
     * @param array $cacheTags Tags to add to the cache (supported: tagId, tagKeyword)
     */
    public function __construct($value, array $cacheTags = array())
    {
        $this->value = $value;
        $this->cacheTags = $this->checkCacheTags($cacheTags);
    }

    /**
     * Checks for unsupported cache tags.
     *
     * @param array $tags
     *
     * @throws \eZ\Publish\API\Repository\Exceptions\InvalidArgumentException If invalid cache tags are provided.
     *
     * @return array
     */
    protected function checkCacheTags(array $tags)
    {
        $invalidTags = array_diff(array_keys($tags), array('tagId', 'tagKeyword'));
        if (count($invalidTags) > 0) {
            throw new InvalidArgumentException(
                'cacheTags',
                'Unknown cache tag(s): ' . implode(', ', $invalidTags)
            );
        }

        return $tags;
    }
}
