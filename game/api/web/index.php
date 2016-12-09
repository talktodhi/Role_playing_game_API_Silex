<?php

require_once __DIR__.'/../vendor/autoload.php';
include_once '../dbConfig.php';
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Swagger\Annotations as SWG;


/**
 * @SWG\Resource(
					basePath="http://localhost/game/api/web/", 
					resourcePath="/API",
					apiVersion="0.1"
					
				)
 */
 /**
 * @SWG\Info(title="RPG - War of Melle [RestFul API]",description="This API will be used for integrating Role Playing Game - War of Melle to the front-end. ")
 */
 
// init Silex app
$app = new Silex\Application();
$app["debug"] = true;

//configure database connection
$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => array(
        'driver' => 'pdo_mysql',
        'host' => DB_HOST,
        'dbname' => DB_NAME,
        'user' => DB_USERNAME,
        'password' => DB_PASSSWORD,
        'charset' => 'utf8',
    ),
));

$app->register(new JDesrosiers\Silex\Provider\SwaggerServiceProvider(), array(
    "swagger.srcDir" => __DIR__ . "/../vendor/zircote/swagger-php/library",
    "swagger.servicePath" => __DIR__ . "/",
));

$app->register(new JDesrosiers\Silex\Provider\CorsServiceProvider(), array(
    "cors.allowOrigin" => "http://petstore.swagger.io/",
));
 
/**
 * @SWG\Api(path="/getAllUsers",
				@SWG\Operations(
					@SWG\Operation(method="GET", 
						nickname="getAllUsers",
						summary="Lists all users of the game",
						notes="Returns a list of users new"
					)
				)
			)
 */
 
// route for "/getAllUsers" URI: load users list and return it in JSON format
$app->get('/getAllUsers', function () use ($app) {
  $sql = "SELECT * FROM users";
  $users = $app['db']->fetchAll($sql);
  
  return $app->json($users);
});



/**
 * @SWG\Api(path="/register",
					@SWG\Operation(
						method="POST", 
						nickname="register",
						summary="Call this API for new user registration",
						notes="User Registration",
						@SWG\Parameter(
							name="username",
							description="Username of the user. This will be used for login purpose of the game.",
							required=true,
							type="string",
							paramType="form",
							allowMultiple=false
						),
						@SWG\Parameter(
							name="password",
							description="Password for the entered username.",
							required=true,
							type="string",
							paramType="form",
							allowMultiple=false
						)
					)
					
			)
	*/
	
// route for "/register" URI: user registration for game, POST username & password
$app->post('/register', function (Request $request) use ($app) {

	$username = trim($request->get('username'));
	$password = trim($request->get('password'));
	
	if(($username == '') || ($password == '')){
		$user['error'] = 'Username or Password cannot be left blank.';
	}else{
		$sql 		=	"SELECT * FROM users WHERE username = ?";
		$data	 	=	$app['db']->fetchAssoc($sql, array($username));
		
		if($data != ''){
			$user['error']	=	'Error ! Username already exists.';
		}else{
			$arrayData			=	array();
			$arrayData['username']	=	$username;
			$arrayData['password']	=	md5($password);
			$arrayData['level']	=	1;
			$arrayData['exp']	=	0;
			$arrayData['health']	=	100;
			$arrayData['max_health']	=	100;
			$arrayData['money']	=	10;
			$arrayData['strength']	=	1;
			$arrayData['intelligence']	=	1;
			$arrayData['endurance']	=	1;
			
			
			$userInsert	= 	$app['db']->insert('users', $arrayData);
			$userId		=	$app['db']->lastInsertId();
			
			if($userId > 0){
				$user['id']	=	$userId;
			}else{
				$user['error']	=	'Error ! Username could not be registered.';
			}
		}
	}
	
	return $app->json($user);
});

/**
 * @SWG\Api(path="/updateProfile",
					@SWG\Operation(
						method="PUT", 
						nickname="register",
						summary="Call this API for new user registration",
						notes="User Registration",
						@SWG\Parameter(
							name="level",
							description="level of the user in the game.",
							required=false,
							type="integer",
							paramType="form",
							allowMultiple=false
						),
						@SWG\Parameter(
							name="exp",
							description="EXP of the user in the game.",
							required=false,
							type="integer",
							paramType="form",
							allowMultiple=false
						),
						@SWG\Parameter(
							name="health",
							description="Health of the user in the game.",
							required=false,
							type="integer",
							paramType="form",
							allowMultiple=false
						),
						@SWG\Parameter(
							name="max_health",
							description="Max health of the user in the game.",
							required=false,
							type="integer",
							paramType="form",
							allowMultiple=false
						),
						@SWG\Parameter(
							name="money",
							description="Money health of the user in the game.",
							required=false,
							type="integer",
							paramType="form",
							allowMultiple=false
						),
						@SWG\Parameter(
							name="strength",
							description="Strength of the user in the game.",
							required=false,
							type="integer",
							paramType="form",
							allowMultiple=false
						),
						@SWG\Parameter(
							name="endurance",
							description="Endurance of the user in the game.",
							required=false,
							type="integer",
							paramType="form",
							allowMultiple=false
						),
						@SWG\Parameter(
							name="attacks",
							description="Attacks of the user in the game.",
							required=false,
							type="string",
							paramType="form",
							allowMultiple=false
						),
						@SWG\Parameter(
							name="id",
							description="ID of the user in the game.",
							required=true,
							type="integer",
							paramType="form",
							allowMultiple=false
						)
					)
					
			)
	*/
	
// route for "/updateProfile" URI: user profile updatation
$app->put('/updateProfile',function (Request $request) use ($app) {
					
	$dbKeysForProfile	=	array('level','exp','health','max_health','money','strength','endurance','attacks');
	
	$level			=	trim($request->get('level'));
	$exp			=	trim($request->get('exp'));
	$health			=	trim($request->get('health'));
	$max_health		=	trim($request->get('max_health'));
	$money			=	trim($request->get('money'));
    $strength 		=	trim($request->get('strength'));
	$endurance 		=	trim($request->get('endurance'));
	$attacks 		=	trim($request->get('attacks'));
	$id			=	trim($request->get('id'));
	
	$data	=	array();
	
	if($level != ''){
		if(ctype_alpha($level)){
			$user['error'] = 'Level needs to be integer..';
		}elseif(!is_int((int) $level)){
			$user['error'] = 'Level needs to be integer.';
		}elseif((int) $level < 1){
			$user['error'] = 'Level needs to be greater than zero.';
		}else{
			$data['level']	=	$level;
		}
	}
	
	if(($exp != '') && (!isset($user['error']))){
		if(ctype_alpha($exp)){
			$user['error'] = 'Exp needs to be integer..';
		}elseif(!is_int((int) $exp)){
			$user['error'] = 'Exp needs to be integer.';
		}elseif((int) $exp < 1){
			$user['error'] = 'Exp needs to be greater than zero.';
		}else{
			$data['exp']	=	$exp;
		}
	}
	
	if(($health != '') && (!isset($user['error']))){
		if(ctype_alpha($health)){
			$user['error'] = 'Health needs to be integer..';
		}elseif(!is_int((int) $health)){
			$user['error'] = 'Health needs to be integer.';
		}elseif((int) $health < 1){
			$user['error'] = 'Health needs to be greater than zero.';
		}else{
			$data['health']	=	$health;
		}
	}
	
	if(($max_health != '') && (!isset($user['error']))){
		if(ctype_alpha($max_health)){
			$user['error'] = 'Max Health needs to be integer..';
		}elseif(!is_int((int) $max_health)){
			$user['error'] = 'Max Health needs to be integer.';
		}elseif((int) $max_health < 1){
			$user['error'] = 'Max Health needs to be greater than zero.';
		}else{
			$data['max_health']	=	$max_health;
		}
	}
	
	if(($money != '') && (!isset($user['error']))){
		if(ctype_alpha($money)){
			$user['error'] = 'Money needs to be integer..';
		}elseif(!is_int((int) $money)){
			$user['error'] = 'Money needs to be integer.';
		}elseif((int) $money < 1){
			$user['error'] = 'Money needs to be greater than zero.';
		}else{
			$data['money']	=	$money;
		}
	}
	
	if(($strength != '') && (!isset($user['error']))){
		if(ctype_alpha($strength)){
			$user['error'] = 'Strength needs to be integer..';
		}elseif(!is_int((int) $strength)){
			$user['error'] = 'Strength needs to be integer.';
		}elseif((int) $strength < 1){
			$user['error'] = 'Strength needs to be greater than zero.';
		}else{
			$data['strength']	=	$strength;
		}
	}
	
	if(($endurance != '') && (!isset($user['error']))){
		if(ctype_alpha($endurance)){
			$user['error'] = 'Endurance needs to be integer..';
		}elseif(!is_int((int) $endurance)){
			$user['error'] = 'Endurance needs to be integer.';
		}elseif((int) $endurance < 1){
			$user['error'] = 'Endurance needs to be greater than zero.';
		}else{
			$data['endurance']	=	$endurance;
		}
	}
	
	if(($id != '') && (!isset($user['error']))){
		if(ctype_alpha($id)){
			$user['error'] = 'ID needs to be integer..';
		}elseif(!is_int((int) $id)){
			$user['error'] = 'ID needs to be integer.';
		}elseif((int) $id < 1){
			$user['error'] = 'ID needs to be greater than zero.';
		}else{
			$dataWhere['id']	=	$id;
		}
	}
	
	if(($attacks != '') && (!isset($user['error']))){
		$resultJSON = json_decode($attacks,true);
		if (!is_array($resultJSON)) {
			$user['error'] = 'Invalid JSON data';
		}else{
			$data['attacks']	=	$attacks;
		}
	}
	
	if(!isset($user['error'])){
		if(count($data) > 0){
			if(count($dataWhere) > 0){
				$sql 			=	"SELECT * FROM users WHERE id = ?";
				$userData	 	=	$app['db']->fetchAssoc($sql, array($dataWhere['id']));
				
					if($userData == ''){
						$user['error']	=	'No user found for update';
					}else{
						
						$whereArr['id']		=	(int) $dataWhere['id'];
						$app['db']->update('users',$data , $whereArr);
						$user['success']	=	'1';
					
					}
				//$user	=	$userData;
			}else{
				$user['error'] = 'Invalid user ID.';
			}
			
		}else{
			$user['error'] = 'No Vaild data found for update.';
		}
	}
	
	return $app->json($user);
});

/**
 * @SWG\Api(path="/checkLogin",
					@SWG\Operation(
						method="POST", 
						nickname="Login",
						summary="Call this API for user login.",
						notes="User Registration",
						@SWG\Parameter(
							name="username",
							description="Username of the user used for registration.",
							required=true,
							type="string",
							paramType="form",
							allowMultiple=false
						),
						@SWG\Parameter(
							name="password",
							description="Password for the entered username.",
							required=true,
							type="string",
							paramType="form",
							allowMultiple=false
						)
					)
					
			)
	*/
// route for "/checkLogin" URI: check if user available and verify password and return it in JSON format
$app->post('/checkLogin', function (Request $request) use ($app) {

	$username = trim($request->get('username'));
	$password = trim($request->get('password'));
	
	if(($username == '') || ($password == '')){
		$user['error'] = 'Username or Password cannot be left blank.';
	}else{
		
		$sql 		=	"SELECT * FROM users WHERE username = ?";
		$data	 	=	$app['db']->fetchAssoc($sql, array($username));
		
		if(count($data) == 0){
			$user['error'] = 'User Not Found.';
		}else{
			$userData	=	$data;
			if(md5($password) != $userData['password']) {
				$user['error'] = 'Password Incorrect.';
			}else{
				$user	=	$userData;
			}
		}
		
	}
	
	return $app->json($user);
});

/**
 * @SWG\Api(path="/getProfile/{id}",
					@SWG\Operation(
						method="GET", 
						nickname="register",
						summary="User profile data.",
						notes="This API will give you all the user data for provided user ID.",
						@SWG\Parameter(
							name="id",
							description="ID of the username in integer value.",
							required=true,
							type="integer",
							paramType="path",
							allowMultiple=false
						)
					)
			)
	*/
// route for "/getProfile/{id}" URI: fetch user data and return it in JSON format
$app->get('/getProfile/{id}', function ($id) use ($app) {
	
	if(trim($id) != ''){
		
		$sql = "SELECT * FROM users WHERE id = ?";
		$userData = $app['db']->fetchAssoc($sql, array((int) $id));
		if(count($userData) > 0){
			$user	=	$userData;
		}else{
			$user['error']	=	'No user found';
		}
	}else{
		$user['error']	=	'ID cannot be blank';
	}
	return $app->json($user);
});

/**
 * @SWG\Api(path="/createMonster",
					@SWG\Operation(
						method="POST", 
						nickname="Create Monster",
						summary="Character Creation. (Monster Data Creation)",
						notes="Call this API for creating monster( Character Creating) with whom user would like to fight.",
						@SWG\Parameter(
							name="name",
							description="Name of the monster(character) in string. ",
							required=true,
							type="string",
							paramType="form",
							allowMultiple=false
						),
						@SWG\Parameter(
							name="level",
							description="Level on which monster will be available to fight.",
							required=true,
							type="integer",
							paramType="form",
							allowMultiple=false
						),
						@SWG\Parameter(
							name="max_health",
							description="Max health of the monster  in integer.",
							required=true,
							type="integer",
							paramType="form",
							allowMultiple=false
						),
						@SWG\Parameter(
							name="strength",
							description="Strength of the monster in integer.",
							required=true,
							type="integer",
							paramType="form",
							allowMultiple=false
						),
						@SWG\Parameter(
							name="intelligence",
							description="Intelligence of the monster in integer.",
							required=true,
							type="integer",
							paramType="form",
							allowMultiple=false
						),
						@SWG\Parameter(
							name="endurance",
							description="Endurance of the monster in integer.",
							required=true,
							type="integer",
							paramType="form",
							allowMultiple=false
						),
						@SWG\Parameter(
							name="attacks",
							description="Attack type and power of the monster in JSON string with 2 array object element [ combat_text (string), type (melee or magic), power (integer)] ",
							required=true,
							type="string",
							paramType="form",
							allowMultiple=false
						)						
					)
			)
	*/
// route for "/createMonster" URI: user registration for game, POST username & password
$app->post('/createMonster', function (Request $request) use ($app) {
	
	    $data                   =   array();
        $data['name']           =   trim($request->get('name'));
        $data['level']          =   trim($request->get('level'));
        $data['max_health']     =   trim($request->get('max_health'));
        $data['strength']       =   trim($request->get('strength'));
        $data['intelligence']   =   trim($request->get('intelligence'));
        $data['endurance']      =   trim($request->get('endurance'));
		$data['attacks']		=	trim($request->get('attacks'));
		
        $attacks                =   json_decode($request->get('attacks'),true);
	
		if(trim($request->get('name')) == ''){
			$user['error'] = 'Monster name cannot be left blank.';
		}elseif(ctype_alpha($request->get('level'))){
			$user['error'] = 'Level needs to be integer..';
		}elseif(!is_int((int) $request->get('level'))){
			$user['error'] = 'Level needs to be integer.';
		}elseif((int) $request->get('level') < 1){
			$user['error'] = 'Level needs to be greater than zero.';
		}elseif(ctype_alpha($request->get('max_health'))){
			$user['error'] = 'Max health needs to be integer..';
		}elseif(!is_int((int) $request->get('max_health'))){
			$user['error'] = 'Max health needs to be integer.';
		}elseif((int) $request->get('max_health') < 1){
			$user['error'] = 'Max health needs to be greater than zero.';
		}elseif(ctype_alpha($request->get('strength'))){
			$user['error'] = 'Strength needs to be integer..';
		}elseif(!is_int((int) $request->get('strength'))){
			$user['error'] = 'Strength needs to be integer.';
		}elseif((int) $request->get('strength') < 1){
			$user['error'] = 'Strength needs to be greater than zero.';
		}elseif(ctype_alpha($request->get('intelligence'))){
			$user['error'] = 'Intelligence needs to be integer..';
		}elseif(!is_int((int) $request->get('intelligence'))){
			$user['error'] = 'Intelligence needs to be integer.';
		}elseif((int) $request->get('intelligence') < 1){
			$user['error'] = 'Intelligence needs to be greater than zero.';
		}elseif(ctype_alpha($request->get('endurance'))){
			$user['error'] = 'Endurance needs to be integer..';
		}elseif(!is_int((int) $request->get('endurance'))){
			$user['error'] = 'Endurance needs to be integer.';
		}elseif((int) $request->get('endurance') < 1){
			$user['error'] = 'Endurance needs to be greater than zero.';
		}
		
		if(!isset($user['error'])){
			foreach($attacks as $id => $arr){
				
				if(trim($arr['combat_text']) == ''){
					$user['error'] = 'Attack Combat message cannot be left blank.';
				}elseif(ctype_alpha($arr['power'])){
					$user['error'] = 'Attack power needs to be integer..';
				}elseif(!is_int((int) $arr['power'])){
					$user['error'] = 'Attack power needs to be integer.';
				}elseif((int) $arr['power'] < 1){
					$user['error'] = 'Attack power needs to be greater than zero.';
				}
				
				if(isset($user['error'])){
					break;
				}
			}
		}
		
		if(!isset($user['error'])){
			$sql 		=	"SELECT * FROM monsters WHERE lower(name) = ?";
			$chkdata	=	$app['db']->fetchAssoc($sql, array(strtoupper($data['name'])));
			
			if($chkdata != ''){
				$user['error']	=	'Error ! Monster name already exists. Please try entering different name.';
			}else{

				$userInsert	= 	$app['db']->insert('monsters', $data);
				$userId		=	$app['db']->lastInsertId();
				
				if($userId > 0){
					$user['id']	=	$userId;
				}else{
					$user['error']	=	'Error ! Monster could not be registered.';
				}
			}
		}
	
	return $app->json($user);
});

/**
 * @SWG\Api(path="/getMonster/{id}",
					@SWG\Operation(
						method="GET", 
						nickname="Monster Data",
						summary="Monster data.",
						notes="This API will fetch all the data of monster (character) for provided monster ID.",
						@SWG\Parameter(
							name="id",
							description="ID of the monster in integer value.",
							required=true,
							type="integer",
							paramType="path",
							allowMultiple=false
						)
					)
			)
	*/
// route for "/getMonster/{id}" URI: fetch monster data and return it in JSON format
$app->get('/getMonster/{id}', function ($id) use ($app) {
	
	if(trim($id) != ''){
		
		$sql = "SELECT * FROM monsters WHERE id = ? LIMIT 1";
		$userData = $app['db']->fetchAssoc($sql, array((int) $id));
		if(count($userData) > 0){
			$user	=	$userData;
		}else{
			$user['error']	=	'No user found';
		}
	}else{
		$user['error']	=	'ID cannot be blank';
	}
	return $app->json($user);
});

/**
 * @SWG\Api(path="/getAllMonster",
					@SWG\Operation(
						method="GET", 
						nickname="All Monster Data",
						summary="All Monster data.",
						notes="This API will fetch all the data of all monsters (characters)."
					)
			)
	*/
// route for "/getAllMonster" URI: fetch all monster data and return it in JSON format
$app->get('/getAllMonster', function () use ($app) {
		
		$sql = "SELECT * FROM monsters";
		$userData = $app['db']->fetchAll($sql);
		if(count($userData) == 0){
			$user['error']	=	'No Monsters Found. Please create new monster.';
		}else{
			$user	=	$userData;
		}
	return $app->json($user);
});




/**
 * @SWG\Api(path="/createAttack",
					@SWG\Operation(
						method="POST", 
						nickname="Create Attack",
						summary="Create Attack",
						notes="This API will be used for creating attack for the user to fight against monsters.",
						@SWG\Parameter(
							name="name",
							description="Name of the attack. Attack is used as a weapon to fight against monster.",
							required=true,
							type="integer",
							paramType="path",
							allowMultiple=false
						),
						@SWG\Parameter(
							name="combat_text",
							description="Combat text of the attack used for showing after attack.",
							required=true,
							type="string",
							paramType="form",
							allowMultiple=false
						),
						@SWG\Parameter(
							name="type",
							description="Type of the attack. i.e melee or magic",
							required=true,
							type="string",
							paramType="form",
							allowMultiple=false
						),
						@SWG\Parameter(
							name="power",
							description="Power of the attack in integer.",
							required=true,
							type="integer",
							paramType="form",
							allowMultiple=false
						),
						@SWG\Parameter(
							name="purchase_cost",
							description="Cost of the attack to buy that attack by user in integer.",
							required=true,
							type="integer",
							paramType="form",
							allowMultiple=false
						)
					)
			)
	*/
// route for "/createAttack" URI: attack creation
$app->post('/createAttack', function (Request $request) use ($app) {

	
	if(trim($request->get('name')) == ''){
		$user['error'] = 'Atack name cannot be left blank.';
	}elseif(trim($request->get('combat_text')) == ''){
		$user['error'] = 'Cobat text cannot be left blank.';
	}elseif(trim($request->get('type')) == ''){
		$user['error'] = 'Type of attack cannot be left blank.';
	}elseif(ctype_alpha($request->get('power'))){
		$user['error'] = 'Power needs to be integer..';
	}elseif(!is_int((int) $request->get('power'))){
		$user['error'] = 'Power needs to be integer.';
	}elseif(ctype_alpha($request->get('purchase_cost'))){
		$user['error'] = 'Purchase cost needs to be integer..';
	}elseif(!is_int((int) $request->get('purchase_cost'))){
		$user['error'] = 'Purchase cost needs to be integer.';
	}else{
		
		$data               =   array();
        $data['name']           =   trim($request->get('name'));
        $data['combat_text']    =   trim($request->get('combat_text'));
        $data['type']           =   trim($request->get('type'));
        $data['power']          =   (int) trim($request->get('power'));
        $data['purchase_cost']  =   (int) trim($request->get('purchase_cost'));
		
		$sql 		=	"SELECT * FROM attacks WHERE name = ?";
		$checkdata	=	$app['db']->fetchAssoc($sql, array($data['name']));
		
		if($checkdata != ''){
			$user['error']	=	'Error ! Attack name already exists. Please select different name.';
		}else{
			//		$userId = 9;
			$userInsert	= 	$app['db']->insert('attacks', $data);
			$userId		=	$app['db']->lastInsertId();
			
			if($userId > 0){
				$user['id']	=	$userId;
			}else{
				$user['error']	=	'Error ! Username could not be registered.';
			}
		}
	}
	
	return $app->json($user);
});

/**
 * @SWG\Api(path="/getAllAttack",
					@SWG\Operation(
						method="GET", 
						nickname="All Attack Data",
						summary="All Attack data.",
						notes="This API will fetch all the data different types of attacks available for the user to fight against monsters."
					)
			)
	*/
// route for "/getAllAttack" URI: fetch all attack data and return it in JSON format
$app->get('/getAllAttack', function () use ($app) {
		
		$sql = "SELECT * FROM attacks";
		$userDataTemp = $app['db']->fetchAll($sql);

		if(count($userDataTemp) == 0){
			$user['error']	=	'No Attacks Found. Please create new monster.';
		}else{
			foreach($userDataTemp as $userDataTempVal){
				$userData[$userDataTempVal['id']]	=	$userDataTempVal;
			}
			$user	=	$userData;
		}
	return $app->json($user);
});

/**
 * @SWG\Api(path="/getAttack/{id}",
					@SWG\Operation(
						method="GET", 
						nickname="User Attack Data",
						summary="Attack data.",
						notes="This API will fetch all the data of attacks available for the user to fight against monsters.",
						@SWG\Parameter(
							name="id",
							description="ID of the attack in integer value.",
							required=true,
							type="integer",
							paramType="path",
							allowMultiple=false
						)
					)
			)
	*/

// route for "/getAttack/{id}" URI: fetch monster data and return it in JSON format
$app->get('/getAttack/{id}', function ($id) use ($app) {
	
	if(trim($id) != ''){
		
		$sql = "SELECT * FROM attacks WHERE id = ? LIMIT 1";
		$userData = $app['db']->fetchAssoc($sql, array((int) $id));
		if(count($userData) > 0){
			$user	=	$userData;
		}else{
			$user['error']	=	'No attack found';
		}
	}else{
		$user['error']	=	'ID cannot be blank';
	}
	return $app->json($user);
});

/**
 * @SWG\Api(path="/getUserSelectedAttack/{id}",
					@SWG\Operation(
						method="GET", 
						nickname="User Selected Attack Data",
						summary="User Selected Attack data.",
						notes="This API will fetch all the data of attacks selected by the user to fight against monsters.",
						@SWG\Parameter(
							name="id",
							description="ID of the user in integer value.",
							required=true,
							type="integer",
							paramType="path",
							allowMultiple=false
						)
					)
			)
	*/

// route for "/getUserSelectedAttack/{id}" URI: fetch monster data and return it in JSON format
$app->get('/getUserSelectedAttack/{id}', function ($id) use ($app) {
	
	if(trim($id) != ''){
		
		$sql 		= 	"SELECT * FROM users WHERE id = ? LIMIT 1";
		$userData 	= 	$app['db']->fetchAssoc($sql, array((int) $id));
		
		$userSelectedAttackActualArr	=	array();
		$userAttacksArr	=	json_decode($userData['attacks'], true);
		
		if(count($userAttacksArr) > 0){
			$userAttackKey	=	array_keys($userAttacksArr);
			
			$sql = "SELECT * FROM attacks";
			$allAttackData = $app['db']->fetchAll($sql);
			
			if(count($allAttackData) > 0){
				foreach($allAttackData as $attackAllArr){
					if(in_array($attackAllArr['id'],$userAttackKey)){
						$userSelectedAttackActualArr[]	=	$attackAllArr;
					}
				}
			}
		}
		
	}else{
		$userSelectedAttackActualArr['error']	=	'ID cannot be blank';
	}
	return $app->json($userSelectedAttackActualArr);
});

/**
 * @SWG\Api(path="/getUserNotSelectedAttack/{id}",
					@SWG\Operation(
						method="GET", 
						nickname="User Not Selected Attack Data",
						summary="User Not Selected Attack data.",
						notes="This API will fetch all the data of attacks that are not selected by the user to fight against monsters.",
						@SWG\Parameter(
							name="id",
							description="ID of the user in integer value.",
							required=true,
							type="integer",
							paramType="path",
							allowMultiple=false
						)
					)
			)
	*/

// route for "/getUserNotSelectedAttack/{id}" URI: fetch monster data and return it in JSON format
$app->get('/getUserNotSelectedAttack/{id}', function ($id) use ($app) {
	
	if(trim($id) != ''){
		
		$sql 		= 	"SELECT * FROM users WHERE id = ? LIMIT 1";
		$userData 	= 	$app['db']->fetchAssoc($sql, array((int) $id));
		
		$userSelectedAttackActualArr	=	array();
		$userAttacksArr	=	json_decode($userData['attacks'], true);
		
		$sql = "SELECT * FROM attacks";
		$allAttackData = $app['db']->fetchAll($sql);
			
		if(count($userAttacksArr) > 0){
			$userAttackKey	=	array_keys($userAttacksArr);
			
			if(count($allAttackData) > 0){
				foreach($allAttackData as $attackAllArr){
					if(!in_array($attackAllArr['id'],$userAttackKey)){
						$userSelectedAttackActualArr[]	=	$attackAllArr;
					}
				}
			}
		}else{
				$userSelectedAttackActualArr	=	$allAttackData;
			}
		
	}else{
		$userSelectedAttackActualArr['error']	=	'ID cannot be blank';
	}
	return $app->json($userSelectedAttackActualArr);
});

/**
 * @SWG\Api(path="/buyAttack",
					@SWG\Operation(
						method="POST", 
						nickname="API to buy attack for the user.",
						summary="API to buy attack for the user.",
						notes="This API will allow user to buy attacks for him self which he has not yet bought.",
						@SWG\Parameter(
							name="attackId",
							description="ID of the attack in integer value for buying.",
							required=false,
							type="integer",
							paramType="form",
							allowMultiple=false
						),
						@SWG\Parameter(
							name="userId",
							description="ID of the user in integer value who wants to buy attack.",
							required=false,
							type="integer",
							paramType="form",
							allowMultiple=false
						)
					)
			)
	*/

// route for "/buyAttack" URI: fetch monster data and return it in JSON format
$app->post('/buyAttack', function ( Request $request ) use ($app) {
	
	$userId          	=  (int) trim($request->get('userId'));
	$attackId           =  (int) trim($request->get('attackId'));
	
	if(trim($userId) == ''){
		$return['error']	=	'User Id cannot be left blank';
	}elseif(trim($attackId) == ''){
		$return['error']	=	'Attack Id cannot be left blank';
	}
	else{
		$sql 		= 	"SELECT * FROM users WHERE id = ? LIMIT 1";
		$userData 	= 	$app['db']->fetchAssoc($sql, array((int) $userId));
		
		if($userData != ''){
			$userSelectedAttackActualArr	=	array();
			$userAttacksArr					=	array();
			$userAttacksArr	=	json_decode($userData['attacks'], true);
			if(count($userAttacksArr) > 0){
				$userAttackKey	=	array_keys($userAttacksArr);
			}
			
			
			$sql2 = "SELECT * FROM attacks WHERE id = ? LIMIT 1";
			$allAttackData = $app['db']->fetchAssoc($sql2, array((int) $attackId));
			
			if($allAttackData != ''){
				if(count($userAttacksArr) > 0){
					if(!in_array($allAttackData['id'],$userAttackKey)){
						$userAttacksArr[$allAttackData['id']]	= array();
					}
				}else{
					$userAttacksArr[$allAttackData['id']] = [];
				}
				
				if($userData['money'] > $allAttackData['purchase_cost']){
					$updateString	=	json_encode($userAttacksArr);
					$updateArr['attacks']	=	$updateString;
					$updateArr['money']		=	(int)$userData['money'] - (int)$allAttackData['purchase_cost'];
					$whereArr['id']			=	(int) $userId;
					$app['db']->update('users',$updateArr , $whereArr);
					$return['success']	=	'1';
				}else{
					$return['error']	=	'User do not have enough money to buy this attack.';
				}
				
			}else{
				$return['error']	=	'Invalid attack id please login and try again.';
			}
		}else{
			$return['error']	=	'Invalid user please login and try again.';
		}
		
	}
	return $app->json($return);
});

/**
 * @SWG\Api(path="/getHealing/{id}",
					@SWG\Operation(
						method="GET", 
						nickname="Healing Data",
						summary="Healing data.",
						notes="This API will fetch all the healing data for provided ID.",
						@SWG\Parameter(
							name="id",
							description="ID of the healing in integer value.",
							required=true,
							type="integer",
							paramType="path",
							allowMultiple=false
						)
					)
			)
	*/
// route for "/getHealing/{id}" URI: fetch monster data and return it in JSON format
$app->get('/getHealing/{id}', function ($id) use ($app) {
	
	if(trim($id) != ''){
		
		$sql = "SELECT * FROM healing WHERE id = ? LIMIT 1";
		$userData = $app['db']->fetchAssoc($sql, array((int) $id));
		if(count($userData) > 0){
			$user	=	$userData;
		}else{
			$user['error']	=	'No user found';
		}
	}else{
		$user['error']	=	'ID cannot be blank';
	}
	return $app->json($user);
});

/**
 * @SWG\Api(path="/getAllHealings",
					@SWG\Operation(
						method="GET", 
						nickname="All Healing Data",
						summary="All Healing data.",
						notes="This API will fetch all the data of all Healing (characters)."
					)
			)
	*/
// route for "/getAllHealings" URI: fetch all monster data and return it in JSON format
$app->get('/getAllHealings', function () use ($app) {
		
		$sql = "SELECT * FROM healing";
		$userData = $app['db']->fetchAll($sql);
		if(count($userData) == 0){
			$user['error']	=	'No Healings Found.';
		}else{
			$user	=	$userData;
		}
	return $app->json($user);
});

/**
 * @SWG\Api(path="/buyHealth",
					@SWG\Operation(
						method="PUT", 
						nickname="Buy Health",
						summary="Call this API for buying health",
						notes="User Registration",
						@SWG\Parameter(
							name="id",
							description="ID of the user for whom to buy health",
							required=true,
							type="integer",
							paramType="form",
							allowMultiple=false
						),
						@SWG\Parameter(
							name="cost",
							description="Cost of health",
							required=true,
							type="integer",
							paramType="form",
							allowMultiple=false
						),
						@SWG\Parameter(
							name="health",
							description="Total health in that cost.",
							required=true,
							type="integer",
							paramType="form",
							allowMultiple=false
						)
					)
					
			)
	*/
	
// route for "/buyHealth" URI: buy health for the user
$app->put('/buyHealth',function (Request $request) use ($app) {
					
	$dbKeysForProfile	=	array('level','exp','health','max_health','money','strength','endurance','attacks');
	
	$id			=	trim($request->get('id'));
	$cost			=	trim($request->get('cost'));
	$health			=	trim($request->get('health'));
	
	$data	=	array();
	
	if($cost != ''){
		if(ctype_alpha($cost)){
			$user['error'] = 'Cost needs to be integer..';
		}elseif(!is_int((int) $cost)){
			$user['error'] = 'Cost needs to be integer.';
		}elseif((int) $cost < 1){
			$user['error'] = 'Cost needs to be greater than zero.';
		}else{
			$data['cost']	=	$cost;
		}
	}
	
	if(($health != '') && (!isset($user['error']))){
		if(ctype_alpha($health)){
			$user['error'] = 'Health needs to be integer..';
		}elseif(!is_int((int) $health)){
			$user['error'] = 'Health needs to be integer.';
		}elseif((int) $health < 1){
			$user['error'] = 'Health needs to be greater than zero.';
		}else{
			$data['health']	=	$health;
		}
	}
	
	if(($id != '') && (!isset($user['error']))){
		if(ctype_alpha($id)){
			$user['error'] = 'ID needs to be integer..';
		}elseif(!is_int((int) $id)){
			$user['error'] = 'ID needs to be integer.';
		}elseif((int) $id < 1){
			$user['error'] = 'ID needs to be greater than zero.';
		}else{
			$dataWhere['id']	=	$id;
		}
	}
	
	if(!isset($user['error'])){
		if(count($data) > 0){
			if(count($dataWhere) > 0){
				$sql 			=	"SELECT * FROM users WHERE id = ?";
				$userData	 	=	$app['db']->fetchAssoc($sql, array($dataWhere['id']));
				
					if($userData == ''){
						$user['error']	=	'No user found for update';
					}else{
						
						$userMoney	=	$userData['money'];
						$userHealth	=	$userData['health'];
						
						if($userMoney > $cost){
							$newUserHealth	=	(int) $health + (int) $userData['health'];
							
							if($newUserHealth <= $userData['max_health']){
								
								$dataToUpdate['health']	=	$newUserHealth;
								$dataToUpdate['money']	=	$userData['money'] - $data['cost'];
								$whereArr['id']		=	(int) $dataWhere['id'];
								$app['db']->update('users',$dataToUpdate , $whereArr);
								$user['success']	=	'1';
							}else{
								
								$user['error']	=	'User can not have more than '.$userData['max_health'].' total health';
							}
							
						}else{
							$user['error']	=	'User does not has enough money to buy health.';
						}					
					}
				//$user	=	$userData;
			}else{
				$user['error'] = 'Invalid user ID.';
			}
			
		}else{
			$user['error'] = 'No Vaild data found for update.';
		}
	}
	
	return $app->json($user);
});

// default route
$app->get('/', function () {
  return "Please refer API documentation for usage methods.";
});

$app->after($app["cors"]);

$app->run();





