<?php
/* Список опросов */

class Question extends \Phalcon\Mvc\Model {

    protected $id;
    protected $text;

    public function initialize() {
        $this->hasMany("id", "Answer", "q_id");
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setText($text) {
        $this->text = $text;
        return $this;
    }

    public function getId() {
        return $this->id;
    }

    public function getText() {
        return $this->text;
    }

    public function getSource() {
        return 'question';
    }

    public static function find($parameters = null) {
        return parent::find($parameters);
    }

    public static function findFirst($parameters = null) {
        return parent::findFirst($parameters);
    }

}