<!DOCTYPE html>
<html>
    <head>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/all.js" integrity="sha384-xymdQtn1n3lH2wcu0qhcdaOpQwyoarkgLVxC/wZ5q7h9gHtxICrpcaSUfygqZGOe" crossorigin="anonymous"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    </head>

    <div class="container">
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info" >
        <div class="panel-heading">
        <div class="panel-title"><b>GENERATE VISUALIZATIONS FOR:</b></div>
    </div>

    <div style="padding-top:30px" class="panel-body" >
    <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

    <form id="loginform" class="form-horizontal" role="form" method="POST" action="heat_map.php">

        <div style="margin-bottom: 25px" class="input-group">
            <span class="input-group-addon"><i class="fas fa-dna"></i></span>
                <input id="login-username" type="text" class="form-control" name="geneone" value="" placeholder="Enter Gene 1..">
        </div>

        <div style="margin-top:10px" class="form-group">
            <div class="col-sm-12 col-sm-offset-4 controls">
                <button type="submit" class="btn btn-primary">Generate visualizations!</button>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-12 control">
                <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >Note: Enter any two genes from the PTA cell type (testing)</div>
            </div>
        </div>
    </form>

    </div>
    </div>
    </div>
    <div id="signupbox" style="display:none; margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
    <div class="panel panel-info">
    <div class="panel-heading">
    <div class="panel-title">Sign Up</div>
    <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="#" onclick="$('#signupbox').hide(); $('#loginbox').show()">Sign In</a></div>
    </div>
    <div class="panel-body" >
    <form id="signupform" class="form-horizontal" role="form">

    </form>
    </div>
    </div>
    </div>
    </div>
</html>
