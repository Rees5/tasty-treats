<?php
/**
 * NOTE: This class is auto generated by the swagger code generator program. 
 * https://github.com/swagger-api/swagger-codegen 
 * Do not edit the class manually.
 */

namespace SquareConnect\Api;

use \SquareConnect\Configuration;
use \SquareConnect\ApiClient;
use \SquareConnect\ApiException;
use \SquareConnect\ObjectSerializer;

/**
 * EmployeesApi Class Doc Comment
 *
 * @category Class
 * @package  SquareConnect
 * @author   Square Inc.
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link     https://squareup.com/developers
 */
class EmployeesApi
{

    /**
     * API Client
     * @var \SquareConnect\ApiClient instance of the ApiClient
     */
    protected $apiClient;
  
    /**
     * Constructor
     * @param \SquareConnect\ApiClient|null $apiClient The api client to use
     */
    function __construct($apiClient = null)
    {
        if ($apiClient == null) {
            $apiClient = new ApiClient();
            $apiClient->getConfig()->setHost('https://connect.squareup.com');
        }
  
        $this->apiClient = $apiClient;
    }
  
    /**
     * Get API client
     * @return \SquareConnect\ApiClient get the API client
     */
    public function getApiClient()
    {
        return $this->apiClient;
    }
  
    /**
     * Set the API client
     * @param \SquareConnect\ApiClient $apiClient set the API client
     * @return EmployeesApi
     */
    public function setApiClient(ApiClient $apiClient)
    {
        $this->apiClient = $apiClient;
        return $this;
    }
  
    /**
     * listEmployees
     *
     * ListEmployees
     *
     * @param string $location_id Filter employees returned to only those that are associated with the specified location. (optional)
     * @param string $status Specifies the EmployeeStatus to filter the employee by. (optional)
     * @param int $limit The number of employees to be returned on each page. (optional)
     * @param string $cursor The token required to retrieve the specified page of results. (optional)
     * @return \SquareConnect\Model\ListEmployeesResponse
     * @throws \SquareConnect\ApiException on non-2xx response
     */
    public function listEmployees($location_id = null, $status = null, $limit = null, $cursor = null)
    {
        list($response, $statusCode, $httpHeader) = $this->listEmployeesWithHttpInfo ($location_id, $status, $limit, $cursor);
        return $response; 
    }


    /**
     * listEmployeesWithHttpInfo
     *
     * ListEmployees
     *
     * @param string $location_id Filter employees returned to only those that are associated with the specified location. (optional)
     * @param string $status Specifies the EmployeeStatus to filter the employee by. (optional)
     * @param int $limit The number of employees to be returned on each page. (optional)
     * @param string $cursor The token required to retrieve the specified page of results. (optional)
     * @return Array of \SquareConnect\Model\ListEmployeesResponse, HTTP status code, HTTP response headers (array of strings)
     * @throws \SquareConnect\ApiException on non-2xx response
     */
    public function listEmployeesWithHttpInfo($location_id = null, $status = null, $limit = null, $cursor = null)
    {
        
  
        // parse inputs
        $resourcePath = "/v2/employees";
        $httpBody = '';
        $queryParams = array();
        $headerParams = array();
        $formParams = array();
        $_header_accept = ApiClient::selectHeaderAccept(array('application/json'));
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = ApiClient::selectHeaderContentType(array('application/json'));
        $headerParams['Square-Version'] = "2020-05-28";

        // query params
        if ($location_id !== null) {
            $queryParams['location_id'] = $this->apiClient->getSerializer()->toQueryValue($location_id);
        }// query params
        if ($status !== null) {
            $queryParams['status'] = $this->apiClient->getSerializer()->toQueryValue($status);
        }// query params
        if ($limit !== null) {
            $queryParams['limit'] = $this->apiClient->getSerializer()->toQueryValue($limit);
        }// query params
        if ($cursor !== null) {
            $queryParams['cursor'] = $this->apiClient->getSerializer()->toQueryValue($cursor);
        }
        
        
        // default format to json
        $resourcePath = str_replace("{format}", "json", $resourcePath);

        
        
  
        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        
        // this endpoint requires OAuth (access token)
        if (strlen($this->apiClient->getConfig()->getAccessToken()) !== 0) {
            $headerParams['Authorization'] = 'Bearer ' . $this->apiClient->getConfig()->getAccessToken();
        }
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath, 'GET',
                $queryParams, $httpBody,
                $headerParams, '\SquareConnect\Model\ListEmployeesResponse'
            );
            if (!$response) {
                return array(null, $statusCode, $httpHeader);
            }

            return array(\SquareConnect\ObjectSerializer::deserialize($response, '\SquareConnect\Model\ListEmployeesResponse', $httpHeader), $statusCode, $httpHeader);
                    } catch (ApiException $e) {
            switch ($e->getCode()) { 
            case 200:
                $data = \SquareConnect\ObjectSerializer::deserialize($e->getResponseBody(), '\SquareConnect\Model\ListEmployeesResponse', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            }
  
            throw $e;
        }
    }
    /**
     * retrieveEmployee
     *
     * RetrieveEmployee
     *
     * @param string $id UUID for the employee that was requested. (required)
     * @return \SquareConnect\Model\RetrieveEmployeeResponse
     * @throws \SquareConnect\ApiException on non-2xx response
     */
    public function retrieveEmployee($id)
    {
        list($response, $statusCode, $httpHeader) = $this->retrieveEmployeeWithHttpInfo ($id);
        return $response; 
    }


    /**
     * retrieveEmployeeWithHttpInfo
     *
     * RetrieveEmployee
     *
     * @param string $id UUID for the employee that was requested. (required)
     * @return Array of \SquareConnect\Model\RetrieveEmployeeResponse, HTTP status code, HTTP response headers (array of strings)
     * @throws \SquareConnect\ApiException on non-2xx response
     */
    public function retrieveEmployeeWithHttpInfo($id)
    {
        
        // verify the required parameter 'id' is set
        if ($id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $id when calling retrieveEmployee');
        }
  
        // parse inputs
        $resourcePath = "/v2/employees/{id}";
        $httpBody = '';
        $queryParams = array();
        $headerParams = array();
        $formParams = array();
        $_header_accept = ApiClient::selectHeaderAccept(array('application/json'));
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = ApiClient::selectHeaderContentType(array('application/json'));
        $headerParams['Square-Version'] = "2020-05-28";

        
        
        // path params
        if ($id !== null) {
            $resourcePath = str_replace(
                "{" . "id" . "}",
                $this->apiClient->getSerializer()->toPathValue($id),
                $resourcePath
            );
        }
        // default format to json
        $resourcePath = str_replace("{format}", "json", $resourcePath);

        
        
  
        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        
        // this endpoint requires OAuth (access token)
        if (strlen($this->apiClient->getConfig()->getAccessToken()) !== 0) {
            $headerParams['Authorization'] = 'Bearer ' . $this->apiClient->getConfig()->getAccessToken();
        }
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath, 'GET',
                $queryParams, $httpBody,
                $headerParams, '\SquareConnect\Model\RetrieveEmployeeResponse'
            );
            if (!$response) {
                return array(null, $statusCode, $httpHeader);
            }

            return array(\SquareConnect\ObjectSerializer::deserialize($response, '\SquareConnect\Model\RetrieveEmployeeResponse', $httpHeader), $statusCode, $httpHeader);
                    } catch (ApiException $e) {
            switch ($e->getCode()) { 
            case 200:
                $data = \SquareConnect\ObjectSerializer::deserialize($e->getResponseBody(), '\SquareConnect\Model\RetrieveEmployeeResponse', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            }
  
            throw $e;
        }
    }
}
