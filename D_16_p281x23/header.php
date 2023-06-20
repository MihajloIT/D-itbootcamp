<header>
        <div class="nav">
            <ul>
                <li><a href="index.php">Home</a></li>                
                <?php  if(!isset($_SESSION['username'])){ ?>
                <li><a href="register.php">Sign Up</a></li>
                <li><a href="login.php">Log In</a></li> <?php }else{ ?>
                <li><a href="profile.php">Create Profile</a></li>
                <li><a href="followers.php">Follow</a></li>
                <li><a href="show_profile.php?id=<?php echo $id;?>">Profile</a></li>
                <li><a href="reset_password.php">Reset password</a></li>
                <li><a href="logout.php" ><span class="glyphicon glyphicon-log-out"></span></a></li> <?php   } ?> 
                <li class="last-li"><?php echo $username ?></li>                
            </ul>
        </div>
    </header>