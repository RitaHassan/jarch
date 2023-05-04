<?php

namespace App\Classes;

// credit https://gist.github.com/dfreerksen/3380322
class Http
{
    protected $method = 'GET';
    protected $methods = ['POST', 'GET', 'PUT', 'PATCH', 'DELETE'];
    protected $url = '';
    protected $params = [];
    protected $options = [];
    protected $user_agent = 'MyTableAgent/1.0';

    public function __construct($method, $url, $params, $options)
    {
        // Set request method
        if ($method) {
            $this->method = $method;
        }

        // Explode the URL to get the URL params
        $url_split = explode('?', $url);

        // Request URL is everything before the ? (if it exists)
        $this->url = $url_split[0];

        // If there were URL params, add it to the params array
        $this->params = array_merge($this->params, $this->parseQueryString($url), (array) $params);

        // Set the passed options
        $this->options = $options;
    }

    /**
     * request
     *
     * @param   string  $method
     * @param   string  $url
     * @param   array   $params
     * @param   array   $options (curl_options, params, headers)
     * @return  mixed
     */
    public static function request($method, $url, $params = [], $options = ['curl_options' => [], 'headers' => []])
    {
        return new self($method, $url, $params, $options);
    }

    /**
     * Execute request
     *
     * @param   string  $method
     * @return  Curl
     */
    private function execute($method)
    {
        // Method specific options
        switch ($method) {
            case 'GET':
                // Append GET params to URL
                $this->url .= '?' . http_build_query($this->params);

                // Set options
                $this->options['curl_options'][CURLOPT_HTTPGET] = 1;
                $this->options['curl_options'][CURLOPT_HTTPHEADER] = $this->options['headers'];
                break;

            case 'POST':
                // Set options
                $this->options['curl_options'][CURLOPT_POST] = true;
                $this->options['curl_options'][CURLOPT_HTTPHEADER] = $this->options['headers'];
                if (in_array('Content-Type: application/x-www-form-urlencoded', $this->options['headers'])) {
                    $this->options['curl_options'][CURLOPT_POSTFIELDS] = http_build_query($this->params);
                } else if (in_array('Content-Type: application/json', $this->options['headers'])) {
                    $this->options['curl_options'][CURLOPT_POSTFIELDS] = json_encode($this->params);
                } else {
                    $this->options['curl_options'][CURLOPT_POSTFIELDS] = $this->params;
                }
              
                break;

            case 'PUT':
                // Set options
                $this->options['curl_options'][CURLOPT_PUT] = true;
                $this->options['curl_options'][CURLOPT_HTTPHEADER] = $this->options['headers'];
                if (in_array('Content-Type: application/x-www-form-urlencoded', $this->options['headers'])) {
                    $this->options['curl_options'][CURLOPT_POSTFIELDS] = http_build_query($this->params);
                } else if (in_array('Content-Type: application/json', $this->options['headers'])) {
                    $this->options['curl_options'][CURLOPT_POSTFIELDS] = json_encode($this->params);
                } else {
                    $this->options['curl_options'][CURLOPT_POSTFIELDS] = $this->params;
                }
                break;

            case 'PATCH':
                // Set options
                $this->options['curl_options'][CURLOPT_CUSTOMREQUEST] = "PATCH";
                $this->options['curl_options'][CURLOPT_HTTPHEADER] = $this->options['headers'];
                if (in_array('Content-Type: application/x-www-form-urlencoded', $this->options['headers'])) {
                    $this->options['curl_options'][CURLOPT_POSTFIELDS] = http_build_query($this->params);
                } else if (in_array('Content-Type: application/json', $this->options['headers'])) {
                    $this->options['curl_options'][CURLOPT_POSTFIELDS] = json_encode($this->params);
                } else {
                    $this->options['curl_options'][CURLOPT_POSTFIELDS] = $this->params;
                }
                break;

            case 'DELETE':
                // Set options
                $this->options['curl_options'][CURLOPT_CUSTOMREQUEST] = "DELETE";
                $this->options['curl_options'][CURLOPT_HTTPHEADER] = $this->options['headers'];
                $this->options['curl_options'][CURLOPT_POSTFIELDS] = $this->params;
                break;
        }

        // Set timeout option if it isn't already set
        if (!array_key_exists('CURLOPT_TIMEOUT', $this->options['curl_options'])) {
            $this->options['curl_options'][CURLOPT_TIMEOUT] = 30;
        }

        // Set returntransfer option if it isn't already set
        if (!array_key_exists('CURLOPT_RETURNTRANSFER', $this->options['curl_options'])) {
            $this->options['curl_options'][CURLOPT_RETURNTRANSFER] = true;
        }

        // Set failonerror option if it isn't already set
        if (!array_key_exists('CURLOPT_FAILONERROR', $this->options['curl_options'])) {
            $this->options['curl_options'][CURLOPT_FAILONERROR] = true;
        }

        // Set user agent option if it isn't already set
        if (!array_key_exists('CURLOPT_USERAGENT', $this->options['curl_options'])) {
            $this->options['curl_options'][CURLOPT_USERAGENT] = $this->user_agent;
        }

        // Only set follow location if not running securely
        if (!ini_get('safe_mode') && !ini_get('open_basedir')) {
            // Ok, follow location is not set already so lets set it to true
            if (!array_key_exists('CURLOPT_FOLLOWLOCATION', $this->options['curl_options'])) {
                $this->options['curl_options'][CURLOPT_FOLLOWLOCATION] = true;
            }
        }

        // only for debug
        /* $this->options['curl_options'][CURLOPT_VERBOSE] = true; */

        // Initialize cURL request
        $ch = curl_init($this->url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); //seuet tr
        // Can't set the options in batch
        if (!function_exists('curl_setopt_array')) {
            foreach ($this->options['curl_options'] as $key => $value) {
                curl_setopt($ch, $key, $value);
            }
        }

        // Set options in batch
        else {
           unset($this->options['curl_options'][45]); //to display full error
            curl_setopt_array($ch, $this->options['curl_options']);
        }

        // Execute
        $response = new \stdClass();
        $response->result = json_decode(curl_exec($ch));
        $response->info = curl_getinfo($ch);
        $response->error = curl_error($ch);
        $response->error_code = curl_errno($ch);

        // Reset the options

        $this->url = '';
        $this->params = '';
        $this->options = [];

        // Close cURL request
        curl_close($ch);

        return $response;
    }

    /**
     * Check if cURL is enabled
     *
     * @return  bool
     */
    protected function isEnabled()
    {
        return function_exists('curl_init');
    }

    public function call()
    {
        // cURL is not enabled
        if (!$this->isEnabled()) {
            throw new Exception(__CLASS__ . ': PHP was not built with cURL enabled. Rebuild PHP with --with-curl to use cURL.');
        }

        // Request method
        $method = $this->method ? strtoupper($this->method) : 'GET';

        // Unrecognized request method?
        if (!in_array($method, $this->methods)) {
            throw new Exception(__CLASS__ . ': Unrecognized request method of ' . $this->method);
        }

        return $this->execute($method);
    }

    /**
     * Get query string from URL
     *
     * @param   $uri
     * @return  array
     */
    protected function parseQueryString($uri)
    {
        $query_data = [];

        $query_array = html_entity_decode(parse_url($uri, PHP_URL_QUERY));

        if (!empty($query_array)) {
            $query_array = explode('&', $query_array);

            foreach ($query_array as $val) {
                $x = explode('=', $val);

                $query_data[$x[0]] = $x[1];
            }
        }

        return $query_data;
    }
}
