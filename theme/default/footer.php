<?php if (!defined ('SYSTEM_ROOT')) exit (); ?>
<footer class="main-footer">
    <strong>Copyright &copy; 2016 <a href="<?php echo $siteinfo['url']; ?>"><?php echo $siteinfo['name']; ?></a>.</strong> All rights reserved.
</footer>

<div class="control-sidebar-bg"></div>
</div>
<aside class="control-sidebar control-sidebar-dark" style="height: 100%;">
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
        <li class="active"><a href="#settings" data-toggle="tab">基础设置</a></li>
        <li><a href="#avatar" data-toggle="tab">头像设置</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="settings">
            <h3 class="control-sidebar-heading">基础设置</h3>
            <div class="form-horizontal">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                    <input type="email" class="form-control" id="email" value="<?php echo $userinfo['email']; ?>">
                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
                    <input type="password" class="form-control" id="password" placeholder="留空则不修改密码">
                </div>
                <br>
                <div class="input-group pull-right">
                    <button type="submit" id="updata" class="btn btn-info">Submit</button>
                </div>
            </div>
        </div>
        
        <div class="tab-pane" id="avatar">
            <h3 class="control-sidebar-heading">头像设置</h3>
            <div class="form-horizontal">
                <div class="input-group checkbox">
                    <input id="Gravatar" type="radio" name="do" value="gravatar" checked>
                    <label for="Gravatar">使用Gravatar头像</label>
                </div>
                <div class="input-group checkbox">
                    <input id="TBavatar" type="radio" name="do" value="TBavatar">
                    <label for="TBavatar">使用贴吧头像</label>
                </div>
                <div id="show">
                    <br>
                    <input type="text" value="" class="form-control" placeholder="贴吧用户名">
                </div>
                <br>
                <div class="input-group pull-right">
                    <button type="submit" id="updata" class="btn btn-info">Submit</button>
                </div>
            </div>
        </div>

    </div>
</aside>
<script src="<?php echo $siteinfo['theme']['url']; ?>/assets/plugins/jQuery/jQuery-2.2.0.min.js"></script>
<script src="<?php echo $siteinfo['theme']['url']; ?>/assets/plugins/cookie/jquery.cookie.js"></script>
<script src="<?php echo $siteinfo['theme']['url']; ?>/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo $siteinfo['theme']['url']; ?>/assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo $siteinfo['theme']['url']; ?>/assets/plugins/raphael/raphael-min.js"></script>
<script src="<?php echo $siteinfo['theme']['url']; ?>/assets/plugins/morris/morris.min.js"></script>
<script src="<?php echo $siteinfo['theme']['url']; ?>/assets/plugins/fastclick/fastclick.js"></script>
<script src="<?php echo $siteinfo['theme']['url']; ?>/assets/dist/js/app.js"></script>
<script src="<?php echo $siteinfo['theme']['url']; ?>/assets/dist/js/demo.js"></script>
<script src="<?php echo $siteinfo['theme']['url']; ?>/assets/plugins/chartjs/Chart.min.js"></script>
<script src="<?php echo $siteinfo['theme']['url']; ?>/assets/plugins/notice/notice.js"></script>
<script>
$(function () {
    $("#show").hide();
                        
    $("#TBavatar").click(function(){ $("#Gravatar").attr("checked", false); $("#show").show(); }); $("#Gravatar").click(function(){ $("#TBavatar").attr("checked", false); $("#show").hide(); });
});

$("#updata").click(function(){  
    var email = $("#email").val(); 
    var password = $("#password").val();
    
    $.ajax({ 
        type: "post", 
        url : "./ajax.php?mod=profile", 
        dataType: "json",
        data: "email="+email+"&password="+password, 
        success: function(result){
            if (result.code == 0) {
                notie('success', '修改成功', true);
            } else if (result.code == -1) {
                notie('error', result.msg, true)
            }
        } 
    });
});
</script>


</body>
</html>