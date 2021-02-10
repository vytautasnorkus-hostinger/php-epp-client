<?php

include_once(dirname(__FILE__) . '/eppRequests/domregEppInfoDomainRequest.php');
include_once(dirname(__FILE__) . '/eppResponses/domregEppInfoDomainResponse.php');

include_once(dirname(__FILE__) . '/eppRequests/domregEppInfoContactRequest.php');
include_once(dirname(__FILE__) . '/eppResponses/domregEppInfoContactResponse.php');

include_once(dirname(__FILE__) . '/eppRequests/domregEppCreateContactRequest.php');
include_once(dirname(__FILE__) . '/eppRequests/domregEppUpdateContactRequest.php');
include_once(dirname(__FILE__) . '/eppRequests/domregEppTransferRequest.php');

$this->addCommandResponse(\Metaregistrar\EPP\domregEppInfoDomainRequest::class, \Metaregistrar\EPP\domregEppInfoDomainResponse::class);

$this->addCommandResponse(\Metaregistrar\EPP\domregEppInfoContactRequest::class, \Metaregistrar\EPP\domregEppInfoContactResponse::class);

$this->addCommandResponse(\Metaregistrar\EPP\domregEppCreateContactRequest::class, \Metaregistrar\EPP\eppCreateContactResponse::class);
$this->addCommandResponse(\Metaregistrar\EPP\domregEppUpdateContactRequest::class, \Metaregistrar\EPP\eppUpdateContactResponse::class);
$this->addCommandResponse(\Metaregistrar\EPP\domregEppTransferRequest::class, \Metaregistrar\EPP\eppTransferResponse::class);
