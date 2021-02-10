<?php

namespace Metaregistrar\EPP;

class domregEppTransferRequest extends eppTransferRequest
{
    const TRANSFER_TYPE_TRADE = 'trade';

    const TRANSFER_TYPE_TRANSFER = 'transfer';

    /** @var string $transferType */
    private $transferType;

    /**
     * @param $operation
     * @param $object
     * @param $type
     * @throws eppException
     */
    public function __construct($operation, $object, $type)
    {
        $this->setTransferType($type);
        
        parent::__construct($operation, $object);
    }

    /**
     * @param $transferType
     * @return void
     */
    public function setTransferType($transferType)
    {
        $this->transferType = $transferType ?? self::TRANSFER_TYPE_TRADE;
    }

    /**
     * @param eppDomain $domain
     * @return void
     */
    public function setDomainRequest(eppDomain $domain)
    {
        $transfer = $this->createElement('transfer');
        $transfer->setAttribute('op', self::OPERATION_REQUEST);

        $techContact = $domain->getContact(eppContactHandle::CONTACT_TYPE_TECH);

        $this->domainobject = $this->createElement('domain:transfer');
        $this->domainobject->appendChild($this->createElement('domain:name', $domain->getDomainname()));
        $this->domainobject->appendChild($this->createElement('domain:trType', $this->transferType));
        $this->domainobject->appendChild($this->createElement('domain:registrant', $domain->getRegistrant()));
        $this->domainobject->appendChild($this->createElement('domain:contact', $techContact->getContactHandle()));

        if ($domain->getPeriod()) {
            $domainperiod = $this->createElement('domain:period', $domain->getPeriod());
            $domainperiod->setAttribute('unit', eppDomain::DOMAIN_PERIOD_UNIT_Y);
            $this->domainobject->appendChild($domainperiod);
        }

        if (strlen($domain->getAuthorisationCode())) {
            $authinfo = $this->createElement('domain:authInfo');
            $pw       = $authinfo->appendChild($this->createElement('domain:pw'));
            $pw->appendChild($this->createCDATASection($domain->getAuthorisationCode()));
            $this->domainobject->appendChild($authinfo);
        }

        $transfer->appendChild($this->domainobject);

        $this->getCommand()->appendChild($transfer);
    }
}
