var positions = [ -360, -136.5, -301.5, -20, -321.2, -175.2, -262.5, -58.5,
		-204.5, -97.5, -185, -224, -39, -243.2, -117, -340.5, -156, -282, -78,
		-331, -127, -311.2, -88, -194.2, -165.2, -292, -10, -253, -48.5, -68.5,
		-214.2, -107.5, -350.2, -146.2, -272.2, -29, -233.5 ];
var red = [ 1, 3, 5, 7, 9, 12, 14, 16, 18, 19, 21, 23, 25, 27, 30, 32, 34, 36 ];
var bet = 10;
var bets = [];
var angle;
var muted = true;
var spinningNow = false;
var total = 0;
var timer;
var spins = 6;
$(document)
		.ready(
				function() {
					preloadImg('./roulette/images/1k.png');
					preloadImg('./roulette/images/10k.png');
					preloadImg('./roulette/images/100.png');
					preloadImg('./roulette/images/10.png');
					preloadImg('./roulette/images/unmute.png');
					$('.chip-size').click(
							function() {
								$('.chip-size.selected-chip').removeClass(
										'selected-chip');
								$(this).addClass('selected-chip');
								$("#conversion-notice").text(
										bet
												+ " credits = "
												+ (bet / parseFloat(ratio)
														.toFixed(8)) + " "
												+ coin);
							});
					$(
							'.horizontal-line-bet, .vertical-line-bet, .corner-bet, .multiple-bet, .board-cell')
							.hover(
									function() {
										if (!spinningNow) {
											if ($(this).data('bet-position')
													.toString().indexOf(',') == -1) {
												$(
														'*[data-bet-position='
																+ $(this)
																		.data(
																				'bet-position')
																+ ']')
														.addClass('highlight');
											} else {
												var positions = $(this).data(
														'bet-position').split(
														',');
												for (var i = 0; i < positions.length; ++i) {
													$(
															'*[data-bet-position='
																	+ positions[i]
																	+ ']')
															.addClass(
																	'highlight');
												}
											}
										}
									},
									function() {
										if (!spinningNow) {
											if ($(this).data('bet-position')
													.toString().indexOf(',') == -1) {
												$(
														'*[data-bet-position='
																+ $(this)
																		.data(
																				'bet-position')
																+ ']')
														.removeClass(
																'highlight');
											} else {
												var positions = $(this).data(
														'bet-position').split(
														',');
												for (var i = 0; i < positions.length; ++i) {
													$(
															'*[data-bet-position='
																	+ positions[i]
																	+ ']')
															.removeClass(
																	'highlight');
												}
											}
										}
									}).contextmenu(function(e) {
								e.preventDefault();
							}).mousedown(function(e) {
								if (!spinningNow) {
									var target = $(this);
									if (e.which === 1) {
										addChips(target, window.bet);
									}
									if (e.which === 3) {
										takeChips(target, window.bet);
									}
								}
								return false;
							}).mouseup(function(e) {
							});
				});
function preloadImg(image) {
	var img = new Image();
	img.src = image;
}
var rotate_wheel = function() {
	$(".wheel").rotate({
		angle : 0,
		animateTo : 360,
		duration : 360 * 40,
		callback : rotate_wheel,
		easing : function(x, t, b, c, d) {
			return c * (t / d) + b;
		}
	});
};
rotate_wheel();
function showMessage(msg) {
	var n = noty({
		layout : 'topCenter',
		text : msg,
		type : 'error',
		timeout : 2000
	});
	parent.RefreshBalance(true);
	spinningNow = false;
	$('.action-button').addClass('enabled');
}
function bet_total() {
	var total = 0;
	for (var i = 0; i < bets.length; ++i) {
		if (bets[i] == null)
			total += 0;
		else
			total += bets[i].amount;
	}
	$("#total").html(
			"Total amount: " + total + " credits = "
					+ (total / ratio).toFixed(8) + " " + name);
}
function spin() {
//	alert("I am an alert box!");
	if (!spinningNow) {
		parent.RefreshBalance(false);
		var validbets = cleanArray(bets);
		var total = 0;
		for (var i = 0; i < validbets.length; ++i) {
			total += validbets[i].amount;
		}
		if (total > parent.BalanceCredits) {
			showMessage("Bet amount is larger than your balance.");
			return;
		} else if (total <= 0) {
			showMessage("First place at least one chip.");
			return;
		}
		spinningNow = true;
		$('.action-button').addClass('disabled');
		var seed = localStorage.clientseed;
		spin_circle(24, 10);
		
	}
}
function spin_circle(number, amount) {
	$('.win').remove();
	if (!muted) {
		$('#audio-spinning')[0].play();
	}
	if (angle <= Number(-spins * 360))
		angle = angle + Number($('#ball').getRotateAngle())
				- (Number($('#ball').getRotateAngle()) + spins * 360);
	else
		angle = -spins * 360;
	$("#ball").rotate({
		angle : Number($('#ball').getRotateAngle()),
		animateTo : angle + positions[number],
		duration : 7000,
		callback : function() {
			spin_result(number, amount);
		},
		easing : function(x, t, b, c, d) {
			return c * Math.sin(t / d * (Math.PI / 2)) + b;
		}
	});
}
function spin_result(number, amount) {
	if (amount > 0)
		$('#result').attr('class', 'green').html('You won ' + amount);
	else
		$('#result').attr('class', 'red').html('You lost');
	$('#result-number').attr(
			"class",
			number == 0 ? 'green' : $.inArray(number, red) != -1 ? 'red'
					: 'yellow').html(number);
	$('*[data-bet-position=' + number + ']').append('<div class="win"></div>');
	if (!muted) {
		amount > 0 ? $('#audio-success')[0].play() : $('#audio-lose')[0].play();
	}
	parent.RefreshBalance(true);
	spinningNow = false;
	$('.action-button').removeClass('disabled');
}
$('.chip').bind("contextmenu", function(e) {
	e.preventDefault();
});
function addChips(selector, bet) {
	$('.win').remove();
	var payout = parseInt(selector.attr('data-payout'));
	var amount = parseInt(selector.children('.chip').attr('data-bet')) + bet;
	if (amount * payout > maxwin) {
		showMessage("Max win per field is limited to "
				+ (parseInt(maxwin) / parseInt(ratio)).toFixed(8) + " " + name
				+ ".");
		return;
	}
	if (window.total + bet > parent.BalanceCredits) {
		showMessage("Bet amount is larger than your balance.");
		return;
	}
	if (!muted) {
		$('#audio-chips')[0].play();
	}
	var selector_data = selector.data('bet-position');
	var index = findIndex(selector_data);
	if (index < 0) {
		if (selector_data.toString().indexOf(",") == -1)
			index = bets.push({
				amount : bet,
				fields : [ selector_data ]
			}) - 1;
		else
			index = bets.push({
				amount : bet,
				fields : selector_data.split(",")
			}) - 1;
		selector.attr('data-bet-index', index);
	} else {
		bets[index].amount += bet;
	}
	if (amount > 9999)
		selector.children('.chip').attr('class', 'chip chip-10000');
	else if (amount > 999)
		selector.children('.chip').attr('class', 'chip chip-1000');
	else if (amount > 99)
		selector.children('.chip').attr('class', 'chip chip-100');
	else
		selector.children('.chip').attr('class', 'chip chip-10');
	selector.children('.chip').attr('data-bet', amount);
	if (amount.toString().substr(amount.toString().length - 3) == '000')
		amount = amount.toString().slice(0, amount.toString().length - 3) + 'k';
	selector.children('.chip').html(amount).fadeIn();
	bet_total();
}
function cleanArray(actual) {
	var newArray = new Array();
	for (var i = 0; i < actual.length; i++) {
		if (actual[i]) {
			newArray.push(actual[i]);
		}
	}
	return newArray;
}
function takeChips(selector, bet) {
	$('.win').remove();
	if (!muted) {
		$('#audio-chips')[0].play();
	}
	var selector_data = selector.data('bet-position');
	var index = findIndex(selector_data);
	var amount = 0;
	try {
		amount = bets[index].amount - bet;
	} catch (e) {
	}
	if (amount > 0) {
		bets[index].amount -= bet;
		if (amount > 9999)
			selector.children('.chip').attr('class', 'chip chip-10000');
		else if (amount > 999)
			selector.children('.chip').attr('class', 'chip chip-1000');
		else if (amount > 99)
			selector.children('.chip').attr('class', 'chip chip-100');
		else
			selector.children('.chip').attr('class', 'chip chip-10');
		selector.children('.chip').attr('data-bet', amount);
		if (amount.toString().substr(amount.toString().length - 3) == '000')
			amount = amount.toString().slice(0, amount.toString().length - 3)
					+ 'k';
		selector.children('.chip').html(amount);
	} else {
		bets[index] = null;
		selector.children('.chip').attr('data-bet', 0);
		selector.children('.chip').fadeOut();
		selector.children('.chip').html(0);
	}
	bet_total();
}
function findIndex(selector_data) {
	for ( var i in bets) {
		if (bets[i] !== undefined && bets[i] !== null) {
			bets_fields = bets[i].fields;
			if (typeof (selector_data) != "string") {
				selector_data = selector_data.toString();
			}
			if (typeof (bets_fields) != "string") {
				bets_fields = bets_fields.toString();
			}
			if (bets_fields == selector_data.split(",")) {
				return i;
			}
		}
	}
	return -1;
}
function mute() {
	if (muted) {
		$('#mute').css("background-image", "url('/roulette/images/mute.png')");
		muted = false;
	} else {
		$('#mute')
				.css("background-image", "url('/roulette/images/unmute.png')");
		muted = true;
	}
}
function clear_bets() {
	$('.win').remove();
	if (!spinningNow) {
		bets = [];
		$(".chip:visible").each(function() {
			$(this).fadeOut().html('0').attr('data-bet', 0);
		});
		var total = 0;
		for (var i = 0; i < bets.length; ++i) {
			total += bets[i].amount;
		}
		bet_total();
	}
}
function double_bets() {
	$('.win').remove();
	if (!spinningNow) {
		$('.chip:visible').each(function() {
			addChips($(this).parent(), parseInt($(this).attr('data-bet')));
		});
	}
}