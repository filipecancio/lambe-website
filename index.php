<?php
require_once 'request.php';
$curl = new Comunicacao();

if(isset($_POST['enviar'])) {
    $dados = [];
    $dados2 = [];
    $relacao = [];

   $dados['Nome'] = filter_input(INPUT_POST, 'name');
   $dados['Sobrenome'] = filter_input(INPUT_POST, 'lastname');
   $dados['CPF'] = filter_input(INPUT_POST, 'cpf');
   $dados['Nascimento'] = filter_input(INPUT_POST, 'birthday');

    #echo "<pre>";
    #var_dump($dados);

   

    $dados2['Facebook'] = filter_input(INPUT_POST, 'facebook');
    $dados2['Instagram'] = filter_input(INPUT_POST, 'instagram');
    $dados2['Email'] = filter_input(INPUT_POST, 'email');
    $dados2['Fone'] = filter_input(INPUT_POST, 'phone');
    $dados2['avatar'] = filter_input(INPUT_POST, 'avatar');

    #echo "<pre>";
    #var_dump($dados2);



    $curl->request('POST', 'https://cancio.appspot.com/pessoa', json_encode($dados));
    $curl->request('POST', 'https://cancio.appspot.com/contato', json_encode($dados2));

    $relacao['entity_1']['type'] = 'pessoa';
    $relacao['entity_1']['name'] = 'Nome';
    $relacao['entity_1']['value'] =  filter_input(INPUT_POST, 'name');
    
    $relacao['entity_2']['type'] = 'contato';
    $relacao['entity_2']['name'] = 'Fone';
    $relacao['entity_2']['value'] =  filter_input(INPUT_POST, 'phone');

    $relacao['relationship'] = 'tem';

    #echo "<pre>";
    #var_dump(json_encode($relacao));

    $curl->request('POST', 'https://cancio.appspot.com/relationship', json_encode($relacao));

}
    
    $valor_get = $curl->request('GET', 'https://cancio.appspot.com/pessoa');
    $resultados = json_decode($valor_get);

    header ('Location: index.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>Lambe</title>
</head>        
<body>
    <header>
        <a href="#hero">LAMBE</a>
        <nav>
            <a href="#sobre">Sobre</a>
            <a href="#pds">PDS</a>
            <a href="#bd2">BD2</a>
            <a href="#web">WEB</a>
            <a href="#contato">Contato</a>
        </nav>
    </header>
    <section id="hero">
        <h1>LAMBE</h1>
    </section>
    <section id="sobre" class="roxo">
        <h2>Sobre</h2>
        <div class="container">
            <div class="half_container">
                <p>Um aplicativo de gestão, acessível, intuítivo e simples como um lambe-lambe.</p>
                <p>O lambe é um projeto desenvolvido por Alunos do IFBA de Vitória da Conquista com o objetivo de facilitar a gestão de negócio dos artistas autonomos e MEIs.</p>
                <p>O projeto ainda está em fase de desenvolvimento mas logo em breve estará disponível nas plataformas IOS e Android.</p>
            </div>
            <div class="half_container">
                <img class="phone" src="./assets/png/phone.png"/>
            </div>
        </div>
    </section>
    <section id="pds" class="branco cinza_100">
        <h2>Processo de Desenvolvimento de Software</h2>
        <div class="container">
            <div class="half_container">
                <p>A matéria de Processo de Desenvolvimento de Software ministrada pela Prof. Crijina Chagas foi responsável pela feature de react native, cuja a tecnologia permite a criação de aplicativos nativos usando a linguagem web.</p>
                <p>Os alunos utilizaram da metodologia Ágil para organizar as tarefas de desenvolvimento, dividindo o processo em duas sprints.</p>
                <a class="link" href="" >Veja o projeto >>></a>
            </div>
            <div class="half_container">
                <div class="envolvidos">
                    <h3>Alunos Envolvidos</h3>
                    <div class="container">
                        <a class="third_container" href="">
                            <img class="avatar" src="./assets/png/nicassio.png"/>
                            <h4>Nicássio Couto</h4>
                            <p class="rosa">Front-end</p>
                        </a>
                        <a class="third_container" href="">
                            <img class="avatar" src="./assets/png/quezia.png"/>
                            <h4>Quezia Filadelfo</h4>
                            <p class="rosa">Back-end</p>
                        </a>
                        <a class="third_container" href="">
                            <img class="avatar" src="./assets/png/filipe.png"/>
                            <h4>Filipe Câncio</h4>
                            <p class="rosa">Full-stack</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="bd2" class="roxo">
        <h2>Banco de dados 2</h2>
        <div class="container">
            <div class="half_container">
                <p>A  matéria do bando de dado 2 ministrada pelo Prof. Pablo foi responsável pela feature de banco de dados não relacional com Neo4j o projeto envolveu a elaboração de modelo físico com a linguagem cypher, a instância do banco na plataforma neo4j e a API rest responsável por fazer o CRUD com o banco. </p>
                <a class="link" href="" >Veja o projeto >>></a>
            </div>
            <div class="half_container">
                <div class="envolvidos verde_claro">
                    <h3>Alunos Envolvidos</h3>
                    <div class="container">
                        <a class="third_container" href="">
                            <img class="avatar" src="./assets/png/nicassio.png"/>
                            <h4>Nicássio Couto</h4>
                            <p class="rosa">Estudo de Caso</p>
                        </a>
                        <a class="third_container" href="">
                            <img class="avatar" src="./assets/png/paulo.png"/>
                            <h4>Paulo Kaedo</h4>
                            <p class="rosa">Modelo Físico</p>
                        </a>
                        <a class="third_container" href="">
                            <img class="avatar" src="./assets/png/filipe.png"/>
                            <h4>Filipe Câncio</h4>
                            <p class="rosa">Back-end</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="web" class="verde_escuro">
        <h2>Programação Web</h2>
        <div class="container">
            <div class="half_container">
                <p>A matéria de programação web ministrada pelo Prof. Alexandro Silva foi responsável pela elaboração do atual site de divugação do aplicativo lambe.</p>
                <p>Para a utilização do app foi realizada a elaboração de uma aplicação PHP que conecta com o banco Neo4j via API rest.</p>
                <a class="link" href="" >Veja o projeto >>></a>
            </div>
            <div class="half_container">
                <div class="envolvidos verde_claro">
                    <h3>Alunos Envolvidos</h3>
                    <div class="container">
                        <a class="third_container" href="">
                            <img class="avatar" src="./assets/png/nicassio.png"/>
                            <h4>Nicássio Couto</h4>
                            <p class="rosa">UXdesigner</p>
                        </a>
                        <a class="third_container" href="">
                            <img class="avatar" src="./assets/png/lucas.png"/>
                            <h4>Lucas Lacerda</h4>
                            <p class="rosa">Back-end</p>
                        </a>
                        <a class="third_container" href="">
                            <img class="avatar" src="./assets/png/filipe.png"/>
                            <h4>Filipe Câncio</h4>
                            <p class="rosa">Front-end</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="contato">
        <h2>Contato</h2>
        <div class="container">
            <div class="half_container">
                <form id="form_contact" class="form_container" method="POST">
                    <input type="text" class="half_input" name="name" id="name" placeholder="Nome" />
                    <input type="text" class="half_input" name="lastname" id="lastname" placeholder="Sobrenome" />
                    <input type="text" class="half_input" name="cpf" id="cpf" placeholder="CPF" />
                    <input type="date" class="half_input" name="birthday" id="birthday" placeholder="Nascimento" />
                    <input type="text" class="half_input" name="facebook" id="facebook" placeholder="Facebook" />
                    <input type="text" class="half_input" name="instagram" id="instagram" placeholder="Instagram" />
                    <input type="text" class="full_input" name="email" id="email" placeholder="Email" />
                    <input type="text" class="half_input" name="phone" id="phone" placeholder="Fone" />
                    <input type="tel" class="half_input" name="avatar" id="avatar" placeholder="avatar" />
                    <button type="submit" name="enviar" class="btn_submit full_input">Enviar</button>
                </form>
            </div>
            <div class="half_container">
            
                    <table class="table table-bordered" style="min-width: 50%;">
			<thead>
				<tr>
					<th class="th_nome" style="text-align: left;">Nome</th>
					<th class="th_sobrenome" style="text-align: left;">Sobrenome</th>
				</tr>
			</thead>
			<tbody>
            <?php foreach($resultados as $linha) { ?>
 				<tr>
					<td class="nome_tb"><?php echo $linha->Nome; ?></td>
					<td class="sobrenome_tb"><?php echo $linha->Sobrenome; ?></td>
					<td></td>
				</tr>
            <?php } ?>
			</table>                    
            </div>
        </div>
    </section>
</body>
</html>