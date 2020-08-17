<?php

namespace Metaregistrar\EPP;

class nicbrEppCreateDomainResponse extends eppCreateDomainResponse
{
    /**
     * @return string|null
     */
    public function getDomainTicket()
    {
        return $this->queryPath('/epp:epp/epp:response/epp:extension/brdomain:creData/brdomain:ticketNumber');
    }
}