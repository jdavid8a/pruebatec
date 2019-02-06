<?php

class Layout
{
    public function getHeadTarget()
    {        
        include 'HeadTarget.php';
    }
    
    public function getFooterTarget()
    {       
        require 'FooterTarget.php'; 
         
    }
    public function getStartMenu()
    {       
        require 'menu/StartMenu.php'; 
         
    }
    public function getLeftMenu()
    {
        switch($_SESSION['userProfileId'])
        {
            case 1: include 'menu/MenuAdmin.php';
                    break;
                
            case 2: include 'menu/MenuAgent.php';
                    break;
            
            
        }
        
    }
    public function getLeftMenuMobile()
    {        
        switch($_SESSION['userProfileId'])
        {
            case 1: include 'menu/MenuAdminMobile.php';
                    break;
            case 2: include 'menu/MenuAgentMobile.php';
                    break;
            default:include 'menu/MenuAdminMobile.php';
                    break;
            
        }
        echo "<br/>";
    }
}