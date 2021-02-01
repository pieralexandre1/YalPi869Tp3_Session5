<?php $loguser = $this->request->session()->read('Auth.User'); ?>
<div class="container" ng-app="myapp" ng-controller="UsersController">
    <h1>Change Password!</h1>
    <form novalidate>
         <p style="display:none">{{id="<?php echo $loguser['id'] ?>"}}</p>
         <p style="display:none">{{email="<?php echo $loguser['email'] ?>"}}</p>
         <div class="form-group">
            <label>Actual Password</label>
            <input type="password" name="previouspassword" class="form-control" ng-model="previouspassword" required />
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" ng-model="password" required />
        </div>
        <div class="form-group">
            <label>Confirm Password</label>
            <input type="password" name="confirmPassword" class="form-control" ng-model="confirmPassword" required ng-match="password" />
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary" ng-click="change()">Change!</button>
        </div>
        <div class="alert-danger">{{result}}</div>
        <div class="alert-success">{{resultsucces}}</div>
    </form> 
</div>
<?php 
echo $this->Html->script('validation'); 
echo $this->fetch('script');
?>