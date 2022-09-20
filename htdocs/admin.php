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
        $_SESSION["user_name"] = $_POST["login"].'/'.$_SESSION["type"];
        
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
  $main_data .=             '<input type="hidden" name="type" value="'.$_SESSION["type"].'"/>';
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

//add information to json file

if(isset($_POST["add"])){
  add_information($_POST["title"], $_POST["question"], $_POST["answer"]);
  generate_html_page();
  unset($_POST["add"],$_POST["title"],$_POST["question"],$_POST["answer"]);
}
function add_information($title, $question, $answer){
  $filename = "private/$_SESSION[type]/information.json";
  $data = file_get_contents($filename);
  $info = json_decode($data, true);
  $info["Information"][] = array("title" => $title, "question" => $question, "answer" => $answer,"star"=>0,"isEditing"=>false);
  $data = json_encode($info, JSON_PRETTY_PRINT);
  file_put_contents($filename, $data);
}



//delete information from json file

if(isset($_POST["delete"])){
  delete_information(--$_POST["delete"]);
  generate_html_page();
  unset($_POST["delete"]);
}
function delete_information($id){
  $filename = "private/$_SESSION[type]/information.json";
  $data = file_get_contents($filename);
  $info = json_decode($data, true);
  unset($info["Information"][$id]);
  $info["Information"] = array_values($info["Information"]);
  $data = json_encode($info, JSON_PRETTY_PRINT);
  file_put_contents($filename, $data);
}



// check if user is logged in if not show login form
if(isset($_SESSION["user_name"]) && explode('/',$_SESSION["user_name"])[1] == $_SESSION["type"]){
?>
 <main style="background-image: url('./img/banner.jpg');" class="bg-cover border border-white">
  <div class="container pb-16">
    <div class="d-flex flex-column bd-highlight m-16 ">
        <div class="" style=" background-image: linear-gradient(rgba(0, 255, 0, 0.5), rgba(255, 255, 255, 0.5)); height:auto; min-height: 10em; padding:3px; margin:3px;">
          <h1 class="title display-4 text-center font-normal text-5xl p-4"><?=get_information()["title"]?>
            <p class="text-3xl float-left"><?= isset($_SESSION["user_name"])? explode('/',$_SESSION["user_name"])[0]:"go.fvja.ch"?></p> 
            <a href="./index.html" class="hover:text-gray-400 text-white border-b-4 hover:border-gray-400 border-white -mb-6">&#x1F3E0;&#x2303;</a>
            <form action="<?= $_SERVER["PHP_SELF"];?>" method="post" class="p-3 inline">
            <button type="submit" name="logout" class="inline-flex hover:text-white text-black mx-4 border bg-slate-100 bg-black-500  py-1 px-6 focus:outline-none hover:bg-green-600 rounded text-lg mb-6 float-right">Logout</button>
            </form>
          </h1>
          
          <?php foreach(get_information()["Information"] as $key => $value):?>
            <?php $key++;?>
            <?php if($_POST["edit"] != $key):?>
              <div class="w-full bg-white text-gray-800 rounded-lg flex justify-between hover:bg-slate-100 hover:text-gray-600 active:hover:text-gray-400 pb-3 pt-4 px-5 title-font font-medium border border-black-100" 
                type="button" data-bs-toggle="collapse" data-bs-target="<?="#collapse{$key}"?>" aria-expanded="false" aria-controls="collapseExample">
                <div><?="#{$key} {$value["title"]}"?></div>
                <div class="flex">
                  <form method="POST" action="<?= $_SERVER["PHP_SELF"];?>">
                    <button name="edit" class="mr-4" value="<?=$key?>" data-bs-toggle="collapse" data-bs-target="<?="#collapseEdit{$key}"?>" aria-expanded="false" aria-controls="collapseExample">
                      <i class="fa-solid fa-edit"></i>
                    </button>
                  </form>
                  <form method="POST" action="<?= $_SERVER["PHP_SELF"];?>">
                    <button type="submit" name="delete" value="<?=$key?>">
                    <i class="fa-solid fa-trash"></i>
                    </button>
                  </form>
                </div>
              </div>
              <div class="collapse" id="<?="collapseEdit{$key}"?>">
              <div class="block p-5 shadow-lg bg-white rounded-lg">
                <strong><?=$value["question"]?></strong><?=$value["answer"]?>
              </div>
            </div>

            <div class="collapse" id="<?="collapse{$key}"?>">
              <div class="block p-5 shadow-lg bg-white rounded-lg">
                <strong><?=$value["question"]?></strong><?=$value["answer"]?>
              </div>
            </div>
            <?php else:?>
              <div class="w-full bg-white text-gray-800 rounded-lg flex justify-between hover:bg-slate-100 hover:text-gray-600 active:hover:text-gray-400 pb-3 pt-4 px-5 title-font font-medium border border-black-100" 
                type="button" data-bs-toggle="collapse" data-bs-target="<?="#collapse{$key}"?>" aria-expanded="false" aria-controls="collapseExample">
                <?="#{$key} {$value["title"]}"?></div>
              <div class="flex w-full md:justify-start justify-center items-center">
              <div class="relative m-4 md:w-full lg:w-full xl:w-1/2 w-2/4">
                
                <div class="relative mb-4">
                  <label for="title" class="leading-7 text-sm text-gray-600">Title</label>
                  <textarea id="title" name="title" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 transition-colors duration-200 ease-in-out"
                  ><?=$value["title"]?></textarea>
                </div>
                <div class="relative mb-4">
                  <label for="question" class="leading-7 text-sm text-gray-600">Question</label>
                  <textarea id="question" name="question" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 transition-colors duration-200 ease-in-out"
                  ><?=$value["question"]?></textarea>
                </div>
                <div class="relative">
                  <label for="answer" class="leading-7 text-sm text-gray-600">Answer</label>
                  <textarea id="answer" name="answer"  class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 resize-none transition-colors duration-200 ease-in-out"
                  ><?=$value["answer"]?></textarea>
                </div>
              </div>
              <button type="submit" name="update" class="m-4 px-6 inline-block py-2.5 bg-blue-500 text-white leading-tight uppercase rounded-lg shadow-md hover:bg-green-600 hover:shadow-lg focus:bg-green-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-700 active:shadow-lg transition duration-150 ease-in-out">Update</button>
            </div>
          </form>
            <?php endif;?>
              
          <?php endforeach ?>

          <button class="w-full justify-center bg-white text-gray-800 rounded-t-md hover:bg-slate-100 hover:text-gray-600 active:hover:text-gray-400 flex pb-3 pt-4 px-5 title-font font-medium border border-black-100" data-bs-toggle="collapse" data-bs-target="#collapseNew" aria-expanded="false" aria-controls="collapseExample">
            <i class="fa-sharp fa-solid fa-plus"></i>
          </button>
          <form action="<?=$_SERVER["PHP_SELF"]?>" id="collapseNew" method="post" class="flex collapse bg-gray-400 md:ml-auto w-full md:py-8 mt-8 md:mt-0">
            <div class="flex w-full md:justify-start justify-center items-stretch">
              <div class="relative m-4 md:w-full lg:w-full xl:w-1/2 w-2/4">
                <div class="relative mb-4">
                  <input type="text" placeholder="Title" id="title" name="title" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
                <div class="relative mb-4">
                  <input type="text" id="question" placeholder="Question" name="question" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
                <div class="relative">
                  <textarea id="answer" name="answer" placeholder="Answer" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
                </div>
              </div>
              <button type="submit" name="add" class="m-4 px-6 inline-block py-2.5 bg-blue-500 text-white leading-tight uppercase rounded-lg shadow-md hover:bg-green-600 hover:shadow-lg focus:bg-green-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-700 active:shadow-lg transition duration-150 ease-in-out">Add</button>
            </div>
          </form>
        </div>
    </div>
  </div>
</main>

<?php
}
//if user is logged in show admin page
else{  
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
  
  include_once("./templates/footer.html");
  