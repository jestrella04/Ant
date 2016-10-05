<?php
namespace Ant;

class Report
{
    private $reportType;
    private $reportData;
    private $projectId;
    private $offset;
    private $count;
    private $api;

    public function __construct($reportType, $projectId, $offset, $count)
    {
        $this->reportType = $reportType;
        $this->projectId = $projectId;
        $this->offset = $offset;
        $this->count = $count;
        $this->api = new Api();
    }

    public function getData()
    {
        switch ($this->reportType)
        {
            case 'issues':
                $this->getIssuesData();
                break;

            case 'projects':
                $this->getProjectsData();
                break;

            case 'activity':
                $this->getActivityData();
                break;

            default:
                $this->reportData = array();
                break;
        }

        return $this->reportData;
    }

    private function getIssuesData()
    {
        $params = array();
        $params['project_id'] = $this->projectId;
        $params['report_offset'] = $this->offset;
        $params['report_count'] = $this->count;

        $this->reportData = $this->api->executeApiCall('reportIssues', $params);
    }

    private function getProjectsData()
    {
        $params = array();

        $this->reportData = $this->api->executeApiCall('reportProjects', $params);
    }

    private function getActivityData()
    {
        $params = array();
        $params['report_offset'] = $this->offset;
        $params['report_count'] = $this->count;

        $this->reportData = $this->api->executeApiCall('reportActivity', $params);
    }
}
