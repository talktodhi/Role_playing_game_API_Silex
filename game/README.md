# Role Playing Game - Warriors of Magic

This game is basically a role playing game. Some of the features of this game are as follows.

  - Player can create a character(Monster) with whom user wants to fight
  - Player user can check check his profile, can buy more life for playing with his money that he wins, can create attacks for his own
  - Player can gain more and more life and money as he fights

## Pre-Requiste for setting up game:
  - PHP 5.3
  - MySQL as a database
  - pdo_mysql support

## Database Setup
  - create database "warofmagic"
  - dump "warofmagic.sql" file into create database "warofmagic"
 
##  Changes in file to be done for setting up (Source Code Changes)
  - Please change db config variable in game/api/dbConfig.php
  - Please change $this->apiURL variable to domain path at "game\game_in_symfony\src\Utility\gameServiceClass.php" on line # 17.
 
## Source Code Info & URL Info
  - RESTFul API development
    - Technology Used: PHP
    - Micro-services Framework: Silex Framework (Based on Symfony Community Support)
    - Database used for backend: MySQL
    - Source Code Location: game/api/
    - API Documentation URL: game/api/apiDocUI
    - API Documentation Tool: Swagger
  - Front-end for game(API Integrated)
    - Technology Used: PHP
    - Framework: Symofony 2.8
    - Source Code Location: game/game_in_symfony
    - URL: game/game_in_symfony/web/wargame
    - Project Documentation URL: game/game_in_symfony/vendor/phpdocumentor/phpdocumentor/bin/doc/classes/AppBundle.Controller.GameController.html
    - Project Documentation Tool: PHPDocumentor