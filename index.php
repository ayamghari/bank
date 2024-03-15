<!DOCTYPE html>
<html lang="en">
  <head>
    <?php session_start();
                $conn = new mysqli("localhost","root","","bank");
                // Check connection
                if ($conn->connect_error) 
                    die("erro in mysql");
                else 
                    {
                      if(isset($_GET['action']) && $_GET['action']=='logout' && isset($_SESSION['id'])){
                        session_destroy();
                        header("Refresh:0");
  
                      }
                      if(isset($_POST['email']) && isset($_POST['password']) && !isset($_SESSION['id']))
                          {

                            $sql = "SELECT id from client where email=\"".$_POST['email'] ."\"and password=\"".$_POST['password']."\"";
                            $result = $conn->query($sql);
                            if($result->num_rows > 0){
                            $row=$result->fetch_assoc();
                            $_SESSION['id']=$row['id'];
                            }
                              }

                            }
                     ?>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>bank</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />

    <link rel="stylesheet" href="css/all.min.css" />
    <link rel="stylesheet" href="css/aya.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="css/aya.css">
    <link rel="stylesheet" href="css/hayat.css">
  </head>
  <body>
    <?php 
            if(isset($_SESSION['id'])):
      ?>
      <nav class="navbar navbar-expand-lg sticky-top">
      <div class="container">
        <div class="logo">
          <a class="navbar-brand" href="#">cih bank</a>
          <i class="fa-solid fa-star fa-flip fa-lg" style="color: #FFD43B;"></i>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main" aria-controls="main" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa-solid fa-bars"></i>
          </button>
        <div class="collapse navbar-collapse" id="main">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link p-lg-3" href="#">login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link p-lg-3" href="?action=solde">solde</a>
            </li>
            <li class="nav-item">
              <a class="nav-link p-lg-3" href="?action=virement">virement</a>
            </li>
            <li class="nav-item">
              <a class="nav-link p-lg-3" href="#">operation</a>
            </li>
            <li class="nav-item">
              <a class="nav-link p-lg-3" href="?action=logout">log out</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    
    <?php 
            if(isset($_GET['action'])):
                  if($_GET['action']=='solde'):
                    $sql = "SELECT solde from compte where id=".$_SESSION['id'];
                    $result = $conn->query($sql);
                    $row=$result->fetch_assoc();
                    $sold=$row['solde'];           
?>
  
  <label class="d-flex  justify-content-center align-items-center my-5">Votre solde est : <?php echo $sold?>  </label>

  
  <?php
  elseif($_GET['action']=='virement'):
    $sql = "SELECT id from client where id=".$_GET['id'];
    $result = $conn->query($sql);
    if($result->num_rows > 0){
    
    }else{
      echo "use not exist";
    }
  ?>
      <form class="form verment" action="">
        <H2 class="text-center">verment</H2>
        <div class="form-group">
          <label class="p-2" for="number">Numero dU compte:</label>
          <input type="text" name="id" class="form-control" id="number" required >
        </div>
        <div class="form-group">
          <label class="p-2" for="pwd">Montant:</label>
          <input type="text" name="price" class="form-control" id="pwd" placeholder="Montant par DH">
        </div>
        <br><br>
      <input type="hidden" name="action" value="virement">
        
        <input type="submit" class=" rounded-5 sub btn btn-default">Envoyer</input>
      </form>
  
  
  <?php 
  endif;
  endif;
  else: ?>
      <section class="h-100">
            <div class="container py-5 h-100">
              <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-10">
                  <div class="card rounded-3 text-black">
                    <div class="row g-0">
                      <div class="col-lg-6">
                        <div class="card-body p-md-5 mx-md-4">
          
                          <div class="text-center">
                            <img class="rounded" src="/img//logo.jpg" alt="logo">
                            <h4 class="mt-1 mb-5 pb-1">Please, login into your account</h4>
                          </div>
          
                          <form action="" method="post">
                            <p fs-5>Please login to your account</p>
          
                            <div class="form-outline mb-4">
                              <input type="email" id="form2Example11" name="email" class="form-control p-3 " placeholder="Username" />
                    
                            </div>
          
                            <div class="form-outline mb-4">
                              <input type="password"  class="form-control p-3 " name="password" placeholder="Password" />
                            </div>
          
                            <div class="text-center pt-1 mb-2 pb-1">
                              <input type="submit" class="btn  main-btn btn-block mb-3 w-75 p-3 fw-bold" type="button"></input>
                             
                              
                            </div>
                            <a class="text-muted text-decoration-none" href="#!">Forgot password?</a>
          
                            <div class="d-flex align-items-center justify-content-center pb-4 mt-5">
                              <p class="mb-0 me-2">Don't have an account?</p>
                              <button type="button" class="btn btn-outline-danger">Create new</button>
                            </div>
          
                          </form>
          
                        </div>
                      </div>
                      <div class="hayat col-lg-6 d-flex align-items-center">
                        <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                          <h4 class="mb-4">"Thank you for choosing us."</h4>
                          <p class="small mb-0">We are thrilled to have you join us in the world of convenient and secure banking. As you log in, rest assured that your financial well-being is our utmost priority. Whether you're checking your balance, transferring funds, or managing your accounts, our cutting-edge online platform is designed to provide you with seamless and intuitive banking experiences.
                            </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>  
    
    
    <?php endif; ?>
</body>
</html>
