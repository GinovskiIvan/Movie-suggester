

<div class="row">
          <div class="col-lg-6 col-lg-offset-3">
             
                <h2>Register</h2>
           
                <div class="well">
                     <?php echo $this->Session->flash(); ?>
                    <?php echo $this->Form->create('User',array('class'=>'form-horizontal','inputDefaults'=>array('label'=>false)));?>
                          <div class="form-group">
                            <label class="col-sm-2 control-label">Username</label>
                            <div class="col-sm-10">
                              <?php echo $this->Form->input('username',array('class'=>'form-control'));?>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-2 control-label">Password</label>
                            <div class="col-sm-10">
                               <?php echo $this->Form->input('password',array('class'=>'form-control'));?>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-2 control-label">Full name</label>
                            <div class="col-sm-10">
                               <?php echo $this->Form->input('full_name',array('class'=>'form-control'));?>
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                              <?php echo $this->Form->submit('add',array('class'=>'btn btn-primary'))?>
                            </div>
                          </div>
                    <?php echo $this->Form->end();?>
                </div>
          </div>
</div>
