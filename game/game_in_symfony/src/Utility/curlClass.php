<?php

namespace Utility;

/**
 * This class contains all the functions of sabre GDS
 *
 * @author Dhiraj Bastwade
 */
class curlClass
{
    
    /**
     * This method will make a webservice call to API
     *
     * @author Dhiraj Bastwade <talktodhi@gmail.com>
     *
     * @filesource curlClass.php
     *
     * @return JSON Response from API
     */
    public function curlGetCall( $url ) 
    {
        
        try
            {
                $requestTime    = date('r');
                #CURL REQUEST PROCESS-START#
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, $url);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                $result = curl_exec($curl);
            }
        catch( Exception $e)
            {
                $strResponse = "";
                $strErrorCode = $e->getCode();
                $strErrorMessage = $e->getMessage();
                die('Connection Failure with API');
            }
        $responseArr    =   json_decode($result,true);
        return $responseArr;
    }
    
    /**
     * This method will make a webservice call for POSTing data to API
     *
     * @author Dhiraj Bastwade <talktodhi@gmail.com>
     *
     * @filesource curlClass.php
     *
     * @return JSON Response from API
     */
    public function curlPostCall( $url, $postData ) 
    {
       // prx($postData);
        $fields = array();
        foreach ($postData as $postKey => $postVal){
            $fields[$postKey]   =   urlencode($postVal);
        }
        //url-ify the data for the POST
        foreach($fields as $key=>$value) { 
            $fields_string .= $key.'='.$value.'&';
        }
        
        rtrim($fields_string, '&');

        try
            {
               // $requestTime    =   date('r');
                #CURL REQUEST PROCESS-START#
                $ch             =   curl_init();
                curl_setopt($ch,CURLOPT_URL, $url);
                //curl_setopt($ch,CURLOPT_POST, count($fields));
                curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                //execute post
                $result = curl_exec($ch);
                
                //close connection
                curl_close($ch);
            }
        catch( Exception $e)
            {
                $strResponse = "";
                $strErrorCode = $e->getCode();
                $strErrorMessage = $e->getMessage();
                die('Connection Failure with API');
            }
            
        $responseArr    =   json_decode($result, true);
        return $responseArr;
    }
    
    /**
     * This method will make a webservice call for PUT call to API
     *
     * @author Dhiraj Bastwade <talktodhi@gmail.com>
     *
     * @filesource curlClass.php
     *
     * @return JSON Response from API
     */
    public function curlPutCall( $url, $postData ) 
    {
       // prx($postData);
        $fields = array();
        foreach ($postData as $postKey => $postVal){
            $fields[$postKey]   =   urlencode($postVal);
        }
        //url-ify the data for the POST
        foreach($fields as $key=>$value) { 
            $fields_string .= $key.'='.$value.'&';
        }
        
        rtrim($fields_string, '&');

        try
            {
               // $requestTime    =   date('r');
                #CURL REQUEST PROCESS-START#
                $ch             =   curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                //execute post
                $result = curl_exec($ch);
                
                //close connection
                curl_close($ch);
            }
        catch( Exception $e)
            {
                $strResponse = "";
                $strErrorCode = $e->getCode();
                $strErrorMessage = $e->getMessage();
                die('Connection Failure with API');
            }
            
        $responseArr    =   json_decode($result, true);
        return $responseArr;
    }
    
}
