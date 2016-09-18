/**
 * Created by segun on 9/15/2016.
 */
var server = require('http').Server();
var io = require('socket.io')(server);
var Redis = require('ioredis');
var redis = new Redis();

redis.subscribe('test-channel');
redis.subscribe('notification-channel');


redis.on('message', function(channel, message){
    message = JSON.parse(message);
    io.emit(channel + ':' + message.event, message.data);
});

server.listen(3000);