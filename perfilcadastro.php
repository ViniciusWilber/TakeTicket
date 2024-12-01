<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://kit.fontawesome.com/224a2d2542.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/perfilcadastro.css">
    <title>Perfil/ViniciusWilber</title>
</head>
<body>
    <header>
        <a href="index.php"><img src="LogoSomente.png" alt="Logo"></a>
        <ul class="botoes">
            <li><a href="cadastroevento.php" class="SejaMenbro">Promover Evento</a></li>
            <li><a href="login.php" class="Login">Login</a></li>
        </ul>
    </header>
    <main class="Perfil">
        <div class="esquerda">
            <img src="imagen/AdobeStock_638744252_Preview.jpeg" alt="Imagem de Perfil" id="imgPerfil">
            <div class="sociais">
                <div>
                    <p>Redes Sociais</p><hr>
                </div>
                <div class="sobre">
                    <i class="fab fa-facebook-square"></i><a href="#">Facebook</a>
                </div>
                <div class="sobre">
                    <i class="fab fa-instagram-square"></i><a href="#">Instagram</a>
                </div>
                <div class="sobre">
                    <i class="fab fa-twitter-square"></i><a href="#">Twitter</a>
                </div>
                <div class="sobre">
                    <i class="fab fa-tiktok"></i><a href="#">TikTok</a>
                </div>
                <div class="resumo">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam scelerisque tellus non nisi pulvinar, a pharetra nunc fringilla.</p>
                </div>
            </div>
        </div>
        <div class="direita">
            <div class="sobreMin">
                <div class="nome">
                    <h1>José Alves</h1>
                    <h5>promotor a mais de 5 anos</h5>
                </div>
                <div class="fama">
                    <div class="rating">
                        <input value="5" name="rating" id="star5" type="radio">
                        <label for="star5"></label>
                        <input value="4" name="rating" id="star4" type="radio">
                        <label for="star4"></label>
                        <input value="3" name="rating" id="star3" type="radio">
                        <label for="star3"></label>
                        <input value="2" name="rating" id="star2" type="radio">
                        <label for="star2"></label>
                        <input value="1" name="rating" id="star1" type="radio">
                        <label for="star1"></label>
                    </div>
                </div>
                <section class="container">
                    <h1>Cadastro do Evento</h1>
                    <form action="" class="form">
                        <div class="input-box">
                            <label>Nome do evento</label>
                            <input type="text" placeholder="Nome do evento" />
                        </div>
                        <br>
                        <div class="select-box">
                            <label>Tema do evento</label>
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
                                <label>Início do evento</label>
                                <input type="date" placeholder="DD/MM/AAAA" />
                            </div>
                            <div class="input-box">
                                <label>Término do evento</label>
                                <input type="date" placeholder="DD/MM/AAAA" />
                            </div>
                        </section>
                        <section class="gender-box">
                            <h3>Tipo de evento</h3>
                            <div class="gender-option">
                                <div class="gender">
                                    <input type="radio" id="check1" name="gender" />
                                    <label for="check1">Gratuito</label>
                                </div>
                                <div class="gender">
                                    <input type="radio" id="check2" name="gender" />
                                    <label for="check2">Pago</label>
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
                            <label>Descrição detalhada do evento</label>
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
                        <div class="column">
                            <a href="Evento.php"><button type="submit" class="enviar">Enviar</button></a>
                            <a href="index.php"><button type="submit" class="cancelar">Cancelar</button></a>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </main>
    <footer>
        <div>
            <a href=""><i class=""></i>Central de ajuda</a>
            <a href=""><i class=""></i>Opções de cancelamento</a>
            <a href=""><i class=""></i>Duvidas frequentes</a>
            <a href=""><i class=""></i>Apoio a pessoa com deficiencia</a>
        </div>
        <div>
            <a href=""><i class=""></i></a>
            <a href=""><i class=""></i>Carreiras</a>
            <a href=""><i class=""></i>Investidores</a>
            <a href=""><i class=""></i>Anuncies seu evento na TAKETICKET</a>
        </div>
        <div>
            <h3>Horario de atendimento</h3>
            <p>Seg.: À Sex.: 09:00 Ás 17:00</p>
            <a href=""><i class=""></i>TakeTicket@gmail.com</a>
        </div>
        <section class="termos">
            <p>2024 TakeTiket, inc.  .Privacidade  .Termos .Informaçãoes da empresa.</p>
        </section>
    </footer>
    <script src="js/perfil.js"></script>
</body>
</html>
