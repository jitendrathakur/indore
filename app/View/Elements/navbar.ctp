<div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="span12">
            <?php
                $title = 'Indore giva';
                
                echo $this->Html->link(__($title), Router::url('/', true), array('class' => 'brand'));

                $options = array(
                    array(
                        'title' => 'User',
                        'dropdown' => array(
                            array(
                                'title' => 'List',
                                'url'     => array('controller' => 'users', 'action' => 'index') 
                            ),
                            array(
                                'title'   => 'Add',
                                'url'     => array('controller' => 'users', 'action' => 'add', 'admin' => true),
                            )                          
                        )
                    ),
                    /*array(
                        'title' => 'question Type',
                        'dropdown' => array(
                            array(
                                'title' => 'List',
                                'url'     => array('controller' => 'question_types', 'action' => 'index') 
                            ),
                            array(
                                'title'   => 'Add',
                                'url'     => array('controller' => 'question_types', 'action' => 'add', 'admin' => true),
                            )                          
                        )
                    ),*/
                    /*array(
                        'title' => 'question Challenge',
                        'dropdown' => array(
                            array(
                                'title' => 'List',
                                'url'     => array('controller' => 'question_challenges', 'action' => 'index') 
                            ),
                            array(
                                'title'   => 'Add',
                                'url'     => array('controller' => 'question_challenges', 'action' => 'add', 'admin' => true),
                            )                          
                        )
                    ),*/
                    array(
                        'title' => 'question',
                        'dropdown' => array(
                            array(
                                'title' => 'List',
                                'url'     => array('controller' => 'questions', 'action' => 'index') 
                            ),
                            array(
                                'title'   => 'Add',
                                'url'     => array('controller' => 'questions', 'action' => 'add', 'admin' => true),
                            )                          
                        )
                    ),                    
                    array(
                        'title' => 'Comments',
                        'dropdown' => array(
                            array(
                                'title' => 'List',
                                'url'     => array('controller' => 'comments', 'action' => 'index', 'admin' => true) 
                            ),
                            array(
                                'title'   => 'Add',
                                'url'     => array('controller' => 'comments', 'action' => 'add', 'admin' => true),
                            ),
                            array(
                                'title'   => 'Bad Comment',
                                'url'     => array('controller' => 'bad_comments', 'action' => 'index', 'admin' => true),
                            )
                        )
                    ),
                    array(
                        'title' => 'Zip Code',
                        'dropdown' => array(
                            array(
                                'title' => 'List',
                                'url'     => array('controller' => 'zipcodes', 'action' => 'index') 
                            ),
                            array(
                                'title'   => 'Add',
                                'url'     => array('controller' => 'zipcodes', 'action' => 'add', 'admin' => true),
                            )                          
                        )
                    )                         
                      
                );

            ?> 
          
            <?php echo $this->element('bootstrap_menu', array('menu' => $options, 'secondary' => true)); ?>
            
          
        </div>
    </div>
</div>