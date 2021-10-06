<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<style>
    html,
    body {
        margin: 0px;
        padding: 0px;
    }

    nav {
        display: flex;
        align-items: center;
        align-content: center;
        text-align: center;
        background-color: black;
        width: 100%;
        height: 57px;
    }

    .nav-section {
        display: flex;
        flex-direction: row;
        margin-left: 33%;
        width: 450px;
    }

    .nav-text {
        font-family: Roboto Mono;
        font-style: normal;
        font-weight: normal;
        font-size: 24px;
        color: white;
        line-height: 32px;
        margin-left: auto;
        margin-right: auto;
    }

    nav-text:hover {
        color: blue;
    }

    main {
        display: grid;
        grid-template-columns: 30% 70%;
        grid-template-rows: 557px;
    }

    .wellcome-section {
        display: flex;
        flex-direction: row;
        align-items: center;
        align-content: center;
        text-align: center;
        margin-left: 160px;

    }

    .wellcome-title {
        position: absolute;
        width: 433px;
        height: 95px;

        font-family: Roboto Mono;
        font-style: normal;
        font-weight: normal;
        font-size: 72px;
        line-height: 95px;
        color: orange;

        margin-left: auto;
        margin-right: auto;
    }

    .wellcome-text {
        position: absolute;
        width: 346px;
        height: 32px;

        font-family: Roboto Mono;
        font-style: normal;
        font-weight: normal;
        font-size: 24px;
        line-height: 32px;
        color: black;

        margin-left: 140px;
        margin-top: 90px;
        margin-right: auto;
    }

    .wellcome-button {
        width: 270px;
        height: 59px;
        border-radius: 6px;
        background-color: black;

        font-family: Roboto Mono;
        font-style: normal;
        font-weight: normal;
        font-size: 24px;
        line-height: 32px;
        color: white;

        margin-top: 200px;
        margin-left: 15px;
        margin-right: auto;
    }

    .images-section {
        display: flex;
        flex-direction: row;
        margin-top: 40px;
        margin-left: 340px;
    }

    .kid1 {
        position: absolute;
        width: 254px;
        height: 257px;

        background: url(images/kid1.svg);
    }

    .kid2 {
        position: absolute;
        width: 203px;
        height: 199px;

        background: url(images/Kid2.svg);

        margin-left: 320px;
        margin-top: 160px;
    }

    .kid3 {
        position: absolute;
        width: 155px;
        height: 153px;

        background: url(images/Kid3.svg);

        margin-left: 140px;
        margin-top: 330px;
    }

    .SobProj {
        margin-top: 50px;
        display: flex;
        flex-direction: row;
        align-content: center;
        align-content: center;
        height: 580px;
    }

    .Caixinha {
        display: flex;
        flex-direction: column;
        align-items: center;
        align-content: center;
        text-align: center;

        background-image: url(images/TesteDeBack.png);
        background-repeat: no-repeat;

    }

    .title-caixinha {
        font-family: Roboto Mono;
        font-style: normal;
        font-weight: normal;
        font-size: 42px;
        line-height: 55px;

        width: 770px;
        height: 50px;
        border: solid 5px black;
        background-color: white;

        margin-bottom: auto;
        margin-top: auto;
        margin-left: 220px;
        margin-right: auto;
    }

    .text-caixinha {
        font-family: Roboto Mono;
        font-style: normal;
        font-weight: normal;
        font-size: 32px;
        line-height: 55px;

        width: 770px;
        height: 225px;
        border: solid 5px black;
        background-color: white;

        border-top: none;

        margin-top: -145px;
        margin-bottom: auto;
        margin-left: 220px;
        margin-right: auto;
    }

    .ComoFunc {
        display: flex;
        flex-direction: column;
        height: 1580px;
    }

    .Title {
        width: 354px;
        height: 55px;

        font-family: Roboto Mono;
        font-style: normal;
        font-weight: normal;
        font-size: 42px;
        line-height: 55px;
        margin-left: 20px;

        width: auto;
    }

    .Title2 {
        width: 354px;
        height: 55px;

        font-family: Roboto Mono;
        font-style: normal;
        font-weight: normal;
        font-size: 42px;
        line-height: 55px;
        margin-left: 62%;

        width: auto;
    }

    .detalhinho {
        width: 489px;
        height: 7px;

        background: #FFA500;
    }

    .caixona {
        border: 5px solid black;
        border-radius: 20px;
        width: 390px;
        height: 458px;

        text-align: center;

        margin-bottom: 20px;
        margin-right: 20px;
    }

    .Additionals {
        height: 1340px;
    }

    .Additionals {
        display: flex;
        flex-direction: column;
        height: 920px;
    }

    .Caixa-add {
        border: solid 5px black;
        border-radius: 20px;

        margin-top: 60px;

        height: 360px;
        width: 840px;
    }


    .footer {
        display: grid;
        grid-template-columns: 5% 95%;
        margin-top: 90px;
        height: 190px;
    }

    .laranja {
        background-color: orange;
    }

    .preto {
        background-color: black;
    }
</style>

<body>
    <nav>
        <section class="nav-section">
            <div class="nav-text">
                SOBRE
            </div>
            <div class="nav-text">
                HOME
            </div>
            <div class="nav-text">
                API
            </div>
        </section>
    </nav>

    <main>
        <section class="wellcome-section">
            <div class="wellcome-title">
                Bem Vindo!
            </div>
            <div class="wellcome-text">
                essa é a nossa aplicação
            </div>

            <form action="">
                <button class="wellcome-button">
                    SDTI
                </button>
            </form>
        </section>

        <section class="images-section">
            <div class="kid1"></div>
            <div class="kid2"></div>
            <div class="kid3"></div>
        </section>
    </main>

    <section class="SobProj">
        <div class="Caixinha">
            <div class="title-caixinha">Titulo</div>
            <div class="text-caixinha">Texto</div>
        </div>
    </section>

    <section class="ComoFunc">
        <div class="Title">
            Como Funciona?
            <div class="detalhinho" style="margin-bottom: 10px; margin-left: 20px;"></div>
            <div class="detalhinho"></div>
        </div>


        <section class="caixas">
            <div class="caixona" style="margin-left: 15%; margin-top: 80px;">
                <div class="Title">1ª Etapa</div>
            </div>
            <div class="caixona" style="margin-left: 60%; margin-top: -60px;">
                <div class="Title">2ª Etapa</div>
            </div>
            <div class="caixona" style="margin-left: 20%; margin-top: -80px;">
                <div class="Title">3ª Etapa</div>
            </div>

        </section>
    </section>

    <section class="Additionals">
        <div class="Title2">
            Informações Adicionais?
            <div class="detalhinho" style="margin-bottom: 5px;"></div>
            <div class="detalhinho" style="margin-right: 60px;"></div>
        </div>

        <div class="Caixa-add" style="margin-left: 10%;">

        </div>

        <div class="Caixa-add" style="margin-left: 30%;">

        </div>

    </section>

    <footer class="footer">
        <div class="laranja"></div>
        <div class="preto">
            b
        </div>
    </footer>
</body>

</html>