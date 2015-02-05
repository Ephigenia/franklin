var chartsAPIReadyCallbacks = [];
var chartsAPIReady = false;

function onChartsReady(callback) {
	if (typeof(callback) !== 'function') {
		throw "Expection function as valid callback.";
	}
	if (!chartsAPIReady) {
		chartsAPIReadyCallbacks.push(callback);
	} else {
		callback.call();
	}
	return true;
}

function onChartsReadyCallback() {
	chartsAPIReady = true;
	for(var i = 0; i < chartsAPIReadyCallbacks.length; i++) {
		chartsAPIReadyCallbacks[i].call();
	}
}

google.load('visualization', '1', {packages:['corechart']});
google.setOnLoadCallback(onChartsReadyCallback);

// responsive menu
$(document).ready(function() {
	$('.navbar-fixed').bind('click touchstart', function(event) {
		window.scrollTo(0, 0);
		return true;
	});
});