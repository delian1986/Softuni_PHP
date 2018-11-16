<?php

namespace Core;


interface SessionInterface
{

//  public function destroy(callable $destroyer);

  public function addMessage(string $text);

  public function getMessages();

    public function getSessionId();
    public function saveSession();
    public function destroySession();
    public function __get($name);
    public function __set($name,$value);
}