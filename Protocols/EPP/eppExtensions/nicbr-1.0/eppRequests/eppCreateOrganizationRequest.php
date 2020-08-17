<?php

namespace Metaregistrar\EPP;

class eppCreateOrganizationRequest extends eppCreateContactRequest
{
    /**
     * @var \DOMElement $organizationExtension
     */
    private $organizationExtension;

    /**
     * @param eppContact           $createinfo
     * @param nicbrEppOrganization $organization
     * @param bool                 $namespacesinroot
     * @throws eppException
     */
    public function __construct($createinfo, $organization, $namespacesinroot = true)
    {
        parent::__construct($createinfo, $namespacesinroot);

        $this->organizationExtension = $this->createElement('brorg:create');
        $this->organizationExtension->setAttribute('xmlns:brorg', 'urn:ietf:params:xml:ns:brorg-1.0');

        if ($organization instanceof nicbrEppOrganization) {
            $this->setOrganization($organization);
        } else {
            throw new eppException('organization must be instanceof nicbrEppOrganization');
        }

        $this->getExtension()->appendChild($this->organizationExtension);
    }

    /**
     * @param nicbrEppOrganization $organization
     */
    private function setOrganization($organization)
    {
        $this->setOrganizationId($organization->getOrganizationId());
        $this->setContacts($organization->getContacts());
        $this->setResponsible($organization->getResponsible());
    }

    /**
     * @param string $organizationId
     */
    private function setOrganizationId($organizationId)
    {
        $this->organizationExtension->appendChild($this->createElement('brorg:organization', $organizationId));
    }

    /**
     * @param array $contacts
     * @throws \Exception
     */
    private function setContacts($contacts)
    {
        if (!is_array($contacts)) {
            throw new \Exception('contacts must be array');
        }

        foreach ($contacts as $type => $contactId) {
            $contact = $this->createElement('brorg:contact', $contactId);
            $contact->setAttribute('type', $type);

            $this->organizationExtension->appendChild($contact);
        }
    }

    /**
     * @param string $responsible
     */
    public function setResponsible($responsible)
    {
        $this->organizationExtension->appendChild($this->createElement('brorg:responsible', $responsible));
    }
}