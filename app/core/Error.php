<?php
  //error handler function
  function custom_error1($err_no, $err_str,$namefile) {
    $apiToken = "6131045770:AAEKvsKpEujDlZy0vjq7tSkgEyPpxERIBt4";
    //$apiToken = "5823951452:AAH1q2Y1g4mLZSU9NP7-H9qJIYKlHPt2-h4";
    $date = date("Y-m-d H:s:i");
    $string = "<b>$namefile</b> \n <b>DateTime :</b> $date \n <b>Error caught!</b> \n [$err_no] $err_str";

    $data = [
        'chat_id' => '-829575361',
        'parse_mode' => 'html',
        'text' => $string
    ];
   $response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($data) );
    //print_r($response);
    die();
  }

  set_error_handler("errorHandler");
  register_shutdown_function("shutdownHandler");

function errorHandler($error_level, $error_message, $error_file, $error_line, $error_context="")
{
$NameFile = explode("\\",$error_file);
$NameFile = end($NameFile);
$error ="<b>lvl:</b> " . $error_level . " \n <b>Msg:</b>" . $error_message . " \n <b>File:</b>" . $error_file . " \n <b>Line:</b>" . $error_line;
switch ($error_level) {
    case E_ERROR:
    case E_CORE_ERROR:
    case E_COMPILE_ERROR:
    case E_PARSE:
        mylog($error, "fatal",$NameFile);
        break;
    case E_USER_ERROR:
    case E_RECOVERABLE_ERROR:
        mylog($error, "error",$NameFile);
        break;
    case E_WARNING:
    case E_CORE_WARNING:
    case E_COMPILE_WARNING:
    case E_USER_WARNING:
        mylog($error, "warn",$NameFile);
        break;
    case E_NOTICE:
    case E_USER_NOTICE:
        mylog($error, "info",$NameFile);
        break;
    case E_STRICT:
        mylog($error, "debug",$NameFile);
        break;
    default:
        mylog($error, "warn",$NameFile);
}
}

function shutdownHandler() //will be called when php script ends.
{
$lasterror = error_get_last();
if(isset($lasterror['type'])){
    switch ($lasterror['type'])
    {
        case E_ERROR:
        case E_CORE_ERROR:
        case E_COMPILE_ERROR:
        case E_USER_ERROR:
        case E_RECOVERABLE_ERROR:
        case E_CORE_WARNING:
        case E_COMPILE_WARNING:
        case E_PARSE:
            //print_r($lasterror);die;
            $NameFile = end(explode('\\',$lasterror['file']));
            $error = "[SHUTDOWN] \n <b>Msg:</b> " . $lasterror['message'] . " \n <b>File:</b> ". $lasterror['file']. " \n <b>Line:</b> ". $lasterror['line'];
            mylog($error, "fatal",$NameFile);
    }
}
}

function mylog($error, $errlvl,$NameFile)
{
    custom_error1($errlvl, $error,$NameFile);
}
?>