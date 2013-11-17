<?php
class Plugin_session_plugin extends Plugin {
	public $meta = array(
        'name'       => 'session_plugin',
        'version'    => '1.1',
        'author'     => 'Torin, Karthik',
        'author_url' => ''
  	);

	public function is_verified() {


    if ( (isset($_COOKIE["over21"]) && $_COOKIE["over21"] === "Yes") ){
      return true;
    }

    if ( isset($_POST["over21"]) && $_POST["over21"] === "Yes" ){
      if (isset($_POST['remember-me']) ) {
        setcookie("over21", "Yes", time()+3600*24*25);
      }
      else {
        setcookie("over21", "Yes", time()+3600*2);        
      }

      if (isset($_POST['nextUrl'])){
        header("Location: ". $_POST['nextUrl'] );
        exit();
      }

      return true;
    }

    return false;
        
	}
  public function nextUrl() {
      if (isset($_POST['nextUrl'])) {
        return '<input type="hidden" name="nextUrl" value="'. $_POST['nextUrl'] .'" />';
      }
      else {
        return '<input type="hidden" name="nextUrl" value="'. $_SERVER['REQUEST_URI'] .'" />';
      }
  }
}
