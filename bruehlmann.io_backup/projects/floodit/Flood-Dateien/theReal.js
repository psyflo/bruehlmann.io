// Cookies functions
function createCookie(name,value,days) {
    if (days) {
        var date = new Date();
        date.setTime(date.getTime()+(days*24*60*60*1000));
        var expires = "; expires="+date.toGMTString();
    }
    else var expires = "";
    document.cookie = name+"="+value+expires+"; path=/";
}

function readCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}

// TIMER functions


function timer() {
	
	var startTime, endTime;

	var start = function() {
		startTime = new Date().getTime() / 1000; // milliseconds dived by 1000 --> seconds
	};

	var stop = function() {
		endTime = new Date().getTime() / 1000;
	};

	var getTimer = function() {
		return endTime - startTime;
	};

	this.getTimer = getTimer;
	this.start = start;
	this.stop = stop;

}


var COLORS = ['red', 'orange', 'yellow', 'green', 'blue', 'violet'];

var ROUND1 = ['red', 'orange', 'yellow', 'green', 'blue', 'violet','red', 'orange', 'yellow', 'green', 'blue', 'violet','red', 'orange'];

/*Predifine layout for a couple of rounds?*/

var COLROUND1 = [
    {"row":"0", "colors":['red', 'orange', 'yellow', 'green', 'blue', 'violet','red', 'orange', 'yellow', 'green', 'blue', 'violet','red', 'orange'],},
    {"row":"1", "colors":['red', 'orange', 'yellow', 'green', 'blue', 'violet','red', 'orange', 'yellow', 'green', 'blue', 'violet','red', 'orange'],},
    {"row":"2", "colors":['red', 'orange', 'yellow', 'green', 'blue', 'violet','red', 'orange', 'yellow', 'green', 'blue', 'violet','red', 'orange'],},
    {"row":"3", "colors":['red', 'orange', 'yellow', 'green', 'blue', 'violet','red', 'orange', 'yellow', 'green', 'blue', 'violet','red', 'orange'],},
    {"row":"4", "colors":['red', 'orange', 'yellow', 'green', 'blue', 'violet','red', 'orange', 'yellow', 'green', 'blue', 'violet','red', 'orange'],},
    {"row":"5", "colors":['red', 'orange', 'yellow', 'green', 'blue', 'violet','red', 'orange', 'yellow', 'green', 'blue', 'violet','red', 'orange'],},
    {"row":"6", "colors":['red', 'orange', 'yellow', 'green', 'blue', 'violet','red', 'orange', 'yellow', 'green', 'blue', 'violet','red', 'orange'],},
    {"row":"7", "colors":['red', 'orange', 'yellow', 'green', 'blue', 'violet','red', 'orange', 'yellow', 'green', 'blue', 'violet','red', 'orange'],},
    {"row":"8", "colors":['red', 'orange', 'yellow', 'green', 'blue', 'violet','red', 'orange', 'yellow', 'green', 'blue', 'violet','red', 'orange'],},
    {"row":"9", "colors":['red', 'orange', 'yellow', 'green', 'blue', 'violet','red', 'orange', 'yellow', 'green', 'blue', 'violet','red', 'orange'],},
    {"row":"10", "colors":['red', 'orange', 'yellow', 'green', 'blue', 'violet','red', 'orange', 'yellow', 'green', 'blue', 'violet','red', 'orange'],},
    {"row":"11", "colors":['red', 'orange', 'yellow', 'green', 'blue', 'violet','red', 'orange', 'yellow', 'green', 'blue', 'violet','red', 'orange'],},
    {"row":"12", "colors":['red', 'orange', 'yellow', 'green', 'blue', 'violet','red', 'orange', 'yellow', 'green', 'blue', 'violet','red', 'orange'],},
    {"row":"13", "colors":['red', 'orange', 'yellow', 'green', 'blue', 'violet','red', 'orange', 'yellow', 'green', 'blue', 'violet','red', 'orange'],},
    {"row":"14", "colors":['red', 'orange', 'yellow', 'green', 'blue', 'violet','red', 'orange', 'yellow', 'green', 'blue', 'violet','red', 'orange'],},
];

/*get nicely formatted urlParams*/

var urlParams;
(window.onpopstate = function () {
    var match,
        pl     = /\+/g,  // Regex for replacing addition symbol with a space
        search = /([^&=]+)=?([^&]*)/g,
        decode = function (s) { return decodeURIComponent(s.replace(pl, " ")); },
        query  = window.location.search.substring(1);

    urlParams = {};
    while (match = search.exec(query))
       urlParams[decode(match[1])] = decode(match[2]);
})();


/*jQuery plugins*/

// jQuery.fn.visibilityToggle = function() {
//     return this.css('visibility', function(i, visibility) {
//         return (visibility == 'visible') ? 'hidden' : 'visible';
//     });
// };
// 

var startUp = function () {
		$('#intro').modal('show');
		$('#bar').removeClass();
	};
	startUp();

	// jquery stuff
		// TIME Watcher!
	// $('#intro').on('hidden.bs.modal', function (e) {
	// 	console.log("starting timer round1");
	// 	timeRound1 = new timer();
	// 	console.log(TIMERS);
	// 	TIMERS[1] = timeRound1;
	// 	timeRound1.start();
	// });

	// $('#win').on('hidden.bs.modal', function (e) {
	// 	console.log("starting timer");
	// 	timeRound1 = new timer();
	// 	TIMERS[1] = timeRound1;
	// 	timeRound1.start();
	// });
	// $('#lose').on('hidden.bs.modal', function (e) {
	// 	console.log("starting timer");
	// 	timeRound1 = new timer();
	// 	TIMERS[1] = timeRound1;
	// 	timeRound1.start();
	// });



function Square(game, x, y) {
	this.game = game;
	
	this.x = x;
	this.y = y;

	this.reset();

	ko.track(this);
}

Square.prototype.reset = function reset() {
	this.controlled = false;
		// TODO
	// probably need some sort of coordinates to set color accordingly 

	this.color = COLORS[Math.floor(Math.random() * COLORS.length)]; // randomly generates color of square
	//this.color = COLROUND1;
	//console.log("color", this.color);
    // try {
    // this.color = COLROUND1[this.x]["colors"][this.y];
    // } catch (e) {
    // console.log("error", e);
    // console.log(x, y);
    // };


};

Square.prototype.flood = function flood() {
	this.game.flood(this.color);
};

function Game() {

	self = this;

	this.size = 14; // number of columns per row default = 14
	this.round = 1; // not binded..
	this.moveCount = 0;
	this.expected = 25; //default 25
	this.TIMERS = [];
	this.games = [];


	// create number of squares and put in rows array
	this.fillrows = function fillrows() {
		this.rows = [];
		for (var i = 0; i < this.size; i ++) {
			var row = [];
			for (var j = 0; j < this.size; j ++) {
				row.push(new Square(this, i, j));
			}
			this.rows.push(row);

		}

	};
	this.fillrows();

	this.reset();

	ko.track(this);

}

Game.prototype.closeModal = function closeModal() {
	
	timeRound1 = new timer();
	this.TIMERS[this.round] = timeRound1;
	this.TIMERS[this.round].start();
};

Game.prototype.goBack = function goBack() {
	//alert("go back!");
	//timeRound1 = new timer();
	//this.TIMERS[this.round] = timeRound1;
	//this.TIMERS[this.round].start();
	
	var currentRound = this.round-1; // because it was incemented after the completion of the round

	/* store all data from cookies in array */
	var data = [];
	for (var i = 1; i <= currentRound; i++) {
		try{
			data[i-1] = [readCookie('r'+i).toString(),readCookie('rt'+i).toString(),readCookie('rreq'+i).toString()];
		} catch (e) {

		}
	};
	//var r1 = readCookie('r1').toString();
	//var r2 = readCookie('r2').toString();
	//var r3 = readCookie('r3').toString();
	
	/* Build href string to return to survey */
	var hrefString = "";
	for (var i = 0; i < data.length; i++) {
		round = i + 1;
		key1 = 'r'+round.toString();
		key2 = 'rt'+round.toString();
		key3 = 'req'+round.toString();
		value1 = data[i][0].toString();
		value2 = data[i][1].toString();
		value3 = data[i][2].toString();
		//alert(key1+'='+value1+'&'+key2+'='+value2);
		
		hrefString += '&'+key1+'='+value1+'&'+key2+'='+value2+'&'+key3+'='+value3;
		

	};
	//alert(hrefString);
	window.location.href = 'https://bruehlmann.io/projects/floodit/start.html';
};

Game.prototype.reset = function reset() {

	this.moveCount = 0;
	//console.log(this.size);
	//console.log(this.rows);
	//this.fillrows();


	for (var i = 0; i < this.size; i ++) {
		for (var j = 0; j < this.size; j ++) {
			this.rows[i][j].reset(i,j);
		}
	}

	this.rows[0][0].controlled = true;
	this.updateControlled();

};

Game.prototype.updateControlled = function updateControlled() {

	/* blink this! */

	$(".blink").fadeOut(300, function() {
      $(this).css({"visibility":"hidden"});
      $(this).css({"display":"block"});
      $(this).delay(100).fadeIn(300, function(){
      	$(this).css({"visibility":"visible"});
      	$(this).fadeOut(300, function() {
      		$(this).css({"visibility":"hidden"});
      		$(this).css({"display":"block"});
      		$(this).delay(100).fadeIn(300, function(){

      			$(this).css({"visibility":"visible"});
      		});
      	});
      });
	});

	for (var i = 0; i < this.size; i ++) {
		for (var j = 0; j < this.size; j ++) {

			if (this.rows[i][j].controlled) {

				var color = this.rows[i][j].color;

				if (i > 0) {
					var up = this.rows[i - 1][j];
					if (up.color == color)
						up.controlled = true;
				}

				if (i < (this.size - 1)) {
					var down = this.rows[i + 1][j];
					if (down.color == color)
						down.controlled = true;
				}

				if (j > 0) {
					var left = this.rows[i][j - 1];
					if (left.color == color)
						left.controlled = true;
				}

				if (j < (this.size - 1)) {
					var right = this.rows[i][j + 1];
					if (right.color == color)
						right.controlled = true;
				}

			}

		}
	}

};

Game.prototype.flood = function flood(color) {

	if (this.rows[0][0].color == color)
		return;

	this.moveCount ++;

	this.rows[0][0].color = color;

	var queue = [];
	for (var i = 0; i < this.size; i ++) {
		for (var j = 0; j < this.size; j ++) {
			if (this.rows[i][j].controlled) {
				this.rows[i][j].color = color;
			}
		}
	}

	this.updateControlled();

	/*if round is completed, do this*/
	if (this.hasWon()) {
		var me = this;

		me.TIMERS[me.round].stop(); // stop the timer first

		var roundNr = me.round;
		var movesReq = me.expected;
		var moves = me.moveCount;
		var roundTime = me.TIMERS[me.round].getTimer();

		/*
				Store score in cookies
		*/
		createCookie('r'+me.round.toString(), moves,7);
		createCookie('rt'+me.round.toString(), roundTime,7);
		createCookie('rreq'+me.round.toString(), movesReq, 7);

		setTimeout(function() {
			if (me.moveCount <= me.expected) { // if WIN
				me.games.push([1,moves,movesReq]);			
				$('#win').modal('show');
				me.expected --; // make it harder /* CHECK THIS --> should it also be sent back to the server?*/
				$('#win-modal-text').text("Can you do it in " + me.expected + " steps?"); // fill in text
				//$('#win .modal-body').text(me.TIMERS[me.round].getTimer());
				//alert(me.TIMERS[me.round].getTimer());
				//confirm('You succeded with '+me.moveCount+' of maximum '+me.expected+' steps!');
				

				if(me.round == 5) { // number of rounds to complete
					// show button to return to survey
					$('#win-modal-text').text("You have completed the required attempts. You may continue or return to the survey.");
					$('#win .modal-footer .goOn').text("Continue");
					$('#win .modal-footer .goBack').removeClass("hidden");
					$('#fail .modal-footer .goBack').removeClass("hidden");
					$('#win-modal-score').removeClass("hidden");
					$('#fail-modal-score').removeClass("hidden");


				};
				me.round++;
				
				//me.size = me.size + 2;
			} else { 
				me.games.push([0,moves,movesReq]);										//else FAIL
				$('#fail').modal('show');
				me.expected ++; // make it easier
				$('#fail-modal-text').text("Can you do it in " + me.expected + " steps?");
				//confirm('You failed with '+me.moveCount+' of maximum '+me.expected+' steps!'); 
				// createCookie('r'+me.round.toString(),me.moveCount,7);
				// createCookie('rt'+me.round.toString(),me.TIMERS[me.round].getTimer(),7);
				// // here we should write the score into a database
				// createCookie('rreq'+me.round.toString(), me.expected+1, 7);

				if(me.round == 5) { // number of rounds to complete
					// show button to return to survey
					$('#fail-modal-text').text("You have completed the required attempts. You may continue or return to the survey.");
					$('#fail .modal-footer .goOn').text("Continue");
					$('#fail .modal-footer .goBack').removeClass("hidden");
					$('#win .modal-footer .goBack').removeClass("hidden");
					$('#win-modal-score').removeClass("hidden");
					$('#fail-modal-score').removeClass("hidden");


				}
				/*
				Post this stuff to the database
				 */

				// $.post('db.php',	param1: {
				// 					roundNr: roundNr,
				// 					moves: moves,
				// 					roundTime: roundTime,
				// 					movesReq: movesReq
				// 					}, function(data, textStatus, xhr) {
				// 	console.log(textStatus);
				// });



				//alert(me.TIMERS[me.round].getTimer());
				me.round ++;
				
				//me.size = me.size + 2;

				// only do this when rounds are finished
				//window.location.href = 'http://mmi-basel.ch?r1='+r1+'&r2='+r2+'&r2='+r3;
			}

			$.ajax({
				type: "POST",
				url: "db_save.php",
				data: {
						lfdn: urlParams['lfdn'],
						roundNr: roundNr,
						moves: moves,
						roundTime: roundTime,
						movesReq: movesReq
						},
					success: function (d) {
					console.log(d);
					}
				});

			setTimeout(function () {
				me.reset();
			}, 1000); // wait a second before loading new one

		}, 2000);
	}

};

Game.prototype.hasWon = function hasWon() {
	var firstColor = this.rows[0][0].color;
	for (var i = 0; i < this.size; i ++) {
		for (var j = 0; j < this.size; j ++) {
			if (this.rows[i][j].color != firstColor) {
				return false;
			}
		}
	}
	return true;
};

Game.prototype.askAboutReset = function askAboutReset() {
	var go;
	if ((this.moveCount) && (!this.hasWon()))
		go = confirm('Are you sure you want to reset?');
	else
		go = true;
	if (go)
		this.reset();
};





ko.applyBindings(new Game);

// $("#intro").modal({
//   backdrop: false
// });



