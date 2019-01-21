<?php
	$imagem = array(); // Criamos um array com o nome das imagens.
	$imagem[1] = "bg-login.jpg"; // Recheamos este array
	$imagem[2] = "bg-login2.jpg";
	$imagem[1] = "bg-login3.jpg";
	$imagem[2] = "bg-login4.jpg";
	$contador = count($imagem); // Criamos uma variavel para contar (count();) os dados que estão dentro do array.
	$aleatorio = rand(1,$contador); // Esta variável irá gerar um número aleatório (rand();), partindo do 1 até o número de dados que estão dentro do array..
?>
<style>
	body.login {
		background: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/img/bg-login-right.jpg') right center no-repeat;
		/*background: #FFE3B3;*/
	}
	body.login #copyright {
		width: 80px;
		position: absolute;
		left: 50%;
		top: 50%;
		transform: translate(-50%, -50%);
		padding: 0;
		margin: auto;
		z-index: 11;
		margin-top: 120px;
	}
	body.login #copyright a {
		width: 80px;
		height: auto;
		display: block;
	}
	body.login #copyright a img {
		max-width: 100%;
		display: block;
	}
	body.login #left {
		float: left;
		height: 100%;
		width: 45%;
		background: white;
		background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/<?php echo $imagem[$aleatorio]; ?>');
		background-position: center center;
		background-size: auto 100%;
	}
	body.login div#login {
		position: relative;
		top: 50%;
		transform: translateY(-50%);
		padding: 0;
		float: left;
		width: 55%;
	}
	body.login div#login h1 {
		margin-bottom: 15px;
	}
	.login h1 a {
		background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/logo.png')!important;
		width: 300px!important;
		height: 129px!important;
		margin: 0 auto!important;
		background-size: 100% auto!important;
		background-position: center center!important;
	}
	body.login div#login #login_error,
	body.login div#login .message {
		display: block;
		padding: 0;
		border: none;
		padding: 10px;
		font-size: 11px;
		max-width: 300px;
		margin-left: auto;
		margin-right: auto;
	}
	body.login div#login .message.register {
		display: none;
	}
	body.login div#login form {
		margin-top: 10px;
		border-radius: 10px;
		//background: rgba(255, 255, 255, .6);
		max-width: 300px;
		margin: 0 auto;
	}
	body.login div#login form#loginform,
	body.login div#login form#registerform {
		padding-top: 46px;
		background: #436074;
	}
	body.login div#login form#registerform {
		display: flex;
		flex-wrap: wrap;
		max-width: 500px;
	}
	body.login div#login form#registerform br {
		display: none;
	}
	body.login div#login form#lostpasswordform {
		padding-top: 35px;
	}
	body.login div#login form p {
		color: #ffffff;
		font-size: 12px;
	}
	body.login div#login form#registerform p {
		width: calc(50% - 20px);
		padding: 0 10px;
	}
	body.login div#login form#registerform p.fullname {
		order: -1;
	}
	body.login div#login form#registerform p.user_name {
		display: none;
	}
	body.login div#login form#registerform p.integrante label {
		margin-bottom: 3px;
	}
	body.login div#login form#registerform p.extras,
	body.login div#login form#registerform p.escritorio {
		display: none;
	}
	body.login div#login form#registerform p.termos,
	body.login div#login form#registerform p#reg_passmail {
		width: 100%;
	}
	body.login div#login form#registerform p#reg_passmail {
		margin-bottom: 15px;
		text-align: center;
	}
	body.login div#login form#registerform p.termos {
		margin-bottom: 15px;
	}
	body.login div#login form#registerform p.termos a {
		color: #2d1a76;
	}
	body.login div#login form#registerform p.submit {
		width: calc(100% - 20px);
		position: relative;
	}
	body.login div#login form#registerform p.submit .block {
		position: absolute;
		top: 0;
		bottom: 0;
		left: 50%;
		transform: translateX(-50%);
		cursor: pointer;
		width: 120px;
	}
	body.login div#login form p label {
		font-size: 12px;
		color: #ffffff;
		display: block;
	}
	body.login div#login form select {
		font-size: 14px;
		width: 100%;
		height: 35px;
		margin-bottom: 16px;
		padding: 5px;
	}
	body.login div#login form#loginform input,
	body.login div#login form#registerform input, {
		background: #ffffff;
		padding: 5px;
		font-size: 14px;
	}
	body.login div#login form#registerform input,
	body.login div#login form#loginform input {
		font-size: 14px;
		background: #ffffff;
		padding: 5px;
	}
	/*body.login div#login form#loginform p.forgetmenot {
		display: none;
	}*/
	body.login div#login form#loginform p.forgetmenot input#rememberme,
	body.login div#login form#registerform p.forgetmenot input#rememberme {
		background: #2d1a76;
		border-radius: 50%;
	}
	body.login div#login form#loginform p.submit {}
	body.login div#login form#loginform p.submit input#wp-submit,
	body.login div#login form#registerform p.submit input#wp-submit {
		padding: 0;
		display: block;
		float: right;
		margin: 0 auto;
		background: #2d1a76;
		transition: .4s all linear;
		box-shadow: none;
		text-shadow: none;
		border: none;
		border-radius: 10px;
		width: 120px;
	}
	body.login div#login form#registerform p.submit input#wp-submit {
		float: none;
	}
	body.login div#login form#loginform p.submit input#wp-submit:hover,
	body.login div#login form#registerform p.submit input#wp-submit:hover {
		background: #ffffff;
		color: #000;
	}
	body.login div#login p#nav {
		/*display: none;*/
		text-align: center;
	}
	body.login div#login p#nav a {
		color: #000;
		margin: 0 10px;
	}
	body.login div#login p#backtoblog {}
	body.login div#login p#backtoblog a {
		color: #fff;
		display: none;
	}

	body.login #modal {
		display: none;
		position: fixed;
		top: 0;
		right: 0;
		bottom: 0;
		left: 0;
		z-index: 3;
	}
	::-webkit-scrollbar {
		width: 6px;
	}

	::-webkit-scrollbar-track {
		border: 1px solid rgba(0, 0, 0, 0.3);
		-webkit-border-radius: 10px;
		border-radius: 10px;
	}

	::-webkit-scrollbar-thumb {
		-webkit-border-radius: 10px;
		border-radius: 10px;
		background: #b5b5b5;
	}

	::-webkit-scrollbar-thumb:window-inactive {
		background: #b5b5b5;
	}

	::-webkit-scrollbar-track:horizontal {
		display: none;
	}
	body.login #modal .mask {
		position: absolute;
		top: 0;
		left: 0;
		right: 0;
		bottom: 0;<?php
$imagem = array(); // Criamos um array com o nome das imagens.
$imagem[1] = "foto1.png"; // Recheamos este array
$imagem[2] = "foto2.jpg";
$imagem[3] = "foto3.png";
$imagem[4] = "foto4.jpg";
$imagem[5] = "foto5.png";
$imagem[6] = "foto6.jpg";
$contador = count($imagem); // Criamos uma variavel para contar (count();) os dados que estão dentro do array.
$aleatorio = rand(1,$contador); // Esta variável irá gerar um número aleatório (rand();), partindo do 1 até o número de dados que estão dentro do array..
?>
		background: rgba(0, 0, 0, .5);
	}
	body.login #modal .fechar {
		position: absolute;
		right: 20px;
		top: 20px;
		cursor: pointer;
		background: #2d1a76;
		width: 22px;
		height: 22px;
		display: flex;
		align-items: center;
		justify-content: center;
		color: #ffffff;
		font-weight: bold;
		font-size: 16px;
	}
	body.login #modal .content {
		background: #ffffff;
		position: absolute;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -50%);
		max-width: 500px;
		z-index: 1;
		padding: 50px 20px 30px;
	}
	body.login #modal .content .overflow {
		height: 500px;
		overflow: scroll;
		padding-left: 30px;
		padding-right: 30px;
	}
	body.login #modal .content .overflow p {
		padding-bottom: 20px;
	}

	@media screen and (max-width: 992px) {
		body.login #left {
			display: none;
		}

		body.login div#login {
			width: 100%;
		}

		body.login div#login form#registerform {
			max-width: 80%;
		}

		body.login div#login form#registerform p {
			width: 100%;
		}
		body.login #modal .content {
			left: 20px;
			right: 20px;
			max-width: none;
			transform: translateY(-50%);
		}
		body.login #modal .content .overflow {
			padding-left: 10px;
			padding-right: 10px;
		}
</style>