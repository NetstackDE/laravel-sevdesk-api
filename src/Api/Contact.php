<?php
/*
 * Contact.php
 * @author Martin Appelmann <hello@martin-appelmann.de>
 * @copyright 2021 Martin Appelmann
 */

namespace NetstackDE\LaravelSevdeskApi\Api;

use Illuminate\Support\Collection;
use NetstackDE\LaravelSevdeskApi\Api\Utils\ApiClient;
use NetstackDE\LaravelSevdeskApi\Api\Utils\Routes;

/**
 * Sevdesk Contact Api
 *
 * @see https://api.sevdesk.de/#tag/Contact
 */
class Contact extends ApiClient
{
    /**
     * Contact categories
     */
    const SUPPLIER = 2;
    const CUSTOMER = 3;
    const PARTNER = 4;
    const PROSPECT_CUSTOMER = 28;

    // =========================== all ====================================

    /**
     * Return all organisation contacts by default. If you want organisations and persons use $depth = 1.
     *
     * @param int $depth
     * @return mixed
     */
    public function all(int $depth = 0, int $limit = 1000)
    {
        return Collection::make($this->_get(Routes::CONTACT, ['depth' => $depth, 'limit' => $limit,]));
    }

    /**
     * Return contacts filtered by city.
     *
     * @param string $city
     * @param int $depth
     * @return mixed
     */
    public function allByCity(string $city, int $depth = 0, int $limit = 1000)
    {
        return Collection::make($this->_get(Routes::CONTACT, ['city' => $city, 'depth' => $depth, 'limit' => $limit,]));
    }

    /**
     * Return supplier contacts.
     *
     * @param int $depth
     * @return mixed
     */
    public function allSuppliers(int $depth = 0, int $limit = 1000)
    {
        return Collection::make($this->_get(Routes::CONTACT, [
            'category' => [
                "id" => self::SUPPLIER,
                "objectName" => "Category"
            ],
            'depth' => $depth,
            'limit' => $limit,
        ]));
    }

    /**
     * Return customer contacts.
     *
     * @param int $depth
     * @return mixed
     */
    public function allCustomers(int $depth = 0, int $limit = 1000)
    {
        return Collection::make($this->_get(Routes::CONTACT, [
            'category' => [
                "id" => self::CUSTOMER,
                "objectName" => "Category"
            ],
            'depth' => $depth, 
            'limit' => $limit,
        ]));
    }

    /**
     * Return partner contacts.
     *
     * @param int $depth
     * @return mixed
     */
    public function allPartners(int $depth = 0, int $limit = 1000)
    {
        return Collection::make($this->_get(Routes::CONTACT, [
            'category' => [
                "id" => self::PARTNER,
                "objectName" => "Category"
            ],
            'depth' => $depth,
            'limit' => $limit,
        ]));
    }

    /**
     * Return prospect customer contacts.
     *
     * @param int $depth
     * @return mixed
     */
    public function allProspectCustomers(int $depth = 0, int $limit = 1000)
    {
        return Collection::make($this->_get(Routes::CONTACT, [
            'category' => [
                "id" => self::PROSPECT_CUSTOMER,
                "objectName" => "Category"
            ],
            'depth' => $depth, 
            'limit' => $limit,
        ]));
    }

    /**
     * Return contacts with custom category.
     *
     * @param int $contactCategory
     * @param int $depth
     * @return mixed
     */
    public function allCustom(int $contactCategory, int $depth = 0, int $limit = 1000)
    {
        return Collection::make($this->_get(Routes::CONTACT, [
            'category' => [
                "id" => $contactCategory,
                "objectName" => "Category"
            ],
            'depth' => $depth,
            'limit' => $limit,
        ]));
    }

    // =========================== get ====================================

    /**
     * Return a single contact.
     *
     * @param $contactId
     * @return mixed
     */
    public function get($contactId)
    {
        return $this->_get(Routes::CONTACT . '/' . $contactId)[0];
    }

    // ========================== create ==================================

    /**
     * Create contact.
     *
     * @param int $contactType
     * @param array $parameters
     * @return mixed
     */
    private function create(int $contactType, array $parameters = [])
    {
        $parameters['category'] = [
            "id" => $contactType,
            "objectName" => "Category"
        ];
        return $this->_post(Routes::CONTACT, $parameters);
    }

    /**
     * Create supplier contact.
     *
     * @param string $organisationName
     * @param array $parameters
     * @return mixed
     */
    public function createSupplier(string $organisationName, array $parameters = [])
    {
        $parameters['name'] = $organisationName;
        return $this->create(self::SUPPLIER, $parameters);
    }

    /**
     * Create customer contact.
     *
     * @param string $organisationName
     * @param array $parameters
     * @return mixed
     */
    public function createCustomer(string $organisationName, array $parameters = [])
    {
        $parameters['name'] = $organisationName;
        return $this->create(self::CUSTOMER, $parameters);
    }

    /**
     * Create partner contact.
     *
     * @param string $organisationName
     * @param array $parameters
     * @return mixed
     */
    public function createPartner(string $organisationName, array $parameters = [])
    {
        $parameters['name'] = $organisationName;
        return $this->create(self::PARTNER, $parameters);
    }

    /**
     * Create prospect customer contact.
     *
     * @param string $organisationName
     * @param array $parameters
     * @return mixed
     */
    public function createProspectCustomer(string $organisationName, array $parameters = [])
    {
        $parameters['name'] = $organisationName;
        return $this->create(self::PROSPECT_CUSTOMER, $parameters);
    }

    /**
     * Create contact with custom contact category.
     *
     * @param string $organisationName
     * @param int $contactCategory
     * @param array $parameters
     * @return mixed
     */
    public function createCustom(string $organisationName, int $contactCategory, array $parameters = [])
    {
        $parameters['name'] = $organisationName;
        return $this->create($contactCategory, $parameters);
    }

    /**
     * Create accounting contact.
     *
     * @param int $contactId
     * @return mixed
     */
    public function createAccountingContact(int $contactId)
    {
        return $this->_post(Routes::ACCOUNTING_CONTACT, [
            'contact' => [
                "id" => $contactId,
                "objectName" => "Contact"
            ]
        ]);
    }

    // ========================== update ==================================

    /**
     * Update an existing contact.
     *
     * @param $contactId
     * @param array $parameters
     * @return mixed
     */
    public function update($contactId, array $parameters = [])
    {
        return $this->_put(Routes::CONTACT . '/' . $contactId, $parameters);
    }

    // ========================== delete ==================================

    /**
     * Delete an existing contact.
     *
     * @param $contactId
     * @return mixed
     */
    public function delete($contactId)
    {
        return $this->_delete(Routes::CONTACT . '/' . $contactId);
    }
}
