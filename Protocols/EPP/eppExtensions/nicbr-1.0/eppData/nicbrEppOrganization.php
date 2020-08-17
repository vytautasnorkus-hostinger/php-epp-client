<?php

namespace Metaregistrar\EPP;

class nicbrEppOrganization
{
    /** @var string $organizationId */
    private $organizationId;

    /** @var array $contacts */
    private $contacts;

    /** @var string $responsible */
    private $responsible;

    /**
     * nicbrEppOrganization constructor.
     * @param $organizationId
     * @param $contacts
     * @param $responsible
     */
    public function __construct($organizationId, $contacts, $responsible)
    {
        $this->organizationId = $organizationId;
        $this->contacts       = $contacts;
        $this->responsible    = $responsible;
    }

    /**
     * @return string
     */
    public function getOrganizationId()
    {
        return $this->organizationId;
    }

    /**
     * @param string $organizationId
     */
    public function setOrganizationId($organizationId)
    {
        $this->organizationId = $organizationId;
    }

    /**
     * @return array
     */
    public function getContacts()
    {
        return $this->contacts;
    }

    /**
     * @param array $contacts
     */
    public function setContacts($contacts)
    {
        $this->contacts = $contacts;
    }

    /**
     * @return string
     */
    public function getResponsible()
    {
        return $this->responsible;
    }

    /**
     * @param string $responsible
     */
    public function setResponsible($responsible)
    {
        $this->responsible = $responsible;
    }
}