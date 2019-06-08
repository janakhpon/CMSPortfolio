<?php include("includes/header.php") ?>
    

      <section class="ftco-section">
        <div class="container mt-5">
          <div class="row justify-content-center mb-5 pb-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
              <h3>MY PROJECT COLLECTIONS</h3>
              <hr>
              <form method="post" action="func_search.php">
                <div class="form-group">
                    <input type="text" class="form-control  form-search" name="search" placeholder="Search by language ..">
                </div>
              </form>
              
            </div>
          </div>
          <div class="row no-gutters">


          <?php

            include('connection.php');
            $user_id = $_SESSION['id'];
            $sql = "SELECT * FROM project WHERE user_id ='$user_id'";
            if($result = mysqli_query($conn, $sql)){

                if(mysqli_num_rows($result)>0){
                  
                    while($row = mysqli_fetch_array($result)){
                        $image = $row['image'];
                        $language = $row['language'];
                        $name = $row['name'];
                        $description = $row['description'];
                        $hosted = $row['hosted'];
                        $time = $row['date'];
                        $time = date_format (new DateTime($time), 'g:ia \o\n l jS F');
                        $link = $row['link'];
                        
                        echo "
                    <div class='block-3 d-md-flex ftco-animate'>



                    <a href='$image' class='image d-flex justify-content-center align-items-center'
                     style='background-image: url($image); '
                    data-scrollax='properties: { translateY: '-30%'}'>
                    <div class='icon d-flex text-center justify-content-center align-items-center'>
                      <span class='icon-search'></span>
                    </div>
                  </a>
                  <div class='text'>
                    <h4 class='subheading'> <span>$time </span></h4>
                    <h2 class='heading'><a href='$image'>$language</a></h2>
                    <p>$description <br> Hosted: $hosted</p>
                  
                    <p><a href='$link'>$name</a></p>
                  
                    </div> 
                    </div>";
                    }
                }else{
                    echo '<div class="alert alert-warning">There is no projects on list! Sorry</div>'; exit;
                }
                
            }else{
                echo '<div class="alert alert-warning">An error occured!</div>'; exit;
            //    echo "ERROR: Unable to excecute: $sql." . mysqli_error($link);
            }

            ?>




            <div class="block-3 d-md-flex ftco-animate" data-scrollax-parent="true">
              <a href="portfolio-single.html" class="image order-2 d-flex justify-content-center align-items-center"
                style="background-image: url('images/work-2.jpg'); " data-scrollax=" properties: { translateY: '-30%'}">
                <div class="icon d-flex text-center justify-content-center align-items-center">
                  <span class="icon-search"></span>
                </div>
              </a>
              <div class="text order-1">
                <h4 class="subheading">Content</h4>
                <h2 class="heading"><a href="portfoli-singleo.html">Machine Learning</a></h2>
                <p> I have to work on Machine Learning projects very often and sometimes i use Python and sometime
                  Javascript. </p>
                <p><a href="#">View Project</a></p>
              </div>
            </div>
            <div class="block-3 d-md-flex ftco-animate" data-scrollax-parent="true">
              <a href="portfolio-single.html" class="image d-flex justify-content-center align-items-center" style="background-image: url('images/work-3.jpg'); "
                data-scrollax=" properties: { translateY: '-30%'}">
                <div class="icon d-flex text-center justify-content-center align-items-center">
                  <span class="icon-search"></span>
                </div>
              </a>
              <div class="text">
                <h4 class="subheading">Content</h4>
                <h2 class="heading"><a href="portfolio-single.html">Data Science</a></h2>
                <p> I also have done a couple of projects on Data Science and most of the time i working with Python.
                </p>
                <p><a href="#">View Project</a></p>
              </div>
            </div>
            <div class="block-3 d-md-flex ftco-animate" data-scrollax-parent="true">
              <a href="portfolio-single.html" class="image order-2 d-flex justify-content-center align-items-center"
                style="background-image: url('images/work-4.jpg'); " data-scrollax=" properties: { translateY: '-30%'}">
                <div class="icon d-flex text-center justify-content-center align-items-center">
                  <span class="icon-search"></span>
                </div>
              </a>
              <div class="text order-1">
                <h4 class="subheading">language</h4>
                <h2 class="heading"><a href="portfoli-singleo.html">Javascript</a></h2>
                <p> I'm in love with all the features of Javascript and it is also my favorite language.I enjoy coding
                  it.</p>
                <p><a href="#">View Project</a></p>
              </div>
            </div>
            <div class="block-3 d-md-flex ftco-animate" data-scrollax-parent="true">
              <a href="portfolio-single.html" class="image d-flex justify-content-center align-items-center" style="background-image: url('images/work-5.jpg'); "
                data-scrollax=" properties: { translateY: '-30%'}">
                <div class="icon d-flex text-center justify-content-center align-items-center">
                  <span class="icon-search"></span>
                </div>
              </a>
              <div class="text">
                <h4 class="subheading">User interface</h4>
                <h2 class="heading"><a href="portfoli-singleo.html"> User Interface </a></h2>
                <p>Well as a Javascript lover i also love these
                  amazing frameworks and library ReactJS,AngularJs and VueJS.</p>
                <p><a href="#">View Project</a></p>
              </div>
            </div>
            <div class="block-3 d-md-flex ftco-animate" data-scrollax-parent="true">
              <a href="portfolio-single.html" class="image order-2 d-flex justify-content-center align-items-center"
                style="background-image: url('images/work-6.png'); " data-scrollax=" properties: { translateY: '-30%'}">
                <div class="icon d-flex text-center justify-content-center align-items-center">
                  <span class="icon-search"></span>
                </div>
              </a>
              <div class="text order-1">
                <h4 class="subheading">Backend Development</h4>
                <h2 class="heading"><a href="portfoli-singleo.html"> BackEnd Development</a></h2>

                <p>For Back End development I often use ExpressJS and
                  sometime Django.</p>
                <p><a href="#">View Project</a></p>
              </div>
            </div>

            <div class="block-3 d-md-flex ftco-animate" data-scrollax-parent="true">
              <a href="portfolio-single.html" class="image d-flex justify-content-center align-items-center" style="background-image: url('images/work-7.png'); "
                data-scrollax=" properties: { translateY: '-30%'}">
                <div class="icon d-flex text-center justify-content-center align-items-center">
                  <span class="icon-search"></span>
                </div>
              </a>
              <div class="text">
                <h4 class="subheading">Design</h4>
                <h2 class="heading"><a href="portfoli-singleo.html">Modern Design</a></h2>
                <p>For resonpive modern design I use Bootstrap and
                  Semantic UI which are beautifully built.</p>
                <p><a href="#">View Project</a></p>
              </div>
            </div>

            <div class="block-3 d-md-flex ftco-animate" data-scrollax-parent="true">
              <a href="portfolio-single.html" class="image order-2 d-flex justify-content-center align-items-center"
                style="background-image: url('images/work-8.png'); " data-scrollax=" properties: { translateY: '-30%'}">
                <div class="icon d-flex text-center justify-content-center align-items-center">
                  <span class="icon-search"></span>
                </div>
              </a>
              <div class="text order-1">
                <h4 class="subheading">Other Necessity</h4>
                <h2 class="heading"><a href="portfoli-singleo.html"> I also familier with Libraries and Providers such
                    as AWS, Google, Microsoft, Netlify and Heroku.</p>
                    <p><a href="#">View Project</a></p>
              </div>
            </div>


            <div class="block-3 d-md-flex ftco-animate" data-scrollax-parent="true">
              <a href="portfolio-single.html" class="image d-flex justify-content-center align-items-center" style="background-image: url('images/work-9.jpg'); "
                data-scrollax=" properties: { translateY: '-30%'}">
                <div class="icon d-flex text-center justify-content-center align-items-center">
                  <span class="icon-search"></span>
                </div>
              </a>
              <div class="text">
                <h4 class="subheading">Operating System</h4>
                <h2 class="heading"><a href="portfoli-singleo.html">Operating Systems</a></h2>
                <p> For development i'm familier with both Window and Linux. However, i've spent my life with Linux
                  mostly so far.</p>
                <p><a href="#">View Project</a></p>
              </div>
            </div>

	        </div>
	        <div class="row mt-5">
	          <div class="col text-center">
	            <div class="block-27">
	              <ul>
	                <li><a href="#">&lt;</a></li>
	                <li class="active"><span>1</span></li>
	                <li><a href="#">2</a></li>
	                <li><a href="#">3</a></li>
	                <li><a href="#">4</a></li>
	                <li><a href="#">5</a></li>
	                <li><a href="#">&gt;</a></li>
	              </ul>
	            </div>
	          </div>
	        </div>
        </div>
      </section>



      <?php include("includes/footer.php") ?>