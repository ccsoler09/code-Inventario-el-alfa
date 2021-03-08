<?php
   class database{

       public function connection(){
           try{
               return new PDO('mysql:host=localhost;dbname=dbo_inventarioelalfa;charset=utf8;',
               'root',
               '',
               [      
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
                
               ]);
           }catch(Exception $e){
               die($e->getMessage());  
        }
       }
   }