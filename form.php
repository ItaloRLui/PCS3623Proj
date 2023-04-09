<br/>
<br/>


<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="contato/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="contato/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="contato/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="contato/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="contato/css/util.css">
	<link rel="stylesheet" type="text/css" href="contato/css/main.css">
</head>
<body>


	<div class="container-contact100">
		<div class="wrap-contact100">
			<form class="contact100-form validate-form" method="POST" action="<?php echo htmlspecialchars("contactprocess.php")?>">
				<span class="contact100-form-title">
					Contato
				</span>

				<label class="label-input100" for="first-name">Nome</label>
				<div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="Type first name">
					<input id="first-name" class="input100" type="text" name="first-name" placeholder="Primeiro Nome" required>
					<span class="focus-input100"></span>
				</div>
				<div class="wrap-input100 rs2-wrap-input100 validate-input" data-validate="Type last name">
					<input class="input100" type="text" name="last-name" placeholder="Último nome" required>
					<span class="focus-input100"></span>
				</div>

				<label class="label-input100" for="email">Email </label>
				<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
					<input id="email" class="input100" type="email" name="email" placeholder="Ex. exemplo@email.com" required>
					<span class="focus-input100"></span>
				</div>

				<label class="label-input100" for="phone">Número do Telefone</label>
				<div class="wrap-input100">
					<input id="phone" class="input100" type="text" name="phone" placeholder="Ex. 11 80000-0000">
					<span class="focus-input100"></span>
				</div>

				<label class="label-input100" for="message">Mensagem</label>
				<div class="wrap-input100 validate-input" data-validate = "Message is required">
					<textarea id="message" class="input100" name="message" placeholder="Escreva uma mensagem para nós" required></textarea>
					<span class="focus-input100"></span>
				</div>

				<div class="container-contact100-form-btn">
					<button class="contact100-form-btn" name="contactform">
						Enviar a mensagem
					</button>
				</div>
			</form>

			<div class="contact100-more flex-col-c-m" style="background-image: url('imagens/login.jpg');">
                <?php if (!empty($_SESSION['mensagemcontato'])) {
                    $mensagem = $_SESSION['mensagemcontato'];
                    echo "<div class='flex-w size1 p-b-47'>
                            <div class='txt1 p-r-25'>
                                <span class='lnr lnr-map-marker'></span>
                            </div>

                            <div class='flex-col size2'>
                                <span class='txt1 p-b-20' style='color:red;'>";
                            echo $mensagem;
                    echo "      </span>

                            </div>
                        </div>";
                    echo "<span style='color:red; margin-bottom:5px; font-size:15px;'>".$mensagem."</span>"; }  ?>
                
				<div class="flex-w size1 p-b-47">
					<div class="txt1 p-r-25">
						<span class="lnr lnr-map-marker"></span>
					</div>

					<div class="flex-col size2">
						<span class="txt1 p-b-20">
							Endereço
						</span>

						<span class="txt2">
							Rua Sardes, 7
						</span>
					</div>
				</div>

				<div class="dis-flex size1 p-b-47">
					<div class="txt1 p-r-25">
						<span class="lnr lnr-phone-handset"></span>
					</div>

					<div class="flex-col size2">
						<span class="txt1 p-b-20">
							Celular
						</span>

						<span class="txt3">
							+11 95480-0714
						</span>
					</div>
				</div>

				<div class="dis-flex size1 p-b-47">
					<div class="txt1 p-r-25">
						<span class="lnr lnr-envelope"></span>
					</div>

					<div class="flex-col size2">
						<span class="txt1 p-b-20">
							Email 
						</span>
                        
                        <span class="txt3">
							barbeariaxavierkx@gmail.com
						</span>

						<span class="txt3">
							kleberxavierkx@gmail.com
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>



	<div id="dropDownSelect1"></div>



	<script src="contato/vendor/select2/select2.min.js"></script>
	<script>
		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
	<script src="contato/js/main.js"></script>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-23581568-13');
	</script>

