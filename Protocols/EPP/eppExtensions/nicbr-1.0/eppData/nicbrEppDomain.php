<?php

namespace Metaregistrar\EPP;

class nicbrEppDomain extends eppDomain
{
    /** @var string $organization */
    private $organization;

    /** @var int $autoRenew */
    private $autoRenew;

    /** @var string $ticketNumber */
    private $ticketNumber;

    /**
     * @return string
     */
    public function getOrganization()
    {
        return $this->organization;
    }

    /**
     * @param string $organization
     */
    public function setOrganization($organization)
    {
        $this->organization = $organization;
    }

    /**
     * @return int
     */
    public function getAutoRenew()
    {
        return $this->autoRenew;
    }

    /**
     * @param int $autoRenew
     */
    public function setAutoRenew($autoRenew)
    {
        $this->autoRenew = $autoRenew;
    }

    /**
     * @return string
     */
    public function getTicketNumber()
    {
        return $this->ticketNumber;
    }

    /**
     * @param string $ticketNumber
     */
    public function setTicketNumber($ticketNumber)
    {
        $this->ticketNumber = $ticketNumber;
    }
}