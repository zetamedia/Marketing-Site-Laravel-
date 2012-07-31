<title><?=$title?></title>
<!-- start title of page -->
<div id="titlebarwrapper">
	<div id="subtitlebarwrapper">
    	<div id="titlebarcontent">
        	<h1>Login</h1>
            <p>Login with 36Stories Account or Register Now.</p>
        </div>
    </div>
</div>
<!-- end title of page -->
<!-- division -->
<div class="splitter"><div class="inner-split"></div></div>
<div class="shadow"><div class="inner-shadow"><div class="white-arrow-down"></div></div></div>
<!-- end of division -->
<!-- start content -->
<div id="mainbodywrapper">
	<div id="mainbodycontent">
		<div id="login">
        	<div id="login-box">
            <form action="login.php">
            	<table width="100%" align="center">
                	<tr><td>Username : </td><td class="inputs"><input type="text" class="login-text" value="danoliver" /></td></tr>
                    <tr><td>Password : </td><td class="inputs"><input type="password" class="login-text" value="password" /></td></tr>
                    <tr><td></td><td class="inputs"><input type="submit" value="Sign in" class="login-btn" /><a href="#">Forgot your password?</a></td></tr>
                    <tr><td></td><td class="inputs"	><input type="checkbox" checked /> Remember me?</td></tr>
                </table>
            </form>
            </div>
            <br />
            <p align="center"><strong>Not yet registered?</strong> <?=HTML::link('/registration','Sign Up')?> here!</p>
        </div>
    </div>
</div>
<!-- end of content -->