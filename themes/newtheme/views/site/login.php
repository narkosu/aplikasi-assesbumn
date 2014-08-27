<?php
/*$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);*/
?>
<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'login-form',
				'action'=>Yii::app()->createUrl('site/login'),
				'enableAjaxValidation'=>true,
			)); ?>
    <p class="animate4 bounceIn"><input type="text" id="username" name="LoginForm[username]" placeholder="Username" /></p>
    <p class="animate5 bounceIn"><input type="password" id="password" name="LoginForm[password]" placeholder="Password" /></p>
    <p class="animate6 bounceIn"><button type="submit" class="btn btn-default btn-block">LOGIN</button></p>
    <!--<p class="animate7 fadeIn"><a href=""><span class="icon-question-sign icon-white"></span> Lupa Password?</a></p>--?>
<?php $this->endWidget(); ?>	
   

      <div class="doubleHead"><?php echo Yii::app()->name?></div>
      <?php /*<div class="doubleText">Survei pasar rakyat pada tahun 2011 di 33 Propinsi di Indonesia</div> */ ?>
	  <div id="login-inner" class="bordered-table" style="padding:0px 50px;">
		
			<table border="0" cellpadding="10" cellspacing="0" >
			<tr>
				<th width="100">Username</th>
				<td><input type="text" id="username" name="LoginForm[username]" class="text-input" /></td>
			</tr>
			<tr>
				<th>Password</th>
				<td><input type="password" id="password" name="LoginForm[password]" onfocus="this.value=''" class="text-input" /></td>
			</tr>
			
			<tr>
				<td colspan="2"><div class="button-container">
		<input type="submit" class="button continue-button" value="Login" />
	  </div>
				</td>
			</tr>
			</table>
		
	</div>
    </div>
	 
	  
<?php /*   
<div id="login-inner">
	<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'login-form',
			'enableAjaxValidation'=>true,
		)); ?>
		<table border="0" cellpadding="0" cellspacing="0">
		<tr>
			<th>Username</th>
			<td><input type="text" name="LoginForm[username]" class="login-inp" /></td>
		</tr>
		<tr>
			<th>Password</th>
			<td><input type="password" name="LoginForm[password]" value=""  onfocus="this.value=''" class="login-inp" /></td>
		</tr>
		<tr>
			<th></th>
			<td valign="top"><input type="checkbox" class="checkbox-size" id="login-check" /><label for="login-check">Remember me</label></td>
		</tr>
		<tr>
			<th></th>
			<td><input type="submit" class="submit-login"  /></td>
		</tr>
		</table>
	<?php $this->endWidget(); ?>	
	</div>

*/?>