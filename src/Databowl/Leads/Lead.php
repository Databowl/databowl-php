<?php
namespace Databowl\Leads;
use Databowl\Leads\Data\DataCollection;

/**
 * Class Lead
 *
 * Represents a lead in Databowl
 *
 * @package Databowl\Leads
 */
class Lead
{
    /**
     * Lead ID, unique per instance.
     *
     * @var int
     */
    protected $leadId;
    /**
     * ID of the campaign the lead is for.
     *
     * @var int
     */
    protected $campaignId;
    /**
     * ID of the supplier providing the lead.
     *
     * @var int
     */
    protected $supplierId;
    /**
     * @var DataCollection
     */
    protected $data;
    /**
     * @var Result
     */
    protected $result;

    public function __construct($campaignId = null, $supplierId = null, $leadId = null, $data = null, $result = null)
    {
        $this->campaignId = $campaignId;
        $this->supplierId = $supplierId;
        $this->leadId = $leadId;
        $this->result = $result;

        if ($data) {
            $this->data = $data;
        } else {
            $this->data = new DataCollection();
        }
    }

    public function getLeadId()
    {
        return $this->leadId;
    }

    public function getCampaignId()
    {
        return $this->campaignId;
    }

    public function setCampaignId($campaignId)
    {
        $this->campaignId = $campaignId;
    }

    public function getSupplierId()
    {
        return $this->supplierId;
    }

    public function setSupplierId($supplierId)
    {
        $this->supplierId = $supplierId;
    }

    public function getData()
    {
        return $this->data;
    }

    public function getResult()
    {
        return $this->result;
    }
}