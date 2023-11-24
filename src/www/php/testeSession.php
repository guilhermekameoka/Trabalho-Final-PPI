<?php
require "sessionmanager.php";
session_start(); 

$sessionManager = new SessionManager();

$id = $sessionManager->get("id");

if ($id !== null) {
    echo "ID do paciente na sessão: " . $id;
} else {
    echo "ID do paciente não encontrado na sessão.";
}
