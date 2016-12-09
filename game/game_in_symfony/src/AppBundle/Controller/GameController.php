<?php
// src/AppBundle/Controller/GameController.php 
namespace AppBundle\Controller;

/* *
 * This script has been developed for testing purpose.
 * This app has been developed using symfony 3 framework. 
 */
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Commonfiles\Utils\SabreServicesClass;
use Utility\gameServiceClass;
use Symfony\Component\HttpFoundation\Session\Session;


/**
 * Here goes the description of the class. It should explain what the main
 * purpose of this class is... Main Purpose of GameController is to generate
 * lucky number.
 */
class GameController extends Controller
{
     
    /**
     * This method will be used for showing login form
     *
     * @author Dhiraj Bastwade <talktodhi@gmail.com>
     *
     * @return Login Form in html
     * 
     * @filesource GameController.php
     *
     * @Route("/wargame", name="wargame_login")
     */
    public function loginAction( Request $request )
    {   
        return $this->render('game/index.html.twig',  array('showMenu'=>'0'));
    }
    
    
    /**
     * This method will be used for showing register form
     *
     * @author Dhiraj Bastwade <talktodhi@gmail.com>
     *
     * @return Registration Form in html
     * 
     * @filesource GameController.php
     *
     * @Route("/wargame/register", name="wargame_register")
     */
    public function registerAction( Request $request )
    {
        $sessionTemp            =   $request->getSession();      
        $profile_idTemp         =   $sessionTemp->get('id');
        if(!isset($profile_idTemp)){
            $userData['error']  =   'Please Login Again.';
            return $this->render('game/index.html.twig',array('userData'=>$userData,'showMenu'=>'0'));
        }
        $session = $request->getSession();
        $session->remove('id');
        return $this->render('game/register.html.twig',  array('showMenu'=>'0'));
    }
    
    
    /**
     * This method will be used for showing register form
     *
     * @author Dhiraj Bastwade <talktodhi@gmail.com>
     *
     * @return Registration Form in html
     * 
     * @filesource GameController.php
     *
     * @Route("/wargame/registerDo", name="wargame_do_register")
     */
    public function registerDoAction( Request $request )
    {
        $sessionTemp            =   $request->getSession();      
        $profile_idTemp         =   $sessionTemp->get('id');
        if(!isset($profile_idTemp)){
            $userData['error']  =   'Please Login Again.';
            return $this->render('game/index.html.twig',array('userData'=>$userData,'showMenu'=>'0'));
        }
        $gameService        =   new gameServiceClass();
        
        $data               =   array();
        $data['username']   =   trim($request->get('username'));
        $data['password']   =   trim($request->get('password'));
        
        $userData           =   $gameService->register($data);
        
        return $this->render('game/register.html.twig',  array('showMenu'=>'0'));
    }
    
    /**
     * This method will be used for showing login form
     *
     * @author Dhiraj Bastwade <talktodhi@gmail.com>
     *
     * @return Login Form in html
     * 
     * @filesource GameController.php
     *
     * @Route("/wargame/login", name="wargame_do_login")
     */
    public function doLoginAction( Request $request )
    {
        
        $gameService        =   new gameServiceClass();
        
        $data               =   array();
        $data['username']   =   trim($request->get('username'));
        $data['password']   =   trim($request->get('password'));
        
        $userData           =   $gameService->login($data);
        
        if(!isset($userData['error'])){
            $session = $request->getSession();
            $session->set('id', $userData['id']);
            $session->set('profile_data',$userData);
            return $this->redirect($this->generateUrl('wargame_profile'));
        }else{
            return $this->render('game/index.html.twig', array('userData'=>$userData,'showMenu'=>'1'));
        }
        
    }
    
    /**
     * This method will be used for show profile data page in html
     *
     * @author Dhiraj Bastwade <talktodhi@gmail.com>
     *
     * @return Profile Page in HTML
     * 
     * @filesource GameController.php
     *
     * @Route("/wargame/profile", name="wargame_profile")
     */
    public function profileAction( Request $request )
    {
        $sessionTemp            =   $request->getSession();      
        $profile_idTemp         =   $sessionTemp->get('id');
        if(!isset($profile_idTemp)){
            $userData['error']  =   'Please Login Again.';
            return $this->render('game/index.html.twig',array('userData'=>$userData,'showMenu'=>'0'));
        }
        $gameService        =   new gameServiceClass();
        $session            =   $request->getSession();
        
        $profile_id         =   $session->get('id');
        $userData           =   $gameService->getProfile($profile_id);
        
        $attackData         =   $gameService->getUserSelectedAttacks($profile_id);
        
        return $this->render('game/profile.html.twig', array('userData'=>$userData,'attacks'=>$attackData,'showMenu'=>'1'));
        
    }
    
    /**
     * This method will be used for create character of monster. Form will be showed in html.
     *
     * @author Dhiraj Bastwade <talktodhi@gmail.com>
     *
     * @return Monster Creation Page in HTML
     * 
     * @filesource GameController.php
     *
     * @Route("/wargame/createMonster", name="wargame_createMonster")
     */
    public function createMonsterAction( Request $request )
    {
        $sessionTemp            =   $request->getSession();      
        $profile_idTemp         =   $sessionTemp->get('id');
        if(!isset($profile_idTemp)){
            $userData['error']  =   'Please Login Again.';
            return $this->render('game/index.html.twig',array('userData'=>$userData,'showMenu'=>'0'));
        }
        $gameService        =   new gameServiceClass();
        $session            =   $request->getSession();
        
        $profile_id         =   $session->get('id');
        //$userData           =   $gameService->getProfile($profile_id);
        return $this->render('game/createMonster.html.twig', array('showMenu'=>'1'));
        
    }
    
    /**
     * This method will be used for create types of attacks. Form will be showed in html.
     *
     * @author Dhiraj Bastwade <talktodhi@gmail.com>
     *
     * @return Attack Creation Page in HTML
     * 
     * @filesource GameController.php
     *
     * @Route("/wargame/createAttack", name="wargame_createAttack")
     */
    public function createAttackAction( Request $request )
    {
        $sessionTemp            =   $request->getSession();      
        $profile_idTemp         =   $sessionTemp->get('id');
        if(!isset($profile_idTemp)){
            $userData['error']  =   'Please Login Again.';
            return $this->render('game/index.html.twig',array('userData'=>$userData,'showMenu'=>'0'));
        }
        $gameService        =   new gameServiceClass();
        $session            =   $request->getSession();
        
        $profile_id         =   $session->get('id');
        //$userData           =   $gameService->getProfile($profile_id);
        return $this->render('game/createAttack.html.twig', array('showMenu'=>'1'));
        
    }
    
    /**
     * This method will be used for create types of attacks. Insert attacj data will be inserted.
     *
     * @author Dhiraj Bastwade <talktodhi@gmail.com>
     *
     * @return Success or Failure message will be displayed.
     * 
     * @filesource GameController.php
     *
     * @Route("/wargame/insertAttack", name="wargame_insertAttack")
     */
    public function insertAttackAction( Request $request )
    {
        $sessionTemp            =   $request->getSession();      
        $profile_idTemp         =   $sessionTemp->get('id');
        if(!isset($profile_idTemp)){
            $userData['error']  =   'Please Login Again.';
            return $this->render('game/index.html.twig',array('userData'=>$userData,'showMenu'=>'0'));
        }
        $gameService        =   new gameServiceClass();
        $session            =   $request->getSession();
        
        $profile_id         =   $session->get('id');
        
        $data               =   array();
        $data['name']           =   trim($request->get('name'));
        $data['combat_text']    =   trim($request->get('combat_text'));
        $data['type']           =   trim($request->get('type'));
        $data['power']          =   trim($request->get('power'));
        $data['purchase_cost']  =   trim($request->get('purchase_cost'));
        
        $insertAttack           =   $gameService->insertAttack($data);
        if(isset($insertAttack['error'])){
            echo 'error'.'--'.$insertAttack['error'];
        }
        
        if(isset($insertAttack['id'])){
            echo 'id'.'--'.$insertAttack['id'];
        }
        exit;
    }
    
    /**
     * This method will be used to add character of monster.
     *
     * @author Dhiraj Bastwade <talktodhi@gmail.com>
     *
     * @return Character monster wil be added.
     * 
     * @filesource GameController.php
     *
     * @Route("/wargame/insertMonster", name="wargame_insertMonster")
     */
    public function insterMonsterAction( Request $request )
    {
        $sessionTemp            =   $request->getSession();      
        $profile_idTemp         =   $sessionTemp->get('id');
        if(!isset($profile_idTemp)){
            $userData['error']  =   'Please Login Again.';
            return $this->render('game/index.html.twig',array('userData'=>$userData,'showMenu'=>'0'));
        }
        $gameService        =   new gameServiceClass();
        $session            = $request->getSession();
        
        $profile_id         =   $session->get('id');
        
        $data                   =   array();
        $data['name']           =   trim($request->get('name'));
        $data['level']          =   trim($request->get('level'));
        $data['max_health']     =   trim($request->get('max_health'));
        $data['strength']       =   trim($request->get('strength'));
        $data['intelligence']   =   trim($request->get('intelligence'));
        $data['endurance']      =   trim($request->get('endurance'));
        $attacks                =   json_encode($request->get('attacks'));
        $data['attacks']        =   $attacks;
        
        $insertMonster          =   $gameService->insertMonster($data);
        if(isset($insertMonster['error'])){
            echo 'error'.'--'.$insertMonster['error'];
        }
        
        if(isset($insertMonster['id'])){
            echo 'id'.'--'.$insertMonster['id'];
        }
        exit;
        
    }
    
    
    /**
     * This method will be used for user to logout
     *
     * @author Dhiraj Bastwade <talktodhi@gmail.com>
     *
     * @return login page will be showed again.
     * 
     * @filesource GameController.php
     *
     * @Route("/wargame/logout", name="wargame_do_logout")
     */
    public function logoutAction( Request $request )
    {
        $session = $request->getSession();
        $session->remove('id');
        $session->remove('monster_id');
        $session->remove('monster_health');
        $session->remove('profile_data');
        $userData['error']  =   'Logged out successfully';
        return $this->render('game/index.html.twig',array('userData'=>$userData,'showMenu'=>'0'));
        
    }
    
    /**
     * This method will be used for shopping more life for the user if user runs out of life.
     *
     * @author Dhiraj Bastwade <talktodhi@gmail.com>
     *
     * @return Profile Page in HTML
     * 
     * @filesource GameController.php
     *
     * @Route("/wargame/healingShop", name="wargame_healingShop")
     */
    public function healingShopAction( Request $request )
    {
        $sessionTemp            =   $request->getSession();      
        $profile_idTemp         =   $sessionTemp->get('id');
        if(!isset($profile_idTemp)){
            $userData['error']  =   'Please Login Again.';
            return $this->render('game/index.html.twig',array('userData'=>$userData,'showMenu'=>'0'));
        }
        
        $gameService        =   new gameServiceClass();
        $healingList        =   $gameService->getAllHealings();
        
        return $this->render('game/healingShop.html.twig', array('healing'=>$healingList,'showMenu'=>'1'));
        
    }
    
    
    /**
     * This method will be used for shopping more health for the user if user runs out of life.
     *
     * @author Dhiraj Bastwade <talktodhi@gmail.com>
     *
     * @return Profile Page in HTML
     * 
     * @filesource GameController.php
     *
     * @Route("/wargame/buyHealth", name="wargame_buyHealth")
     */
    public function buyHealthAction( Request $request )
    {
        $sessionTemp            =   $request->getSession();      
        $profile_idTemp         =   $sessionTemp->get('id');
        if(!isset($profile_idTemp)){
            $userData['error']  =   'Please Login Again.';
            return $this->render('game/index.html.twig',array('userData'=>$userData,'showMenu'=>'0'));
        }
        
        $gameService        =   new gameServiceClass();
        $session            =   $request->getSession();

        $profile_id         =   $session->get('id');
        $data['id']         =   trim($profile_id);
        $data['cost']       =   trim($request->get('cost'));
        $data['health']     =   trim($request->get('health'));
        
        $healingBuy        =   $gameService->buyHealth($data);
        
        if(isset($healingBuy['error'])){
            echo 'error'.'--'.$healingBuy['error'];
        }
        
        if(isset($healingBuy['success'])){
            echo 'success'.'--'.$healingBuy['success'];
        }
        exit;
    }
    
    /**
     * This method will be used for show profile data page in html
     *
     * @author Dhiraj Bastwade <talktodhi@gmail.com>
     *
     * @return Profile Page in HTML
     * 
     * @filesource GameController.php
     *
     * @Route("/wargame/attackShop", name="wargame_attackShop")
     */
    public function attackShopAction( Request $request )
    {
        $sessionTemp            =   $request->getSession();      
        $profile_idTemp         =   $sessionTemp->get('id');
        if(!isset($profile_idTemp)){
            $userData['error']  =   'Please Login Again.';
            return $this->render('game/index.html.twig',array('userData'=>$userData,'showMenu'=>'0'));
        }
        
        $gameService        =   new gameServiceClass();
        $session            =   $request->getSession();
        $profile_id         =   $session->get('id');
        $attackData         =   $gameService->getUserNotSelectedAttacks($profile_id);
        return $this->render('game/attackShop.html.twig', array('attacks'=>$attackData,'showMenu'=>'1'));
        
    }
    
    /**
     * This method will be used for show profile data page in html
     *
     * @author Dhiraj Bastwade <talktodhi@gmail.com>
     *
     * @return Profile Page in HTML
     * 
     * @filesource GameController.php
     *
     * @Route("/wargame/buyAttack", name="wargame_buyAttack")
     */
    public function buyAttackAction( Request $request )
    {
        $sessionTemp            =   $request->getSession();      
        $profile_idTemp         =   $sessionTemp->get('id');
        if(!isset($profile_idTemp)){
            $userData['error']  =   'Please Login Again.';
            return $this->render('game/index.html.twig',array('userData'=>$userData,'showMenu'=>'0'));
        }
        $gameService        =   new gameServiceClass();
        $session            =   $request->getSession();
        
        $profile_id         =   $session->get('id');
        $attackId           =   trim($request->get('id'));
        $data               =   array();
        $data['attackId']   =   $attackId;
        $data['userId']     =   $profile_id;
        
        $attackData         =   $gameService->buyAttack($data);
        
        if(isset($attackData['error'])){
            echo 'error'.'--'.$attackData['error'];
        }
        
        if(isset($attackData['success'])){
            $userData           =   $gameService->getProfile($profile_id);
            $session->set('profile_data',$userData);
            echo 'success';
        }
        
        exit;
        
    }
    
    /**
     * This method will be used for show profile data page in html
     *
     * @author Dhiraj Bastwade <talktodhi@gmail.com>
     *
     * @return Profile Page in HTML
     * 
     * @filesource GameController.php
     *
     * @Route("/wargame/warArea", name="wargame_warArea")
     */
    public function warAreaAction( Request $request )
    {
       // error_reporting(E_ALL);
        $gameService        =   new gameServiceClass();
        $sessionTemp            =   $request->getSession();      
        $profile_idTemp         =   $sessionTemp->get('id');
        if(!isset($profile_idTemp)){
            $userData['error']  =   'Please Login Again.';
            return $this->render('game/index.html.twig',array('userData'=>$userData,'showMenu'=>'0'));
        }
        
        $profile_id         =   $sessionTemp->get('id');
        $session            =   $request->getSession();
        $userData           =   $gameService->getProfile($profile_id);
        $session->set('profile_data',$userData);
            
        
        if((!isset($_POST['fight'])) && (!isset($_POST['attack']))){
            $session->remove('monster_id');
        }
        
        $selctedMosterId    =   $session->get('monster_id');
        
        
        if((!isset($selctedMosterId)) && (isset($_POST['fight']))){
            //Monster selected 
            //Second Stage
            $monster_id = (int)trim($request->get('monster_id'));
            $session->set('monster_id',$monster_id);
            $selctedMosterId    =   $session->get('monster_id');
            $stage['showArea']      =   '2';
            
            //get monster (opponent) data
            $stage['selectedMonster']   =   $gameService->getMonsterByID($monster_id);
            $monster_health             =   $session->get('monster_health');
            if(!isset($monster_health)){
                $session->set('monster_health', $stage['selectedMonster']['max_health']);
                
            }
            
            $stage['selectedMonster']['health'] = $session->get('monster_health');
            $stage['selectedMonster']['attacks'] = json_decode($stage['selectedMonster']['attacks'], true);
            
            //get player data
            $playerData             =   $session->get('profile_data');
            $stage['playerData']    =   $playerData;
            $stage['playerData']['attacks']    =   json_decode($stage['playerData']['attacks'], true);
            if(count($stage['playerData']['attacks']) == 0){
                $session->remove('monster_id');
                $session->remove('monster_health');
            }
            
            //get All attacks
            $stage['allAttacks']   =   $gameService->getAllAttacks();
            
        }

        if((isset($selctedMosterId)) && (isset($_POST['attack']))){
            
            $stage['showArea']      =   '2';
             
            $monster_id     =   $session->get('monster_id');
            
            //get monster (opponent) data
            $stage['selectedMonster']   =   $gameService->getMonsterByID($monster_id);
            $monster_health             =   $session->get('monster_health');
            if(!isset($monster_health)){
                $session->set('monster_health', $stage['selectedMonster']['max_health']);
                
            }
            $stage['selectedMonster']['health'] = $session->get('monster_health');
            $stage['selectedMonster']['attacks'] = json_decode($stage['selectedMonster']['attacks'], true);
            
            //get player data
            $playerData             =   $session->get('profile_data');
            $stage['playerData']    =   $playerData;
            $stage['playerData']['attacks']    =   json_decode($stage['playerData']['attacks'], true);
            if(count($stage['playerData']['attacks']) == 0){
                $session->remove('monster_id');
                $session->remove('monster_health');
            }
            
            //get All attacks
            $stage['allAttacks']    =   $gameService->getAllAttacks();
            $stage['attack']        =   $stage['allAttacks'][trim($request->get('attack_id'))];
            
            // Run turn
			
            // Calc player damage
            $player_damage = $stage['attack']['power'];
            if(strtolower($stage['attack']['type']) == 'melee') {
                $player_damage *= 10 + $stage['playerData']['strength'];
            }elseif(strtolower($stage['attack']['type']) == 'magic') {
                $player_damage *= 10 + $stage['playerData']['intelligence'];
            }
            
            // Randomness
            $player_damage *= mt_rand(4, 5);

            $player_damage = round($player_damage / (1 + $stage['selectedMonster']['endurance']), 2);
            
            $combat_display .= $stage['playerData']['username'] . ' ' . $stage['attack']['combat_text'] . ' <br/> ' .
            $stage['playerData']['username']. ' deals ' . $player_damage . ' damage';
                        
            // Calc Opponent damage
            $attack = $stage['selectedMonster']['attacks'][array_rand($stage['selectedMonster']['attacks'])];

            $opponent_damage = $attack['power'];
            
            if($attack['type'] == 'melee') {
                $opponent_damage *= 10 + $stage['playerData']['strength'];
            }
            else if($attack['type'] == 'magic') {
                    $opponent_damage *= 10 + $stage['playerData']['intelligence'];
            }
            $opponent_damage *= mt_rand(3, 4);

            $opponent_damage = round($player_damage / (1 + $stage['playerData']['endurance']), 2);
            $combat_display .= ' <br/><br/> ' . $stage['selectedMonster']['name']. ' ' . $attack['combat_text'] . '<br />' .
            $stage['selectedMonster']['name'] . ' deals ' . $opponent_damage . ' damage';
                        
            // Apply damage
            $stage['selectedMonster']['health'] -= $player_damage;
            if($stage['selectedMonster']['health'] > 0) {
                $stage['playerData']['health'] -= $opponent_damage;
            }

            // Check for winner
            if($stage['selectedMonster']['health'] <= 0) {
                $stage['selectedMonster']['health'] = 0;
                $winner = 'player';
                $combat_display .= ' <br/> You win!';
            }
            else if($stage['playerData']['health'] <= 0) {
                $stage['playerData']['health'] = 0;
                $winner = 'opponent';
                $combat_display .= " <br/> ".$stage['selectedMonster']['name']." won.";
            }
            
            //curl update player data
            $playerDataToUpdate =   $stage['playerData'];
            $playerDataToUpdate['attacks']  =   json_encode($playerDataToUpdate['attacks']);
            $profileUpdate      =   $gameService->updateProfile($playerDataToUpdate);
            $session->set('profile_data',$playerDataToUpdate);
            
            //update health of monster
            $session->set('monster_health', $stage['selectedMonster']['health']);
            
            $stage['warAreaMessage']      =   $combat_display;
            
            if($winner) {
                if($winner == 'player') {
                    $money_gain = 10 + ($stage['selectedMonster']['level'] * 5);
                    $stage['playerData']['money'] += $money_gain;
                    
                    //curl update player data
                    $playerDataToUpdate             =   $stage['playerData'];
                    $playerDataToUpdate['attacks']  =   json_encode($playerDataToUpdate['attacks']);
                    $profileUpdate                  =   $gameService->updateProfile($playerDataToUpdate);
                    $session->set('profile_data',$playerDataToUpdate);
                    $combat_display .= "<div class='center'>
                            You gain {$money_gain} money!
                    </div>";
                }
                $session->remove('monster_health');
                $session->remove('monster_id');
            } 
        }

        if(!isset($selctedMosterId)){
            //Monster not selected yet
            //First Stage
            $stage['showArea']      =   '1';
            $stage['allMonsters']   =   $gameService->getAllMonsters();
            
        }
        return $this->render('game/warArea.html.twig', array('stage'=>$stage,'showMenu'=>'1'));
    }
    
}
