<?php

namespace Metaregistrar\EPP;

class nicbrEppPollResponse extends eppPollResponse
{
    /**
     * @return null|string
     */
    public function getDomainTicket()
    {
        return $this->queryPath('/epp:epp/epp:response/epp:extension/brdomain:' . $this->getMessageType() . 'Data/brdomain:ticketNumber');
    }

    /**
     * @return null|string
     */
    public function getDomainReason()
    {
        return $this->queryPath('/epp:epp/epp:response/epp:extension/brdomain:' . $this->getMessageType() . 'Data/brdomain:reason');
    }
}
