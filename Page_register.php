
<?php include("includes/header.php") ?>
      <section class="ftco-section contact-section">
        <div class="container mt-5">

        

        
            
        

          <div class="row block-9">



              <div class="col-md-6 pr-md-5">
                  <form id="register-form" role="form" method="post">
                   <div class="form-group">
                      <input type="text" class="form-control" name="name" placeholder="Name" required>
                    </div>
                    <div class="form-group">
                      <input type="email" class="form-control" name="email" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control" name="password" placeholder="Password" required>
                    </div>

                    <div class="form-group">
                      <input type="password" class="form-control" name="confirm_password" placeholder="Retype Password" required>
                    </div>

                    <div class="form-group">
                      <input type="submit" name="submit" value="REGISTER" class="btn btn-primary py-3 px-5">
                    </div>
                  </form>



              </div>
              <div class="col-md-6 pr-md-5">


                  
                  <?php validate_user_registration(); ?>
                  
                  
                </form>
              </div>



            
          </div>





          <!--End mc_embed_signup-->
        </div>
      </section>

<?php include("includes/footer.php") ?>