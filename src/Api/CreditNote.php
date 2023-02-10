<?php
/*
 * CreditNote.php
 * @author Martin Appelmann <hello@martin-appelmann.de>
 * @copyright 2022 Martin Appelmann
 */

namespace NetstackDE\LaravelSevdeskApi\Api;

use Carbon\Carbon;
use NetstackDE\LaravelSevdeskApi\Api\Utils\ApiClient;
use NetstackDE\LaravelSevdeskApi\Api\Utils\Routes;

/**
 * Sevdesk Credit Note Api
 *
 * @see https://api.sevdesk.de/#tag/CreditNote
 */
class CreditNote extends ApiClient
{
    /**
     * Create credit note.
     *
     * @param array $parameters
     * @return mixed
     */
    public function create(array $parameters = [])
    {
        return $this->_post(Routes::CREDIT_NOTE . '/Factory/saveCreditNote', $parameters);
    }
}
