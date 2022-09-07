<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="Robiel Tesfazghi">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
  <link rel="stylesheet" href="./css/style.css">
  <script defer src="../node_modules/tw-elements/dist/js/index.min.js"></script>
  <title id="title">Commerce</title>
</head>
<body>
  <header class="body-font bg-zinc-800 text-white flex pb-3 pt-2 md:flex-row items-center">
      <a class="flex justify-between title-font font-medium items-center mb-4 md:mb-0 " href="/index.html">
        <img src="./img/favicon-228x228.png"  title="Logo http://go.fvja.ch" class="p-0.5 float-left" alt="Logo GO" width="35" height="35">
        <span class="text-xl">GO</span>
      </a>
      <nav class="md:mr-auto md:ml-4 md:py-1 md:pl-4 flex flex-wrap items-center text-base justify-center">
        <div class="dropdown relative">
            <a class=" flex mr-5 hover:text-gray-300 text-gray-400" href="#" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              <p>Utilisateur</p>
              <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="caret-down" class="w-2 ml-2" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                <path fill="currentColor" d="M31.3 192h257.3c17.8 0 26.7 21.5 14.1 34.1L174.1 354.8c-7.8 7.8-20.5 7.8-28.3 0L17.2 226.1C4.6 213.5 13.5 192 31.3 192z"></path>
              </svg> 
            </a>
          <ul class="dropdown-menu min-w-max absolute hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded-lg shadow-lg mt-1 hidden m-0 bg-clip-padding border-none"aria-labelledby="dropdownMenuButton9">
            <li> <a class=" dropdown-item text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 hover:bg-gray-100" href="#">Action</a></li>
            <li><a class="dropdown-item text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 hover:bg-gray-100" href="#">Another action</a></li>
            <li><a class="dropdown-item text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 hover:bg-gray-100" href="#">Something else here</a></li>
          </ul>
        </div>
        <div class="dropdown relative">
            <a class="flex mr-5 hover:text-gray-300 text-gray-400" href="#" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              <p>Entrez</p>
              <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="caret-down" class="w-2 ml-2" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                <path fill="currentColor" d="M31.3 192h257.3c17.8 0 26.7 21.5 14.1 34.1L174.1 354.8c-7.8 7.8-20.5 7.8-28.3 0L17.2 226.1C4.6 213.5 13.5 192 31.3 192z"></path>
              </svg> 
            </a>
          <ul class="dropdown-menu min-w-max absolute hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded-lg shadow-lg mt-1 hidden m-0 bg-clip-padding border-none"aria-labelledby="dropdownMenuButton9">
            <li> <a class=" dropdown-item text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 hover:bg-gray-100" href="#">Action</a></li>
            <li><a class="dropdown-item text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 hover:bg-gray-100" href="#">Another action</a></li>
            <li><a class="dropdown-item text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 hover:bg-gray-100" href="#">Something else here</a></li>
          </ul>
        </div>
        <div class="dropdown relative">
            <a class="flex mr-2 hover:text-gray-300 text-gray-400" href="php/exit.php" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              <p>Quitter<span class="sr-only">(current)</span></p>
              <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="caret-down" class="w-2 ml-2" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                <path fill="currentColor" d="M31.3 192h257.3c17.8 0 26.7 21.5 14.1 34.1L174.1 354.8c-7.8 7.8-20.5 7.8-28.3 0L17.2 226.1C4.6 213.5 13.5 192 31.3 192z"></path>
              </svg>
            </a>
          <ul class="dropdown-menu min-w-max absolute hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded-lg shadow-lg mt-1 hidden m-0 bg-clip-padding border-none"aria-labelledby="dropdownMenuButton9">
            <li> <a class=" dropdown-item text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 hover:bg-gray-100" href="#">Action</a></li>
            <li><a class="dropdown-item text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 hover:bg-gray-100" href="#">Another action</a></li>
            <li><a class="dropdown-item text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 hover:bg-gray-100" href="#">Something else here</a></li>
          </ul>
        </div>
        <div class="dropdown relative">
          <a class="hover:text-gray-900 text-2xl"href="u_update.php"><?= isset($_SESSION["user_name"])? $_SESSION["user_name"]:"go.fvja.ch"?></a>
        </div>
      </nav>
      <form class="flex ">
        <div class="inline-flex relative mr-8 md:w-full lg:w-full">
          <input type="text" class="form-control block w-full px-3 py-1.5 w-60 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="Search"/>
        </div>
        <button class="inline-flex hover:text-white text-green-600 mr-4 border border-green-600 bg-black-500  py-1 px-6 focus:outline-none hover:bg-green-600 rounded text-lg">Search</button>
      </form>
      
      <a class="title-font font-medium items-center inline-block" href="/go.php">
        <img src="./img/swissserverhosting-01-1-2104885170" title="Swiss Switzerland Hosting" class="p-0.5 float-left" alt="Switzerland Swiss Hosting" width="35" height="35">
      </a>
  </header>

  <?php
  if(isset($_GET["action"]) && $_GET["action"] == "logout"){
      unset($_SESSION["user_name"]);
      session_destroy();
  }

  if(isset($_POST["logout"])){
    unset($_SESSION["user_name"]);
    session_destroy();
  }

  function get_information(){
    $filename = "private/$_POST[type]/information.json";
    if(file_exists($filename)){
      $data = file_get_contents($filename);
      $info = json_decode($data, true);
      return $info;
    }
    else{
      echo "<h3 class='text-danger'>JSON file Not found</h3>";
    }
  }

  function get_user_data($user_name){
    $users = get_information()["users"];
    foreach($users as $user){
      if($user["user_name"] == $user_name){
        return $user;
      }
    }
    return null;
  }


  if(isset($_POST["submit"])){
      if(get_user_data($_POST["login"]) !== null && 
      password_verify($_POST["password"],get_user_data($_POST["login"])["password"])){
          $_SESSION["user_name"] = $_POST["login"];
      }else{
          echo"<p class =\"error\">Utilisateur inconnu</p>";
      }
  }

  if(!isset($_SESSION["user_name"])){ 
?>
 <section class="h-screen bg-cover bg-center"  style="background-image: url('./img/banner.jpg');">
      <div class="container px-6 py-12 h-full">
        <div class="flex justify-center items-center flex-wrap h-full g-6 text-gray-800">
          <div class="md:w-8/12 lg:w-6/12 mb-12 md:mb-0">
            <img
              src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
              class="w-full"
              alt="Phone image"
            />
          </div>
          <div class="md:w-8/12 lg:w-5/12 lg:ml-20">
            <form  action="<?= $_SERVER["PHP_SELF"];?>" method="POST">
            <input type="hidden" name="type" value="<?=$_POST["type"]?>"/>
              <!-- Email input -->
              <div class="mb-6">
                <input
                  type="text"
                  class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                  placeholder="Username"
                  name="login"
                />
              </div>

              <!-- Password input -->
              <div class="mb-6">
                <input
                  type="password"
                  class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                  placeholder="Password"
                  name="password"
                />
              </div>

              <div class="flex justify-between items-center mb-6">
                <div class="form-group form-check">
                  <input
                    type="checkbox"
                    class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                    id="exampleCheck3"
                    checked
                  />
                  <label class="form-check-label inline-block text-gray-800" for="exampleCheck2"
                    >Remember me</label
                  >
                </div>
                <a
                  href="#!"
                  class="text-blue-600 hover:text-blue-700 focus:text-blue-700 active:text-blue-800 duration-200 transition ease-in-out"
                  >Forgot password?</a
                >
              </div>

              <!-- Submit button -->
              <button
                type="submit"
                class="inline-block px-7 py-3 bg-blue-600 text-white font-medium text-sm leading-snug uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out w-full"
                data-mdb-ripple="true"
                data-mdb-ripple-color="light"
                name="submit"
              >
                Log in
              </button>     
            </form>
          </div>
        </div>
      </div>
    </section>
<?php
}else{
    header("Refresh:5");
    // printf("Bienvenue $_POST[type] $_SESSION[user_name], <a href=\"?action=logout\">Se déconnecter</a>",);   
}
?>

<main style="background-image: url('./img/banner.jpg');" class="bg-cover border border-white">
    <div class="container pb-16">
      <div class="d-flex flex-column bd-highlight m-16 ">
          <div class="" style=" background-image: linear-gradient(rgba(0, 255, 0, 0.5), rgba(255, 255, 255, 0.5)); height:auto; min-height: 10em; padding:3px; margin:3px;">
            <h1 class="title display-4 text-center font-normal text-5xl p-4"><?=get_information()["title"]?> 
              <a href="./index.html" class="hover:text-gray-400 text-white border-b-4 hover:border-gray-400 border-white -mb-6">&#x1F3E0;&#x2303;</a>
              <form action="<?= $_SERVER["PHP_SELF"];?>" method="post" class="p-3 inline">
              <button type="submit" name="logout" class="inline-flex hover:text-white text-black mx-4 border bg-slate-100 bg-black-500  py-1 px-6 focus:outline-none hover:bg-green-600 rounded text-lg mb-6 float-right">Logout</button>
              </form>
            </h1>
                <button class="w-full bg-white text-gray-800 rounded-t-md hover:bg-slate-100 hover:text-gray-600 active:hover:text-gray-400 flex pb-3 pt-4 px-5 title-font font-medium border border-black-100" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="false" aria-controls="collapseExample">
                  #1 avec Go-Job de faire
                </button>
              </p>
              <div class="collapse" id="collapse1">
                <div class="block p-5 shadow-lg bg-white">
                  <strong>Est il possible avec Go-Job de faire un ....?</strong> Il est parfaite possible de faire cela et de manière très simple. Pour cela il suffit de réaliser en trois étapes. Vous pouvez trouver le document à l'adresse suivante: <code>.accordion-body</code>, Pour plus d'informations veuillez contacter ....
                </div>
              </div>
              <button class="w-full bg-white text-gray-800 hover:bg-slate-100 hover:text-gray-600 active:hover:text-gray-400 flex pb-3 pt-4 px-5 title-font font-medium border border-black-100" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapseExample">
                #2 aire un nouveau compte avec Go-job
              </button>
            </p>
            <div class="collapse" id="collapse2">
              <div class="block p-5 shadow-lg bg-white">
               <strong>Comment faire un nouveau compte?.</strong> Il est parfaite possible de faire cela et de manière très simple. Pour cela il suffit de réaliser en trois étapes. Vous pouvez trouver le document à l'adresse suivante: <code>.accordion-body</code>, Pour plus d'informations veuillez contacter ....
              </div>
            </div>
            <button class="w-full bg-white text-gray-800  rounded-b-md hover:bg-slate-100 hover:text-gray-600 active:hover:text-gray-400 flex pb-3 pt-4 px-5 title-font font-medium border border-black-100" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapseExample">
              #3 faire un nouvel article
            </button>
          </p>
          <div class="collapse" id="collapse3">
            <div class="block p-5 shadow-lg bg-white">
              <strong>Comment faire un nouvel article?.</strong> Il est parfaite possible de faire cela et de manière très simple. Pour cela il suffit de réaliser en trois étapes. Vous pouvez trouver le document à l'adresse suivante: <code>.accordion-body</code>, Pour plus d'informations veuillez contacter ....
            </div>
          </div>
          </div>
      </div>
    </div>
  </main>
  <hr class="bg-white m-4">

   
<footer class="body-font bg-zinc-800 text-white">
    <div class="container px-5 py-12 mx-auto flex md:items-center lg:items-start md:flex-row md:flex-nowrap flex-wrap flex-col">

      <div class="flex-grow flex flex-wrap md:pl-20 -mb-10 md:mt-0 mt-10 md:text-left text-center">
        <div class="lg:w-1/4 md:w-1/2 w-full px-4">
          <h2 class="title-font font-medium tracking-widest text-lg mb-8">NOM DE L'ENTREPRISE</h2>
          <nav class="list-none mb-10 -ml-10 text-center">
            <p>Fondation Valaisanne<br/>Action Jeunesse<br/>Rue des Tonneliers 5<br/>1950 Sion</p>
          </nav>
        </div>
        <div class="lg:w-1/4 md:w-1/2 w-full px-4">
          <h2 class="title-font font-medium tracking-widest text-lg mb-8">PRODUITS</h2>
          <nav class="list-none mb-10">
            <li>
              <div class="flex mb-3">
                <i class="fas fa-globe mr-3"></i>
                <a href="/index.php" class=" hover:text-gray-800">go.fvaj.ch</a>
              </div>
            </li>
            <li>
              <div class="flex mb-3">
                <i class="fas fa-globe mr-3"></i>
                <a href="/glpi/" class=" hover:text-gray-800">GLPI</a>
              </div>
            </li>
            <li>
              <div class="flex mb-3">
                <i class="fas fa-globe mr-3"></i>
                <a href="/faq/" class=" hover:text-gray-800">FAQ</a>
              </div>
            </li>
            <li>
             <div class="flex mb-3">
              <i class="far fa-file-pdf mr-3" aria-hidden="true"></i>
              Flyer 
              <a href="eaia_en.pdf" class=" hover:text-gray-800">[EN]</a> 
              <a href="eaia_fr.pdf" class=" hover:text-gray-800">[FR]</a> 
              <a href="eaia_it.pdf" class=" hover:text-gray-800">[IT]</a>
             </div>
            </li>
            <li>
              <div class="flex mb-3">
              <i class="fab fa-facebook-f mr-3"></i>
              <a href="https://www.facebook.com/pg/actionjeunesse">FaceBook</a>
              </div>
            </li>
          </nav>
        </div>
        <div class="lg:w-1/4 md:w-1/2 w-full px-4">
          <h2 class="title-font font-medium tracking-widest text-lg mb-8">LIENS UTILES</h2>
          <nav class="list-none mb-10">
            <li class=" mb-3">
              <a href="/releasenotes.php" class=" hover:text-gray-800 py-4">Release Notes</a>
            </li>
            <li class=" mb-3">
              <a href="/faq" class=" hover:text-gray-800 mb-3">F.A.Q.</a>
            </li>
            <li class=" mb-3">
              <a href="/u_register.php" class=" hover:text-gray-800">Enregistrement</a>
            </li>
            <li class=" mb-3">
              <a href="/eaia_fr.php" class=" hover:text-gray-800">Utilisations</a>
            </li>
            <li class=" mb-3">
              <a href="/slide/" class=" hover:text-gray-800">Slide</a>
            </li>
          </nav>
        </div>
        <div class="lg:w-1/4 md:w-1/2 w-full px-4">
          <h2 class="title-font font-medium  tracking-widest text-lg mb-8">CONTACTS</h2>
          <nav class="list-none mb-10">
            <li>
             <div class="flex  mb-3">
              <i class="fas fa-home mr-3"></i>             
              <a class=" hover:text-gray-800" href="https://goo.gl/maps/MiNPpYPHXyPzdUm56">5, Rue de Tonneliers, Sion CH</a>
             </div>
            </li>
            <li>
              <div class="flex mb-3">
                <i class="fas fa-envelope mr-3"></i>
                <a class=" hover:text-gray-800" href="mailto:info@fvaj.ch?subject=HelpDesk">FVAJ.CH</a>
              </div>
            </li>
            <li>
              <div class="flex mb-3">
                <i class="fas fa-phone mr-3"></i>              
                <a class="hover:text-gray-800" href="tel:+41273211111">+41 27 321 11 11</a>
              </div>
            </li>
            <li>
              <div class="flex mb-3">
                <i class="fab fa-skype mr-3"></i>
              <a class=" hover:text-gray-800" href="skype:xhtml2?call">FVAJ.CH</a>
              </div>
            </li>
            <li>
              <div class="flex mb-3">
                <i class="fab fa-whatsapp mr-3"></i>
              <a class=" hover:text-gray-800" href="https://api.whatsapp.com/send?phone=41273211111">fvaj.ch</a>
              </div>
            </li>
          </nav>
        </div>
      </div>
    </div>
      <div class="container mx-auto py-4 px-5 flex flex-wrap flex-col sm:flex-row border-t border-gray-600">
        <p class="text-sm text-center sm:text-left">
          <span class="font-bold">© -1-Computer</span>
          <a href="https://1computer.info/" rel="noopener noreferrer" class=" ml-1" target="_blank">SaaS Web Consulting & Development Services 1985 - 2021 V21.0508</a>
        </p>
        <span class="inline-flex sm:ml-auto sm:mt-0 mt-2 justify-center sm:justify-start">
          <a class="btn-floating btn-sm rgba-white-slight mr-3 ptb-3" href="https://t.me/eaiaio">
            <i class="fab fa-telegram"></i>
          </a>
          <a class="btn-floating btn-sm rgba-white-slight mr-3 ptb-3" href="https://www.facebook.com/1computer.info/">
            <i class="fab fa-facebook-f"></i>
          </a>
          <a class="btn-floating btn-sm rgba-white-slight mr-3 ptb-3" href="https://twitter.com/xhtml">
            <i class="fab fa-twitter"></i>
          </a>
          <a class="btn-floating btn-sm rgba-white-slight mr-3 ptb-3" href="https://www.pinterest.ch/1computer_info/">
            <i class="fab fa-pinterest"></i>
          </a>
          <a class="btn-floating btn-sm rgba-white-slight mr-3 ptb-3" href="https://www.youtube.com/playlist?list=PLGk3gj6yMLvEdb-QhJ2zPt9BybUuL0jP3">
            <i class="fab fa-youtube"></i>
          </a>
          <a class="btn-floating btn-sm rgba-white-slight mr-3 ptb-3" href="https://hangouts.google.com/group/5uuV3WZKipaG3d95A">
            <i class="fab fa-google"></i>
          </a>
          <a class="btn-floating btn-sm rgba-white-slight mr-3 ptb-3" href="https://www.linkedin.com/in/1computer/">
            <i class="fab fa-linkedin-in"></i>
          </a>
          <a class="btn-floating btn-sm rgba-white-slight mr-3 ptb-3" href="https://www.xing.com/profile/Raoul_Mengis">
            <i class="fab fa-xing"></i>
          </a>
          <a class="btn-floating btn-sm rgba-white-slight mr-3 ptb-3" href="https://ch.viadeo.com/fr/profile/raoul.mengis">
            <i class="fab fa-viadeo"></i>
          </a>
          <a class="btn-floating btn-sm rgba-white-slight mr-3 ptb-3" href="https://fr.slideshare.net/xhtml">
            <i class="fab fa-slideshare"></i>
        </a>
        </span>
      </div>
  </footer>
  <script src="./TW-ELEMENTS-PATH/dist/js/index.min.js"></script>
</body>
</html>
