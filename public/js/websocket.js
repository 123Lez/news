var ws = new WebSocket("ws://127.0.0.1:9000");
 
ws.onopen = function(event)
{
	console.log("Connected");
	sendMessage("Hello Websocket!");
}

ws.onclose = function(event)
{
	console.log("Disconnected: "+event.reason);
}

ws.onerror = function(event)
{
	console.log("Error");
}

ws.onmessage = function(event)
{
	console.log("Message received: "+event.data);
	document.getElementById('viewer').innerHTML = event.data;
	ws.close();
}

function sendMessage(msg)
{
	ws.send(msg);
	console.log("Message sent");
}