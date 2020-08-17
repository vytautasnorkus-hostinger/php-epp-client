<?php

namespace Metaregistrar\EPP;

class eppInfoOrganizationRequest extends eppInfoContactRequest
{
    /**
     * @param eppContactHandle $inforequest
     * @param bool             $namespacesinroot
     * @throws eppException
     */
    public function __construct($inforequest, $namespacesinroot = true)
    {
        parent::__construct($inforequest, $namespacesinroot);

        $this->organizationExtension = $this->createElement('brorg:info');
        $this->organizationExtension->setAttribute('xmlns:brorg', 'urn:ietf:params:xml:ns:brorg-1.0');

        if ($inforequest instanceof eppContactHandle) {
            $this->setOrganization($inforequest);
        } else {
            throw new eppException('inforequest must be instanceof eppContactHandle');
        }

        $this->getExtension()->appendChild($this->organizationExtension);
    }

    /**
     * @var eppContactHandle $contactHandle
     * @return void
     */
    public function setOrganization($contactHandle)
    {
        $organization = $this->createElement('brorg:organization', $contactHandle->getContactHandle());

        $this->organizationExtension->appendChild($organization);
    }
}