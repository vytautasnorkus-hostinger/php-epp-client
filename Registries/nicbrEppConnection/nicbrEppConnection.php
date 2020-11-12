<?php

namespace Metaregistrar\EPP;

class nicbrEppConnection extends eppConnection
{
    /** @var bool $verify_peer_name */
    protected $verify_peer_name = false;
    
    /**
     * @param bool        $logging
     * @param string|null $settingsfile
     */
    public function __construct($logging = false, $settingsfile = null)
    {
        parent::__construct($logging, $settingsfile);

        $this->enableDnssec();

        parent::useExtension('nicbr-1.0');
        parent::addExtension('brdomain', 'urn:ietf:params:xml:ns:brdomain-1.0');
    }
}
