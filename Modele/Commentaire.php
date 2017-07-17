<?php

namespace Alanska\Modele;

/**
 * Created by PhpStorm.
 * User: leconte_bruno
 * Date: 13/07/2017
 * Time: 23:51
 */
class Commentaire extends CommentaireRepository
{
    private $com_id;
    private $com_author;
    private $com_content;
    private $com_date;
    private $parent_id;
    private $com_signale;
    private $com_delete;
    private $com_niveau;
    private $grand_parent_id;
    private $art_id;

    /**
     * @return mixed
     */
    public
    function getComId()
    {
        return $this->com_id;
    }

    /**
     * @param mixed $com_id
     */
    public
    function setComId(
        $com_id
    ) {
        $this->com_id = $com_id;
    }

    /**
     * @return mixed
     */
    public
    function getComAuthor()
    {
        return $this->com_author;
    }

    /**
     * @param mixed $com_author
     */
    public
    function setComAuthor(
        $com_author
    ) {
        $this->com_author = $com_author;
    }

    /**
     * @return mixed
     */
    public
    function getComContent()
    {
        return $this->com_content;
    }

    /**
     * @param mixed $com_content
     */
    public
    function setComContent(
        $com_content
    ) {
        $this->com_content = $com_content;
    }

    /**
     * @return mixed
     */
    public
    function getComDate()
    {
        return $this->com_date;
    }

    /**
     * @param mixed $com_date
     */
    public
    function setComDate(
        $com_date
    ) {
        $this->com_date = $com_date;
    }

    /**
     * @return mixed
     */
    public
    function getParentId()
    {
        return $this->parent_id;
    }

    /**
     * @param mixed $parent_id
     */
    public
    function setParentId(
        $parent_id
    ) {
        $this->parent_id = $parent_id;
    }

    /**
     * @return mixed
     */
    public
    function getComSignale()
    {
        return $this->com_signale;
    }

    /**
     * @param mixed $com_signale
     */
    public
    function setComSignale(
        $com_signale
    ) {
        $this->com_signale = $com_signale;
    }

    /**
     * @return mixed
     */
    public
    function getComDelete()
    {
        return $this->com_delete;
    }

    /**
     * @param mixed $com_delete
     */
    public
    function setComDelete(
        $com_delete
    ) {
        $this->com_delete = $com_delete;
    }

    /**
     * @return mixed
     */
    public
    function getComNiveau()
    {
        return $this->com_niveau;
    }

    /**
     * @param mixed $com_niveau
     */
    public
    function setComNiveau(
        $com_niveau
    ) {
        $this->com_niveau = $com_niveau;
    }

    /**
     * @return mixed
     */
    public
    function getGrandParentId()
    {
        return $this->grand_parent_id;
    }

    /**
     * @param mixed $grand_parent_id
     */
    public
    function setGrandParentId(
        $grand_parent_id
    ) {
        $this->grand_parent_id = $grand_parent_id;
    }

    /**
     * @return mixed
     */
    public
    function getArtId()
    {
        return $this->art_id;
    }

    /**
     * @param mixed $art_id
     */
    public
    function setArtId(
        $art_id
    ) {
        $this->art_id = $art_id;
    }



}

