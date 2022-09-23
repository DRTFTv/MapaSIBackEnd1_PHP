<?= '
  <footer>
    <div class="footerTitle">
      Quer saber mais?
    </div>
    <div class="footerContainer">
      <div class="footerItem">
        <p>Nossas Páginas</p>
        <a href="'.$baseURL.parse_url($currentURL, PHP_URL_PATH).'">Home</a>
        <a href="#">Blog</a>
        <a href="#">Conheça a Dona Rita</a>
        <a href="#">Home</a>
      </div>
      <div class="footerItem">
        <p>Links Úteis</p>
        <a href="#">Política de Privacidade</a>
        <a href="#">Aviso Legal</a>
        <a href="#">Termos de Uso</a>
      </div>
      <div class="footerItem">
        <p>Sobre o Projeto</p>
        <a href="#">Projeto de Divulgação das marmitas da Dona Rita!</a>
      </div>
    </div>
    <div class="signature">
      Desenvolvido por Daniel Ribeiro Torquato Filho
    </div>
  </footer>
'; ?>