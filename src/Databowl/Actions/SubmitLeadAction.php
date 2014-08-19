<?php
namespace Databowl\Actions;

use Databowl\Leads\Lead;
use Databowl\Leads\Result;

class SubmitLeadAction extends AbstractAction
{
    /**
     * @var \Databowl\Leads\Lead
     */
    protected $lead;

    public function __construct(Lead $lead)
    {
        $this->lead = $lead;
    }

    /**
     * @return Lead
     */
    public function execute()
    {
        $response = $this->doRequest();

        $errorMessage = "";

        if (isset($response['error'])) {
            $errorMessage = $response['error']['msg'];
        }

        $result = new Result($response['result'], $errorMessage);

        $newLead = new Lead(
            $this->lead->getCampaignId(),
            $this->lead->getSupplierId(),
            $response['lead_id'],
            $this->lead->getData(),
            $result
        );

        return $newLead;
    }

    /**
     * @return array
     */
    private function doRequest()
    {
        $leadData = $this->lead->getData()->getArrayCopy();

        $metadata = [
            'cid' => $this->lead->getCampaignId(),
            'sid' => $this->lead->getSupplierId()
        ];

        $payload = array_merge($leadData, $metadata);

        $response = $this->submitPayload('api/v1/lead', $payload)->json();

        return $response;
    }
}