<?php
namespace Databowl;
use Databowl\Actions\SubmitLeadAction;
use Databowl\Leads\Lead;

/**
 * Databowl Client
 *
 * @package Databowl
 */
class Client
{
    /**
     * Name of Databowl instance to use.
     *
     * @var string
     */
    private $instanceName;

    /**
     * Create instance of the Databowl Client
     *
     * @param string $instanceName
     */
    public function __construct($instanceName)
    {
        $this->instanceName = $instanceName;
    }

    /**
     * Submits a lead to Databowl
     *
     * @param Lead $lead
     * @return Lead
     */
    public function submitLead(Lead $lead)
    {
        $action = new SubmitLeadAction($lead);
        $action->setInstance($this->instanceName);

        return $action->execute();
    }
}