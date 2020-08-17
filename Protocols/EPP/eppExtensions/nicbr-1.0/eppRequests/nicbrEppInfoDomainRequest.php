<?php

namespace Metaregistrar\EPP;

class nicbrEppInfoDomainRequest extends eppInfoDomainRequest
{
    /**
     * @var \DOMElement $domainExtension
     */
    private $domainExtension;

    /**
     * @param nicbrEppDomain $infodomain
     * @param string|null    $hosts
     * @param bool           $namespacesinroot
     * @throws eppException
     */
    public function __construct($infodomain, $hosts = null, $namespacesinroot = true)
    {
        parent::__construct($infodomain, $hosts, $namespacesinroot);

        if (!$infodomain instanceof nicbrEppDomain) {
            throw new eppException('infodomain must be instanceof nicbrEppDomain');
        }

        $this->domainExtension = $this->createElement('brdomain:info');
        $this->domainExtension->setAttribute('xmlns:brdomain', 'urn:ietf:params:xml:ns:brdomain-1.0');

        $this->setTicketNumber($infodomain);

        $this->getExtension()->appendChild($this->domainExtension);
    }

    /**
     * @param nicbrEppDomain $domain
     */
    public function setTicketNumber($domain)
    {
        $ticketNumber = $this->createElement('brdomain:ticketNumber', $domain->getTicketNumber());

        $this->domainExtension->appendChild($ticketNumber);
    }
}