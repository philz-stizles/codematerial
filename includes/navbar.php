<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
 <div class="container">
  <a class="navbar-brand <?php echo $page_title =='home'? 'active' : ''; ?>" href="#">Code Material <span class="sr-only">(current)</span></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor03">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item <?php echo $page_title =='tutorials'? 'active' : ''; ?>">
        <a class="nav-link" href="#">Tutorials</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="blog.php">Blog</a>
      </li>
      <li class="nav-item <?php echo $page_title =='quiz'? 'active' : ''; ?>">
        <a class="nav-link" href="quiz.php">Quiz</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="#">Events</a>
      </li>
	  <li class="nav-item <?php echo $page_title =='members'? 'active' : ''; ?>">
        <a class="nav-link" href="members.php">Members</a>
      </li>
	  <li class="nav-item <?php echo $page_title =='buyout'? 'active' : ''; ?>">
        <a class="nav-link" href="buyout.php">Buy out</a>
      </li>
	  <li class="nav-item <?php echo $page_title =='buyout'? 'active' : ''; ?>">
        <a class="nav-link" href="buyout.php">Find a Job</a>
      </li>
	   <li class="nav-item <?php echo $page_title =='contact'? 'active' : ''; ?>">
        <a class="nav-link" href="contact.php">Contact us</a>
      </li>
	  <li class="nav-item <?php echo $page_title =='newsfeed'? 'active' : ''; ?>">
        <a class="nav-link" href="newsfeed.php">News</a>
      </li>
    </ul>
	 <ul class="navbar-nav">
<?php 
    if(!isset($_SESSION["userid"]) ){
?>
      <li class="nav-item <?php echo $page_title =='signup'? 'active' : ''; ?>">
        <a class="nav-link" href="signup.php">Sign up</a>
      </li>
	  <li class="nav-item <?php echo $page_title =='login'? 'active' : ''; ?>">
        <a class="nav-link" href="login.php">Login</a>
      </li>
<?php 
	}else{
?>
	<li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">User</a>
    </li>
<?php
    }
?>
    </ul>
  </div>
  </div>
</nav>