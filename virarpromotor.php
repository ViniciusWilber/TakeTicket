<?php
include_once "header.php"; 
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Promotor</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f3f3f3;
        }

        .container {
            width: 100%;
            max-width: 400px;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            margin: 80px auto; /* Espaço abaixo do header */
        }

        .container h1 {
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-group input:focus,
        .form-group select:focus {
            border-color: #007bff;
            outline: none;
        }

        .btn-submit {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-submit:hover {
            background-color: #0056b3;
        }

        .form-footer {
            margin-top: 15px;
            text-align: center;
            font-size: 14px;
            color: #666;
        }

        .form-footer a {
            color: #007bff;
            text-decoration: none;
        }

        .form-footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Cadastro de Promotor</h1>
        <form action="#" method="POST">
            <div class="form-group">
                <label for="nome">Nome Completo</label>
                <input type="text" id="nome" name="nome" placeholder="Digite seu nome completo" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Digite seu email" required>
            </div>
            <div class="form-group">
                <label for="telefone">Telefone</label>
                <input type="tel" id="telefone" name="telefone" placeholder="(XX) XXXXX-XXXX" required>
            </div>
            <div class="form-group">
                <label for="experiencia">Experiência como Promotor</label>
                <select id="experiencia" name="experiencia" required>
                    <option value="" disabled selected>Selecione</option>
                    <option value="menos1ano">Menos de 1 ano</option>
                    <option value="1a3anos">1 a 3 anos</option>
                    <option value="3a5anos">3 a 5 anos</option>
                    <option value="mais5anos">Mais de 5 anos</option>
                </select>
            </div>
            <button type="submit" class="btn-submit">Tornar-se Promotor</button>
        </form>
        <div class="form-footer">
            <p>Já possui uma conta? <a href="login.html">Entrar</a></p>
        </div>
    </div>
</body>
</html>
