<?php 

use Phalcon\Db\Column;
use Phalcon\Db\Index;
use Phalcon\Db\Reference;
use Phalcon\Mvc\Model\Migration;

/**
 * Class ResultsMigration_100
 */
class ResultsMigration_100 extends Migration
{
    /**
     * Define the table structure
     *
     * @return void
     */
    public function morph()
    {
        $this->morphTable('results', array(
                'columns' => array(
                    new Column(
                        'user_name',
                        array(
                            'type' => Column::TYPE_VARCHAR,
                            'notNull' => true,
                            'size' => 16,
                            'first' => true
                        )
                    ),
                    new Column(
                        'q_id',
                        array(
                            'type' => Column::TYPE_INTEGER,
                            'unsigned' => true,
                            'notNull' => true,
                            'size' => 11,
                            'after' => 'user_name'
                        )
                    ),
                    new Column(
                        'a_id',
                        array(
                            'type' => Column::TYPE_INTEGER,
                            'unsigned' => true,
                            'notNull' => true,
                            'size' => 11,
                            'after' => 'q_id'
                        )
                    )
                ),
                'indexes' => array(
                    new Index('PRIMARY', array('user_name', 'q_id'), 'PRIMARY'),
                    new Index('FK_results_question', array('q_id'), null),
                    new Index('FK_results_answer', array('a_id'), null)
                ),
                'references' => array(
                    new Reference(
                        'FK_results_answer',
                        array(
                            'referencedSchema' => 'test',
                            'referencedTable' => 'answer',
                            'columns' => array('a_id'),
                            'referencedColumns' => array('id'),
                            'onUpdate' => 'RESTRICT',
                            'onDelete' => 'RESTRICT'
                        )
                    ),
                    new Reference(
                        'FK_results_question',
                        array(
                            'referencedSchema' => 'test',
                            'referencedTable' => 'question',
                            'columns' => array('q_id'),
                            'referencedColumns' => array('id'),
                            'onUpdate' => 'RESTRICT',
                            'onDelete' => 'RESTRICT'
                        )
                    )
                ),
                'options' => array(
                    'TABLE_TYPE' => 'BASE TABLE',
                    'AUTO_INCREMENT' => '',
                    'ENGINE' => 'InnoDB',
                    'TABLE_COLLATION' => 'utf8_general_ci'
                ),
            )
        );
    }

    /**
     * Run the migrations
     *
     * @return void
     */
    public function up()
    {

    }

    /**
     * Reverse the migrations
     *
     * @return void
     */
    public function down()
    {

    }

}
