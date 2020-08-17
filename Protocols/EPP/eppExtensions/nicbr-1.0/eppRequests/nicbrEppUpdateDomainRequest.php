<?php

namespace Metaregistrar\EPP;

class nicbrEppUpdateDomainRequest extends eppUpdateDomainRequest
{
    /**
     * @var \DOMElement $domainExtension
     */
    private $domainExtension;

    /**
     * @param string      $objectname
     * @param string|null $ticketNumber
     * @param eppDomain   $addinfo
     * @param eppDomain   $removeinfo
     * @param eppDomain   $updateinfo
     * @param bool        $forcehostattr
     * @param bool        $namespacesinroot
     * @throws eppException\
     */
    public function __construct(
        $objectname,
        $ticketNumber = null,
        $addinfo = null,
        $removeinfo = null,
        $updateinfo = null,
        $forcehostattr = false,
        $namespacesinroot = true
    ) {
        parent::__construct($objectname, $addinfo, $removeinfo, $updateinfo, $forcehostattr, $namespacesinroot);

        $this->domainExtension = $this->createElement('brdomain:update');
        $this->domainExtension->setAttribute('xmlns:brdomain', 'urn:ietf:params:xml:ns:brdomain-1.0');

        if ($ticketNumber) {
            $this->setTicketNumber($ticketNumber);
        }

        $this->getExtension()->appendChild($this->domainExtension);
    }

    /**
     * @param string $ticketNumber
     * @return void
     */
    public function setTicketNumber($ticketNumber)
    {
        $ticketNumber = $this->createElement('brdomain:ticketNumber', $ticketNumber);

        $this->domainExtension->appendChild($ticketNumber);
    }
}