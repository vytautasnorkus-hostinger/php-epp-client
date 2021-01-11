<?php

namespace Metaregistrar\EPP;

class nicbrEppInfoDomainResponse extends eppDnssecInfoDomainResponse
{
    const PUBLICATION_FLAG_ON_HOLD = 'onHold';

    /**
     * @return string|null
     */
    public function getTicketNumber()
    {
        return $this->queryPath('/epp:epp/epp:response/epp:extension/brdomain:infData/brdomain:ticketNumber');
    }

    /**
     * @return string|null
     */
    public function getOrganization()
    {
        return $this->queryPath('/epp:epp/epp:response/epp:extension/brdomain:infData/brdomain:organization');
    }

    /**
     * @return bool
     */
    public function hasPublicationFlagOnHold()
    {
        $publicationFlag = $this->queryPath(
            '/epp:epp/epp:response/epp:extension/brdomain:infData/brdomain:publicationStatus/@publicationFlag'
        );

        return $publicationFlag === self::PUBLICATION_FLAG_ON_HOLD;
    }

    /**
     * @return string|null
     */
    public function getOnHoldReason()
    {
        return $this->queryPath(
            '/epp:epp/epp:response/epp:extension/brdomain:infData/brdomain:publicationStatus/brdomain:onHoldReason'
        );
    }

    /**
     * @return array
     */
    public function getDomainNameserversArray()
    {
        $nameservers = [];

        foreach ($this->getDomainNameservers() as $nameserver) {
            $nameservers[] = $nameserver->getHostname();
        }

        return $nameservers;
    }

    /**
     * @return array
     */
    public function getDnsPendingErrors()
    {
        $result = [];

        $xpath  = $this->xPath();
        $errors = $xpath->query('/epp:epp/epp:response/epp:extension/brdomain:infData/brdomain:pending/brdomain:dns');

        if (!$errors->length) {
            return $result;
        }

        /** @var \DOMElement $error */
        foreach ($errors as $error) {
            $result[] = [
                'reason'    => $error->getAttribute('status'),
                'host_name' => $error->getElementsByTagName('hostName')->item(0)->nodeValue,
            ];
        }

        return $result;
    }
}
