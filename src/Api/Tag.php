/*
 * Tag.php
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
 * @see https://api.sevdesk.de/#tag/Tag
 */

class Tag extends ApiClient
{
    /**
     * Return all tags.
     *
     * @return mixed
     */
    public function all(int $limit = 1000)
    {
        return Collection::make($this->_get(Routes::TAG, ['limit' => $limit]));
    }

    /**
     * Return a single tag.
     *
     * @param $contryId
     * @return mixed
     */
    public function get($tagId)
    {
        return $this->_get(Routes::TAG. '/' . $tagId)[0];
    }

}
