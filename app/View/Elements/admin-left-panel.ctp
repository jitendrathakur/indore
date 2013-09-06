<div class="span3">
  <div class="well admin-prifle-box"> 
    <?php echo $this->Html->image('member_ph.png', array('class' => 'profile-img')); ?>     
        <span>
            <strong>Admin</strong>       
            <span class=""><?php echo $this->Html->link('Profile', array('controller' => 'users', 'action' => 'profile', 'admin' => true)); ?> | <?php echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout', 'admin' => false)); ?></span>
        </span>
      </div>          
      <div class="sidebar-nav">
        <div class="well" style="padding: 8px 0;">
        <ul class="nav nav-list">
            <li class="nav-header">Main</li>
            <?php $active = ($this->request->action == 'admin_home') ? 'active' : ''; ?>           
            <li class="<?php echo $active; ?>">

              <?php echo $this->Html->link('<i class="icon-home"></i> Dashboard', array('controller' => 'users', 'action' => 'home', 'admin' => true), array('escape' => false)); ?>
            </li>
            <?php $active = ($this->request->controller == 'questions') ? 'active' : ''; ?>    
            <li class="<?php echo $active; ?>">
              <?php echo $this->Html->link('<i class="icon-globe"></i> question', array('controller' => 'questions', 'action' => 'index', 'admin' => true), array('escape' => false)); ?>
              <?php /*
                <ul class="nav nav-list">
                 <?php $active = ($this->request->controller == 'question_types') ? 'active' : ''; ?>              
                <li class="<?php echo $active; ?>">
                  <?php echo $this->Html->link('<i class="icon-th"></i> question Type', array('controller' => 'question_types', 'action' => 'index', 'admin' => true), array('escape' => false)); ?>
                </li>
                <?php $active = ($this->request->controller == 'question_challenges') ? 'active' : ''; ?> 
                <li class="<?php echo $active; ?>">
                  <?php echo $this->Html->link('<i class="icon-th-list"></i> question Challenge', array('controller' => 'question_challenges', 'action' => 'index', 'admin' => true), array('escape' => false)); ?>
                </li>
            </ul> */ ?>
            </li>
            <?php $active = ($this->request->controller == 'users' && $this->request->action == 'admin_index') ? 'active' : ''; ?>            
            <li class="<?php echo $active; ?>">
              <?php echo $this->Html->link('<i class="icon-user"></i> Users', array('controller' => 'users', 'action' => 'index', 'admin' => true), array('escape' => false)); ?>
            </li>
            <!-- Comment -->
            <li class="nav-header"><i class="icon-comment"></i> Comments</li>
            <ul class="nav nav-list">
              <?php $active = ($this->request->controller == 'comments' && $this->request->action == 'admin_index') ? 'active' : ''; ?>
              <li class="<?php echo $active; ?>">
              <?php echo $this->Html->link('<i class="icon-comment"></i> Good Comments', array('controller' => 'comments', 'action' => 'index', 'admin' => true), array('escape' => false)); ?>
              </li>
              <?php $active = ($this->request->controller == 'comments' && $this->request->action == 'admin_bad') ? 'active' : ''; ?>
              <li class="<?php echo $active; ?>">               
                <?php echo $this->Html->link('<i class="icon-ban-circle"></i> Bad Comments', array('controller' => 'comments', 'action' => 'bad', 'admin' => true), array('escape' => false)); ?>
              </li> 
              <?php $active = ($this->request->controller == 'bad_comments') ? 'active' : ''; ?>
              <li class="<?php echo $active; ?>">               
                <?php echo $this->Html->link('<i class="icon-filter"></i> Bad Comments Filter', array('controller' => 'bad_comments', 'action' => 'index', 'admin' => true), array('escape' => false)); ?>
              </li> 
            </ul>
            
          
            <?php $active = ($this->request->controller == 'zipcodes') ? 'active' : ''; ?>
            <li class="<?php echo $active; ?>">
              <?php echo $this->Html->link('<i class="icon-certificate"></i> Zipcode', array('controller' => 'zipcodes', 'action' => 'index', 'admin' => true), array('escape' => false)); ?>
            </li>           
        </ul>
        </div>
      </div><!--/.well -->
</div>