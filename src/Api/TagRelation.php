<?php
/*
 * TagRelation.php
 * @author Eric Bortz <e.bortz@netstack.de>
 * @copyright 2023 Eric Bortz
 */


namespace NetstackDE\LaravelSevdeskApi\Api;

use NetstackDE\LaravelSevdeskApi\Api\Utils\ApiClient;
use NetstackDE\LaravelSevdeskApi\Api\Utils\Routes;
use Illuminate\Support\Collection;

/**
 * Sevdesk Contact Api
 *
 * @see https://api.sevdesk.de/#tag/Tag/operation/getTagRelations
 */

class TagRelation extends ApiClient
{
    /**
     * Return all tag relations.
     *
     * @return mixed
     */
    public function all(int $limit = 1000)
    {
        return Collection::make($this->_get(Routes::TAG_RELATION, ['limit' => $limit]));
    }

    /**
     * Return a single tag relation.
     *
     * @param $tagRelationId
     * @return mixed
     */
    public function get($tagRelationId)
    {
        return $this->_get(Routes::TAG_RELATION. '/' . $tagRelationId)[0];
    }

}
