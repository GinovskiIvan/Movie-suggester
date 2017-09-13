<div class="navbar navbar-inverse navbar-fixed-top" role="navigation" id="my-navbar">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <?php echo $this->Html->link(__('Movie Suggester'),'/',array('class'=>'navbar-brand'));?>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <?php if(!$this->Session->check('Auth.User')):?>
            <li><?php echo $this->Html->link(__('Login'),array('controller'=>'users','action'=>'login'))?></li>
            <li><?php echo $this->Html->link(__('Register'),array('controller'=>'users','action'=>'add'))?></li>
            <?php else: ?>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $this->Session->read('Auth.User.username');?> <span class="glyphicon glyphicon-user"></span><b class="caret"></b></a>
              <ul class="dropdown-menu">
                 <li>
                    <?php echo $this->Html->link(__('Profile'),array('controller'=>'users','action'=>'profile', $this->Session->read('Auth.User.id')))?>
                 </li>
                 <li>
                    <?php echo $this->Html->link(__('Logout'),array('controller'=>'users','action'=>'logout'))?>
                 </li>
              </ul>
            </li>
            <?php endif;?>
          </ul>
          <ul class="nav navbar-nav navbar-left">
              <li><?php echo $this->Html->link('Movies', array('controller'=>'movies', 'action'=>'index')) ?></li>
              <li><?php echo $this->Html->link('Suggested Movies', array('controller'=>'votes', 'action'=>'index')) ?></li>
              <li><?php echo $this->Html->link('Wish List', array('controller'=>'wishlists', 'action'=>'index')) ?></li>
              <li><?php echo $this->Html->link('Contact us', array('controller'=>'movies', 'action'=>'contact')) ?></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
</div>