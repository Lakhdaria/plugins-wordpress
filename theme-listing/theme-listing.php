<?php

    // Dans le dossier wp-content/plugins créer un dossier 'theme-listing'

    // Dans le dossier 'theme-listing' créer un fichier PHP 'theme-listing.php'


/*

Plugin Name: Theme Listing Plugin 
Description: A simple plugin to list all themes directories 
Version: 1.0
Author: IUT MULHOUSE

*/

if(!defined("ABSPATH")){
    exit; 
}


function theme_listing_page() {
    echo"<div>
            <h1>Ma page dans l'admin</h1>
        </div>"; 

        liste_theme_dir();     


}


function theme_listing_menu(){
    add_menu_page('Titre page',  'Titre menu','manage_options','idmenu','theme_listing_page',
    'dashicons-admin-appearance', 5);
    
}

add_action('admin_menu', 'theme_listing_menu'); 



function liste_theme_dir(){

    //Lis le dossier de theme WP

    $themesdir = scandir(get_theme_root());

    echo "<h2>Liste de tous les themes</h2>";

    echo'<ul>';
    foreach($themesdir as $onedir){
        echo'<li>' .$onedir.'</li>';
    }

    echo '</ul>';

}


function theme_listing_shortcode(){
    ob_start();
    liste_theme_dir();
    return ob_get_clean();


}

add_shortcode('them_list', 'theme_listing_shortcode'); 


?>