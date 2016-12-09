<?php

namespace Utility;

use Utility\curlClass;

/**
 * Description of gameServiceClass
 *
 * @author dBastwade
 */
class gameServiceClass {
    
    public function __construct()
    {
        error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
        $this->apiURL = 'http://localhost';
    }
    
    /**
     * This method will be used to make CURL call to REST API (API: checkLogin)
     *
     * @author Dhiraj Bastwade <talktodhi@gmail.com>
     *
     * @return User data for requested user id.
     *
     */
    public function login($data)
    {
        $curlApiReq     =   new curlClass();
        $responseData   =   $curlApiReq->curlPostCall($this->apiURL.'/game/api/web/checkLogin',$data);
        return $responseData;
    }
    
    /**
     * This method will be used to make CURL call to REST API to get user profile (API: getProfile)
     *
     * @author Dhiraj Bastwade <talktodhi@gmail.com>
     *
     * @return User data for requested user id.
     *
     */
    public function getProfile($id)
    {
        $curlApiReq     =   new curlClass();
        $responseData   =   $curlApiReq->curlGetCall($this->apiURL.'/game/api/web/getProfile/'.$id);
        return $responseData;
    }
    
    /**
     * This method will be used to make CURL call to REST API (API: register) for user registration (API: register)
     *
     * @author Dhiraj Bastwade <talktodhi@gmail.com>
     *
     * @return Register user.
     *
     */
    public function register($data)
    {
        
        $curlApiReq     =   new curlClass();
        $responseData   =   $curlApiReq->curlPostCall($this->apiURL.'/game/api/web/register',$data);
        
        return $responseData;
    }
    

    /**
     * This method will be used to make CURL call to REST API (API: createAttack) for creating attack for user (API: createAttack)
     *
     * @author Dhiraj Bastwade <talktodhi@gmail.com>
     *
     * @return Success or Failure
     *
     */
    public function insertAttack($data)
    {
        
        $curlApiReq     =   new curlClass();
        $responseData   =   $curlApiReq->curlPostCall($this->apiURL.'/game/api/web/createAttack',$data);
        
        return $responseData;
    }
    
    /**
     * This method will be used to make CURL call to REST API for getting all different attack data (API: getAllAttack)
     *
     * @author Dhiraj Bastwade <talktodhi@gmail.com>
     *
     * @return Array of all attacks.
     *
     */
    public function getAllAttacks()
    {
        
        $curlApiReq     =   new curlClass();
        $responseData   =   $curlApiReq->curlGetCall($this->apiURL.'/game/api/web/getAllAttack');
        
        return $responseData;
    }
    
    /**
     * This method will be used to make CURL call to REST API for creating monster for user (API: createMonster)
     *
     * @author Dhiraj Bastwade <talktodhi@gmail.com>
     *
     * @return Success or Failure
     *
     */
    public function insertMonster($data)
    {
        
        $curlApiReq     =   new curlClass();
        $responseData   =   $curlApiReq->curlPostCall($this->apiURL.'/game/api/web/createMonster',$data);
        
        return $responseData;
    }
    
    /**
     * This method will be used to make CURL call to REST API for getting all monster data (API: getAllMonster)
     *
     * @author Dhiraj Bastwade <talktodhi@gmail.com>
     *
     * @return Array of all monsters.
     *
     */
    public function getAllMonsters()
    {
        
        $curlApiReq     =   new curlClass();
        $responseData   =   $curlApiReq->curlGetCall($this->apiURL.'/game/api/web/getAllMonster');
        
        return $responseData;
    }
    
    /**
     * This method will be used to make CURL call to REST API for creating monster for user (API: getMonster)
     *
     * @author Dhiraj Bastwade <talktodhi@gmail.com>
     *
     * @return Array of Monster
     *
     */
    public function getMonsterByID($id)
    {
        
        $curlApiReq     =   new curlClass();
        $responseData   =   $curlApiReq->curlGetCall($this->apiURL.'/game/api/web/getMonster/'.$id);
        
        return $responseData;
    }
    
    /**
     * This method will be used to make CURL call to REST API (API: createMonster) for getting all attacks that are not been selected by user. (API: getUserNotSelectedAttack)
     *
     * @author Dhiraj Bastwade <talktodhi@gmail.com>
     *
     * @param integer $id ID of the user whose data needs to be pulled.
     * 
     * @return Array of attackes that are not selected.
     *
     */
    public function getUserNotSelectedAttacks($id)
    {
        
        $curlApiReq     =   new curlClass();
        $responseData   =   $curlApiReq->curlGetCall($this->apiURL.'/game/api/web/getUserNotSelectedAttack/'.$id);
        
        return $responseData;
    }
    
    /**
     * This method will be used to make CURL call to REST API (API: createMonster) for getting all attacks that are selected by user. (API: getUserSelectedAttack)
     *
     * @author Dhiraj Bastwade <talktodhi@gmail.com>
     *
     * @param integer $id ID of the user whose data needs to be pulled.
     * 
     * @return Array of attacks that are selected.
     *
     */
    public function getUserSelectedAttacks($id)
    {
        
        $curlApiReq     =   new curlClass();
        $responseData   =   $curlApiReq->curlGetCall($this->apiURL.'/game/api/web/getUserSelectedAttack/'.$id);
        
        return $responseData;
    }
    
    /**
     * This method will be used to make CURL call to REST API (API: createMonster) buy in attack for the user. (API: buyAttack)
     *
     * @author Dhiraj Bastwade <talktodhi@gmail.com>
     * 
     * @return Array of attacks that are not selected.
     *
     */
    public function buyAttack($data)
    {
        
        $curlApiReq     =   new curlClass();
        $responseData   =   $curlApiReq->curlPostCall($this->apiURL.'/game/api/web/buyAttack',$data);
        
        return $responseData;
    }
    
    /**
     * This method will be used to make CURL call to REST API for updating user profile. (API: updateProfile)
     *
     * @author Dhiraj Bastwade <talktodhi@gmail.com>
     *
     * @param integer $id ID of the user whose data needs to be pulled.
     * 
     * @return Array of attacks that are not selected.
     *
     */
    public function updateProfile($data)
    {
        $curlApiReq     =   new curlClass();
        $responseData   =   $curlApiReq->curlPutCall($this->apiURL.'/game/api/web/updateProfile',$data);
        
        return $responseData;
    }
    
    /**
     * This method will be used to make CURL call to REST API  for getting all healings data. (API: getAllHealings)
     *
     * @author Dhiraj Bastwade <talktodhi@gmail.com>
     * 
     * @return Array of healings.
     *
     */
    public function getAllHealings()
    {
        
        $curlApiReq     =   new curlClass();
        $responseData   =   $curlApiReq->curlGetCall($this->apiURL.'/game/api/web/getAllHealings');
        
        return $responseData;
    }
    
    /**
     * This method will be used to make CURL call to REST API  for buying all healings data for the user. (API: buyHealth)
     *
     * @author Dhiraj Bastwade <talktodhi@gmail.com>
     * 
     * @return Array of healings.
     *
     */
    public function buyHealth($data)
    {
        
        $curlApiReq     =   new curlClass();
        $responseData   =   $curlApiReq->curlPutCall($this->apiURL.'/game/api/web/buyHealth',$data);
        
        return $responseData;
    }
}
