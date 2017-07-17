<?php

namespace Alanska\Modele;




/**
 * Created by PhpStorm.
 * User: leconte_bruno
 * Date: 13/07/2017
 * Time: 19:54
 */
class Article extends ArticleRepository
{
    private $art_id;
    private $art_title;
    private $art_content;
    private $art_date;
    private $art_modified;
    private $art_publish;

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

    /**
     * @return mixed
     */
    public
    function getArtTitle()
    {
        return $this->art_title;
    }

    /**
     * @param mixed $art_title
     */
    public
    function setArtTitle(
        $art_title
    ) {
        $this->art_title = $art_title;
    }

    /**
     * @return mixed
     */
    public
    function getArtContent()
    {
        return $this->art_content;
    }

    /**
     * @param mixed $art_content
     */
    public
    function setArtContent(
        $art_content
    ) {
        $this->art_content = $art_content;
    }

    /**
     * @return mixed
     */
    public
    function getArtDate()
    {
        return $this->art_date;
    }

    /**
     * @param mixed $art_date
     */
    public
    function setArtDate(
        $art_date
    ) {
        $this->art_date = $art_date;
    }

    /**
     * @return mixed
     */
    public
    function getArtModified()
    {
        return $this->art_modified;
    }

    /**
     * @param mixed $art_modified
     */
    public
    function setArtModified(
        $art_modified
    ) {
        $this->art_modified = $art_modified;
    }

    /**
     * @return mixed
     */
    public
    function getArtPublish()
    {
        return $this->art_publish;
    }

    /**
     * @param mixed $art_publish
     */
    public
    function setArtPublish(
        $art_publish
    ) {
        $this->art_publish = $art_publish;
    }



}