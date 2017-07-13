<?php

/**
 * Created by PhpStorm.
 * User: leconte_bruno
 * Date: 14/07/2017
 * Time: 00:40
 */
class User
{
    private $user_id;
    private $user_date;
    private $user_name;
    private $user_firstname;
    private $user_pseudo;
    private $user_password;

    /**
     * @return mixed
     */
    public
    function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     */
    public
    function setUserId(
        $user_id
    ) {
        $this->user_id = $user_id;
    }

    /**
     * @return mixed
     */
    public
    function getUserDate()
    {
        return $this->user_date;
    }

    /**
     * @param mixed $user_date
     */
    public
    function setUserDate(
        $user_date
    ) {
        $this->user_date = $user_date;
    }

    /**
     * @return mixed
     */
    public
    function getUserName()
    {
        return $this->user_name;
    }

    /**
     * @param mixed $user_name
     */
    public
    function setUserName(
        $user_name
    ) {
        $this->user_name = $user_name;
    }

    /**
     * @return mixed
     */
    public
    function getUserFirstname()
    {
        return $this->user_firstname;
    }

    /**
     * @param mixed $user_firstname
     */
    public
    function setUserFirstname(
        $user_firstname
    ) {
        $this->user_firstname = $user_firstname;
    }

    /**
     * @return mixed
     */
    public
    function getUserPseudo()
    {
        return $this->user_pseudo;
    }

    /**
     * @param mixed $user_pseudo
     */
    public
    function setUserPseudo(
        $user_pseudo
    ) {
        $this->user_pseudo = $user_pseudo;
    }

    /**
     * @return mixed
     */
    public
    function getUserPassword()
    {
        return $this->user_password;
    }

    /**
     * @param mixed $user_password
     */
    public
    function setUserPassword(
        $user_password
    ) {
        $this->user_password = $user_password;
    }

    
}