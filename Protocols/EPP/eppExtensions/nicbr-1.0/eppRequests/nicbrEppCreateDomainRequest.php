<?php

namespace Metaregistrar\EPP;

class nicbrEppCreateDomainRequest extends eppCreateDomainRequest
{
    /**
     * @var \DOMElement $domainExtension
     */
    private $domainExtension;

    /**
     * @param nicbrEppDomain $createinfo
     * @param false          $forcehostattr
     * @param bool           $namespacesinroot
     * @throws eppException
     */
    public function __construct($createinfo, $forcehostattr = false, $namespacesinroot = true)
    {
        parent::__construct($createinfo, $forcehostattr, $namespacesinroot);

        if (!$createinfo instanceof nicbrEppDomain) {
            throw new eppException('createinfo must be instanceof nicbrEppDomain');
        }

        $this->domainExtension = $this->createElement('brdomain:create');
        $this->domainExtension->setAttribute('xmlns:brdomain', 'urn:ietf:params:xml:ns:brdomain-1.0');

        $this->setOrganization($createinfo);
        $this->setAutoRenew($createinfo);

        $this->getExtension()->appendChild($this->domainExtension);
    }

    /**
     * @param nicbrEppDomain $domain
     * @return void
     */
    public function setOrganization($domain)
    {
        $organization = $this->createElement('brdomain:organization', $domain->getOrganization());

        $this->domainExtension->appendChild($organization);
    }

    /**
     * @param nicbrEppDomain $domain
     * @return void
     */
    public function setAutoRenew($domain)
    {
        $autoRenew = $this->createElement('brdomain:autoRenew', $domain->getAutoRenew());

        $this->domainExtension->appendChild($autoRenew);
    }
}