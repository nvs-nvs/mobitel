<?php

class PollController extends \Phalcon\Mvc\Controller {
    /* Список опросов */
    public function indexAction() {
        $this->view->polls = Question::find();
    }

    /* Выбранный опрос */
    public function showAction($id) {
        $this->view->poll = Question::findFirstById($id);
        $this->view->options = Answer::find([
            'q_id = ?0',
            'bind' => [$id],
            'order' => 'votes DESC'
        ]);
    }

    /* Голосование */
    public function voteAction() {
        $id = $this->request->getPost('vote');
        $name = $this->request->getPost('name');
        if (!$name || !$id) {
            $this->flash->error("Логин и ответ обязательны");
            exit();
        }
        $option = Answer::findFirstById($id);
        /* Достаем Id вопроса */
        $qId = $option->q_id;
        /* Отвечал ли юзер на этот опрос? */
        $user = Results::findFirst([
            'conditions' => 'user_name = ?0 AND q_id = ?1',
            'bind' => [
                $name,
                $qId
            ]
        ]);
        if ($user) {
            $this->flash->error("Вы уже отвечали на этот опрос");
            exit();
        } else {
            /* Пишем в две таблицы -> оборачиваем в транзакцию */
            $this->db->begin();
            try {
                $option->votes++;
                $option->save();
                $result = new Results();
                $result->userName = $name;
                $result->qId = $qId;
                $result->aId = $id;
                $result->save();
                $this->db->commit();
            } catch (Exception $e) {
                $this->db->rollback();
            }
        }
        $this->response->redirect("/poll/stat/$qId");
        $this->view->disable();
    }

    /* Выдаем статистику */
    public function statAction($id) {
        $this->view->options = Answer::find([
            'q_id = ?0',
            'bind' => [$id],
            'order' => 'votes DESC'
        ]);
    }
}