<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chris Brown</title>
  <link rel="stylesheet" href="styles.css">
  <style>
    #form-checkout {
      display: flex;
      flex-direction: column;
      max-width: 600px;
      /* width: 100%; */
      gap: 0.5rem;
    }

    .container {
      border-radius: 8px;
      width: 43rem;
      height: 2.8rem;
      padding: 0.5em;
      background-color: #e1e2e3;
      box-shadow: inset 2px 5px 10px rgba(0, 0, 0, 0.3);
      transition: 300ms ease-in-out;
      text-align: center;
      font-size: 20px;
    }

    .cadastro {
      border-radius: 8px;
      width: 43rem;
      height: 2.8rem;
      padding: 0.5em;
      background-color: #e1e2e3;
      box-shadow: inset 2px 5px 10px rgba(0, 0, 0, 0.3);
      transition: 300ms ease-in-out;
      text-align: center;
      font-size: 20px;
    }

    .progress-bar {
      border-radius: 8px;
      width: 43rem;
      height: 2.8rem;
      padding: 0.5em;
      background-color: #e1e2e3;
      box-shadow: inset 2px 5px 10px rgba(0, 0, 0, 0.3);
      transition: 300ms ease-in-out;
      text-align: center;
      font-size: 20px;
    }

    .botao {
      border-radius: 8px;
      width: 43rem;
      height: 2.8rem;
      padding: 0.5em;
      background-color: #e1e2e3;
      box-shadow: inset 2px 5px 10px rgba(0, 0, 0, 0.3);
      transition: 300ms ease-in-out;
      text-align: center;
      font-size: 20px;
    }

    .junto {
      display: flex;
      gap: 2%;
    }

    .direita img {
      width: 27rem;
      border-radius: 2rem 2rem 0 0;
    }

    .direita {
      flex-grow: 1;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      background-color: rgba(16, 154, 189, 0.418);
      height: 800px;
      gap: 1rem;
      font-size: 20px;
      padding: 2%;
      border-radius: 0px 25px 25px 0px;
    }

    .nome_evento {
      padding-left: 16rem;
    }

    .right {
      width: 52%;
      background-color: #fff;
      border-radius: 8px;
      padding: 20px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .corpo {
      display: flex;
      gap: 3%;
      padding: 1%;
    }

    .dados {
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 1.5rem;
    }

    .foto_1 {
      width: 33rem;
      border-radius: 4%;
    }
  </style>
</head>

<body>
  <?php
  include_once "header.php";
  include "conexao.php";
  ?>
  <?php

  $id = $_GET["id"] ?? "";
  $nome = $_GET["nome"] ?? "";
  if (!$id) {

    header("location:evento.php");
  }
  $stmt = $conexao->prepare("SELECT * FROM evento where id=?");
  $stmt->execute([$id]);
  $results = $stmt->fetch(PDO::FETCH_ASSOC);
  $_SESSION['valor'] = $results["valor"] ?? 0;


  $id_usuario = $_SESSION['id_usuario'];

  $sql = "INSERT INTO ingresso (
        evento_id,
        id_usuario
        ) VALUES (
        :evento_id,
      :id_usuario
      )";


  $stmt = $conexao->prepare($sql);

  // Atribui os valores às variáveis na consulta
  $stmt->bindParam(':evento_id', $id);
  $stmt->bindParam(':id_usuario', $id_usuario);


  if ($stmt->execute()) {
    //echo "Dados inseridos com sucesso!";
  }
  ?>

  <div class="corpo">
    <!-- Card à Esquerda -->
    <div class="left">
      <div class="info-card">

        <form id="form-checkout">

          <div id="form-checkout__cardNumber" class="container"></div>
          <div id="form-checkout__expirationDate" class="container"></div>
          <div id="form-checkout__securityCode" class="container"></div>
          <input type="text" id="form-checkout__cardholderName" class="cadastro" />
          <select id="form-checkout__issuer" class="cadastro"></select>
          <select id="form-checkout__installments" class="cadastro"></select>
          <select id="form-checkout__identificationType" class="cadastro"></select>
          <input type="text" id="form-checkout__identificationNumber" class="cadastro" />
          <input type="email" id="form-checkout__cardholderEmail" class="cadastro" />

          <button type="submit" id="form-checkout__submit" class="botao">Pagar</button>
          <progress value="0" class="progress-bar" class="botao">Carregando...</progress>
        </form>
      </div>
    </div>

    <!-- Formulário à Direita -->
    <div class="right">

      <div class="dados">
        <h1 clas="nome_evento"><?= $results["nome"] ?></h1>
        <p class="paulista">Endereço: <?= $results["logradouro"] ?>,<?= $results["numero"] ?> -
          <?= $results["bairro"] ?>, <?= $results["cidade"] ?> - <?= $results["estado"] ?>,
          <?= $results["CEP"] ?>
        </p>
        <?php

        $caminhosImagens = json_decode($results['imagens'], true);
        ?>
        <?php if (!empty($caminhosImagens)): ?>
          <?php
          $select = $conexao->prepare("
                                        SELECT promotores.* FROM evento
                                        INNER JOIN promotores ON evento.id_promotor = promotores.id
                                        WHERE evento.id = :id
                                        ");
          $select->bindParam(':id', $id, PDO::PARAM_INT);
          $select->execute();

          // Depurando o valor de $id (para verificar)
          //var_dump($id);
        
          // Obtendo o resultado
          $resultado = $select->fetch(PDO::FETCH_ASSOC);

          // Verificando se retornou algo
        
          ?>
          <img src="<?= htmlspecialchars($caminhosImagens[0] ?? '') ?>" alt="Imagem do evento" class="foto_1">
          <h1 class="name"> Promovido por:<?php echo $resultado['nome']; ?></h1>


        <?php else: ?>
          <p>Imagem não encontrada.</p>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <?php
  include_once "footer.php"
    ?>
  </div>
  <script>
    // Função para alternar a exibição dos campos de pagamento
    function togglePayment(metodo) {
      const cartaoInfo = document.querySelector('h2 + input.cadastro, input.cadastro:nth-of-type(2), .numeros');
      const pixInfo = document.getElementById('pix-info');
      const cartaoinfo = document.getElementById('cartao-info');

      if (metodo === 'cartao') {
        // Exibir campos de cartão e ocultar campos de Pix
        cartaoinfo.style.display = 'block';
        pixInfo.style.display = 'none';
      } else if (metodo === 'pix') {
        // Exibir campos de Pix e ocultar campos de cartão
        cartaoinfo.style.display = 'none';
        pixInfo.style.display = 'block';
      }
    }

    // Adicionando evento aos checkboxes
    document.getElementById('cartao').addEventListener('click', () => togglePayment('cartao'));
    document.getElementById('pix').addEventListener('click', () => togglePayment('pix'));

    function toggleCheckbox(checkboxId) {
      document.getElementById('cartao').checked = checkboxId === 'cartao';
      document.getElementById('pix').checked = checkboxId === 'pix';
    }

    // Adicionar eventos aos checkboxes
    document.getElementById('cartao').addEventListener('change', () => toggleCheckbox('cartao'));
    document.getElementById('pix').addEventListener('change', () => toggleCheckbox('pix'));
  </script>
  <script src="https://sdk.mercadopago.com/js/v2"></script>
  <script>
    const mp = new MercadoPago("TEST-0aa04b1c-87eb-47cc-b6be-82f180539c72");


    const cardForm = mp.cardForm({
      amount: "10.5",
      iframe: true,
      form: {
        id: "form-checkout",
        cardNumber: {
          id: "form-checkout__cardNumber",
          placeholder: "Número do cartão",
        },
        expirationDate: {
          id: "form-checkout__expirationDate",
          placeholder: "MM/YY",
        },
        securityCode: {
          id: "form-checkout__securityCode",
          placeholder: "Código de segurança",
        },
        cardholderName: {
          id: "form-checkout__cardholderName",
          placeholder: "Titular do cartão",
        },
        issuer: {
          id: "form-checkout__issuer",
          placeholder: "Banco emissor",
        },
        installments: {
          id: "form-checkout__installments",
          placeholder: "Parcelas",
        },
        identificationType: {
          id: "form-checkout__identificationType",
          placeholder: "Tipo de documento",
        },
        identificationNumber: {
          id: "form-checkout__identificationNumber",
          placeholder: "Número do documento",
        },
        cardholderEmail: {
          id: "form-checkout__cardholderEmail",
          placeholder: "E-mail",
        },
      },
      callbacks: {
        onFormMounted: error => {
          if (error) return console.warn("Form Mounted handling error: ", error);
          console.log("Form mounted");
        },
        onSubmit: event => {
          event.preventDefault();

          const {
            paymentMethodId: payment_method_id,
            issuerId: issuer_id,
            cardholderEmail: email,
            amount,
            token,
            installments,
            identificationNumber,
            identificationType,
          } = cardForm.getCardFormData();

          fetch("pagamentos/pag_processa.php", {
            method: "POST",
            headers: {
              "Content-Type": "application/json",
            },
            body: JSON.stringify({
              token,
              issuer_id,
              payment_method_id,
              transaction_amount: <?= floatval($_SESSION['valor']) ?>,//valor a ser pago
              installments: Number(installments),//parcelas
              description: "<?= $nome?>",//descrição
              payer: {
                email,
                identification: {
                  type: identificationType,
                  number: identificationNumber,
                },
              },
            }),
          }).then((resposta) => {
            return resposta.json()
          })
            .then((dados) => {
              //window.location.href = `pagamentos/aprovado.php?id=${dados.id}`;
              console.log(dados.id)
            })
        },
        onFetching: (resource) => {
          console.log("Fetching resource: ", resource);

          // Animate progress bar
          const progressBar = document.querySelector(".progress-bar");
          progressBar.removeAttribute("value");

          return () => {
            progressBar.setAttribute("value", "0");
          };
        }
      },
    });

  </script>
  <!-- Código JavaScript -->
</body>

</html>