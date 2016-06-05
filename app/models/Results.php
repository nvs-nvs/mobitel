<?php
/*
 * Итоги голосования
 */
class Results extends \Phalcon\Mvc\Model {

    protected $user_name;
    protected $q_id;
    protected $a_id;

    public function setUserName($user_name) {
        $this->user_name = $user_name;
        return $this;
    }

    public function setQId($q_id) {
        $this->q_id = $q_id;
        return $this;
    }

    public function setAId($a_id) {
        $this->a_id = $a_id;
        return $this;
    }

    public function getUserName() {
        return $this->user_name;
    }

    public function getQId() {
        return $this->q_id;
    }

    public function getAId() {
        return $this->a_id;
    }

    public function getSource() {
        return 'results';
    }

    public static function find($parameters = null) {
        return parent::find($parameters);
    }

    public static function findFirst($parameters = null) {
        return parent::findFirst($parameters);
    }

}