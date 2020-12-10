<?php

include_once(dirname(__FILE__) . '/eppRequests/eppCreateOrganizationRequest.php');
include_once(dirname(__FILE__) . '/eppRequests/nicbrEppCreateDomainRequest.php');
include_once(dirname(__FILE__) . '/eppResponses/nicbrEppCreateDomainResponse.php');
include_once(dirname(__FILE__) . '/eppRequests/nicbrEppInfoDomainRequest.php');
include_once(dirname(__FILE__) . '/eppResponses/nicbrEppInfoDomainResponse.php');
include_once(dirname(__FILE__) . '/eppRequests/eppInfoOrganizationRequest.php');
include_once(dirname(__FILE__) . '/eppResponses/eppInfoOrganizationResponse.php');
include_once(dirname(__FILE__) . '/eppRequests/nicbrEppUpdateDomainRequest.php');
include_once(dirname(__FILE__) . '/eppRequests/nicbrEppPollRequest.php');
include_once(dirname(__FILE__) . '/eppResponses/nicbrEppPollResponse.php');

$this->addCommandResponse(\Metaregistrar\EPP\eppCreateOrganizationRequest::class, \Metaregistrar\EPP\eppCreateContactResponse::class);
$this->addCommandResponse(\Metaregistrar\EPP\nicbrEppCreateDomainRequest::class, \Metaregistrar\EPP\nicbrEppCreateDomainResponse::class);
$this->addCommandResponse(\Metaregistrar\EPP\nicbrEppInfoDomainRequest::class, \Metaregistrar\EPP\nicbrEppInfoDomainResponse::class);
$this->addCommandResponse(\Metaregistrar\EPP\eppInfoOrganizationRequest::class, \Metaregistrar\EPP\eppInfoOrganizationResponse::class);
$this->addCommandResponse(\Metaregistrar\EPP\nicbrEppUpdateDomainRequest::class, \Metaregistrar\EPP\eppUpdateDomainResponse::class);
$this->addCommandResponse(\Metaregistrar\EPP\nicbrEppPollRequest::class, \Metaregistrar\EPP\nicbrEppPollResponse::class);