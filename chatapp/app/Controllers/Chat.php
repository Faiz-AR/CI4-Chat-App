<?php

namespace App\Controllers;

class Chat extends BaseController
{
    public function index()
    {

      if(!session()->has('entered')){

        session()->set('entered', true);

        $cb = fopen ("chat_log.html", 'a' );
          fwrite ($cb, "<div class='msgln'><i>User " . esc(current_user()->username) . " has joined the chat session.</i><br></div>" );
          fclose ($cb);

      }

          # Reads the contents of the chatlog file
          if (file_exists ( "chat_log.html" ) && filesize ( "chat_log.html" ) > 0) {
            $handle = fopen ( "chat_log.html", "r" );
            $contents = fread ( $handle, filesize ( "chat_log.html" ) );
            fclose ( $handle );
          }

          # Pass data back into Chat View
          $data = array(
            'chat_history' => $contents,
          );

        return view('Chat/index', $data);
    }

    public function logout(){

      # Append a new message indicatting the current user has left
      $cb = fopen ( "chat_log.html", 'a' );
      fwrite ( $cb, "<div class='msgln'><i>User " . esc(current_user()->username)  . " has left the chat session.</i><br></div>" );
      fclose ( $cb );

      return redirect()->to('/logout');
    }

    public function post(){

      $text = $_POST['text'];

      if ($text === "") {
        return redirect()->to('/chat')
                            ->withInput()
                            ->with('warning', "Please don't leave the message field empty!");
      }
      date_default_timezone_set('Asia/Brunei');
      
      $cb = fopen("chat_log.html", 'a');
      fwrite($cb, "<div class='msgln'>(" . date("g:i A") . ") <b>" . esc(current_user()->username) . "</b>: ". stripslashes(htmlspecialchars($text)) . "<br></div>");
      fclose($cb);

    }
}
