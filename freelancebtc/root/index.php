<?php
include ("coinbase.php");
$adr1 = "1Arj6tGAuyJ95oKCESndzWsGFujgBhmrKd";
// $adr1 = getNewAdress("dTYqlgv59UoXia40" , "amprDSICDLPQBp7ZVUyMHNzzsqgPVakQ" );

// echo getBalance("dTYqlgv59UoXia40" , "amprDSICDLPQBp7ZVUyMHNzzsqgPVakQ" );
if (! isset ( $_COOKIE ["coinCasino"] )) {
	$sess_id = uniqid ();
	setcookie ( "coinCasino", $sess_id, time () + (10 * 365 * 24 * 60 * 60) );
} else {
	$sess_id = $_COOKIE ["coinCasino"];
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Anonybet</title>
<meta name="Description" content="Your website description goes here.">
<meta name="KeyWords" content="keyword1, keyword2, keyword3">
<link href="style.css" rel="stylesheet" type="text/css">

<link type="text/css" rel="stylesheet" href="./roulette_game/main.css">
<link type="text/css" rel="stylesheet" href="./roulette_game/fc.css">
<script type="text/javascript"
	src="./roulette_game/js/jquery-2.1.0.min.js"></script>
<script type="text/javascript" src="./roulette_game/js/fc.js"></script>
<script type="text/javascript">
	function showStuff(id, text, btn) {
		
			document.getElementById(id).style.display = 'block';
			// hide the lorem ipsum text
			document.getElementById(text).style.display = 'none';
		
			document.getElementById(btn).style.display = 'none';
		// hide the link
		//btn.style.display = 'none';
	}
</script>

<script type="text/javascript">
        var coin = "BTC";
        var coinname = "BitCoin";
        var ratio = "1000000";
        var style = "7";
        var effects = "0";
        var conv_price = "1.000000000000000000";
        var conv_currency = "USD";
        var balance1 = 0;
    </script>
<script src="game.js"></script>


<link rel="stylesheet"
	href="./scripts/jquery-ui-1.11.4/jquery-ui.min.css" />
<link rel="stylesheet" href="./chat.css" />
<link rel="icon" href="../images/favicon.png" type="image/png" />
<link href="./styles/7/bootstrap.css" rel="stylesheet" />
<link href="./styles/games.css" rel="stylesheet" />
<link href="./scripts/fancybox/jquery.fancybox.css" rel="stylesheet" />

<link
	href="././cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css"
	rel="stylesheet" />

<script type="text/javascript"
	src="./scripts/jquery-ui-1.11.4/jquery-ui.min.js"></script>
<script src="./scripts/bootstrap/js/bootstrap.min.js"></script>
<script src="./scripts/fancybox/jquery.fancybox.js"></script>
<script>
        var coin = "BTC";
        var style = "7";
        var coinname = "BitCoin";
        var decimals = "8";
        var conv_currency = "BTC";
        var conv_price = "1.000000000000000000";
        var totalchannels = "2";
        var ratio = "1000000";
        var Balance = 0;//0
        var BalanceCredits = 50000;//0
        var serverTime = "1475262562118.55";

        if (screen.width < 750) {
            var mvp = document.getElementById('vp');
            mvp.setAttribute('content', 'width=750');
        }

        if (top.location != self.location) {
            top.location = self.location.href;
        }
    </script>
<script src="./scripts/games.js"></script>
</head>

<body>
	<table align="center" border="0" cellpadding="0" cellspacing="0"
		width="100%">
		<tbody>
			<tr>
				<td
					style="background-position: right; background-repeat: no-repeat; background-color: rgb(5, 15, 6)"
					background="images/header.jpg" height="150" valign="top"
					width="970">
					<div class="title" style="padding-top: 20px; padding-left: 40px;"
						background="images/logo.png"></div>
					<div class="slogan" style="padding-top: 11px; padding-left: 40px;">Gamble
						with ETH & BTC</div>
				</td>
			</tr>
			<tr>
				<td style="background-repeat: repeat;"
					background="images/navbar-bg.jpg" height="45" valign="top"
					width="100%"><table align="center" border="0" cellpadding="0"
						cellspacing="0" width="100%">
						<tbody>
							<tr>
								<td valign="top" align="center" width="10%"><img
									src="images/navbar-sep.jpg"></td>
								<td align="center" width="20%" valign="middle"><a href="#"
									class="navbar"
									onclick="showStuff( 'roulette','flipcoin', this); return false;">Roulette</a></td>
								<td valign="top" align="center" width="10%"><img
									src="images/navbar-sep.jpg"></td>
								<td align="center" valign="middle"><a href="#" class="navbar"
									width="20%"
									onclick="showStuff('flipcoin', 'roulette', this); return false;">FlipCoin</a></td>
								<td valign="top" align="center" width="10%"><img
									src="images/navbar-sep.jpg"></td>
								<td align="center" width="20%" valign="middle"><a href="#"
									class="navbar">Dice</a></td>
								<td valign="top" align="center" width="10%"><img
									src="images/navbar-sep.jpg"></td>
							</tr>
						</tbody>
					</table></td>
			</tr>


			<tr>
				<td valign="top" width="100%"><table align="center" border="0"
						cellpadding="0" cellspacing="0" width="100%">
						<tbody>
							<tr>

								<td valign="top" width="100%">
									<table border="0" cellpadding="0" cellspacing="0" width="100%">
										<tbody>
											<tr>
												<td
													style="background-repeat: repeat; -webkit-box-shadow: 10px 10px 5px 0px rgba(0, 0, 0, 0.75); -moz-box-shadow: 10px 10px 5px 0px rgba(0, 0, 0, 0.75); box-shadow: 10px 10px 5px 0px rgba(0, 0, 0, 0.75);"
													background="images/stripe2.png" valign="top" width="809">
													<table margin-left="10%" border="0" cellpadding="0"
														cellspacing="0" width="100%">
														<tbody>

															<tr>
																<td style="padding-top: 15px;" align="center"
																	valign="top" width="141"><img
																	src="images/casino-roulette.jpg" height="82"
																	width="125"></td>
																<td valign="top" width="546">
																	<div style="">

																		<span style="font-size: 15px">Credit : 5$&nbsp;&nbsp;&nbsp;User :<?php echo $sess_id ; ?></span>
																		<h3 style="color: red; margin-top: 5px">>> Your
																			deposit Adress</h3>

																		<span
																			style="font-size: 15px; padding-right: 20px; color: yellow">BTC : <?php echo $adr1; ?>
																		</span> <span
																			style="font-size: 15px; padding-right: 20px; color: yellow">ETH
																			: 1Arj6tGAuyJ95oKCESndzWsGFujgBhmrKd </span> </br> <span
																			style="font-size: 15px">Withdraw Adress
																			:&nbsp;&nbsp;&nbsp;</span><input type="text"
																			style="width: 200px" /><a href="#" class="btn">Withdraw</a>

																	</div>
																</td>
															</tr>

														</tbody>
													</table>
												</td>
											</tr>
										</tbody>
									</table> <br>
									<table border="0" cellpadding="0" cellspacing="0" width="100%">
										<tr width="100%">
											<div id="roulette">
												<audio id="audio-spinning"> <source
													src="/roulette/sounds/spinning/rouletteee.mp3"
													type="audio/mpeg"></audio>
												<audio id="audio-success"> <source
													src="/roulette/sounds/success/success.mp3"
													type="audio/mpeg"> <source
													src="/roulette/sounds/success/success.ogg" type="audio/ogg"></audio>
												<audio id="audio-lose"> <source
													src="/roulette/sounds/lose/lose.mp3" type="audio/mpeg"> <source
													src="/roulette/sounds/lose/lose.ogg" type="audio/ogg"></audio>
												<audio id="audio-chips"> <source
													src="/roulette/sounds/chips/blackjack_chip.mp3"
													type="audio/wav"></audio>
												<div class="game">
													<div class="wheel"
														style="transform: rotate(283.7deg); transform-origin: 50% 50% 0px;">
														<img id="wheel" src="./roulette_game/wheel.png"> <img
															id="ball" src="./roulette_game/ball.png">
													</div>
													<div class="control">
														<div id="total">Total amount: 0</div>
														<div id="history">
															<div id="result-number"></div>
															<div id="result"></div>
														</div>
														<div id="conversion-notice"></div>
														<div class="bet-area">
															<span>Bet:</span>
															<div class="chip-size bet-control selected-chip"
																onclick=" bet = 10;">10</div>
															<div class="chip-size bet-control" onclick=" bet = 100;">100</div>
															<div class="chip-size bet-control" onclick=" bet = 1000;">1k</div>
															<div class="chip-size bet-control"
																onclick=" bet = 10000;">10k</div>
															<div id="mute" onclick="mute();"></div>
														</div>
														<div class="action-area">
															<div class="action-button bet-control" onclick="spin();">Spin</div>
															<div class="action-button bet-control"
																onclick="clear_bets()">Clear Bets</div>
															<div class="action-button bet-control"
																onclick="double_bets()">Double Bets</div>
														</div>
													</div>
													<div class="board">
														<div class="board-cell bet-0" data-bet-position="0"
															data-payout="35">
															0
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="1" data-payout="35"
															class="board-cell bcol-1 brow-3 red-cell">
															1
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="2" data-payout="35"
															class="board-cell bcol-1 brow-2 black-cell">
															2
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="3" data-payout="35"
															class="board-cell bcol-1 brow-1 red-cell">
															3
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="4" data-payout="35"
															class="board-cell bcol-2 brow-3 black-cell">
															4
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="5" data-payout="35"
															class="board-cell bcol-2 brow-2 red-cell">
															5
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="6" data-payout="35"
															class="board-cell bcol-2 brow-1 black-cell">
															6
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="7" data-payout="35"
															class="board-cell bcol-3 brow-3 red-cell">
															7
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="8" data-payout="35"
															class="board-cell bcol-3 brow-2 black-cell">
															8
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="9" data-payout="35"
															class="board-cell bcol-3 brow-1 red-cell">
															9
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="10" data-payout="35"
															class="board-cell bcol-4 brow-3 black-cell">
															10
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="11" data-payout="35"
															class="board-cell bcol-4 brow-2 black-cell">
															11
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="12" data-payout="35"
															class="board-cell bcol-4 brow-1 red-cell">
															12
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="13" data-payout="35"
															class="board-cell bcol-5 brow-3 black-cell">
															13
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="14" data-payout="35"
															class="board-cell bcol-5 brow-2 red-cell">
															14
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="15" data-payout="35"
															class="board-cell bcol-5 brow-1 black-cell">
															15
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="16" data-payout="35"
															class="board-cell bcol-6 brow-3 red-cell">
															16
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="17" data-payout="35"
															class="board-cell bcol-6 brow-2 black-cell">
															17
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="18" data-payout="35"
															class="board-cell bcol-6 brow-1 red-cell">
															18
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="19" data-payout="35"
															class="board-cell bcol-7 brow-3 red-cell">
															19
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="20" data-payout="35"
															class="board-cell bcol-7 brow-2 black-cell">
															20
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="21" data-payout="35"
															class="board-cell bcol-7 brow-1 red-cell">
															21
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="22" data-payout="35"
															class="board-cell bcol-8 brow-3 black-cell">
															22
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="23" data-payout="35"
															class="board-cell bcol-8 brow-2 red-cell">
															23
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="24" data-payout="35"
															class="board-cell bcol-8 brow-1 black-cell">
															24
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="25" data-payout="35"
															class="board-cell bcol-9 brow-3 red-cell">
															25
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="26" data-payout="35"
															class="board-cell bcol-9 brow-2 black-cell">
															26
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="27" data-payout="35"
															class="board-cell bcol-9 brow-1 red-cell">
															27
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="28" data-payout="35"
															class="board-cell bcol-10 brow-3 black-cell">
															28
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="29" data-payout="35"
															class="board-cell bcol-10 brow-2 black-cell">
															29
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="30" data-payout="35"
															class="board-cell bcol-10 brow-1 red-cell">
															30
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="31" data-payout="35"
															class="board-cell bcol-11 brow-3 black-cell">
															31
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="32" data-payout="35"
															class="board-cell bcol-11 brow-2 red-cell">
															32
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="33" data-payout="35"
															class="board-cell bcol-11 brow-1 black-cell">
															33
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="34" data-payout="35"
															class="board-cell bcol-12 brow-3 red-cell">
															34
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="35" data-payout="35"
															class="board-cell bcol-12 brow-2 black-cell">
															35
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="36" data-payout="35"
															class="board-cell bcol-12 brow-1 red-cell">
															36
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="1,4,7,10,13,16,19,22,25,28,31,34"
															data-payout="2"
															class="multiple-bet board-cell bcol-13 brow-3 bet-r3">
															2:1
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="2,5,8,11,14,17,20,23,26,29,32,35"
															data-payout="2"
															class="multiple-bet board-cell bcol-13 brow-2">
															2:1
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="3,6,9,12,15,18,21,24,27,30,33,36"
															data-payout="2"
															class="multiple-bet board-cell bcol-13 brow-1 bet-r1">
															2:1
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="1,2,3,4,5,6,7,8,9,10,11,12"
															data-payout="2"
															class="multiple-bet board-cell small-cell brow-4 bcol-1">
															1<sup>st</sup>&nbsp; 12
															<div class="chip" data-bet="0">0</div>
														</div>
														<div
															data-bet-position="13,14,15,16,17,18,19,20,21,22,23,24"
															data-payout="2"
															class="multiple-bet board-cell small-cell brow-4 bcol-5">
															2<sup>nd</sup>&nbsp; 12
															<div class="chip" data-bet="0">0</div>
														</div>
														<div
															data-bet-position="25,26,27,28,29,30,31,32,33,34,35,36"
															data-payout="2"
															class="multiple-bet board-cell small-cell brow-4 bcol-9 bet-3rd-12">
															3<sup>rd</sup>&nbsp; 12
															<div class="chip" data-bet="0">0</div>
														</div>
														<div
															data-bet-position="1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18"
															data-payout="1"
															class="multiple-bet board-cell big-cell brow-5 bcol-1 bet-1-18">
															1 - 18
															<div class="chip" data-bet="0">0</div>
														</div>
														<div
															data-bet-position="2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36"
															data-payout="1"
															class="multiple-bet board-cell big-cell brow-5 bcol-3">
															Even
															<div class="chip" data-bet="0">0</div>
														</div>
														<div
															data-bet-position="1,3,5,7,9,12,14,16,18,19,21,23,25,27,30,32,34,36"
															data-payout="1"
															class="multiple-bet board-cell big-cell brow-5 bcol-5 red-cell">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div
															data-bet-position="2,4,6,8,10,11,13,15,17,20,22,24,26,28,29,31,33,35"
															data-payout="1"
															class="multiple-bet board-cell big-cell brow-5 bcol-7 black-cell">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div
															data-bet-position="1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35"
															data-payout="1"
															class="multiple-bet board-cell big-cell brow-5 bcol-9">
															Odd
															<div class="chip" data-bet="0">0</div>
														</div>
														<div
															data-bet-position="19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36"
															data-payout="1"
															class="multiple-bet board-cell big-cell brow-5 bcol-11 bet-19-36">
															19 - 36
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="1,2,3" data-payout="11"
															class="horizontal-line-bet bcol-1 brow-1">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="2,3" data-payout="17"
															class="horizontal-line-bet bcol-1 brow-2">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="1,2" data-payout="17"
															class="horizontal-line-bet bcol-1 brow-3">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="1,2,3,4,5,6" data-payout="5"
															class="corner-bet bcol-2 brow-1">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="3,6" data-payout="17"
															class="vertical-line-bet bcol-2 brow-1">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="2,3,5,6" data-payout="8"
															class="corner-bet bcol-2 brow-2">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="2,5" data-payout="17"
															class="vertical-line-bet bcol-2 brow-2">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="1,2,4,5" data-payout="8"
															class="corner-bet bcol-2 brow-3">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="1,4" data-payout="17"
															class="vertical-line-bet bcol-2 brow-3">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="4,5,6" data-payout="11"
															class="horizontal-line-bet bcol-2 brow-1">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="5,6" data-payout="17"
															class="horizontal-line-bet bcol-2 brow-2">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="4,5" data-payout="17"
															class="horizontal-line-bet bcol-2 brow-3">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="4,5,6,7,8,9" data-payout="5"
															class="corner-bet bcol-3 brow-1">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="6,9" data-payout="17"
															class="vertical-line-bet bcol-3 brow-1">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="5,6,8,9" data-payout="8"
															class="corner-bet bcol-3 brow-2">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="5,8" data-payout="17"
															class="vertical-line-bet bcol-3 brow-2">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="4,5,7,8" data-payout="8"
															class="corner-bet bcol-3 brow-3">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="4,7" data-payout="17"
															class="vertical-line-bet bcol-3 brow-3">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="7,8,9" data-payout="11"
															class="horizontal-line-bet bcol-3 brow-1">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="8,9" data-payout="17"
															class="horizontal-line-bet bcol-3 brow-2">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="7,8" data-payout="17"
															class="horizontal-line-bet bcol-3 brow-3">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="7,8,9,10,11,12" data-payout="5"
															class="corner-bet bcol-4 brow-1">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="9,12" data-payout="17"
															class="vertical-line-bet bcol-4 brow-1">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="8,9,11,12" data-payout="8"
															class="corner-bet bcol-4 brow-2">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="8,11" data-payout="17"
															class="vertical-line-bet bcol-4 brow-2">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="7,8,10,11" data-payout="8"
															class="corner-bet bcol-4 brow-3">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="7,10" data-payout="17"
															class="vertical-line-bet bcol-4 brow-3">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="10,11,12" data-payout="11"
															class="horizontal-line-bet bcol-4 brow-1">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="11,12" data-payout="17"
															class="horizontal-line-bet bcol-4 brow-2">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="10,11" data-payout="17"
															class="horizontal-line-bet bcol-4 brow-3">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="10,11,12,13,14,15" data-payout="5"
															class="corner-bet bcol-5 brow-1">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="12,15" data-payout="17"
															class="vertical-line-bet bcol-5 brow-1">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="11,12,14,15" data-payout="8"
															class="corner-bet bcol-5 brow-2">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="11,14" data-payout="17"
															class="vertical-line-bet bcol-5 brow-2">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="10,11,13,14" data-payout="8"
															class="corner-bet bcol-5 brow-3">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="10,13" data-payout="17"
															class="vertical-line-bet bcol-5 brow-3">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="13,14,15" data-payout="11"
															class="horizontal-line-bet bcol-5 brow-1">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="14,15" data-payout="17"
															class="horizontal-line-bet bcol-5 brow-2">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="13,14" data-payout="17"
															class="horizontal-line-bet bcol-5 brow-3">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="13,14,15,16,17,18" data-payout="5"
															class="corner-bet bcol-6 brow-1">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="15,18" data-payout="17"
															class="vertical-line-bet bcol-6 brow-1">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="14,15,17,18" data-payout="8"
															class="corner-bet bcol-6 brow-2">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="14,17" data-payout="17"
															class="vertical-line-bet bcol-6 brow-2">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="13,14,16,17" data-payout="8"
															class="corner-bet bcol-6 brow-3">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="13,16" data-payout="17"
															class="vertical-line-bet bcol-6 brow-3">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="16,17,18" data-payout="11"
															class="horizontal-line-bet bcol-6 brow-1">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="17,18" data-payout="17"
															class="horizontal-line-bet bcol-6 brow-2">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="16,17" data-payout="17"
															class="horizontal-line-bet bcol-6 brow-3">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="16,17,18,19,20,21" data-payout="5"
															class="corner-bet bcol-7 brow-1">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="18,21" data-payout="17"
															class="vertical-line-bet bcol-7 brow-1">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="17,18,20,21" data-payout="8"
															class="corner-bet bcol-7 brow-2">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="17,20" data-payout="17"
															class="vertical-line-bet bcol-7 brow-2">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="16,17,19,20" data-payout="8"
															class="corner-bet bcol-7 brow-3">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="16,19" data-payout="17"
															class="vertical-line-bet bcol-7 brow-3">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="19,20,21" data-payout="11"
															class="horizontal-line-bet bcol-7 brow-1">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="20,21" data-payout="17"
															class="horizontal-line-bet bcol-7 brow-2">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="19,20" data-payout="17"
															class="horizontal-line-bet bcol-7 brow-3">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="19,20,21,22,23,24" data-payout="5"
															class="corner-bet bcol-8 brow-1">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="21,24" data-payout="17"
															class="vertical-line-bet bcol-8 brow-1">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="20,21,23,24" data-payout="8"
															class="corner-bet bcol-8 brow-2">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="20,23" data-payout="17"
															class="vertical-line-bet bcol-8 brow-2">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="19,20,22,23" data-payout="8"
															class="corner-bet bcol-8 brow-3">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="19,22" data-payout="17"
															class="vertical-line-bet bcol-8 brow-3">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="22,23,24" data-payout="11"
															class="horizontal-line-bet bcol-8 brow-1">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="23,24" data-payout="17"
															class="horizontal-line-bet bcol-8 brow-2">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="22,23" data-payout="17"
															class="horizontal-line-bet bcol-8 brow-3">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="22,23,24,25,26,27" data-payout="5"
															class="corner-bet bcol-9 brow-1">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="24,27" data-payout="17"
															class="vertical-line-bet bcol-9 brow-1">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="23,24,26,27" data-payout="8"
															class="corner-bet bcol-9 brow-2">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="23,26" data-payout="17"
															class="vertical-line-bet bcol-9 brow-2">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="22,23,25,26" data-payout="8"
															class="corner-bet bcol-9 brow-3">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="22,25" data-payout="17"
															class="vertical-line-bet bcol-9 brow-3">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="25,26,27" data-payout="11"
															class="horizontal-line-bet bcol-9 brow-1">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="26,27" data-payout="17"
															class="horizontal-line-bet bcol-9 brow-2">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="25,26" data-payout="17"
															class="horizontal-line-bet bcol-9 brow-3">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="25,26,27,28,29,30" data-payout="5"
															class="corner-bet bcol-10 brow-1">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="27,30" data-payout="17"
															class="vertical-line-bet bcol-10 brow-1">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="26,27,29,30" data-payout="8"
															class="corner-bet bcol-10 brow-2">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="26,29" data-payout="17"
															class="vertical-line-bet bcol-10 brow-2">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="25,26,28,29" data-payout="8"
															class="corner-bet bcol-10 brow-3">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="25,28" data-payout="17"
															class="vertical-line-bet bcol-10 brow-3">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="28,29,30" data-payout="111"
															class="horizontal-line-bet bcol-10 brow-1">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="29,30" data-payout="17"
															class="horizontal-line-bet bcol-10 brow-2">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="28,29" data-payout="17"
															class="horizontal-line-bet bcol-10 brow-3">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="28,29,30,31,32,33" data-payout="5"
															class="corner-bet bcol-11 brow-1">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="30,33" data-payout="17"
															class="vertical-line-bet bcol-11 brow-1">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="29,30,32,33" data-payout="8"
															class="corner-bet bcol-11 brow-2">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="29,32" data-payout="17"
															class="vertical-line-bet bcol-11 brow-2">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="28,29,31,32" data-payout="8"
															class="corner-bet bcol-11 brow-3">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="28,31" data-payout="17"
															class="vertical-line-bet bcol-11 brow-3">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="31,32,33" data-payout="11"
															class="horizontal-line-bet bcol-11 brow-1">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="32,33" data-payout="17"
															class="horizontal-line-bet bcol-11 brow-2">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="31,32" data-payout="17"
															class="horizontal-line-bet bcol-11 brow-3">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="31,32,33,34,35,36" data-payout="5"
															class="corner-bet bcol-12 brow-1">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="33,36" data-payout="17"
															class="vertical-line-bet bcol-12 brow-1">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="32,33,35,36" data-payout="8"
															class="corner-bet bcol-12 brow-2">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="32,35" data-payout="17"
															class="vertical-line-bet bcol-12 brow-2">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="31,32,34,35" data-payout="8"
															class="corner-bet bcol-12 brow-3">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="31,34" data-payout="17"
															class="vertical-line-bet bcol-12 brow-3">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="34,35,36" data-payout="11"
															class="horizontal-line-bet bcol-12 brow-1">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="35,36" data-payout="17"
															class="horizontal-line-bet bcol-12 brow-2">
															<div class="chip" data-bet="0">0</div>
														</div>
														<div data-bet-position="34,35" data-payout="17"
															class="horizontal-line-bet bcol-12 brow-3">
															<div class="chip" data-bet="0">0</div>
														</div>
													</div>
												</div>

											</div>

											<script data-cfasync="false" type="text/javascript">

var coin = "BTC";
    var name = "BitCoin";
    var ratio = "1000000";
    var decimals = "5";
    var maxwin = "1000000";
    
    </script>

											<script data-cfasync="false"
												src="./roulette/js/jquery-2.2.4.min.js"
												type="text/javascript"></script>

											<script data-cfasync="false"
												src="./roulette/js/jQueryRotate.js" type="text/javascript"></script>

											<script data-cfasync="false" src="main.js"
												type="text/javascript"></script>

											<script data-cfasync="false"
												src="./scripts/noty/packaged/jquery.noty.packaged.min.js"
												type="text/javascript"></script>
										</tr>
										<tr>
											<div id="flipcoin" style="display: none">
												<div class="game">

													<div id="coin-flip-cont" >
														<span style="font-size: 15px">Click the coin to play </span>
														<div id="coin">
															<div class="front"></div>
															<div class="back"></div>
														</div>
													</div>
													<div class="board" width="500px" min-height="100px" >
													<h4>Bet Amount :</h4>
														<div class="myButton" id="myButton" 
															style="box-shadow: -2px 4px 0px 0px rgb(60, 117, 45); background: rgb(68, 199, 103) linear-gradient(to bottom, rgb(68, 199, 103) 5%, rgb(48, 135, 2) 100%) repeat scroll 0% 0%; border-radius: 13px; border: 4px solid rgb(24, 171, 41); cursor: pointer; color: rgb(255, 255, 255); font-family: Impact; font-size: 21px; padding: 31px; text-decoration: none; text-shadow: 0px 1px 12px rgb(47, 102, 39);width:100px">0$</div>
															<div class="myButton" id="plus" 
															style="box-shadow: -2px 4px 0px 0px rgb(117,, 60 45); background: rgb(199, 68, 103) linear-gradient(to bottom, rgb(199, 68, 103) 5%, rgb(135, 48, 2) 100%) repeat scroll 0% 0%; border-radius: 13px; border: 4px solid rgb(171, 24, 41); cursor: pointer; color: rgb(255, 255, 255); font-family: Impact; font-size: 21px; padding: 31px; text-decoration: none; text-shadow: 0px 1px 12px rgb(102, 47, 39);width:50px;height:50px">+</div>
															<div class="myButton" id="minus" 
															style="box-shadow: -2px 4px 0px 0px rgb(60, 117, 45); background: rgb(68, 199, 103) linear-gradient(to bottom, rgb(68, 199, 103) 5%, rgb(48, 135, 2) 100%) repeat scroll 0% 0%; border-radius: 13px; border: 4px solid rgb(24, 171, 41); cursor: pointer; color: rgb(255, 255, 255); font-family: Impact; font-size: 21px; padding: 31px; text-decoration: none; text-shadow: 0px 1px 12px rgb(47, 102, 39);width:50px;height:50px">-</div>
													</div>
												</div>
											</div>

										</tr>

									</table>
								</td>
							</tr>
						</tbody>
					</table></td>
			</tr>
		</tbody>
	</table>

	<div style="background: images/stripe2.png; background-repeat: repeat"
		height="100px" min-height="100px" width="100%"></div>



</body>
</html>
