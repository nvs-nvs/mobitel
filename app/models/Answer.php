<?php
/*
 * Варианты ответов
 */
class Answer extends \Phalcon\Mvc\Model {

    protected $id;
    protected $answer;
    protected $q_id;

    public function initialize(){
        $this->belongsTo("q_id", "Question", "id");
    }

    public function setId($id){
        $this->id = $id;
        return $this;
    }

    public function setAnswer($answer){
        $this->answer = $answer;
        return $this;
    }

    public function setQId($q_id){
        $this->q_id = $q_id;
        return $this;
    }

    public function getId(){
        return $this->id;
    }

    public function getAnswer(){
        return $this->answer;
    }

    public function getQId(){
        return $this->q_id;
    }

    public function getSource(){
        return 'answer';
    }

    public static function find($parameters = null){
        return parent::find($parameters);
    }

    public static function findFirst($parameters = null){
        return parent::findFirst($parameters);
    }

}
