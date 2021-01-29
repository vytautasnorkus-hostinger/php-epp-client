<?php

namespace Metaregistrar\EPP;

class domregEppConnection extends eppConnection
{
    public function __construct($logging = false, $settingsfile = null)
    {
        parent::__construct($logging, $settingsfile);

        parent::setServices([
            'http://www.domreg.lt/epp/xml/domreg-domain-1.1'  => 'domain',
            'http://www.domreg.lt/epp/xml/domreg-contact-1.1' => 'contact',
            'urn:ietf:params:xml:ns:host-1.0'                 => 'host',
        ]);

        parent::setXpathExtensions([
            'http://www.domreg.lt/epp/xml/domreg-domain-1.1'  => 'domain',
            'http://www.domreg.lt/epp/xml/domreg-contact-1.1' => 'contact',
            'urn:ietf:params:xml:ns:host-1.0'                 => 'host',
        ]);

        parent::useExtension('domreg-1.0');
    }
}
