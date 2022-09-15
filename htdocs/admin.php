<?php
session_start();

include_once("./templates/header.html");

//save post type to session
if(isset($_POST["type"])){
  $_SESSION["type"] = $_POST["type"];
}

// unset and destroy session if logout is clicked
if(isset($_POST["logout"])){
  unset($_SESSION["user_name"]);
  session_destroy();
}

// get data from json file
function get_information(){
  $filename = "private/$_SESSION[type]/information.json";
  if(file_exists($filename)){
    $data = file_get_contents($filename);
    $info = json_decode($data, true);
    return $info;
  }
  else{
    echo "<h3 class='text-danger'>JSON file Not found</h3>";
  }
}

// get user data from json file
function get_user_data($user_name){
  $users = get_information()["users"];
  foreach($users as $user){
    if($user["user_name"] == $user_name){
      return $user;
    }
  }
  return null;
}

//check if user authentication is valid
if(isset($_POST["submit"])){
    if(get_user_data($_POST["login"]) !== null && 
    password_verify($_POST["password"],get_user_data($_POST["login"])["password"])){
        $_SESSION["user_name"] = $_POST["login"];
    }else{
        echo"<p class =\"error\">Utilisateur inconnu</p>";
    }
}

if(isset($_POST["save"])){
  display_main();
  generate_html_page();
  unset($_POST["save"]);
}

function generate_html_page(){
  $file = "$_SESSION[type].html";
  // Open the file to get existing content
  $current = "";
  $current .= file_get_contents("./templates/header.html");
  $current .= display_main();
  $current .= file_get_contents("./templates/footer.html");
  // Write the contents back to the file
  file_put_contents($file,$current);
}


function display_faq(){
  $faq_data ="";
  
  foreach(get_information()["Information"] as $key => $value){
    $key++;
    $faq_data.= '<button class="w-full bg-white text-gray-800 rounded-lg hover:bg-slate-100 hover:text-gray-600 active:hover:text-gray-400 flex pb-3 pt-4 px-5 title-font font-medium border border-black-100" type="button" data-bs-toggle="collapse" data-bs-target="#collapse'.$key.' "aria-expanded="false" aria-controls="collapseExample">';
    $faq_data.=    "#{$key} {$value["title"]}";      
    $faq_data.= '</button>';
    $faq_data.=  '<div class="collapse" id="collapse'.$key.'">';
    $faq_data.=    '<div class="block p-5 shadow-lg bg-white rounded-lg">';
    $faq_data.=       "<strong>{$value["question"]}</strong>{$value["answer"]}";
    $faq_data.=    '</div>';
    $faq_data.=  '</div>';
  }
  return $faq_data;
}

function display_main(){
  $main_data = "";
  $main_data .= '<main style="background-image: url(\'./img/banner.jpg\');" class="bg-cover border border-white">';
  $main_data .= '<div class="container pb-16">';
  $main_data .=     '<div class="d-flex flex-column bd-highlight m-16 ">';
  $main_data .=       '<div style=" background-image: linear-gradient(rgba(0, 255, 0, 0.5), rgba(255, 255, 255, 0.5)); height:auto; min-height: 10em; padding:3px; margin:3px;">';
  $main_data .=         '<h1 class="title display-4 text-center font-normal text-5xl p-4">';
  $main_data .=             get_information()["title"];
  $main_data .=            '<a href="./index.html" class="hover:text-gray-400 text-white border-b-4 hover:border-gray-400 border-white -mb-6">&#x1F3E0;&#x2303;</a>';
  $main_data .=           '<form method="post" action="./admin.php"  class="hover:text-gray-400 text-white mb-6 float-right">';
  $main_data .=             '<input type="hidden" name="type" value="informatique"/>';
  $main_data .=             '<button type="submit"><i class="fa-solid fa-user"></i></button>';
  $main_data .=           '</form>';
  $main_data .=         '</h1>';
  $main_data .=         display_faq();
  $main_data .=       '</div>';
  $main_data .=     '</div>';
  $main_data .=   '</div>';
  $main_data .= '</main>';

  return $main_data;
}

//delete information from json file
function delete_information($id){
  $filename = "private/$_SESSION[type]/information.json";
  $data = file_get_contents($filename);
  $info = json_decode($data, true);
  unset($info["Information"][$id]);
  $info["Information"] = array_values($info["Information"]);
  $data = json_encode($info, JSON_PRETTY_PRINT);
  file_put_contents($filename, $data);
}

if(isset($_POST["delete"])){
  delete_information(--$_POST["delete"]);
  generate_html_page();
  unset($_POST["delete"]);
}


// check if user is logged in if not show login form
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
}
//if user is logged in show admin page
else{  
  ?>
  
  <main style="background-image: url('./img/banner.jpg');" class="bg-cover border border-white">
      <div class="container pb-16">
        <div class="d-flex flex-column bd-highlight m-16 ">
            <div class="" style=" background-image: linear-gradient(rgba(0, 255, 0, 0.5), rgba(255, 255, 255, 0.5)); height:auto; min-height: 10em; padding:3px; margin:3px;">
              <h1 class="title display-4 text-center font-normal text-5xl p-4"><?=get_information()["title"]?>
                <p class="text-3xl float-left"><?= isset($_SESSION["user_name"])? $_SESSION["user_name"]:"go.fvja.ch"?></p> 
                <a href="./index.html" class="hover:text-gray-400 text-white border-b-4 hover:border-gray-400 border-white -mb-6">&#x1F3E0;&#x2303;</a>
                <form action="<?= $_SERVER["PHP_SELF"];?>" method="post" class="p-3 inline">
                <button type="submit" name="logout" class="inline-flex hover:text-white text-black mx-4 border bg-slate-100 bg-black-500  py-1 px-6 focus:outline-none hover:bg-green-600 rounded text-lg mb-6 float-right">Logout</button>
                </form>
              </h1>
              
              <?php foreach(get_information()["Information"] as $key => $value):?>
                <?php $key++;?>
                  <div class="w-full bg-white text-gray-800 rounded-lg flex justify-between hover:bg-slate-100 hover:text-gray-600 active:hover:text-gray-400 pb-3 pt-4 px-5 title-font font-medium border border-black-100" 
                  type="button" data-bs-toggle="collapse" data-bs-target="<?="#collapse{$key}"?>" aria-expanded="false" aria-controls="collapseExample">
                    <div><?="#{$key} {$value["title"]}"?></div>
                    <form method="POST" action="<?= $_SERVER["PHP_SELF"];?>">
                      <button type="submit" name="delete" value="<?=$key?>">
                      <i class="fa-solid fa-trash"></i>
                      </button>
                    </form>
                  </div>

                <div class="collapse" id="<?="collapse{$key}"?>">
                  <div class="block p-5 shadow-lg bg-white rounded-lg">
                    <strong><?=$value["question"]?></strong><?=$value["answer"]?>
                  </div>
                </div>
              <?php endforeach ?>

              <form action="<?=$_SERVER["PHP_SELF"]?>" method="post" class="flex space-x-2 justify-center">
                  <button type="submit" name="save" class="inline-block px-6 py-2.5 bg-blue-500 text-white leading-tight uppercase rounded-lg shadow-md hover:bg-green-600 hover:shadow-lg focus:bg-green-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-700 active:shadow-lg transition duration-150 ease-in-out">Save</button>
              </form>
  
            </div>
        </div>
      </div>
    </main>
     
  <?php
  }
  
  include_once("./templates/footer.html");
  