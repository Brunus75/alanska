<?php

/**
 * Created by PhpStorm.
 * User: leconte_bruno
 * Date: 13/07/2017
 * Time: 19:36
 */
class Controleur
{
// Recherche un paramètre dans un tableau
    protected function getParametre($tableau, $user_name)

    {
        if (isset($tableau[$user_name])) {
            return $tableau[$user_name];
        } else
            throw new Exception("Paramètre '$user_name' absent");
    }

}