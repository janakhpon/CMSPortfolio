
<?php include("includes/header.php") ?>
    

      <section class="ftco-section contact-section">
        <div class="container mt-5">
          <div class="row block-9">



          


          <div class="col-md-6 pr-md-5">
          <?php
		  	display_message();
			  validate_user_login();

			    ?>
          </div>

            <div class="col-md-6 pr-md-5">
            <?php
                if(isset($_SESSION['id'])){
                    ?>


                    <form method="post" action="logout.php">

                        <div class="form-group">
                          <label>You have already signed in to Admin mode!</label>
                          <input type="submit" name="submit" value="LOG OUT" class="btn btn-primary py-3 px-5">
                          <a class="btn btn-primary py-3 px-5" href="Page_admin.php">MANAGE</a>
                        </div>

                          
                    

                    </form>


                    <?php
                }else{
            ?>


              <form id="login-form" method="post" role="form"">
               <div class="form-group">
                  <input type="text" class="form-control" name="name" placeholder="Username" required>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" name="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" name="password" placeholder="Password" required>
                </div>

                <div class="form-group">
                  <input type="submit" name="submit" value="LOG IN" class="btn btn-primary py-3 px-5">
                </div>
              </form>

              <?php }?>

            </div> 
            
               

          </div>
        </div>
      </section>

      <?php include("includes/footer.php") ?>