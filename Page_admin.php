<?php include("includes/header.php") ?> 


      <section class="ftco-section contact-section">
        <div class="container mt-5">
          <div class="row d-flex mb-5 contact-info">
            <div class="col-md-12 mb-4">
              <h2 class="h4">Contact Information</h2>
            </div>
            <div class="w-100"></div>
            <div class="col-md-3">
              <p><span>Address:</span> No 82, Ngantae Ward, Mawlamyine, Myanmar </p>
            </div>
            <div class="col-md-3">
              <p><span>Phone:</span> <a href="tel://1234567920">+959 792359726</a></p>
            </div>
            <div class="col-md-3">
              <p><span>Email:</span> <a href="mailto:info@yoursite.com">minchanhtutoo@gmail.com</a></p>
            </div>
            <div class="col-md-3">
              <p><span>Website:</span> <a href="#">www.janakhpon.tech</a></p>
            </div>
          </div>


          <?php
          
          if(isset($_SESSION['id'])){

            
            
            ?>





            <div class="row block-9">


              <div class="col-md-6 pr-md-5">
                <form method="post" role="form"  enctype="multipart/form-data">
                  <div class="form-group">
                    <input type="File" id="upload_image" class="form-control"  name="image" placeholder="Image File" required>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" name="language" placeholder="Main Language">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="Project Name">
                  </div>
                  <div class="form-group">
                    <textarea cols="30" rows="10" class="form-control" name="description" placeholder="Project Description"></textarea>
                  </div>

                  
                </div>



                <div class="col-md-6 pr-md-5">

                <?php validate_project_insertion(); ?>


                  <div class="form-group">
                    <select class="form-control" name="hosted">
                      <option selected disabled>Hosted or Deployed ?</option>
                      <option value="YES">YES</option>
                      <option value="NO">NO</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" name="link" placeholder="Deployed application Link">
                  </div>
                  <div class="form-group">
                    <input type="submit" name="submit" value="SAVE" class="btn btn-primary py-3 px-5">
                  </div>
                </form>
              </div>




            </div>





          <?php }else { ?>

            
            <div class="row block-9">
              <div class="col-md-6 pr-md-5">

                <h1>ACCESS DENIED</h1>
              </div>
            </div>


          <?php } ?>


          
        </div>
      </section>


<?php include("includes/footer.php") ?>