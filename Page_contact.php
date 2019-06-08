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
          <div class="row block-9">
            <div class="col-md-6 pr-md-5">
              <form method="post" action="func_send.php">
                <div class="form-group">
                  <input type="text" class="form-control" name="name" placeholder="Your Name">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="email" placeholder="Your Email">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="subject" placeholder="Subject">
                </div>
                <div class="form-group">
                  <textarea name="message" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
                </div>
                <div class="form-group">
                  <input type="submit" name="submit" value="Send Message" class="btn btn-primary py-3 px-5">
                </div>
              </form>


            </div>



          <div class="col-md-6 pr-md-5 bg-transparent" >
            <form method="post" action="func_sub.php">
              <div id="mc_embed_signup_scroll" class="form-group">
               

                  <div class="form-group">
                  <label>Subscribe or inform me to my mailing list</label>
                  <input type="text" class="form-control" name="email" placeholder="Your Email">
                   </div>

                  <div class="form-group">
                  <input type="submit" name="submit" value="Subscribe" class="btn btn-primary py-3 px-5">
                </div>
 
            </form>
          </div>


            
          </div>





          <!--End mc_embed_signup-->
        </div>
      </section>


      
      <?php include("includes/footer.php") ?>