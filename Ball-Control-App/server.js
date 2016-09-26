var app = require('express')();
var server = require('http').Server(app);
var io = require('socket.io')(server);
var jade = require('jade');

var port = 3000;

server.listen(port, function () {
    console.log('Server started.');
});

app.get('/', function (req, res, next) {
    var id = require('./helpers/randomstring')(3);
    var room = io.of('/' + id);

    room.on('connection', function (socket) {
        var ready = false;

        socket.on('movement', function (data) {
            if (!ready) {
                room.emit('connected');
                ready = true;
            }

            room.emit('updateBall', data);
        });
    });
    
    try {
        res.send(jade.compileFile(__dirname + '/templates/game.jade')({
            id: id,
            title: 'Game',
            host: req.hostname,
            port: port
        }));
    } catch (e) {
        next(e)
    }
});

app.get('/:id', function (req, res, next) {
    try {
        res.send(jade.compileFile(__dirname + '/templates/controller.jade')({
            id: req.params.id,
            title: 'Controller',
            host: req.hostname,
            port: port
        }));
    } catch (e) {
        next(e)
    }
});
