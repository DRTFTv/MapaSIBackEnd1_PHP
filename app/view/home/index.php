<?php
  include "./app/services/data.php";
  $baseURL = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
  $currentURL = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link rel="stylesheet" href="./app/view/css/universal.css">
    <link rel="stylesheet" href="./app/view/css/header.css">
    <link rel="stylesheet" href="./app/view/css/footer.css">
    <link rel="stylesheet" href="./app/view/home/style.css">
  </head>
  <body>
    <?php include "./app/components/header.php"; ?>

    <figure class="imageHeader">
      <figcaption class="imageHeaderTitle">
        Venha para a casa da Dona Rita, e escolha a sua marmita!!!
      </figcaption>
      <figcaption class="imageHeaderSubtitle">
        Impossível não voltar novamente
      </figcaption>
      <button class="imageHeaderButton">
        Saiba Mais
      </button>
    </figure>
    <section class="container">
      <?php if (!isset($_GET['idProduto'])): ?>
        <div class="containerTitle">
          Confira nossas marmitas
        </div>
        <div class="containerSubtitle">
          Aqui você encontra o nosso cardápio das marmitas
        </div>
        <div class="listCard">
          <?php foreach(json_decode($json)->objetos as $index=>$value): ?>
            <div class="card">
              <div class="cardImage" onclick="" style="background-image: url(<?= $value->urlImagem ?>);"></div>
              <div class="cardTitle"><?= $value->nome ?></div>
              <button class="cardButton" onclick="location.href='?idProduto=<?= $index ?>'">Ver mais</button>
            </div>
          <?php endforeach; ?>
        </div>
      <?php else: ?>
        <?php $value = json_decode($json)->objetos[$_GET['idProduto']] ?? null; ?>
        <?php if($value != null): ?>
          <div class="containerTitle">
            <?= $value->nome ?>
          </div>
          <div class="containerSubtitle">
            <?= $value->preco ?> - <?= $value->tamanho ?>
          </div>
          <div class="listCard">
            <div class="card">
              <div class="cardImage" onclick="" style="background-image: url(<?= $value->urlImagem ?>);"></div>
              <div class="cardDescription">
                <div class="cardDescriptionTitle">
                  Ingredientes:
                </div>
                <ul class="ingredients">
                  <?php foreach($value->ingredientes as $index=>$value): ?>
                    <li><?= $value ?></li>
                  <?php endforeach; ?>
                </ul>
              </div>
              <button class="cardButton" onclick="location.href='https://api.whatsapp.com/send?phone=550&text=Ol%C3%A1!%20Estou%20interessado%20em%20fazer%20um%20pedido.'">
                PEÇA jÁ
                <img class="cardButtonIcon" src="./app/lib/WhatsappIcon.png">
              </button>
            </div>
          </div>
        <?php else: ?>
          <div class="containerTitle">
            Err: 404
          </div>
          <div class="containerSubtitle">
            Produto não encotrado
          </div>
          <div class="listCard">
            <div class="card">
              <button class="cardButton" onclick="location.href='<?= $baseURL.parse_url($currentURL, PHP_URL_PATH) ?>'">Retornar ao catálogo</button>
            </div>
          </div>
        <?php endif; ?>
      <?php endif; ?>
    </section>



    <?php include "./app/components/footer.php"; ?>
  </body>
</html>