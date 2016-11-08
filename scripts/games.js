if (top.location != self.location) {
	top.location = self.location.href;
}
$(".a_window").fancybox({autoscale : true,transitionIn : 'none',transitionOut : 'none',type : 'iframe',});
$(".a_swindow").fancybox({
	minHeight : 700,
	minwidth : 800,
	transitionIn : 'none',
	transitionOut : 'none',
	type : 'iframe',
});
$(".a_bwindow").fancybox({
	autoscale : true,
	transitionIn : 'none',
	transitionOut : 'none',
	type : 'iframe',
});
$(".a_fwindow").fancybox({
	maxHeight : 600,
	minwidth : 800,
	transitionIn : 'none',
	transitionOut : 'none',
	type : 'iframe',
});
$(".a_gwindow").fancybox({
	autoscale : false,
	autoDimensions : false,
	width : 600,
	transitionIn : 'none',
	transitionOut : 'none',
	type : 'iframe'
});
(function(i, s, o, g, r, a, m) {
	i['GoogleAnalyticsObject'] = r;
	i[r] = i[r] || function() {
		(i[r].q = i[r].q || []).push(arguments)
	}, i[r].l = 1 * new Date();
	a = s.createElement(o), m = s.getElementsByTagName(o)[0];
	a.async = 1;
	a.src = g;
	m.parentNode.insertBefore(a, m)
})(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
ga('create', 'UA-53690490-1', 'auto');
ga('send', 'pageview');
function ShowUser(nick) {
	var href = "/player/" + nick;
	$.fancybox.open({
		href : href,
		autoscale : false,
		autoDimensions : false,
		width : 800,
		transitionIn : 'none',
		transitionOut : 'none',
		type : 'iframe'
	});
}
function ShowBet(id, type) {
	if (type == 1) {
		var href = "/bet/dice/" + id;
	} else if (type == 2) {
		var href = "/bet/slot/" + id;
	} else if (type == 3) {
		var href = "/bet/blackjack/" + id;
	} else {
		var href = "/bet/roulette/" + id;
	}
	$.fancybox.open({
		href : href,
		autoscale : false,
		autoDimensions : false,
		width : 800,
		transitionIn : 'none',
		transitionOut : 'none',
		type : 'iframe'
	});
}
function ShowFaq() {
	var href = "/faq"
	$.fancybox.open({
		href : href,
		autoscale : false,
		autoDimensions : false,
		width : 800,
		transitionIn : 'none',
		transitionOut : 'none',
		type : 'iframe'
	});
}
function ShowRules() {
	var href = "/chatrules"
	$.fancybox.open({
		href : href,
		autoscale : false,
		autoDimensions : false,
		width : 800,
		transitionIn : 'none',
		transitionOut : 'none',
		type : 'iframe'
	});
}
var balancerefresh = true;
function RefreshBalance(x) {
	if (x) {
		balancerefresh = true;
		getBalance(coin);
	} else {
		balancerefresh = false;
	}
}
var NewMessages = 0;
var ActiveChannel = "1";
var Chat = 0;
var d = new Date();
var diff = (parseInt(serverTime) - d.getTime());
function IncreaseMessageCount(channel) {
	if (channel == ActiveChannel && Chat == 0) {
		NewMessages = NewMessages + 1;
		if (NewMessages > 50) {
			$("#caption_messages").text("Click to open chat");
		} else {
			$("#caption_messages").text("New messages: " + NewMessages);
		}
		clearInterval(timer1);
		timer1 = setInterval(function() {
			$("#caption_messages").effect("highlight", {}, 1000);
		}, 2000);
	}
};
function UsersOnline(users) {
	$("#caption_users").text("Online users: " + users);
}
function Connected(status) {
	if (status) {
		$("#caption_status").removeClass("glyphicon-red");
		$("#caption_status").addClass("glyphicon-green");
	} else {
		$("#caption_status").addClass("glyphicon-red");
		$("#caption_status").removeClass("glyphicon-green");
	}
}
function Reload() {
	location.reload();
}
$(document)
		.ready(
				function() {
					showBalance = function(balance, coinname) {
						if (balance >= 0) {
							$("#lblBalance").html(
									"Your balance is: "
											+ convert_number(balance, 8) + " "
											+ coinname);
							var num = (balance * conv_price);
							var fixed = 2;
							if (conv_currency == "BTC") {
								fixed = 8
							}
							$("#lblUsdBalance").attr("data-original-title",
									num.toFixed(fixed) + " " + conv_currency);
						}
					}
					$(document)
							.click(
									function(event) {
										var clickover = $(event.target);
										var $navbar = $(".navbar-collapse");
										var _opened = $navbar.hasClass("in");
										if (_opened === true
												&& !clickover
														.hasClass("navbar-toggle")) {
											$navbar.collapse('hide');
										}
									});
					$("#caption_messages").text("Click to open chat");
					timer1 = setInterval(function() {
						$("#caption_messages").effect("highlight", {}, 1000);
					}, 2000);
					timer2 = setInterval(function() {
						var now = new Date(Date.now() + diff);
						var now_utc = new Date(now.getTime()
								+ now.getTimezoneOffset() * 60000);
						$("#txtServerTime").text(now_utc.toLocaleString());
					}, 1000);
					var idc = coin;
					var loop = 3;
					var timer1;
					var logedin = false;
					var notice = "";
					var timestamp = null;
					$(".btn-channel").click(function(e) {
						if (Chat == 0) {
							Chat = 1;
							$("#caption_messages").text("");
							$("#chat_frame").height(300);
							clearInterval(timer1);
						}
					});
					$("a[href=#switchcolor]").click(function(e) {
						e.preventDefault();
						var color = $(this).data("color");
						$.ajax({
							type : 'POST',
							url : '/account.aspx/ChangeColor',
							data : '{color:"' + color + '"}',
							contentType : "application/json",
							success : function(msg) {
								Reload();
							},
						});
					});
					$("#caption")
							.click(
									function(e) {
										if (e.target.id == "select_channel"
												|| e.target.tagName
														.toLowerCase() == 'a') {
											return;
										}
										NewMessages = 0;
										if (Chat == 0) {
											Chat = 1;
											$("#caption_messages").text("");
											$("#chat_frame").height(300);
											clearInterval(timer1);
										} else {
											Chat = 0;
											$("#caption_messages").text("");
											$("#chat_frame").height(40);
										}
									});
					$("#chat_frame").resizable({
						handles : {
							'n' : '#ngrip',
							'ne' : '#negrip',
							'e' : '#egrip'
						},
						start : function(event, ui) {
							$("#mask").css("display", "block");
						},
						stop : function(event, ui) {
							$("#mask").css("display", "none");
						}
					});
					$("#chat_iframe_1").show();
					//$("#lblUsdBalance").tooltip();
					//$(".tooltipLink").tooltip();
					$('.dropdown-toggle').dropdown();
					$(".dropdown-menu li a")
							.click(
									function() {
										var game = $(this).data("game");
										var coin = $(this).data("coin");
										var channel = $(this).data("channel");
										var name = $(this).data("name");
										var filtercoin = $(this).data(
												"filtercoin");
										if (filtercoin != null) {
											var $target = $(this), val = $target
													.attr('data-filtercoin'), $inp = $target
													.find('input'), idx;
											if ((idx = coinslist.indexOf(val)) > -1) {
												coinslist.splice(idx, 1);
												setTimeout(function() {
													$inp.prop('checked', false)
												}, 0);
											} else {
												coinslist.push(val);
												setTimeout(function() {
													$inp.prop('checked', true)
												}, 0);
											}
											$(this).blur();
											return false;
										}
										if (game != null) {
											var coin = $(this).data("coin");
											var url = "";
											if (game == "Slot") {
												url = url + "/slot/" + name;
											} else if (game == "Dice") {
												url = url + "/dice/" + name;
											} else if (game == "Lotto") {
												url = url + "/lottery/" + name;
											} else if (game == "Roulette") {
												url = url + "/roulette/" + name;
											} else {
												url = url + "/blackjack/"
														+ name;
											}
											$(location).attr("href", url);
										}
										if (channel != null) {
											for (i = 1; i <= 10; i++) {
												if (i != channel) {
													$("#chat_iframe_" + i)
															.hide();
												}
											}
											$("#span-channel").text(name);
											$("#chat_iframe_" + channel).show();
											document
													.getElementById("chat_iframe_"
															+ channel).contentWindow
													.scrollDown();
											ActiveChannel = channel;
											NewMessages = 0;
										}
									});
					convert_number = function(number, fixed) {
						if (fixed == 0) {
							var result = number.toLocaleString('en-US');
						} else {
							var result = number.toFixed(fixed).toLocaleString(
									'en-US');
						}
						return result;
					};
						getBalance = function(idc) {
						if (balancerefresh) {
							var longid = "";
							try {
								longid = getCookie("coinCasino");
								Longid = longid;
							} catch (a) {
							}
							$.ajax({
								type : 'POST',
								url : '/services/GetCoinBalance.php',
								data : '{longid: "' + longid + '",idc: "' + idc
										+ '"}',
								contentType : "application/json",
								success : function(msg) {
									var balance = parseFloat(msg.d);
									if (balance >= 0) {
										showBalance(balance, coinname);
										Balance = balance;
										BalanceCredits = balance
												* parseFloat(ratio);
									}
								},
								error : function(msg) {
								}
							});
						}
					};
					var OldJackpot = 0;
					var NewJackpot = 0;
					var TempBalance = 0;
					var TempChange = 0;
					var JackpotTimer = setInterval(function() {
						TempBalance = TempBalance + TempChange;
						JackpotObject.text("Jackpot balance: "
								+ TempBalance.toFixed(8) + " " + coin);
					}, 100);
					var JackpotObject = $("#txtJackpotBalance");
					getUsersOnline = function() {
						var longid = "";
						try {
							longid = getCookie("LongId");
							Longid = longid;
						} catch (a) {
						}
						$
								.ajax({
									type : 'POST',
									url : '/services/GetUsersOnline',
									data : '{longid:"' + longid + '",idc:"'
											+ coin + '"}',
									contentType : "application/json",
									success : function(msg) {
										if (msg.d.length > 0) {
											var content = JSON.parse(msg.d);
											NewJackpot = parseFloat(content.Jackpot)
													- parseFloat(content.JackpotChange);
											if (NewJackpot < 0) {
												NewJacpot = 0;
											}
											if (TempBalance == 0) {
												TempBalance = NewJackpot;
											}
											if (parseFloat(content.JackpotChange) > 0) {
												TempChange = parseFloat(content.JackpotChange) / 3480 / 10; // that
																											// is
																											// average
																											// change
																											// in a
																											// second
											} else {
												TempChange = 0;
											}
											if (TempChange <= 0) {
												JackpotObject
														.text("Jackpot balance: "
																+ NewJackpot
																		.toFixed(8)
																+ " " + coin);
											}
											if (parseFloat(content.PendingDeposits) > 0) {
												$("#lblPending")
														.html(
																"[Pending "
																		+ parseFloat(
																				content.PendingDeposits)
																				.toFixed(
																						8)
																		+ " "
																		+ coin
																		+ "]");
											} else {
												$("#lblPending").html("");
											}
											if (content.Notice != ""
													&& content.Timestamp != getCookie("timestamp")) {
												notice = content.Notice;
												timestamp = content.Timestamp;
												showNotice(notice);
											}
										}
									},
								});
					};
					function setCookie(cname, cvalue, exdays) {
						var d = new Date();
						d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
						var expires = "expires=" + d.toUTCString();
						document.cookie = cname + "=" + cvalue + "; " + expires;
					}
					;
					refreshData = function() {
						getBalance(idc);
						if (loop % 5 == 0) {
							getUsersOnline();
						}
						loop++;
						setTimeout(function() {
							refreshData();
						}, 2000);
					};
					refreshData();
					$("#upper-alert .close").click(function(e) {
						$("#upper-alert").slideUp("slow");
						setCookie("timestamp", timestamp, 1);
					});
					showNotice = function(text) {
						$("#upper-alert .text").html(text);
						$("#upper-alert").slideDown("slow");
					};
				});
function getCookie(cname) {
	var name = cname + "=";
	var ca = document.cookie.split(';');
	for (var i = 0; i < ca.length; i++) {
		var c = ca[i].trim();
		if (c.indexOf(name) == 0)
			return c.substring(name.length, c.length);
	}
	return "";
}