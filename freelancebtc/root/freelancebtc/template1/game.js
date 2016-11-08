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
function NewSeed(x1, x2, x3, x4) {
	$("#txtLastServerSeed256").val(x1);
	$("#txtNextServerSeed256").val(x2);
	$("#txtLastServerSeed").val(x3);
	$("#txtLastClientSeed").val(x4);
	randomSeed();
}
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
$(document).ready(
				function() {
					var Nonce = 1;
					var RandomSeed = true;
					var Longid = getCookie("LongId");
					var Idc = coin;
					var Style = style;
					var AllBets = [];
					var MyBets = [];
					var Black = [ 2, 4, 6, 8, 10, 11, 13, 15, 17, 20, 22, 24,
							26, 28, 29, 31, 33, 35 ];
					var Red = [ 1, 3, 5, 7, 9, 12, 14, 16, 18, 19, 21, 23, 25,
							27, 30, 32, 34, 36 ];
					getTime = function(datetime) {
						var h = datetime.getHours();
						var m = datetime.getMinutes();
						var s = datetime.getSeconds();
						if (h < 10)
							h = '0' + h;
						if (m < 10)
							m = '0' + m;
						if (s < 10)
							s = '0' + s;
						var result = h + ":" + m + ":" + s;
						return result;
					}
					$("#txtNextClientSeed").on("input", function() {
						var seed = localStorage.clientseed;
						var new_seed = $("#txtNextClientSeed").val();
						if (new_seed.length > 34) {
							new_seed = new_seed.substring(0, 34);
						}
						if (seed != new_seed) {
							Nonce = 1;
							RandomSeed = false;
							localStorage.clientseed = new_seed;
							Seed = new_seed;
						}
						$("#txtNextClientSeed").val(Seed);
					});
					getStatistic = function(longid, idc) {
						$.ajax({
							type : 'POST',
							url : '/roulette/roulette.asmx/GetStatistic',
							data : '{longid:"' + longid + '",idc:"' + idc
									+ '"}',
							contentType : "application/json",
							success : function(msg) {
								var content = JSON.parse(msg.d);
								$("#global_stats").html(content.Stats);
								$("#user_stats").html(content.StatsUser);
							},
							error : function(msg) {
								console.log("not ok....")
							}
						});
					};
					getStatistic(Longid, Idc);
					getTopPlayers = function(longid, idc, style) {
						$.ajax({
							type : 'POST',
							url : '/roulette/roulette.asmx/GetTopPlayers',
							data : '{longid:"' + longid + '",idc:"' + idc
									+ '",style:"' + style + '"}',
							contentType : "application/json",
							success : function(msg) {
								if (msg.d.length > 0) {
									$("#topplayers_table").html(msg.d);
								}
							},
							error : function(msg) {
								console.log("not ok....")
							}
						});
					};
					getTopPlayers(Longid, Idc, Style);
					setInterval(function() {
						getTopPlayers(Longid, Idc);
						getStatistic(Longid, Idc);
						getRoundData(Idc, "1");
						getRoundData(Idc, "2");
					}, 600000);
					clientSeed = function() {
						var result = "";
						if (RandomSeed) {
							var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz";
							for (var i = 0; i < 40; i++) {
								var rnum = Math.floor(Math.random()
										* chars.length);
								result += chars.substring(rnum, rnum + 1);
							}
						} else {
							result = Seed + "-" + Nonce;
							Nonce = Nonce + 1;
						}
						return result;
					}
					randomSeed = function() {
						RandomSeed = true;
						localStorage.clientseed = clientSeed();
						$("#txtNextClientSeed").val(localStorage.clientseed);
					};
					$("#btnRandom1").click(function() {
						randomSeed();
						return false;
					});
					getProvablyFair = function(longid, coin) {
						$.ajax({
							type : 'POST',
							url : '/roulette/roulette.asmx/GetFair',
							data : '{longid:"' + longid + '",idc:"' + coin
									+ '"}',
							contentType : "application/json",
							success : function(msg) {
								if (msg.d.length > 0) {
									var content = JSON.parse(msg.d);
									$("#txtLastServerSeed256").val(
											content.PreviousServerSeedSHA256);
									$("#txtNextServerSeed256").val(
											content.NextServerSeedSHA256);
									$("#txtLastServerSeed").val(
											content.PreviousServerSeed);
									$("#txtLastClientSeed").val(
											content.PreviousClientSeed);
								}
							},
							error : function(msg) {
								console.log("not ok....")
							}
						});
					};
					getProvablyFair(Longid, Idc);
					provably_fair_reload = function() {
						localStorage.clientseed = clientSeed();
						$("#txtNextClientSeed").val(localStorage.clientseed);
					}
					provably_fair_reload();
					var chat = 0;
					var timer1;
					var idchat_old = 0;
					var idchat_new = 0;
					var logedin = false;
					var notice = "";
					var longid2_old = getCookie("LongId2");
					$("#lblUsdBalance").tooltip();
					$('.dropdown-toggle').dropdown();
					getLastBets = function(longid, type) {
						$.ajax({
							type : 'POST',
							url : '/roulette/roulette.asmx/GetLastBets',
							data : '{longid:"' + longid + '",type:"' + type
									+ '"}',
							contentType : "application/json",
							success : function(msg) {
								if (msg.d.length > 0) {
									addToTable(msg.d, type);
								}
							},
							error : function(msg) {
								console.log("not ok....")
							}
						});
					};
					getBets = function() {
						getLastBets(Longid, "2");
						getLastBets(Longid, "1");
					}
					getBets();
					convert_number = function(number, fixed) {
						if (fixed == 0) {
							var result = number.toLocaleString('en-US');
						} else {
							var result = number.toFixed(fixed).toLocaleString(
									'en-US');
						}
						return result;
					};
					refreshBets = function() {
						getBets();
						setTimeout(function() {
							refreshBets();
						}, 2000);
					}
					refreshBets();
					colorRoll = function(x) {
						var result = "";
						if (x == 0) {
							result = "<span class='green_font'>" + x + "<span>";
						} else if (Red.indexOf(x) > -1) {
							result = "<span class='red_font'>" + x + "<span>";
						} else {
							result = "<span>" + x + "<span>";
						}
						return result;
					};
					addToTable = function(text, type, idc, style) {
						var data = JSON.parse(text);
						var found = false;
						if (type == "2") {
							$
									.each(
											data,
											function(i, v) {
												try {
													if (v.id == null)
														return;
												} catch (a) {
													return;
												}
												found = false;
												$.map(AllBets, function(value,
														key) {
													if (value == v.id) {
														found = true;
													}
												});
												if (found != true) {
													try {
														AllBets.push(v.id);
													} catch (a) {
														return;
													}
													if (AllBets.length % 2 == 0) {
														var append = "<tr id='allrow_"
																+ v.id
																+ "' class='row_one'>";
													} else {
														var append = "<tr id='allrow_"
																+ v.id
																+ "' class='row_two'>";
													}
													var id = v.id;
													id = id.toLocaleString();
													var date = getTime(new Date(
															v.time));
													append = append
															+ "<td><a class='a_bwindow' href='/bet/roulette/"
															+ v.id
															+ "'>"
															+ id
															+ "</a></td><td>"
															+ date
															+ "</td>"
															+ "<td><a class='a_swindow' href='/player/"
															+ v.user_id
															+ "'>"
															+ v.user_id
															+ "</a></td>"
															+ "<td><a href='"
															+ v.link
															+ "' target='_blank'>"
															+ v.coinname
															+ "</a></td><td>"
															+ v.bet.toFixed(8)
															+ "</td>" + "<td>"
															+ colorRoll(v.roll)
															+ "</td>";
													if (v.profit >= 0) {
														append = append
																+ "<td class='green_font'>"
																+ v.profit
																		.toFixed(8)
																+ "</td>"
													} else {
														append = append
																+ "<td class='red_font'>"
																+ v.profit
																		.toFixed(8)
																+ "</td>"
													}
													append = append
															+ "<td><a href='"
															+ v.link
															+ "' target='_blank'><img class='result_coin' src='/images/"
															+ v.idc.trim()
															+ ".png' height='25' width='25'></a></td></tr>";
													var row = $(append);
													$("#table_all_bets_head")
															.after(row);
													$("#allrow_" + v.id)
															.find('td')
															.wrapInner(
																	'<div style="display: none;" />')
															.parent()
															.find('td > div')
															.slideDown(
																	700,
																	function() {
																		var $set = $(this);
																		$set
																				.replaceWith($set
																						.contents());
																	});
													$("#allrow_" + (v.id - 100))
															.remove();
													$("[data-toggle='popover']")
															.popover({
																html : true
															})
												}
											});
						}
						if (type == "1") {
							$
									.each(
											data,
											function(i, v) {
												try {
													if (v.id == null)
														return;
												} catch (a) {
													return;
												}
												found = false;
												$.map(MyBets, function(value,
														key) {
													if (value == v.id) {
														found = true;
													}
												});
												if (found != true) {
													try {
														MyBets.push(v.id);
													} catch (a) {
														return;
													}
													if (MyBets.length % 2 == 0) {
														var append = "<tr id='myrow_"
																+ v.id
																+ "' class='row_one'>";
													} else {
														var append = "<tr id='myrow_"
																+ v.id
																+ "' class='row_two'>";
													}
													var id = v.id;
													id = id.toLocaleString();
													var date = getTime(new Date(
															v.time));
													append = append
															+ "<td><a class='a_bwindow' href='/bet/roulette/"
															+ v.id
															+ "'>"
															+ id
															+ "</a></td><td>"
															+ date
															+ "</td>"
															+ "<td><a class='a_swindow' href='/player/"
															+ v.user_id
															+ "'>"
															+ v.user_id
															+ "</a></td>"
															+ "<td><a href='"
															+ v.link
															+ "' target='_blank'>"
															+ v.coinname
															+ "</a></td><td>"
															+ v.bet.toFixed(8)
															+ "</td>" + "<td>"
															+ colorRoll(v.roll)
															+ "</td>";
													if (v.profit >= 0) {
														append = append
																+ "<td class='green_font'>"
																+ v.profit
																		.toFixed(8)
																+ "</td>"
													} else {
														append = append
																+ "<td class='red_font'>"
																+ v.profit
																		.toFixed(8)
																+ "</td>"
													}
													append = append
															+ "<td><a href='"
															+ v.link
															+ "' target='_blank'><img class='result_coin' src='/images/"
															+ v.idc.trim()
															+ ".png' height='25' width='25'></a></td></tr>";
													var row = $(append);
													$("#table_my_bets_head")
															.after(row);
													$("#myrow_" + v.id)
															.find('td')
															.wrapInner(
																	'<div style="display: none;" />')
															.parent()
															.find('td > div')
															.slideDown(
																	700,
																	function() {
																		var $set = $(this);
																		$set
																				.replaceWith($set
																						.contents());
																	});
													$("[data-toggle='popover']")
															.popover({
																html : true
															})
												}
											});
						}
					};
				});