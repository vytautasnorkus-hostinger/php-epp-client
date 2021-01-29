<?php

namespace Metaregistrar\EPP;

class domregEppInfoDomainResponse extends eppInfoDomainResponse
{
    /**
     * @return array
     */
    public function getDomainNameserversArray()
    {
        $nameservers = [];
        
        if (!$this->getDomainNameservers()) {
            return $nameservers;
        }

        foreach ($this->getDomainNameservers() as $nameserver) {
            $nameservers[] = $nameserver->getHostname();
        }

        return $nameservers;
    }

    /**
     * @return string|null
     */
    public function getDomainTechContact()
    {
        return $this->queryPath('/epp:epp/epp:response/epp:resData/domain:infData/domain:contact');
    }
}
