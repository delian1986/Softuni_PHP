<?php

namespace Core;


class Session implements SessionInterface
{

  /**
   * @var callable
   */
  private $destroyer;

  /**
   * @var array
   */
  public $session;

  public function __construct(array $session, callable $destroyer)
  {
    $this->session = $session;
    $this->destroyer = $destroyer;
  }

//  public function destroy()
//  {
//    $this->destroyer();
//  }

  public function addMessage(string $text)
  {
    $this->session['messages'][] = $text;
  }

  public function getMessages()
  {
    return $this->session['messages'];
  }

    public function __get($name) {
        return $_SESSION[$name];
    }

    public function __set($name, $value) {
        $_SESSION[$name] = $value;
    }

    public function destroySession() {
        session_destroy();
    }

    public function getSessionId() {
        return session_id();
    }

    public function saveSession() {
        session_write_close();
    }
}