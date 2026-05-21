<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/config.php';

session_start();

use Services\Auth;

$mensagem = '';
$auth = new Auth();

// Se já estiver logado, redireciona para index
if (Auth::verificarLogin()) {
    header('Location: index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    
    if ($auth->login($username, $password)) {
        header('Location: index.php');
        exit;
    } else {
        $mensagem = 'Usuário ou senha inválidos';
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistema de Locadora</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .login-container {
            max-width: 400px;
            margin: 100px auto;
        
        }
     
        body{
            background-color: #aac2ff;
        }
        h4{
            color: white;
        }
    
    </style>
</head>
<body>
    <div class="login-container">
        <div class="card">
            <div class="card-header" style="background: #081f5a;">
                <h4 class="mb-0">Login</h4>
            </div>
            <div class="card-body" style="background: #6792ff">
                <?php if ($mensagem): ?>
                    <div class="alert alert-danger"><?= htmlspecialchars($mensagem) ?></div>
                <?php endif; ?>
                
                <form method="post" class="needs-validation" novalidate>
                    <div class="mb-3">
                        <label class="form-label" style="color:#240046">Usuário</label>
                        <input type="text" name="username" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" style="color:#240046">Senha</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100" style="background-color: #081f5a; color: white; border: none;">Entrar</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
