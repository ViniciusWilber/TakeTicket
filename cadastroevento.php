<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/cadastroEvento.css">
    <title>Registro do Evento</title>
</head>

<body>
    <section class="container">
        <h1>Cadastro do Evento</h1>
        <form action="" class="form">
            <div class="input-box">
                <label>Nome do evento</label>
                <input type="text" placeholder="Nome do evento" />
            </div>
            <br>
            <label>Tema do evento</label>
            <div class="select-box">
                <select>
                    <option hidden>Selecione o tipo do seu evento</option>
                    <option>Exposições</option>
                    <option>Museus</option>
                    <option>Sociais</option>
                    <option>Excursões</option>
                    <option>Trilhas</option>
                    <option>Viagens</option>
                    <option>Ferias</option>
                    <option>Atrações</option>
                </select>
            </div>
            <section class="column">
                <div class="input-box">
                    <label>Inicio do evento</label>
                    <input type="date" placeholder="DD/MM/AAAA" />
                </div>
                <div class="input-box">
                    <label>Termino do evento</label>
                    <input type="date" placeholder="DD/MM/AAAA" />
                </div>
            </section>
            <section class="gender-box">
                <h3>Tipo de evento</h3>
                <div class="gender-option">
                    <div class="gender">
                        <input type="radio" id="check" name="gender" />
                        <label for="check">Gratuito</label>
                    </div>
                    <div class="gender">
                        <input type="radio" id="check" name="gender" />
                        <label for="check">Pago</label>
                    </div>
                </div>
            </section>
            <section class="input-box endereço">
                <label for="image1">Imagem 1:</label>
                <input type="file" id="image1" name="image1" accept="image/*" />
                <label for="image2">Imagem 2:</label>
                <input type="file" id="image2" name="image2" accept="image/*" />
                <label for="image3">Imagem 3:</label>
                <input type="file" id="image3" name="image3" accept="image/*" />
                <label for="image4">Imagem 4:</label>
                <input type="file" id="image4" name="image4" accept="image/*" />
                <label>Descreva detalhadamento e seu evento</label>
                <input type="text" placeholder="Sobre" class="sobre" />
                <label>Endereço</label>
                <input type="text" id="cep" class="numero" placeholder="CEP">
                <div class="column">
                    <input type="text" id="rua" placeholder="Rua" />
                    <input type="text" placeholder="Número" />
                    <input type="text" placeholder="Complemento" />
                </div>
                <div class="column">
                    <input type="text" id="cidade" placeholder="Cidade" />
                    <input type="text" id="bairro" placeholder="Bairro" />
                    <input type="text" placeholder="Telefone" />
                </div>
            </section>
        </form>
        <div class="column">
            <a href="Evento.html"><button type="submit" class="enviar">Enviar</button></a>
            <a href="index.php"><button type="submit" class="cancelar">Cancelar</button></a>
        </div>
        <script src="js/cadastroeventos.js"></script>
    </section>
</body>
</html>