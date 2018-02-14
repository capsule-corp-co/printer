<?php
namespace CapsuleCorp\Printer;

use PrintNode;

class PrintNodeCapsule
{
    /**
     * store api key
     * **/
    private $api_key;
    /**
     * instantiate of Printnode class
     * */
    private $printnode_obj;
    /**
     * store the credentials
     * */
    private $printnode_credentials;
    /**
     * store the return of Printnode\Request
     * */
    private $printnode_request;

    public function __construct()
    {
        $this->api_key = config('capsulecorp-printer-config.api-key');
        $this->setCredentials();
        $this->setRequest();
    }
    /**
     * Get the computers
     * */
    public function getComputers()
    {
        return $this->getRequest()->getComputers();
    }
    /**
     * Get the printer
     * */
    public function getPrinters()
    {
        return $this->getRequest()->getPrinters();
    }
    /**
     * get the print jobs
     * */
    public function getPrintJobs()
    {
        return $this->getRequest()->getPrintJobs();
    }
    /**
     * post print jobs
     * @param    $arg    associative array
     * - pass the data to be print
     * - require keys and values:
     * array(
    'printer' => 'the printer return on getPrinters() by array key',
    'contentType' => 'pdf_base64',
    'content' => '(url/pdf directory)',
    'source' => ' dettlaffinc package laravel',
    'title' => ' dettlaffinc print title ',
     * )
     * @return    $this->getRequest()
     * -also it can return the following:
     *     // Returns the HTTP status code.
    ->getStatusCode();
     * // Returns the HTTP status message.
    ->getStatusMessage();
     * // Returns an array of HTTP headers.
    ->getHeaders();
     * // Return the response body.
    ->getContent();
     * */
    public function postPrintJob($arg = array())
    {
        $default_arg = array(
            'printer' => isset($arg['printer']) ? $arg['printer'] : '',
            'contentType' => 'pdf_base64',
            'content' => isset($arg['content']) ? base64_encode(file_get_contents($arg['content'])) : '',
            'source' => 'dettlaffinc package laravel',
            'title' => 'dettlaffinc print title',
        );
        $arg = array_merge($arg, $default_arg);

        $printJob = new PrintNode\PrintJob();
        $printJob->printer = $arg['printer'];
        $printJob->contentType = $arg['contentType'];
        $printJob->content = $arg['content'];
        $printJob->source = $arg['source'];
        $printJob->title = $arg['title'];

        return $this->getRequest()->post($printJob);
    }

    /**
     * set credentials
     * */
    public function setCredentials()
    {
        $credentials = new PrintNode\Credentials();
        $this->printnode_credentials = $credentials->setApiKey($this->api_key);
    }
    /**
     * get credentials
     * */
    public function getCredentials()
    {
        return $this->printnode_credentials;
    }
    /**
     * set request
     * */
    public function setRequest()
    {
        $this->printnode_request = new PrintNode\Request($this->getCredentials());
    }
    /**
     * get request
     * */
    public function getRequest()
    {
        return $this->printnode_request;
    }
}
